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
        Schema::create('point_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('user_id')->on('user')->onDelete('cascade');
            $table->enum('transaction_type', ['credit', 'debit']);
            $table->unsignedBigInteger('amount');
            $table->string('description');
            $table->nullableMorphs('related');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('point_histories');
    }
};
