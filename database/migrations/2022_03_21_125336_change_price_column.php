<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Kelas anonim ini merupakan turunan dari kelas Migration Laravel.
// Ia mendefinisikan modifikasi struktur tabel dalam basis data.
return new class extends Migration
{
    /**
     * Jalankan migrasi.
     * Metode ini akan dieksekusi saat perintah migrasi dijalankan.
     *
     * @return void
     */
    public function up()
    {
        // Modifikasi tabel 'order_items'.
        Schema::table('order_items', function (Blueprint $table) {
            // Mengubah format kolom 'price' menjadi desimal dengan 14 digit total dan 4 angka di belakang koma.
            $table->decimal('price', 14, 4)->change();
        });

        // Modifikasi tabel 'payments'.
        Schema::table('payments', function (Blueprint $table) {
            // Mengubah format kolom 'amount' menjadi desimal dengan 14 digit total dan 4 angka di belakang koma.
            $table->decimal('amount', 14, 4)->change();
        });

        // Modifikasi tabel 'products'.
        Schema::table('products', function (Blueprint $table) {
            // Mengubah format kolom 'price' menjadi desimal dengan 14 digit total dan 2 angka di belakang koma.
            $table->decimal('price', 14, 2)->change();
        });
    }

    /**
     * Balikkan migrasi.
     * Metode ini akan dieksekusi saat perintah rollback migrasi dijalankan.
     *
     * @return void
     */
    public function down()
    {
        // Bagian ini biasanya digunakan untuk mengembalikan perubahan yang dibuat dalam metode up().
        // Dalam kasus ini, tidak ada instruksi spesifik untuk mengembalikan perubahan format kolom.
        // Pemulihan ke format asli harus ditangani secara manual jika diperlukan.
        Schema::table('order_items', function (Blueprint $table) {
            // Kode untuk mengembalikan perubahan (jika diperlukan).
        });
        Schema::table('payments', function (Blueprint $table) {
            // Kode untuk mengembalikan perubahan (jika diperlukan).
        });
        Schema::table('products', function (Blueprint $table) {
            // Kode untuk mengembalikan perubahan (jika diperlukan).
        });
    }
};
