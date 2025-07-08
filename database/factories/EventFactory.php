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
        // Mulai event antara -1 hingga +1 jam dari sekarang
        $startDate = $this->faker->dateTimeBetween('-1 hour', '+1 hour');
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraphs(3, true),
            'image' => $this->faker->randomElement([
                'storage/events/default1.jpg',
                'storage/events/default2.jpg',
                'storage/events/default3.jpeg'
            ]),
            'date' => $startDate,
            'expired_at' => (clone $startDate)->modify('+1 day'),
            'location' => $this->faker->city(),
            'link_form_acara' => $this->faker->randomElement([
                'https://docs.google.com/forms/d/e/1FAIpQLSfpfT_CKiwNJWW8XrrpyEuoDnhBSiYX-v5s6j5PGLzKLu2y4A/viewform?usp=dialog',
                ''
            ])
        ];
    }
} 
