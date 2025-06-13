<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{User,Lokasi,Produk,ProdukGambar,Artikel,ArtikelGambar,Poin,Transaksi,Feedback,Upgrade,PointHistory};

class FactorySeeder extends Seeder
{
    public function run(): void
    {
        // USERS
        $admin = User::factory()->state(['role' => 'admin'])->create();
        $pengelolaUsers = User::factory()->count(2)->state(['role' => 'pengelola'])->create();
        $nasabahUsers  = User::factory()->count(5)->state(['role' => 'nasabah'])->create();

        // LOKASI
        $lokasiList = Lokasi::factory()->count(3)->create();

        // PRODUK + GAMBAR (setiap pengelola 3 produk)
        foreach ($pengelolaUsers as $pengelola) {
            Produk::factory()
                ->count(3)
                ->for($pengelola, 'user')
                ->has(ProdukGambar::factory()->count(2), 'gambar')
                ->create();
        }

        // ARTIKEL + GAMBAR (dibuat admin)
        Artikel::factory()
            ->count(5)
            ->for($admin, 'user')
            ->has(ArtikelGambar::factory()->count(1), 'gambar')
            ->create();

        // EVENTS
        \App\Models\Event::factory()->count(5)->create();

        // POIN untuk setiap kombinasi nasabah & lokasi
        foreach ($nasabahUsers as $nasabah) {
            foreach ($lokasiList as $lokasi) {
                Poin::factory()->for($nasabah, 'user')->for($lokasi, 'lokasi')->create();
            }
        }

        // TRANSAKSI dummy
        Transaksi::factory()->count(20)->create();

        // FEEDBACK dummy
        Feedback::factory()->count(30)->create();

        // UPGRADE pengajuan dummy
        Upgrade::factory()->count(3)->create();

        // POINT HISTORY dummy
        PointHistory::factory()->count(30)->create();

        // PRODUCT LIKES dummy (setiap nasabah menyukai 3 produk unik)
        $productsAll = Produk::all();
        foreach ($nasabahUsers as $nasabah) {
            $liked = $productsAll->random(min(3, $productsAll->count()));
            foreach ($liked as $prod) {
                \App\Models\ProductLike::firstOrCreate([
                    'user_id' => $nasabah->user_id,
                    'produk_id' => $prod->produk_id,
                ]);
            }
        }
    }
} 