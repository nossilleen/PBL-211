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
            'file_path' => $this->faker->randomElement(['products/bottle.jpeg','products/jet.jpg','products/pesticide.jpg','products/soap.jpg','products/spray.jpg','products/spray1.jpg'])
        ];
    }
} 