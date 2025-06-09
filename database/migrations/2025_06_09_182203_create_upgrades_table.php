<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpgradesTable extends Migration
{

    public function up(): void
    {
        Schema::create('upgrades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('user_id')->on('user')->onDelete('cascade');
            $table->string('nama_bank_sampah');
            $table->text('alamat_lengkap');
            $table->string('kota');
            $table->text('alasan_pengajuan');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });

    }


    public function down(): void
    {
        Schema::dropIfExists('upgrades');
    }
};
