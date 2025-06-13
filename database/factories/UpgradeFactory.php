<?php

namespace Database\Factories;

use App\Models\Upgrade;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Upgrade>
 */
class UpgradeFactory extends Factory
{
    protected $model = Upgrade::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'nama_bank_sampah' => 'Bank Sampah ' . $this->faker->word(),
            'alamat_lengkap' => $this->faker->address(),
            'kota' => $this->faker->city(),
            'alasan_pengajuan' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['pending','approved','rejected']),
        ];
    }
} 