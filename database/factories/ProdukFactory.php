<?php

namespace Database\Factories;

use App\Models\Produk;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Produk>
 */
class ProdukFactory extends Factory
{
    protected $model = Produk::class;

    public function definition(): array
    {
        $nama = 'Produk ' . $this->faker->unique()->word();
        return [
            'nama_produk' => $nama,
            'kategori' => $this->faker->randomElement(['eco_enzim','sembako']),
            'status_ketersediaan' => $this->faker->randomElement(['Available','Unavailable']),
            'harga' => $this->faker->numberBetween(5000, 100000),
            'suka' => $this->faker->numberBetween(0, 100),
            'deskripsi' => $this->faker->paragraph(),
            'user_id' => User::factory(),
        ];
    }
} 