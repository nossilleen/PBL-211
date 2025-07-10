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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id('feedback_id');
            $table->string('komentar', 255);
            $table->foreignId('user_id')->constrained('user', 'user_id');
            $table->foreignId('artikel_id')->constrained('artikel', 'artikel_id');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')
                  ->references('feedback_id')
                  ->on('feedback')
                  ->onDelete('cascade');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};