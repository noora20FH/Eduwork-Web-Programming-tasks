<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua produk dari database
        $products = Product::paginate(8);
        // Tampilkan view 'products.index' dan kirim data produk
        return view('products.index', compact('products'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tampilkan view untuk form tambah produk baru
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'group' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|decimal:0,2', // Validasi untuk decimal dengan 2 angka di belakang koma
            'stock' => 'required|integer|min:0', // Validasi 'stock' harus bilangan bulat dan minimal 0
            'image' => 'nullable', // 'image' bisa kosong dan harus berupa URL
            'description' => 'nullable|string', // 'description' bisa kosong
            'isNew' => 'nullable|boolean', // 'isNew' bisa kosong dan harus boolean
        ]);

        // Buat produk baru di database
        Product::create($validatedData);

        // Redirect kembali dengan pesan sukses
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // Tampilkan view 'products.show' dengan detail produk
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // Tampilkan view 'products.edit' dengan data produk yang akan diedit
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|url',
            'category' => 'nullable|string|max:255', // Validasi untuk kategori
        ]);

        // Update data produk
        $product->update($validatedData);

        // Redirect kembali dengan pesan sukses
        return redirect()->route('products.index')->with('success', 'Produk berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Hapus produk
        $product->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }
}