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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('transaksi_id');
            $table->foreignId('user_id')->constrained('user', 'user_id');
            $table->foreignId('lokasi_id')->constrained('lokasi', 'lokasi_id');
            $table->foreignId('produk_id')->constrained('produk', 'produk_id');
            $table->integer('jumlah_produk')->unsigned()->default(1);
            $table->integer('harga_total')->unsigned();
            $table->integer('poin_used')->unsigned()->nullable();
            $table->dateTime('tanggal');
            $table->enum('status', ['belum dibayar', 'menunggu konfirmasi', 'sedang dikirim', 'selesai', 'dibatalkan'])->default('belum dibayar');
            $table->enum('pay_method', ['transfer', 'poin'])->default('transfer');
            $table->string('bukti_transfer', 255)->nullable()->comment('Path file bukti transfer');
            $table->timestamps();
            
            $table->index('tanggal', 'idx_transaksi_tanggal');
            $table->index('status', 'idx_transaksi_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
}; 