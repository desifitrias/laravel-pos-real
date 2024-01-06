<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Kelas anonim ini merupakan turunan dari kelas Migration Laravel.
// Ia mendefinisikan struktur tabel 'payments' untuk basis data.
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
        // Membuat tabel baru dengan nama 'payments'.
        Schema::create('payments', function (Blueprint $table) {
            // Menambahkan kolom ID sebagai primary key yang auto-increment.
            $table->id();
            // Menambahkan kolom 'amount' dengan tipe data desimal.
            // Format desimalnya adalah 8 digit dengan 4 angka di belakang koma.
            $table->decimal('amount', 8, 4);
            // Menambahkan kolom 'order_id' sebagai foreign key yang merujuk ke tabel 'orders'.
            $table->foreignId('order_id');
            // Menambahkan kolom 'user_id' sebagai foreign key yang merujuk ke tabel 'users'.
            $table->foreignId('user_id');
            // Menambahkan timestamps (created_at dan updated_at).
            $table->timestamps();

            // Mendefinisikan foreign key 'order_id' dengan referensi 'id' pada tabel 'orders'.
            // Jika record order dihapus, maka record pembayaran yang berkaitan juga akan dihapus (cascade delete).
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            // Mendefinisikan foreign key 'user_id' dengan referensi 'id' pada tabel 'users'.
            // Jika record user dihapus, maka record pembayaran yang berkaitan juga akan dihapus (cascade delete).
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        // Menghapus tabel 'payments' jika migrasi di-rollback.
        Schema::dropIfExists('payments');
    }
};
