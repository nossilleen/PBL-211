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
        Schema::create('poin', function (Blueprint $table) {
            $table->id('poin_id');
            $table->foreignId('user_id')->constrained('user', 'user_id')->cascadeOnDelete();
            $table->foreignId('lokasi_id')->constrained('lokasi', 'lokasi_id')->cascadeOnDelete();
            $table->integer('jumlah_poin')->unsigned()->default(0);
            $table->timestamps();
            
            $table->unique(['user_id', 'lokasi_id'], 'user_lokasi_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poin');
    }
}; 