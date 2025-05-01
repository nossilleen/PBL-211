<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Artikel;
use App\Models\ArtikelGambar;
use App\Models\Feedback;
use App\Models\Lokasi;
use App\Models\Poin;
use App\Models\Produk;
use App\Models\ProdukGambar;
use App\Models\Transaksi;
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
        $this->seedLokasi();
        $this->seedProduk();
        $this->seedArtikel();
        $this->seedPoin();
        $this->seedTransaksi();
        $this->seedFeedback();
        
        // Generate SQL file berdasarkan struktur database saat ini
        $this->generateSqlFile();
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
            'role' => 'admin',
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
        Lokasi::create([
            'nama_lokasi' => 'Bank Sampah Rejosari',
            'alamat' => 'Jl. Merdeka No. 10, Rejosari',
            'kota' => 'Semarang',
        ]);
        
        Lokasi::create([
            'nama_lokasi' => 'Pusat Eco Enzim Darussalam',
            'alamat' => 'Jl. Pahlawan No. 25, Darussalam',
            'kota' => 'Semarang',
        ]);
        
        Lokasi::create([
            'nama_lokasi' => 'Bank Sampah Banyumanik',
            'alamat' => 'Jl. Diponegoro No. 45, Banyumanik',
            'kota' => 'Semarang',
        ]);
    }
    
    /**
     * Seed produk data
     */
    private function seedProduk(): void
    {
        $pengelola1Id = User::where('email', 'arif@gmail.com')->first()->user_id;
        $pengelola2Id = User::where('email', 'steven@gmail.com')->first()->user_id;
        
        // Produk Eco Enzim
        $produk1 = Produk::create([
            'nama_produk' => 'Eco Enzim Pembersih Lantai',
            'kategori' => 'eco_enzim',
            'status_ketersediaan' => 'Available',
            'harga' => 15000,
            'suka' => 35,
            'deskripsi' => 'Eco Enzim untuk membersihkan lantai, terbuat dari fermentasi sampah organik buah-buahan.',
            'user_id' => $pengelola1Id,
        ]);
        
        ProdukGambar::create([
            'produk_id' => $produk1->produk_id,
            'file_path' => 'images/produk/eco-enzim-pembersih-lantai.jpg',
        ]);
        
        $produk2 = Produk::create([
            'nama_produk' => 'Eco Enzim Pembersih Kaca',
            'kategori' => 'eco_enzim',
            'status_ketersediaan' => 'Available',
            'harga' => 20000,
            'suka' => 28,
            'deskripsi' => 'Eco Enzim khusus untuk membersihkan kaca dan jendela, mengkilapkan tanpa meninggalkan bercak.',
            'user_id' => $pengelola1Id,
        ]);
        
        ProdukGambar::create([
            'produk_id' => $produk2->produk_id,
            'file_path' => 'images/produk/eco-enzim-pembersih-kaca.jpg',
        ]);
        
        $produk3 = Produk::create([
            'nama_produk' => 'Eco Enzim Pembasmi Serangga',
            'kategori' => 'eco_enzim',
            'status_ketersediaan' => 'Available',
            'harga' => 25000,
            'suka' => 42,
            'deskripsi' => 'Eco Enzim untuk mengusir serangga dan hama tanaman secara alami.',
            'user_id' => $pengelola2Id,
        ]);
        
        ProdukGambar::create([
            'produk_id' => $produk3->produk_id,
            'file_path' => 'images/produk/eco-enzim-pembasmi-serangga.jpg',
        ]);
        
        // Produk Sembako
        $produk4 = Produk::create([
            'nama_produk' => 'Beras Organik 5kg',
            'kategori' => 'sembako',
            'status_ketersediaan' => 'Available',
            'harga' => 75000,
            'suka' => 18,
            'deskripsi' => 'Beras organik berkualitas premium, ditanam tanpa pestisida dan bebas bahan kimia.',
            'user_id' => $pengelola2Id,
        ]);
        
        ProdukGambar::create([
            'produk_id' => $produk4->produk_id,
            'file_path' => 'images/produk/beras-organik.jpg',
        ]);
        
        $produk5 = Produk::create([
            'nama_produk' => 'Minyak Goreng Kelapa 1L',
            'kategori' => 'sembako',
            'status_ketersediaan' => 'Available',
            'harga' => 30000,
            'suka' => 15,
            'deskripsi' => 'Minyak kelapa organik, diperas secara tradisional, tanpa pengawet.',
            'user_id' => $pengelola2Id,
        ]);
        
        ProdukGambar::create([
            'produk_id' => $produk5->produk_id,
            'file_path' => 'images/produk/minyak-kelapa.jpg',
        ]);
    }
    
    /**
     * Seed artikel data
     */
    private function seedArtikel(): void
    {
        $adminId = User::where('role', 'admin')->first()->user_id;
        
        $artikel1 = Artikel::create([
            'kategori' => 'artikel',
            'judul' => 'Cara Membuat Eco Enzim dari Sampah Dapur',
            'konten' => '<p>Eco Enzim adalah cairan hasil fermentasi dari sampah organik, gula merah atau gula aren dan air. Eco enzim dibuat dengan perbandingan sampah organik, gula, dan air adalah 1:3:10.</p>

<p>Bahan yang diperlukan:</p>
<ul>
    <li>1 bagian gula aren/gula merah</li>
    <li>3 bagian sampah organik (sisa buah-buahan atau sayuran)</li>
    <li>10 bagian air</li>
    <li>Toples plastik dengan tutup rapat</li>
</ul>

<p>Langkah pembuatan:</p>
<ol>
    <li>Potong sampah organik menjadi potongan kecil</li>
    <li>Masukkan gula aren/gula merah ke dalam toples</li>
    <li>Tambahkan sampah organik</li>
    <li>Tuangkan air</li>
    <li>Tutup rapat toples</li>
    <li>Buka tutup toples sekali sehari untuk melepaskan gas</li>
    <li>Diamkan selama 3 bulan hingga fermentasi sempurna</li>
</ol>

<p>Eco enzim dapat digunakan sebagai pembersih alami, pupuk tanaman, pengusir serangga, dan banyak kegunaan lainnya.</p>',
            'tanggal_publikasi' => '2023-10-15',
            'user_id' => $adminId,
        ]);
        
        ArtikelGambar::create([
            'artikel_id' => $artikel1->artikel_id,
            'file_path' => 'images/artikel/cara-membuat-eco-enzim.jpg',
            'judul' => 'Proses Pembuatan Eco Enzim',
        ]);
        
        $artikel2 = Artikel::create([
            'kategori' => 'artikel',
            'judul' => 'Manfaat Eco Enzim untuk Lingkungan',
            'konten' => '<p>Eco Enzim memiliki banyak manfaat untuk lingkungan dan kehidupan kita sehari-hari. Berikut adalah beberapa manfaat utama:</p>

<h3>1. Mengurangi Limbah Organik</h3>
<p>Dengan membuat eco enzim, kita dapat mengurangi jumlah sampah organik yang berakhir di tempat pembuangan sampah. Ini membantu mengurangi gas metana yang dihasilkan dari pembusukan sampah.</p>

<h3>2. Pembersih Alami</h3>
<p>Eco enzim dapat digunakan sebagai pembersih rumah tangga yang ramah lingkungan. Dapat membersihkan lantai, kamar mandi, kaca, hingga membantu membersihkan wastafel yang tersumbat.</p>

<h3>3. Memperbaiki Kualitas Air dan Tanah</h3>
<p>Pada level komunitas, eco enzim dapat digunakan untuk mengurangi pencemaran air. Beberapa penelitian menunjukkan eco enzim dapat membantu memperbaiki pH tanah dan air.</p>

<h3>4. Pupuk Tanaman</h3>
<p>Diencerkan dengan air (1:1000), eco enzim menjadi pupuk organik yang sangat baik untuk pertumbuhan tanaman.</p>

<h3>5. Pengusir Serangga</h3>
<p>Aroma dari eco enzim dapat mengusir serangga dan hama tanaman sehingga mengurangi kebutuhan akan pestisida kimia.</p>',
            'tanggal_publikasi' => '2023-11-05',
            'user_id' => $adminId,
        ]);
        
        ArtikelGambar::create([
            'artikel_id' => $artikel2->artikel_id,
            'file_path' => 'images/artikel/manfaat-eco-enzim.jpg',
            'judul' => 'Eco Enzim untuk Pupuk Tanaman',
        ]);
        
        $artikel3 = Artikel::create([
            'kategori' => 'event',
            'judul' => 'Workshop Pembuatan Eco Enzim di Semarang',
            'konten' => '<p>Bank Sampah Rejosari dengan bangga mengundang Anda untuk menghadiri acara workshop pembuatan Eco Enzim yang akan diadakan pada:</p>

<p><strong>Tanggal:</strong> 15 Desember 2023<br>
<strong>Waktu:</strong> 09.00 - 12.00 WIB<br>
<strong>Tempat:</strong> Bank Sampah Rejosari, Jl. Merdeka No. 10, Rejosari, Semarang</p>

<p>Manfaat mengikuti workshop:</p>
<ul>
    <li>Mempelajari cara membuat Eco Enzim dari awal hingga akhir</li>
    <li>Memahami berbagai manfaat dan penggunaan Eco Enzim</li>
    <li>Mendapatkan starter kit Eco Enzim untuk dibawa pulang</li>
    <li>Berkontribusi pada pengurangan sampah organik</li>
    <li>Mendapatkan sertifikat kehadiran</li>
</ul>

<p>Pendaftaran dapat dilakukan melalui WhatsApp di nomor 081234567890 atau melalui website ecozense.id. Kuota terbatas hanya untuk 30 peserta!</p>

<p>Mari bergabung dan belajar cara mengurangi sampah sekaligus menciptakan produk yang bermanfaat!</p>',
            'tanggal_publikasi' => '2023-11-25',
            'user_id' => $adminId,
        ]);
        
        ArtikelGambar::create([
            'artikel_id' => $artikel3->artikel_id,
            'file_path' => 'images/artikel/workshop-eco-enzim.jpg',
            'judul' => 'Poster Workshop Eco Enzim',
        ]);
    }
    
    /**
     * Seed poin data
     */
    private function seedPoin(): void
    {
        $nasabahIds = User::where('role', 'nasabah')->pluck('user_id')->toArray();
        $lokasiIds = Lokasi::pluck('lokasi_id')->toArray();
        
        // Assign random points to each nasabah for each location
        foreach ($nasabahIds as $userId) {
            foreach ($lokasiIds as $lokasiId) {
                Poin::create([
                    'user_id' => $userId,
                    'lokasi_id' => $lokasiId,
                    'jumlah_poin' => rand(50, 500),
                ]);
            }
        }
    }
    
    /**
     * Seed transaksi data
     */
    private function seedTransaksi(): void
    {
        $nasabahIds = User::where('role', 'nasabah')->pluck('user_id')->toArray();
        $produkIds = Produk::pluck('produk_id')->toArray();
        $lokasiIds = Lokasi::pluck('lokasi_id')->toArray();
        
        $statuses = ['belum dibayar', 'menunggu konfirmasi', 'sedang dikirim', 'selesai'];
        $payMethods = ['transfer', 'poin'];
        
        // Create 15 random transactions
        for ($i = 0; $i < 15; $i++) {
            $userId = $nasabahIds[array_rand($nasabahIds)];
            $produkId = $produkIds[array_rand($produkIds)];
            $lokasiId = $lokasiIds[array_rand($lokasiIds)];
            $jumlahProduk = rand(1, 5);
            $product = Produk::find($produkId);
            $hargaTotal = $product->harga * $jumlahProduk;
            $status = $statuses[array_rand($statuses)];
            $payMethod = $payMethods[array_rand($payMethods)];
            $poinUsed = ($payMethod === 'poin') ? $hargaTotal : null;
            
            // Random date in the past 3 months
            $date = now()->subDays(rand(1, 90));
            
            Transaksi::create([
                'user_id' => $userId,
                'lokasi_id' => $lokasiId,
                'produk_id' => $produkId,
                'jumlah_produk' => $jumlahProduk,
                'harga_total' => $hargaTotal,
                'poin_used' => $poinUsed,
                'tanggal' => $date,
                'status' => $status,
                'pay_method' => $payMethod,
                'bukti_transfer' => ($payMethod === 'transfer' && in_array($status, ['menunggu konfirmasi', 'sedang dikirim', 'selesai'])) ? 
                    'images/bukti_transfer/transfer-' . rand(1000, 9999) . '.jpg' : null,
            ]);
        }
    }
    
    /**
     * Seed feedback data
     */
    private function seedFeedback(): void
    {
        $nasabahIds = User::where('role', 'nasabah')->pluck('user_id')->toArray();
        $artikelIds = Artikel::pluck('artikel_id')->toArray();
        
        $comments = [
            'Artikel ini sangat bermanfaat, terima kasih atas informasinya!',
            'Saya sudah mencoba membuat eco enzim sesuai petunjuk, hasilnya bagus!',
            'Boleh minta informasi lebih detail tentang penggunaan eco enzim untuk tanaman?',
            'Sangat praktis dan bermanfaat untuk mengurangi sampah rumah tangga',
            'Workshop-nya seru banget, banyak ilmu baru yang saya dapat',
            'Apakah eco enzim bisa digunakan untuk obat luka?',
            'Sangat menarik! Saya akan coba buat di rumah',
            'Informasinya lengkap dan mudah dimengerti',
            'Terima kasih sudah mengadakan workshop yang sangat bermanfaat',
            'Saya sudah rutin membuat eco enzim sekarang, sangat berguna!'
        ];
        
        // Create 20 random feedbacks
        for ($i = 0; $i < 20; $i++) {
            $userId = $nasabahIds[array_rand($nasabahIds)];
            $artikelId = $artikelIds[array_rand($artikelIds)];
            $komentar = $comments[array_rand($comments)];
            
            Feedback::create([
                'komentar' => $komentar,
                'user_id' => $userId,
                'artikel_id' => $artikelId,
            ]);
        }
    }

    /**
     * Generate SQL file dari struktur database saat ini
     */
    private function generateSqlFile(): void
    {
        $sqlFilePath = base_path('docs/db_ecozense.sql');
        $tables = $this->getAllTables();
        $sql = "-- phpMyAdmin SQL Dump\n";
        $sql .= "-- version 5.2.1\n";
        $sql .= "-- https://www.phpmyadmin.net/\n";
        $sql .= "--\n";
        $sql .= "-- Host: 127.0.0.1\n";
        $sql .= "-- Generation Time: " . date('M d, Y \a\t h:i A') . "\n";
        $sql .= "-- Server version: 10.4.32-MariaDB\n";
        $sql .= "-- PHP Version: 8.2.12\n\n";

        $sql .= "SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";\n";
        $sql .= "START TRANSACTION;\n";
        $sql .= "SET time_zone = \"+00:00\";\n\n";

        $sql .= "/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;\n";
        $sql .= "/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;\n";
        $sql .= "/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;\n";
        $sql .= "/*!40101 SET NAMES utf8mb4 */;\n\n";

        $sql .= "--\n";
        $sql .= "-- Database: `db_ecozense`\n";
        $sql .= "--\n\n";

        foreach ($tables as $table) {
            // Skip Laravel's internal tables
            if (in_array($table, ['migrations', 'failed_jobs', 'personal_access_tokens'])) {
                continue;
            }

            $sql .= "-- --------------------------------------------------------\n\n";
            $sql .= "--\n";
            $sql .= "-- Table structure for table `{$table}`\n";
            $sql .= "--\n\n";

            // Get Create Table statement
            $createTable = DB::select("SHOW CREATE TABLE `{$table}`")[0];
            $createTableSql = $createTable->{'Create Table'} ?? '';
            $sql .= "CREATE TABLE `{$table}` " . substr($createTableSql, strpos($createTableSql, '(')) . ";\n\n";
        }

        // Indexes and constraints
        $sql .= "--\n";
        $sql .= "-- Indexes for dumped tables\n";
        $sql .= "--\n\n";

        foreach ($tables as $table) {
            // Skip Laravel's internal tables
            if (in_array($table, ['migrations', 'failed_jobs', 'personal_access_tokens'])) {
                continue;
            }

            $sql .= "--\n";
            $sql .= "-- Indexes for table `{$table}`\n";
            $sql .= "--\n";
            
            $indexes = DB::select("SHOW INDEXES FROM `{$table}`");
            $indexGroups = [];

            foreach ($indexes as $index) {
                $keyName = $index->Key_name;
                if (!isset($indexGroups[$keyName])) {
                    $indexGroups[$keyName] = [
                        'columns' => [],
                        'type' => ($keyName === 'PRIMARY') ? 'PRIMARY KEY' : 
                                 ($index->Non_unique == 0 ? 'UNIQUE KEY' : 'KEY'),
                    ];
                }
                $indexGroups[$keyName]['columns'][] = $index->Column_name;
            }

            $sql .= "ALTER TABLE `{$table}`\n";
            $indexLines = [];
            foreach ($indexGroups as $keyName => $indexInfo) {
                if ($keyName === 'PRIMARY') {
                    $indexLines[] = "  ADD PRIMARY KEY (`" . implode('`,`', $indexInfo['columns']) . "`)";
                } else {
                    $indexLines[] = "  ADD " . $indexInfo['type'] . " `{$keyName}` (`" . implode('`,`', $indexInfo['columns']) . "`)";
                }
            }
            $sql .= implode(",\n", $indexLines) . ";\n\n";
        }

        // Auto increment
        $sql .= "--\n";
        $sql .= "-- AUTO_INCREMENT for dumped tables\n";
        $sql .= "--\n\n";

        foreach ($tables as $table) {
            // Skip Laravel's internal tables
            if (in_array($table, ['migrations', 'failed_jobs', 'personal_access_tokens'])) {
                continue;
            }

            $autoIncrement = DB::select("SHOW COLUMNS FROM `{$table}` WHERE Extra LIKE '%auto_increment%'");
            if (!empty($autoIncrement)) {
                $column = $autoIncrement[0]->Field;
                $sql .= "--\n";
                $sql .= "-- AUTO_INCREMENT for table `{$table}`\n";
                $sql .= "--\n";
                $sql .= "ALTER TABLE `{$table}`\n";
                $sql .= "  MODIFY `{$column}` " . $autoIncrement[0]->Type . " NOT NULL AUTO_INCREMENT;\n\n";
            }
        }

        // Foreign keys
        $sql .= "--\n";
        $sql .= "-- Constraints for dumped tables\n";
        $sql .= "--\n\n";

        foreach ($tables as $table) {
            // Skip Laravel's internal tables
            if (in_array($table, ['migrations', 'failed_jobs', 'personal_access_tokens'])) {
                continue;
            }

            $foreignKeys = DB::select("
                SELECT
                    CONSTRAINT_NAME,
                    COLUMN_NAME,
                    REFERENCED_TABLE_NAME,
                    REFERENCED_COLUMN_NAME
                FROM
                    INFORMATION_SCHEMA.KEY_COLUMN_USAGE
                WHERE
                    TABLE_SCHEMA = DATABASE() AND
                    TABLE_NAME = '{$table}' AND
                    REFERENCED_TABLE_NAME IS NOT NULL
            ");

            if (!empty($foreignKeys)) {
                $sql .= "--\n";
                $sql .= "-- Constraints for table `{$table}`\n";
                $sql .= "--\n";
                $sql .= "ALTER TABLE `{$table}`\n";
                $fkLines = [];
                foreach ($foreignKeys as $fk) {
                    $fkLines[] = "  ADD CONSTRAINT `{$fk->CONSTRAINT_NAME}` FOREIGN KEY (`{$fk->COLUMN_NAME}`) REFERENCES `{$fk->REFERENCED_TABLE_NAME}` (`{$fk->REFERENCED_COLUMN_NAME}`)";
                }
                $sql .= implode(",\n", $fkLines) . ";\n\n";
            }
        }

        $sql .= "COMMIT;\n\n";
        $sql .= "/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;\n";
        $sql .= "/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;\n";
        $sql .= "/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;\n";

        // Ensure the docs directory exists
        if (!File::exists(base_path('docs'))) {
            File::makeDirectory(base_path('docs'), 0755, true);
        }
        
        // Save the SQL file
        File::put($sqlFilePath, $sql);
        
        echo "SQL file generated: {$sqlFilePath}\n";
    }

    /**
     * Get all tables from the database
     */
    private function getAllTables(): array
    {
        $tables = [];
        $rows = DB::select('SHOW TABLES');
        $dbName = env('DB_DATABASE', 'db_ecozense');
        
        $tableNameKey = "Tables_in_{$dbName}";
        
        foreach ($rows as $row) {
            if (isset($row->$tableNameKey)) {
                $tables[] = $row->$tableNameKey;
            }
        }
        
        return $tables;
    }
}
