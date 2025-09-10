<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Checkout;
use App\Models\CheckoutItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class CheckoutController extends Controller
{
    /**
     * Tampilkan halaman checkout dengan item yang dipilih.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // 1. Ambil data user yang sedang login
        $user = Auth::user();

        // 2. Ambil semua item keranjang untuk user yang sedang login
        $checkoutItems = CheckoutItem::with('product')
            ->whereHas('checkout', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->get();

        // 3. Hitung ringkasan total pembayaran dari checkout_items.
        $subtotal = $checkoutItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        // Biaya statis
        $shipping_cost = 10000;
        $tax_rate = 0.1;

        // Perhitungan ulang total
        $total_amount = $subtotal + $shipping_cost + ($subtotal * $tax_rate);

        // Buat objek dummy untuk diteruskan ke view
        // Perhatikan bahwa `checkout` di sini adalah ringkasan,
        // bukan objek dari tabel `checkouts`.
        $checkoutSummary = (object)[
            'user' => $user,
            'checkoutItems' => $checkoutItems, // Menggunakan item checkout
            'subtotal' => $subtotal,
            'shipping_cost' => $shipping_cost,
            'tax_amount' => $subtotal * $tax_rate,
            'total_amount' => $total_amount,
        ];

        return view('checkout.index', [
            'checkout' => $checkoutSummary,
        ]);
    }

    /**
     * Tangani item yang dipilih dari halaman keranjang dan simpan ke sesi.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'selected_items' => 'required|array|min:1',
            'selected_items.*' => 'exists:cart_items,id',
        ]);

        $selectedItemIds = $request->input('selected_items');

        // Ambil item keranjang yang dipilih
        $cartItems = CartItem::with('product')
            ->whereIn('id', $selectedItemIds)
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Item yang dipilih tidak valid.');
        }

        // Hitung total harga
        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        // Contoh biaya pengiriman dan pajak
        $shipping = 10000;
        $taxRate = 0.1;
        $tax = $subtotal * $taxRate;
        $total = $subtotal + $shipping + $tax;

        // Simpan data ke session untuk digunakan di halaman checkout
        session(['checkout_data' => [
            'items' => $cartItems,
            'subtotal' => $subtotal,
            'shipping' => $shipping,
            'tax' => $tax,
            'total' => $total,
        ]]);

        return redirect()->route('checkout.index');
    }

    /**
     * Tangani proses checkout untuk satu item dari keranjang,
     * menyimpannya ke tabel 'checkouts' dan 'checkout_items',
     * lalu menghapusnya dari tabel 'cart_items'.
     *
     * @param int $id ID dari CartItem.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function singleItemCheckout($id)
    {
        // Cari item di keranjang hanya berdasarkan ID-nya
        $cartItem = CartItem::where('id', $id)->with('product')->first();

        if (!$cartItem) {
            return redirect()->route('cart.index')->with('error', 'Item tidak ditemukan.');
        }

        // Gunakan transaksi database untuk memastikan proses atomik
        DB::beginTransaction();

        try {
            // Hitung harga untuk item tunggal
            $subtotal = $cartItem->product->price * $cartItem->quantity;
            $shipping = 10000; // Biaya pengiriman tetap
            $taxRate = 0.1; // 10%
            $tax = $subtotal * $taxRate;
            $total = $subtotal + $shipping + $tax;

            // 1. Simpan data checkout ke tabel `checkouts`
            $checkout = new Checkout();
            // Anda perlu menentukan cara mendapatkan user_id yang benar di sini.
            // Misalnya, jika Anda menggunakan autentikasi, Anda bisa menggunakan Auth::id().
            // Jika tidak, Anda bisa menggunakan cart_id dari item.
            $checkout->user_id = Auth::id() ?? $cartItem->cart_id; // Menggunakan user_id dari Auth atau cart_id
            $checkout->subtotal = $subtotal;
            $checkout->shipping_cost = $shipping;
            $checkout->tax_amount = $tax;
            $checkout->total_amount = $total;
            $checkout->save();

            // 2. Simpan detail produk ke tabel `checkout_items`
            $checkoutItem = new CheckoutItem();
            $checkoutItem->checkout_id = $checkout->id;
            $checkoutItem->product_id = $cartItem->product_id;
            $checkoutItem->quantity = $cartItem->quantity;
            $checkoutItem->price = $cartItem->product->price;
            $checkoutItem->save();

            // 3. Hapus item dari tabel `cart_items`
            $cartItem->delete();

            // Commit transaksi jika semua langkah berhasil
            DB::commit();

            return redirect()->route('cart.index')->with('success', 'Item berhasil di-checkout dan diproses!');
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollBack();

            return redirect()->route('cart.index')->with('error', 'Gagal memproses checkout. Silakan coba lagi.');
        }
    }
    public function processCheckout(): RedirectResponse
    {
        // Ambil data user yang sedang login.
        $user = Auth::user();

        // Ambil semua item yang telah di-checkout oleh user ini.
        $checkoutItems = CheckoutItem::with('product')
            ->whereHas('checkout', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->get();

        // Cek apakah ada item untuk di-checkout.
        if ($checkoutItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Tidak ada item untuk diproses checkout.');
        }

        // Hitung total dan buat pesan WhatsApp.
        $subtotal = 0;
        $orderMessage = "Halo, saya ingin memesan produk dari K-Pop Mart.\n\n"
            . "Rincian Pesanan:\n";

        foreach ($checkoutItems as $item) {
            $itemTotal = $item->price * $item->quantity;
            $subtotal += $itemTotal;
            $orderMessage .= "• " . $item->product->name . " x " . $item->quantity . " = Rp " . number_format($itemTotal, 0, ',', '.') . "\n";
        }

        // Tambahkan biaya pengiriman, pajak, dan total akhir.
        $shippingCost = 10000;
        $taxRate = 0.1;
        $taxAmount = $subtotal * $taxRate;
        $finalTotal = $subtotal + $shippingCost + $taxAmount;

        $orderMessage .= "\n----------------------------------\n"
            . "Subtotal: Rp " . number_format($subtotal, 0, ',', '.') . "\n"
            . "Biaya Pengiriman: Rp " . number_format($shippingCost, 0, ',', '.') . "\n"
            . "Pajak (" . ($taxRate * 100) . "%): Rp " . number_format($taxAmount, 0, ',', '.') . "\n"
            . "Total Pembayaran: Rp " . number_format($finalTotal, 0, ',', '.') . "\n\n"
            . "Mohon info ketersediaan stok dan detail pembayaran. Terima kasih.";

        // URL encode pesan.
        $encodedMessage = urlencode($orderMessage);

        // Nomor WhatsApp tujuan.
        $phoneNumber = '6289513822017'; // Ganti dengan nomor WhatsApp bisnis Anda.

        // Buat URL WhatsApp.
        $whatsappUrl = "https://wa.me/{$phoneNumber}?text={$encodedMessage}";

        // Arahkan pengguna ke URL tersebut.
        return redirect()->away($whatsappUrl);
    }
}
