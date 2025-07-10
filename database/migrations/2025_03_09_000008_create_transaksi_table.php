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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('transaksi_id');
            $table->foreignId('user_id')->constrained('user', 'user_id');
            $table->foreignId('lokasi_id')->nullable()->constrained('lokasi', 'lokasi_id');
            $table->foreignId('produk_id')->constrained('produk', 'produk_id');
            $table->integer('jumlah_produk')->unsigned()->default(1);
            $table->integer('harga_total')->unsigned();
            $table->integer('poin_used')->unsigned()->nullable();
            $table->unsignedInteger('estimasi_hari')->nullable();
            $table->dateTime('tanggal');
            // Status sudah termasuk 'diproses' sesuai migrasi 2025_07_10_000001
            $table->enum('status', [
                'belum dibayar',
                'menunggu konfirmasi',
                'diproses',
                'sedang dikirim',
                'selesai',
                'dibatalkan'
            ])->default('belum dibayar');
            $table->enum('pay_method', ['transfer', 'poin'])->default('transfer');
            $table->string('bukti_transfer', 255)->nullable()->comment('Path file bukti transfer');
            $table->timestamps();
            
            $table->index('tanggal', 'idx_transaksi_tanggal');
            $table->index('status', 'idx_transaksi_status');
        });

        // ---- Check constraints ----
        DB::statement('ALTER TABLE `transaksi` ADD CONSTRAINT check_jumlah_produk CHECK (jumlah_produk > 0)');
        DB::statement('ALTER TABLE `transaksi` ADD CONSTRAINT check_harga_total CHECK (harga_total >= 0)');
        DB::statement("ALTER TABLE `transaksi` ADD CONSTRAINT check_poin_used_pay_method CHECK ((pay_method = 'poin' AND poin_used > 0) OR (pay_method = 'transfer' AND (poin_used IS NULL OR poin_used = 0)))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');

        // Drop constraints jika ada (urutan drop constraint setelah drop table tidak berpengaruh, tapi tetap dicantumkan)
        DB::statement('ALTER TABLE `transaksi` DROP CONSTRAINT IF EXISTS check_poin_used_pay_method');
        DB::statement('ALTER TABLE `transaksi` DROP CONSTRAINT IF EXISTS check_harga_total');
        DB::statement('ALTER TABLE `transaksi` DROP CONSTRAINT IF EXISTS check_jumlah_produk');
    }
};