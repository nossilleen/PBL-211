# SPESIFIKASI KEBUTUHAN DAN PERANCANGAN PERANGKAT LUNAK

## (EcoZense) Aplikasi Web Eco Enzim

### Disusun oleh:
- 4342401075 - Arshafin Alfisyahrin
- 4342401070 - Muhamad Ariffadhlullah
- 4342401068 - Steven Kumala
- 4342401079 - Muhammad Faldy Rizaldi
- 4342401066 - Thalita Aurelia Marsim
- 4342401082 - Agnes Natalia Silalahi

**Program Studi:** Teknologi Rekayasa Perangkat Lunak  
**Institusi:** Politeknik Negeri Batam  
**Alamat:** Jl. Ahmad Yani, Batam 29461  
**Tahun:** 2025

---

## Daftar Isi
1. [Pendahuluan](#1-pendahuluan)
   1.1 [Tujuan](#11-tujuan)  
   1.2 [Lingkup Masalah](#12-lingkup-masalah)  
   1.3 [Definisi, Akronim dan Singkatan](#13-definisi-akronim-dan-singkatan)  
   &nbsp;&nbsp;&nbsp;&nbsp;1.3.1 [Definisi](#131-definisi)  
   &nbsp;&nbsp;&nbsp;&nbsp;1.3.2 [Akronim](#132-akronim)  
   1.4 [Aturan Penamaan dan Penomoran](#14-aturan-penamaan-dan-penomoran)  
   1.5 [Referensi](#15-referensi)  
   1.6 [Ikhtisar Dokumen](#16-ikhtisar-dokumen)  

2. [Deskripsi Umum Perangkat Lunak](#2-deskripsi-umum-perangkat-lunak)
   2.1 [Deskripsi Umum Sistem](#21-deskripsi-umum-sistem)  
   2.2 [Proses Bisnis Sistem](#22-proses-bisnis-sistem)  
   2.3 [Karakteristik Pengguna](#23-karakteristik-pengguna)  
   2.4 [Batasan](#24-batasan)  
   2.5 [Rancangan Lingkungan Implementasi](#25-rancangan-lingkungan-implementasi)  
   &nbsp;&nbsp;&nbsp;&nbsp;2.5.1 [Sistem Operasi](#251-sistem-operasi)  
   &nbsp;&nbsp;&nbsp;&nbsp;2.5.2 [DBMS](#252-dbms)  
   &nbsp;&nbsp;&nbsp;&nbsp;2.5.3 [Alat Pengembangan](#253-alat-pengembangan)  
   &nbsp;&nbsp;&nbsp;&nbsp;2.5.4 [Sistem Penyimpanan](#254-sistem-penyimpanan)  
   &nbsp;&nbsp;&nbsp;&nbsp;2.5.5 [Bahasa dan Framework](#255-bahasa-dan-framework)  

3. [Deskripsi Rinci Kebutuhan](#3-deskripsi-rinci-kebutuhan)
   3.1 [Deskripsi Fungsional](#31-deskripsi-fungsional)  
   3.2 [Use Case Diagram](#32-use-case-diagram)  
   3.3 [Use Case Pemilih Mengganti Kata Sandi](#33-use-case-pemilih-mengganti-kata-sandi)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.3.1 [Skenario](#331-skenario)  
   3.4 [Use Case Penyetoran Sampah dan Pemberian Poin](#34-use-case-penyetoran-sampah-dan-pemberian-poin)  
   3.5 [Use Case Penukaran Poin dengan Produk atau Sembako](#35-use-case-penukaran-poin-dengan-produk-atau-sembako)  
   3.6 [Use Case Pengelolaan Artikel dan Video Edukasi serta Pemberikan Feedback](#36-use-case-pengelolaan-artikel-dan-video-edukasi-serta-pemberikan-feedback)  
   3.7 [Use Case Pembuatan dan Pengelolaan Event Eco Enzim](#37-use-case-pembuatan-dan-pengelolaan-event-eco-enzim)  
   3.8 [Use Case Memasukan Lokasi Bank Sampah](#38-use-case-memasukan-lokasi-bank-sampah)  
   3.9 [Deskripsi Kebutuhan Non Fungsional](#39-deskripsi-kebutuhan-non-fungsional)  
   3.10 [Deskripsi Kelas-Kelas](#310-deskripsi-kelas-kelas)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.10.1 [Class Diagram](#3101-class-diagram)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.10.2 [Class User](#3102-class-user)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.10.3 [Class Lokasi](#3103-class-lokasi)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.10.4 [Class Artikel](#3104-class-artikel)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.10.5 [Class Produk](#3105-class-produk)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.10.6 [Class ProdukGambar](#3106-class-produkgambar)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.10.7 [Class Transaksi](#3107-class-transaksi)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.10.8 [Class TransaksiItem](#3108-class-transaksiitem)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.10.9 [Class Poin](#3109-class-poin)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.10.10 [Class Feedback](#31010-class-feedback)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.10.11 [Class ArtikelGambar](#31011-class-artikelgambar)  
   3.11 [State Machine Diagram](#311-state-machine-diagram)  
   3.12 [Deskripsi Data](#312-deskripsi-data)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.12.1 [Entity-Relationship Diagram](#3121-entity-relationship-diagram)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.12.2 [Daftar Tabel](#3122-daftar-tabel)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.12.3 [Struktur Tabel](#3123-struktur-tabel)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.12.4 [Skema Relasi Antar Tabel](#3124-skema-relasi-antar-tabel)  

4. [Perancangan Antarmuka](#4-perancangan-antarmuka)
   4.1 [Antarmuka Landing Page](#41-antarmuka-landing-page)  
   4.2 [Antarmuka Dashboard Admin](#42-antarmuka-dashboard-admin)  
   4.3 [Antarmuka Dashboard Bank Sampah](#43-antarmuka-dashboard-bank-sampah)  
   4.4 [Antarmuka Dashboard Nasabah](#44-antarmuka-dashboard-nasabah)  

5. [Matriks Keterunutan](#5-matriks-keterunutan)
   5.1 [Kebutuhan Fungsional vs Use Case](#51-kebutuhan-fungsional-vs-use-case)  
   5.2 [Kebutuhan Non-Fungsional vs Use Case](#52-kebutuhan-non-fungsional-vs-use-case)  

---

## 1. Pendahuluan

### 1.1 Tujuan
Dokumen ini berisi Spesifikasi Kebutuhan Perangkat Lunak (SKPL) untuk Aplikasi Web Eco Enzim (EcoZense). Tujuan dari penulisan dokumen ini adalah untuk memberikan penjelasan menyeluruh mengenai perangkat lunak yang akan dikembangkan, baik dalam bentuk gambaran umum maupun penjelasan detail mengenai fitur dan kebutuhan sistem. 

**Pengguna dari dokumen ini meliputi:**
- Pengembang perangkat lunak yang akan membangun sistem
- Pengguna atau klien yang akan menggunakan aplikasi web
- Personel yang terlibat dalam proses pengembangan dan implementasi sistem

**Dokumen SKPPL ini akan digunakan sebagai:**
- Acuan utama dalam proses pengembangan perangkat lunak
- Bahan evaluasi selama dan setelah pengembangan berlangsung
- Panduan untuk menghindari potensi ambiguitas, terutama bagi tim pengembang sistem informasi

### 1.2 Lingkup Masalah
EcoZense merupakan sebuah sistem informasi berbasis web yang dikembangkan oleh tim PBL-211 sebagai pusat edukasi dan marketplace produk Eco Enzim. Latar belakang pengembangan aplikasi ini didasari oleh masih rendahnya kesadaran dan pemahaman masyarakat terhadap pentingnya pemanfaatan Eco Enzim dalam menjaga kelestarian lingkungan. 

**Permasalahan yang dihadapi:**
1. Penumpukan sampah organik
2. Kurangnya pengelolaan limbah rumah tangga
3. Akses terbatas terhadap informasi dan produk Eco Enzim
4. Belum terorganisasinya informasi secara efektif

**Solusi yang ditawarkan:**
1. Menyediakan konten informatif berupa artikel, tutorial, dan panduan praktis
2. Integrasi dengan program bank sampah
3. Marketplace untuk mempertemukan bank sampah dan masyarakat
4. Sistem dengan tiga kategori pengguna (admin, nasabah, bank sampah)

### 1.3 Definisi, Akronim dan Singkatan

#### 1.3.1 Definisi
- **Nasabah**: Pengguna yang dapat mengakses aplikasi web Eco Enzim untuk memperoleh informasi, edukasi, dan layanan terkait ecoenzim. Memiliki hak untuk menyetor sampah dan menerima poin.
- **Admin**: Pengguna dengan hak akses tertinggi yang bertanggung jawab atas pengelolaan sistem, pengaturan pengguna, serta pemantauan dan pemeliharaan aplikasi.
- **Pengelola bank sampah**: Pengguna yang memiliki kewenangan mengelola bank sampah, memasukkan lokasi, mempublikasikan produk, serta memberikan poin kepada nasabah.
- **Pengguna umum (guest)**: Pengguna yang hanya memiliki akses terhadap artikel atau event, tidak dapat membeli produk di marketplace.

#### 1.3.2 Akronim
| Singkatan | Kepanjangan |
|-----------|-------------|
| SKPPL | Spesifikasi Kebutuhan dan Perancangan Perangkat Lunak |
| SRDS | Software Requirements and Design Specification |
| UML | Unified Modelling Language |
| ERD | Entity Relationship Diagram |
| DBMS | DataBase Management System |

### 1.4 Aturan Penamaan dan Penomoran
Penulisan dokumen SKPL ini menggunakan berbagai aturan penamaan dan penomoran yang berbeda untuk bagian-bagian tertentu. Aturan penamaan dan penomoran yang digunakan disesuaikan dengan hal atau bagian tertentu sebagaimana tercantum dalam tabel berikut:

| Hal/Bagian | Aturan Penomoran/Penamaan |
|------------|--------------------------|
| Kebutuhan Functional | SKPL-FXX : Menunjukkan kebutuhan fungsional ke-XX |
| Kebutuhan Non Functional | SKPL-NFXX : Menunjukkan kebutuhan non fungsional ke-XX |
| Ringkasan kebutuhan fungsional | SKPL-Fxxx dimana xxx adalah tiga digit bilangan bulat dimulai dari 000 |
| Ringkasan kebutuhan nonfungsional | SKPL-NFxxx dimana xxx adalah tiga digit bilangan bulat dimulai dari 000 |
| Use Case | UC-XX menunjukkan use case ke-XX |

### 1.5 Referensi
Daftar dokumen yang digunakan sebagai acuan atau rujukan dalam penyusunan dokumen SKPPL ini adalah sebagai berikut:

1. IEEE Std 610.12-1990, IEEE Standard Glossary of Software Engineering Terminology
2. Panduan Penggunaan dan Pengisian Spesifikasi Perangkat Lunak (SKPL) untuk Sistem Informasi Kalibrasi Alat (ITS)
3. SKPPL untuk Sistem Informasi Student Advisory Center (ITS)

### 1.6 Ikhtisar Dokumen
1. **Bab 1 Pendahuluan**: Pengantar dokumen SKPL yang berisi tujuan penulisan dokumen, lingkup masalah, serta definisi dan istilah yang digunakan. Selain itu, memberikan deskripsi umum mengenai aplikasi web Eco Enzim (EcoZense) sebagai ikhtisar dokumen SKPL.
2. **Bab 2 Deskripsi Global Perangkat Lunak**: Mendefinisikan perspektif produk perangkat lunak, termasuk tujuan utama aplikasi web Eco Enzim. Asumsi dan ketergantungan yang digunakan dalam pengembangan sistem informasi EcoZense.
3. **Bab 3 Deskripsi Rinci Kebutuhan**: Mendeskripsikan kebutuhan khusus bagi Sistem Informasi EcoZense, yang meliputi kebutuhan antarmuka eksternal, kebutuhan fungsionalitas, kebutuhan performansi, batasan perancangan, atribut sistem perangkat lunak, dan kebutuhan lain dari Sistem Informasi EcoZense.

---

## 2. Deskripsi Umum Perangkat Lunak

### 2.1 Deskripsi Umum Sistem
EcoZense adalah sebuah sistem informasi berbasis web yang dirancang untuk memberikan informasi yang jelas dan mudah diakses mengenai ecoenzim, serta menyediakan layanan bagi pengguna yang ingin berpartisipasi dalam program bank sampah dan menjadi nasabah. Sistem ini dapat diakses oleh pengguna umum (guest), nasabah, pengelola bank sampah, dan admin yang mengelola seluruh aspek informasi dalam aplikasi.

**Fitur untuk Pengguna Umum:**
- Menonton video edukasi mengenai ecoenzim
- Membaca artikel terkait ecoenzin untuk memperdalam pemahaman mereka
- Mengikuti Event terkait ecoenzim dalam segala bentuk
- Mendaftar diri untuk menjadi nasabah

**Fitur untuk Nasabah:**
- Akses ke semua fitur pengguna umum
- Menyetor sampah ke bank sampah
- Memperoleh poin yang dapat ditukarkan untuk membeli produk ecoenzim

**Fitur untuk Pengelola Bank Sampah:**
- Menerima sampah yang disetor oleh nasabah
- Memberikan poin berdasarkan berat sampah yang disetorkan
- Mempublikasikan produk Eco Enzim yang tersedia
- Mengelola transaksi produk

**Fitur untuk Admin:**
- Mengelola seluruh informasi dan materi edukasi dalam sistem
- Mengatur artikel, video edukasi, dan promosi terkait ecoenzim
- Mengelola data pengguna, termasuk proses registrasi dan login
- Mengelola informasi terkait kegiatan dan event yang berhubungan dengan EcoZense

### 2.2 Proses Bisnis Sistem
Berikut merupakan alur utama dalam sistem EcoZense:

1. **Pendaftaran Nasabah**
   - Pengguna umum melakukan registrasi
   - Verifikasi data oleh admin
   - Aktivasi akun nasabah

2. **Penyetoran Sampah**
   - Nasabah menyetorkan sampah ke bank sampah
   - Pengelola mengevaluasi sampah
   - Pemberian poin sesuai jenis dan jumlah sampah

3. **Penukaran Poin**
   - Nasabah memilih produk
   - Konversi poin ke produk
   - Transaksi selesai

4. **Publikasi Produk**
   - Pengelola mempublikasikan produk
   - Admin memverifikasi produk
   - Produk tersedia di marketplace

5. **Edukasi dan Promosi**
   - Admin membuat konten edukasi
   - Publikasi event dan promosi
   - Monitoring feedback pengguna

6. **Manajemen Pengguna**
   - Admin mengelola akun
   - Verifikasi pengguna
   - Monitoring aktivitas

### 2.3 Karakteristik Pengguna

| Pengguna | Tanggung Jawab | Hak Akses pada Aplikasi | Kemampuan yang Harus Dimiliki |
|----------|---------------|-------------------------|-----------------------------|
| Nasabah | - Menyetor sampah<br>- Mengakses artikel dan dapat memberikan feedback<br>- Membeli produk eco-enzim | - Akses ke landing page<br>- Akses ke artikel<br>- Akses ke event<br>- Akses untuk memberikan feedback<br>- Akses untuk membeli produk eco enzim/sembako | - Dasar penggunaan web<br>- Pemahaman tentang bank sampah<br>- Pemahaman tentang eco enzim |
| Pengelola Bank Sampah | - Mengelola bank sampah<br>- Mengelola produk eco-enzim dan menjualnya pada website<br>- Memberikan poin kepada nasabah yang telah menyetor sampah | - Akses ke dashboard pengelola bank sampah<br>- Akses Menjual produk eco enzim<br>- Akses untuk memberi poin kepada nasabah<br>- Akses untuk menginput lokasi | - Operasi sistem bank sampah<br>- Manajemen data |
| Admin | - Mengelola artikel<br>- Mengelola data pengguna<br>- Mengelola promosi kegiatan dan event | - Akses untuk mengelola artikel<br>- Akses untuk create artikel<br>- Akses untuk mempromosi kegiatan dan event<br>- Akses mengelola data user<br>- Akses memverifikasi pengajuan pengguna umum menjadi nasabah dan nasabah menjadi bank sampah | - Pemahaman sistem informasi<br>- Manajemen konten<br>- Manajemen data |

### 2.4 Batasan
1. **Platform Akses**
   - Sistem hanya dapat diakses melalui platform web
   - Belum tersedia dalam bentuk aplikasi mobile

2. **Lokasi Penyetoran**
   - Penyetoran sampah hanya dapat dilakukan di lokasi bank sampah yang terdaftar
   - Lokasi harus diverifikasi oleh admin

3. **Ketersediaan Produk**
   - Produk Eco Enzim dan sembako bergantung pada stok bank sampah
   - Stok harus diperbarui secara berkala

4. **Sistem Pembayaran**
   - Hanya mendukung transaksi non-tunai
   - Menggunakan sistem poin untuk transaksi

5. **Konten Informasi**
   - Informasi terbatas pada konten yang telah diverifikasi
   - Admin bertanggung jawab atas validasi konten

### 2.5 Rancangan Lingkungan Implementasi

#### 2.5.1 Sistem Operasi
- **Server:** Windows Server
- **Fitur:**
  - Mendukung kestabilan layanan web
  - Kompatibel dengan perangkat lunak pengembangan
  - Keamanan tingkat tinggi

#### 2.5.2 DBMS
- **Database:** MySQL
- **Karakteristik:**
  - Open-source dan handal
  - Menyimpan data pengguna, transaksi, produk, dan log
  - Mendukung transaksi dan backup otomatis

#### 2.5.3 Alat Pengembangan
- **IDE:** Visual Studio Code
- **Version Control:** Git
- **Repository:** GitHub
- **Kolaborasi:** Discord

#### 2.5.4 Sistem Penyimpanan
- **Platform:** Google Cloud Storage
- **Fitur:**
  - Keandalan tinggi
  - Keamanan terjamin
  - Skalabilitas fleksibel

#### 2.5.5 Bahasa dan Framework
- **Backend:**
  - PHP dengan Laravel
  - RESTful API
  - JWT Authentication

- **Frontend:**
  - Vue.js
  - Tailwind CSS

---

## 3. Deskripsi Rinci Kebutuhan

### 3.1 Deskripsi Fungsional
- SKPL-F01 Dapat menampilkan peta lokasi bank sampah di batam.
- SKPL-F02 Pengguna Umum dapat melihat dan menelusuri artikel.
- SKPL-F03 Pengguna Umum dapat mendaftar pada event.
- SKPL-F04 Pengguna Umum dapat membuat akun sebagai nasabah.
- SKPL-F05 Nasabah dapat meng-edit profil.
- SKPL-F07 Nasabah dapat menerima poin.
- SKPL-F08 Nasabah dapat melihat berapa banyak poin yang dimilikinya.
- SKPL-F09 Nasabah dapat membeli produk ecoenzim/sembako menggunakan poin ataupun transfer.
- SKPL-F010 Nasabah dapat memasukkan produk ecoenzim kedalam keranjang.
- SKPL-F011 Nasabah dapat memasukkan kuantitas produk yang ingin dibeli.
- SKPL-F012 Nasabah dapat memberikan rating, share dan favorite produk.
- SKPL-F013 Nasabah dapat menerima notifikasi pada website.
- SKPL-F014 Nasabah dapat menerima bukti pembayaran setelah membeli produk.
- SKPL-F015 Nasabah dapat melihat riwayat pembelian.
- SKPL-F016 Nasabah dapat memberikan nilai pada artikel.
- SKPL-F017 Nasabah dapat memberikan feedback pada artikel.
- SKPL-F018 Nasabah dapat mengajukan diri untuk menjadi Bank Sampah.
- SKPL-F019 Bank Sampah dapat memasukkan alamat serta menginput lokasi pada peta.
- SKPL-F020 Bank Sampah dapat menambahkan produk ecoenzim pada tokonya masing-masing.
- SKPL-F021 Bank Sampah dapat mengatur kuantitas produk ecoenzim.
- SKPL-F022 Bank Sampah dapat meng-update produk ecoenzim.
- SKPL-F023 Bank Sampah dapat memasukkan berat sampah yang diberikan oleh nasabah kemudian menghitungnya menjadi poin.
- SKPL-F024 Bank Sampah dapat memberikan poin kepada nasabah.
- SKPL-F025 Bank Sampah dapat melihat riwayat transaksi yang dilakukan oleh nasabah.
- SKPL-F026 Admin dapat melihat lokasi-lokasi bank sampah pada peta di dalam dashboard.
- SKPL-F027 Admin dapat mengelola artikel dan post.
- SKPL-F028 Admin dapat melihat list tabel dari seluruh artikel yang telah dibuat kemudian admin dapat mereview artikel (edit/delete).
- SKPL-F029 Admin dapat mengelola event.
- SKPL-F030 Admin dapat melihat list tabel dari seluruh event yang telah dibuat kemudian admin dapat mereview event (edit/delete).
- SKPL-F031 Admin dapat mem-verifikasi pengajuan nasabah yang ingin menjadi bank sampah.
- SKPL-F032 Admin dapat mengelola data pengguna.

### 3.2 Use Case Diagram
 
Gambar 2. Use Case Diagram Aplikasi Web Eco Enzim 

### 3.3 Use Case Pemilih Mengganti Kata Sandi

#### Skenario
- Identifikasi
- Nomor
- UC-01
- Nama
- Pengguna dapat membuat akun sebagai nasabah, dan admin dapat mengelola akun pengguna
- Deskripsi
- Pengguna membuka halaman pendaftaran.
- Sistem menampilkan formulir pendaftaran.
- Pengguna mengisi data diri (nama, email, password, dll.).
- Pengguna menekan tombol "Daftar".
- Sistem memvalidasi data dan menyimpan akun jika inputan valid.
- Sistem menampilkan pesan sukses bahwa akun berhasil dibuat.

Pengelolaan akun oleh admin 
- Admin login ke sistem.
- Sistem menampilkan daftar akun pengguna yang terdaftar.
- Admin dapat mencari akun tertentu berdasarkan nama atau email.
- Admin memilih akun yang ingin dikelola.
- Admin dapat mengedit data akun atau menonaktifkan akun pengguna jika diperlukan.
- Sistem menyimpan perubahan dan menampilkan pesan sukses.

Skenario Alternatif 
- 1a. Pengguna memasukkan data yang tidak valid (seperti email tidak sesuai format biasanya atau password yang terlalu pendek, seperti 3 digit)
- 1b. Pengguna mencoba mendaftar dengan email yang sudah digunakan, sistem menampilkan pesan bahwa email sudah terdaftar.
- 4a. Admin mencoba menonaktifkan akun pengguna, tetapi sistem meminta konfirmasi sebelum melakukan tindakan ini.
- 4b. Admin tidak memiliki izin untuk mengedit akun tertentu, sistem menampilkan pesan akses ditolak.

### 3.4 Use Case Penyetoran Sampah dan Pemberian Poin

#### Skenario
- Identifikasi
- Nomor
- UC-02
- Nama
- Penyetoran sampah dan Pemberian poin
- Deskripsi
- Nasabah menyetor sampah dan mendapatkan poin, pengelola bank sampah dapat menilai dan memberikan poin atas penyetoran sampah
- Aktor
- Nasabah dan Pengelola bank sampah
- Kondisi awal
- Nasabah melakukan penyetoran sampah
- Kondisi akhir
- Sampah telah disetor dan poin dapat diberikan kepada nasabah dari pengelola bank sampah
- Skenario Utama
- Nasabah menyetor sampah secara langsung kepada pengelola bank sampah.
- Pengelola bank sampah menerima sampah, kemudian menimbang sampah.
- Timbangan sampah dikonversikan menjadi poin pada aplikasi.
- Poin diberikan kepada Nasabah oleh Pengelola bank sampah.
- Nasabah berhasil menerima poin.

Skenario Alternatif 
- 3a. Aplikasi tidak dapat mengonversi poin.

### 3.5 Use Case Penukaran Poin dengan Produk atau Sembako

#### Skenario
- Identifikasi
- Nomor
- PBL/USECASE/03
- Nama
- Penukaran Poin dengan Produk atau Sembako
- Deskripsi
- Nasabah dapat menukar poin yang telah dikumpulkan dengan produk Eco Enzim atau sembako melalui aplikasi.
- Aktor
- Nasabah
- Kondisi awal
- Nasabah memiliki akun dan masuk ke dalam sistem dan Nasabah memiliki saldo poin yang cukup untuk ditukarkan.
- Kondisi akhir
- Produk Eco Enzim atau sembako berhasil ditukar dan poin nasabah berkurang sesuai jumlah yang digunakan.
- Skenario Utama
- Nasabah masuk ke dalam aplikasi web Eco Enzim.
- Nasabah memilih menu "Tukar Poin".
- Sistem menampilkan daftar produk Eco Enzim dan sembako beserta jumlah poin yang diperlukan.
- Nasabah memilih produk yang ingin ditukar.
- Sistem menampilkan detail penukaran, termasuk jumlah poin yang akan digunakan.
- Nasabah mengonfirmasi penukaran.
- Sistem memverifikasi ketersediaan stok dan saldo poin nasabah.
- Jika poin cukup dan stok tersedia, sistem mengurangi saldo poin nasabah dan memproses penukaran.
- Sistem menampilkan notifikasi bahwa penukaran berhasil dan memberikan informasi pengambilan/pengiriman produk.

Skenario Alternatif 
- 1a. Jika saldo poin nasabah tidak mencukupi → Sistem menampilkan pesan bahwa poin tidak cukup untuk melakukan penukaran.
- 3a. Jika stok produk habis → Sistem menampilkan notifikasi bahwa produk tidak tersedia dan meminta nasabah memilih produk lain.
- 7a. Jika terjadi kesalahan saat proses penukaran → Sistem membatalkan transaksi dan mengembalikan poin jika sudah terpotong.

### 3.6 Use Case Pengelolaan Artikel dan Video Edukasi serta Pemberikan Feedback

#### Skenario
- Identifikasi
- Nomor
- PBL/USECASE/04
- Nama
- Pengelolaan Artikel dan Video Edukasi serta Pemberikan
- Deskripsi
- Admin mengelola (menambah dan mengedit) artikel dan video edukasi.
- Pengguna umum dapat membaca artikel dan memberikan komentar atau feedback.
- Aktor
- Admin dan pengguna umum
- Kondisi awal
- Admin telah login ke dalam sistem.
- Pengguna umum mengakses halaman artikel tanpa perlu login.
- Kondisi akhir
- Artikel atau video edukasi berhasil ditambahkan atau diedit oleh Admin.
- Komentar atau feedback berhasil disimpan dan ditampilkan pada artikel oleh Pengguna Umum.
- Skenario Utama
- Admin:
- Admin login dan diarahkan ke halaman manajemen artikel dan video edukasi
- Sistem menampilkan daftar artikel dan video edukasi.
- Admin memilih "Tambah Artikel/Video".
- Sistem menampilkan form tambah artikel/video.
- Admin mengisi judul, deskripsi, dan konten (atau mengunggah video), lalu menekan "Simpan".
- Sistem menyimpan data dan menampilkan pesan sukses.
- Admin dapat mengedit atau menghapus artikel/video jika diperlukan

Pengguna umum: 
- Pengguna membuka halaman Artikel dan Video Edukasi.
- Sistem menampilkan daftar artikel dan video.
- Pengguna memilih artikel untuk dibaca.
- Sistem menampilkan isi artikel.
- Pengguna memberikan komentar atau feedback dan menekan "Kirim".
- Sistem menyimpan komentar dan menampilkan pesan sukses.

Skenario Alternatif 
- 1a. Jika saldo poin nasabah tidak mencukupi → Sistem menampilkan pesan bahwa poin tidak cukup untuk melakukan penukaran.
- 3a. Jika stok produk habis → Sistem menampilkan notifikasi bahwa produk tidak tersedia dan meminta nasabah memilih produk lain.
- 7a. Jika terjadi kesalahan saat proses penukaran → Sistem membatalkan transaksi dan mengembalikan poin jika sudah terpotong.

### 3.7 Use Case Pembuatan dan pengelolaan event eco enzim

#### Skenario
- Identifikasi
- Nomor
- PBL/USECASE/05
- Nama
- Pengelola bank sampah dapat mengunggah dan memperbaharui daftar produk Eco Enzim yang tersedia.
- Deskripsi
- Bank sampah dapat mengedit/memparbaharui jumlah produk Eco Enzyme yg masi tersedia.
- Aktor
- Bank sampah
- Kondisi awal
- Bank sampah login ke dalam sistem dan melihat jumlah stok
- Kondisi akhir
- Bank sampah mengedit jumlah produk Eco Enzyme sesuai jumlah yang tersedia.
- Skenario Utama
- Setelah login,bank sampah masuk ke halaman barang Eco Enzyme.
- Bank sampah melihat jumlah stok Eco Enzyme yang tersedia.
- Bank sampah mencari produk Eco Enzyme di halaman web.
- Bank sampah merubah jumlah produk Eco Enzyme sesuai jumlah yang tersedia.
- Bank sampah menekan tombol "Simpan" untuk merubah jumlahnya.
- Sistem merubah jumlah sesuai yang di ubah bank sampah.
- Bank sampah dapat mengurangi dan menambah jumlah produk Eco Enzyme.

Skenario Alternatif 
- 1a. Bank sampah salah memasukan username atau password,sistem menampilkan password salah.
- 4a. Jika Bank sampah meletakkan huruf atau simbol di kolom jumlah stok,system akan gagal menyimpan data yang di perbarui.
- 4b. Bank sampah tidak melengkapi data,sistem akan menampilkan harap lengkapi data.
- 6a. Jika terjadi kegagalan sistem saat menyimpan data,sistem akan menampilkan gagal menyimpan dan harap coba lagi.

### 3.8 Use Case Pembuatan dan Pengelolaan Event Eco Enzim

#### Skenario
- Identifikasi
- Nomor
- PBL/USECASE/06
- Nama
- Pembuatan dan pengelolaan event eco enzim
- Deskripsi
- Admin dapat membuat dan mengelola event eco enzim
- Aktor
- Admin
- Kondisi awal
- Admin telah login ke sistem
- Kondisi akhir
- Admin berhasil membuat atau mengelola event eco enzim.
- Skenario Utama
- Setelah login, admin diarahkan ke halaman manajemen event.
- Sistem menampilkan daftar event yang sudah ada.
- Admin memilih opsi untuk membuat event baru.
- Admin mengisi detail event (nama, deskripsi, tanggal, lokasi, dll.).
- Admin menekan tombol "Simpan" untuk menyimpan event.
- Sistem menampilkan pesan sukses bahwa event telah tersimpan.
- Admin dapat mengedit atau menghapus event yang sudah dibuat jika diperlukan.

Skenario Alternatif 
- 1a. Admin memasukkan username dan password yang salah dan tidak dapat mengakses halaman manajemen event
- 3a. Admin memilih untuk mengedit event yang sudah ada dan memperbarui informasinya sebelum menyimpan.
- 3b. Admin memilih untuk menghapus event yang sudah ada, dan sistem meminta konfirmasi sebelum menghapusnya.
- 5a. Admin tidak mengisi data event secara lengkap, sistem menampilkan pesan kesalahan dan meminta admin melengkapi data sebelum menyimpan.

### 3.9 Use Case Memasukan Lokasi Bank Sampah

#### Skenario
- Identifikasi
- Nomor
- PBL/USECASE/07
- Nama
- Memasukkan Lokasi Bank Sampah
- Deskripsi
- Pendaftar pengelola bank sampah dapat memassukan lokasi yang dikelolanya.
- Aktor
- Pengelola bank sampah
- Kondisi awal
- User ingin mendaftar menjadi Pengelola bank sampah.
- Kondisi akhir
- User berhasil memasukkan lokasi dan terdaftar sebagai pengelola bank sampah.
- Skenario Utama
- User mengakses halaman pendaftaran pengelola bank sampah.
- User mengisi formulir pendaftaran dengan informasi yang diperlukan, termasuk nama, alamat, dan lokasi bank sampah.
- User mengklik tombol "Kirim" untuk mengirimkan data.
- Sistem memvalidasi data yang dimasukkan.
- Jika data valid, sistem menyimpan informasi lokasi bank sampah dan mengonfirmasi pendaftaran kepada user.

Skenario Alternatif 
- 3a. Jika data yang dimasukkan tidak valid, sistem menampilkan pesan kesalahan dan meminta user untuk memperbaiki informasi yang salah.
- 3b. Jika user tidak mengisi semua kolom yang wajib, sistem menampilkan pesan peringatan dan meminta user untuk melengkapi informasi yang diperlukan.
- 5a. Jika lokasi yang dimasukkan sudah terdaftar sebelumnya, sistem memberikan notifikasi bahwa lokasi tersebut sudah ada dan meminta user untuk memasukkan lokasi yang berbeda.

### 3.10 Deskripsi Kebutuhan Non Fungsional

| SKPL-Id | Parameter | Kebutuhan |
|---------|-----------|-----------|
| SKPL-NF01 | Security | - Sistem harus memiliki fitur otentikasi dan otorisasi pengguna<br>- Data pengguna harus dienkripsi |
| SKPL-NF02 | Performance | - Waktu respon sistem harus kurang dari 3 detik pada setiap permintaan pengguna<br>- Sistem harus mampu menangani minimal 1000 pengguna secara bersamaan |
| SKPL-NF03 | Availability | Sistem harus memiliki uptime minimal 90% dalam setahun |
| SKPL-NF04 | Portability | Sistem harus dapat berjalan di browser desktop |
| SKPL-NF05 | User friendly | Antarmuka pengguna harus intuitif dan mudah digunakan oleh masyarakat umum |

### 3.11 Deskripsi Kelas-Kelas

#### Class Diagram
[Diagram akan ditambahkan di sini]

#### Class User
| Nama Atribut | Visibility | Tipe | Keterangan |
|-------------|------------|------|------------|
| User_id | Public | Int | ID unik pengguna |
| Nama | Public | String | Nama lengkap pengguna |
| Email | Public | String | Alamat email pengguna |
| Password | Public | String | Kata sandi terenkripsi |
| No_hp | Public | String | Nomor telepon pengguna |
| Role | Public | String | Peran pengguna (admin/nasabah/bank sampah) |
| Lokasi_id | Public | Int | ID lokasi terkait |

| Nama Operasi | Visibility | Keterangan |
|-------------|------------|------------|
| register | Public | Mendaftarkan user baru ke dalam sistem |
| login | Public | Mengautentikasi user berdasarkan email dan password |
| updateProfile | Public | Memperbarui informasi profile user |
| changePassword | Public | Mengubah password user |
| getRole | Public | Mengembalikan role/peran user |

#### Class Lokasi
| Nama Atribut | Visibility | Tipe | Keterangan |
|-------------|------------|------|------------|
| lokasi_id | Public | int | ID unik lokasi |
| nama_lokasi | Public | string | Nama lokasi bank sampah |
| alamat | Public | string | Alamat lengkap |
| kota | Public | string | Kota lokasi |
| kode_pos | Public | Int | Kode pos lokasi |

| Nama Operasi | Visibility | Keterangan |
|-------------|------------|------------|
| addLocation | Public | Menambahkan lokasi bank sampah baru |
| updateLocation | Public | Memperbarui informasi lokasi |
| deleteLocation | Public | Menghapus informasi lokasi |
| getLocationDetails | Public | Mengambil detail lokasi |

#### Class Artikel
| Nama Atribut | Visibility | Tipe | Keterangan |
|-------------|------------|------|------------|
| artikel_id | Public | int | ID unik artikel |
| judul | Public | string | Judul artikel |
| konten | Public | text | Isi artikel |
| tanggal_publikasi | Public | datetime | Waktu publikasi |
| user_id | Public | int | ID penulis artikel |

| Nama Operasi | Visibility | Keterangan |
|-------------|------------|------------|
| createArticle | Public | Membuat artikel baru |
| updateArticle | Public | Memperbarui artikel |
| deleteArticle | Public | Menghapus artikel |
| publishArticle | Public | Mempublikasikan artikel |
| getArticleDetails | Public | Mengambil detail artikel |

#### Class Produk
| Nama Atribut | Visibility | Tipe | Keterangan |
|-------------|------------|------|------------|
| produk_id | Public | int | ID unik produk |
| nama | Public | string | Nama produk |
| kategori | Public | string | Kategori produk |
| status_ketersediaan | Public | string | Status stok |
| harga | Public | decimal | Harga produk |
| user_id | Public | int | ID penjual |

| Nama Operasi | Visibility | Keterangan |
|-------------|------------|------------|
| addProduct | Public | Menambahkan produk baru |
| updateProduct | Public | Memperbarui produk |
| deleteProduct | Public | Menghapus produk |
| updateStock | Public | Memperbarui stok |
| getProductDetails | Public | Mengambil detail produk |

#### Class ProdukGambar
| Nama Atribut | Visibility | Tipe | Keterangan |
|-------------|------------|------|------------|
| gambar_id | Public | int | ID unik gambar |
| produk_id | Public | int | ID produk terkait |
| file_path | Public | varchar | Path file gambar |
| created_at | Public | timestamp | Waktu upload |
| updated_at | Public | timestamp | Waktu update |

| Nama Operasi | Visibility | Keterangan |
|-------------|------------|------------|
| uploadImage | Public | Mengunggah gambar produk |
| deleteImage | Public | Menghapus gambar |
| updateImage | Public | Memperbarui gambar |
| getImageDetails | Public | Mengambil detail gambar |
| getImageList | Public | Mengambil daftar gambar |

#### Class Transaksi
| Nama Atribut | Visibility | Tipe | Keterangan |
|-------------|------------|------|------------|
| transaksi_id | Public | int | ID unik transaksi |
| user_id | Public | int | ID pembeli |
| lokasi_id | Public | int | ID lokasi |
| harga_total | Public | decimal | Total harga |
| jumlah_poin_digunakan | Public | int | Jumlah poin digunakan |
| tanggal | Public | datetime | Waktu transaksi |
| status | Public | string | Status transaksi |
| metode_pembayaran | Public | string | Metode pembayaran |

| Nama Operasi | Visibility | Keterangan |
|-------------|------------|------------|
| createTransaction | Public | Membuat transaksi baru |
| updateStatus | Public | Memperbarui status |
| calculateTotal | Public | Menghitung total |
| processPayment | Public | Memproses pembayaran |
| getTransactionDetails | Public | Mengambil detail transaksi |

#### Class TransaksiItem
| Nama Atribut | Visibility | Tipe | Keterangan |
|-------------|------------|------|------------|
| item_id | Public | int | ID unik item |
| transaksi_id | Public | int | ID transaksi |
| produk_id | Public | int | ID produk |
| jumlah | Public | int | Jumlah produk |
| harga_satuan | Public | int | Harga per item |
| subtotal | Public | int | Total harga item |
| created_at | Public | timestamp | Waktu pembuatan |

| Nama Operasi | Visibility | Keterangan |
|-------------|------------|------------|
| addItem | Public | Menambahkan item |
| calculateSubtotal | Public | Menghitung subtotal |
| getItemDetails | Public | Mengambil detail item |
| deleteItem | Public | Menghapus item |

#### Class Poin
| Nama Atribut | Visibility | Tipe | Keterangan |
|-------------|------------|------|------------|
| poin_id | Public | int | ID unik poin |
| user_id | Public | int | ID pengguna |
| lokasi_id | Public | int | ID lokasi |
| jumlah_poin | Public | int | Jumlah poin |

| Nama Operasi | Visibility | Keterangan |
|-------------|------------|------------|
| addPoints | Public | Menambahkan poin |
| usePoints | Public | Menggunakan poin |
| getPointBalance | Public | Mengambil saldo poin |
| transferPoints | Public | Memindahkan poin |
| getPointHistory | Public | Mengambil riwayat poin |

#### Class Feedback
| Nama Atribut | Visibility | Tipe | Keterangan |
|-------------|------------|------|------------|
| feedback_id | Public | int | ID unik feedback |
| komentar | Public | text | Isi komentar |
| user_id | Public | int | ID pengguna |
| artikel_id | Public | int | ID artikel |

| Nama Operasi | Visibility | Keterangan |
|-------------|------------|------------|
| addFeedback | Public | Menambahkan feedback |
| updateFeedback | Public | Memperbarui feedback |
| deleteFeedback | Public | Menghapus feedback |
| getFeedbackList | Public | Mengambil daftar feedback |
| getFeedbackDetails | Public | Mengambil detail feedback |

#### Class ArtikelGambar
| Nama Atribut | Visibility | Tipe | Keterangan |
|-------------|------------|------|------------|
| gambar_id | Public | int | ID unik gambar |
| artikel_id | Public | int | ID artikel |
| file_path | Public | string | Path file gambar |
| judul | Public | string | Judul gambar |

| Nama Operasi | Visibility | Keterangan |
|-------------|------------|------------|
| uploadImage | Public | Mengunggah gambar |
| deleteImage | Public | Menghapus gambar |
| updateImage | Public | Memperbarui gambar |
| getImageDetails | Public | Mengambil detail gambar |
| getImageList | Public | Mengambil daftar gambar |

### 3.12 State Machine Diagram
[Diagram akan ditambahkan di sini]

### 3.13 Deskripsi Data

#### Entity-Relationship Diagram
[Diagram akan ditambahkan di sini]

#### Daftar Tabel
1. users
2. locations
3. articles
4. products
5. product_images
6. transactions
7. transaction_items
8. points
9. feedbacks
10. article_images

#### Struktur Tabel
[Struktur tabel akan ditambahkan di sini]

#### Skema Relasi Antar Tabel
[Skema relasi akan ditambahkan di sini]

---

## 4. Perancangan Antarmuka

### Antarmuka <nama antarmuka> dan seterusnya 

 

## 5. Matriks Keterunutan

### 5.1 Kebutuhan Fungsional vs Use Case
| Kebutuhan | Deskripsi | UC-01 | UC-02 | UC-03 | UC-04 | UC-05 | UC-06 | UC-07 | Prioritas |
|-----------|-----------|-------|-------|-------|-------|-------|-------|-------|-----------|
| SKPL-F01 | Menampilkan peta lokasi bank sampah | - | - | - | - | - | - | X | Tinggi |
| SKPL-F02 | Melihat dan menelusuri artikel | - | - | - | X | - | - | - | Tinggi |
| SKPL-F03 | Mendaftar pada event | - | - | - | - | - | X | - | Sedang |
| SKPL-F04 | Membuat akun sebagai nasabah | X | - | - | - | - | - | - | Tinggi |
| SKPL-F05 | Mengedit profil | X | - | - | - | - | - | - | Sedang |
| SKPL-F07 | Menerima poin | - | X | - | - | - | - | - | Tinggi |
| SKPL-F08 | Melihat jumlah poin | - | X | - | - | - | - | - | Tinggi |
| SKPL-F09 | Membeli produk dengan poin/transfer | - | - | X | - | - | - | - | Tinggi |
| SKPL-F010 | Memasukkan produk ke keranjang | - | - | X | - | - | - | - | Tinggi |
| SKPL-F011 | Memasukkan kuantitas produk | - | - | X | - | - | - | - | Tinggi |
| SKPL-F012 | Memberikan rating produk | - | - | X | - | - | - | - | Rendah |
| SKPL-F013 | Menerima notifikasi | - | - | X | - | - | - | - | Sedang |
| SKPL-F014 | Menerima bukti pembayaran | - | - | X | - | - | - | - | Tinggi |
| SKPL-F015 | Melihat riwayat pembelian | - | - | X | - | - | - | - | Sedang |
| SKPL-F016 | Memberikan nilai artikel | - | - | - | X | - | - | - | Rendah |
| SKPL-F017 | Memberikan feedback artikel | - | - | - | X | - | - | - | Sedang |
| SKPL-F018 | Mengajukan menjadi Bank Sampah | - | - | - | - | - | - | X | Tinggi |
| SKPL-F019 | Memasukkan lokasi bank sampah | - | - | - | - | - | - | X | Tinggi |
| SKPL-F020 | Menambahkan produk ecoenzim | - | - | - | - | X | - | - | Tinggi |
| SKPL-F021 | Mengatur kuantitas produk | - | - | - | - | X | - | - | Tinggi |
| SKPL-F022 | Mengupdate produk | - | - | - | - | X | - | - | Tinggi |
| SKPL-F023 | Memasukkan berat sampah | - | X | - | - | - | - | - | Tinggi |
| SKPL-F024 | Memberikan poin | - | X | - | - | - | - | - | Tinggi |
| SKPL-F025 | Melihat riwayat transaksi | - | X | - | - | - | - | - | Sedang |
| SKPL-F026 | Melihat lokasi bank sampah | - | - | - | - | - | - | X | Tinggi |
| SKPL-F027 | Mengelola artikel | - | - | - | X | - | - | - | Tinggi |
| SKPL-F028 | Mereview artikel | - | - | - | X | - | - | - | Tinggi |
| SKPL-F029 | Mengelola event | - | - | - | - | - | X | - | Tinggi |
| SKPL-F030 | Mereview event | - | - | - | - | - | X | - | Tinggi |
| SKPL-F031 | Memverifikasi pengajuan | - | - | - | - | - | - | X | Tinggi |
| SKPL-F032 | Mengelola data pengguna | X | - | - | - | - | - | - | Tinggi |

### 5.2 Kebutuhan Non-Fungsional vs Use Case
| Kebutuhan | Deskripsi | UC-01 | UC-02 | UC-03 | UC-04 | UC-05 | UC-06 | UC-07 | Prioritas |
|-----------|-----------|-------|-------|-------|-------|-------|-------|-------|-----------|
| SKPL-NF01 | Keamanan | X | X | X | X | X | X | X | Tinggi |
| SKPL-NF02 | Performa | X | X | X | X | X | X | X | Tinggi |
| SKPL-NF03 | Ketersediaan | X | X | X | X | X | X | X | Tinggi |
| SKPL-NF04 | Portabilitas | X | X | X | X | X | X | X | Sedang |
| SKPL-NF05 | Kemudahan Penggunaan | X | X | X | X | X | X | X | Tinggi |

**Keterangan:**
- X: Kebutuhan terhubung dengan use case
- -: Kebutuhan tidak terhubung dengan use case
- Prioritas: Tinggi (High), Sedang (Medium), Rendah (Low)