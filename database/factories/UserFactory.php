<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

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
            'password' => static::$password ??= Hash::make('password'),
            'no_hp' => fake()->numerify('08##########'),
            'role' => fake()->randomElement(['admin','nasabah','pengelola']),
            'points' => fake()->numberBetween(0, 10000),
            'deskripsi_toko' => fake()->optional()->paragraph(),
            'alamat_toko' => fake()->optional()->address(),
            'jam_operasional' => fake()->optional()->regexify('[0-9]{2}:00 - [0-9]{2}:00'),
            'nomor_rekening' => fake()->optional()->bankAccountNumber(),
            'nama_bank_rekening' => fake()->optional()->randomElement(['BCA','Mandiri','BNI','BRI','CIMB']),
            'foto_toko' => fake()->optional()->imageUrl(640,480,'business'),
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
