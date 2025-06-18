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
            'file_path' => 'products/1.png',
        ];
    }
} 