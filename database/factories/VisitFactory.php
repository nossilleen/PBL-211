<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Visit;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visit>
 */
class VisitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Visit::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'session_id' => $this->faker->sha1,
            'ip_address' => $this->faker->ipv4,
            'user_agent' => $this->faker->userAgent,
            'url' => $this->faker->randomElement(['/', '/artikel', '/events', '/browse', '/product/1', '/store/1']),
            'user_id' => null, // Kita biarkan null untuk mensimulasikan pengunjung anonim
        ];
    }
}
