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
        Schema::dropIfExists('artikel_gambar');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('artikel_gambar', function (Blueprint $table) {
            $table->id('artikel_gambar_id');
            $table->foreignId('artikel_id')->constrained('artikel', 'artikel_id')->cascadeOnDelete();
            $table->string('file_path');
            $table->string('judul');
            $table->timestamps();
        });
    }
};
