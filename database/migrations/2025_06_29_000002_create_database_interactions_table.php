<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('database_interactions')) {
            Schema::create('database_interactions', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained('user', 'user_id')->onDelete('cascade');
                $table->enum('action_type', ['create', 'read', 'update', 'delete']);
                $table->string('table_name');
                $table->string('record_id')->nullable();
                $table->json('details')->nullable();
                $table->string('status'); // success, failed
                $table->timestamps();
                
                $table->index(['user_id', 'action_type']);
                $table->index('created_at');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('database_interactions');
    }
};