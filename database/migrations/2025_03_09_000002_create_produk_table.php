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
        Schema::create('produk', function (Blueprint $table) {
            $table->id('produk_id');
            $table->string('nama_produk', 50);
            $table->enum('kategori', ['eco_enzim', 'sembako'])->default('eco_enzim');
            $table->enum('status_ketersediaan', ['Available', 'Unavailable'])->default('Available');
            $table->integer('harga')->unsigned();
            $table->integer('harga_points')->unsigned();
            $table->integer('suka')->unsigned()->default(0);
            $table->text('deskripsi')->nullable();
            $table->softDeletes();
            $table->foreignId('user_id')->nullable()->comment('Pengelola yang menyediakan produk')->constrained('user', 'user_id')->nullOnDelete();
            $table->timestamps();

            $table->index('nama_produk', 'idx_produk_nama');
            $table->index('status_ketersediaan', 'idx_produk_status');
            $table->index('kategori', 'idx_produk_kategori');
        });

        // ---- Check constraints ----
        DB::statement('ALTER TABLE `produk` ADD CONSTRAINT check_harga CHECK (harga >= 0)');
        DB::statement('ALTER TABLE `produk` ADD CONSTRAINT check_suka CHECK (suka >= 0)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');

        // Drop constraints first
        DB::statement('ALTER TABLE `produk` DROP CONSTRAINT IF EXISTS check_harga');
        DB::statement('ALTER TABLE `produk` DROP CONSTRAINT IF EXISTS check_suka');
    }
}; 