# 🌱 EcoZense - Aplikasi Web Eco Enzim

![EcoZense Banner](https://media.discordapp.net/attachments/1344158804891275417/1361967645536292946/EcoZense.jpg?ex=6800aeb6&is=67ff5d36&hm=77ba62a41b11f2719368b5edbc7d77483147aa934797f540429dd2e9fe57a389&=&format=webp&width=625&height=625)

## 📋 Ringkasan Proyek

EcoZense adalah aplikasi berbasis web yang berfungsi sebagai pusat informasi dan marketplace untuk produk eco enzim, menghubungkan bank sampah dengan nasabah, dan mendorong pengelolaan sampah organik yang lebih baik. Aplikasi ini bertujuan meningkatkan kesadaran masyarakat tentang eco enzim dan membentuk komunitas peduli lingkungan.

## 🚀 Fitur Utama

### 👤 Manajemen Pengguna
- **Register & Login** - Pendaftaran dan autentikasi pengguna
- **Profil Pengguna** - Pengelolaan informasi akun dan poin
- **Peran Pengguna** - Admin, Nasabah, dan Pengelola Bank Sampah

### 📚 Konten Edukasi
- **Artikel** - Informasi tentang eco enzim dan pengelolaan sampah
- **Video Edukasi** - tutorial dan informasi mengenai eco enzim
- **Sistem Feedback** - Komentar dan penilaian artikel

### ♻️ Bank Sampah
- **Penyetoran Sampah** - Sistem pencatatan sampah organik
- **Sistem Poin** - Perolehan poin dari penyetoran sampah
- **Lokasi Bank Sampah** - Peta lokasi bank sampah terdekat

### 🛍️ Marketplace
- **Produk Eco Enzim** - Jual beli produk eco enzim
- **Penukaran Sembako** - Penukaran poin dengan sembako
- **Sistem Transaksi** - Pembayaran menggunakan poin atau transfer

### 📅 Event & Kegiatan
- **Informasi Event** - Kegiatan seputar eco enzim
- **Pendaftaran Event** - Sistem registrasi peserta
- **Pengelolaan Event** - Administrasi event oleh pengelola

## ⚙️ Teknologi

### Frontend
- Vue.js 3
- Tailwind CSS
- Vite
- Axios

### Backend
- Laravel
- MySQL
- RESTful API

## 📁 Struktur Proyek

```
project-root/
├── app/                    # Model, controller, dan logika aplikasi
│   ├── Http/               # HTTP layer (Controllers, Middleware)
│   ├── Models/             # Model database
│   └── Services/           # Business logic
│
├── config/                 # Konfigurasi aplikasi
├── database/               # Migrasi dan seeder database
│   ├── migrations/         # Database migrations
│   └── seeders/            # Data seeders
│
├── docs/                   # Dokumentasi project
│   ├── diagram/            # Diagram (ERD, Use Case)
│   ├── RPP.md              # Rencana Pengembangan
│   └── SKPPL.md            # Spesifikasi Kebutuhan
│
├── public/                 # Assets publik yang dapat diakses langsung
│
├── resources/              # Frontend resources
│   ├── js/                 # Kode JavaScript & Vue
│   │   ├── components/     # Komponen Vue
│   │   └── app.js          # Entry point
│   ├── css/                # Stylesheet
│   └── views/              # Blade templates
│
├── routes/                 # Definisi routing
│   ├── api.php             # API routes
│   └── web.php             # Web routes
│
├── storage/                # File uploads dan generated files
├── tests/                  # Unit dan feature tests
│
└── vendor/                 # Dependency PHP (via Composer)
```

## 👥 Tim Pengembang

| Nama | NIM | Role |
|------|-----|------|
| Arshafin Alfisyahrin | 4342401075 | Ketua Tim |
| Muhamad Ariffadhlullah | 4342401070 | Backend Developer |
| Steven Kumala | 4342401068 | Frontend Developer |
| Muhammad Faldy Rizaldi | 4342401079 | Database Engineer |
| Thalita Aurelia Marsim | 4342401066 | UI/UX Designer |
| Agnes Natalia Silalahi | 4342401082 | Quality Assurance |

## ⚡ Instalasi Cepat

### 🔧 Prasyarat
- Node.js >= 14.0.0
- PHP >= 8.0
- Composer
- MySQL >= 5.7

### 🚀 Setup Otomatis
```bash
# Clone repository
git clone https://github.com/nossilleen/PBL-211.git
cd PBL-211

# Setup otomatis
npm run setup
```

### 🛠️ Setup Database
```bash
# Setup database dengan migrasi + seed
npm run db
```

### 🚀 Menjalankan Aplikasi
```bash
# jalankan frontend dan backend
npm run all
```

## 📋 Command Penting
| Command | Deskripsi |
|---------|-----------|
| `npm run setup` | Setup awal project (install dependencies, generate key, link storage, optimize:clear) |
| `npm run setup:fresh` | Setup lengkap dengan database baru dan seed data |
| `npm run setup:fix` | Membersihkan cache dan kompilasi untuk memperbaiki error |
| `npm run setup:db` | Menjalankan migrasi database saja |
| `npm run all` | Jalankan frontend dan backend secara bersamaan |
| `npm run dev` | Jalankan Vite development server |
| `npm run serve` | Jalankan PHP Artisan server |
| `npm run hot` | Jalankan Vite dengan hot module replacement dan akses host |
| `npm run build` | Build frontend untuk production |
| `npm run db` | Reset database dan seed data |
| `npm run clear` | Bersihkan cache aplikasi |
| `npm run test` | Jalankan test suite |
| `npm run pulse` | Jalankan Laravel Pulse monitoring |
| `npm run format:all` | Jalankan semua formatter dan linter |
| `npm run format` | Format file JavaScript, Vue, CSS, dan SCSS |
| `npm run format:blade` | Format file Blade template |
| `npm run lint:fix` | Memperbaiki masalah ESLint di file JavaScript dan Vue |
| `npm run lint:css` | Memperbaiki masalah Stylelint di file CSS |
| `npm run help` | Tampilkan daftar semua perintah yang tersedia |


## 📝 Metode Pengembangan

Proyek dikembangkan dengan metode Waterfall:
1. Analisis Kebutuhan (2 minggu)
2. Desain Sistem (2 minggu)
3. Implementasi (5 minggu)
4. Testing (3 minggu)
5. Deployment (1 minggu)
6. Maintenance (Berkelanjutan)

## 📄 Lisensi

MIT License

Copyright (c) 2025 Tim PBL TRPL-211, Politeknik Negeri Batam