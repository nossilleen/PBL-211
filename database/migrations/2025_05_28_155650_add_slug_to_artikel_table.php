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
        Schema::table('artikel', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('judul');
            $table->string('kategori')->change(); // Mengubah tipe data kolom kategori menjadi varchar
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('artikel', function (Blueprint $table) {
            $table->string('kategori')->change(); // Memastikan tipe data kategori tetap varchar saat rollback
        });
    }
};
