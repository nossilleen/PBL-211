<?php

namespace Database\Factories;

use App\Models\ArtikelGambar;
use App\Models\Artikel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ArtikelGambar>
 */
class ArtikelGambarFactory extends Factory
{
    protected $model = ArtikelGambar::class;

    public function definition(): array
    {
        return [
            'artikel_id' => Artikel::factory(),
            'file_path' => 'images/artikel/' . $this->faker->uuid() . '.jpg',
            'judul' => $this->faker->sentence(3),
        ];
    }
} 