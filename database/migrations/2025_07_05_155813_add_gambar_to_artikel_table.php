<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('artikel', function (Blueprint $table) {
            $table->string('gambar')->nullable()->after('konten');
        });

        // Migrate existing data from ArtikelGambar to artikel.gambar
        $artikelGambars = DB::table('artikel_gambar')->get();
        
        foreach ($artikelGambars as $artikelGambar) {
            DB::table('artikel')
                ->where('artikel_id', $artikelGambar->artikel_id)
                ->update(['gambar' => $artikelGambar->file_path]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('artikel', function (Blueprint $table) {
            $table->dropColumn('gambar');
        });
    }
};
