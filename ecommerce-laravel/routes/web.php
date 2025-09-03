<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductAdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\DashboardController;
use App\Models\Product;
use App\Models\Authentication;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');



// Rute untuk halaman utama
// Route::get('/customer-home', function () {
//     return view('home');
// })->name('customer-home');

Route::get('/', function () {
    return view('home');
})->name('home');
// Route::get('/home', function () {
//     return view('home');
// })->name('home');
// Rute resource untuk Product. Ini otomatis membuat rute untuk:
// GET    /products                -> index  (menampilkan daftar semua produk)
// GET    /products/{product}      -> show   (menampilkan detail satu produk)
// POST   /products                -> store
// PUT/PATCH /products/{product}   -> update
// DELETE /products/{product}      -> destroy
Route::resource('products', ProductController::class);


//laravel breeze default

Route::middleware('auth')->group(function () {
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('admin-products', ProductAdminController::class)->parameters([
            'admin-products' => 'product'
        ]);

        Route::resource('product-category', ProductCategoryController::class);
    });
    Route::middleware('customer')->group(function () {

        Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
        Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');


        // Rute untuk halaman statis lainnya
        Route::get('/cart', function () {
            return view('cart');
        })->name('cart');

        Route::get('/checkout', function () {
            return view('checkout');
        })->name('checkout');
    });
Route::resource('profile', ProfileController::class)->only([
    'edit', 'update', 'destroy']);
});

require __DIR__ . '/auth.php';
