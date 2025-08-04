<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua pesanan dari database
        $orders = Order::all();
        // Tampilkan view 'orders.index' dan kirim data pesanan
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