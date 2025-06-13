<?php

namespace Database\Factories;

use App\Models\Poin;
use App\Models\User;
use App\Models\Lokasi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Poin>
 */
class PoinFactory extends Factory
{
    protected $model = Poin::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'lokasi_id' => Lokasi::factory(),
            'jumlah_poin' => $this->faker->numberBetween(0, 1000),
        ];
    }
} 