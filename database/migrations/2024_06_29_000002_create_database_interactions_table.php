<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('database_interactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users', 'user_id')->onDelete('cascade');
            $table->string('action_type'); // create, read, update, delete
            $table->string('table_name');
            $table->unsignedBigInteger('record_id')->nullable();
            $table->json('details')->nullable();
            $table->string('status')->default('success');
            $table->timestamps();

            $table->index(['user_id', 'created_at']);
            $table->index(['table_name', 'action_type']);
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('database_interactions');
    }
};