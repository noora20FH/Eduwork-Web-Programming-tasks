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
        $products = Product::all();
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
            'name' => 'required|max:255',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|url', // Asumsi URL gambar
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