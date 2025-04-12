# SPESIFIKASI KEBUTUHAN DAN PERANCANGAN PERANGKAT LUNAK

## (EcoZense) Aplikasi Web Eco Enzim

### Disusun oleh:
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
1. Pendahuluan
   1.1 Tujuan
   1.2 Lingkup Masalah
   1.3 Definisi, Akronim dan Singkatan
      1.3.1 Definisi
      1.3.2 Akronim
   1.4 Aturan Penamaan dan Penomoran
   1.5 Referensi
2. Deskripsi Umum Perangkat Lunak
   2.1 Perspektif Produk
   2.2 Proses Bisnis Sistem
   2.3 Karakteristik Pengguna
   2.4 Batasan
   2.5 Rancangan Lingkungan Implementasi
      2.5.1 Sistem Operasi
      2.5.2 DBMS
      2.5.3 Alat Pengembangan
      2.5.4 Sistem Penyimpanan
      2.5.5 Bahasa dan Framework
3. Deskripsi Rinci Kebutuhan
   3.1 Deskripsi Fungsional
   3.2 Use Case Diagram
   3.3 Use Case Pemilih Mengganti Kata Sandi
      3.3.1 Skenario
4. Perancangan Antarmuka
5. Matriks Keterunutan
   5.1 Kebutuhan Fungsional vs Use Case
   5.2 Kebutuhan Non-Fungsional vs Use Case

## 1. Pendahuluan

### 1.1 Tujuan
Dokumen ini berisi Spesifikasi Kebutuhan Perangkat Lunak (SKPL) untuk Aplikasi Web Eco Enzim (EcoZense). Tujuan dari penulisan dokumen ini adalah untuk memberikan penjelasan menyeluruh mengenai perangkat lunak yang akan dikembangkan, baik dalam bentuk gambaran umum maupun penjelasan detail mengenai fitur dan kebutuhan sistem. 

Pengguna dari dokumen ini meliputi pengembang perangkat lunak yang akan membangun sistem serta pengguna atau klien yang akan menggunakan aplikasi web ini. Selain itu, dokumen ini juga akan menjadi referensi bagi personel yang terlibat dalam proses pengembangan dan implementasi sistem.  

Dokumen SKPPL ini akan digunakan sebagai acuan utama dalam proses pengembangan perangkat lunak dan sebagai bahan evaluasi selama dan setelah pengembangan berlangsung. Dengan adanya dokumen ini, diharapkan pengembangan Aplikasi Web Eco Enzim dapat berjalan dengan terarah, fokus, dan sesuai dengan kebutuhan, serta menghindari potensi ambiguitas, terutama bagi tim pengembang sistem informasi.  

### 1.2 Lingkup Masalah
EcoZense merupakan sebuah sistem informasi berbasis web yang dikembangkan oleh tim PBL-211 sebagai pusat edukasi dan marketplace produk Eco Enzim. Latar belakang pengembangan aplikasi ini didasari oleh masih rendahnya kesadaran dan pemahaman masyarakat terhadap pentingnya pemanfaatan Eco Enzim dalam menjaga kelestarian lingkungan. 

Permasalahan lingkungan seperti penumpukan sampah organik dan kurangnya pengelolaan limbah rumah tangga menjadi salah satu faktor utama yang mendorong perlunya sebuah platform yang mampu mengedukasi sekaligus memfasilitasi tindakan nyata masyarakat. Meskipun Eco Enzim memiliki banyak manfaat bagi lingkungan, akses terhadap informasi dan produk terkait masih terbatas dan belum terorganisasi secara efektif. 

EcoZense hadir untuk menjawab permasalahan tersebut dengan menyediakan konten informatif berupa artikel, tutorial, dan panduan praktis mengenai pembuatan serta pemanfaatan Eco Enzim. Aplikasi ini juga terintegrasi dengan program bank sampah, yang memungkinkan masyarakat untuk berpartisipasi dalam penyetoran sampah sekaligus mendapatkan produk Eco Enzim yang dikelola oleh bank sampah. 

Selain sebagai pusat informasi, aplikasi ini berfungsi sebagai marketplace yang mempertemukan bank sampah dan masyarakat dalam kegiatan jual beli produk Eco Enzim. Dengan demikian, sistem ini tidak hanya meningkatkan kesadaran, tetapi juga mendorong praktik ramah lingkungan secara langsung. 

