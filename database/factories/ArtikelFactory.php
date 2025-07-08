<?php

namespace Database\Factories;

use App\Models\Artikel;
use App\Models\User;
use Illuminate\Support\Str;
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
        $slug  = Str::slug($judul.'-'.$this->faker->unique()->randomNumber());

        return [
            'kategori' => $this->faker->randomElement(['Eco Enzim','Bank Sampah', 'Tips & Trik', 'Berita']),
            'judul' => $judul,
            'slug'  => $slug,
            'konten' => '<p>'.implode('</p><p>',$this->faker->paragraphs(rand(3,7))).'</p>',
            'tanggal_publikasi' => $this->faker->date(),
            'user_id' => User::factory(),
            'gambar' => $this->faker->randomElement(['storage/artikel_gambar/default1.jpg','storage/artikel_gambar/default2.jpg', 'storage/artikel_gambar/default3.jpeg'])
        ];
    }
} 