<?php

namespace Database\Factories;

use App\Models\ProdukGambar;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProdukGambar>
 */
class ProdukGambarFactory extends Factory
{
    protected $model = ProdukGambar::class;

    public function definition(): array
    {
        return [
            'produk_id' => Produk::factory(),
            'file_path' => $this->faker->randomElement(['products/bottle.jpeg','products/cairan1.jpg','products/jeruk.jpg','products/ecoenzim1.jpg','products/spray.jpeg','products/spray1.jpeg'])
        ];
    }
} 