Aplikasi EcoZense dirancang untuk diakses oleh tiga kategori pengguna, yaitu admin, nasabah, dan bank sampah, dengan fungsi dan hak akses yang disesuaikan dengan perannya masing-masing. Diharapkan dengan adanya aplikasi ini, masyarakat dapat lebih mudah memahami dan menerapkan konsep Eco Enzim dalam kehidupan sehari-hari untuk menciptakan lingkungan yang lebih bersih, sehat, dan berkelanjutan. 

### 1.3 Definisi, Akronim dan Singkatan
Definisi dari istilah yang digunakan pada dokumen ini dibuat berdasarkan hasil terjemahan dari IEEE Std 610.12-1990.  

#### Definisi
- **Nasabah**: Pengguna umum dapat mengakses aplikasi web Eco Enzim untuk memperoleh informasi, edukasi, dan layanan terkait ecoenzim. Sebagai nasabah, mereka memiliki hak untuk menyetor sampah secara langsung ke bank sampah dan menerima poin yang dapat digunakan untuk membeli produk ecoenzim atau sembako.
- **Admin**: Pengguna dengan hak akses tertinggi yang bertanggung jawab atas pengelolaan sistem, pengaturan pengguna, serta pemantauan dan pemeliharaan aplikasi web Eco Enzim. 
- **Pengelola bank sampah**: Pengguna ini memiliki akses ke aplikasi Eco Enzim dengan kewenangan mengelola bank sampah, memasukkan lokasi, mempublikasikan produk, serta memberikan poin kepada nasabah. 
- **Pengguna umum (guest)**: Pengguna ini hanya memiliki akses terhadap artikel atau event, pengguna ini tidak dapat membeli produk di marketplace.

#### Akronim
- SKPPL: Spesifikasi Kebutuhan dan Perancangan Perangkat Lunak 
- SRDS: Software Requirements and Design Specification (SRDS) 
- UML: Unified Modelling Language 
- ERD: Entity Relationship Diagram 
- DBMS: DataBase Management System 

### 1.4 Aturan Penamaan dan Penomoran
Penulisan dokumen SKPL ini menggunakan berbagai aturan penamaan dan penomoran yang berbeda untuk bagian-bagian tertentu. Aturan penamaan dan penomoran yang digunakan disesuaikan dengan hal atau bagian tertentu sebagaimana tercantum dalam Tabel 1.

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
1. Bab 1 Pendahuluan: Pengantar dokumen SKPL yang berisi tujuan penulisan dokumen, lingkup masalah, serta definisi dan istilah yang digunakan. Selain itu, memberikan deskripsi umum mengenai aplikasi web Eco Enzim (EcoZense) sebagai ikhtisar dokumen SKPL. 
2. Bab 2 Deskripsi Global Perangkat Lunak: Mendefinisikan perspektif produk perangkat lunak, termasuk tujuan utama aplikasi web Eco Enzim. Asumsi dan ketergantungan yang digunakan dalam pengembangan sistem informasi EcoZense. 
3. Bab 3 Deskripsi Rinci Kebutuhan: Mendeskripsikan kebutuhan khusus bagi Sistem Informasi EcoZense, yang meliputi kebutuhan antarmuka eksternal, kebutuhan fungsionalitas, kebutuhan performansi, batasan perancangan, atribut sistem perangkat lunak, dan kebutuhan lain dari Sistem Informasi EcoZense.  

## 2. Deskripsi Umum Perangkat Lunak

### 2.1 Deskripsi Umum Sistem
EcoZense adalah sebuah sistem informasi berbasis web yang dirancang untuk memberikan informasi yang jelas dan mudah diakses mengenai ecoenzim, serta menyediakan layanan bagi pengguna yang ingin berpartisipasi dalam program bank sampah dan menjadi nasabah. Sistem ini dapat diakses oleh pengguna umum (guest), nasabah, pengelola bank sampah, dan admin yang mengelola seluruh aspek informasi dalam aplikasi.  

Pengguna umum dapat mengakses website EcoZense melalui landing page, di mana mereka dapat:  
- Menonton video edukasi mengenai ecoenzim
- Membaca artikel terkait ecoenzin untuk memperdalam pemahaman mereka
- Mengikuti Event terkait ecoenzim dalam segala bentuk
- Mendaftar diri untuk menjadi nasabah

