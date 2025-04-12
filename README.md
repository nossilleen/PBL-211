# 🌱 EcoZense - Aplikasi Web Eco Enzim

![EcoZense Banner](https://media.discordapp.net/attachments/918866718326145084/1351791694592348191/file.jpg?ex=67dba99f&is=67da581f&hm=d91ed4db7a8075f095cf5f46d5ed59000d3b2353c36b5d3629ae8998e30fa46c&=&format=webp&width=625&height=625)

## 📋 Tentang Proyek

EcoZense adalah aplikasi web yang berfungsi sebagai pusat informasi dan edukasi Eco Enzyme. Aplikasi ini bertujuan untuk:
- Menyediakan informasi yang jelas dan mudah diakses tentang Eco Enzyme
- Mendorong masyarakat untuk lebih aktif dalam mengelola sampah organik
- Membangun komunitas yang berbagi pengalaman dan pengetahuan
- Mengintegrasikan sistem bank sampah untuk penyetoran sampah organik
- Menyediakan marketplace untuk produk Eco Enzyme dan sembako

## 🚀 Fitur Utama

### 👤 Manajemen Pengguna
- **Register & Login** - Sistem pendaftaran dan autentikasi pengguna
- **Profil Pengguna** - Pengelolaan informasi akun dan poin
- **Role-based Access** - Admin, Nasabah, dan Pengelola Bank Sampah

### 📚 Konten Edukasi
- **Artikel** - Informasi tentang eco enzim dan pengelolaan sampah
- **Video Edukasi** - Tutorial dan panduan praktis
- **Feedback System** - Komentar dan ulasan untuk artikel

### ♻️ Bank Sampah
- **Penyetoran Sampah** - Sistem penyetoran sampah organik
- **Sistem Poin** - Perolehan poin dari penyetoran sampah
- **Lokasi Bank Sampah** - Informasi dan peta lokasi bank sampah

### 🛍️ Marketplace
- **Produk Eco Enzyme** - Jual beli produk eco enzim
- **Sembako** - Penukaran poin dengan sembako
- **Transaksi** - Sistem pembayaran menggunakan poin

### 📅 Event & Kegiatan
- **Promosi Kegiatan** - Informasi event eco enzim
- **Pendaftaran Event** - Sistem registrasi kegiatan
- **Manajemen Event** - Pengelolaan kegiatan oleh admin

## 🛠️ Teknologi yang Digunakan

### Backend
- **PHP/Laravel** - Framework utama
- **MySQL** - Database management system
- **JWT Authentication** - Sistem autentikasi

### Frontend
- **Vue.js** - Framework JavaScript
- **Tailwind CSS** - Styling framework
- **Google Maps API** - Integrasi peta

### Infrastruktur
- **Google Cloud Storage** - Penyimpanan file
- **Git/GitHub** - Version control
- **VS Code** - Development environment

## 📊 Struktur Database

Database terdiri dari beberapa tabel utama:
- `users` - Data pengguna
- `locations` - Lokasi bank sampah
- `articles` - Konten edukasi
- `products` - Produk eco enzim dan sembako
- `transactions` - Riwayat transaksi
- `points` - Sistem poin
- `feedback` - Komentar dan ulasan

## 👥 Tim Pengembang

| Nama | NIM | Role |
|------|-----|------|
| Arshafin Alfisyahrin | 4342401075 | Ketua Tim |
| Muhamad Ariffadhlullah | 4342401070 | Backend Developer |
| Steven Kumala | 4342401068 | Frontend Developer |
| Muhammad Faldy Rizaldi | 4342401079 | Database Engineer |
| Thalita Aurelia Marsim | 4342401066 | UI/UX Designer |
| Agnes Natalia Silalahi | 4342401082 | Quality Assurance |

## 📚 Dokumentasi Proyek

- [Rencana Pelaksanaan Proyek (RPP)](DOC/RPP.md)
- [Spesifikasi Kebutuhan dan Perancangan Perangkat Lunak (SKPPL)](DOC/SKPPL.md)
- [Hasil Wawancara](DOC/wanwancara.md)
- [Struktur Database](db_ecozense.sql)

## 🚀 Instalasi

1. Clone repository
```bash
git clone https://github.com/nossilleen/PBL-211.git
```

2. Install dependencies
```bash
composer install
npm install
```

3. Setup environment
```bash
cp .env.example .env
php artisan key:generate
```

4. Import database
```bash
mysql -u username -p database_name < db_ecozense.sql
```

5. Run migrations
```bash
php artisan migrate
```

6. Start development server
```bash
php artisan serve
npm run dev
```

## 📝 Metode Pengembangan

Proyek ini dikembangkan menggunakan metode Waterfall dengan tahapan:
1. Requirement Analysis (2 minggu)
2. System Design (2 minggu)
3. Implementation (5 minggu)
4. Testing (3 minggu)
5. Deployment (1 minggu)
6. Maintenance (Berkelanjutan)

## 📄 Lisensi

© 2025 Tim PBL TRPL-211, Politeknik Negeri Batam 