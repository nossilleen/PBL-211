# Workflow Pengembangan EcoZense

## Alur Kerja Dasar (Basic Workflow)

### 1. Workflow Task-Based 

Untuk mengerjakan fitur baru:
1. **Frontend (Laravel + Tailwind):**
   ```
   Buat Blade View → Setup Route → Desain UI dengan Tailwind → Integrasi Controller → Test → Refine
   ```

2. **Backend (Laravel):**
   ```
   Buat Migration → Buat Model → Buat Controller → Setup Route → Test API → Refine
   ```
   
### 2. Command Penting untuk Frontend (Vue.js)

```bash
# Masuk ke direktori frontend
cd EcoZense/frontend

# Install dependencies
npm install

# Jalankan development server
npm run dev

# Build untuk production
npm run build

# Install package baru
npm install package-name

# Install package development
npm install -D package-name
```

### 3. Command Penting untuk Backend (Laravel)

```bash
# Masuk ke direktori backend
cd EcoZense/backend

# Install dependencies
composer install

# Generate app key
php artisan key:generate

# Jalankan migrasi database 
php artisan migrate

# Jalankan development server
php artisan serve

# Buat controller baru
php artisan make:controller NamaController

# Buat model dengan migration
php artisan make:model NamaModel -m

# Buat middleware
php artisan make:middleware NamaMiddleware

# Seeder database
php artisan db:seed

# Clear cache
php artisan cache:clear
```

## File dan Direktori Penting

### Frontend (Vue.js)

1. **File Penting**
   - `package.json` - konfigurasi project & dependencies
   - `vite.config.js` - konfigurasi build tool
   - `index.html` - entry point aplikasi
   - `src/main.js` - script inisialisasi Vue
   - `src/App.vue` - komponen utama
   - `src/router/index.js` - konfigurasi routing

2. **Direktori untuk Coding Frontend**
   - `src/views/` - halaman utama
   - `src/components/` - reusable UI components
   - `src/assets/css/` - file CSS & Tailwind
   - `src/router/` - routing configuration

### Backend (Laravel)

1. **File Penting**
   - `.env` - konfigurasi environment
   - `routes/api.php` - definisi route API
   - `app/Http/Controllers/` - controller API
   - `app/Models/` - model data
   - `database/migrations/` - skema database

2. **Direktori untuk Coding Backend**
   - `app/Http/Controllers/` - logic API endpoints
   - `app/Models/` - definisi & relasi model
   - `database/migrations/` - struktur database
   - `routes/api.php` - routing API

## full direktori

```bash
project-root/
│
├── frontend/                  # Seluruh kode frontend Vue.js
│   ├── src/                   # Kode sumber utama frontend
│   │   ├── assets/            # Aset statis (gambar, fonts, styles)
│   │   ├── components/        # Komponen Vue yang dapat digunakan ulang
│   │   │   ├── common/        # Komponen umum (Button, Card, Loading)
│   │   │   ├── layouts/       # Komponen layout (Header, Footer, Sidebar)
│   │   │   └── features/      # Komponen spesifik fitur (Auth, Dashboard)
│   │   ├── views/             # Halaman utama aplikasi
│   │   ├── router/            # Konfigurasi Vue Router
│   │   ├── store/             # State management dengan Vuex
│   │   ├── services/          # Layanan API dan integrasi backend
│   │   ├── utils/             # Fungsi utility dan helper
│   │   ├── App.vue            # Komponen root aplikasi
│   │   └── main.js            # Entry point aplikasi
│   ├── public/                # Aset statis yang tidak di-process
│   ├── dist/                  # Output build untuk production
│   ├── package.json           # Konfigurasi dependencies
│   ├── vite.config.js         # Konfigurasi build tool
│   └── tailwind.config.js     # Konfigurasi Tailwind CSS
│
├── backend/                   # Seluruh kode backend Laravel
│   ├── app/                   # Kode utama aplikasi
│   │   ├── Http/              # HTTP layer (Controllers, Middleware, Requests)
│   │   ├── Models/            # Model database (User, Article, Product, Point)
│   │   ├── Services/          # Business logic
│   │   └── Providers/         # Service providers
│   ├── database/              # Migrasi dan seeder database
│   │   ├── migrations/        # Database migrations
│   │   └── seeders/           # Data seeder untuk testing
│   ├── routes/                # Definisi routing API dan web
│   │   ├── api.php            # Routes untuk API
│   │   └── web.php            # Routes untuk web
│   ├── config/                # File konfigurasi aplikasi
│   ├── storage/               # File upload dan generated files
│   ├── public/                # Public assets
│   ├── .env                   # Konfigurasi environment
│   └── composer.json          # Dependensi PHP
│
├── database/                  # Script database
│   └── db_ecozense.sql        # Database dump
│
├── docs/                      # Dokumentasi proyek
│   ├── diagram/               # Diagram desain (ERD, Use Case, Activity)
│   ├── mockups/               # Mockup UI/UX
│   ├── api-docs/              # Dokumentasi API
│   ├── RPP.md                 # Rencana Pengembangan Perangkat Lunak
│   └── SKPPL.md               # Spesifikasi Kebutuhan Perangkat Lunak
│
└── README.md                  # Dokumentasi utama proyek
```


