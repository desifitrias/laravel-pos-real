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
        // Membuat tabel 'personal_access_tokens' dalam database
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            // Menambahkan kolom ID sebagai primary key yang auto-increment
            $table->id();
            // Menambahkan kolom 'tokenable' sebagai polymorphic relation
            $table->morphs('tokenable');
            // Menambahkan kolom 'name'
            $table->string('name');
            // Menambahkan kolom 'token' dengan panjang 64 karakter dan bersifat unik
            $table->string('token', 64)->unique();
            // Menambahkan kolom 'abilities' yang dapat bernilai null
            $table->text('abilities')->nullable();
            // Menambahkan kolom 'last_used_at' yang dapat bernilai null
            $table->timestamp('last_used_at')->nullable();
            // Menambahkan kolom 'expires_at' yang dapat bernilai null
            $table->timestamp('expires_at')->nullable();
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
        // Menghapus tabel 'personal_access_tokens' jika migrasi dirollback
        Schema::dropIfExists('personal_access_tokens');
    }
};
