<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('transaksi_tikets', function (Blueprint $table) {
        $table->id();
        $table->string('tipe_tiket');
        $table->integer('harga');
        $table->string('kuota_tersedia');
        $table->string('nama_lengkap');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_tikets');
    }
};
