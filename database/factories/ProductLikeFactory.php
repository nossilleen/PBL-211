<?php

namespace Database\Factories;

use App\Models\ProductLike;
use App\Models\User;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProductLike>
 */
class ProductLikeFactory extends Factory
{
    protected $model = ProductLike::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'produk_id' => Produk::factory(),
        ];
    }
} 