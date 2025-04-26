# 🛣️ Folder Routes

Folder ini berisi definisi rute untuk aplikasi EcoZense.

## File Penting

- `web.php` - Rute untuk web interface
- `api.php` - Rute untuk REST API
- `channels.php` - Definisi broadcasting channels
- `console.php` - Command Artisan custom
- `auth.php` - Rute authentication (jika menggunakan Laravel Breeze/Jetstream)

## Panduan Routing

### Web Routes

Digunakan untuk halaman yang dirender oleh server (blade templates).
```php
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
```

### API Routes

Digunakan untuk endpoint REST API yang mengembalikan JSON.
```php
Route::apiResource('products', ProductController::class);
```

### Route Groups & Middleware

Gunakan route groups untuk mengorganisir rute dengan middleware yang sama:
```php
Route::middleware(['auth'])->group(function () {
    // Rute yang memerlukan authentication
});
```

### Named Routes

Selalu gunakan named routes untuk kemudahan referensi di view:
```php
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
``` 