<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('user', function (Blueprint $table) {
            $table->boolean('can_view_product')->default(false);
            $table->boolean('can_create_product')->default(false);
            $table->boolean('can_edit_product')->default(false);
            $table->boolean('can_delete_product')->default(false);
        });
    }

    public function down(): void
    {
        Schema::table('user', function (Blueprint $table) {
            $table->dropColumn([
                'can_view_product',
                'can_create_product',
                'can_edit_product',
                'can_delete_product'
            ]);
        });
    }
};