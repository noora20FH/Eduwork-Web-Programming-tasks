<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;
use App\Models\Authentication;


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
Route::get('/customer-home', function () {
    return view('home');
})->name('customer-home');

Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/home', function () {
    return view('home');
})->name('home');
// Rute resource untuk Product. Ini otomatis membuat rute untuk:
// GET    /products                -> index  (menampilkan daftar semua produk)
// GET    /products/{product}      -> show   (menampilkan detail satu produk)
// POST   /products                -> store
// PUT/PATCH /products/{product}   -> update
// DELETE /products/{product}      -> destroy
Route::resource('products', ProductController::class);

// Rute untuk Order.
// GET    /orders                  -> index  (menampilkan daftar pesanan)
// GET    /orders/{order}          -> show   (menampilkan detail satu pesanan)

// Route::get('/profile-edit', function () {
//     return view('profile.edit');
// })->name('profile-edit');

// Route::resource('profile', ProfileController::class)->only(['show', 'edit', 'update']);

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//laravel breeze default
Route::middleware('auth')->group(function () {
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');

    // Rute untuk halaman statis lainnya
    Route::get('/cart', function () {
        return view('cart');
    })->name('cart');

    Route::get('/checkout', function () {
        return view('checkout');
    })->name('checkout');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
