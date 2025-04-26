# 🎨 Folder Resources

Folder ini berisi semua resource frontend untuk aplikasi EcoZense.

## Struktur Folder

- `js/` - Kode JavaScript dan Vue.js
  - `components/` - Komponen Vue
  - `app.js` - Entry point aplikasi Vue
- `css/` - File CSS dan Tailwind
- `views/` - Template Blade Laravel
- `sass/` - File SCSS jika digunakan
- `lang/` - File translasi

## Panduan Pengembangan

### Vue Components

Semua komponen Vue disimpan di `js/components/`. Gunakan naming convention berikut:
- PascalCase untuk nama file dan nama komponen
- Pisahkan berdasarkan fitur atau tipe komponen

### CSS dengan Tailwind

Gunakan Tailwind CSS untuk styling. Hindari CSS custom kecuali benar-benar diperlukan.

### Blade Templates

Template Blade disimpan di `views/`. Gunakan inheritance template dengan layout base.

## Build

Untuk build resources:
```bash
npm run dev   # untuk development
npm run build # untuk production
``` 