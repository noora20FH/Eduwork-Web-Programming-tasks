<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = \App\Models\Product::count();
        $totalCategories = \App\Models\ProductCategory::count();
        $totalStocks = \App\Models\Product::sum('stock');
        $totalClicks = 5432;
        $data =[
            ['title'=>'Jumlah Produk','icon'=>'bi-box-seam','value'=>$totalProducts,'description'=>'Produk aktif','bg_color'=>'linear-gradient(135deg, #2193b0 0%, #6dd5ed 60%, #1e3c72 100%)'],
            ['title'=>'Jumlah Kategori','icon'=>'bi-tags','value'=>$totalCategories,'description'=>'Kategori tersedia','bg_color'=>'linear-gradient(135deg,  #fff700 0%, #ffe066 60%, #ffd700 100%)'],
            ['title'=>'Total Stok Produk','icon'=>'bi-stack','value'=>$totalStocks,'description'=>'Stok keseluruhan','bg_color'=>'linear-gradient(135deg,#ff5eae 0%, #d72660 60%, #7f53ac 100%)'],
            ['title'=>'Total Klik Produk','icon'=>'bi-graph-up','value'=>$totalClicks,'description'=>'Klik dalam 30 hari terakhir','bg_color'=>'linear-gradient(135deg, #38f9d7 0%, #00ffff 70%, #43e97b 100%)'],
        ];
        return view('admin.dashboard',compact('data'));
    }
}
