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
        Schema::create('artikel', function (Blueprint $table) {
            $table->id('artikel_id');
            $table->string('kategori');
            $table->string('judul', 255);
            $table->string('slug')->nullable();
            $table->longText('konten');
            $table->string('gambar')->nullable();
            $table->date('tanggal_publikasi');
            $table->foreignId('user_id')->comment('Admin yang membuat artikel')->constrained('user', 'user_id')->cascadeOnDelete();
            $table->timestamps();
            
            $table->index('judul', 'idx_artikel_judul');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikel');
    }
}; 