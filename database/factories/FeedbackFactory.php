<?php

namespace Database\Factories;

use App\Models\Feedback;
use App\Models\User;
use App\Models\Artikel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Feedback>
 */
class FeedbackFactory extends Factory
{
    protected $model = Feedback::class;

    public function definition(): array
    {
        return [
            'komentar' => $this->faker->sentence(),
            'user_id' => User::factory(),
            'artikel_id' => Artikel::factory(),
            'created_at' => now(),
        ];
    }
} 