<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Kelas migrasi untuk membuat tabel 'customers'
return new class extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel.
     *
     * @return void
     */
    public function up()
    {
        // Membuat tabel 'customers' dengan struktur kolom tertentu
        Schema::create('customers', function (Blueprint $table) {
            $table->id();  // Menambahkan kolom ID sebagai primary key yang auto-increment
            $table->string('first_name', 20);  // Kolom untuk nama depan dengan panjang maksimum 20 karakter
            $table->string('last_name', 20);   // Kolom untuk nama belakang dengan panjang maksimum 20 karakter
            $table->string('email')->nullable();  // Kolom email, dapat bernilai null
            $table->string('phone')->nullable();  // Kolom nomor telepon, dapat bernilai null
            $table->string('address')->nullable();  // Kolom alamat, dapat bernilai null
            $table->string('avatar')->nullable();  // Kolom untuk avatar, dapat bernilai null
            $table->foreignId('user_id');  // Kolom foreign key yang merujuk ke tabel 'users'
            $table->timestamps();  // Menambahkan kolom 'created_at' dan 'updated_at'

            // Mendefinisikan foreign key constraint
            // Menghapus record customer jika record user terkait dihapus (cascade delete)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Balikkan migrasi, menghapus tabel 'customers'.
     *
     * @return void
     */
    public function down()
    {
        // Menghapus tabel 'customers' jika migrasi dirollback
        Schema::dropIfExists('customers');
    }
};
