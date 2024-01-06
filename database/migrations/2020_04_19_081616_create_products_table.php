<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     *
     * @return void
     */
    public function up()
    {
        // Membuat tabel 'products' dalam basis data
        Schema::create('products', function (Blueprint $table) {
            // Menambahkan kolom ID sebagai primary key yang auto-increment
            $table->id();
            // Menambahkan kolom 'name' sebagai string
            $table->string('name');
            // Menambahkan kolom 'description' sebagai teks, dapat bernilai null
            $table->text('description')->nullable();
            // Menambahkan kolom 'image' sebagai string, dapat bernilai null
            $table->string('image')->nullable();
            // Menambahkan kolom 'barcode' sebagai string yang unik
            $table->string('barcode')->unique();
            // Menambahkan kolom 'price' dengan tipe data desimal
            $table->decimal('price', 8, 2);
            // Menambahkan kolom 'status' sebagai boolean dengan nilai default true
            $table->boolean('status')->default(true);
            // Menambahkan timestamps (created_at dan updated_at)
            $table->timestamps();
        });
    }

    /**
     * Balikkan migrasi.
     *
     * @return void
     */
    public function down()
    {
        // Menghapus tabel 'products' jika migrasi dirollback
        Schema::dropIfExists('products');
    }
};
