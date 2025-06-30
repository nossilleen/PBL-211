<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('database_connections')) {
            Schema::create('database_connections', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained('user', 'user_id')->onDelete('cascade');
                $table->string('ip_address');
                $table->string('connection_type'); // web, api, console
                $table->string('status'); // connected, disconnected, failed
                $table->text('device_info')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('database_connections');
    }
};