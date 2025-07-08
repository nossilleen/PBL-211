<?php

namespace Database\Factories;

use App\Models\Lokasi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Lokasi>
 */
class LokasiFactory extends Factory
{
    protected $model = Lokasi::class;

    public function definition(): array
    {
        // Koordinat kasar Kepulauan Riau (lat 0.8–3.8, long 103–106)
        $latitude  = $this->faker->randomFloat(7, 0.8, 3.8);
        $longitude = $this->faker->randomFloat(7, 103.0, 106.0);

        // Pilihan nama kecamatan untuk variasi
        $districts = ['Batam Kota', 'Sekupang', 'Lubuk Baja', 'Sagulung', 'Bengkong', 'Nongsa'];

        return [
            'nama_lokasi' => 'Bank Sampah ' . $this->faker->randomElement($districts),
            'alamat' => $this->faker->streetAddress().', '.$this->faker->randomElement($districts).', Batam, Kepulauan Riau',
            'latitude' => $latitude,
            'longitude' => $longitude,
            // Biarkan factory membuat user pengelola terkait jika tidak diberikan
            'user_id' => \App\Models\User::factory()->state(['role' => 'pengelola'])
        ];
    }
} 