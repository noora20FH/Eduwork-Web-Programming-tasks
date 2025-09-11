<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login untuk melihat riwayat pesanan.');
        }

        $userId = Auth::id();

        // Ambil semua pesanan untuk pengguna saat ini
        // Eager load orderItems dan product untuk setiap item
        $orders = Order::where('user_id', $userId)
                        ->with('orderItems.product')
                        ->latest()
                        ->get();

        // Mengirimkan data orders ke view
        return view('orders.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        // Tampilkan view 'orders.show' dengan detail pesanan
        return view('orders.show', compact('order'));
    }
    
    
    // Metode create, store, update, dan destroy biasanya
    // tidak langsung diakses dari browser, tetapi melalui form checkout
    // atau API, jadi kita bisa mengabaikannya untuk saat ini.
}