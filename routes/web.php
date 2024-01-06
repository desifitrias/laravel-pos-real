<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Mengarahkan dari root URL ke '/admin'
Route::get('/', function () {
    return redirect('/admin');
});

// Membuat otomatis rute untuk otentikasi (login, registrasi, dll)
Auth::routes();

// Grup rute untuk admin dengan prefix 'admin' dan middleware auth
Route::prefix('admin')->middleware('auth')->group(function () {
    // Dashboard atau halaman utama admin
    Route::get('/', [HomeController::class, 'index'])->name('home');
    
    // Rute untuk melihat dan menyimpan pengaturan
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'store'])->name('settings.store');
    
    // Rute CRUD untuk produk, pelanggan, dan pesanan
    Route::resource('products', ProductController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('orders', OrderController::class);

    // Rute untuk keranjang belanja: melihat, menambah, mengubah jumlah, menghapus item, dan mengosongkan keranjang
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::post('/cart/change-qty', [CartController::class, 'changeQty']);
    Route::delete('/cart/delete', [CartController::class, 'delete']);
    Route::delete('/cart/empty', [CartController::class, 'empty']);

    // Rute untuk mendapatkan terjemahan berdasarkan lokal untuk komponen React
    Route::get('/locale/{type}', function ($type) {
        $translations = trans($type);
        return response()->json($translations);
    });
});
