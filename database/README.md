# 🗄️ Folder Database

Folder ini berisi migrasi database, seeder, dan factory untuk aplikasi EcoZense.

## Struktur Folder

- `migrations/` - Skema database dan perubahan struktur
- `seeders/` - Data awal untuk database
- `factories/` - Factory untuk membuat data testing

## Panduan Penggunaan

### Membuat Migrasi Baru
```bash
php artisan make:migration create_nama_table
```

### Menjalankan Migrasi
```bash
php artisan migrate
```

### Menjalankan Seeder
```bash
php artisan db:seed
```

### Reset Database
```bash
php artisan migrate:fresh --seed
``` 