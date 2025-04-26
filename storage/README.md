# 💾 Folder Storage

Folder ini berisi file yang diupload pengguna dan file yang digenerate oleh aplikasi EcoZense.

## Struktur Folder

- `app/` - File aplikasi yang dihasilkan/diupload
  - `public/` - File public yang dapat diakses melalui storage link
- `framework/` - Data yang disimpan oleh framework
  - `cache/` - Cache data
  - `sessions/` - Session data
  - `views/` - Compiled blade views
- `logs/` - Log aplikasi

## Penggunaan Storage

### Upload File

Untuk menyimpan file upload:
```php
$path = $request->file('image')->store('public/images');
```

### Akses File Public

Pastikan symbolic link sudah dibuat:
```bash
php artisan storage:link
```

Kemudian akses file dengan URL:
```
/storage/images/filename.jpg
```

### Filesystem Config

Konfigurasi storage dapat ditemukan di `config/filesystems.php`.

## Catatan Penting

- Folder ini tidak dicommit ke git repository (kecuali .gitkeep files)
- Pastikan permission folder sesuai (755 untuk folder, 644 untuk file)
- Backup folder ini secara berkala di environment production 