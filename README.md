# 🌱 EcoZense - Aplikasi Web Eco Enzim

![EcoZense Banner](https://media.discordapp.net/attachments/918866718326145084/1351791694592348191/file.jpg?ex=67dba99f&is=67da581f&hm=d91ed4db7a8075f095cf5f46d5ed59000d3b2353c36b5d3629ae8998e30fa46c&=&format=webp&width=625&height=625)

## Project Overview

EcoZense is a web application that serves as a marketplace and educational platform for eco enzyme products. It connects waste banks with customers, providing a platform for waste management and eco enzyme product exchange.

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
EcoZense/
├── frontend/        # Vue.js frontend application
└── backend/         # Laravel backend API
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

1. Clone the repository:
```bash
git clone https://github.com/nossilleen/PBL-211.git
cd EcoZense
```

2. Setup Frontend:
```bash
cd frontend
npm install
npm run dev
```

3. Setup Backend:
```bash
cd backend
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

## Development

- Frontend runs on http://localhost:3000
- Backend API runs on http://localhost:8000

## Contributing

1. Fork the repository
2. Create your feature branch
3. Commit your changes
4. Push to the branch
5. Create a Pull Request

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