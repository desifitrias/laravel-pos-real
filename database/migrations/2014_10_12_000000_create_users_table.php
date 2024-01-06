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
        // Membuat tabel 'users' dalam database
        Schema::create('users', function (Blueprint $table) {
            // Menambahkan kolom ID sebagai primary key yang auto-increment
            $table->id();
            // Menambahkan kolom 'first_name' dan 'last_name' sebagai string
            $table->string('first_name');
            $table->string('last_name');
            // Menambahkan kolom 'email' yang unik
            $table->string('email')->unique();
            // Menambahkan kolom 'email_verified_at' untuk menandai verifikasi email, boleh null
            $table->timestamp('email_verified_at')->nullable();
            // Menambahkan kolom 'password'
            $table->string('password');
            // Menambahkan kolom untuk token 'remember me'
            $table->rememberToken();
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
        // Menghapus tabel 'users' jika migrasi dirollback
        Schema::dropIfExists('users');
    }
};