## Tips untuk Pemula

### Workflow Dasar

1. **Gunakan 2 terminal terpisah**
   - Terminal 1: `cd frontend` → `npm run dev`
   - Terminal 2: `cd backend` → `php artisan serve`

2. **Struktur Git Branches**
   - `main` - kode production stabil
   - `develop` - fitur yang sudah selesai
   - `feature/nama-fitur` - fitur dalam pengembangan

3. **Testing Berkala**
   - Test setiap fitur sebelum commit
   - Gunakan browser developer tools (F12)
   - Gunakan Postman untuk test API

### Debugging

1. **Frontend Debugging**
   - Console browser (F12 → Console)
   - Vue Devtools extension
   - `console.log()` untuk inspeksi data

2. **Backend Debugging**
   - `dd($variable)` - dump & die
   - Laravel logs di `storage/logs/laravel.log`
   - Postman untuk test API endpoints

### File yang Sering Diakses

1. **Frontend Development**
   - Vue components (`.vue` files)
   - Router configuration
   - API services (axios)
   - CSS/Tailwind styles

2. **Backend Development**
   - Controllers (API endpoints)
   - Models (database interaction)
   - Migrations (database structure)
   - API routes

## Panduan Praktis untuk Developer Baru

### Setup Awal

1. **Clone repo** 
   ```bash
   git clone [repo-url]
   cd EcoZense
   ```

2. **Setup backend**
   ```bash
   cd backend
   composer install
   cp .env.example .env
   # Edit .env sesuai database local
   php artisan key:generate
   php artisan migrate
   ```

3. **Setup frontend**
   ```bash
   cd ../frontend
   npm install
   ```

4. **Jalankan servers**
   ```bash
   # Terminal 1 (backend)
   cd backend
   php artisan serve
   
   # Terminal 2 (frontend)
   cd frontend
   npm run dev
   ```

### Workflow Harian

1. **Pull perubahan terbaru**
   ```bash
   git pull origin main
   ```

2. **Buat branch untuk fitur**
   ```bash
   git checkout -b feature/nama-fitur
   ```

3. **Coding & testing locally**

4. **Commit perubahan**
   ```bash
   git add .
   git commit -m "Deskripsi perubahan"
   ```

5. **Push ke repo**
   ```bash
   git push origin feature/nama-fitur
   ```

### Implementasi Fitur Baru

#### Frontend
1. Buat component di `src/components/`
2. Tambahkan ke view di `src/views/`
3. Tambahkan route jika perlu di `src/router/index.js`
4. Koneksikan ke API dengan axios

#### Backend
1. Buat migration untuk model baru
2. Buat model di `app/Models/`
3. Buat controller di `app/Http/Controllers/`
4. Definisikan route di `routes/api.php`

## Referensi Penting

1. **Dokumentasi:**
   - [Vue.js Documentation](https://vuejs.org/guide/introduction.html)
   - [Tailwind CSS Documentation](https://tailwindcss.com/docs)
   - [Laravel Documentation](https://laravel.com/docs)

2. **Tools:**
   - Postman - testing API
   - Vue DevTools - debugging Vue
   - PHP Artisan - Laravel command line
   - Tailwind CSS Intellisense - VSCode extension

3. **Cheatsheets:**
   - [Vue.js Cheat Sheet](https://www.vuemastery.com/vue-cheat-sheet/)
   - [Tailwind CSS Cheat Sheet](https://nerdcave.com/tailwind-cheat-sheet)
   - [Laravel Cheat Sheet](https://laravel-news.com/laravel-cheat-sheet)
   - [Git Cheat Sheet](https://education.github.com/git-cheat-sheet-education.pdf)

Dengan memahami workflow, perintah, dan struktur file di atas, pemula akan memiliki panduan dasar untuk berkontribusi pada proyek EcoZense dengan efektif.
