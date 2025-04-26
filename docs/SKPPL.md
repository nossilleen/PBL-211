# SPESIFIKASI KEBUTUHAN DAN PERANCANGAN PERANGKAT LUNAK

## (EcoZense) Aplikasi Web Eco Enzim

### Dipersiapkan oleh:
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

4. [Deskripsi Kelas-Kelas](#4-deskripsi-kelas-kelas)

   4.1 [Class Diagram](#41-class-diagram)  
   4.2 [Class User](#42-class-user)  
   4.3 [Class Lokasi](#43-class-lokasi)  
   4.4 [Class Artikel](#44-class-artikel)  
   4.5 [Class Produk](#45-class-produk)  
   4.6 [Class ProdukGambar](#46-class-produkgambar)  
   4.7 [Class Transaksi](#47-class-transaksi)  
   4.8 [Class Poin](#48-class-poin)  
   4.9 [Class Feedback](#49-class-feedback)  
   4.10 [Class ArtikelGambar](#410-class-artikelgambar)  
   4.11 [State Machine Diagram](#411-state-machine-diagram)  

5. [Deskripsi Data](#5-deskripsi-data)

   5.1 [Entity-Relationship Diagram](#51-entity-relationship-diagram)  
   5.2 [Daftar Tabel](#52-daftar-tabel)  
   5.3 [Struktur Tabel](#53-struktur-tabel)  
   5.4 [Struktur Tabel](#54-struktur-tabel)  
   5.5 [Skema Relasi Antar Tabel](#55-skema-relasi-antar-tabel)  

6. [Perancangan Antarmuka](#6-perancangan-antarmuka)

   6.1 [Antarmuka](#61-antarmuka)  
   6.2 [Antarmuka](#62-antarmuka)  

7. [Matriks Keterunutan](#7-matriks-keterunutan)
    
   7.1 [Kebutuhan Fungsional vs Use Case](#71-kebutuhan-fungsional-vs-use-case)  
   7.2 [Kebutuhan Non-Fungsional vs Use Case](#72-kebutuhan-non-fungsional-vs-use-case)  

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
- SKPL-F01 Nasabah, Pengelola Bank Sampah, dan Admin dapat login.
- SKPL-F02 Sistem dapat menampilkan peta lokasi bank sampah di Batam.
- SKPL-F03 Pengguna umum melihat dan menelusuri artikel.
- SKPL-F04 Pengguna umum mendaftar event.
- SKPL-F05 Pengguna umum membuat akun sebagai nasabah.
- SKPL-F06 Nasabah dapat menerima poin.
- SKPL-F07 Nasabah, Pengelola Bank Sampah, dan Admin dapat melakukan reset password.
- SKPL-F08 Nasabah dapat melihat berapa banyak poin yang dimilikinya.
- SKPL-F09 Nasabah dapat membeli produk Eco Enzim/sembako menggunakan poin ataupun transfer.
- SKPL-F010 Nasabah dapat memasukkan produk Eco Enzim kedalam keranjang.
- SKPL-F011 Nasabah dapat memasukkan kuantitas produk yang ingin dibeli.
- SKPL-F012 Nasabah dapat memberikan rating, share dan favorite produk.
- SKPL-F013 Nasabah dapat menerima notifikasi pada website.
- SKPL-F014 Nasabah dapat melihat riwayat pembelian.
- SKPL-F015 Nasabah dapat memberikan nilai pada artikel.
- SKPL-F016 Nasabah dapat memberikan feedback pada artikel.
- SKPL-F017 Nasabah dapat mengajukan diri untuk menjadi Bank Sampah.
- SKPL-F018 Bank Sampah dapat memasukkan alamat serta menginput lokasi pada peta.
- SKPL-F019 Bank Sampah dapat menambahkan produk Eco Enzim pada tokonya masing-masing.
- SKPL-F020 Bank Sampah dapat meng-update produk Eco Enzim.
- SKPL-F021 Bank Sampah dapat memasukkan berat sampah yang diberikan oleh nasabah kemudian menghitungnya menjadi poin.
- SKPL-F022 Bank Sampah dapat memberikan poin kepada nasabah.
- SKPL-F023 Bank Sampah dapat melihat riwayat transaksi pada toko
- SKPL-F024 Admin dapat melihat lokasi-lokasi bank sampah pada peta di dalam dashboard.
- SKPL-F025 Admin dapat mengelola artikel dan post.
- SKPL-F026 Admin dapat melihat list tabel dari seluruh artikel yang telah dibuat kemudian admin dapat mereview artikel (edit/delete).
- SKPL-F027 Admin dapat mengelola event.
- SKPL-F028 Admin dapat melihat list tabel dari seluruh event yang telah dibuat kemudian admin dapat mereview event (edit/delete).
- SKPL-F029 Admin dapat mem-verifikasi pengajuan nasabah yang ingin menjadi bank sampah.
- SKPL-F030 Admin dapat mengelola data pengguna.
- SKPL-F031 Admin, Nasabah dan bank sampah dapat logout.
- SKPL-F032 Nasabah dapat memilih opsi pembelian pada produk (Poin atau Transfer).
- SKPL-F033 Nasabah dapat mengatur kuantitas produk yang ingin dibeli.
- SKPL-F034 No. Rekening Pengelola Bank Sampah akan diberikan ketika nasabah ingin melakukan transfer.
- SKPL-F035 Produk yang dibeli akan muncul pada halaman pesanan.
- SKPL-F036 Setiap Produk memiliki inputan upload bukti pembayaran.
- SKPL-F037 Setiap Produk yang pada halaman pesanan memiliki status ('Belum Dibayar', 'Sedang Diverifikasi', 'Sedang Dikirim', 'Selesai', 'Dibatalkan').

#### 3.1.1 Use Case Diagram
![Gambar 2. Use Case Diagram Aplikasi Web Eco Enzim]()

#### 3.1.2 Use Case Memasukkan Alamat Dan Lokasi Bank Sampah

##### 3.1.2.1 Skenario

| Identifikasi | |
|-------------|-------------|
| Nomor | UC-01 |
| Nama | Memasukkan alamat dan lokasi bank sampah |
| Deskripsi | Pengelola bank sampah dapat memasukkan alamat dan lokasi bank sampah untuk memastikan informasi yang disampaikan tetap dan akurat. |
| Aktor | Pengelola Bank Sampah |
| Kondisi awal | Pengelola bank sampah telah login ke dalam sistem dan membuka halaman edit lokasi bank sampah. |
| Kondisi akhir | Alamat dan lokasi bank sampah berhasil disimpan di dalam sistem. |

**Skenario Utama**
1. Pengelola bank sampah membuka form input lokasi
2. Sistem menampilkan form input lokasi dan peta
3. Pengelola bank sampah mengisi alamat lengkap
4. Pengelola bank sampah menandai lokasi pada peta
5. Pengelola bank sampah menekan tombol "simpan"
6. Sistem menyimpan perubahan dan menampilkan lokasi yang telah diperbarui

**Skenario Alternatif**  
3a. Jika form tidak lengkap, maka sistem menampilkan pesan error dan tidak menyimpan perubahan  
4a. Jika lokasi pada peta tidak ditandai, maka sistem menampilkan pesan error untuk menandai lokasi pada peta

#### 3.1.3 Use Case Meng-edit Profil

##### 3.1.3.1 Skenario

| Identifikasi | |
|-------------|-------------|
| Nomor | UC-02 |
| Nama | Meng-edit Profil |
| Deskripsi | Nasabah dapat memperbarui informasi profil untuk memastikan data yang tersimpan tetap akurat. |
| Aktor | Nasabah |
| Kondisi awal | Nasabah telah login ke dalam sistem dan membuka halaman edit profil. |
| Kondisi akhir | Informasi profil nasabah berhasil diperbarui dalam sistem. |

**Skenario Utama**
1. Nasabah membuka halaman edit profil
2. Sistem menampilkan form edit profil dengan data yang sudah ada
3. Nasabah mengubah informasi yang diinginkan
4. Nasabah menekan tombol "Simpan"
5. Sistem memvalidasi input
6. Sistem mengimpan perubahan dan menampilkan profil yang telah diperbarui

**Skenario Alternatif**  
5a. Jika validasi gagal:
- Sistem menampilkan pesan error dan tidak menyimpan perubahan
- Nasabah memperbaiki input yang tidak valid

#### 3.1.4 Use Case Penukaran Poin

##### 3.1.4.1 Skenario

| Identifikasi | |
|-------------|-------------|
| Nomor | UC-03 |
| Nama | Penukaran Poin |
| Deskripsi | Nasabah yang telah menyetor sampah akan mendapatkan poin pada EcoZense. |
| Aktor | Nasabah, Pengelola Bank Sampah |
| Kondisi awal | Nasabah dan Pengelola Bank Sampah telah login kedalam EcoZense, dan Nasabah belum menerima poin. |
| Kondisi akhir | Pemberian poin oleh Pengelola Bank Sampah telah berhasil dan Nasabah mendapatkan poin. |

**Skenario Utama**
1. Nasabah login kedalam EcoZense.
2. Pengelola Bank Sampah membuka halaman poin pada dashboard.
3. Pengelola Bank Sampah mencari email Nasabah yang telah menyetor sampah.
4. Setelah berat sampah ditimbang diluar aplikasi, berat tersebut diinputkan kedalam EcoZense oleh Pengelola Bank Sampah untuk mengkonversikannya menjadi poin.
5. Pengelola Bank Sampah kemudian dapat mengirim poin kepada nasabah.
6. Nasabah telah berhasil menerima poin dan dapat dilihat melalui notifikasi.

**Skenario Alternatif**  
3a. Jika email tidak ditemukan maka sistem konversi dan pengiriman poin tidak bisa dilakukan.

#### 3.1.5 Use Case Mengupdate Produk Eco Enzim

##### 3.1.5.1 Skenario

| Identifikasi | |
|-------------|-------------|
| Nomor | UC-4 |
| Nama | Mengupdate produk Eco Enzim |
| Deskripsi | Pengelola bank sampah dapat mengupdate produk Eco Enzim |
| Aktor | Pengelola bank sampah |
| Kondisi awal | Pengelola bank sampah telah login ke halaman produk. |
| Kondisi akhir | Pengelola bank sampah berhasil memperbarui produk Eco Enzim. |

**Skenario Utama**
1. Pengelola bank sampah memasuki halaman produk.
2. Pengelola bank sampah menekan tombol "menambah produk".
3. Sistem membawa ke halaman tambah produk.
4. Pengelola bank sampah mengisi data produk yang ingin ditambah lalu tekan menyimpan, sistem otomatis menyimpan data.
5. Pengelola bank sampah dapat menekan produknya lalu merubah status produk menjadi stok habis.
6. Begitu pula jika ingin merubah status menjadi status tersedia.

**Skenario Alternatif**  
4a. Jika ada data yang kosong, sistem akan mengirim pesan error

#### 3.1.6 Use Case Proses Pembelian Produk Eco Enzim atau Sembako

##### 3.1.6.1 Skenario

| Identifikasi | |
|-------------|-------------|
| Nomor | UC-5 |
| Nama | Proses Pembelian Produk Eco Enzim atau Sembako |
| Deskripsi | Nasabah dapat melakukan proses pembelian produk eco enzim atau sembako melalui aplikasi EcoZense, memilih kuantitas, menyelesaikan pembayaran, memberikan like, membagikan, atau menandai produk favorit, serta melihat riwayat pembelian. |
| Aktor | Nasabah dan pengelola bank sampah |
| Kondisi awal | Nasabah telah masuk ke aplikasi dan berada di halaman toko. |
| Kondisi akhir | Pembelian produk berhasil dilakukan, aksi lanjutan seperti memberi like, share, atau favorit telah disimpan, dan riwayat pembelian dapat diakses. |

**Skenario Utama**
1. Nasabah membuka aplikasi EcoZense dan masuk ke halaman toko.
2. Nasabah menelusuri produk eco enzim atau sembako yang tersedia.
3. Nasabah menekan tombol "Beli Sekarang".
4. Nasabah memilih produk dan menentukan kuantitas.
5. Aplikasi menampilkan pilihan metode pembayaran (poin atau transfer).
6. Nasabah memilih metode pembayaran dan menyelesaikan proses pembayaran sesuai instruksi.
7. Sistem menyimpan produk dan kuantitas ke dalam halaman pesanan dan menampilkan status pesanan.
8. Nasabah membuka halaman pesanan untuk meng-upload bukti transfer, serta dapat melihat status pesanan terkini.
9. Sistem memverifikasi pembayaran.
10. Aplikasi menampilkan notifikasi bahwa pembelian terverifikasi dan memperbarui status pesanan ke "Sedang Dikirim".
11. Nasabah mengakses halaman "Riwayat Pembelian" untuk melihat transaksi yang telah dilakukan.
12. Nasabah memilih salah satu transaksi untuk melihat detailnya.
13. Dari halaman riwayat atau produk, nasabah dapat:
    - Memberikan like dan ulasan
    - Membagikan produk ke platform lain
    - Menandai produk sebagai favorit
14. Sistem menyimpan seluruh aksi yang dilakukan oleh nasabah.

**Skenario Alternatif**  
5a. Nasabah tidak memilih metode pembayaran:
- Aplikasi menampilkan pesan: "Silakan pilih metode pembayaran."
- Nasabah memilih metode dan melanjutkan.

9a. Pembayaran gagal diproses verifikasi:
- Aplikasi menampilkan pesan: "Pembayaran gagal. Silakan hubungi pengelola."
- Nasabah dapat meminta bantuan.

12a. Data transaksi gagal dimuat:
- Sistem menampilkan pesan: "Gagal memuat data. Silakan coba beberapa saat lagi."
- Nasabah dapat memuat ulang halaman.

13a. Detail transaksi tidak tersedia:
- Sistem menampilkan pesan: "Detail transaksi tidak dapat ditampilkan."
- Nasabah dapat kembali ke daftar transaksi atau mencoba ulang.

14b. Nasabah tidak dapat menandai produk sebagai favorit:
- Aplikasi menampilkan pesan: "Gagal menandai produk sebagai favorit. Silakan coba lagi."
- Nasabah dapat mencoba menekan ikon favorit kembali.

#### 3.1.7 Use Case Mengelola dan Memperbarui Artikel

##### 3.1.7.1 Skenario

| Identifikasi | |
|-------------|-------------|
| Nomor | UC-6 |
| Nama | Mengelola dan Memperbarui Artikel |
| Deskripsi | Admin dapat melihat daftar artikel, menambah artikel baru, mengedit artikel yang sudah ada, atau menghapus artikel yang tidak diperuntukan. |
| Aktor | Admin |
| Kondisi awal | Admin login ke sistem dan berada pada halaman manajemen artikel. |
| Kondisi akhir | Artikel berhasil ditambahkan, diperbarui, atau dihapus dari sistem. |

**Skenario Utama**
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

**Skenario Alternatif**  
3a. Jika artikel tidak diisi lengkap saat menambah atau memperbarui, sistem menampilkan pesan kesalahan dan tidak menyimpan data.

3b. Jika artikel yang ingin diedit atau dihapus tidak ditemukan, sistem menampilkan pesan "Artikel tidak ditemukan"

#### 3.1.8 Use Case Melihat, memberi like, dan memberi feedback pada artikel

##### 3.1.8.1 Skenario

| Identifikasi | |
|-------------|-------------|
| Nomor | UC-7 |
| Nama | Melihat, memberi like, dan memberi feedback pada artikel. |
| Deskripsi | Nasabah dapat Melihat, memberi like, dan memberi feedback pada artikel. |
| Aktor | Nasabah |
| Kondisi awal | Nasabah ingin melihat, memberi like, dan memberi feedback pada artikel. |
| Kondisi akhir | Nasabah berhasil melihat, memberi like, dan memberi feedback pada artikel. |

**Skenario Utama**
1. Nasabah mengakses halaman utama pada website.
2. Nasabah menekan tombol "artikel".
3. Nasabah akan diarahkan ke halaman artikel.
4. Nasabah bisa memilih dan menekan artikel yang tertera di halaman tersebut.
5. Nasabah bisa like dan memberi feedback pada artikel yang dipilih.

**Skenario Alternatif**  
1a. Nasabah mengakses halaman utama, namun koneksi internet terputus, sistem menampilkan pesan kesalahan koneksi dan halaman tidak dapat dimuat.

2a. Nasabah menekan tombol "Artikel", namun halaman tidak dapat dimuat karena kesalahan server, sistem menampilkan pesan bahwa terjadi kesalahan pada server dan meminta nasabah mencoba kembali nanti.

3a. Nasabah dialihkan ke halaman artikel, tetapi konten artikel tidak berhasil dimuat, sistem menampilkan notifikasi bahwa terjadi gangguan dalam memuat konten.

4a. Nasabah tidak menemukan artikel yang diinginkan karena daftar artikel kosong atau belum tersedia, sistem menampilkan pesan bahwa belum ada artikel yang tersedia.

4b. Nasabah menekan artikel, namun artikel tersebut sudah tidak tersedia (misalnya, telah dihapus oleh admin), sistem menampilkan pesan bahwa artikel tidak dapat ditemukan.

5a. Nasabah mencoba memberi like atau feedback, tetapi data yang dimasukkan tidak sesuai format (misalnya, feedback kosong atau melebihi batas karakter), sistem menampilkan pesan kesalahan dan meminta nasabah memperbaiki input.

5b. Nasabah memberi like atau feedback, namun terjadi kegagalan saat menyimpan data karena gangguan sistem, sistem menampilkan pesan bahwa feedback atau nilai gagal dikirim dan menyarankan untuk mencoba kembali.

#### 3.1.9 Use Case Membuat dan Mengelola Event

##### 3.1.9.1 Skenario

| Identifikasi | |
|-------------|-------------|
| Nomor | UC-8 |
| Nama | Membuat dan Mengelola event |
| Deskripsi | Admin dapat membuat dan mengelola event Eco Enzim |
| Aktor | Admin |
| Kondisi awal | Admin masuk kedalam sistem |
| Kondisi akhir | Admin berhasil membuat dan mengelola event Eco Enzim |

**Skenario Utama**
1. Admin masuk ke halaman manajemen event.
2. Sistem menampilkan daftar event yang sudah ada.
3. Admin menekan tombol "membuat event".
4. Admin mengisi data formulir untuk membua event.
5. Admin menekan tombol "simpan" untuk menyimpan.
6. Sistem otomatis menyimpan event yang sudah dibuat.
7. Admin dapat mengedit dan menghapus event yang di inginkan.

**Skenario Alternatif**  
2a. Admin memilih untuk menghapus event yang sudah ada, dan sistem meminta konfirmasi sebelum menghapusnya.

4a. Jika ada data yang kosong, sistem akan mengirim pesan error

6a. Jika tidak ada jaringan, sistem tidak akan menyimpan event

#### 3.1.10 Use Case Melakukan Pendaftaran untuk sebuah event

##### 3.1.10.1 Skenario

| Identifikasi | |
|-------------|-------------|
| Nomor | UC-9 |
| Nama | Melakukan Pendaftaran untuk sebuah event |
| Deskripsi | Nasabah melakukan pendaftaran untuk sebuah event yang tertera di website. |
| Aktor | Nasabah |
| Kondisi awal | Nasabah ingin mendaftar untuk sebuah event. |
| Kondisi akhir | Nasabah berhasil mendaftar untuk sebuah event. |

**Skenario Utama**
1. Nasabah mengakses halaman utama
2. Nasabah mengakses halaman pendaftaran event yang tertera di halaman utama.
3. Nasabah mengisi formulir dan data yang diperlukan.
4. Sistem memvalidasi data yang dimasukkan.
5. Sistem menyimpan data pendaftaran dan menampilkan notifikasi bahwa pendaftaran berhasil.

**Skenario Alternatif**  
1a. Nasabah mengakses halaman utama, namun koneksi internet terputus, sistem menampilkan pesan kesalahan koneksi dan pengguna tidak dapat melanjutkan proses.

2a. Nasabah mengakses halaman pendaftaran event, namun halaman tidak dapat dimuat karena kesalahan server, sistem menampilkan pesan bahwa terjadi kesalahan pada server dan meminta nasabah mencoba kembali nanti.

3a. Pengguna mengisi formulir pendaftaran, namun data yang dimasukkan tidak lengkap atau tidak sesuai format (misalnya, alamat email tidak valid), sistem menampilkan pesan kesalahan dan meminta pengguna untuk mengisi data dengan lengkap atau memperbaikinya.

4a. Sistem gagal memvalidasi data karena terjadi gangguan teknis atau kesalahan internal sistem, sistem menampilkan pesan bahwa terjadi kesalahan teknis dan meminta pengguna mencoba kembali nanti.

#### 3.1.11 Use Case Pengajuan Nasabah menjadi Pengelola Bank Sampah

##### 3.1.11.1 Skenario

| Identifikasi | |
|-------------|-------------|
| Nomor | UC-10 |
| Nama | Pengajuan Nasabah menjadi Pengelola Bank Sampah |
| Deskripsi | Nasabah yang ingin menjadi Pengelola Bank Sampah dapat mengajukannya pada EcoZense. |
| Aktor | Nasabah dan Admin |
| Kondisi awal | Nasabah melakukan pengajuan menjadi Pengelola Bank Sampah |
| Kondisi akhir | Nasabah telah berhasil menjadi Pengelola Bank Sampah |

**Skenario Utama**
1. Nasabah memasuki EcoZense.
2. Nasabah memasuki halaman profil kemudian menekan tombol "Appeal".
3. Nasabah mengisi formulir pengajuan menjadi Pengajuan Bank Sampah kemudian menekan "Submit".
4. Admin memasuki Dashboard kemudian memilih "Pengajuan" pada Sidebar.
5. Admin mereview pengajuan yang dilakukan nasabah kemudian memverifikasinya.
6. Setelah diverifikasi Nasabah telah berhasil menjadi Pengelola Bank Sampah.

**Skenario Alternatif**  
3a. Nasabah tidak memasukkan salah satu data yang diperlukan maka akan memunculkan error dan perintah untuk mengisi data tersebut.

3b. Nasabah yang menekan tombol "Cancel" akan memunculkan popup untuk memastikan apakah Nasabah ingin cancel atau tidak.

5a. Admin yang menemukan masalah pada data akan menolah verifikasi.

### 3.2 Deskripsi Kebutuhan Non-Fungsional

**Tabel Kebutuhan Non-Fungsional**

| SKPL-Id | Parameter | Kebutuhan |
|---------|-----------|-----------|
| SKPL-NF01 | Security | - Sistem harus memiliki fitur otentikasi dan otorisasi pengguna.<br>- Data pengguna harus dienkripsi. |
| SKPL-NF02 | Performance | - Waktu respon sistem harus kurang dari 3 detik pada setiap permintaan pengguna.<br>- Sistem harus mampu menangani minimal 1000 pengguna secara bersamaan. |
| SKPL-NF03 | Availability | Sistem harus memiliki uptime minimal 90% dalam setahun. |
| SKPL-NF04 | Portability | Sistem harus dapat berjalan di browser desktop. |
| SKPL-NF05 | User friendly | Antarmuka pengguna harus intuitif dan mudah digunakan oleh masyarakat umum. |

---

## 4. Deskripsi Kelas-Kelas

### 4.1 Class Diagram
[Diagram akan ditambahkan di sini]

### 4.2 Class User

**Nama Kelas: User**

| Nama Atribut | Visibility (private, public) | Tipe |
|--------------|------------------------------|------|
| user_id | Public | Int |
| nama | Public | String |
| email | Public | String |
| password | Public | String |
| no_hp | Public | String |
| role | Public | Enum |
| lokasi_id | Public | Int |
| created_at | public | timestamp |
| updated_at | public | timestamp |

| Nama Operasi | Visibility (private, public) | Keterangan |
|--------------|------------------------------|------------|
| register | public | Mendaftarkan user baru ke dalam sistem dengan data yang telah diinput oleh pengguna (nama, email, password, dll). Sistem akan memvalidasi data dan menyimpan ke database jika valid. |
| login | public | Mengautentikasi user berdasarkan email dan password yang dimasukkan. Mengembalikan nilai boolean true jika berhasil, false jika gagal. |
| updateProfile | public | Memperbarui informasi profile user seperti nama, no_hp, atau data lainnya berdasarkan input pengguna. |
| changePassword | public | Mengubah password user dengan memverifikasi password lama terlebih dahulu, kemudian menyimpan password baru ke database. |
| getRole | public | Mengembalikan role/peran user (Nasabah, Admin, atau Pengelola Bank Sampah) yang digunakan untuk otorisasi akses sistem. |

### 4.3 Class Lokasi

**Nama kelas: Lokasi**

| Nama Atribut | Visibility (private, public) | Tipe |
|--------------|------------------------------|------|
| lokasi_id | public | int |
| nama_lokasi | public | string |
| alamat | public | string |
| kota | public | string |
| kode_pos | public | Int |
| created_at | public | timestamp |
| updated_at | public | timestamp |

| Nama Operasi | Visibility (private, public) | Keterangan |
|--------------|------------------------------|------------|
| addLocation | public | Menambahkan lokasi bank sampah baru ke dalam sistem dengan data yang diinput oleh pengelola bank sampah. Menyimpan informasi lengkap lokasi ke database. |
| updateLocation | public | Memperbarui informasi lokasi yang sudah ada seperti nama lokasi, alamat, kota, dll. berdasarkan input pengguna. |
| deleteLocation | public | Menghapus informasi lokasi dari sistem jika lokasi tersebut tidak lagi beroperasi atau diperlukan. |
| getLocationDetails | public | Mengambil dan menampilkan detail lengkap dari lokasi bank sampah, termasuk alamat, kota, dll. Mengembalikan objek Lokasi. |

### 4.4 Class Artikel

**Nama kelas: Artikel**

| Nama Atribut | Visibility (private, public) | Tipe |
|--------------|------------------------------|------|
| artikel_id | public | int |
| judul | public | string |
| konten | public | text |
| tanggal_publikasi | public | datetime |
| user_id | public | int |
| kategori | public | enum |
| created_at | public | timestamp |
| updated_at | public | timestamp |

| Nama Operasi | Visibility (private, public) | Keterangan |
|--------------|------------------------------|------------|
| createArticle | public | Membuat artikel baru dengan judul, konten, dan informasi lain yang dimasukkan oleh admin. Menyimpan artikel ke database dengan status draft atau publikasi. |
| updateArticle | public | Memperbarui informasi artikel yang sudah ada seperti judul, konten, dll. berdasarkan input admin. |
| deleteArticle | public | Menghapus artikel dari sistem jika sudah tidak relevan atau diperlukan. |
| publishArticle | public | Mempublikasikan artikel yang masih dalam status draft dengan mengatur tanggal_publikasi dan membuatnya tersedia untuk dibaca pengguna. |
| getArticleDetails | public | Mengambil dan menampilkan detail lengkap artikel termasuk judul, konten, dll. Mengembalikan objek Artikel. |

### 4.5 Class Produk

**Nama kelas: Produk**

| Nama Atribut | Visibility (private, public) | Tipe |
|--------------|------------------------------|------|
| produk_id | public | int |
| Nama_produk | public | string |
| kategori | public | enum |
| status_ketersediaan | public | enum |
| harga | public | decimal |
| user_id | public | int |
| suka | public | int |
| deskripsi | public | text |
| created_at | public | timestamp |
| updated_at | public | timestamp |

| Nama Operasi | Visibility (private, public) | Keterangan |
|--------------|------------------------------|------------|
| addProduct | public | Menambahkan produk eco enzim baru ke dalam sistem dengan data yang diinput oleh pengelola bank sampah. Menyimpan informasi produk ke database. |
| updateProduct | public | Memperbarui informasi produk yang sudah ada seperti nama, kategori, harga, dll. berdasarkan input pengelola bank sampah. |
| deleteProduct | public | Menghapus produk dari sistem jika sudah tidak tersedia atau diperlukan. |
| updateStock | public | Memperbarui status ketersediaan produk setelah terjadi transaksi atau penambahan stok baru. |
| getProductDetails | public | Mengambil dan menampilkan detail lengkap produk termasuk nama, harga, kategori, dll. Mengembalikan objek Produk. |

### 4.6 Class ProdukGambar

**Nama kelas: ProdukGambar**

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
| updateImage | public | Memperbarui informasi gambar seperti judul atau file gambar itu sendiri. |
| getImageDetails | public | Mengambil dan menampilkan detail lengkap gambar tertentu. Mengembalikan objek ProdukGambar. |
| getImageList | public | Mengambil dan menampilkan daftar semua gambar untuk produk tertentu. Mengembalikan daftar objek ProdukGambar. |

### 4.7 Class Transaksi

**Nama kelas: Transaksi**

| Nama Atribut | Visibility (private, public) | Tipe |
|--------------|------------------------------|------|
| transaksi_id | public | int |
| user_id | public | int |
| lokasi_id | public | int |
| harga_total | public | decimal |
| poin_used | public | int |
| tanggal | public | datetime |
| status | public | string |
| metode_pembayaran | public | string |
| bukti_transfer | public | string |
| created_at | public | timestamp |
| updated_at | public | timstamp |

| Nama Operasi | Visibility (private, public) | Keterangan |
|--------------|------------------------------|------------|
| createTransaction | public | Membuat transaksi baru ketika nasabah menukar poin dengan produk. Mencatat detail transaksi seperti poin yang digunakan, produk yang ditukar, dll. |
| updateStatus | public | Memperbarui status transaksi (misalnya "Pending", "Selesai", "Dibatalkan") berdasarkan perkembangan proses transaksi. |
| calculateTotal | public | Menghitung total harga transaksi berdasarkan produk yang dipilih dan jumlah poin yang digunakan. Mengembalikan nilai decimal. |
| processPayment | public | Memproses pembayaran dengan mengurangi poin nasabah sesuai jumlah yang digunakan. Mengembalikan boolean yang menunjukkan keberhasilan proses. |
| getTransactionDetails | public | Mengambil dan menampilkan detail lengkap transaksi termasuk produk yang ditukar, poin yang digunakan, dll. Mengembalikan objek Transaksi. |

### 4.8 Class Poin

**Nama kelas: Poin**

| Nama Atribut | Visibility (private, public) | Tipe |
|--------------|------------------------------|------|
| poin_id | public | int |
| user_id | public | int |
| lokasi_id | public | int |
| jumlah_poin | public | int |
| created_at | public | timestamp |
| updated_at | public | timestamp |

| Nama Operasi | Visibility (private, public) | Keterangan |
|--------------|------------------------------|------------|
| addPoints | public | Menambahkan poin ke akun nasabah setelah penyetoran sampah. Poin ditambahkan berdasarkan jenis dan jumlah sampah yang disetor. |
| usePoints | public | Mengurangi poin nasabah ketika digunakan untuk menukar dengan produk. Memastikan nasabah memiliki poin yang cukup sebelum transaksi. |
| getPointBalance | public | Mengambil dan menampilkan saldo poin saat ini untuk nasabah di lokasi bank sampah tertentu. Mengembalikan nilai integer. |
| transferPoints | public | Memindahkan poin dari satu lokasi ke lokasi lain jika fitur tersebut diizinkan oleh sistem. |
| getPointHistory | public | Mengambil dan menampilkan riwayat perubahan poin nasabah, termasuk penambahan dan penggunaan. Mengembalikan daftar objek Poin. |

### 4.9 Class Feedback

**Nama kelas: Feedback**

| Nama Atribut | Visibility (private, public) | Tipe |
|--------------|------------------------------|------|
| feedback_id | public | int |
| komentar | public | text |
| user_id | public | int |
| artikel_id | public | int |
| created_at | public | timestamp |

| Nama Operasi | Visibility (private, public) | Keterangan |
|--------------|------------------------------|------------|
| addFeedback | public | Menambahkan feedback atau komentar baru pada artikel tertentu. Menyimpan komentar beserta informasi pengguna yang memberikan feedback. |
| updateFeedback | public | Memperbarui isi feedback yang sudah diberikan oleh pengguna jika diperlukan atau diizinkan. |
| deleteFeedback | public | Menghapus feedback dari sistem jika tidak sesuai dengan ketentuan atau atas permintaan pengguna. |
| getFeedbackList | public | Mengambil dan menampilkan daftar semua feedback untuk artikel tertentu. Mengembalikan daftar objek Feedback. |
| getFeedbackDetails | public | Mengambil dan menampilkan detail lengkap feedback tertentu. Mengembalikan objek Feedback. |

### 4.10 Class ArtikelGambar

**Nama kelas: ArtikelGambar**

| Nama Atribut | Visibility (private, public) | Tipe |
|--------------|------------------------------|------|
| gambar_id | public | int |
| artikel_id | public | int |
| file_path | public | string |
| judul | public | string |
| created_at | public | timestamp |
| updated_at | public | timestamp |

| Nama Operasi | Visibility (private, public) | Keterangan |
|--------------|------------------------------|------------|
| uploadImage | public | Mengunggah gambar baru untuk artikel tertentu. Menyimpan file gambar ke server dan mencatat informasi gambar di database. |
| deleteImage | public | Menghapus gambar dari artikel dan sistem jika sudah tidak diperlukan. |
| updateImage | public | Memperbarui informasi gambar seperti judul atau file gambar itu sendiri. |
| getImageDetails | public | Mengambil dan menampilkan detail lengkap gambar tertentu. Mengembalikan objek ArtikelGambar. |
| getImageList | public | Mengambil dan menampilkan daftar semua gambar untuk artikel tertentu. Mengembalikan daftar objek ArtikelGambar. |

### 4.11 State Machine Diagram
[Diagram akan ditambahkan di sini]

## 5. Deskripsi Data

### 5.1 Entity-Relationship Diagram
[Diagram akan ditambahkan di sini]

### 5.2 Daftar Tabel
[Daftar tabel akan ditambahkan di sini]

### 5.3 Struktur Tabel
[Struktur tabel akan ditambahkan di sini]

### 5.4 Struktur Tabel
[Struktur tabel lainnya akan ditambahkan di sini]

### 5.5 Skema Relasi Antar Tabel
[Skema relasi antar tabel akan ditambahkan di sini]

## 6. Perancangan Antarmuka

### 6.1 Antarmuka
[Antarmuka akan ditambahkan di sini]

### 6.2 Antarmuka
[Antarmuka lainnya akan ditambahkan di sini]

## 7. Matriks Keterunutan

### 7.1 Kebutuhan Fungsional vs Use Case
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

### 7.2 Kebutuhan Non-Fungsional vs Use Case
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