Pengguna umum (guest) yang telah terverifikasi sebagai nasabah dapat mengakses website dengan fitur yang sama seperti pengguna umum. Namun, sebagai nasabah, mereka dapat menyetor sampah ke bank sampah dan memperoleh poin yang dapat ditukarkan untuk membeli produk ecoenzim.

Pengelola bank sampah memiliki peran dalam menerima sampah yang disetor oleh nasabah dan memberikan poin berdasarkan berat sampah yang disetorkan. Selain itu, pengelola dapat mempublikasikan produk Eco Enzim yang tersedia di website, sehingga pengguna dapat mengecek dan membeli produk tersebut secara langsung melalui sistem.  

Admin dalam EcoZense bertanggung jawab untuk: 	 
- Mengelola seluruh informasi dan materi edukasi dalam sistem
- Mengatur artikel, video edukasi, dan promosi terkait ecoenzim
- Mengelola data pengguna, termasuk proses registrasi dan login
- Mengelola informasi terkait kegiatan dan event yang berhubungan dengan EcoZense

Melalui sistem EcoZense, diharapkan masyarakat dapat dengan mudah mengakses informasi mengenai ecoenzim serta berpartisipasi dalam program bank sampah, yang bertujuan untuk mengurangi limbah, sekaligus menciptakan manfaat ekonomi dan lingkungan.  

### 2.2 Proses Bisnis Sistem
Berikut merupakan alur utama dalam sistem EcoZense:  
1. Pendaftaran Nasabah: Pengguna umum dapat melakukan registrasi untuk bergabung sebagai nasabah bank sampah
2. Penyetoran Sampah: Nasabah menyetorkan sampah kepada pengelola bank sampah, yang kemudian akan mengevaluasi dan memberikan poin sesuai jenis dan jumlah sampah yang dikumpulkan
3. Penukaran Poin: Poin yang telah dikumpulkan dapat ditukarkan dengan produk Eco Enzim atau sembako
4. Publikasi Produk: Pengelola bank sampah dapat memublikasikan informasi produk Eco Enzim yang tersedia
5. Edukasi dan Promosi: Admin mengelola dan memperbarui konten edukasi terkait Eco Enzim, serta memublikasikan event atau promosi yang berhubungan
6. Manajemen Pengguna: Admin bertanggung jawab dalam pengelolaan akun nasabah serta aktivitas pengguna dalam sistem

### 2.3 Karakteristik Pengguna

| Pengguna | Tanggung Jawab | Hak Akses pada Aplikasi | Kemampuan yang Harus Dimiliki |
|----------|---------------|-------------------------|-----------------------------|
| Nasabah | - Menyetor sampah<br>- Mengakses artikel dan dapat memberikan feedback<br>- Membeli produk eco-enzim | - Akses ke landing page<br>- Akses ke artikel<br>- Akses ke event<br>- Akses untuk memberikan feedback<br>- Akses untuk membeli produk eco enzim/sembako | - Dasar penggunaan web<br>- Pemahaman tentang bank sampah<br>- Pemahaman tentang eco enzim |
| Pengelola Bank Sampah | - Mengelola bank sampah<br>- Mengelola produk eco-enzim dan menjualnya pada website<br>- Memberikan poin kepada nasabah yang telah menyetor sampah | - Akses ke dashboard pengelola bank sampah<br>- Akses Menjual produk eco enzim<br>- Akses untuk memberi poin kepada nasabah<br>- Akses untuk menginput lokasi | - Operasi sistem bank sampah<br>- Manajemen data |
| Admin | - Mengelola artikel<br>- Mengelola data pengguna<br>- Mengelola promosi kegiatan dan event | - Akses untuk mengelola artikel<br>- Akses untuk create artikel<br>- Akses untuk mempromosi kegiatan dan event<br>- Akses mengelola data user<br>- Akses memverifikasi pengajuan pengguna umum menjadi nasabah dan nasabah menjadi bank sampah | - Pemahaman sistem informasi<br>- Manajemen konten<br>- Manajemen data |

### 2.4 Batasan
1. Sistem hanya dapat diakses melalui platform web, belum tersedia dalam bentuk aplikasi mobile
2. Penyetoran sampah hanya dapat dilakukan di lokasi bank sampah yang terdaftar dalam sistem
3. Produk Eco Enzim dan sembako yang tersedia bergantung pada stok di masing-masing bank sampah
4. Sistem ini hanya mendukung transaksi non-tunai untuk penukaran poin
5. Informasi yang tersedia dalam sistem hanya terbatas pada konten yang telah diverifikasi oleh admin

