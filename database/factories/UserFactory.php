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

        // Data spesifik Kepulauan Riau
        $cities = ['Batam', 'Tanjung Pinang', 'Bintan', 'Karimun', 'Natuna', 'Lingga'];
        $districts = ['Batam Kota', 'Sekupang', 'Lubuk Baja', 'Sagulung', 'Bengkong', 'Nongsa'];
        $villages = ['Baloi Permai', 'Tiban Lama', 'Tiban Baru', 'Tanjung Sengkuang', 'Mangsang', 'Kabil'];

        $jenisKelamin = $this->faker->randomElement(['Laki-laki', 'Perempuan']);
        $tanggalLahir = $this->faker->dateTimeBetween('-45 years', '-18 years')->format('Y-m-d');
        $alamatLengkap = $this->faker->streetAddress().', '.$this->faker->randomElement($villages).', '.$this->faker->randomElement($districts).', '.$this->faker->randomElement($cities).', Kepulauan Riau';
        $kecamatan = $this->faker->randomElement($districts);
        $kelurahan = $this->faker->randomElement($villages);
        $kodePos = '29'.$this->faker->numberBetween(400, 499); // Kode pos di Batam 294xx

        $canCreateArticle = in_array($role, ['superadmin','admin']);
        $canCreateEvent   = in_array($role, ['superadmin','admin']);
        // Ambil semua file gambar dari /storage/app/public/profile/ dengan ekstensi .jpeg, .jpg, atau .png
        $profileDir = storage_path('app/public/profile');
        $profileImages = [];
        if (is_dir($profileDir)) {
            $profileImages = collect(scandir($profileDir))
                ->filter(function ($file) {
                    return preg_match('/\.(jpe?g|png)$/i', $file);
                })
                ->values()
                ->all();
        }
        // Jika tidak ada gambar, fallback ke default
        $fotoProfil = count($profileImages) > 0
            ? 'profil/' . $this->faker->randomElement($profileImages)
            : 'profil/default.jpg';

        // Expired at (contoh: akun pengelola kadaluarsa dalam 1-2 tahun), lainnya null
        $expiredAt = $role === 'pengelola' ? $this->faker->dateTimeBetween('+1 years','+2 years') : null;

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

            // Kolom tambahan
            'foto' => $fotoProfil,
            'jenis_kelamin' => $jenisKelamin,
            'tanggal_lahir' => $tanggalLahir,
            'alamat' => $alamatLengkap,
            'kecamatan' => $kecamatan,
            'kelurahan' => $kelurahan,
            'kode_pos' => (string)$kodePos,
            'can_create_article' => $canCreateArticle,
            'can_create_event' => $canCreateEvent,
            'expired_at' => $expiredAt,
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
