<?php

namespace Database\Factories;

use App\Models\Artikel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Artikel>
 */
class ArtikelFactory extends Factory
{
    protected $model = Artikel::class;

    public function definition(): array
    {
        $judul = $this->faker->sentence();
        return [
            'kategori' => $this->faker->randomElement(['event','artikel']),
            'judul' => $judul,
            'konten' => '<p>'.implode('</p><p>',$this->faker->paragraphs(rand(3,7))).'</p>',
            'tanggal_publikasi' => $this->faker->date(),
            'user_id' => User::factory(),
        ];
    }
} 