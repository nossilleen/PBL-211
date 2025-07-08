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
            // Kolom 'user_id' bisa null (anonim) atau acak dari user yang ada
            'user_id' => $this->faker->optional(0.7)->randomElement(\App\Models\User::pluck('user_id')->toArray()),

            // Kolom 'date' sesuai tipe di tabel (date, bisa hari ini atau acak dalam 30 hari terakhir)
            'date' => $this->faker->dateTimeBetween('-30 days', 'now')->format('Y-m-d'),

            // Kolom 'created_at' dan 'updated_at' otomatis diisi oleh Laravel jika tidak diisi, 
            // tapi bisa juga diisi manual untuk keperluan seeding realistis
            'created_at' => $this->faker->dateTimeBetween('-30 days', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-30 days', 'now'),
        ];
    }
}
