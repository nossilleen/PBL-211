# 🌱 EcoZense - Aplikasi Web Eco Enzim

![EcoZense Banner](https://media.discordapp.net/attachments/918866718326145084/1351791694592348191/file.jpg?ex=67dba99f&is=67da581f&hm=d91ed4db7a8075f095cf5f46d5ed59000d3b2353c36b5d3629ae8998e30fa46c&=&format=webp&width=625&height=625)

## Project Overview

EcoZense adalah aplikasi berbasis web yang berfungsi sebagai pusat informasi dan marketplace untuk produk eco enzim. Aplikasi ini menghubungkan bank sampah dengan nasabah, menyediakan platform untuk pengelolaan sampah organik dan penukaran produk eco enzim. Tujuan utamanya adalah memberikan informasi yang jelas dan mudah diakses mengenai Eco Enzim, mendorong masyarakat agar lebih aktif dalam mengelola sampah organik, serta membangun komunitas di mana pengguna dapat berbagi pengalaman dan pengetahuan.

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

### Frontend
- Vue.js 3
- Vue Router
- Tailwind CSS
- Vite
- Axios
### Backend
- Laravel
- MySQL
- RESTful API

## Project Structure

```
project-root/
├── frontend/               # Semua kode frontend
│   ├── src/                # Kode sumber frontend
│   ├── public/             # Static assets
│   └── ...                 # File konfigurasi frontend
│
├── backend/                # Semua kode backend (Laravel)
│   ├── app/                # Logic aplikasi
│   ├── routes/             # API routes
│   └── ...                 # File konfigurasi backend
│
├── database/               # Database scripts & migrations
│   └── db_ecozense.sql     # SQL database dump
│
├── docs/                   # Dokumentasi project
│   ├── diagram/            # Diagram project
│   ├── RPP.md              # Rencana Pengembangan Perangkat Lunak
│   └── SKPPL.md            # Spesifikasi Kebutuhan Perangkat Lunak
│
└── README.md               # Dokumen utama project
```

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

## 📥 Instalasi & Setup Lengkap

### ⚙️ Prasyarat Sistem
Sebelum memulai, pastikan sistem Anda memenuhi persyaratan berikut:
- Node.js >= 14.0.0
- npm >= 6.0.0 
- PHP >= 8.0
- Composer
- MySQL >= 5.7

### 🚀 Langkah 1: Clone Repository
```bash
git clone https://github.com/nossilleen/PBL-211.git
cd PBL-211
```

### 🚀 Langkah 2: Setup Otomatis (Cara Termudah)
EcoZense menyediakan script setup otomatis yang akan menginstall semua dependency, mempersiapkan file konfigurasi, dan menghasilkan kunci aplikasi:

```bash
# Jalankan script setup otomatis
npm run setup
```

Script ini akan:
- Menginstall dependency untuk root project, frontend, dan backend
- Memeriksa konfigurasi environment
- Menyalin file .env.example ke .env di direktori backend
- Menghasilkan kunci aplikasi Laravel

### 🚀 Langkah 3: Setup Database
```bash
# Buat database MySQL baru
mysql -u root -p -e "CREATE DATABASE ecozense CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

# Buka file .env di direktori backend dan konfigurasikan database:
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=ecozense
# DB_USERNAME=root
# DB_PASSWORD=your_password

# Jalankan migrasi dan seed database
npm run db:setup

# ATAU jika ingin reset database yang sudah ada:
npm run db:fresh
```

### 🚀 Langkah 4: Setup Storage Link
```bash
# Buat symbolic link untuk storage
npm run storage:link
```

### 🚀 Langkah 5: Jalankan Aplikasi

#### Mode Development
```bash
# Jalankan aplikasi dalam mode development
npm run dev
```

#### Mode Production
```bash
# Jalankan aplikasi dalam mode production
npm run production
```

Atau jika ingin menjalankan frontend dan backend secara terpisah:

```bash
# Jalankan hanya frontend
npm run frontend:dev

# Jalankan hanya backend
npm run backend:serve
```

### 🚀 Langkah 6: Akses Aplikasi
- Frontend: http://localhost:3000
- Backend API: http://localhost:8000

## 🔧 Script Tersedia

EcoZense menyediakan berbagai script untuk mempermudah development:

| Script | Deskripsi |
|--------|-----------|
| `npm run setup` | Setup awal project (install dependencies, siapkan environment, generate key) |
| `npm run dev` | Jalankan aplikasi dalam mode development |
| `npm run production` | Jalankan aplikasi dalam mode production |
| `npm run frontend:dev` | Jalankan hanya frontend server |
| `npm run backend:serve` | Jalankan hanya backend server |
| `npm run start` | Jalankan frontend dan backend bersamaan |
| `npm run build:all` | Build frontend dan backend untuk production |
| `npm run db:setup` | Siapkan database dengan migrasi dan seed |
| `npm run db:fresh` | Reset dan setup ulang database |
| `npm run clear:cache` | Bersihkan cache Laravel |
| `npm run test` | Jalankan test untuk frontend dan backend |
| `npm run lint` | Jalankan linter untuk frontend |
| `npm run deploy` | Persiapkan aplikasi untuk deployment |
| `npm run storage:link` | Buat symbolic link untuk storage Laravel |

## 🔍 Troubleshooting

### 1. Error Database
Jika mengalami masalah dengan database, coba:
```bash
# Bersihkan cache Laravel
npm run clear:cache

# Reset dan siapkan ulang database
npm run db:fresh
```

### 2. Error Dependency
Jika ada error terkait dependency, coba:
```bash
# Install ulang semua dependency
npm run install:all
```

### 3. Error Node Version
Jika ada masalah kompatibilitas Node.js, periksa versi:
```bash
# Cek environment
npm run check:env
```

### 4. File Storage Tidak Muncul
Jika file upload tidak muncul, coba:
```bash
# Buat ulang symbolic link
npm run storage:link
```

## Akses WEB

- Frontend : http://localhost:3000
- Backend API : http://localhost:8000

## 📝 Metode Pengembangan

Proyek ini dikembangkan menggunakan metode Waterfall dengan tahapan:
1. Requirement Analysis (2 minggu)
2. System Design (2 minggu)
3. Implementation (5 minggu)
4. Testing (3 minggu)
5. Deployment (1 minggu)
6. Maintenance (Berkelanjutan)

## 📄 Lisensi

MIT License

Copyright (c) 2025 Tim PBL TRPL-211, Politeknik Negeri Batam

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.