# SPESIFIKASI KEBUTUHAN DAN PERANCANGAN PERANGKAT LUNAK 

## (EcoZense) 
### Aplikasi Web Eco Enzim

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
## Daftar Isi

1. [Pendahuluan](#1-pendahuluan)
   1. [Tujuan](#11-tujuan)
   2. [Lingkup Masalah](#12-lingkup-masalah)
   3. [Definisi, Akronim dan Singkatan](#13-definisi-akronim-dan-singkatan)
   4. [Aturan Penamaan dan Penomoran](#14-aturan-penamaan-dan-penomoran)
   5. [Referensi](#15-referensi)
   6. [Ikhtisar Dokumen](#16-ikhtisar-dokumen)
2. [Deskripsi Umum](#2-deskripsi-umum)
   1. [Perspektif Produk](#21-perspektif-produk)
   2. [Fungsi Produk](#22-fungsi-produk)
   3. [Karakteristik Pengguna](#23-karakteristik-pengguna)
   4. [Batasan](#24-batasan)
   5. [Rancangan Lingkungan Implementasi](#25-rancangan-lingkungan-implementasi)
3. [Deskripsi Rinci Kebutuhan](#3-deskripsi-rinci-kebutuhan)
   1. [Deskripsi Fungsional](#31-deskripsi-fungsional)
   2. [Use Case Diagram](#32-use-case-diagram)
   3. [Use Case Pembuatan Akun & Pengelolaan Akun](#33-use-case-pembuatan-akun--pengelolaan-akun)
   4. [Use Case Penyetoran Sampah dan Pemberian Poin](#34-use-case-penyetoran-sampah-dan-pemberian-poin)
   5. [Use Case Penukaran Poin dengan Produk atau Sembako](#35-use-case-penukaran-poin-dengan-produk-atau-sembako)
   6. [Use Case Pengelolaan Artikel dan Video Edukasi serta Pemberian Feedback](#36-use-case-pengelolaan-artikel-dan-video-edukasi-serta-pemberian-feedback)
   7. [Use Case Pengelolaan Produk Eco Enzim](#37-use-case-pengelolaan-produk-eco-enzim)
   8. [Use Case Pembuatan dan Pengelolaan Event Eco Enzim](#38-use-case-pembuatan-dan-pengelolaan-event-eco-enzim)
   9. [Use Case Memasukkan Lokasi Bank Sampah](#39-use-case-memasukkan-lokasi-bank-sampah)
   10. [Kebutuhan Non-Fungsional](#310-kebutuhan-non-fungsional)
   11. [Deskripsi Kelas-Kelas](#311-deskripsi-kelas-kelas)
   12. [State Machine Diagram](#312-state-machine-diagram)
   13. [Deskripsi Data](#313-deskripsi-data)
   14. [Perancangan Antarmuka](#314-perancangan-antarmuka)
   15. [Matriks Keterunutan](#315-matriks-keterunutan)

## 1. Pendahuluan  

### 1.1 Tujuan 
Dokumen ini berisi Spesifikasi Kebutuhan Perangkat Lunak (SKPL) untuk Aplikasi Web Eco Enzim (EcoZense). Tujuan dari penulisan dokumen ini adalah untuk memberikan penjelasan menyeluruh mengenai perangkat lunak yang akan dikembangkan, baik dalam bentuk gambaran umum maupun penjelasan detail mengenai fitur dan kebutuhan sistem.  

Pengguna dari dokumen ini meliputi pengembang perangkat lunak yang akan membangun sistem serta pengguna atau klien yang akan menggunakan aplikasi web ini. Selain itu, dokumen ini juga akan menjadi referensi bagi personil-personil yang terlibat dalam proses pengembangan dan implementasi sistem. 

Dokumen SKPPL ini akan digunakan sebagai acuan utama dalam proses pengembangan perangkat lunak dan sebagai bahan evaluasi selama serta setelah pengembangan berlangsung. Dengan adanya dokumen ini, diharapkan pengembangan Aplikasi Web Eco Enzim dapat berjalan dengan terarah, fokus, dan sesuai dengan kebutuhan, serta menghindari potensi ambiguitas, terutama bagi tim pengembang sistem informasi. 

### 1.2 Lingkup Masalah 
Eco Zense (Aplikasi web Eco Enzim) adalah suatu sistem informasi yang dikelola oleh PBL-211. Sistem informasi ini dirancang sebagai pusat informasi dan edukasi yang bertujuan untuk meningkatkan kesadaran masyarakat tentang pentingnya Eco Enzim dalam menjaga lingkungan. Aplikasi ini menyediakan berbagai artikel, tutorial, dan panduan praktis tentang cara pembuatan dan pemanfaatan Eco Enzim serta mengajak masyarakat untuk mengikuti salah satu program yaitu bank sampah. Dengan adanya aplikasi ini, diharapkan lebih banyak orang dapat memahami dan menerapkan konsep Eco Enzim dalam kehidupan sehari-hari guna menciptakan lingkungan yang lebih bersih dan sehat. Sistem informasi ini bisa diakses oleh user, admin, dan contributor. 

### 1.3 Definisi, Akronim dan Singkatan 
Definisi dari istilah yang digunakan pada dokumen ini dibuat berdasarkan hasil terjemahan dari IEEE Std 610.12-1990. 

#### 1.3.1 Masyarakat (Public Users) 
Pengguna umum yang mengakses aplikasi web Eco Enzim untuk mendapatkan informasi, edukasi, dan layanan terkait eco enzim tanpa memiliki hak akses khusus untuk mengelola atau menambahkan konten dalam sistem. 

#### 1.3.2 Admin 
Pengguna dengan hak akses tertinggi yang bertanggung jawab atas pengelolaan sistem, pengaturan pengguna, serta pemantauan dan pemeliharaan aplikasi web Eco Enzim. 

#### 1.3.3 Akronim dan Singkatan
- **SKPPL**: Spesifikasi Kebutuhan dan Perancangan Perangkat Lunak 
- **SRDS**: Software Requirements and Design Specification
- **UML**: Unified Modelling Language 
- **ERD**: Entity Relationship Diagram 
- **DBMS**: Data Base Management System 

### 1.4 Aturan Penamaan dan Penomoran 
Penulisan dokumen SKPL ini menggunakan berbagai macam aturan penamaan dan penomoran yang berbeda-beda untuk beberapa bagian tertentu. Aturan penamaan dan penomoran yang digunakan berdasarkan hal/bagian tersebut adalah seperti yang tercantum pada Tabel 1 berikut ini. 

**Tabel 1. Aturan Penamaan dan Penomoran**

| Hal/Bagian | Aturan penomoran/Penamaan |
|------------|---------------------------|
| Kebutuhan Functional | SKPL-FXX : Menunjukkan kebutuhan fungsional ke-XX |
| Kebutuhan Non Functional | SKPL-NFXX : Menunjukkan kebutuhan non fungsional ke-XX |
| Ringkasan kebutuhan fungsional | SKPL-Fxxx dimana xxx adalah tiga digit bilangan bulat dimulai dari 000 |
| Ringkasan kebutuhan nonfungsional | SKPL-NFxxx dimana xxx adalah tiga digit bilangan bulat dimulai dari 000 |

### 1.5 Referensi 
Daftar dokumen yang digunakan sebagai acuan atau rujukan dalam penyusunan dokumen SKPPL ini adalah sebagai berikut:

- IEEE Std 610.12-1990, IEEE Standard Glossary of Software Engineering Terminology.
- Panduan Penggunaan dan Pengisian Spesifikasi Perangkat Lunak (SKPL) untuk Sistem Informasi Kalibrasi Alat (ITS).
- Panduan Pengisian Spesifikasi Kebutuhan dan Perancangan Perangkat Lunak (SKPPL).
- SKPL untuk Sistem Informasi Student Advisory Center (ITS).

### 1.6 Ikhtisar Dokumen 
- **Bab 1 Pendahuluan**, merupakan pengantar dokumen SKPL yang berisi tujuan penulisan dokumen, lingkup masalah, serta definisi dan istilah yang digunakan. Selain itu, memberikan deskripsi umum mengenai aplikasi web Eco Enzim (EcoZense) sebagai ikhtisar dokumen SKPL. 

- **Bab 2 Deskripsi Global Perangkat Lunak**, mendefinisikan perspektif produk perangkat lunak, termasuk tujuan utama aplikasi web Eco Enzim. Asumsi dan ketergantungan yang digunakan dalam pengembangan sistem informasi EcoZense. 

- **Bab 3 Deskripsi Rinci Kebutuhan**, mendeskripsikan kebutuhan khusus bagi Sistem Informasi EcoZense, yang meliputi kebutuhan antarmuka eksternal, kebutuhan fungsionalitas, kebutuhan performansi, batasan perancangan, atribut sistem perangkat lunak, dan kebutuhan lain dari Sistem Informasi EcoZense.         

## 2. Deskripsi Umum Perangkat Lunak 

### 2.1 Deskripsi Umum Sistem 
EcoZense adalah sebuah sistem informasi berbasis web yang dirancang untuk memberikan informasi yang jelas dan mudah diakses mengenai Eco Enzim serta menyediakan layanan bagi pengguna yang ingin bergabung dalam program bank sampah dan menjadi nasabah. Sistem ini dapat diakses oleh nasabah, pengelola bank sampah, dan admin yang mengelola seluruh aspek informasi dalam aplikasi. 

Pengguna umum dapat mengakses website EcoZense melalui landing page, di mana mereka dapat: 
- Menonton video edukasi mengenai Eco Enzim. 
- Membaca artikel terkait Eco Enzim untuk memperdalam pemahaman mereka. 
- Mendaftar sebagai nasabah bank sampah, yang memungkinkan mereka untuk menyetor sampah dan memperoleh poin sebagai bentuk imbalan. 
- Menukarkan poin yang diperoleh dengan produk Eco Enzim yang dihasilkan dari sampah yang dikumpulkan atau menukarnya dengan sembako. 

Pengelola bank sampah memiliki peran dalam menerima sampah yang disetor oleh nasabah dan memberikan poin berdasarkan jumlah dan jenis sampah yang disetorkan. Selain itu, pengelola dapat mempublikasikan produk Eco Enzim yang tersedia di website, sehingga pengguna dapat mengecek dan membeli produk tersebut secara langsung melalui sistem. 

Admin dalam EcoZense bertanggung jawab untuk: 
- Mengelola seluruh informasi dan edukasi dalam sistem. 
- Mengatur artikel, video edukasi, dan promosi terkait Eco Enzim. 
- Mengelola data pengguna, termasuk proses registrasi dan login. 
- Mengelola informasi terkait kegiatan dan event yang berhubungan dengan EcoZense. 

Melalui sistem EcoZense, diharapkan masyarakat dapat dengan mudah mengakses informasi mengenai Eco Enzim serta berpartisipasi dalam program bank sampah, yang bertujuan untuk mengurangi limbah dan menciptakan manfaat ekonomi serta lingkungan. 

### 2.2 Proses Bisnis Sistem 
Berikut adalah alur utama dalam sistem EcoZense: 

1. **Pendaftaran Nasabah**: Pengguna umum dapat melakukan registrasi untuk bergabung sebagai nasabah bank sampah. 
2. **Penyetoran Sampah**: Nasabah menyetor sampah kepada pengelola bank sampah yang akan mengevaluasi dan memberikan poin sesuai dengan jenis dan jumlah sampah yang dikumpulkan. 
3. **Penukaran Poin**: Poin yang telah dikumpulkan dapat digunakan untuk mendapatkan produk Eco Enzim atau sembako. 
4. **Publikasi Produk**: Pengelola bank sampah dapat mengunggah informasi produk Eco Enzim yang tersedia. 
5. **Edukasi dan Promosi**: Admin mengelola dan memperbarui konten edukasi terkait Eco Enzim serta mempublikasikan event atau promosi terkait. 
6. **Manajemen Pengguna**: Admin mengelola akun nasabah dan aktivitas dalam sistem. 

**Activity Diagram:**  

![Gambar 1. Diagram Aktivitas Pada Aplikasi Web Eco Enzim](diagram_aktivitas.png)

### 2.3 Karakteristik Pengguna

**Tabel 2. Karakteristik Pengguna**

| Pengguna | Tanggung Jawab | Hak Akses pada Aplikasi | Kemampuan yang Harus Dimiliki |
|----------|----------------|-------------------------|------------------------------|
| Nasabah | - Menyetor sampah.<br>- Mengakses artikel dan dapat memberikan feedback.<br>- Membeli produk eco-enzim. | - Akses ke landing page<br>- Akses ke artikel<br>- Dapat memberikan feedback<br>- Penyetoran sampah<br>- Penukaran poin | - Dasar penggunaan web<br>- Pemahaman tentang bank sampah<br>- Pemahaman tentang eco enzim |
| Pengelola Bank Sampah | - Mengelola bank sampah<br>- Mengelola produk eco-enzim dan menjualnya pada website.<br>- Memberikan poin kepada nasabah yang telah menyetor sampah. | - Akses ke dashboard pengelola | - Operasi sistem bank sampah<br>- Manajemen data |
| Admin | - Mengelola artikel.<br>- Mengelola data pengguna.<br>- Mengelola promosi kegiatan dan event. | - Akses penuh pada sistem | - Pemahaman sistem informasi<br>- Manajemen konten<br>- Manajemen data |

### 2.4 Batasan 
- Sistem hanya dapat diakses melalui platform web, belum tersedia dalam bentuk aplikasi mobile. 
- Penyetoran sampah hanya dapat dilakukan di lokasi bank sampah yang terdaftar dalam sistem. 
- Produk Eco Enzim dan sembako yang tersedia bergantung pada stok di masing-masing bank sampah. 
- Sistem ini hanya mendukung transaksi non-tunai untuk penukaran poin. 
- Informasi yang tersedia dalam sistem hanya terbatas pada konten yang telah diverifikasi oleh admin. 

### 2.5 Rancangan Lingkungan Implementasi 
- **Sistem Operasi**: Windows Server 
- **DBMS**: MySQL 
- **Development Tools**: VS Code, Git, GitHub 
- **Filing System**: Google Cloud Storage 
- **Bahasa Pemrograman**: Backend: PHP/Laravel, FrontEnd: React.js 

## 3. Deskripsi Rinci Kebutuhan 

### 3.1 Deskripsi Fungsional 
- **SKPL-F01** pengguna dapat membuat akun sebagai nasabah atau pengelola bank sampah dan admin dapat mengelola akun pengguna 
- **SKPL-F02** nasabah dapat menyetor sampah dan mendapatkan poin, pengelola bank sampah dapat menilai dan memberikan poin atas penyetoran sampah. 
- **SKPL-F03** nasabah dapat menukar poin dengan produk Eco Enzim atau sembako. 
- **SKPL-F04** admin dapat menambahkan dan mengedit artikel serta video edukasi tentang Eco Enzim dan pengguna dapat membaca dan memberikan feedback pada artikel. 
- **SKPL-F05** pengelola bank sampah dapat mengunggah dan memperbaharui daftar produk Eco Enzim yang tersedia. 
- **SKPL-F06** admin dapat membuat dan mengelola event terkait program Eco Enzim. 
- **SKPL-F07** pengelola bank sampah dapat menginput lokasi bank sampah. 

### 3.2 Use Case Diagram 

![Use Case Diagram](usecase_diagram.png)

### 3.3 Use Case Pembuatan Akun & Pengelolaan Akun  

**Tabel 3. Use Case Pembuatan Akun & Pengelolaan Akun**

| Identifikasi | Deskripsi |
|--------------|-----------|
| **Nomor** | PBL/USECASE/01 |
| **Nama** | Pengguna dapat membuat akun sebagai nasabah, dan admin dapat mengelola akun pengguna |
| **Deskripsi** | Pengguna dapat melakukan pendaftaran sebagai nasabah, sementara admin memiliki hak untuk mengelola akun pengguna. |
| **Aktor** | Nasabah, Admin |
| **Kondisi awal** | Belum mempunyai akun / Admin ingin mengelola akun pengguna. |
| **Kondisi akhir** | Akun pengguna berhasil dibuat atau dikelola oleh admin. |

**Skenario Utama**

*Pembuatan akun oleh pengguna*
1. Pengguna membuka halaman pendaftaran.  
2. Sistem menampilkan formulir pendaftaran.  
3. Pengguna mengisi data diri (nama, email, password, dll.).  
4. Pengguna menekan tombol "Daftar".  
5. Sistem memvalidasi data dan menyimpan akun jika inputan valid.  
6. Sistem menampilkan pesan sukses bahwa akun berhasil dibuat. 

*Pengelolaan akun oleh admin*
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
### 3.4 Use Case Penyetoran Sampah dan Pemberian Poin

**Tabel 4. Use Case Penyetoran Sampah dan Pemberian Poin**

| Identifikasi | Deskripsi |
|--------------|-----------|
| **Nomor** | PBL/USECASE/02 |
| **Nama** | Penyetoran Sampah dan Pemberian Poin |
| **Deskripsi** | Nasabah dapat menyetor sampah dan mendapatkan poin, pengelola bank sampah dapat menilai dan memberikan poin atas penyetoran sampah |
| **Aktor** | Nasabah dan Pengelola bank sampah |
| **Kondisi awal** | Nasabah melakukan penyetoran sampah |
| **Kondisi akhir** | Sampah telah disetor dan poin dapat diberikan kepada nasabah dari pengelola bank sampah |

**Skenario Utama**

1. Nasabah menyetor sampah secara langsung kepada pengelola bank sampah.
2. Pengelola bank sampah menerima sampah, kemudian menimbang sampah.
3. Timbangan sampah dikonversikan menjadi poin pada aplikasi.
4. Poin diberikan kepada Nasabah oleh Pengelola bank sampah.
5. Nasabah berhasil menerima poin.

**Skenario Alternatif**

3a. Aplikasi tidak dapat mengonversi poin.

### 3.5 Use Case Penukaran Poin dengan Produk atau Sembako

**Tabel 5. Use Case Penukaran Poin dengan Produk atau Sembako**

| Identifikasi | Deskripsi |
|--------------|-----------|
| **Nomor** | PBL/USECASE/03 |
| **Nama** | Penukaran Poin dengan Produk atau Sembako |
| **Deskripsi** | Nasabah dapat menukar poin yang telah dikumpulkan dengan produk Eco Enzim atau sembako melalui aplikasi |
| **Aktor** | Nasabah |
| **Kondisi awal** | Nasabah memiliki akun dan masuk ke dalam sistem dan Nasabah memiliki saldo poin yang cukup untuk ditukarkan |
| **Kondisi akhir** | Produk Eco Enzim atau sembako berhasil ditukar dan poin nasabah berkurang sesuai jumlah yang digunakan |

**Skenario Utama**

1. Nasabah masuk ke dalam aplikasi web Eco Enzim.
2. Nasabah memilih menu "Tukar Poin".
3. Sistem menampilkan daftar produk Eco Enzim dan sembako beserta jumlah poin yang diperlukan.
4. Nasabah memilih produk yang ingin ditukar.
5. Sistem menampilkan detail penukaran, termasuk jumlah poin yang akan digunakan.
6. Nasabah mengonfirmasi penukaran.
7. Sistem memverifikasi ketersediaan stok dan saldo poin nasabah.
8. Jika poin cukup dan stok tersedia, sistem mengurangi saldo poin nasabah dan memproses penukaran.
9. Sistem menampilkan notifikasi bahwa penukaran berhasil dan memberikan informasi pengambilan/pengiriman produk.

**Skenario Alternatif**

1a. Jika saldo poin nasabah tidak mencukupi → Sistem menampilkan pesan bahwa poin tidak cukup untuk melakukan penukaran.  
3a. Jika stok produk habis → Sistem menampilkan notifikasi bahwa produk tidak tersedia dan meminta nasabah memilih produk lain.  
7a. Jika terjadi kesalahan saat proses penukaran → Sistem membatalkan transaksi dan mengembalikan poin jika sudah terpotong.  
7b. Sistem menampilkan pesan kesalahan, meminta pengguna mencoba lagi atau memberikan opsi untuk mereset kata sandi jika lupa.  
8a. Kata sandi baru tidak memenuhi kebijakan yang diterapkan oleh sistem (misalnya panjang minimal, tidak ada huruf besar, tidak ada angka).  
8b. Sistem menampilkan pesan kesalahan yang menjelaskan mengapa kata sandi baru tidak valid, dan meminta pengguna untuk memperbaiki input.

### 3.6 Use Case Pengelolaan Artikel dan Video Edukasi serta Pemberian Feedback

**Tabel 6. Use Case Pengelolaan Artikel dan Video Edukasi serta Pemberian Feedback**

| Identifikasi | Deskripsi |
|--------------|-----------|
| **Nomor** | PBL/USECASE/04 |
| **Nama** | Pengelolaan Artikel dan Video Edukasi serta Pemberian Feedback |
| **Deskripsi** | Admin mengelola (menambah dan mengedit) artikel dan video edukasi. Pengguna umum dapat membaca artikel dan memberikan komentar atau feedback |
| **Aktor** | Admin dan pengguna umum |
| **Kondisi awal** | Admin telah login ke dalam sistem. Pengguna umum mengakses halaman artikel tanpa perlu login |
| **Kondisi akhir** | Artikel atau video edukasi berhasil ditambahkan atau diedit oleh Admin. Komentar atau feedback berhasil disimpan dan ditampilkan pada artikel oleh Pengguna Umum |

**Skenario Utama**

*Admin:*
1. Admin login dan diarahkan ke halaman manajemen artikel dan video edukasi
2. Sistem menampilkan daftar artikel dan video edukasi.
3. Admin memilih "Tambah Artikel/Video".
4. Sistem menampilkan form tambah artikel/video.
5. Admin mengisi judul, deskripsi, dan konten (atau mengunggah video), lalu menekan "Simpan".
6. Sistem menyimpan data dan menampilkan pesan sukses.
7. Admin dapat mengedit atau menghapus artikel/video jika diperlukan

*Pengguna umum:*
1. Pengguna membuka halaman Artikel dan Video Edukasi.
2. Sistem menampilkan daftar artikel dan video.
3. Pengguna memilih artikel untuk dibaca.
4. Sistem menampilkan isi artikel.
5. Pengguna memberikan komentar atau feedback dan menekan "Kirim".
6. Sistem menyimpan komentar dan menampilkan pesan sukses.

**Skenario Alternatif**

*Admin:*
1a. Admin salah memasukkan username atau password, sistem menampilkan pesan kesalahan login.  
4a. Admin tidak mengisi data artikel/video dengan lengkap, sistem meminta melengkapi data sebelum menyimpan.  
4b. Admin mengunggah video dengan format atau ukuran tidak sesuai, sistem menampilkan pesan gagal unggah.  
4c. Terjadi kegagalan server saat menyimpan data, sistem menampilkan pesan kesalahan dan menyarankan mencoba lagi.  
6a. Admin memilih untuk menghapus artikel/video, sistem meminta konfirmasi sebelum menghapus.

*Pengguna umum:*
3a. Pengguna memilih artikel yang tidak tersedia atau sudah dihapus, sistem menampilkan pesan bahwa artikel tidak ditemukan.  
5a. Pengguna mengisi komentar dengan teks kosong atau karakter terlarang, sistem menampilkan pesan kesalahan dan meminta pengguna memperbaiki komentar.  
5b. Terjadi masalah koneksi atau server saat mengirim komentar, sistem menampilkan pesan gagal mengirim komentar dan menyarankan mencoba lagi.

### 3.7 Use Case Pengelolaan Produk Eco Enzim

**Tabel 7. Use Case Pengelolaan Produk Eco Enzim**

| Identifikasi | Deskripsi |
|--------------|-----------|
| **Nomor** | PBL/USECASE/05 |
| **Nama** | Pengelolaan Produk Eco Enzim |
| **Deskripsi** | Pengelola bank sampah dapat mengunggah dan memperbaharui daftar produk Eco Enzim yang tersedia |
| **Aktor** | Pengelola bank sampah |
| **Kondisi awal** | Pengelola bank sampah login ke dalam sistem dan melihat jumlah stok |
| **Kondisi akhir** | Pengelola bank sampah mengedit jumlah produk Eco Enzyme sesuai jumlah yang tersedia |

**Skenario Utama**

1. Setelah login, pengelola bank sampah masuk ke halaman barang Eco Enzyme.
2. Pengelola bank sampah melihat jumlah stok Eco Enzyme yang tersedia.
3. Pengelola bank sampah mencari produk Eco Enzyme di halaman web.
4. Pengelola bank sampah merubah jumlah produk Eco Enzyme sesuai jumlah yang tersedia.
5. Pengelola bank sampah menekan tombol "Simpan" untuk merubah jumlahnya.
6. Sistem merubah jumlah sesuai yang di ubah pengelola bank sampah.
7. Pengelola bank sampah dapat mengurangi dan menambah jumlah produk Eco Enzyme.

**Skenario Alternatif**

1a. Pengelola bank sampah salah memasukan username atau password, sistem menampilkan password salah.  
4a. Jika pengelola bank sampah meletakkan huruf atau simbol di kolom jumlah stok, sistem akan gagal menyimpan data yang di perbarui.  
4b. Pengelola bank sampah tidak melengkapi data, sistem akan menampilkan harap lengkapi data.  
6a. Jika terjadi kegagalan sistem saat menyimpan data, sistem akan menampilkan gagal menyimpan dan harap coba lagi.

### 3.8 Use Case Pembuatan dan Pengelolaan Event Eco Enzim

**Tabel 8. Use Case Pembuatan dan Pengelolaan Event Eco Enzim**

| Identifikasi | Deskripsi |
|--------------|-----------|
| **Nomor** | PBL/USECASE/06 |
| **Nama** | Pembuatan dan Pengelolaan Event Eco Enzim |
| **Deskripsi** | Admin dapat membuat dan mengelola event eco enzim |
| **Aktor** | Admin |
| **Kondisi awal** | Admin telah login ke sistem |
| **Kondisi akhir** | Admin berhasil membuat atau mengelola event eco enzim |

**Skenario Utama**

1. Setelah login, admin diarahkan ke halaman manajemen event.
2. Sistem menampilkan daftar event yang sudah ada.
3. Admin memilih opsi untuk membuat event baru.
4. Admin mengisi detail event (nama, deskripsi, tanggal, lokasi, dll.).
5. Admin menekan tombol "Simpan" untuk menyimpan event.
6. Sistem menampilkan pesan sukses bahwa event telah tersimpan.
7. Admin dapat mengedit atau menghapus event yang sudah dibuat jika diperlukan.

**Skenario Alternatif**

1a. Admin memasukkan username dan password yang salah dan tidak dapat mengakses halaman manajemen event.  
3a. Admin memilih untuk mengedit event yang sudah ada dan memperbarui informasinya sebelum menyimpan.  
3b. Admin memilih untuk menghapus event yang sudah ada, dan sistem meminta konfirmasi sebelum menghapusnya.  
5a. Admin tidak mengisi data event secara lengkap, sistem menampilkan pesan kesalahan dan meminta admin melengkapi data sebelum menyimpan.

### 3.9 Use Case Memasukkan Lokasi Bank Sampah

**Tabel 9. Use Case Memasukkan Lokasi Bank Sampah**

| Identifikasi | Deskripsi |
|--------------|-----------|
| **Nomor** | PBL/USECASE/07 |
| **Nama** | Memasukkan Lokasi Bank Sampah |
| **Deskripsi** | Pendaftar pengelola bank sampah dapat memasukkan lokasi yang dikelolanya |
| **Aktor** | Pengelola bank sampah |
| **Kondisi awal** | User ingin mendaftar menjadi Pengelola bank sampah |
| **Kondisi akhir** | User berhasil memasukkan lokasi dan terdaftar sebagai pengelola bank sampah |

**Skenario Utama**

1. User mengakses halaman pendaftaran pengelola bank sampah.
2. User mengisi formulir pendaftaran dengan informasi yang diperlukan, termasuk nama, alamat, dan lokasi bank sampah.
3. User mengklik tombol "Kirim" untuk mengirimkan data.
4. Sistem memvalidasi data yang dimasukkan.
5. Jika data valid, sistem menyimpan informasi lokasi bank sampah dan mengonfirmasi pendaftaran kepada user.

**Skenario Alternatif**

3a. Jika data yang dimasukkan tidak valid, sistem menampilkan pesan kesalahan dan meminta user untuk memperbaiki informasi yang salah.  
3b. Jika user tidak mengisi semua kolom yang wajib, sistem menampilkan pesan peringatan dan meminta user untuk melengkapi informasi yang diperlukan.  
5a. Jika lokasi yang dimasukkan sudah terdaftar sebelumnya, sistem memberikan notifikasi bahwa lokasi tersebut sudah ada dan meminta user untuk memasukkan lokasi yang berbeda.

### 3.10 Deskripsi Kebutuhan Non Fungsional

**Tabel 10. Kebutuhan Non Fungsional**

| SKPL-Id | Parameter | Kebutuhan |
|---------|-----------|-----------|
| SKPL-NF01 | Security | - Sistem harus memiliki fitur otentikasi dan otorisasi pengguna.<br>- Data pengguna harus dienkripsi. |
| SKPL-NF02 | Performance | - Waktu respon sistem harus kurang dari 3 detik pada setiap permintaan pengguna.<br>- Sistem harus mampu menangani minimal 1000 pengguna secara bersamaan. |
| SKPL-NF03 | Availability | - Sistem harus memiliki uptime minimal 90% dalam setahun. |
| SKPL-NF04 | Portability | - Sistem harus dapat berjalan di browser desktop. |
| SKPL-NF05 | User friendly | - Antarmuka pengguna harus intuitif dan mudah digunakan oleh masyarakat umum. |

### 3.11 Deskripsi Kelas-Kelas

#### 3.11.1 Class Diagram

#### 3.11.2 Class <nama class>

#### 3.11.3 Class <nama class> dan seterusnya

### 3.12 State Machine Diagram

### 3.13 Deskripsi Data

#### 3.13.1 Entity-Relationship Diagram

#### 3.13.2 Daftar Tabel

#### 3.13.3 Struktur Tabel <nama tabel>

#### 3.13.4 Struktur Tabel <nama tabel> dan seterusnya

#### 3.13.5 Skema Relasi Antar Tabel

### 3.14 Perancangan Antarmuka

#### 3.14.1 Antarmuka <nama antarmuka>

#### 3.14.2 Antarmuka <nama antarmuka> dan seterusnya

### 3.15 Matriks Keterunutan