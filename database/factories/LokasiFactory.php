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
        // Koordinat lebih presisi untuk area Kota Batam saja (sekitar lat 1.02–1.22, long 103.90–104.15)
        $latitude  = $this->faker->randomFloat(7, 1.02, 1.22);
        $longitude = $this->faker->randomFloat(7, 103.90, 104.15);

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