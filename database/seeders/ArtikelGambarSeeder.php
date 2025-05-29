<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ArtikelGambar;
use App\Models\Artikel;
use Illuminate\Support\Str;

class ArtikelGambarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artikels = Artikel::all();

        foreach ($artikels as $artikel) {
            ArtikelGambar::create([
                'artikel_id' => $artikel->artikel_id,
                'file_path' => 'storage/artikel_gambar/' . $artikel->artikel_id . '.jpg',
                'judul' => $artikel->judul,
            ]);
        }
    }
}
