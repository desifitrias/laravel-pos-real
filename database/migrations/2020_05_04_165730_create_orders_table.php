<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Kelas anonim ini adalah turunan dari kelas Migration.
// Ia mendefinisikan struktur tabel 'orders' dalam basis data.
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
        // Membuat tabel baru dengan nama 'orders' di dalam basis data.
        Schema::create('orders', function (Blueprint $table) {
            // Menambahkan kolom ID sebagai primary key yang auto-increment
            $table->id();
            // Menambahkan kolom 'customer_id' sebagai foreign key yang merujuk ke tabel 'customers'
            // Kolom ini dapat bernilai null
            $table->foreignId('customer_id')->nullable();
            // Menambahkan kolom 'user_id' sebagai foreign key yang merujuk ke tabel 'users'
            $table->foreignId('user_id');
            // Menambahkan timestamps (created_at dan updated_at)
            $table->timestamps();

            // Mendefinisikan foreign key 'customer_id' dengan referensi 'id' pada tabel 'customers'
            // Jika record customer dihapus, nilai pada kolom ini akan diatur menjadi null
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');
            // Mendefinisikan foreign key 'user_id' dengan referensi 'id' pada tabel 'users'
            // Jika record user dihapus, maka record order yang berkaitan juga akan dihapus (cascade delete)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        // Menghapus tabel 'orders' jika migrasi di-rollback
        Schema::dropIfExists('orders');
    }
};
