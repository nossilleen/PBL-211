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
        $firstName = fake()->unique()->firstName();
        $emailLocal = Str::slug($firstName, '');

        $role = fake()->randomElement(['superadmin', 'admin', 'nasabah', 'pengelola']);

        // Define available images for each role
        $nasabahImages = [
            'Logo1.jpeg'
        ];
        $pengelolaImages = [
            'Logo1.jpeg'
        ];
        

        $fotoToko = 'Logo1.jpeg';
        if ($role === 'nasabah') {
            $fotoToko = 'profil/' . fake()->randomElement($nasabahImages);
        } elseif ($role === 'pengelola') {
            $fotoToko = 'toko-photos/' . fake()->randomElement($pengelolaImages);
        } else {
            $fotoToko = 'toko-photos/Logo1.jpeg';
        }

        return [
            'nama' => $firstName,
            'email' => strtolower($emailLocal).'@gmail.com',
            // 'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            // Nomor HP: hanya digit, max 15 karakter sesuai schema
            'no_hp' => '08'.fake()->numerify('###########'),
            'role' => $role,
            'points' => fake()->numberBetween(0, 1000),
            'deskripsi_toko' => fake()->optional()->paragraph(),
            'jam_operasional' => fake()->optional()->time(),
            'nomor_rekening' => fake()->optional()->bankAccountNumber(),
            'nama_bank_rekening' => fake()->optional()->randomElement(['BCA', 'BNI', 'BRI', 'Mandiri']),
            'foto_toko' => $fotoToko,
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
