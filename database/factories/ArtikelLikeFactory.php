<?php

namespace Database\Factories;

use App\Models\ArtikelLike;
use App\Models\Artikel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ArtikelLike>
 */
class ArtikelLikeFactory extends Factory
{
    protected $model = ArtikelLike::class;

    public function definition(): array
    {
        return [
            'artikel_id' => Artikel::factory(),
            'user_id'    => User::factory(),
        ];
    }
} 