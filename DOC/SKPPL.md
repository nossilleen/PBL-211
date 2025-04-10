# SPESIFIKASI KEBUTUHAN DAN PERANCANGAN PERANGKAT LUNAK (EcoZense)
## Aplikasi Web Eco Enzim

Dipersiapkan oleh:
- 4342401075 - Arshafin Alfisyahrin
- 4342401070 - Muhamad Ariffadhlullah
- 4342401068 - Steven Kumala
- 4342401079 - Muhammad Faldy Rizaldi
- 4342401066 - Thalita Aurelia Marsim
- 4342401082 - Agnes Natalia Silalahi

Program Studi Teknologi Rekayasa Perangkat Lunak  
Politeknik Negeri Batam  
Jl. Ahmad Yani, Batam 29461  
2025

---

## Daftar Isi
1. [PENDAHULUAN](#1-pendahuluan)
   1. [TUJUAN](#11-tujuan)
   2. [LINGKUP MASALAH](#12-lingkup-masalah)
   3. [DEFINISI, AKRONIM DAN SINGKATAN](#13-definisi-akronim-dan-singkatan)
   4. [ATURAN PENAMAAN DAN PENOMORAN](#14-aturan-penamaan-dan-penomoran)
   5. [REFERENSI](#15-referensi)
   6. [IKHTISAR DOKUMEN](#16-ikhtisar-dokumen)
2. [DESKRIPSI UMUM PERANGKAT LUNAK](#2-deskripsi-umum-perangkat-lunak)
   1. [DESKRIPSI UMUM SISTEM](#21-deskripsi-umum-sistem)
   2. [PROSES BISNIS SISTEM](#22-proses-bisnis-sistem)
   3. [KARAKTERISTIK PENGGUNA](#23-karakteristik-pengguna)
   4. [BATASAN](#24-batasan)
   5. [RANCANGAN LINGKUNGAN IMPLEMENTASI](#25-rancangan-lingkungan-implementasi)
3. [DESKRIPSI RINCI KEBUTUHAN](#3-deskripsi-rinci-kebutuhan)
   1. [DESKRIPSI FUNGSIONAL](#31-deskripsi-fungsional)
      1. [Use Case Diagram](#311-use-case-diagram)
      2. [Use Case \<nama use case\>](#312-use-case-nama-use-case)
4. [DESKRIPSI KELAS-KELAS](#4-deskripsi-kelas-kelas)
   1. [CLASS DIAGRAM](#41-class-diagram)
   2. [CLASS \<NAMA CLASS\>](#42-class-nama-class)
   3. [CLASS \<NAMA CLASS\> DAN SETERUSNYA](#43-class-nama-class-dan-seterusnya)
   4. [STATE MACHINE DIAGRAM](#44-state-machine-diagram)
5. [DESKRIPSI DATA](#5-deskripsi-data)
   1. [ENTITY-RELATIONSHIP DIAGRAM](#51-entity-relationship-diagram)
   2. [DAFTAR TABEL](#52-daftar-tabel)
   3. [STRUKTUR TABEL \<NAMA TABEL\>](#53-struktur-tabel-nama-tabel)
   4. [STRUKTUR TABEL \<NAMA TABEL\> DAN SETERUSNYA](#54-struktur-tabel-nama-tabel-dan-seterusnya)
   5. [SKEMA RELASI ANTAR TABEL](#55-skema-relasi-antar-tabel)
6. [PERANCANGAN ANTARMUKA](#6-perancangan-antarmuka)
   1. [ANTARMUKA \<NAMA ANTARMUKA\>](#61-antarmuka-nama-antarmuka)
   2. [ANTARMUKA \<NAMA ANTARMUKA\> DAN SETERUSNYA](#62-antarmuka-nama-antarmuka-dan-seterusnya)
7. [MATRIKS KETERUNUTAN](#7-matriks-keterunutan)

---

## 1 Pendahuluan

### 1.1 Tujuan
Dokumen ini berisi Spesifikasi Kebutuhan Perangkat Lunak (SKPL) untuk Aplikasi Web Eco Enzim (EcoZense). Tujuan dari penulisan dokumen ini adalah untuk memberikan penjelasan menyeluruh mengenai perangkat lunak yang akan dikembangkan, baik dalam bentuk gambaran umum maupun penjelasan detail mengenai fitur dan kebutuhan sistem.

Pengguna dari dokumen ini meliputi pengembang perangkat lunak yang akan membangun sistem serta pengguna atau klien yang akan menggunakan aplikasi web ini. Selain itu, dokumen ini juga akan menjadi referensi bagi personil-personil yang terlibat dalam proses pengembangan dan implementasi sistem.

Dokumen SKPPL ini akan digunakan sebagai acuan utama dalam proses pengembangan perangkat lunak dan sebagai bahan evaluasi selama serta setelah pengembangan berlangsung. Dengan adanya dokumen ini, diharapkan pengembangan Aplikasi Web Eco Enzim dapat berjalan dengan terarah, fokus, dan sesuai dengan kebutuhan, serta menghindari potensi ambiguitas, terutama bagi tim pengembang sistem informasi.

### 1.2 Lingkup Masalah
Eco Zense (Aplikasi web Eco Enzim) adalah suatu sistem informasi yang dikelola oleh PBL-211. Sistem informasi ini dirancang sebagai pusat informasi dan edukasi yang bertujuan untuk meningkatkan kesadaran masyarakat tentang pentingnya Eco Enzim dalam menjaga lingkungan. Aplikasi ini menyediakan berbagai artikel, tutorial, dan panduan praktis tentang cara pembuatan dan pemanfaatan Eco Enzim serta mengajak masyarakat untuk mengikuti salah satu program yaitu bank sampah.

Dengan adanya aplikasi ini, diharapkan lebih banyak orang dapat memahami dan menerapkan konsep Eco Enzim dalam kehidupan sehari-hari guna menciptakan lingkungan yang lebih bersih dan sehat. Sistem informasi ini bisa diakses oleh user, admin, dan contributor.

### 1.3 Definisi, Akronim dan Singkatan
Definisi dari istilah yang digunakan pada dokumen ini dibuat berdasarkan hasil terjemahan dari IEEE Std 610.12-1990.

1. **Nasabah**  
   Pengguna umum dapat mengakses aplikasi web Eco Enzim untuk memperoleh informasi, edukasi, dan layanan terkait eco enzim. Sebagai nasabah, mereka memiliki hak untuk menyetor sampah secara langsung ke bank sampah dan menerima poin, yang dapat digunakan untuk membeli produk eco enzim atau sembako.

2. **Admin**  
   Pengguna dengan hak akses tertinggi yang bertanggung jawab atas pengelolaan sistem, pengaturan pengguna, serta pemantauan dan pemeliharaan aplikasi web Eco Enzim.

3. **Pengelola bank sampah**  
   Pengguna ini memiliki akses ke aplikasi Eco Enzim dengan hak untuk mengelola bank sampah, memasukkan lokasi, mempublikasikan produk, serta memberikan poin kepada nasabah.

**SKPL** - Spesifikasi Kebutuhan dan Perancangan Perangkat Lunak  
**SRDS** - Software Requirements and Design Specification (SRDS)  
**UML** - Unified Modelling Language  
**ERD** - Entity Relationship Diagram  
**DBMS** - Data Base Management System  

### 1.4 Aturan Penamaan dan Penomoran
Penulisan dokumen SKPL ini menggunakan berbagai macam aturan penamaan dan penomoran yang berbeda-beda untuk beberapa bagian tertentu. Aturan penamaan dan penomoran yang digunakan berdasarkan hal/bagian tersebut adalah seperti yang tercantum pada Tabel 1 berikut ini.

**Tabel 1 Aturan penamaan dan penomoran**

| Hal/Bagian | Aturan penomoran/Penamaan |
|------------|----------------------------|
| Kebutuhan Functional | SKPL-FXX : Menunjukkan kebutuhan fungsional ke-XX |
| Kebutuhan Non Functional | SKPL-NFXX : Menunjukkan kebutuhan non fungsional ke-XX |
| Ringkasan kebutuhan fungsional | SKPL-Fxxx dimana xxx adalah tiga digit bilangan bulat dimulai dari 000 |
| Ringkasan kebutuhan nonfungsional | SKPL-NFxxx dimana xxx adalah tiga digit bilangan bulat dimulai dari 000 |
| Use Case | PBL/USECASE/XX menunjukkan use case ke-XX |

### 1.5 Referensi
Daftar dokumen yang digunakan sebagai acuan atau rujukan dalam penyusunan dokumen SKPPL ini adalah sebagai berikut:

- IEEE Std 610.12-1990, IEEE Standard Glossary of Software Engineering Terminology.
- Panduan Penggunaan dan Pengisian Spesifikasi Perangkat Lunak (SKPL) untuk Sistem Informasi Kalibrasi Alat (ITS).
- Panduan Pengisian Spesifikasi Kebutuhan dan Perancangan Perangkat Lunak (SKPPL).
- SKPL untuk Sistem Informasi Student Advisory Center (ITS).

### 1.6 Ikhtisar Dokumen
- **Bab 1 Pendahuluan**, merupakan pengantar dokumen SKPL yang berisi tujuan penulisan dokumen, lingkup masalah, serta definisi dan istilah yang digunakan. Selain itu, memberikan deskripsi umum mengenai aplikasi web Eco Enzim (EcoZense) sebagai ikhtisar dokumen SKPL.

- **Bab 2 Deskripsi Global Perangkat Lunak**, mendefinisikan perspektif produk perangkat lunak, termasuk tujuan utama aplikasi web Eco Enzim. Asumsi dan ketergantungan yang digunakandalam pengembangan sistem informasi EcoZense.

- **Bab 3 Deskripsi Rinci Kebutuhan**, mendeskripsikan kebutuhan khusus bagi Sistem Informasi EcoZense, yang meliputi kebutuhan antarmuka eksternal, kebutuhan fungsionalitas, kebutuhan performansi, batasan perancangan, atribut sistem perangkat lunak, dan kebutuhan lain dari Sistem Informasi EcoZense.

## 2 Deskripsi Umum Perangkat Lunak

### 2.1 Deskripsi Umum Sistem
EcoZense adalah sebuah sistem informasi berbasis web yang dirancang untuk memberikan informasi yang jelas dan mudah diakses mengenai Eco Enzim serta menyediakan layanan bagi pengguna yang ingin bergabung dalam program bank sampah dan menjadi nasabah. Sistem ini dapat diakses oleh nasabah, pengelola bank sampah, dan admin yang mengelola seluruh aspek informasi dalam aplikasi.

Pengguna umum dapat mengakses website EcoZense melalui landing page, di mana mereka dapat:
- Menonton video edukasi mengenai Eco Enzim.
- Membaca artikel terkait Eco Enzim untuk memperdalam pemahaman mereka.
- Mendaftar sebagai nasabah bank sampah, yang memungkinkan mereka untuk menyetor sampah dan memperoleh poin sebagai bentuk imbalan.
- Menukarkan poin yang diperoleh dengan produk Eco Enzim yang dihasilkan dari sampah yang dikumpulkan atau menukarnya dengan sembako. Penting untuk dicatat bahwa poin yang diperoleh dari bank sampah tertentu hanya dapat ditukarkan di bank sampah tersebut, tidak dapat ditransfer atau ditukarkan di bank sampah lainnya.

Pengelola bank sampah memiliki peran dalam menerima sampah yang disetor oleh nasabah dan memberikan poin berdasarkan jumlah dan jenis sampah yang disetorkan. Selain itu, pengelola dapat mempublikasikan produk Eco Enzim yang tersedia di website, sehingga pengguna dapat mengecek dan membeli produk tersebut secara langsung melalui sistem.

Admin dalam EcoZense bertanggung jawab untuk:
- Mengelola seluruh informasi dan edukasi dalam sistem.
- Mengatur artikel, video edukasi, dan promosi terkait Eco Enzim.
- Mengelola data pengguna, termasuk proses registrasi dan login.
- Mengelola informasi terkait kegiatan dan event yang berhubungan dengan EcoZense.

Melalui sistem EcoZense, diharapkan masyarakat dapat dengan mudah mengakses informasi mengenai Eco Enzim serta berpartisipasi dalam program bank sampah, yang bertujuan untuk mengurangi limbah dan menciptakan manfaat ekonomi serta lingkungan.

### 2.2 Proses Bisnis Sistem
Activity diagram:

![Diagram Aktivitas Pada Aplikasi Web Eco Enzim](Gambar 1. Diagram Aktivitas Pada Aplikasi Web Eco Enzim)

Berikut adalah alur utama dalam sistem EcoZense:
- **Pendaftaran Nasabah**: Pengguna umum dapat melakukan registrasi untuk bergabung sebagai nasabah bank sampah.
- **Penyetoran Sampah**: Nasabah menyetor sampah kepada pengelola bank sampah yang akan mengevaluasi dan memberikan poin sesuai dengan jenis dan jumlah sampah yang dikumpulkan.
- **Penukaran Poin**: Poin yang telah dikumpulkan dapat digunakan untuk mendapatkan produk Eco Enzim atau sembako.
- **Publikasi Produk**: Pengelola bank sampah dapat mengunggah informasi produk Eco Enzim yang tersedia.
- **Edukasi dan Promosi**: Admin mengelola dan memperbarui konten edukasi terkait Eco Enzim serta mempublikasikan event atau promosi terkait.
- **Manajemen Pengguna**: Admin mengelola akun nasabah dan aktivitas dalam sistem.

### 2.3 Karakteristik Pengguna

| Pengguna | Tanggung Jawab | Hak Akses pada Aplikasi | Kemampuan yang Harus Dimiliki |
|----------|----------------|-------------------------|-------------------------------|
| Nasabah | - Menyetor sampah.<br>- Mengakses artikel dan dapat memberikan feedback.<br>- Membeli produk eco-enzim. | - Akses ke landing page<br>- Akses ke artikel<br>- Dapat memberikan feedback<br>- Penyetoran sampah<br>- Penukaran poin | - Dasar penggunaan web<br>- Pemahaman tentang bank sampah<br>- Pemahaman tentang eco enzim |
| Pengelola Bank Sampah | - Mengelola bank. sampah<br>- Mengelola produk eco-enzim dan menjualnya pada website.<br>- Memberikan poin kepada nasabah yang telah menyetor sampah. | Akses ke dashboard pengelola | - Operasi sistem bank sampah<br>- Manajemen data |
| Admin | - Mengelola artikel.<br>- Mengelola data pengguna.<br>- Mengelola promosi kegiatan dan event. | Akses penuh pada sistem | - Pemahaman sistem informasi<br>- Manajemen konten<br>- Manajemen data |

### 2.4 Batasan
- Sistem hanya dapat diakses melalui platform web, belum tersedia dalam bentuk aplikasi mobile.
- Penyetoran sampah hanya dapat dilakukan di lokasi bank sampah yang terdaftar dalam sistem.
- Produk Eco Enzim dan sembako yang tersedia bergantung pada stok di masing-masing bank sampah.
- Poin yang diperoleh dari bank sampah tertentu hanya dapat ditukarkan pada bank sampah tersebut, tidak dapat ditransfer atau digunakan di bank sampah lainnya.
- Sistem ini hanya mendukung transaksi non-tunai untuk penukaran poin.
- Informasi yang tersedia dalam sistem hanya terbatas pada konten yang telah diverifikasi oleh admin.

### 2.5 Rancangan Lingkungan Implementasi
- Sistem Operasi: Windows Server
- DBMS: MySQL
- Development Tools: VS Code, Git, GitHub
- Filing System: Google Cloud Storage
- Bahasa Pemrograman: Backend: PHP/Laravel, FrontEnd: React.js

## 3 Deskripsi Rinci Kebutuhan

### 3.1 Deskripsi Fungsional
- **SKPL-F01** pengguna dapat membuat akun sebagai nasabah, dan admin dapat mengelola akun pengguna
- **SKPL-F02** nasabah dapat menyetor sampah dan mendapatkan poin, pengelola bank sampah dapat menilai dan memberikan poin atas penyetoran sampah.
- **SKPL-F03** nasabah dapat menukar poin dengan produk Eco Enzim atau sembako, dengan ketentuan poin hanya dapat ditukarkan di bank sampah tempat poin tersebut diperoleh.
- **SKPL-F04** admin dapat menambahkan dan mengedit artikel serta video edukasi tentang Eco Enzim dan pengguna dapat membaca dan memberikan feedback pada artikel.
- **SKPL-F05** pengelola bank sampah dapat mengunggah dan memperbaharui daftar produk Eco Enzim yang tersedia.
- **SKPL-F06** admin dapat membuat dan mengelola event terkait program Eco Enzim.
- **SKPL-F07** pengelola bank sampah dapat menginput lokasi bank sampah.

#### 3.1.1 Use Case Diagram

![Use Case Diagram Aplikasi Web Eco Enzim](Gambar 2. Use Case Diagram Aplikasi Web Eco Enzim)

#### 3.1.2 Use Case Pemilih Mengganti Kata Sandi

##### 3.1.2.1 Skenario

**Identifikasi**

| Nomor | PBL/USECASE/01 |
|-------|----------------|
| Nama | Pengguna dapat membuat akun sebagai nasabah, dan admin dapat mengelola akun pengguna |
| Deskripsi | Pengguna dapat melakukan pendaftaran sebagai nasabah, sementara admin memiliki hak untuk mengelola akun pengguna. |
| Aktor | Nasabah, Admin |
| Kondisi awal | Belum mempunyai akun / Admin ingin mengelola akun pengguna. |
| Kondisi akhir | Akun pengguna berhasil dibuat atau dikelola oleh admin. |

**Skenario Utama**

Pembuatan akun oleh pengguna
1. Pengguna membuka halaman pendaftaran.
2. Sistem menampilkan formulir pendaftaran.
3. Pengguna mengisi data diri (nama, email, password, dll.).
4. Pengguna menekan tombol "Daftar".
5. Sistem memvalidasi data dan menyimpan akun jika inputan valid.
6. Sistem menampilkan pesan sukses bahwa akun berhasil dibuat.

Pengelolaan akun oleh admin
1. Admin login ke sistem.
2. Sistem menampilkan daftar akun pengguna yang terdaftar.
3. Admin dapat mencari akun tertentu berdasarkan nama atau email.
4. Admin memilih akun yang ingin dikelola.
5. Admin dapat mengedit data akun atau menonaktifkan akun pengguna jika diperlukan.
6. Sistem menyimpan perubahan dan menampilkan pesan sukses.

**Skenario Alternatif**
1a. Pengguna memasukkan data yang tidak valid (seperti email tidak sesuai format biasanya atau password yang terlalu pendek, seperti 3 digit)
1b. Pengguna mencoba mendaftar dengan email yang sudah digunakan, sistem menampilkan pesan bahwa email sudah terdaftar.
4a. Admin mencoba menonaktifkan akun pengguna, tetapi sistem meminta konfirmasi sebelum melakukan tindakan ini.
4b. Admin tidak memiliki izin untuk mengedit akun tertentu, sistem menampilkan pesan akses ditolak.

##### 3.1.2.2 Interaksi Objek

#### 3.1.3 Use Case Penyetoran Sampah dan Pemberian Poin

##### 3.1.3.1 Skenario

**Identifikasi**

| Nomor | PBL/USECASE/02 |
|-------|----------------|
| Nama | Penyetoran sampah dan Pemberian poin |
| Deskripsi | Nasabah dapat menyetor sampah dan mendapatkan poin, pengelola bank sampah dapat menilai dan memberikan poin atas penyetoran sampah |
| Aktor | Nasabah dan Pengelola bank sampah |
| Kondisi awal | Nasabah melakukan penyetoran sampah |
| Kondisi akhir | Sampah telah disetor dan poin dapat diberikan kepada nasabah dari pengelola bank sampah |

**Skenario Utama**
1. Nasabah menyetor sampah secara langsung kepada pengelola bank sampah.
2. Pengelola bank sampah menerima sampah, kemudian menimbang sampah.
3. Timbangan sampah dikonversikan menjadi poin pada aplikasi.
4. Poin diberikan kepada Nasabah oleh Pengelola bank sampah.
5. Nasabah berhasil menerima poin.

**Skenario Alternatif**
3a. Aplikasi tidak dapat mengonversi poin.

#### 3.1.4 Use Case Penukaran Poin dengan Produk atau Sembako

##### 3.1.4.1 Skenario

**Identifikasi**

| Nomor | PBL/USECASE/03 |
|-------|----------------|
| Nama | Penukaran Poin dengan Produk atau Sembako |
| Deskripsi | Nasabah dapat menukar poin yang telah dikumpulkan dengan produk Eco Enzim atau sembako melalui aplikasi, dengan syarat poin hanya dapat ditukarkan di bank sampah tempat poin tersebut diperoleh. |
| Aktor | Nasabah |
| Kondisi awal | Nasabah memiliki akun dan masuk ke dalam sistem dan Nasabah memiliki saldo poin yang cukup untuk ditukarkan di bank sampah tempat poin diperoleh. |
| Kondisi akhir | Produk Eco Enzim atau sembako berhasil ditukar dan poin nasabah di bank sampah tersebut berkurang sesuai jumlah yang digunakan. |

**Skenario Utama**
1. Nasabah masuk ke dalam aplikasi web Eco Enzim.
2. Nasabah memilih menu "Tukar Poin".
3. Sistem menampilkan daftar bank sampah tempat nasabah memiliki poin.
4. Nasabah memilih bank sampah tempat ia ingin menukarkan poin.
5. Sistem menampilkan daftar produk Eco Enzim dan sembako beserta jumlah poin yang diperlukan yang tersedia di bank sampah tersebut.
6. Nasabah memilih produk yang ingin ditukar.
7. Sistem menampilkan detail penukaran, termasuk jumlah poin yang akan digunakan.
8. Nasabah mengonfirmasi penukaran.
9. Sistem memverifikasi ketersediaan stok dan saldo poin nasabah di bank sampah yang dipilih.
10. Jika poin cukup dan stok tersedia, sistem mengurangi saldo poin nasabah di bank sampah tersebut dan memproses penukaran.
11. Sistem menampilkan notifikasi bahwa penukaran berhasil dan memberikan informasi pengambilan/pengiriman produk.

**Skenario Alternatif**
1a. Jika saldo poin nasabah tidak mencukupi di bank sampah yang dipilih → Sistem menampilkan pesan bahwa poin tidak cukup untuk melakukan penukaran.
3a. Nasabah tidak memiliki poin di bank sampah mana pun → Sistem menampilkan pesan bahwa nasabah belum memiliki poin untuk ditukarkan.
5a. Jika stok produk habis → Sistem menampilkan notifikasi bahwa produk tidak tersedia dan meminta nasabah memilih produk lain.
9a. Jika terjadi kesalahan saat proses penukaran → Sistem membatalkan transaksi dan mengembalikan poin jika sudah terpotong.

#### 3.1.5 Use case Pengelolaan Artikel dan Video Edukasi serta Pemberikan Feedback

##### 3.1.5.1 Skenario

**Identifikasi**

| Nomor | PBL/USECASE/04 |
|-------|----------------|
| Nama | Pengelolaan Artikel dan Video Edukasi serta Pemberikan |
| Deskripsi | - Admin mengelola (menambah dan mengedit) artikel dan video edukasi.<br>- Pengguna umum dapat membaca artikel dan memberikan komentar atau feedback. |
| Aktor | Admin dan pengguna umum |
| Kondisi awal | - Admin telah login ke dalam sistem.<br>- Pengguna umum mengakses halaman artikel tanpa perlu login. |
| Kondisi akhir | - Artikel atau video edukasi berhasil ditambahkan atau diedit oleh Admin.<br>- Komentar atau feedback berhasil disimpan dan ditampilkan pada artikel oleh Pengguna Umum. |

**Skenario Utama**

Admin:
1. Admin login dan diarahkan ke halaman manajemen artikel dan video edukasi
2. Sistem menampilkan daftar artikel dan video edukasi.
3. Admin memilih "Tambah Artikel/Video".
4. Sistem menampilkan form tambah artikel/video.
5. Admin mengisi judul, deskripsi, dan konten (atau mengunggah video), lalu menekan "Simpan".
6. Sistem menyimpan data dan menampilkan pesan sukses.
7. Admin dapat mengedit atau menghapus artikel/video jika diperlukan

Pengguna umum:
1. Pengguna membuka halaman Artikel dan Video Edukasi.
2. Sistem menampilkan daftar artikel dan video.
3. Pengguna memilih artikel untuk dibaca.
4. Sistem menampilkan isi artikel.
5. Pengguna memberikan komentar atau feedback dan menekan "Kirim".
6. Sistem menyimpan komentar dan menampilkan pesan sukses.

**Skenario Alternatif**
1a. Jika saldo poin nasabah tidak mencukupi → Sistem menampilkan pesan bahwa poin tidak cukup untuk melakukan penukaran.
3a. Jika stok produk habis → Sistem menampilkan notifikasi bahwa produk tidak tersedia dan meminta nasabah memilih produk lain.
7a. Jika terjadi kesalahan saat proses penukaran → Sistem membatalkan transaksi dan mengembalikan poin jika sudah terpotong.

#### 3.1.6 Use Case Pengelolaan Produk Eco Enzim

##### 3.1.6.1 Skenario

**Identifikasi**

| Nomor | PBL/USECASE/05 |
|-------|----------------|
| Nama | Pengelola bank sampah dapat mengunggah dan memperbaharui daftar produk Eco Enzim yang tersedia |
| Deskripsi | Bank sampah dapat mengedit/memperbaharui jumlah produk Eco Enzyme yang masih tersedia |
| Aktor | Bank sampah |
| Kondisi awal | Bank sampah login ke dalam sistem dan melihat jumlah stok |
| Kondisi akhir | Bank sampah mengedit jumlah produk Eco Enzyme sesuai jumlah yang tersedia |

**Skenario Utama**
1. Setelah login, bank sampah masuk ke halaman barang Eco Enzyme
2. Bank sampah melihat jumlah stok Eco Enzyme yang tersedia
3. Bank sampah mencari produk Eco Enzyme di halaman web
4. Bank sampah merubah jumlah produk Eco Enzyme sesuai jumlah yang tersedia
5. Bank sampah menekan tombol "Simpan" untuk merubah jumlahnya
6. Sistem merubah jumlah sesuai yang diubah bank sampah
7. Bank sampah dapat mengurangi dan menambah jumlah produk Eco Enzyme

**Skenario Alternatif**
1a. Bank sampah salah memasukan username atau password, sistem menampilkan password salah
4a. Jika Bank sampah meletakkan huruf atau simbol di kolom jumlah stok, sistem akan gagal menyimpan data yang diperbarui
4b. Bank sampah tidak melengkapi data, sistem akan menampilkan harap lengkapi data
6a. Jika terjadi kegagalan sistem saat menyimpan data, sistem akan menampilkan gagal menyimpan dan harap coba lagi

#### 3.1.7 Use Case Pembuatan dan Pengelolaan Event Eco Enzim

##### 3.1.7.1 Skenario

**Identifikasi**

| Nomor | PBL/USECASE/06 |
|-------|----------------|
| Nama | Pembuatan dan pengelolaan event eco enzim |
| Deskripsi | Admin dapat membuat dan mengelola event eco enzim |
| Aktor | Admin |
| Kondisi awal | Admin telah login ke sistem |
| Kondisi akhir | Admin berhasil membuat atau mengelola event eco enzim |

**Skenario Utama**
1. Setelah login, admin diarahkan ke halaman manajemen event
2. Sistem menampilkan daftar event yang sudah ada
3. Admin memilih opsi untuk membuat event baru
4. Admin mengisi detail event (nama, deskripsi, tanggal, lokasi, dll.)
5. Admin menekan tombol "Simpan" untuk menyimpan event
6. Sistem menampilkan pesan sukses bahwa event telah tersimpan
7. Admin dapat mengedit atau menghapus event yang sudah dibuat jika diperlukan

**Skenario Alternatif**
1a. Admin memasukkan username dan password yang salah dan tidak dapat mengakses halaman manajemen event
3a. Admin memilih untuk mengedit event yang sudah ada dan memperbarui informasinya sebelum menyimpan
3b. Admin memilih untuk menghapus event yang sudah ada, dan sistem meminta konfirmasi sebelum menghapusnya
5a. Admin tidak mengisi data event secara lengkap, sistem menampilkan pesan kesalahan dan meminta admin melengkapi data sebelum menyimpan

#### 3.1.8 Use Case Memasukan Lokasi Bank Sampah

##### 3.1.8.1 Skenario

**Identifikasi**

| Nomor | PBL/USECASE/07 |
|-------|----------------|
| Nama | Memasukkan Lokasi Bank Sampah |
| Deskripsi | Pendaftar pengelola bank sampah dapat memasukkan lokasi yang dikelolanya |
| Aktor | Pengelola bank sampah |
| Kondisi awal | User ingin mendaftar menjadi Pengelola bank sampah |
| Kondisi akhir | User berhasil memasukkan lokasi dan terdaftar sebagai pengelola bank sampah |

**Skenario Utama**
1. User mengakses halaman pendaftaran pengelola bank sampah
2. User mengisi formulir pendaftaran dengan informasi yang diperlukan, termasuk nama, alamat, dan lokasi bank sampah
3. User mengklik tombol "Kirim" untuk mengirimkan data
4. Sistem memvalidasi data yang dimasukkan
5. Jika data valid, sistem menyimpan informasi lokasi bank sampah dan mengonfirmasi pendaftaran kepada user

**Skenario Alternatif**
3a. Jika data yang dimasukkan tidak valid, sistem menampilkan pesan kesalahan dan meminta user untuk memperbaiki informasi yang salah
3b. Jika user tidak mengisi semua kolom yang wajib, sistem menampilkan pesan peringatan dan meminta user untuk melengkapi informasi yang diperlukan
5a. Jika lokasi yang dimasukkan sudah terdaftar sebelumnya, sistem memberikan notifikasi bahwa lokasi tersebut sudah ada dan meminta user untuk memasukkan lokasi yang berbeda

### 3.2 Deskripsi Kebutuhan Non Fungsional

**Tabel kebutuhan non fungsional**

| SKPL-Id | Parameter | Kebutuhan |
|---------|-----------|-----------|
| SKPL-NF01 | Security | - Sistem harus memiliki fitur otentikasi dan otorisasi pengguna<br>- Data pengguna harus dienkripsi |
| SKPL-NF02 | Performance | - Waktu respon sistem harus kurang dari 3 detik pada setiap permintaan pengguna<br>- Sistem harus mampu menangani minimal 1000 pengguna secara bersamaan |
| SKPL-NF03 | Availability | Sistem harus memiliki uptime minimal 90% dalam setahun |
| SKPL-NF04 | Portability | Sistem harus dapat berjalan di browser desktop |
| SKPL-NF05 | User friendly | Antarmuka pengguna harus intuitif dan mudah digunakan oleh masyarakat umum |

## 4 Deskripsi Kelas-Kelas

### 4.1 Class Diagram
Class diagram EcoZense menggambarkan struktur sistem yang terdiri dari kelas-kelas dan hubungan antar kelas. Kelas utama dalam sistem ini meliputi User, Lokasi, Artikel, Produk, Transaksi, TransaksiItem, Poin, Feedback, ArtikelGambar, dan ProdukGambar.

![Class Diagram EcoZense](EcoEnzyme.drawio)

### 4.2 Class User

Nama Kelas: User

| Nama Atribut | Visibility (private, public) | Tipe |
|--------------|------------------------------|------|
| user_id | public | int |
| nama | public | string |
| email | public | string |
| password | public | string |
| no_hp | public | string |
| role | public | string |
| lokasi_id | public | int |

| Nama Operasi | Visibility (private, public) | Keterangan |
|--------------|------------------------------|------------|
| register | public | Mendaftarkan user baru ke dalam sistem dengan data yang telah diinput oleh pengguna (nama, email, password, dll). Sistem akan memvalidasi data dan menyimpan ke database jika valid. |
| login | public | Mengautentikasi user berdasarkan email dan password yang dimasukkan. Mengembalikan nilai boolean true jika berhasil, false jika gagal. |
| updateProfile | public | Memperbarui informasi profile user seperti nama, no_hp, atau data lainnya berdasarkan input pengguna. |
| changePassword | public | Mengubah password user dengan memverifikasi password lama terlebih dahulu, kemudian menyimpan password baru ke database. |
| getRole | public | Mengembalikan role/peran user (Nasabah, Admin, atau Pengelola Bank Sampah) yang digunakan untuk otorisasi akses sistem. |

### 4.3 Class Lokasi

Nama Kelas: Lokasi

| Nama Atribut | Visibility (private, public) | Tipe |
|--------------|------------------------------|------|
| lokasi_id | public | int |
| nama_lokasi | public | string |
| alamat | public | string |
| kota | public | string |
| kode_pos | public | int |

| Nama Operasi | Visibility (private, public) | Keterangan |
|--------------|------------------------------|------------|
| addLocation | public | Menambahkan lokasi bank sampah baru ke dalam sistem dengan data yang diinput oleh pengelola bank sampah. Menyimpan informasi lengkap lokasi ke database. |
| updateLocation | public | Memperbarui informasi lokasi yang sudah ada seperti nama lokasi, alamat, kota, dll. berdasarkan input pengguna. |
| deleteLocation | public | Menghapus informasi lokasi dari sistem jika lokasi tersebut tidak lagi beroperasi atau diperlukan. |
| getLocationDetails | public | Mengambil dan menampilkan detail lengkap dari lokasi bank sampah, termasuk alamat, kota, dll. Mengembalikan objek Lokasi. |

### 4.4 Class Artikel

Nama Kelas: Artikel

| Nama Atribut | Visibility (private, public) | Tipe |
|--------------|------------------------------|------|
| artikel_id | public | int |
| judul | public | string |
| konten | public | text |
| tanggal_publikasi | public | datetime |
| user_id | public | int |

| Nama Operasi | Visibility (private, public) | Keterangan |
|--------------|------------------------------|------------|
| createArticle | public | Membuat artikel baru dengan judul, konten, dan informasi lain yang dimasukkan oleh admin. Menyimpan artikel ke database dengan status draft atau publikasi. |
| updateArticle | public | Memperbarui informasi artikel yang sudah ada seperti judul, konten, dll. berdasarkan input admin. |
| deleteArticle | public | Menghapus artikel dari sistem jika sudah tidak relevan atau diperlukan. |
| publishArticle | public | Mempublikasikan artikel yang masih dalam status draft dengan mengatur tanggal_publikasi dan membuatnya tersedia untuk dibaca pengguna. |
| getArticleDetails | public | Mengambil dan menampilkan detail lengkap artikel termasuk judul, konten, dll. Mengembalikan objek Artikel. |

### 4.5 Class Produk

Nama Kelas: Produk

| Nama Atribut | Visibility (private, public) | Tipe |
|--------------|------------------------------|------|
| produk_id | public | int |
| nama | public | string |
| kategori | public | string |
| status_ketersediaan | public | string |
| harga | public | decimal |
| user_id | public | int |

| Nama Operasi | Visibility (private, public) | Keterangan |
|--------------|------------------------------|------------|
| addProduct | public | Menambahkan produk eco enzim baru ke dalam sistem dengan data yang diinput oleh pengelola bank sampah. Menyimpan informasi produk ke database. |
| updateProduct | public | Memperbarui informasi produk yang sudah ada seperti nama, kategori, harga, dll. berdasarkan input pengelola bank sampah. |
| deleteProduct | public | Menghapus produk dari sistem jika sudah tidak tersedia atau diperlukan. |
| updateStock | public | Memperbarui status ketersediaan produk setelah terjadi transaksi atau penambahan stok baru. |
| getProductDetails | public | Mengambil dan menampilkan detail lengkap produk termasuk nama, harga, kategori, dll. Mengembalikan objek Produk. |

### 4.6 Class ProdukGambar

Nama Kelas: ProdukGambar

| Nama Atribut | Visibility (private, public) | Tipe |
|--------------|------------------------------|------|
| gambar_id | public | int |
| produk_id | public | int |
| file_path | public | varchar |
| created_at | public | timestamp |
| updated_at | public | timestamp |

| Nama Operasi | Visibility (private, public) | Keterangan |
|--------------|------------------------------|------------|
| uploadImage | public | Mengunggah gambar baru untuk produk tertentu. Menyimpan file gambar ke server dan mencatat informasi gambar di database. |
| deleteImage | public | Menghapus gambar dari produk dan sistem jika sudah tidak diperlukan. |
| updateImage | public | Memperbarui file gambar produk. |
| getImageDetails | public | Mengambil dan menampilkan detail lengkap gambar tertentu. Mengembalikan objek ProdukGambar. |
| getImageList | public | Mengambil dan menampilkan daftar semua gambar untuk produk tertentu. Mengembalikan daftar objek ProdukGambar. |

### 4.7 Class Transaksi

Nama Kelas: Transaksi

| Nama Atribut | Visibility (private, public) | Tipe |
|--------------|------------------------------|------|
| transaksi_id | public | int |
| user_id | public | int |
| lokasi_id | public | int |
| harga_total | public | decimal |
| jumlah_poin_digunakan | public | int |
| tanggal | public | datetime |
| status | public | string |
| metode_pembayaran | public | string |

| Nama Operasi | Visibility (private, public) | Keterangan |
|--------------|------------------------------|------------|
| createTransaction | public | Membuat transaksi baru ketika nasabah menukar poin dengan produk. Mencatat detail transaksi seperti poin yang digunakan, produk yang ditukar, dll. |
| updateStatus | public | Memperbarui status transaksi (misalnya "Pending", "Selesai", "Dibatalkan") berdasarkan perkembangan proses transaksi. |
| calculateTotal | public | Menghitung total harga transaksi berdasarkan produk yang dipilih dan jumlah poin yang digunakan. Mengembalikan nilai decimal. |
| processPayment | public | Memproses pembayaran dengan mengurangi poin nasabah sesuai jumlah yang digunakan. Mengembalikan boolean yang menunjukkan keberhasilan proses. |
| getTransactionDetails | public | Mengambil dan menampilkan detail lengkap transaksi termasuk produk yang ditukar, poin yang digunakan, dll. Mengembalikan objek Transaksi. |

### 4.8 Class TransaksiItem

Nama Kelas: TransaksiItem

| Nama Atribut | Visibility (private, public) | Tipe |
|--------------|------------------------------|------|
| item_id | public | int |
| transaksi_id | public | int |
| produk_id | public | int |
| jumlah | public | int |
| harga_satuan | public | int |
| subtotal | public | int |
| created_at | public | timestamp |

| Nama Operasi | Visibility (private, public) | Keterangan |
|--------------|------------------------------|------------|
| addItem | public | Menambahkan item baru ke dalam transaksi dengan data produk, jumlah, dan harga satuan. |
| calculateSubtotal | public | Menghitung subtotal item dengan mengalikan jumlah dengan harga satuan. Mengembalikan nilai integer. |
| getItemDetails | public | Mengambil dan menampilkan detail lengkap item transaksi termasuk produk yang dibeli, jumlah, harga, dll. Mengembalikan objek TransaksiItem. |
| deleteItem | public | Menghapus item dari transaksi jika pengguna ingin membatalkan pembelian produk tertentu. |
| updateQuantity | public | Memperbarui jumlah item dalam transaksi dan menghitung ulang subtotal berdasarkan perubahan jumlah. |

### 4.9 Class Poin

Nama Kelas: Poin

| Nama Atribut | Visibility (private, public) | Tipe |
|--------------|------------------------------|------|
| poin_id | public | int |
| user_id | public | int |
| lokasi_id | public | int |
| jumlah_poin | public | int |

| Nama Operasi | Visibility (private, public) | Keterangan |
|--------------|------------------------------|------------|
| addPoints | public | Menambahkan poin ke akun nasabah setelah penyetoran sampah. Poin ditambahkan berdasarkan jenis dan jumlah sampah yang disetor. |
| usePoints | public | Mengurangi poin nasabah ketika digunakan untuk menukar dengan produk. Memastikan nasabah memiliki poin yang cukup sebelum transaksi. |
| getPointBalance | public | Mengambil dan menampilkan saldo poin saat ini untuk nasabah di lokasi bank sampah tertentu. Mengembalikan nilai integer. |
| transferPoints | public | Memindahkan poin dari satu lokasi ke lokasi lain jika fitur tersebut diizinkan oleh sistem. |
| getPointHistory | public | Mengambil dan menampilkan riwayat perubahan poin nasabah, termasuk penambahan dan penggunaan. Mengembalikan daftar objek Poin. |

### 4.10 Class Feedback

Nama Kelas: Feedback

| Nama Atribut | Visibility (private, public) | Tipe |
|--------------|------------------------------|------|
| feedback_id | public | int |
| komentar | public | text |
| user_id | public | int |
| artikel_id | public | int |

| Nama Operasi | Visibility (private, public) | Keterangan |
|--------------|------------------------------|------------|
| addFeedback | public | Menambahkan feedback atau komentar baru pada artikel tertentu. Menyimpan komentar beserta informasi pengguna yang memberikan feedback. |
| updateFeedback | public | Memperbarui isi feedback yang sudah diberikan oleh pengguna jika diperlukan atau diizinkan. |
| deleteFeedback | public | Menghapus feedback dari sistem jika tidak sesuai dengan ketentuan atau atas permintaan pengguna. |
| getFeedbackList | public | Mengambil dan menampilkan daftar semua feedback untuk artikel tertentu. Mengembalikan daftar objek Feedback. |
| getFeedbackDetails | public | Mengambil dan menampilkan detail lengkap feedback tertentu. Mengembalikan objek Feedback. |

### 4.11 Class ArtikelGambar

Nama Kelas: ArtikelGambar

| Nama Atribut | Visibility (private, public) | Tipe |
|--------------|------------------------------|------|
| gambar_id | public | int |
| artikel_id | public | int |
| file_path | public | string |
| judul | public | string |

| Nama Operasi | Visibility (private, public) | Keterangan |
|--------------|------------------------------|------------|
| uploadImage | public | Mengunggah gambar baru untuk artikel tertentu. Menyimpan file gambar ke server dan mencatat informasi gambar di database. |
| deleteImage | public | Menghapus gambar dari artikel dan sistem jika sudah tidak diperlukan. |
| updateImage | public | Memperbarui informasi gambar seperti judul atau file gambar itu sendiri. |
| getImageDetails | public | Mengambil dan menampilkan detail lengkap gambar tertentu. Mengembalikan objek ArtikelGambar. |
| getImageList | public | Mengambil dan menampilkan daftar semua gambar untuk artikel tertentu. Mengembalikan daftar objek ArtikelGambar. |

### 4.12 State Machine Diagram

#### 4.12.1 State Machine Diagram - Transaksi

State Machine Diagram untuk kelas Transaksi menggambarkan perubahan status yang terjadi selama proses transaksi:

1. **Initial State** - Transaksi dimulai
2. **Pending** - Transaksi telah dibuat tetapi belum diproses
3. **Processing** - Sistem sedang memproses transaksi (pengurangan poin, verifikasi stok)
4. **Completed** - Transaksi berhasil diselesaikan
5. **Cancelled** - Transaksi dibatalkan karena alasan tertentu
6. **Failed** - Transaksi gagal diproses (misalnya karena poin tidak cukup)

Transisi antar status:
- Pending → Processing: Ketika transaksi mulai diproses sistem
- Processing → Completed: Ketika proses berhasil diselesaikan
- Processing → Failed: Ketika terjadi kegagalan dalam proses
- Pending/Processing → Cancelled: Ketika pengguna atau sistem membatalkan transaksi

## 5 Deskripsi Data

### 5.1 Entity-Relationship Diagram

### 5.2 Daftar Tabel

### 5.3 Struktur Tabel <nama tabel>

### 5.4 Struktur Tabel <nama tabel> dan seterusnya

### 5.5 Skema Relasi Antar Tabel

## 6 Perancangan Antarmuka

### 6.1 Antarmuka <nama antarmuka>

### 6.2 Antarmuka <nama antarmuka> dan seterusnya

## 7 Matriks Keterunutan