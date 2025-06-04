<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            // Pastikan kolom-kolom yang diperlukan ada
            if (!Schema::hasColumn('events', 'title')) {
                $table->string('title');
            }
            if (!Schema::hasColumn('events', 'description')) {
                $table->text('description');
            }
            if (!Schema::hasColumn('events', 'image')) {
                $table->string('image')->nullable();
            }
            if (!Schema::hasColumn('events', 'date')) {
                $table->dateTime('date');
            }
            if (!Schema::hasColumn('events', 'location')) {
                $table->string('location');
            }
        });
    }

    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            // Tidak perlu menghapus kolom di sini
        });
    }
}; 