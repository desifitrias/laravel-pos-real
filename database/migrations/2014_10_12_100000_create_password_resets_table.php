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
        // Membuat tabel 'password_resets' dalam database
        Schema::create('password_resets', function (Blueprint $table) {
            // Menambahkan kolom 'email' dan membuatnya sebagai index
            $table->string('email')->index();
            // Menambahkan kolom 'token'
            $table->string('token');
            // Menambahkan kolom 'created_at' yang dapat bernilai null
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Balikkan migrasi.
     *
     * @return void
     */
    public function down()
    {
        // Menghapus tabel 'password_resets' jika migrasi dirollback
        Schema::dropIfExists('password_resets');
    }
};
