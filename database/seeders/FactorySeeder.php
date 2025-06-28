<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{User,Lokasi,Produk,ProdukGambar,Artikel,ArtikelGambar,Transaksi,Feedback,Upgrade,PointHistory,ProductLike,Event};
use Illuminate\Support\Collection;

class FactorySeeder extends Seeder
{
    public function run(): void
    {
        // ---------------- USERS ----------------
        $admin = User::factory()->state(['role' => 'admin'])->create();
        $pengelolaUsers = User::factory()->count(10)->state(['role' => 'pengelola'])->create();
        $nasabahUsers  = User::factory()->count(30)->state(['role' => 'nasabah'])->create();

        // ---------------- LOKASI ----------------
        $lokasiList = Lokasi::factory()->count(20)->create();

        // ---------------- PRODUK & GAMBAR ----------------
        /** @var Collection<int,Produk> $allProducts */
        $allProducts = collect();
        foreach ($pengelolaUsers as $pengelola) {
            $products = Produk::factory()
                ->count(10)
                ->for($pengelola, 'user')
                ->has(ProdukGambar::factory()->count(3), 'gambar')
                ->create();
            $allProducts = $allProducts->concat($products);
        }

        // ---------------- ARTIKEL & GAMBAR ----------------
        $articles = Artikel::factory()
            ->count(30)
            ->for($admin, 'user')
            ->has(ArtikelGambar::factory()->count(2), 'gambar')
            ->create();

        // ---------------- EVENTS ----------------
        Event::factory()->count(20)->create();

        // ---------------- TRANSAKSI ----------------
        foreach ($nasabahUsers as $nasabah) {
            // setiap nasabah buat 8 transaksi acak
            for ($i=0;$i<15;$i++) {
                $product = $allProducts->random();
                $lokasi = $lokasiList->random();

                Transaksi::factory()
                    ->for($nasabah, 'user')
                    ->for($lokasi, 'lokasi')
                    ->for($product, 'produk')
                    ->create();
            }
        }

        // ---------------- FEEDBACK ----------------
        foreach ($articles as $article) {
            $maxCommenters = min(50, $nasabahUsers->count());
            $minCommenters = min(10, $maxCommenters); // ensure lower bound valid
            $randomCommenters = $nasabahUsers->random(rand($minCommenters, $maxCommenters));
            foreach ($randomCommenters as $commenter) {
                Feedback::factory()
                    ->for($commenter, 'user')
                    ->for($article, 'artikel')
                    ->create();
            }
        }

        // ---------------- PRODUCT LIKES ----------------
        foreach ($nasabahUsers as $nasabah) {
            $maxLikes = min(60, $allProducts->count());
            $minLikes = min(30, $maxLikes);
            $likedProducts = $allProducts->random(rand($minLikes, $maxLikes));
            foreach ($likedProducts as $prod) {
                ProductLike::firstOrCreate([
                    'user_id' => $nasabah->user_id,
                    'produk_id' => $prod->produk_id,
                ]);
            }
        }

        // Update suka count for each product
        foreach ($allProducts as $prod) {
            $prod->suka = ProductLike::where('produk_id', $prod->produk_id)->count();
            $prod->save();
        }

        // ---------------- POINT HISTORY ----------------
        $allTransactions = Transaksi::all();
        foreach ($allTransactions as $tx) {
            PointHistory::factory()->create([
                'user_id' => $tx->user_id,
                'transaction_type' => $tx->isUsingPoints() ? 'debit' : 'credit',
                'amount' => $tx->poin_used ?? ($tx->harga_total * 0.1), // contoh logika
                'description' => 'Purchase via '.($tx->pay_method),
                'related_id' => $tx->transaksi_id,
                'related_type' => Transaksi::class,
            ]);
        }

        // Aggregate points to users
        $pointTotals = PointHistory::selectRaw('user_id, SUM(CASE WHEN transaction_type="credit" THEN amount ELSE -amount END) as total')
            ->groupBy('user_id')->pluck('total','user_id');
        foreach ($pointTotals as $userId => $tot) {
            $user = User::find($userId);
            if ($user) {
                $user->points = max(0,$tot);
                $user->save();
            }
        }

        // ---------------- UPGRADE REQUESTS ----------------
        Upgrade::factory()->count(10)->for($nasabahUsers->random(), 'user')->create();
    }
} 