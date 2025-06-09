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
        Schema::table('point_histories', function (Blueprint $table) {
            $table->enum('status', ['berhasil', 'pending', 'gagal'])->default('berhasil')->after('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('point_histories', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
