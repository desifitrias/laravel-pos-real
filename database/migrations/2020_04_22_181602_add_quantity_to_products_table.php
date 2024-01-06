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
        // Memodifikasi tabel 'products'
        Schema::table('products', function (Blueprint $table) {
            // Menambahkan kolom 'quantity' setelah kolom 'price'
            // dengan nilai default 1 dan tipe data integer
            $table->integer('quantity')->after('price')->default('1');
        });
    }

    /**
     * Balikkan migrasi.
     *
     * @return void
     */
    public function down()
    {
        // Menghapus kolom 'quantity' dari tabel 'products'
        // jika migrasi dirollback
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('quantity');
        });
    }
};