### 2.5 Rancangan Lingkungan Implementasi

#### Sistem Operasi
- Windows Server untuk server
- Mendukung kestabilan layanan web
- Kompatibel dengan perangkat lunak pengembangan

#### DBMS
- MySQL sebagai sistem manajemen basis data
- Open-source dan handal
- Menyimpan data pengguna, transaksi, produk, dan log

#### Alat Pengembangan
- Visual Studio Code (IDE)
- Git (version control)
- GitHub (repositori)

#### Sistem Penyimpanan
- Google Cloud Storage
- Keandalan tinggi
- Keamanan dan skalabilitas

#### Bahasa dan Framework
- Backend: PHP dengan Laravel
- Frontend: Vue.js dan Tailwind

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
- Pengguna dapat melakukan pendaftaran sebagai nasabah, sementara admin memiliki hak untuk mengelola akun pengguna.
- Aktor
- Nasabah, Admin
- Kondisi awal
- Belum mempunyai akun / Admin ingin mengelola akun pengguna.
- Kondisi akhir
- Akun pengguna berhasil dibuat atau dikelola oleh admin.
- Skenario Utama
- Pembuatan akun oleh pengguna
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
- Nasabah dapat menyetor sampah dan mendapatkan poin, pengelola bank sampah dapat menilai dan memberikan poin atas penyetoran sampah
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

## 4. Perancangan Antarmuka

### Antarmuka <nama antarmuka> dan seterusnya 

 

## 5. Matriks Keterunutan

### 5.1 Kebutuhan Fungsional vs Use Case
| Kebutuhan | UC-01 | UC-02 | UC-03 | UC-04 | UC-05 | UC-06 | UC-07 |
|-----------|-------|-------|-------|-------|-------|-------|-------|
| SKPL-F01 | - | - | - | - | - | - | X |
| SKPL-F02 | - | - | - | X | - | - | - |
| SKPL-F03 | - | - | - | - | - | X | - |
| SKPL-F04 | X | - | - | - | - | - | - |
| SKPL-F05 | X | - | - | - | - | - | - |
| SKPL-F07 | - | X | - | - | - | - | - |
| SKPL-F08 | - | X | - | - | - | - | - |
| SKPL-F09 | - | - | X | - | - | - | - |
| SKPL-F010 | - | - | X | - | - | - | - |
| SKPL-F011 | - | - | X | - | - | - | - |
| SKPL-F012 | - | - | X | - | - | - | - |
| SKPL-F013 | - | - | X | - | - | - | - |
| SKPL-F014 | - | - | X | - | - | - | - |
| SKPL-F015 | - | - | X | - | - | - | - |
| SKPL-F016 | - | - | - | X | - | - | - |
| SKPL-F017 | - | - | - | X | - | - | - |
| SKPL-F018 | - | - | - | - | - | - | X |
| SKPL-F019 | - | - | - | - | - | - | X |
| SKPL-F020 | - | - | - | - | X | - | - |
| SKPL-F021 | - | - | - | - | X | - | - |
| SKPL-F022 | - | - | - | - | X | - | - |
| SKPL-F023 | - | X | - | - | - | - | - |
| SKPL-F024 | - | X | - | - | - | - | - |
| SKPL-F025 | - | X | - | - | - | - | - |
| SKPL-F026 | - | - | - | - | - | - | X |
| SKPL-F027 | - | - | - | X | - | - | - |
| SKPL-F028 | - | - | - | X | - | - | - |
| SKPL-F029 | - | - | - | - | - | X | - |
| SKPL-F030 | - | - | - | - | - | X | - |
| SKPL-F031 | - | - | - | - | - | - | X |
| SKPL-F032 | X | - | - | - | - | - | - |

### 5.2 Kebutuhan Non-Fungsional vs Use Case
| Kebutuhan | UC-01 | UC-02 | UC-03 | UC-04 | UC-05 | UC-06 | UC-07 |
|-----------|-------|-------|-------|-------|-------|-------|-------|
| SKPL-NF01 | X | X | X | X | X | X | X |
| SKPL-NF02 | X | X | X | X | X | X | X |
| SKPL-NF03 | X | X | X | X | X | X | X |
| SKPL-NF04 | X | X | X | X | X | X | X |
| SKPL-NF05 | X | X | X | X | X | X | X |