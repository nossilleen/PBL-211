<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed data
        $this->seedUsers();
        
        // Jika diperlukan, tambahkan proses lain di sini
        
        // Tambahkan data dummy menggunakan factories
        $this->call(FactorySeeder::class);
    }
    
    /**
     * Seed user data
     */
    private function seedUsers(): void
    {
        // Admin
        User::create([
            'nama' => 'Arshafin',
            'email' => 'arshafin@gmail.com',
            'password' => Hash::make('arshafin123'),
            'no_hp' => '081234567890',
            'role' => 'superadmin',
        ]);
        
        // Pengelola
        User::create([
            'nama' => 'Arif',
            'email' => 'arif@gmail.com',
            'password' => Hash::make('arif123'),
            'no_hp' => '081234567891',
            'role' => 'pengelola',
        ]);
        
        User::create([
            'nama' => 'Steven',
            'email' => 'steven@gmail.com',
            'password' => Hash::make('steven123'),
            'no_hp' => '081234567892',
            'role' => 'pengelola',
        ]);
        
        // Nasabah
        User::create([
            'nama' => 'Agnes',
            'email' => 'agnes@gmail.com',
            'password' => Hash::make('agnes123'),
            'no_hp' => '081234567893',
            'role' => 'nasabah',
        ]);
        
        User::create([
            'nama' => 'Thalita',
            'email' => 'thalita@gmail.com',
            'password' => Hash::make('thalita123'),
            'no_hp' => '081234567894',
            'role' => 'nasabah',
        ]);
        
        User::create([
            'nama' => 'Faldi',
            'email' => 'faldi@gmail.com',
            'password' => Hash::make('faldi123'),
            'no_hp' => '081234567895',
            'role' => 'nasabah',
        ]);
    }
    
    /**
     * Seed lokasi data
     */
    private function seedLokasi(): void
    {
        // Implementation of seedLokasi method
    }
    
    /**
     * Seed produk data
     */
    private function seedProduk(): void
    {
        // Implementation of seedProduk method
    }
    
    /**
     * Seed artikel data
     */
    private function seedArtikel(): void
    {
        // Implementation of seedArtikel method
    }
    
    /**
     * Seed poin data
     */
    private function seedPoin(): void
    {
        // Implementation of seedPoin method
    }
    
    /**
     * Seed transaksi data
     */
    private function seedTransaksi(): void
    {
        // Implementation of seedTransaksi method
    }
    
    /**
     * Seed feedback data
     */
    private function seedFeedback(): void
    {
        // Implementation of seedFeedback method
    }

    /**
     * Generate SQL file dari struktur database saat ini
     */
    private function generateSqlFile(): void
    {
        // Implementation of generateSqlFile method
    }

    /**
     * Get all tables from the database
     */
    private function getAllTables(): array
    {
        // Implementation of getAllTables method
    }
}
