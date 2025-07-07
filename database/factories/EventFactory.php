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
            'image' => $this->faker->randomElement(['storage/events/default1.jpg','storage/events/default2.jpg', 'storage/events/default3.jpeg']),
            'date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'location' => $this->faker->city(),
            'link_form_acara' => $this->faker->randomElement(['https://docs.google.com/forms/d/e/1FAIpQLSfpfT_CKiwNJWW8XrrpyEuoDnhBSiYX-v5s6j5PGLzKLu2y4A/viewform?usp=dialog',''])
        ];
    }
} 