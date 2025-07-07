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
        Schema::create('user', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('nama', 50);
            $table->string('email', 100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255);
            $table->string('no_hp', 15);
            $table->rememberToken();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->date('tanggal_lahir')->nullable(); 
            $table->string('alamat', 255)->nullable();
            $table->string('kecamatan', 100)->nullable();
            $table->string('kelurahan', 100)->nullable();
            $table->string('kode_pos', 10)->nullable();

            $table->enum('role', ['admin', 'nasabah', 'pengelola'])->default('nasabah');
            $table->unsignedBigInteger('points')->default(0);
            $table->text('deskripsi_toko')->nullable();
            $table->string('jam_operasional')->nullable();
            $table->string('nomor_rekening')->nullable();
            $table->string('nama_bank_rekening')->nullable();
            $table->string('foto_toko')->nullable();
            $table->string('foto')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->index('nama', 'idx_user_nama');
            $table->index('role', 'idx_user_role');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        // ---- Check constraints ----
        DB::statement('ALTER TABLE `user` ADD CONSTRAINT check_email CHECK (email LIKE "%@%.%")');
        DB::statement('ALTER TABLE `user` ADD CONSTRAINT check_no_hp CHECK (CHAR_LENGTH(no_hp) >= 10)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');

        // Drop constraints first (if exist)
        DB::statement('ALTER TABLE `user` DROP CONSTRAINT IF EXISTS check_email');
        DB::statement('ALTER TABLE `user` DROP CONSTRAINT IF EXISTS check_no_hp');
    }
};
