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
   3.3 [Use Case Mengakses Website](#33-use-case-mengakses-website)  
   3.4 [Use Case Mengelola Data Pengguna](#34-use-case-mengelola-data-pengguna)  
   3.5 [Use Case Memasukkan Alamat dan Lokasi](#35-use-case-memasukkan-alamat-dan-lokasi)  
   3.6 [Use Case Meng-edit Profil](#36-use-case-meng-edit-profil)  
   3.7 [Use Case Menginput Berat Sampah dan Mengubahnya Menjadi Poin](#37-use-case-menginput-berat-sampah-dan-mengubahnya-menjadi-poin)  
   3.8 [Use Case Memberikan Poin](#38-use-case-memberikan-poin)  
   3.9 [Use Case Menerima Poin](#39-use-case-menerima-poin)  
   3.10 [Use Case Menukarkan Poin](#310-use-case-menukarkan-poin)  
   3.11 [Use Case Menambah Produk Ecoenzim](#311-use-case-menambah-produk-ecoenzim)  
   3.12 [Use Case Mengatur Kuantitas Produk Ecoenzim](#312-use-case-mengatur-kuantitas-produk-ecoenzim)  
   3.13 [Use Case Memperbarui Produk Ecoenzim](#313-use-case-memperbarui-produk-ecoenzim)  
   3.14 [Use Case Menambah Produk ke Keranjang](#314-use-case-menambah-produk-ke-keranjang)  
   3.15 [Use Case Pemilih Mengganti Kata Sandi](#315-use-case-pemilih-mengganti-kata-sandi)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.15.1 [Skenario](#3151-skenario)  
   3.16 [Use Case Penyetoran Sampah dan Pemberian Poin](#316-use-case-penyetoran-sampah-dan-pemberian-poin)  
   3.17 [Use Case Penukaran Poin dengan Produk atau Sembako](#317-use-case-penukaran-poin-dengan-produk-atau-sembako)  
   3.18 [Use Case Pengelolaan Artikel dan Video Edukasi serta Pemberikan Feedback](#318-use-case-pengelolaan-artikel-dan-video-edukasi-serta-pemberikan-feedback)  
   3.19 [Use Case Pembuatan dan Pengelolaan Event Eco Enzim](#319-use-case-pembuatan-dan-pengelolaan-event-eco-enzim)  
   3.20 [Use Case Memasukan Lokasi Bank Sampah](#320-use-case-memasukan-lokasi-bank-sampah)  
   3.21 [Use Case Meng-edit Profil](#321-use-case-meng-edit-profil)  
   3.22 [Deskripsi Kebutuhan Non Fungsional](#322-deskripsi-kebutuhan-non-fungsional)  
   3.23 [Deskripsi Kelas-Kelas](#323-deskripsi-kelas-kelas)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.23.1 [Class Diagram](#3231-class-diagram)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.23.2 [Class User](#3232-class-user)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.23.3 [Class Lokasi](#3233-class-lokasi)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.23.4 [Class Artikel](#3234-class-artikel)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.23.5 [Class Produk](#3235-class-produk)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.23.6 [Class ProdukGambar](#3236-class-produkgambar)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.23.7 [Class Transaksi](#3237-class-transaksi)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.23.8 [Class TransaksiItem](#3238-class-transaksiitem)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.23.9 [Class Poin](#3239-class-poin)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.23.10 [Class Feedback](#32310-class-feedback)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.23.11 [Class ArtikelGambar](#32311-class-artikelgambar)  
   3.24 [State Machine Diagram](#324-state-machine-diagram)  
   3.25 [Deskripsi Data](#325-deskripsi-data)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.25.1 [Entity-Relationship Diagram](#3251-entity-relationship-diagram)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.25.2 [Daftar Tabel](#3252-daftar-tabel)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.25.3 [Struktur Tabel](#3253-struktur-tabel)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.25.4 [Skema Relasi Antar Tabel](#3254-skema-relasi-antar-tabel)  

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


### 3.20 Use Case Memasukan Lokasi Bank Sampah

| Identifikasi ||
|---|---|
| Nomor | UC-01 |
| Nama | Memasukkan alamat dan lokasi |
| Deskripsi | Pengelola bank sampah dapat memasukkan alamat dan lokasi bank sampah untuk memastikan informasi yang disampaikan tepat dan akurat. |
| Aktor | Pengelola Bank Sampah |
| Kondisi awal | Pengelola bank sampah telah login ke dalam sistem dan membuka halaman edit lokasi bank sampah. |
| Kondisi akhir | Alamat dan lokasi bank sampah berhasil disimpan di dalam sistem. |

#### Skenario Utama
1. Pengelola bank sampah membuka form input lokasi
2. Sistem menampilkan form input lokasi dan peta
3. Pengelola bank sampah mengisi alamat lengkap
4. Pengelola bank sampah menandai lokasi pada peta
5. Pengelola bank sampah menekan tombol "Simpan"
6. Sistem menyimpan perubahan dan menampilkan lokasi yang telah diperbarui

#### Skenario Alternatif
3a. Jika form tidak diisi lengkap:
   - Sistem menampilkan pesan error dan tidak menyimpan perubahan

4a. Jika lokasi pada peta tidak ditandai:
   - Sistem menampilkan pesan error untuk menandai lokasi pada peta

### 3.21 Use Case Meng-edit Profil

| Identifikasi ||
|---|---|
| Nomor | UC-02 |
| Nama | Meng-edit profil |
| Deskripsi | Nasabah dapat memperbarui informasi profil untuk memastikan data yang tersimpan tetap akurat. |
| Aktor | Nasabah |
| Kondisi awal | Nasabah telah login ke dalam sistem dan membuka halaman edit profil. |
| Kondisi akhir | Informasi profil nasabah berhasil diperbarui dalam sistem. |

#### Skenario Utama
1. Nasabah membuka halaman edit profil
2. Sistem menampilkan form edit profil dengan data yang sudah ada
3. Nasabah mengubah informasi yang diinginkan
4. Nasabah menekan tombol "Simpan"
5. Sistem memvalidasi input
6. Sistem menyimpan perubahan dan menampilkan profil yang telah diperbarui

#### Skenario Alternatif
5a. Jika validasi gagal:
   - Sistem menampilkan pesan error dan tidak menyimpan perubahan
   - Sistem menampilkan form dengan data yang sudah diisi sebelumnya
   - Nasabah memperbaiki input yang tidak valid
### 3.22 Use Case Penukaran Poin

| Identifikasi ||
|---|---|
| Nomor | UC-03 |
| Nama | Penukaran Poin |
| Deskripsi | Nasabah yang telah menyetor sampah akan mendapatkan poin pada EcoZense. |
| Aktor | Nasabah, Pengelola Bank Sampah |
| Kondisi awal | Nasabah dan Pengelola Bank Sampah telah login kedalam EcoZense, dan Nasasbah belum menerima poin. |
| Kondisi akhir | Pemberian poin oleh Pengelola Bank Sampah telah berhasil dan Nasabah mendapatkan poin. |

#### Skenario Utama
1. Nasabah login kedalam EcoZense.
2. Pengelola Bank Sampah membuka halaman poin pada dashboard.
3. Pengelola Bank Sampah mencari email Nasabah yang telah menyetor sampah.
4. Setelah berat sampah ditimbang diluar aplikasi, berat tersebut diinputkan kedalam EcoZense oleh Pengelola Bank Sampah untuk mengkonversikannya menjadi poin.
5. Pengelola Bank Sampah kemudian dapat mengirim poin kepada nasabah.
6. Nasabah telah berhasil menerima poin dan dapat dilihat melalui notifikasi.

#### Skenario Alternatif
3a. Jika email tidak ditemukan:
   - Sistem konversi dan pengiriman poin tidak bisa dilakukan.

### 3.23 Use Case Mengupdate Produk EcoEnzyme

| Identifikasi ||
|---|---|
| Nomor | UC-04 |
| Nama | Mengupdate produk EcoEnzyme |
| Deskripsi | Pengelolah bank sampah dapat mengupdate produk EcoEnzyme |
| Aktor | Pengelolah bank sampah |
| Kondisi awal | Pengelolah bank sampah telah login ke halaman produk. |
| Kondisi akhir | Pengelolah bank sampah berhasil memperbarui produk EcoEnzyme. |

#### Skenario Utama
1. Pengelolah bank sampah memasuki halaman produk
2. Pengelolah bank sampah menekan tombol "menambah produk"
3. Sistem membawa ke halaman tambah produk
4. Pengelolah bank sampah mengisi data produk yang ingin di tambahi lalu tekan menyimpan, sistem otomatis menyimpannya
5. Pengelolah bank sampah menekan tombol "edit jumlah stok"
6. Pengelolah bank sampah mengedit jumlah stok sesuai yang tersedia lalu tekan "menyimpan" dan sistem otomatis menyimpannya
7. Pengelolah bank sampah melihat ada jumlah stok yg sudah habis
8. Pengelolah bank sampah menekan produknya lalu merubah status produk menjadi stok habis
9. Begitu pulak jika ingin merubah status menjadi status tersedia

#### Skenario Alternatif
4a. Jika ada data yang kosong:
   - Sistem akan mengirim pesan error

5a. Jika stok tersisa sedikit:
   - Akan ada peringatan stok menipis

6a. Jika ada data yang kosong:
   - Sistem akan mengirim pesan error

### 3.24 Use Case Proses Pembelian Produk Eco Enzim atau Sembako

| Identifikasi ||
|---|---|
| Nomor | UC-05 |
| Nama | Proses Pembelian Produk Eco Enzim atau Sembako |
| Deskripsi | Nasabah dapat melakukan proses pembelian produk eco enzim atau sembako melalui aplikasi EcoZense, yang mencakup menambahkan produk ke dalam keranjang, memilih kuantitas, menyelesaikan pembayaran, memberikan rating, membagikan, atau menandai produk favorit, serta melihat riwayat pembelian. |
| Aktor | Nasabah dan pengelola bank sampah |
| Kondisi awal | Nasabah telah masuk ke aplikasi dan berada di halaman toko. |
| Kondisi akhir | Pembelian produk berhasil dilakukan, aksi lanjutan seperti memberi rating, share, atau favorit telah disimpan, dan riwayat pembelian dapat diakses. |

#### Skenario Utama
1. Nasabah membuka aplikasi EcoZense dan masuk ke halaman toko.
2. Nasabah menelusuri produk eco enzim atau sembako yang tersedia.
3. Nasabah memilih produk dan menentukan kuantitas.
4. Nasabah menekan tombol "Tambahkan ke Keranjang".
5. Sistem menyimpan produk dan kuantitas ke dalam keranjang dan menampilkan notifikasi keberhasilan.
6. Nasabah membuka keranjang untuk memeriksa produk dan kuantitas, serta dapat mengubah jumlah kuantitas jika diperlukan.
7. Nasabah menekan tombol "Beli Sekarang".
8. Aplikasi menampilkan pilihan metode pembayaran (poin atau transfer).
9. Nasabah memilih metode pembayaran dan menyelesaikan proses pembayaran sesuai instruksi.
10. Sistem memverifikasi pembayaran.
11. Aplikasi menampilkan notifikasi bahwa pembelian berhasil dan menyimpan bukti pembelian.
12. Nasabah mengakses halaman "Riwayat Pembelian" untuk melihat transaksi yang telah dilakukan.
13. Nasabah memilih salah satu transaksi untuk melihat detailnya.
14. Dari halaman riwayat atau produk, nasabah dapat:
    - Memberikan rating dan ulasan
    - Membagikan produk ke platform lain
    - Menandai produk sebagai favorit
15. Sistem menyimpan seluruh aksi yang dilakukan oleh nasabah.

#### Skenario Alternatif
4a. Sistem gagal menambahkan produk ke keranjang karena gangguan (misalnya koneksi internet):
   - Aplikasi menampilkan pesan: "Gagal menambahkan produk ke keranjang. Silakan coba lagi."
   - Nasabah dapat mencoba kembali setelah kendala teratasi.

6a. Nasabah memasukkan kuantitas yang tidak valid (nol, negatif, atau melebihi stok):
   - Aplikasi menampilkan pesan: "Kuantitas tidak valid. Silakan masukkan jumlah yang sesuai."
   - Nasabah memperbaiki kuantitas dan melanjutkan proses.

9a. Nasabah tidak memilih metode pembayaran:
   - Aplikasi menampilkan pesan: "Silakan pilih metode pembayaran."
   - Nasabah memilih metode dan melanjutkan.

10a. Pembayaran gagal diproses:
   - Aplikasi menampilkan pesan: "Pembayaran gagal. Silakan coba lagi atau hubungi pengelola."
   - Nasabah dapat mencoba ulang atau meminta bantuan.

13a. Data transaksi gagal dimuat:
   - Sistem menampilkan pesan: "Gagal memuat data. Silakan coba beberapa saat lagi."
   - Nasabah dapat memuat ulang halaman.

14a. Detail transaksi tidak tersedia:
   - Sistem menampilkan pesan: "Detail transaksi tidak dapat ditampilkan."
   - Nasabah dapat kembali ke daftar transaksi atau mencoba ulang.

14b. Nasabah tidak menekan bintang saat memberi rating:
   - Aplikasi menampilkan pesan: "Silakan tekan bintang sesuai dengan tingkat kepuasan Anda."
   - Nasabah menekan bintang sesuai kepuasan dan melanjutkan proses.

14c. Nasabah tidak dapat menandai produk sebagai favorit:
   - Aplikasi menampilkan pesan: "Gagal menandai produk sebagai favorit. Silakan coba lagi."
   - Nasabah dapat mencoba menekan ikon favorit kembali.

### 3.25 Use Case Mengelola dan Mempebarui Artikel

| Identifikasi ||
|---|---|
| Nomor | UC-06 |
| Nama | Mengelola dan memperbarui artikel |
| Deskripsi | Admin dapat melihat daftar artikel, menambah artikel baru, mengedit artikel yang sudah ada, atau menghapus artikel yang tidak diperuntukan. |
| Aktor | Admin |
| Kondisi awal | Admin login ke sistem dan berada pada halaman manajemen artikel. |
| Kondisi akhir | Artikel berhasil ditambahkan, diperbarui, atau dihapus dari sistem. |

#### Skenario Utama
1. Admin membuka menu "Artikel" pada dashboard
2. Sistem menampilkan daftar artikel yang tersedia
3. Admin dapat memilih untuk:
   - Menambahkan artikel baru
     - Admin mengisi judul, isi, gambar, dll artikel
     - Menekan tombol "Simpan"
   - Memperbarui artikel
     - Admin memilih artikel yang ingin diedit
     - Admin mengubah data artikel
     - Menekan tombol "Simpan"
   - Menghapus artikel
     - Admin memilih artikel yang ingin dihapus
     - Menekan tombol "Hapus"
     - Sistem menghapus artikel dari daftar

#### Skenario Alternatif
3a. Jika artikel tidak diisi lengkap saat menambah atau memperbarui:
   - Sistem menampilkan pesan kesalahan dan tidak menyimpan data.

3b. Jika artikel yang ingin diedit atau dihapus tidak ditemukan:
   - Sistem menampilkan pesan "Artikel tidak ditemukan"

### 3.26 Use Case Melihat, Memberi Nilai, dan Memberi Feedback pada Artikel

| Identifikasi ||
|---|---|
| Nomor | UC-07 |
| Nama | Melihat, memberi nilai, dan memberi feedback pada artikel |
| Deskripsi | Nasabah dapat Melihat, memberi nilai, dan memberi feedback pada artikel |
| Aktor | Nasabah |
| Kondisi awal | Nasabah ingin melihat, memberi nilai, dan memberi feedback pada artikel |
| Kondisi akhir | Nasabah berhasil melihat, memberi nilai, dan memberi feedback pada artikel |

#### Skenario Utama
1. Nasabah mengakses halaman utama pada website
2. Nasabah menekan tombol "artikel"
3. Nasabah akan diarahkan ke halaman artikel
4. Nasabah bisa memilih dan menekan artikel yang tertera di halaman tersebut
5. Nasabah bisa menilai dan memberi feedback pada artikel yang dipilih

#### Skenario Alternatif
1a. Nasabah mengakses halaman utama, namun koneksi internet terputus:
   - Sistem menampilkan pesan kesalahan koneksi dan halaman tidak dapat dimuat

2a. Nasabah menekan tombol "Artikel", namun halaman tidak dapat dimuat karena kesalahan server:
   - Sistem menampilkan pesan bahwa terjadi kesalahan pada server dan meminta nasabah mencoba kembali nanti

3a. Nasabah dialihkan ke halaman artikel, tetapi konten artikel tidak berhasil dimuat:
   - Sistem menampilkan notifikasi bahwa terjadi gangguan dalam memuat konten

4a. Nasabah tidak menemukan artikel yang diinginkan karena daftar artikel kosong atau belum tersedia:
   - Sistem menampilkan pesan bahwa belum ada artikel yang tersedia

4b. Nasabah menekan artikel, namun artikel tersebut sudah tidak tersedia (misalnya, telah dihapus oleh admin):
   - Sistem menampilkan pesan bahwa artikel tidak dapat ditemukan

5a. Nasabah mencoba memberi nilai atau feedback, tetapi data yang dimasukkan tidak sesuai format:
   - Sistem menampilkan pesan kesalahan dan meminta nasabah memperbaiki input

5b. Nasabah memberi nilai atau feedback, namun terjadi kegagalan saat menyimpan data karena gangguan sistem:
   - Sistem menampilkan pesan bahwa feedback atau nilai gagal dikirim dan menyarankan untuk mencoba kembali

### 3.27 Use Case Membuat dan Mengelolah Event

| Identifikasi ||
|---|---|
| Nomor | UC-08 |
| Nama | Membuat dan Mengelolah event |
| Deskripsi | Admin dapat membuat dan mengelolah event EcoEnzyme |
| Aktor | Admin |
| Kondisi awal | Admin masuk kedalam sistem |
| Kondisi akhir | Admin berhasil membuat dan mengelolah event EcoEnzyme |

#### Skenario Utama
1. Admin masuk ke halaman manajmen event
2. Sistem menampilkan daftar event yang sudah ada
3. Admin menekan tombol "membuat event"
4. Admin mengisi data formulir untuk membua event
5. Admin menekan tombol "simpan" untuk menyimpan
6. Sistem otomatis menyimpan event yang sudah dibuat
7. Admin dapat mengedit dan menghapus event yang di inginkan

#### Skenario Alternatif
2a. Admin memilih untuk menghapus event yang sudah ada:
   - Sistem meminta konfirmasi sebelum menghapusnya

4a. Jika ada data yang kosong:
   - Sistem akan mengirim pesan error

6a. Jika tidak ada jaringan:
   - Sistem tidak akan menyimpan event

### 3.28 Use Case Melakukan Pendaftaran untuk Sebuah Event

| Identifikasi ||
|---|---|
| Nomor | UC-09 |
| Nama | Melakukan Pendaftaran untuk sebuah event |
| Deskripsi | Nasabah melakukan pendaftaran untuk sebuah event yang tertera di website |
| Aktor | Nasabah |
| Kondisi awal | Nasabah ingin mendaftar untuk sebuah event |
| Kondisi akhir | Nasabah berhasil mendaftar untuk sebuah event |

#### Skenario Utama
1. Nasabah mengakses halaman utama
2. Nasabah mengakses halaman pendaftaran event yang tertera di halaman utama
3. Nasabah mengisi formulir dan data yang diperlukan
4. Sistem memvalidasi data yang dimasukkan
5. Sistem menyimpan data pendaftaran dan menampilkan notifikasi bahwa pendaftaran berhasil

#### Skenario Alternatif
1a. Nasabah mengakses halaman utama, namun koneksi internet terputus:
   - Sistem menampilkan pesan kesalahan koneksi dan pengguna tidak dapat melanjutkan proses

2a. Nasabah mengakses halaman pendaftaran event, namun halaman tidak dapat dimuat karena kesalahan server:
   - Sistem menampilkan pesan bahwa terjadi kesalahan pada server dan meminta nasabah mencoba kembali nanti

3a. Pengguna mengisi formulir pendaftaran, namun data yang dimasukkan tidak lengkap atau tidak sesuai format:
   - Sistem menampilkan pesan kesalahan dan meminta pengguna untuk mengisi data dengan lengkap atau memperbaikinya

4a. Sistem gagal memvalidasi data karena terjadi gangguan teknis atau kesalahan internal sistem:
   - Sistem menampilkan pesan bahwa terjadi kesalahan teknis dan meminta pengguna mencoba kembali nanti

### 3.29 Use Case Pengajuan Nasabah menjadi Pengelola Bank Sampah

| Identifikasi ||
|---|---|
| Nomor | UC-10 |
| Nama | Pengajuan Nasabah menjadi Pengelola Bank Sampah |
| Deskripsi | Nasabah yang ingin menjadi Pengelola Bank Sampah dapat mengajukannya pada EcoZense |
| Aktor | Nasabah dan Admin |
| Kondisi awal | Nasabah melakukan pengajuan menjadi Pengelola Bank Sampah |
| Kondisi akhir | Nasabah telah berhasil menjadi Pengelola Bank Sampah |

#### Skenario Utama
1. Nasabah memasuki EcoZense
2. Nasabah memasuki halaman profil kemudian menekan tombol "Appeal"
3. Nasabah mengisi formulir pengajuan menjadi Pengajuan Bank Sampah kemudian menekan "Submit"
4. Admin memasuki Dashboard kemudian memilih "Pengajuan" pada Sidebar
5. Admin mereview pengajuan yang dilakukan nasabah kemudian memverifikasinya
6. Setelah diverifikasi Nasabah telah berhasil menjadi Pengelola Bank Sampah

#### Skenario Alternatif
3a. Nasabah tidak memasukkan salah satu data yang diperlukan:
   - Akan memunculkan error dan perintah untuk mengisi data tersebut

3b. Nasabah yang menekan tombol "Cancel":
   - Akan memunculkan popup untuk memastikan apakah Nasabah ingin cancel atau tidak

5a. Admin yang menemukan masalah pada data:
   - Akan menolak verifikasi

### 3.22 Deskripsi Kebutuhan Non Fungsional

| SKPL-Id | Parameter | Kebutuhan |
|---------|-----------|-----------|
| SKPL-NF01 | Security | - Sistem harus memiliki fitur otentikasi dan otorisasi pengguna<br>- Data pengguna harus dienkripsi |
| SKPL-NF02 | Performance | - Waktu respon sistem harus kurang dari 3 detik pada setiap permintaan pengguna<br>- Sistem harus mampu menangani minimal 1000 pengguna secara bersamaan |
| SKPL-NF03 | Availability | Sistem harus memiliki uptime minimal 90% dalam setahun |
| SKPL-NF04 | Portability | Sistem harus dapat berjalan di browser desktop |
| SKPL-NF05 | User friendly | Antarmuka pengguna harus intuitif dan mudah digunakan oleh masyarakat umum |

### 3.23 Deskripsi Kelas-Kelas

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

### 3.24 State Machine Diagram
[Diagram akan ditambahkan di sini]

### 3.25 Deskripsi Data

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
| Kebutuhan | Deskripsi | UC-01 | UC-02 | UC-03 | UC-04 | UC-05 | UC-06 | UC-07 | UC-08 | Prioritas |
|-----------|-----------|-------|-------|-------|-------|-------|-------|-------|-------|-----------|
| SKPL-F01 | Menampilkan peta lokasi bank sampah | - | - | - | - | - | - | - | - | Tinggi |
| SKPL-F02 | Melihat dan menelusuri artikel | - | - | - | X | - | - | - | - | Tinggi |
| SKPL-F03 | Mendaftar pada event | - | - | - | - | - | X | - | - | Sedang |
| SKPL-F04 | Membuat akun sebagai nasabah | X | - | - | - | - | - | - | - | Tinggi |
| SKPL-F05 | Mengedit profil | X | - | - | - | - | - | - | - | Sedang |
| SKPL-F07 | Menerima poin | - | X | - | - | - | - | - | - | Tinggi |
| SKPL-F08 | Melihat jumlah poin | - | X | - | - | - | - | - | - | Tinggi |
| SKPL-F09 | Membeli produk dengan poin/transfer | - | - | X | - | - | - | - | - | Tinggi |
| SKPL-F010 | Memasukkan produk ke keranjang | - | - | X | - | - | - | - | - | Tinggi |
| SKPL-F011 | Memasukkan kuantitas produk | - | - | X | - | - | - | - | - | Tinggi |
| SKPL-F012 | Memberikan rating produk | - | - | X | - | - | - | - | - | Rendah |
| SKPL-F013 | Menerima notifikasi | - | - | X | - | - | - | - | - | Sedang |
| SKPL-F014 | Menerima bukti pembayaran | - | - | X | - | - | - | - | - | Tinggi |
| SKPL-F015 | Melihat riwayat pembelian | - | - | X | - | - | - | - | - | Sedang |
| SKPL-F016 | Memberikan nilai artikel | - | - | - | X | - | - | - | - | Rendah |
| SKPL-F017 | Memberikan feedback artikel | - | - | - | X | - | - | - | - | Sedang |
| SKPL-F018 | Mengajukan menjadi Bank Sampah | - | - | - | - | - | - | X | - | Tinggi |
| SKPL-F019 | Memasukkan lokasi bank sampah | - | - | - | - | - | - | X | - | Tinggi |
| SKPL-F020 | Menambahkan produk ecoenzim | - | - | - | - | X | - | - | - | Tinggi |
| SKPL-F021 | Mengatur kuantitas produk | - | - | - | - | X | - | - | - | Tinggi |
| SKPL-F022 | Mengupdate produk | - | - | - | - | X | - | - | - | Tinggi |
| SKPL-F023 | Memasukkan berat sampah | - | X | - | - | - | - | - | - | Tinggi |
| SKPL-F024 | Memberikan poin | - | X | - | - | - | - | - | - | Tinggi |
| SKPL-F025 | Melihat riwayat transaksi | - | X | - | - | - | - | - | - | Sedang |
| SKPL-F026 | Melihat lokasi bank sampah | - | - | - | - | - | - | X | - | Tinggi |
| SKPL-F027 | Mengelola artikel | - | - | - | X | - | - | - | - | Tinggi |
| SKPL-F028 | Mereview artikel | - | - | - | X | - | - | - | - | Tinggi |
| SKPL-F029 | Mengelola event | - | - | - | - | - | X | - | - | Tinggi |
| SKPL-F030 | Mereview event | - | - | - | - | - | X | - | - | Tinggi |
| SKPL-F031 | Memverifikasi pengajuan | - | - | - | - | - | - | X | - | Tinggi |
| SKPL-F032 | Mengelola data pengguna | X | - | - | - | - | - | - | - | Tinggi |
| SKPL-F010 | Menukarkan poin | - | - | - | - | - | - | - | X | Tinggi |

### 5.2 Kebutuhan Non-Fungsional vs Use Case
| Kebutuhan | Deskripsi | UC-01 | UC-02 | UC-03 | UC-04 | UC-05 | UC-06 | UC-07 | UC-08 | Prioritas |
|-----------|-----------|-------|-------|-------|-------|-------|-------|-------|-------|-----------|
| SKPL-NF01 | Keamanan | X | X | X | X | X | X | X | X | Tinggi |
| SKPL-NF02 | Performa | X | X | X | X | X | X | X | X | Tinggi |
| SKPL-NF03 | Ketersediaan | X | X | X | X | X | X | X | X | Tinggi |
| SKPL-NF04 | Portabilitas | X | X | X | X | X | X | X | X | Sedang |
| SKPL-NF05 | Kemudahan Penggunaan | X | X | X | X | X | X | X | X | Tinggi |

**Keterangan:**
- X: Kebutuhan terhubung dengan use case
- -: Kebutuhan tidak terhubung dengan use case
- Prioritas: Tinggi (High), Sedang (Medium), Rendah (Low)