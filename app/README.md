# 📂 Folder App

Folder ini berisi kode utama aplikasi EcoZense termasuk models, controllers, middleware, dan services.

## Struktur Folder

- `Http/` - Controllers, Middleware, Requests
- `Models/` - Model database (User, Product, Article, dll)
- `Services/` - Business logic dan kode pemrosesan

## Panduan Pengembangan

- Ikuti prinsip MVC (Model-View-Controller)
- Gunakan namespace yang sesuai
- Untuk menambahkan controller baru: `php artisan make:controller NamaController`
- Untuk menambahkan model baru: `php artisan make:model NamaModel -m` 