<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Kelas anonim ini adalah turunan dari kelas Migration.
// Ia mendefinisikan struktur tabel 'order_items' dalam basis data.
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
        // Membuat tabel baru dengan nama 'order_items' di dalam basis data.
        Schema::create('order_items', function (Blueprint $table) {
            // Menambahkan kolom ID sebagai primary key yang auto-increment
            $table->id();
            // Menambahkan kolom 'price' dengan tipe data desimal
            // Format desimal adalah 8 digit dengan 4 angka di belakang koma
            $table->decimal('price', 8, 4);
            // Menambahkan kolom 'quantity' dengan tipe data integer
            // Nilai default untuk 'quantity' adalah 1
            $table->integer('quantity')->default(1);
            // Menambahkan kolom 'order_id' sebagai foreign key yang merujuk ke tabel 'orders'
            $table->foreignId('order_id');
            // Menambahkan kolom 'product_id' sebagai foreign key yang merujuk ke tabel 'products'
            $table->foreignId('product_id');
            // Menambahkan timestamps (created_at dan updated_at)
            $table->timestamps();

            // Mendefinisikan foreign key 'order_id' dengan referensi 'id' pada tabel 'orders'
            // Jika record order dihapus, maka record order item yang berkaitan juga akan dihapus (cascade delete)
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            // Mendefinisikan foreign key 'product_id' dengan referensi 'id' pada tabel 'products'
            // Jika record product dihapus, maka record order item yang berkaitan juga akan dihapus (cascade delete)
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
        // Menghapus tabel 'order_items' jika migrasi di-rollback
        Schema::dropIfExists('order_items');
    }
};
