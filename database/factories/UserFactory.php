<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'no_hp' => fake()->phoneNumber(),
            'role' => fake()->randomElement(['admin', 'nasabah', 'pengelola']),
            'points' => fake()->numberBetween(0, 1000),
            'deskripsi_toko' => fake()->optional()->paragraph(),
            'jam_operasional' => fake()->optional()->time(),
            'nomor_rekening' => fake()->optional()->bankAccountNumber(),
            'nama_bank_rekening' => fake()->optional()->randomElement(['BCA', 'BNI', 'BRI', 'Mandiri']),
            'foto_toko' => fake()->optional()->imageUrl(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
