<?php

namespace Database\Factories;

use App\Models\Transaksi;
use App\Models\User;
use App\Models\Lokasi;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Transaksi>
 */
class TransaksiFactory extends Factory
{
    protected $model = Transaksi::class;

    public function definition(): array
    {
        $jumlah = $this->faker->numberBetween(1, 20);
        $harga = $this->faker->numberBetween(5000, 100000);
        $payMethod = $this->faker->randomElement(['transfer','poin']);
        $statusOptions = $payMethod === 'poin'
            ? ['menunggu konfirmasi', 'diproses', 'sedang dikirim', 'selesai']
            : ['belum dibayar', 'menunggu konfirmasi', 'diproses', 'sedang dikirim', 'selesai'];
        $status = $this->faker->randomElement($statusOptions);
        return [
            'user_id' => User::factory(),
            'lokasi_id' => Lokasi::factory(),
            'produk_id' => Produk::factory(),
            'jumlah_produk' => $jumlah,
            'harga_total' => $harga * $jumlah,
            'poin_used' => $payMethod === 'poin' ? $harga * $jumlah : null,
            'estimasi_hari' => $this->faker->numberBetween(2, 14),
            'tanggal' => $this->faker->dateTimeBetween('-2 months', 'now'),
            'status' => $status,
            'pay_method' => $payMethod,
            'bukti_transfer' => $payMethod === 'transfer' && $status !== 'belum dibayar' ? 'bukti_transfer/1.jpg' : null,
        ];
    }
} 