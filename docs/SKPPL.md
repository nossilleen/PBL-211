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
   3.3 [State Machine Diagram](#33-state-machine-diagram)  
   3.4 [Deskripsi Data](#34-deskripsi-data)  
   3.5 [Use Case Mengakses Website](#35-use-case-mengakses-website)  
   3.6 [Use Case Mengelola Data Pengguna](#36-use-case-mengelola-data-pengguna)  
   3.7 [Use Case Memasukkan Alamat dan Lokasi](#37-use-case-memasukkan-alamat-dan-lokasi)  
   3.8 [Use Case Meng-edit Profil](#38-use-case-meng-edit-profil)  
   3.9 [Use Case Menginput Berat Sampah dan Mengubahnya Menjadi Poin](#39-use-case-menginput-berat-sampah-dan-mengubahnya-menjadi-poin)  
   3.10 [Use Case Memberikan Poin](#310-use-case-memberikan-poin)  
   3.11 [Use Case Menerima Poin](#311-use-case-menerima-poin)  
   3.12 [Use Case Menukarkan Poin](#312-use-case-menukarkan-poin)  
   3.13 [Use Case Menambah Produk Ecoenzim](#313-use-case-menambah-produk-ecoenzim)  
   3.14 [Use Case Mengatur Kuantitas Produk Ecoenzim](#314-use-case-mengatur-kuantitas-produk-ecoenzim)  
   3.15 [Use Case Memperbarui Produk Ecoenzim](#315-use-case-memperbarui-produk-ecoenzim)  
   3.16 [Use Case Menambah Produk ke Keranjang](#316-use-case-menambah-produk-ke-keranjang)  
   3.17 [Use Case Pemilih Mengganti Kata Sandi](#317-use-case-pemilih-mengganti-kata-sandi)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.17.1 [Skenario](#3171-skenario)  
   3.18 [Use Case Penyetoran Sampah dan Pemberian Poin](#318-use-case-penyetoran-sampah-dan-pemberian-poin)  
   3.19 [Use Case Penukaran Poin dengan Produk atau Sembako](#319-use-case-penukaran-poin-dengan-produk-atau-sembako)  
   3.20 [Use Case Pengelolaan Artikel dan Video Edukasi serta Pemberikan Feedback](#320-use-case-pengelolaan-artikel-dan-video-edukasi-serta-pemberikan-feedback)  
   3.21 [Use Case Pembuatan dan Pengelolaan Event Eco Enzim](#321-use-case-pembuatan-dan-pengelolaan-event-eco-enzim)  
   3.22 [Use Case Memasukan Lokasi Bank Sampah](#322-use-case-memasukan-lokasi-bank-sampah)  
   3.23 [Use Case Meng-edit Profil](#323-use-case-meng-edit-profil)  
   3.24 [Deskripsi Kebutuhan Non Fungsional](#324-deskripsi-kebutuhan-non-fungsional)  
   3.25 [State Machine Diagram](#325-state-machine-diagram)  
   3.26 [Deskripsi Data](#326-deskripsi-data)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.26.1 [Entity-Relationship Diagram](#3261-entity-relationship-diagram)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.26.2 [Daftar Tabel](#3262-daftar-tabel)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.26.3 [Struktur Tabel](#3263-struktur-tabel)  
   &nbsp;&nbsp;&nbsp;&nbsp;3.26.4 [Skema Relasi Antar Tabel](#3264-skema-relasi-antar-tabel)  

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

##### 3.1.2.2 Interaksi Objek
![Sequence Diagram: Memasukkan Alamat dan Lokasi Bank Sampah]()

Diagram sequence di bawah ini menggambarkan interaksi antara objek-objek dalam sistem saat Pengelola Bank Sampah melakukan input alamat dan lokasi:

```
@startuml
actor "Pengelola Bank Sampah" as Pengelola
participant "LocationListView" as ListView
participant "LocationFormView" as FormView
participant "LocationController" as Controller
participant "LocationValidator" as Validator
participant "MapService" as MapService
participant "Location" as LocationModel
database Database

' Membuka halaman lokasi
Pengelola -> ListView: 1. Mengakses halaman lokasi
ListView -> Controller: 2. getLocationsByBankId(bankId)
Controller -> LocationModel: 3. findByBankId(bankId)
LocationModel -> Database: 4. query(bankId)
Database --> LocationModel: 5. locationsData
LocationModel --> Controller: 6. locations
Controller --> ListView: 7. renderLocationList(locations)
ListView --> Pengelola: 8. Menampilkan daftar lokasi

' Memulai input lokasi baru
Pengelola -> ListView: 9. Menekan tombol "Tambah Lokasi"
ListView -> Controller: 10. showAddLocationForm()
Controller -> MapService: 11. initializeMap()
MapService --> Controller: 12. mapInitialized
Controller --> FormView: 13. renderLocationForm(map)
FormView --> Pengelola: 14. Menampilkan form input lokasi dengan peta

' Mengisi form dan menandai lokasi
Pengelola -> FormView: 15. Mengisi alamat lengkap
Pengelola -> FormView: 16. Menandai lokasi pada peta
FormView -> MapService: 17. getCoordinates()
MapService --> FormView: 18. coordinates

' Menyimpan lokasi
Pengelola -> FormView: 19. Menekan tombol "Simpan"
FormView -> Controller: 20. saveLocation(formData, coordinates)
Controller -> Validator: 21. validateLocationData(formData, coordinates)
Validator --> Controller: 22. validationResult

alt Data valid
    Controller -> LocationModel: 23. saveLocation(bankId, formData, coordinates)
    LocationModel -> Database: 24. insert()
    Database --> LocationModel: 25. insertSuccess
    LocationModel --> Controller: 26. locationSaved
    Controller --> ListView: 27. redirectToLocationList()
    ListView -> Controller: 28. getLocationsByBankId(bankId)
    Controller -> LocationModel: 29. findByBankId(bankId)
    LocationModel -> Database: 30. query(bankId)
    Database --> LocationModel: 31. locationsData
    LocationModel --> Controller: 32. locations
    Controller --> ListView: 33. renderLocationList(locations)
    ListView --> Pengelola: 34. Menampilkan daftar lokasi yang diperbarui
else Form tidak lengkap
    Controller --> FormView: 35. showValidationErrors(errors)
    FormView --> Pengelola: 36. Menampilkan pesan error
else Lokasi tidak ditandai
    Controller --> FormView: 37. showMapError("Silakan tandai lokasi pada peta")
    FormView --> Pengelola: 38. Menampilkan pesan error untuk menandai lokasi
end
@enduml
```

Diagram sequence ini menggambarkan interaksi antara objek-objek dalam sistem saat Pengelola Bank Sampah melakukan input alamat dan lokasi:

1. Pengelola Bank Sampah berinteraksi dengan antarmuka FormLokasiView
2. FormLokasiView meneruskan data ke controller LokasiController
3. LokasiController memvalidasi data melalui LokasiValidator
4. Jika valid, LokasiController menyimpan data ke model Lokasi
5. Model Lokasi menyimpan data ke database
6. Notifikasi keberhasilan dikembalikan melalui semua layer ke pengguna

Jika terjadi error validasi, alur kembali dari LokasiValidator ke FormLokasiView dengan membawa pesan error.

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

##### 3.1.3.2 Interaksi Objek
![Sequence Diagram: Meng-edit Profil]()

Diagram sequence di bawah ini menggambarkan interaksi objek dalam proses pengeditan profil nasabah:

```
@startuml
actor Nasabah
participant "ProfileView" as View
participant "ProfileController" as Controller
participant "ProfileValidator" as Validator
participant "User" as UserModel
database Database

Nasabah -> View: 1. Membuka halaman edit profil
View -> Controller: 2. getProfileData(userId)
Controller -> UserModel: 3. getUserById(userId)
UserModel -> Database: 4. query(userId)
Database --> UserModel: 5. userData
UserModel --> Controller: 6. userProfile
Controller --> View: 7. displayProfileForm(userProfile)
View --> Nasabah: 8. Menampilkan form dengan data saat ini

Nasabah -> View: 9. Mengubah data profil
Nasabah -> View: 10. Menekan tombol "Simpan"
View -> Controller: 11. updateProfile(userId, formData)
Controller -> Validator: 12. validateProfileData(formData)
Validator --> Controller: 13. validationResult

alt Data valid
    Controller -> UserModel: 14. updateUser(userId, formData)
    UserModel -> Database: 15. update(userId, formData)
    Database --> UserModel: 16. updateSuccess
    UserModel --> Controller: 17. profileUpdated
    Controller --> View: 18. showSuccessMessage()
    View --> Nasabah: 19. Menampilkan notifikasi sukses
else Data tidak valid
    Controller --> View: 20. showValidationErrors(errors)
    View --> Nasabah: 21. Menampilkan pesan kesalahan
end
@enduml
```

Penjelasan Diagram Sequence:

1. **Memuat Data Profil (1-8)**:
   - Nasabah membuka halaman edit profil
   - Controller meminta data profil dari model User
   - Database mengembalikan data profil nasabah
   - View menampilkan form edit dengan data profil saat ini

2. **Mengedit dan Menyimpan Profil (9-21)**:
   - Nasabah mengubah data pada form profil dan menekan tombol "Simpan"
   - Controller meminta validasi data melalui ProfileValidator
   - Jika data valid:
     - User model memperbarui data di database
     - View menampilkan pesan sukses
   - Jika data tidak valid:
     - View menampilkan pesan kesalahan validasi
     - Nasabah dapat memperbaiki input yang tidak valid

Diagram sequence ini menunjukkan alur interaksi antara nasabah dan sistem dalam proses pengeditan profil, termasuk validasi data dan penanganan error.

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

##### 3.1.4.2 Interaksi Objek
![Sequence Diagram: Penukaran Poin]()

Diagram sequence di bawah ini menggambarkan interaksi objek dalam proses penukaran poin oleh nasabah:

```
@startuml
actor "Pengelola Bank Sampah" as Pengelola
actor Nasabah
participant "PointDashboardView" as DashboardView
participant "PointController" as Controller
participant "PointConverter" as Converter
participant "NotificationService" as NotifService
participant "User" as UserModel
participant "Point" as PointModel
database Database

' Pencarian nasabah
Pengelola -> DashboardView: 1. Membuka halaman poin
DashboardView --> Pengelola: 2. Menampilkan form pencarian
Pengelola -> DashboardView: 3. Memasukkan email nasabah
DashboardView -> Controller: 4. searchUser(email)
Controller -> UserModel: 5. findByEmail(email)
UserModel -> Database: 6. query(email)
Database --> UserModel: 7. userData

alt Nasabah ditemukan
    UserModel --> Controller: 8. userFound
    Controller --> DashboardView: 9. displayUserData(user)
    DashboardView --> Pengelola: 10. Menampilkan data nasabah
else Nasabah tidak ditemukan
    UserModel --> Controller: 11. userNotFound
    Controller --> DashboardView: 12. showUserNotFoundError()
    DashboardView --> Pengelola: 13. Menampilkan pesan error
    note right: Alur berakhir di sini jika nasabah tidak ditemukan
end

' Input berat sampah dan konversi ke poin
Pengelola -> DashboardView: 14. Memasukkan berat sampah (kg)
DashboardView -> Controller: 15. calculatePoints(weight, userId)
Controller -> Converter: 16. convertWeightToPoints(weight)
Converter --> Controller: 17. calculatedPoints
Controller --> DashboardView: 18. displayCalculatedPoints(points)
DashboardView --> Pengelola: 19. Menampilkan jumlah poin hasil konversi

' Proses pengiriman poin ke nasabah
Pengelola -> DashboardView: 20. Konfirmasi pengiriman poin
DashboardView -> Controller: 21. sendPoints(userId, points)
Controller -> PointModel: 22. addPoints(userId, points, bankId)
PointModel -> Database: 23. insert()
Database --> PointModel: 24. success
PointModel --> Controller: 25. pointsAdded
Controller -> NotifService: 26. sendNotification(userId, message)
NotifService --> Nasabah: 27. Mengirim notifikasi
Controller --> DashboardView: 28. showSuccessMessage()
DashboardView --> Pengelola: 29. Menampilkan pesan sukses

' Nasabah melihat poin yang diterima
Nasabah -> DashboardView: 30. Membuka halaman poin
DashboardView -> Controller: 31. getUserPoints(userId)
Controller -> PointModel: 32. getPointsByUserId(userId)
PointModel -> Database: 33. query(userId)
Database --> PointModel: 34. pointsData
PointModel --> Controller: 35. userPoints
Controller --> DashboardView: 36. displayUserPoints(points)
DashboardView --> Nasabah: 37. Menampilkan poin yang dimiliki
@enduml
```

Penjelasan Diagram Sequence:

1. **Pencarian Nasabah (1-13)**:
   - Pengelola Bank Sampah membuka halaman poin dan memasukkan email nasabah
   - Controller mencari data nasabah melalui UserModel
   - Jika nasabah ditemukan, data ditampilkan; jika tidak, sistem menampilkan pesan error

2. **Input Berat Sampah dan Konversi ke Poin (14-19)**:
   - Pengelola memasukkan berat sampah (kg) yang disetor nasabah
   - Controller menggunakan PointConverter untuk menghitung jumlah poin
   - Hasil konversi ditampilkan kepada Pengelola

3. **Proses Pengiriman Poin (20-29)**:
   - Pengelola mengkonfirmasi pengiriman poin
   - Controller menyimpan poin melalui PointModel
   - Database menyimpan data poin
   - NotificationService mengirim notifikasi kepada Nasabah
   - DashboardView menampilkan pesan sukses kepada Pengelola

4. **Nasabah Melihat Poin (30-37)**:
   - Nasabah membuka halaman poin
   - Controller mengambil data poin dari database
   - DashboardView menampilkan jumlah poin yang dimiliki Nasabah

Diagram sequence ini menunjukkan alur interaksi antara Pengelola Bank Sampah, Nasabah, dan sistem dalam proses pencarian nasabah, konversi berat sampah menjadi poin, dan pengiriman poin ke nasabah.

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

##### 3.1.5.2 Interaksi Objek
![Sequence Diagram: Mengupdate Produk Eco Enzim]()

Diagram sequence di bawah ini menggambarkan interaksi objek dalam proses pengelolaan produk Eco Enzim oleh Pengelola Bank Sampah:

```
@startuml
actor "Pengelola Bank Sampah" as Pengelola
participant "ProductListView" as ListView
participant "ProductFormView" as FormView
participant "ProductController" as Controller
participant "ProductService" as Service
participant "ProductValidator" as Validator
participant "ImageUploadService" as ImageService
participant "Product" as ProductModel
participant "ProductImage" as ImageModel
database Database

' Menampilkan halaman produk
Pengelola -> ListView: 1. Mengakses halaman produk
ListView -> Controller: 2. getProducts(bankId)
Controller -> ProductModel: 3. findByBankId(bankId)
ProductModel -> Database: 4. query(bankId)
Database --> ProductModel: 5. productsList
ProductModel --> Controller: 6. products
Controller --> ListView: 7. renderProductList(products)
ListView --> Pengelola: 8. Menampilkan daftar produk

' Menambah produk baru
Pengelola -> ListView: 9. Menekan tombol "menambah produk"
ListView -> Controller: 10. showAddProductForm()
Controller --> FormView: 11. renderAddForm()
FormView --> Pengelola: 12. Menampilkan form tambah produk

Pengelola -> FormView: 13. Mengisi data produk
Pengelola -> FormView: 14. Mengunggah gambar produk
Pengelola -> FormView: 15. Menekan tombol "Simpan"
FormView -> Controller: 16. createProduct(formData, images)
Controller -> Validator: 17. validateProductData(formData)
Validator --> Controller: 18. validationResult

alt Data valid
    Controller -> ImageService: 19. uploadImages(images)
    ImageService --> Controller: 20. imageUrls
    Controller -> Service: 21. createProduct(formData, imageUrls, bankId)
    Service -> ProductModel: 22. create(productData)
    ProductModel -> Database: 23. insert()
    Database --> ProductModel: 24. productId
    
    loop Untuk setiap gambar
        Service -> ImageModel: 25. create(productId, imageUrl)
        ImageModel -> Database: 26. insert()
        Database --> ImageModel: 27. imageId
    end
    
    Service --> Controller: 28. productCreated
    Controller --> ListView: 29. redirectToProductList()
    ListView --> Pengelola: 30. Menampilkan daftar produk dengan produk baru
else Data tidak valid
    Controller --> FormView: 31. showValidationErrors(errors)
    FormView --> Pengelola: 32. Menampilkan pesan error
end

' Mengubah status produk
Pengelola -> ListView: 33. Memilih produk
ListView -> Controller: 34. getProductDetails(productId)
Controller -> ProductModel: 35. findById(productId)
ProductModel -> Database: 36. query(productId)
Database --> ProductModel: 37. productData
ProductModel --> Controller: 38. product
Controller --> ListView: 39. renderProductDetails(product)
ListView --> Pengelola: 40. Menampilkan detail produk

Pengelola -> ListView: 41. Menekan tombol ubah status
ListView -> Controller: 42. toggleProductStatus(productId)
Controller -> ProductModel: 43. toggleStatus(productId)
ProductModel -> Database: 44. update(productId, status)
Database --> ProductModel: 45. updateSuccess
ProductModel --> Controller: 46. statusUpdated
Controller --> ListView: 47. refreshProductDetails(productId)
ListView --> Pengelola: 48. Menampilkan status produk yang diperbarui
@enduml
```

Penjelasan Diagram Sequence:

1. **Menampilkan Halaman Produk (1-8)**:
   - Pengelola Bank Sampah mengakses halaman produk
   - Controller meminta daftar produk dari ProductModel
   - Database mengembalikan daftar produk
   - ListView menampilkan daftar produk kepada Pengelola

2. **Menambah Produk Baru (9-32)**:
   - Pengelola menekan tombol "menambah produk"
   - FormView menampilkan form tambah produk
   - Pengelola mengisi data produk dan mengunggah gambar
   - Controller memvalidasi data melalui Validator
   - Jika valid:
     - ImageService mengunggah gambar produk
     - Service membuat produk baru di database
     - Informasi gambar disimpan di tabel terpisah
     - ListView menampilkan daftar produk yang diperbarui
   - Jika tidak valid:
     - FormView menampilkan pesan error validasi

3. **Mengubah Status Produk (33-48)**:
   - Pengelola memilih produk dari daftar
   - Controller mengambil detail produk dari database
   - ListView menampilkan detail produk
   - Pengelola menekan tombol untuk mengubah status
   - ProductModel memperbarui status produk di database
   - ListView menampilkan produk dengan status yang diperbarui

Diagram sequence ini menunjukkan alur interaksi antara Pengelola Bank Sampah dan sistem dalam proses pengelolaan produk Eco Enzim, termasuk menambahkan produk baru dan mengubah status ketersediaan produk.

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

##### 3.1.6.2 Interaksi Objek
![Sequence Diagram: Proses Pembelian Produk Eco Enzim]()

Diagram sequence di bawah ini menggambarkan interaksi objek dalam proses pembelian produk:

```
@startuml
actor Nasabah
participant "ProductView" as View
participant "ProductController" as Controller
participant "TransactionService" as Service
participant "Product" as ProductModel
participant "Transaction" as TransactionModel
participant "Payment" as PaymentModel
database Database

Nasabah -> View: 1. Memilih produk
View -> Controller: 2. requestProductDetails(id)
Controller -> ProductModel: 3. getProduct(id)
ProductModel -> Database: 4. queryProduct(id)
Database --> ProductModel: 5. return productData
ProductModel --> Controller: 6. return product
Controller --> View: 7. displayProductDetails()
View --> Nasabah: 8. Menampilkan detail produk

Nasabah -> View: 9. Menentukan kuantitas produk
Nasabah -> View: 10. Memilih "Beli Sekarang"
View -> Controller: 11. initiateTransaction(productId, qty)
Controller -> Service: 12. createTransaction(productId, qty, userId)
Service -> TransactionModel: 13. new Transaction()
TransactionModel -> Database: 14. saveTransaction()
Database --> TransactionModel: 15. return transactionId
TransactionModel --> Service: 16. return transaction
Service --> Controller: 17. return transaction
Controller --> View: 18. redirectToPaymentMethod(transactionId)
View --> Nasabah: 19. Menampilkan pilihan metode pembayaran

Nasabah -> View: 20. Memilih metode pembayaran
View -> Controller: 21. processPayment(transactionId, method)
Controller -> PaymentModel: 22. initiatePayment(transactionId, method)
PaymentModel -> Database: 23. updateTransactionPayment()
Database --> PaymentModel: 24. return success
PaymentModel --> Controller: 25. return paymentInfo
Controller --> View: 26. redirectToOrderPage()
View --> Nasabah: 27. Menampilkan halaman pesanan

Nasabah -> View: 28. Mengupload bukti pembayaran
View -> Controller: 29. uploadPaymentProof(file, transactionId)
Controller -> PaymentModel: 30. savePaymentProof(file, transactionId)
PaymentModel -> Database: 31. updatePaymentStatus()
Database --> PaymentModel: 32. return success
PaymentModel --> Controller: 33. return status
Controller --> View: 34. showSuccessMessage()
View --> Nasabah: 35. Menampilkan status "Sedang Diverifikasi"
@enduml
```

Penjelasan Diagram Sequence:
1. **Pemilihan Produk (1-8)**: 
   - Nasabah memilih produk yang ingin dibeli
   - Sistem mengambil data produk dari database melalui ProductModel
   - View menampilkan detail produk lengkap kepada nasabah

2. **Inisiasi Transaksi (9-19)**:
   - Nasabah menentukan kuantitas dan memilih untuk membeli
   - Controller melalui TransactionService membuat transaksi baru
   - TransactionModel menyimpan data transaksi ke database
   - Sistem menampilkan pilihan metode pembayaran

3. **Proses Pembayaran (20-27)**:
   - Nasabah memilih metode pembayaran (poin atau transfer)
   - Controller memproses pembayaran melalui PaymentModel
   - Sistem mengupdate status pembayaran di database
   - View menampilkan halaman pesanan

4. **Upload Bukti Pembayaran (28-35)**:
   - Nasabah mengupload bukti pembayaran
   - Controller menyimpan bukti pembayaran melalui PaymentModel
   - Database diupdate dengan status baru
   - Sistem menampilkan status "Sedang Diverifikasi"

Diagram sequence ini menunjukkan aliran komunikasi antar objek dan proses pertukaran data dalam sistem, mengikuti pola Model-View-Controller (MVC).

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

##### 3.1.7.2 Interaksi Objek
![Sequence Diagram: Mengelola dan Memperbarui Artikel]()

Diagram sequence di bawah ini menggambarkan interaksi objek dalam proses pengelolaan artikel:

```
@startuml
actor Admin
participant "ArticleView" as View
participant "ArticleController" as Controller
participant "ArticleService" as Service
participant "Article" as ArticleModel
participant "MediaService" as MediaService
database Database

' Menambahkan artikel baru
Admin -> View: 1. Membuka form artikel baru
View --> Admin: 2. Menampilkan form artikel kosong
Admin -> View: 3. Mengisi data artikel & unggah gambar
View -> Controller: 4. createArticle(data, images)
Controller -> Service: 5. validateArticleData(data)
Service --> Controller: 6. validationResult

alt Data valid
    Controller -> MediaService: 7. uploadImages(images)
    MediaService -> MediaService: 8. processImages()
    MediaService --> Controller: 9. imageUrls
    Controller -> ArticleModel: 10. new Article(data, imageUrls)
    ArticleModel -> Database: 11. save()
    Database --> ArticleModel: 12. articleId
    ArticleModel --> Controller: 13. articleCreated
    Controller --> View: 14. redirectToArticleList()
    View --> Admin: 15. Menampilkan pesan sukses
else Data tidak valid
    Controller --> View: 16. showValidationErrors()
    View --> Admin: 17. Menampilkan pesan error
end

' Memperbarui artikel
Admin -> View: 18. Memilih artikel untuk diedit
View -> Controller: 19. editArticle(id)
Controller -> ArticleModel: 20. getArticle(id)
ArticleModel -> Database: 21. find(id)
Database --> ArticleModel: 22. articleData
ArticleModel --> Controller: 23. article
Controller --> View: 24. showEditForm(article)
View --> Admin: 25. Menampilkan form edit

Admin -> View: 26. Mengubah data artikel
View -> Controller: 27. updateArticle(id, data)
Controller -> Service: 28. validateArticleData(data)
Service --> Controller: 29. validationResult

alt Data valid
    Controller -> ArticleModel: 30. update(id, data)
    ArticleModel -> Database: 31. save()
    Database --> ArticleModel: 32. success
    ArticleModel --> Controller: 33. updateSuccess
    Controller --> View: 34. redirectToArticleDetail()
    View --> Admin: 35. Menampilkan artikel yang diperbarui
else Data tidak valid
    Controller --> View: 36. showValidationErrors()
    View --> Admin: 37. Menampilkan pesan error
end

' Menghapus artikel
Admin -> View: 38. Memilih artikel untuk dihapus
View -> Controller: 39. confirmDeleteArticle(id)
View --> Admin: 40. Meminta konfirmasi
Admin -> View: 41. Konfirmasi penghapusan
View -> Controller: 42. deleteArticle(id)
Controller -> ArticleModel: 43. delete(id)
ArticleModel -> Database: 44. remove(id)
Database --> ArticleModel: 45. deleteSuccess
ArticleModel --> Controller: 46. deleteSuccess
Controller --> View: 47. redirectToArticleList()
View --> Admin: 48. Menampilkan pesan sukses
@enduml
```

Penjelasan Diagram Sequence:

1. **Menambahkan Artikel Baru (1-17)**:
   - Admin membuka form untuk membuat artikel baru
   - Admin mengisi data artikel dan mengunggah gambar
   - Controller memvalidasi data melalui ArticleService
   - Jika valid, Controller mengunggah gambar melalui MediaService
   - ArticleModel menyimpan artikel ke database
   - View menampilkan pesan sukses atau error validasi

2. **Memperbarui Artikel (18-37)**:
   - Admin memilih artikel untuk diedit
   - Controller mengambil data artikel dari database
   - View menampilkan form edit dengan data artikel
   - Admin mengubah data artikel
   - Controller memvalidasi perubahan
   - Jika valid, ArticleModel menyimpan perubahan ke database
   - View menampilkan artikel yang diperbarui atau error validasi

3. **Menghapus Artikel (38-48)**:
   - Admin memilih artikel untuk dihapus
   - View meminta konfirmasi penghapusan
   - Admin mengonfirmasi
   - Controller menghapus artikel melalui ArticleModel
   - Database menghapus data artikel
   - View menampilkan pesan sukses

Diagram sequence ini mengilustrasikan bagaimana objek-objek dalam sistem berinteraksi untuk mengelola artikel, mengikuti pola arsitektur MVC dengan lapisan Service untuk logika bisnis.

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

##### 3.1.8.2 Interaksi Objek
![Sequence Diagram: Melihat, memberi like, dan memberi feedback pada artikel]()

Diagram sequence di bawah ini menggambarkan interaksi objek dalam proses melihat dan berinteraksi dengan artikel:

```
@startuml
actor Nasabah
participant "ArticleListView" as ListView
participant "ArticleDetailView" as DetailView
participant "ArticleController" as Controller
participant "FeedbackController" as FeedbackCtrl
participant "Article" as ArticleModel
participant "Feedback" as FeedbackModel
participant "Like" as LikeModel
database Database

' Melihat daftar artikel
Nasabah -> ListView: 1. Mengakses halaman artikel
ListView -> Controller: 2. getArticles(page, filter)
Controller -> ArticleModel: 3. findAll(page, filter)
ArticleModel -> Database: 4. query()
Database --> ArticleModel: 5. articleList
ArticleModel --> Controller: 6. articles
Controller --> ListView: 7. renderArticleList(articles)
ListView --> Nasabah: 8. Menampilkan daftar artikel

' Melihat detail artikel
Nasabah -> ListView: 9. Memilih artikel
ListView -> Controller: 10. getArticleDetail(id)
Controller -> ArticleModel: 11. findById(id)
ArticleModel -> Database: 12. query(id)
Database --> ArticleModel: 13. articleData
ArticleModel --> Controller: 14. article
Controller -> FeedbackModel: 15. getFeedbacks(articleId)
FeedbackModel -> Database: 16. query(articleId)
Database --> FeedbackModel: 17. feedbacks
FeedbackModel --> Controller: 18. feedbacks
Controller -> LikeModel: 19. getLikesCount(articleId)
LikeModel -> Database: 20. count(articleId)
Database --> LikeModel: 21. likesCount
LikeModel --> Controller: 22. likesCount
Controller -> LikeModel: 23. isLikedByUser(articleId, userId)
LikeModel -> Database: 24. query(articleId, userId)
Database --> LikeModel: 25. isLiked
LikeModel --> Controller: 26. isLiked
Controller --> DetailView: 27. renderArticle(article, feedbacks, likesCount, isLiked)
DetailView --> Nasabah: 28. Menampilkan artikel dengan feedback dan status like

' Memberi like pada artikel
Nasabah -> DetailView: 29. Menekan tombol like
DetailView -> FeedbackCtrl: 30. toggleLike(articleId)
FeedbackCtrl -> LikeModel: 31. isLikedByUser(articleId, userId)
LikeModel -> Database: 32. query(articleId, userId)
Database --> LikeModel: 33. isLiked

alt Artikel belum dilike
    FeedbackCtrl -> LikeModel: 34. addLike(articleId, userId)
    LikeModel -> Database: 35. insert()
    Database --> LikeModel: 36. success
    LikeModel --> FeedbackCtrl: 37. likeAdded
else Artikel sudah dilike
    FeedbackCtrl -> LikeModel: 38. removeLike(articleId, userId)
    LikeModel -> Database: 39. delete()
    Database --> LikeModel: 40. success
    LikeModel --> FeedbackCtrl: 41. likeRemoved
end

FeedbackCtrl -> LikeModel: 42. getLikesCount(articleId)
LikeModel -> Database: 43. count(articleId)
Database --> LikeModel: 44. likesCount
LikeModel --> FeedbackCtrl: 45. likesCount
FeedbackCtrl --> DetailView: 46. updateLikeStatus(isLiked, likesCount)
DetailView --> Nasabah: 47. Menampilkan status like yang diperbarui

' Memberi feedback pada artikel
Nasabah -> DetailView: 48. Mengisi form feedback
Nasabah -> DetailView: 49. Mengirim feedback
DetailView -> FeedbackCtrl: 50. addFeedback(articleId, text)
FeedbackCtrl -> FeedbackModel: 51. validateFeedback(text)
FeedbackModel --> FeedbackCtrl: 52. validationResult

alt Feedback valid
    FeedbackCtrl -> FeedbackModel: 53. create(articleId, userId, text)
    FeedbackModel -> Database: 54. insert()
    Database --> FeedbackModel: 55. feedbackId
    FeedbackModel --> FeedbackCtrl: 56. feedbackCreated
    FeedbackCtrl --> DetailView: 57. addFeedbackToView(feedback)
    DetailView --> Nasabah: 58. Menampilkan feedback baru
else Feedback tidak valid
    FeedbackCtrl --> DetailView: 59. showValidationErrors()
    DetailView --> Nasabah: 60. Menampilkan pesan error
end
@enduml
```

Penjelasan Diagram Sequence:

1. **Melihat Daftar Artikel (1-8)**:
   - Nasabah mengakses halaman daftar artikel
   - Controller meminta data artikel dari ArticleModel
   - Database mengembalikan daftar artikel
   - ListView menampilkan daftar artikel kepada nasabah

2. **Melihat Detail Artikel (9-28)**:
   - Nasabah memilih artikel dari daftar
   - Controller meminta detail artikel dari model
   - Controller juga meminta data feedback dan like terkait artikel
   - DetailView menampilkan artikel lengkap dengan feedback dan status like

3. **Memberi Like pada Artikel (29-47)**:
   - Nasabah menekan tombol like
   - FeedbackController memeriksa apakah artikel sudah dilike oleh nasabah
   - Jika belum, sistem menambahkan like; jika sudah, sistem menghapus like
   - Controller memperbarui jumlah like dan status
   - DetailView menampilkan status like yang diperbarui

4. **Memberi Feedback pada Artikel (48-60)**:
   - Nasabah mengisi dan mengirim feedback
   - FeedbackController memvalidasi input feedback
   - Jika valid, FeedbackModel menyimpan feedback ke database
   - Feedback baru ditampilkan di halaman artikel
   - Jika tidak valid, sistem menampilkan pesan error

Diagram sequence ini menunjukkan aliran interaksi antara nasabah dan sistem, serta bagaimana komponen-komponen dalam sistem berkomunikasi untuk mengelola like dan feedback artikel.

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

##### 3.1.9.2 Interaksi Objek
![Sequence Diagram: Membuat dan Mengelola Event]()

Diagram sequence di bawah ini menggambarkan interaksi objek dalam proses pembuatan dan pengelolaan event oleh Admin:

```
@startuml
actor Admin
participant "EventListView" as ListView
participant "EventFormView" as FormView
participant "EventController" as Controller
participant "EventService" as Service
participant "EventValidator" as Validator
participant "ImageUploadService" as ImageService
participant "Event" as EventModel
participant "EventImage" as ImageModel
database Database

' Menampilkan daftar event
Admin -> ListView: 1. Mengakses halaman manajemen event
ListView -> Controller: 2. getEvents()
Controller -> EventModel: 3. findAll()
EventModel -> Database: 4. query()
Database --> EventModel: 5. eventsList
EventModel --> Controller: 6. events
Controller --> ListView: 7. renderEventList(events)
ListView --> Admin: 8. Menampilkan daftar event

' Membuat event baru
Admin -> ListView: 9. Menekan tombol "membuat event"
ListView -> Controller: 10. showAddEventForm()
Controller --> FormView: 11. renderAddForm()
FormView --> Admin: 12. Menampilkan form tambah event

Admin -> FormView: 13. Mengisi data formulir event
Admin -> FormView: 14. Mengunggah gambar event
Admin -> FormView: 15. Menekan tombol "Simpan"
FormView -> Controller: 16. createEvent(formData, images)
Controller -> Validator: 17. validateEventData(formData)
Validator --> Controller: 18. validationResult

alt Data valid
    Controller -> ImageService: 19. uploadImages(images)
    ImageService --> Controller: 20. imageUrls
    Controller -> Service: 21. createEvent(formData, imageUrls)
    Service -> EventModel: 22. create(eventData)
    EventModel -> Database: 23. insert()
    Database --> EventModel: 24. eventId
    
    loop Untuk setiap gambar
        Service -> ImageModel: 25. create(eventId, imageUrl)
        ImageModel -> Database: 26. insert()
        Database --> ImageModel: 27. imageId
    end
    
    Service --> Controller: 28. eventCreated
    Controller --> ListView: 29. redirectToEventList()
    ListView --> Admin: 30. Menampilkan daftar event dengan event baru
else Data tidak valid
    Controller --> FormView: 31. showValidationErrors(errors)
    FormView --> Admin: 32. Menampilkan pesan error
end

' Mengedit event
Admin -> ListView: 33. Memilih event untuk diedit
ListView -> Controller: 34. showEditEventForm(eventId)
Controller -> EventModel: 35. findById(eventId)
EventModel -> Database: 36. query(eventId)
Database --> EventModel: 37. eventData
EventModel --> Controller: 38. event
Controller --> FormView: 39. renderEditForm(event)
FormView --> Admin: 40. Menampilkan form edit dengan data event

Admin -> FormView: 41. Mengubah data event
Admin -> FormView: 42. Menekan tombol "Simpan"
FormView -> Controller: 43. updateEvent(eventId, formData)
Controller -> Validator: 44. validateEventData(formData)
Validator --> Controller: 45. validationResult

alt Data valid
    Controller -> Service: 46. updateEvent(eventId, formData)
    Service -> EventModel: 47. update(eventId, eventData)
    EventModel -> Database: 48. update()
    Database --> EventModel: 49. updateSuccess
    EventModel --> Service: 50. eventUpdated
    Service --> Controller: 51. eventUpdated
    Controller --> ListView: 52. redirectToEventList()
    ListView --> Admin: 53. Menampilkan daftar event yang diperbarui
else Data tidak valid
    Controller --> FormView: 54. showValidationErrors(errors)
    FormView --> Admin: 55. Menampilkan pesan error
end

' Menghapus event
Admin -> ListView: 56. Memilih event untuk dihapus
ListView -> Controller: 57. confirmDeleteEvent(eventId)
Controller --> ListView: 58. showConfirmationDialog()
ListView --> Admin: 59. Menampilkan dialog konfirmasi

Admin -> ListView: 60. Konfirmasi penghapusan
ListView -> Controller: 61. deleteEvent(eventId)
Controller -> Service: 62. deleteEvent(eventId)
Service -> EventModel: 63. delete(eventId)
EventModel -> Database: 64. delete()
Database --> EventModel: 65. deleteSuccess
EventModel --> Service: 66. eventDeleted
Service --> Controller: 67. eventDeleted
Controller --> ListView: 68. refreshEventList()
ListView --> Admin: 69. Menampilkan daftar event tanpa event yang dihapus
@enduml
```

Penjelasan Diagram Sequence:

1. **Menampilkan Daftar Event (1-8)**:
   - Admin mengakses halaman manajemen event
   - Controller meminta daftar event dari EventModel
   - Database mengembalikan daftar event
   - ListView menampilkan daftar event kepada Admin

2. **Membuat Event Baru (9-32)**:
   - Admin menekan tombol "membuat event"
   - FormView menampilkan form tambah event
   - Admin mengisi data event dan mengunggah gambar
   - Controller memvalidasi data melalui Validator
   - Jika valid:
     - ImageService mengunggah gambar event
     - Service membuat event baru di database
     - Informasi gambar disimpan di tabel terpisah
     - ListView menampilkan daftar event yang diperbarui
   - Jika tidak valid:
     - FormView menampilkan pesan error validasi

3. **Mengedit Event (33-55)**:
   - Admin memilih event untuk diedit
   - Controller mengambil data event dari database
   - FormView menampilkan form edit dengan data event
   - Admin mengubah data event
   - Controller memvalidasi perubahan
   - Jika valid:
     - Service memperbarui event di database
     - ListView menampilkan daftar event yang diperbarui
   - Jika tidak valid:
     - FormView menampilkan pesan error validasi

4. **Menghapus Event (56-69)**:
   - Admin memilih event untuk dihapus
   - Controller menampilkan dialog konfirmasi
   - Admin mengonfirmasi penghapusan
   - Service menghapus event dari database
   - ListView menampilkan daftar event tanpa event yang dihapus

Diagram sequence ini menunjukkan alur interaksi antara Admin dan sistem dalam proses pembuatan, pengeditan, dan penghapusan event, termasuk penanganan validasi dan interaksi dengan database.

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

##### 3.1.10.2 Interaksi Objek
![Sequence Diagram: Melakukan Pendaftaran untuk sebuah event]()

Diagram sequence di bawah ini menggambarkan interaksi objek dalam proses pendaftaran Nasabah untuk sebuah event:

```
@startuml
actor Nasabah
participant "HomeView" as HomeView
participant "EventListView" as ListView
participant "EventDetailView" as DetailView
participant "EventRegisterView" as RegisterView
participant "EventController" as Controller
participant "EventRegistrationController" as RegController
participant "RegistrationValidator" as Validator
participant "Event" as EventModel
participant "EventRegistration" as RegModel
database Database

' Melihat halaman utama
Nasabah -> HomeView: 1. Mengakses halaman utama
HomeView -> Controller: 2. getFeaturedEvents()
Controller -> EventModel: 3. getFeaturedEvents()
EventModel -> Database: 4. query()
Database --> EventModel: 5. featuredEvents
EventModel --> Controller: 6. featuredEvents
Controller --> HomeView: 7. renderFeaturedEvents(events)
HomeView --> Nasabah: 8. Menampilkan event unggulan

' Membuka halaman event
Nasabah -> HomeView: 9. Mengklik event di halaman utama
HomeView -> Controller: 10. getEventDetail(eventId)
Controller -> EventModel: 11. findById(eventId)
EventModel -> Database: 12. query(eventId)
Database --> EventModel: 13. eventData
EventModel --> Controller: 14. event
Controller --> DetailView: 15. renderEventDetail(event)
DetailView --> Nasabah: 16. Menampilkan detail event

' Mendaftar event
Nasabah -> DetailView: 17. Klik tombol "Daftar Event"
DetailView -> RegController: 18. showRegistrationForm(eventId)
RegController -> EventModel: 19. getEventRegistrationInfo(eventId)
EventModel -> Database: 20. query(eventId)
Database --> EventModel: 21. eventRegInfo
EventModel --> RegController: 22. eventRegInfo
RegController --> RegisterView: 23. renderRegistrationForm(eventRegInfo)
RegisterView --> Nasabah: 24. Menampilkan formulir pendaftaran

Nasabah -> RegisterView: 25. Mengisi formulir pendaftaran
Nasabah -> RegisterView: 26. Menekan tombol "Daftar"
RegisterView -> RegController: 27. registerEvent(eventId, formData)
RegController -> Validator: 28. validateRegistrationData(formData)
Validator --> RegController: 29. validationResult

alt Data valid
    RegController -> RegModel: 30. createRegistration(eventId, userId, formData)
    RegModel -> Database: 31. insert()
    Database --> RegModel: 32. registrationId
    RegModel --> RegController: 33. registrationCreated
    RegController --> RegisterView: 34. showSuccessMessage()
    RegisterView --> Nasabah: 35. Menampilkan notifikasi pendaftaran berhasil
else Data tidak valid
    RegController --> RegisterView: 36. showValidationErrors(errors)
    RegisterView --> Nasabah: 37. Menampilkan pesan error validasi
else Koneksi internet terputus
    RegController --> RegisterView: 38. showConnectionError()
    RegisterView --> Nasabah: 39. Menampilkan pesan kesalahan koneksi
else Error sistem
    RegController --> RegisterView: 40. showSystemError()
    RegisterView --> Nasabah: 41. Menampilkan pesan kesalahan sistem
end
@enduml
```

Penjelasan Diagram Sequence:

1. **Melihat Halaman Utama (1-8)**:
   - Nasabah mengakses halaman utama
   - Controller meminta data event unggulan dari EventModel
   - Database mengembalikan daftar event unggulan
   - HomeView menampilkan event unggulan kepada Nasabah

2. **Membuka Halaman Event (9-16)**:
   - Nasabah mengklik event di halaman utama
   - Controller meminta detail event dari EventModel
   - Database mengembalikan data detail event
   - DetailView menampilkan informasi lengkap event kepada Nasabah

3. **Mendaftar Event (17-41)**:
   - Nasabah menekan tombol "Daftar Event"
   - RegController meminta informasi pendaftaran event dari database
   - RegisterView menampilkan formulir pendaftaran
   - Nasabah mengisi formulir dan menekan tombol "Daftar"
   - RegController memvalidasi data pendaftaran melalui Validator
   - Jika data valid:
     - RegModel menyimpan data pendaftaran ke database
     - RegisterView menampilkan notifikasi pendaftaran berhasil
   - Jika terjadi error:
     - RegisterView menampilkan pesan error sesuai jenis error (validasi, koneksi, sistem)

Diagram sequence ini menunjukkan alur interaksi antara Nasabah dan sistem dalam proses pendaftaran event, termasuk penanganan kesalahan yang mungkin terjadi seperti masalah validasi, koneksi internet terputus, atau error sistem.

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

##### 3.1.11.2 Interaksi Objek
![Sequence Diagram: Pengajuan Nasabah menjadi Pengelola Bank Sampah]()

Diagram sequence di bawah ini menggambarkan interaksi objek dalam proses pengajuan Nasabah untuk menjadi Pengelola Bank Sampah:

```
@startuml
actor Nasabah
actor Admin
participant "ProfileView" as ProfileView
participant "AppealFormView" as FormView
participant "AdminDashboardView" as DashboardView
participant "ApplicationListView" as ListView
participant "ApplicationDetailView" as DetailView
participant "UserController" as UserController
participant "AppealController" as AppealController
participant "AppealValidator" as Validator
participant "User" as UserModel
participant "Appeal" as AppealModel
participant "NotificationService" as NotifService
database Database

' Nasabah mengakses form pengajuan
Nasabah -> ProfileView: 1. Mengakses halaman profil
ProfileView -> UserController: 2. getUserProfile(userId)
UserController -> UserModel: 3. findById(userId)
UserModel -> Database: 4. query(userId)
Database --> UserModel: 5. userData
UserModel --> UserController: 6. userProfile
UserController --> ProfileView: 7. renderProfilePage(userProfile)
ProfileView --> Nasabah: 8. Menampilkan halaman profil

Nasabah -> ProfileView: 9. Menekan tombol "Appeal"
ProfileView -> AppealController: 10. showAppealForm(userId)
AppealController --> FormView: 11. renderAppealForm()
FormView --> Nasabah: 12. Menampilkan form pengajuan

' Nasabah mengisi dan mengirim form
Nasabah -> FormView: 13. Mengisi formulir pengajuan
Nasabah -> FormView: 14. Menekan tombol "Submit"
FormView -> AppealController: 15. submitAppeal(userId, formData)
AppealController -> Validator: 16. validateAppealData(formData)
Validator --> AppealController: 17. validationResult

alt Data valid
    AppealController -> AppealModel: 18. createAppeal(userId, formData)
    AppealModel -> Database: 19. insert()
    Database --> AppealModel: 20. appealId
    AppealModel --> AppealController: 21. appealCreated
    AppealController --> FormView: 22. showSuccessMessage()
    FormView --> Nasabah: 23. Menampilkan pesan sukses pengajuan
else Data tidak valid
    AppealController --> FormView: 24. showValidationErrors(errors)
    FormView --> Nasabah: 25. Menampilkan pesan error
end

' Admin melihat dan memverifikasi pengajuan
Admin -> DashboardView: 26. Mengakses dashboard admin
DashboardView --> Admin: 27. Menampilkan dashboard
Admin -> DashboardView: 28. Memilih menu "Pengajuan"
DashboardView -> AppealController: 29. getApplicationsList()
AppealController -> AppealModel: 30. findPendingAppeals()
AppealModel -> Database: 31. query()
Database --> AppealModel: 32. appealsList
AppealModel --> AppealController: 33. pendingAppeals
AppealController --> ListView: 34. renderPendingApplications(pendingAppeals)
ListView --> Admin: 35. Menampilkan daftar pengajuan

Admin -> ListView: 36. Memilih pengajuan untuk direview
ListView -> AppealController: 37. getAppealDetails(appealId)
AppealController -> AppealModel: 38. findById(appealId)
AppealModel -> Database: 39. query(appealId)
Database --> AppealModel: 40. appealData
AppealModel --> AppealController: 41. appealDetails
AppealController --> DetailView: 42. renderAppealDetails(appealDetails)
DetailView --> Admin: 43. Menampilkan detail pengajuan

' Admin memverifikasi pengajuan
Admin -> DetailView: 44. Menekan tombol "Verifikasi"
DetailView -> AppealController: 45. verifyAppeal(appealId)
AppealController -> AppealModel: 46. updateStatus(appealId, 'approved')
AppealModel -> Database: 47. update()
Database --> AppealModel: 48. updateSuccess

AppealController -> UserModel: 49. updateUserRole(userId, 'bank_sampah')
UserModel -> Database: 50. update()
Database --> UserModel: 51. updateSuccess
UserModel --> AppealController: 52. roleUpdated

AppealController -> NotifService: 53. sendNotification(userId, message)
NotifService --> Nasabah: 54. Mengirim notifikasi persetujuan
AppealController --> ListView: 55. refreshApplicationsList()
ListView --> Admin: 56. Menampilkan daftar pengajuan yang diperbarui

alt Admin menolak pengajuan
    Admin -> DetailView: 57. Menekan tombol "Tolak"
    DetailView -> AppealController: 58. rejectAppeal(appealId, reason)
    AppealController -> AppealModel: 59. updateStatus(appealId, 'rejected', reason)
    AppealModel -> Database: 60. update()
    Database --> AppealModel: 61. updateSuccess
    AppealController -> NotifService: 62. sendRejectionNotification(userId, reason)
    NotifService --> Nasabah: 63. Mengirim notifikasi penolakan
    AppealController --> ListView: 64. refreshApplicationsList()
    ListView --> Admin: 65. Menampilkan daftar pengajuan yang diperbarui
end
@enduml
```

Penjelasan Diagram Sequence:

1. **Nasabah Mengakses Form Pengajuan (1-12)**:
   - Nasabah mengakses halaman profil
   - UserController memperoleh data profil dari database
   - ProfileView menampilkan profil dengan tombol "Appeal"
   - Nasabah menekan tombol "Appeal"
   - AppealController menampilkan formulir pengajuan

2. **Nasabah Mengisi dan Mengirim Form (13-25)**:
   - Nasabah mengisi formulir dan menekan tombol "Submit"
   - AppealController memvalidasi data melalui Validator
   - Jika data valid:
     - AppealModel menyimpan pengajuan ke database
     - FormView menampilkan pesan sukses
   - Jika tidak valid:
     - FormView menampilkan pesan error validasi

3. **Admin Melihat dan Memverifikasi Pengajuan (26-56)**:
   - Admin mengakses dashboard dan memilih menu "Pengajuan"
   - AppealController mengambil daftar pengajuan tertunda
   - ListView menampilkan daftar pengajuan
   - Admin memilih pengajuan untuk direview
   - DetailView menampilkan detail pengajuan
   - Admin menekan tombol "Verifikasi"
   - AppealController memperbarui status pengajuan dan peran pengguna
   - NotificationService mengirim notifikasi ke Nasabah
   - ListView menampilkan daftar pengajuan yang diperbarui

4. **Admin Menolak Pengajuan (57-65)** (Alternatif):
   - Admin menekan tombol "Tolak"
   - AppealController memperbarui status pengajuan menjadi ditolak
   - NotificationService mengirim notifikasi penolakan ke Nasabah
   - ListView menampilkan daftar pengajuan yang diperbarui

Diagram sequence ini menunjukkan alur interaksi antara Nasabah, Admin, dan sistem dalam proses pengajuan Nasabah untuk menjadi Pengelola Bank Sampah, termasuk verifikasi oleh Admin.

### 3.2 Deskripsi Kebutuhan Non-Fungsional

**Tabel Kebutuhan Non-Fungsional**

| SKPL-Id | Parameter | Kebutuhan |
|---------|-----------|-----------|
| SKPL-NF01 | Security | - Sistem harus memiliki fitur otentikasi dan otorisasi pengguna.<br>- Data pengguna harus dienkripsi. |
| SKPL-NF02 | Performance | - Waktu respon sistem harus kurang dari 3 detik pada setiap permintaan pengguna.<br>- Sistem harus mampu menangani minimal 1000 pengguna secara bersamaan. |
| SKPL-NF03 | Availability | Sistem harus memiliki uptime minimal 90% dalam setahun. |
| SKPL-NF04 | Portability | Sistem harus dapat berjalan di browser desktop. |
| SKPL-NF05 | User friendly | Antarmuka pengguna harus intuitif dan mudah digunakan oleh masyarakat umum. |

### 3.3 State Machine Diagram
[Diagram akan ditambahkan di sini]

State Machine Diagram menggambarkan alur perubahan status untuk entitas utama dalam sistem:

#### 3.3.1 State Machine Transaksi
Diagram ini menggambarkan status-status yang mungkin pada sebuah transaksi:
- Status Awal: Belum Dibayar
- Transisi ke status "Sedang Diverifikasi" saat bukti pembayaran diunggah
- Transisi ke status "Sedang Dikirim" saat pembayaran diverifikasi
- Transisi ke status "Selesai" saat produk diterima nasabah
- Transisi ke status "Dibatalkan" dapat terjadi dari status manapun jika transaksi dibatalkan

#### 3.3.2 State Machine Pengajuan Bank Sampah
Diagram ini menggambarkan status-status pengajuan nasabah menjadi bank sampah:
- Status Awal: Diajukan
- Transisi ke status "Dalam Review" saat admin memeriksa pengajuan
- Transisi ke status "Disetujui" jika admin menyetujui pengajuan
- Transisi ke status "Ditolak" jika admin menolak pengajuan
- Transisi ke status "Direvisi" jika nasabah perlu melakukan revisi pengajuan

### 3.4 Deskripsi Data

#### 3.4.1 Entity-Relationship Diagram
[Diagram akan ditambahkan di sini]

Entity-Relationship Diagram menggambarkan hubungan antara entitas-entitas utama dalam sistem EcoZense, termasuk User, Lokasi, Produk, Transaksi, Artikel, dan lainnya.

#### 3.4.2 Daftar Tabel
Berikut adalah daftar tabel utama yang digunakan dalam sistem:
1. Tabel users
2. Tabel lokasi
3. Tabel produk
4. Tabel produk_gambar
5. Tabel transaksi
6. Tabel transaksi_item
7. Tabel poin
8. Tabel artikel
9. Tabel artikel_gambar
10. Tabel feedback
11. Tabel event

#### 3.4.3 Struktur Tabel users

**Nama tabel:** users  
**Primary key:** user_id

| Field | Tipe data | Ukuran | Key | Keterangan |
|-------|-----------|--------|-----|------------|
| user_id | int | - | PK | Auto increment |
| nama | varchar | 255 | - | Nama lengkap pengguna |
| email | varchar | 255 | - | Email pengguna (unik) |
| password | varchar | 255 | - | Password terenkripsi |
| no_hp | varchar | 15 | - | Nomor telepon pengguna |
| role | enum | - | - | 'admin', 'nasabah', 'bank_sampah' |
| lokasi_id | int | - | FK | Foreign key ke tabel lokasi |
| created_at | timestamp | - | - | Waktu pembuatan |
| updated_at | timestamp | - | - | Waktu update terakhir |

#### 3.4.4 Skema Relasi Antar Tabel
[Diagram akan ditambahkan di sini]

Skema relasi menggambarkan hubungan antar tabel dalam database, termasuk foreign key yang digunakan untuk menjaga integritas data.

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

### 6.1 Antarmuka Halaman Login
[Desain antarmuka login akan ditambahkan di sini]

Antarmuka login merupakan pintu masuk utama pengguna ke dalam sistem. Terdiri dari:
- Field input email/username
- Field input password
- Tombol "Login"
- Tautan "Lupa Password"
- Tautan "Daftar" untuk pengguna baru

### 6.2 Antarmuka Dashboard Admin
[Desain antarmuka dashboard admin akan ditambahkan di sini]

Dashboard admin menampilkan informasi ringkas tentang sistem, yang mencakup:
- Menu navigasi utama (sidebar)
- Statistik pengguna
- Jumlah nasabah aktif
- Jumlah bank sampah
- Grafik transaksi poin
- Daftar artikel terbaru
- Notifikasi sistem

### 6.3 Antarmuka Marketplace
[Desain antarmuka marketplace akan ditambahkan di sini]

Marketplace menampilkan produk-produk eco-enzim yang tersedia untuk dibeli, dengan komponen:
- Filter produk berdasarkan kategori
- Daftar produk dengan gambar dan harga
- Keranjang belanja
- Sistem pencarian produk
- Detail produk (ketika dipilih)

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