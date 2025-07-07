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
        // Tambah nilai enum baru "superadmin" pada kolom role
        DB::statement("ALTER TABLE `user` MODIFY `role` ENUM('superadmin','admin','nasabah','pengelola') DEFAULT 'nasabah'");

        // Tambah kolom izin khusus admin
        Schema::table('user', function (Blueprint $table) {
            $table->boolean('can_create_article')->default(true)->after('role');
            $table->boolean('can_create_event')->default(true)->after('can_create_article');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus kolom izin terlebih dahulu
        Schema::table('user', function (Blueprint $table) {
            $table->dropColumn(['can_create_article', 'can_create_event']);
        });

        // Kembalikan enum role seperti semula
        DB::statement("ALTER TABLE `user` MODIFY `role` ENUM('admin','nasabah','pengelola') DEFAULT 'nasabah'");
    }
}; 