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
        // Check constraint untuk kolom email di tabel user
        DB::statement('ALTER TABLE user ADD CONSTRAINT check_email CHECK (email LIKE "%@%.%")');
        
        // Check constraint untuk kolom no_hp di tabel user (minimal 10 karakter)
        DB::statement('ALTER TABLE user ADD CONSTRAINT check_no_hp CHECK (LENGTH(no_hp) >= 10)');
        
        // Check constraint untuk kolom harga di tabel produk (minimal 0)
        DB::statement('ALTER TABLE produk ADD CONSTRAINT check_harga CHECK (harga >= 0)');
        
        // Check constraint untuk kolom suka di tabel produk (minimal 0)
        DB::statement('ALTER TABLE produk ADD CONSTRAINT check_suka CHECK (suka >= 0)');
        
        // Check constraint untuk kolom jumlah_produk di tabel transaksi (minimal 1)
        DB::statement('ALTER TABLE transaksi ADD CONSTRAINT check_jumlah_produk CHECK (jumlah_produk > 0)');
        
        // Check constraint untuk kolom harga_total di tabel transaksi (minimal 0)
        DB::statement('ALTER TABLE transaksi ADD CONSTRAINT check_harga_total CHECK (harga_total >= 0)');
        
        // Check constraint untuk kolom poin_used dan pay_method di tabel transaksi
        DB::statement('ALTER TABLE transaksi ADD CONSTRAINT check_poin_used_pay_method CHECK (
            (pay_method = "poin" AND poin_used > 0) OR 
            (pay_method = "transfer" AND (poin_used IS NULL OR poin_used = 0))
        )');
        
        // Check constraint untuk kolom jumlah_poin di tabel poin (minimal 0)
        DB::statement('ALTER TABLE poin ADD CONSTRAINT check_jumlah_poin CHECK (jumlah_poin >= 0)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop semua check constraints
        DB::statement('ALTER TABLE user DROP CONSTRAINT check_email');
        DB::statement('ALTER TABLE user DROP CONSTRAINT check_no_hp');
        DB::statement('ALTER TABLE produk DROP CONSTRAINT check_harga');
        DB::statement('ALTER TABLE produk DROP CONSTRAINT check_suka');
        DB::statement('ALTER TABLE transaksi DROP CONSTRAINT check_jumlah_produk');
        DB::statement('ALTER TABLE transaksi DROP CONSTRAINT check_harga_total');
        DB::statement('ALTER TABLE transaksi DROP CONSTRAINT check_poin_used_pay_method');
        DB::statement('ALTER TABLE poin DROP CONSTRAINT check_jumlah_poin');
    }
}; 