<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('user', function (Blueprint $table) {
            $table->text('deskripsi_toko')->nullable();
            $table->string('alamat_toko')->nullable();
            $table->string('jam_operasional')->nullable();
            $table->string('nomor_rekening')->nullable();
            $table->string('nama_bank_rekening')->nullable();
            $table->string('foto_toko')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('user', function (Blueprint $table) {
            $table->dropColumn([
                'deskripsi_toko',
                'alamat_toko',
                'jam_operasional',
                'nomor_rekening',
                'nama_bank_rekening',
                'foto_toko'
            ]);
        });
    }
};