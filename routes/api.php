<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Membuat rute API untuk mendapatkan data pengguna yang terotentikasi
Route::middleware('auth:api')->get('/user', function (Request $request) {
    // Mengembalikan data pengguna yang sedang login
    return $request->user();
});