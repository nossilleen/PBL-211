# ⚙️ Folder Config

Folder ini berisi file konfigurasi untuk aplikasi EcoZense.

## File Penting

- `app.php` - Konfigurasi umum aplikasi
- `database.php` - Konfigurasi database
- `auth.php` - Konfigurasi autentikasi
- `services.php` - Konfigurasi integrasi layanan pihak ketiga

## Panduan Penggunaan

- Jangan ubah file konfigurasi langsung, gunakan file `.env` untuk override konfigurasi
- Jangan pernah menyimpan kredensial/secret di file konfigurasi
- Untuk mengambil nilai konfigurasi: `config('nama_file.nama_key')` 