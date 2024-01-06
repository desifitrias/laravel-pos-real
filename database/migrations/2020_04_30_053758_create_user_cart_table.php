<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Kelas anonim ini merupakan turunan dari kelas Migration.
// Ia mendefinisikan struktur tabel 'user_cart' dalam basis data.
return new class extends Migration
{
    /**
     * Jalankan migrasi.
     * Metode ini dipanggil ketika migrasi dijalankan.
     *
     * @return void
     */
    public function up()
    {
        // Membuat tabel baru dengan nama 'user_cart' di dalam basis data.
        Schema::create('user_cart', function (Blueprint $table) {
            // Menambahkan kolom 'user_id' sebagai foreign key
            // Merujuk ke kolom 'id' pada tabel 'users'
            $table->foreignId('user_id');
            // Menambahkan kolom 'product_id' sebagai foreign key
            // Merujuk ke kolom 'id' pada tabel 'products'
            $table->foreignId('product_id');
            // Menambahkan kolom 'quantity' untuk menyimpan jumlah produk
            // Tipe data unsigned integer (hanya menerima nilai positif)
            $table->unsignedInteger('quantity');

            // Mendefinisikan foreign key 'user_id' dengan referensi 'id' pada tabel 'users'
            // Jika record user dihapus, maka record terkait di tabel 'user_cart' juga akan dihapus
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // Mendefinisikan foreign key 'product_id' dengan referensi 'id' pada tabel 'products'
            // Jika record produk dihapus, maka record terkait di tabel 'user_cart' juga akan dihapus
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Balikkan migrasi.
     * Metode ini dipanggil ketika migrasi di-rollback.
     *
     * @return void
     */
    public function down()
    {
        // Menghapus tabel 'user_cart' jika migrasi di-rollback
        Schema::dropIfExists('user_cart');
    }
};
