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
        // Membuat tabel 'failed_jobs' dalam database
        Schema::create('failed_jobs', function (Blueprint $table) {
            // Menambahkan kolom ID sebagai primary key yang auto-increment
            $table->id();
            // Menambahkan kolom 'connection' sebagai text
            $table->text('connection');
            // Menambahkan kolom 'queue' sebagai text
            $table->text('queue');
            // Menambahkan kolom 'payload' sebagai longText
            $table->longText('payload');
            // Menambahkan kolom 'exception' sebagai longText
            $table->longText('exception');
            // Menambahkan kolom 'failed_at' dengan timestamp saat ini sebagai default
            $table->timestamp('failed_at')->useCurrent();
        });
    }

    /**
     * Balikkan migrasi.
     *
     * @return void
     */
    public function down()
    {
        // Menghapus tabel 'failed_jobs' jika migrasi dirollback
        Schema::dropIfExists('failed_jobs');
    }
};
