<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Visit;
use Carbon\Carbon;

class VisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kosongkan tabel visits sebelum mengisi data baru
        Visit::truncate();

        echo "Generating fake visit data for the last 7 days...\n";

        // Loop untuk 7 hari terakhir (termasuk hari ini)
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $numberOfVisits = rand(10, 100); // Jumlah kunjungan acak per hari

            // Buat data visit sebanyak $numberOfVisits untuk tanggal $date
            Visit::factory($numberOfVisits)->create([
                'created_at' => $date,
                'updated_at' => $date,
            ]);

            echo "Generated {$numberOfVisits} visits for " . $date->format('Y-m-d') . "\n";
        }
        
        echo "Fake visit data generated successfully.\n";
    }
}
