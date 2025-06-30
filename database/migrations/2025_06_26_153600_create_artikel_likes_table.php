<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('artikel_likes', function (Blueprint $table) {
            $table->id();

            // Foreign key ke artikel.artikel_id
            $table->unsignedBigInteger('artikel_id');
            $table->foreign('artikel_id')
                  ->references('artikel_id')
                  ->on('artikel')
                  ->onDelete('cascade');

            // Foreign key ke user.user_id
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                  ->references('user_id')
                  ->on('user')
                  ->onDelete('cascade');

            $table->timestamps();

            // Supaya 1 user tidak bisa like artikel yang sama 2x
            $table->unique(['artikel_id', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('artikel_likes');
    }
};
