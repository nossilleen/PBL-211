<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('database_connections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('user', 'user_id')->onDelete('cascade');
            $table->string('ip_address');
            $table->string('connection_type');
            $table->string('status');
            $table->json('device_info')->nullable();
            $table->timestamps();
            
            $table->index(['user_id', 'created_at']);
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('database_connections');
    }
};