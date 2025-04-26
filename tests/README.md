# 🧪 Folder Tests

Folder ini berisi semua test untuk aplikasi EcoZense.

## Struktur Folder

- `Feature/` - Feature tests (menguji fitur lengkap/end-to-end)
- `Unit/` - Unit tests (menguji komponen kecil secara terisolasi)
- `Browser/` - Browser tests (jika menggunakan Laravel Dusk)

## Jenis Test

### Unit Tests

Unit tests menguji komponen individual secara terisolasi:
```php
public function test_model_can_be_created()
{
    $user = User::factory()->create();
    $this->assertInstanceOf(User::class, $user);
}
```

### Feature Tests

Feature tests menguji fitur lengkap termasuk request dan response:
```php
public function test_user_can_view_articles()
{
    $response = $this->get('/articles');
    $response->assertStatus(200);
    $response->assertSee('Artikel Terbaru');
}
```

## Menjalankan Tests

```bash
# Menjalankan semua test
php artisan test

# Menjalankan test spesifik
php artisan test --filter=UserTest

# Menjalankan test dengan coverage
php artisan test --coverage
```

## Panduan Testing

- Selalu buat test untuk fitur baru
- Ikuti konvensi penamaan yang konsisten (test_can_do_something)
- Gunakan database in-memory untuk testing
- Gunakan factory untuk membuat data test 