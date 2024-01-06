<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Kelas anonim ini merupakan turunan dari kelas Migration.
// Ia mendefinisikan struktur tabel 'settings' dalam basis data.
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
        // Membuat tabel baru dengan nama 'settings' di dalam basis data.
        Schema::create('settings', function (Blueprint $table) {
            // Menambahkan kolom ID sebagai primary key yang auto-increment
            $table->id();
            // Menambahkan kolom 'key' sebagai string dan harus unik
            $table->string('key')->unique();
            // Menambahkan kolom 'value' sebagai teks, dapat bernilai null
            $table->text('value')->nullable();
            // Menambahkan timestamps (created_at dan updated_at)
            $table->timestamps();
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
        // Menghapus tabel 'settings' jika migrasi di-rollback
        Schema::dropIfExists('settings');
    }
};
