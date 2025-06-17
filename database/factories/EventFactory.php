<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Event>
 */
class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraphs(3, true),
            'image' => 'images/events/1.png',
            'date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'location' => $this->faker->city(),
        ];
    }
} 