# Rencana Pelaksanaan Proyek (RPP)

## Identitas Proyek
- **Nomor ID**: PBL TRPL - 211
- **Pengusul Proyek**: Maria, S.ST., M.Sn
- **Manajer proyek**: Alena Uperiati, S.T, M.Cs
- **Judul Proyek**: Aplikasi Web Eco Enzim
- **Luaran**:
  - Aplikasi Web EcoZense
  - Dokumen Perancangan
  - Manual Book / Video Penggunaan
  - Dokumen Testing
  - Poster Aplikasi
  - BAST
  - Draft HKI
- **Sponsor**: -
- **Biaya**: -
- **Klien/Pelanggan**: Maria S.ST., M.Sn
- **Waktu**: 1 Semester (14 Minggu)

## 1. Ruang Lingkup
EcoZense adalah sebuah sistem informasi berbasis web yang dikembangkan oleh tim PBL-211 sebagai pusat edukasi dan marketplace produk Eco Enzim. Pengembangan aplikasi ini didorong oleh rendahnya kesadaran dan pemahaman masyarakat mengenai pentingnya pemanfaatan Eco Enzim untuk menjaga kelestarian lingkungan. Permasalahan lingkungan rumah tangga seringkali disebabkan oleh tumpukan sampah organik, yang dapat menimbulkan pencemaran udara, air, dan menjadi sumber penyakit.

Sampah organik yang menumpuk dan kurangnya pengelolaan limbah rumah tangga menjadi faktor utama yang mendorong perlunya sebuah platform yang dapat mengedukasi dan memfasilitasi tindakan nyata dari masyarakat. Meskipun Eco Enzim memiliki banyak manfaat bagi lingkungan, akses terhadap informasi dan produk terkait masih terbatas dan belum terorganisasi secara efektif. Berdasarkan data dari Direktorat Jenderal Cipta Karya pada tahun 2017, sekitar 60% dari total sampah di Indonesia terdiri dari sampah organik.

EcoZense hadir untuk menjawab permasalahan tersebut dengan menyediakan konten informatif berupa artikel, tutorial, dan panduan praktis mengenai pembuatan serta pemanfaatan Eco Enzim. Aplikasi ini juga terintegrasi dengan program bank sampah, yang memungkinkan masyarakat untuk berpartisipasi dalam penyetoran sampah sekaligus mendapatkan produk Eco Enzim yang dikelola oleh bank sampah.

Selain sebagai pusat informasi, aplikasi ini juga berfungsi sebagai marketplace yang mempertemukan bank sampah dan masyarakat dalam kegiatan jual beli produk Eco Enzim. Dengan demikian, EcoZense tidak hanya meningkatkan kesadaran, tetapi juga mendorong praktik ramah lingkungan secara langsung.

Aplikasi EcoZense dirancang untuk diakses oleh tiga kategori pengguna, yaitu admin, nasabah, dan bank sampah, dengan fungsi dan hak akses yang disesuaikan dengan perannya masing-masing. Diharapkan, dengan adanya aplikasi ini, masyarakat dapat lebih mudah memahami dan menerapkan konsep Eco Enzim dalam kehidupan sehari-hari untuk menciptakan lingkungan yang lebih bersih, sehat, dan berkelanjutan.

## 2. Desain Umum
[Gambar/tampilan rancangan umum sistem yang akan dikembangkan/dikerjakan]

Aplikasi yang akan dibangun adalah aplikasi berbasis website. Adapun fitur yang akan dibangun, yaitu:

F01: Nasabah, Pengelola Bank Sampah, dan Admin dapat login.  
F02: Sistem dapat menampilkan peta lokasi bank sampah di Batam.  
F03: Pengguna umum melihat dan menelusuri artikel.  
F04: Pengguna umum mendaftar event.  
F05: Pengguna umum membuat akun sebagai nasabah.  
F06: Nasabah dapat menerima poin.  
F07: Nasabah, Pengelola Bank Sampah, dan Admin dapat melakukan reset password.  
F08: Nasabah dapat melihat berapa banyak poin yang dimilikinya.  
F09: Nasabah dapat membeli produk Eco Enzim/sembako menggunakan poin ataupun transfer.  
F10: Nasabah dapat memasukkan produk Eco Enzim ke dalam keranjang.  
F11: Nasabah dapat memasukkan kuantitas produk yang ingin dibeli.  
F12: Nasabah dapat memberikan rating, share, dan favorite produk.  
F13: Nasabah dapat menerima notifikasi pada website.  
F14: Nasabah dapat melihat riwayat pembelian.  
F15: Nasabah dapat memberikan nilai pada artikel.  
F16: Nasabah dapat memberikan feedback pada artikel.  
F17: Nasabah dapat mengajukan diri untuk menjadi Bank Sampah.  
F18: Bank Sampah dapat memasukkan alamat serta menginput lokasi pada peta.  
F19: Bank Sampah dapat menambahkan produk Eco Enzim pada tokonya masing-masing.  
F20: Bank Sampah dapat meng-update produk Eco Enzim.  
F21: Bank Sampah dapat memasukkan berat sampah yang diberikan oleh nasabah kemudian menghitungnya menjadi poin.  
F22: Bank Sampah dapat memberikan poin kepada nasabah.  
F23: Bank Sampah dapat melihat riwayat transaksi pada toko.  
F24: Admin dapat melihat lokasi-lokasi bank sampah pada peta di dalam dashboard.  
F25: Admin dapat mengelola artikel dan post.  
F26: Admin dapat melihat list tabel dari seluruh artikel yang telah dibuat kemudian admin dapat mereview artikel (edit/delete).  
F27: Admin dapat mengelola event.  
F28: Admin dapat melihat list tabel dari seluruh event yang telah dibuat kemudian admin dapat mereview event (edit/delete).  
F29: Admin dapat mem-verifikasi pengajuan nasabah yang ingin menjadi bank sampah.  
F30: Admin dapat mengelola data pengguna.  
F31: Admin, Nasabah dan bank sampah dapat logout.  
F32: Nasabah dapat memilih opsi pembelian pada produk (Poin atau Transfer).  
F33: Nasabah dapat mengatur kuantitas produk yang ingin dibeli.  
F34: No. Rekening Pengelola Bank Sampah akan diberikan ketika nasabah ingin melakukan transfer.  
F35: Produk yang dibeli akan muncul pada halaman pesanan.  
F36: Setiap Produk memiliki inputan upload bukti pembayaran.  
F37: Setiap Produk yang pada halaman pesanan memiliki status ('Belum Dibayar', 'Sedang Diverifikasi', 'Sedang Dikirim', 'Selesai', 'Dibatalkan').  

## 3. Konstruksi Produk
[Rancangan rinci (gambar/desain/per-subsistem) sistem yang akan dikembangkan/dikerjakan]

Source: sekayuweb.com

Produk akan dikembangkan dengan pendekatan metode waterfall. Urutan dalam metode waterfall bersifat serial yang dimulai dari proses requirement analysis, design, development, testing, maintenance. Project PBL ini akan dilaksanakan selama 14 Minggu, prosesnya akan terstruktur sebagai berikut:

### 1. Requirement Analysis
- **Estimasi**: 2 minggu
- **Aktivitas**:
  - Melakukan wawancara dengan stakeholder untuk mengidentifikasi kebutuhan sistem
  - Menganalisis kebutuhan fungsional dan non-fungsional
  - Mendokumentasikan spesifikasi kebutuhan dalam SKPPL
  - Membuat use case diagram untuk fitur utama (pendaftaran nasabah, penyetoran sampah, penukaran poin)
  - Mengidentifikasi karakteristik pengguna (nasabah, pengelola bank sampah, admin)
  - Menentukan batasan sistem

### 2. System Design
- **Estimasi**: 2 minggu
- **Aktivitas**:
  - Merancang arsitektur sistem berbasis web
  - Membuat desain database dengan ERD
  - Merancang antarmuka pengguna dengan Figma
  - Membuat class diagram dan activity diagram
  - Merancang alur proses bisnis sistem (pendaftaran, penyetoran sampah, penukaran poin)
  - Mendesain sistem poin untuk penukaran produk eco enzim dan sembako (dengan batasan poin hanya dapat ditukarkan di bank sampah tempat nasabah menyetor sampah)

### 3. Implementation
- **Estimasi**: 5 minggu
- **Aktivitas**:
  - Mengembangkan landing page informatif
  - Membangun sistem registrasi dan login
  - Mengimplementasikan fitur profil pengguna
  - Membuat sistem pengelolaan artikel dan konten edukasi
  - Mengembangkan sistem bank sampah (penyetoran dan pemberian poin spesifik untuk setiap bank sampah)
  - Membangun marketplace untuk produk eco enzim dan sembako dengan validasi penukaran poin khusus per bank sampah
  - Mengimplementasikan sistem feedback
  - Membuat dashboard untuk pengelola dan admin

### 4. Testing
- **Estimasi**: 3 minggu
- **Aktivitas**:
  - Melakukan unit testing untuk setiap modul
  - Menjalankan integration testing antar komponen sistem
  - Melakukan user acceptance testing dengan stakeholder
  - Menguji kompatibilitas pada berbagai browser
  - Melakukan pengujian keamanan sistem
  - Menguji performa dan responsivitas website

### 5. Deployment
- **Estimasi**: 1 minggu
- **Aktivitas**:
  - Menyiapkan server untuk hosting aplikasi
  - Mengonfigurasi database di lingkungan produksi
  - Melakukan deployment aplikasi ke server
  - Melakukan pengujian final di lingkungan produksi
  - Membuat dokumentasi deployment

### 6. Maintenance
- **Estimasi**: Berkelanjutan
- **Aktivitas**:
  - Memonitor kinerja sistem
  - Melakukan backup database secara berkala
  - Memperbaiki bug yang ditemukan setelah deployment
  - Mengupdate konten edukasi secara berkala
  - Mengelola feedback dari pengguna untuk perbaikan sistem
  - Melakukan pemeliharaan server dan database

### Armonisasi Matakuliah PBL

1. **Statistika**
   - Dosen Pengajar: Yeni Rokhayati, S.Si., M.Sc
   - Capaian Pembelajaran: Mahasiswa mampu mengolah dan menganalisis data penggunaan aplikasi serta mengukur efektivitas fitur berdasarkan metode statistik deskriptif.
   - Minimum Requirement: Aplikasi harus dapat menyajikan data statistik sederhana mengenai penggunaan fitur dan jumlah transaksi.

2. **Struktur Data**
   - Dosen Pengajar: Sartikha, S.ST., M.Eng
   - Capaian Pembelajaran: Mahasiswa mampu menerapkan struktur data yang efisien (array, linked list, tree, graph) dalam pengolahan dan penyimpanan data pengguna, artikel, dan transak
   - Minimum Requirement: Aplikasi harus memiliki sistem pengolahan data yang optimal untuk pencarian artikel dan transaksi pengguna.

3. **Pengantar Manajemen Proyek**
   - Dosen Pengajar: Noper Ardi, S.Pd., M.Eng
   - Capaian Pembelajaran: Mahasiswa mampu merancang, mengelola, dan mengevaluasi proyek perangkat lunak dengan metode waterfall, termasuk mitigasi risiko dan komunikasi dengan stakeholder.
   - Minimum Requirement: Proyek harus memiliki dokumen perencanaan yang mencakup milestone, timeline, dan evaluasi risiko.

4. **Perancangan Perangkat Lunak**
   - Dosen Pengajar: Metta Santiputri, S.T., M.Sc, Ph.D
   - Capaian Pembelajaran: Mahasiswa mampu membuat model sistem menggunakan UML (Use Case Diagram, ERD, Class Diagram) serta menyusun arsitektur sistem berbasis MVC.
   - Minimum Requirement: Aplikasi harus memiliki perancangan sistem yang terdokumentasi (UML, ERD, Wireframe).

5. **Pemrograman Berorientasi Objek**
   - Dosen Pengajar: Swono Sibagariang, S.Kom., M.Kom
   - Capaian Pembelajaran: Mahasiswa mampu mengembangkan aplikasi berbasis PHP dan JavaScript menggunakan konsep OOP (Class, Inheritance, Polymorphism).
   - Minimum Requirement: Kode aplikasi harus menggunakan prinsip OOP untuk modularitas dan efisiensi.

6. **Pemrograman Basis Data**
   - Dosen Pengajar: Ahmadi Irmansyah Lubis, S.Kom., M.Kom
   - Capaian Pembelajaran: Mahasiswa mampu mendesain dan mengimplementasikan database menggunakan SQL Server, termasuk normalisasi, query optimasi, dan integrasi dengan aplikasi.
   - Minimum Requirement: Database harus terstruktur dengan relasi antar tabel yang sesuai dengan normalisasi minimal 3NF.

7. **Pendidikan Bahasa Indonesia**
   - Dosen Pengajar: Luki Aswar, M.Pd
   - Capaian Pembelajaran: Mahasiswa mampu menyusun dokumentasi teknis proyek, laporan akademik, dan konten edukatif dalam aplikasi sesuai dengan kaidah kebahasaan yang benar.
   - Minimum Requirement: Aplikasi harus memiliki dokumentasi teknis dan konten edukasi yang mudah dipahami oleh pengguna.

## 4. Kebutuhan Peralatan/Perangkat dan Bahan/Komponen

| Fase/Proses | Peralatan/Perangkat (SW/HW) | Bahan/Komponen |
|-------------|----------------------------|----------------|
| Requirement Analysis | Laptop/PC Windows 10/11 (6 HW), Microsoft Word (6 SW), Microsoft Power Point (6 SW), Zoom/Google Meet (6 SW), Akses Internet (6 SW) | - |
| System Design | Laptop/PC Windows 10/11 (6 HW), Figma (6 SW), Draw.io (6 SW), DB Diagram (6 SW), Akses Internet (6 SW) | - |
| Implementation | Laptop/PC Windows 10/11 (6 HW), XAMPP (5 SW), Laragon (1 SW), Visual Studio Code (6 SW), SQL Server (6 SW) | - |
| Testing | Laptop/PC Windows 10/11 (6 HW), XAMPP (5 SW), Laragon (1 SW), Chrome/Firefox/Edge/Web browser lainnya (6 SW) | - |
| Deployment | PC Windows 10/11 (6 HW), Web Hosting (1 SW), Domain (1 SW) | - |
| Maintenance | Laptop/PC Windows 10/11 (6 HW) | - |

## 5. Tantangan dan Isu

| No | Fase/Proses | Tantangan/Isu | Level Risiko* | Rencana Tindakan |
|----|-------------|---------------|---------------|------------------|
| 1 | Requirement | Perubahan kebutuhan dari stakeholder, kurangnya data valid terkait eco enzim | H | Melakukan diskusi rutin dengan stakeholder atau manpro |
| 2 | System Design | Menyesuaikan desain agar ramah lingkungan dan efisien dalam akses data eco enzim | M | Menggunakan arsitektur modular, optimasi database |
| 3 | Implementation | Pemahaman dan penguasaan bahasa pemrograman yang digunakan, waktu yang minim serta fitur yang tidak sesuai dengan rancangan aplikasi | H | Mencari referensi serta dokumentasi pemrograman, memaksimalkan waktu yang diberikandan memaksimalkan fitur yang sesuai direncanakan |
| 4 | Testing | Aplikasi tidak berjalan sempurna | H | Melakukan troubleshooting |
| 5 | Deployment | Potensi downtime saat update, kesulitan dalam skalabilitas aplikasi | L | Menggunakan CI/CD, monitoring performa aplikasi secara real-time |
| 6 | Maintenance | Update secara berkala, potensi technical debt seiring bertambahnya fitur | M | Refactoring berkala, perencanaan fitur berbasis feedback user |

*H: High; M: Medium; L: Low

## 6. Estimasi Waktu Pekerjaan

| Fase/Proses | Uraian Pekerjaan | Estimasi Waktu |
|-------------|-----------------|----------------|
| Requirement Analysis | Mengidentifikasi kebutuhan pengguna, ruanglingkup sistem, dan tujuan aplikasi | 2 minggu |
| System Design | Merancang arsitektur sistem, UI/UX, dan basis data. Meninjau desain sebelum pengembangan | 2 minggu |
| Implementation | Membangun fungsionalitas inti, integrasi frontend-backend, serta autentikasi pengguna | 5 minggu |
| Testing | Melakukan pengujian fungsional dan UAT, serta optimasi performa dan keamanan | 3 minggu |
| Deployment | Menerapkan aplikasi ke server, memastikan stabilitas, dan dokumentasi teknis | 1 minggu |
| Maintenance | Memelihara sistem, memperbaharui fitur, dan menangani masalah teknis | 1 minggu |

## 7. Biaya Proyek (Biaya Bahan dan Peralatan)
Total: Rp 0.00

## 8. Tim Proyek

| No | Nama | NIK/NIM | Program Studi |
|----|------|---------|---------------|
| 1 | Metta Santiputri, S.T., M.Sc, Ph.D | 100017 | Teknik Informatika |
| 2 | Yeni Rokhayati, S.Si., M.Sc | 112093 | Teknik Multimedia & Jaringan |
| 3 | Sartikha, S.ST., M.Eng | 113115 | Teknik Informatika |
| 4 | Swono Sibagariang, S.Kom., M.Kom | 119224 | Teknik Informatika |
| 5 | Ahmadi Irmansyah Lubis, S.Kom., M.Kom | 122275 | Teknik Rekayasa Perangkat Lunak |
| 6 | Noper Ardi, S.Pd., M.Eng | 122277 | Teknik Rekayasa Perangkat Lunak |
| 7 | Luki Aswar, M.Pd | 113115 | Teknik Informatika |
| 8 | Muhamad Sahrul Nizan, A.Md.Kom | 221320 | Teknik Informatika |
| 9 | Gilang Bagus Ramadhan, A.Md.Kom | 222331 | Teknik Informatika |
| 10 | Arshafin Alfisyahrin | 4342401075 | Teknik Rekayasa Perangkat Lunak |
| 11 | Muhamad Ariffadhlullah | 4342401070 | Teknik Rekayasa Perangkat Lunak |
| 12 | Steven Kumala | 4342401068 | Teknik Rekayasa Perangkat Lunak |
| 13 | Muhammad Faldy Rizaldy | 4342401079 | Teknik Rekayasa Perangkat Lunak |
| 14 | Thalita Aurelia Marsim | 4342401066 | Teknik Rekayasa Perangkat Lunak |
| 15 | Agnes Natalia Silalahi | 4342401082 | Teknik Rekayasa Perangkat Lunak |

## 9. Ruang Kerja (Workspace)/Laboratorium/Workshop
1. Ruang TA. 12.4
2. Ruang TA. 12.2
3. Gedung Tecnopreneur

## 10. Mata Kuliah, Capaian Pembelajaran dan Capaian Pembelajaran Mata Kuliah yang terlibat

| No. | Nama Mata Kuliah | Capaian Pembelajaran | Capaian Pembelajaran Mata Kuliah |
|-----|------------------|----------------------|----------------------------------|
| 1. | Statistika | Mahasiswa menguasai konsep sanis alam dan matematika terapan serta memahami prinsip statistik dalam pengolahan data untuk pengembangan perangkat lunak | Mahasiswa mampu menjelaskan teori dasar tatistika, merancang metode pengumpulan data, menyajikan data secara representatif, serta menganalisis data secara deskriptif |
| 2. | Struktur Data | Mahasiswa memahami prinsip rekayasa perangkat lunak, desain algoritma, serta mampu mengembangkan dan menganalisis struktur data dalam sistem komputer | Mahasiswa mampu memahami dan mengimplementasikan konsep struktur data seperti array, stack, queue, linked list, tree, dan graf dalam pemrograman, serta menerapkan operasi dasar pada struktur-struktur tersebut |
| 3. | Pengantar Manajemen Proyek | Mahasiswa menguasai prinsip rekayasa perangkat lunak, teknologi informasi terkini, serta memiliki keterampilan dalam manajemen proyek perangkat lunak | Mahasiswa mampu merancang, mengelola, dan mengevaluasi proyek perangkat lunak, termasuk perencanaan, alokasi sumber daya, mitigasi risiko, komunikasi dengan stakuholder, serta penyusunan laporan akhir proyek |
| 4. | Perancangan Perangkat Lunak | Mahasiswa menguasai rekayasa perangkat lunak, desain algoritma, serta metode analisis dan pemodelan sistem dalam pengembangan perangkat lunak | Mahasiswa mampu merancang perangkat lunak menggunakan unified modeling language(UML), menganalisis kebutuhan sistem, serta meneraokan metode pemodelan yang tepat dalam pengembangan perangkat lunak berbasis tim |
| 5. | Pemrograman Berorientasi Objek | Mahasiswa menguasai konsep pemrograman berorientasi objek dan mampu menerapkan pendekatan berbasis objek dalam pengembangan perangkat lunak | Mahasiswa mampu memahami dan mengimplementasikan konsep PBO, termasuk enkapsulasi, pewarisan, dan polimorfisme, serta mengembangkan aplikasi berbasis web dengan framework Model-View-Controller(MVC) |
| 6. | Pemrograman Basis Data | Mahasiswa menguasai konsep basis data, algoritma, dan teknologi informasi untuk membangun serta mengelola sistem basis data dalam perangkat lunak | Mahasiswa mampu memahami, mengimplementasikan, dan mengelola pemrograman basis data menggunakan SQL tingkat lanjut, termasuk subqueries, constraints, triggers, procedures, functions, dan normalisasi dalam pengembangan aplikasi perangkat lunak |
| 7. | Pendidikan Bahasa Indonesia | Mahasiswa memiliki keterampilan komunikasi akademik, baik lisan maupun tulisan, serta memahami kaidah kebahasaan dalam penulisan ilmiah dan laporan akademik | Mahasiswa mampu memahami sejarah, fungsi, dan ragam bahasa Indonesia, menerapkan kaidah kebahasaan dalam karya ilmiah, menyusun laporan akademik, serta berkomunikasi secara efektif dalam lingkungan akademik dan profesional |

## 11. Komunikasi antara Manajer Proyek dan Klien

| Fase/Proses | Pertanyaan/Komentar | Jawaban |
|-------------|---------------------|---------|
| Requirement Analysis | • Apakah website bersifat blog atau pusat informasi?<br>• Apakah user bisa mendaftar menjadi nasabah bank sampah?<br>• Apa kriteria produk yang bisa ditukarkan dengan poin? Apakah hanya produk tertentu? | • Website ini bersifat pusat informasi dan marketplace. Selain menyediakan informasi mengenai bank sampah dan sistem pengelolaannya, website juga memungkinkan pengguna untuk membeli produk eco enzim dan produk lainnya. Dengan adanya sistem poin, nasabah bank sampah bisa menukar poin hasil penyetoran sampah dengan barang seperti produk eco enzim atau sembako. Hal ini menjadikan website bukan hanya sebagai sumber informasi, tetapi juga sebagai platform yang mendukung praktik keberlanjutan melalui insentif berbasis sampah.<br>• Ya, user dapat mendaftar menjadi nasabah melalui fitur registrasi yang tersedia di website. Setelah mendaftar, mereka dapat mengelola informasi terkait layanan yang mereka sediakan.<br>• Produknya bakal bisa ditukarkan, dan harus sesuai dengan regulasi bank sampah dan pengelola eco enzim. Biasanya bakal mencakup sembako tertentu seperti beras, minyak, gula, dan produk eco enzyme. |
| System Design | | |
| Implementation | | |
| Testing | | |
| Deployment | | |
| Maintenance | | |

## 12. Monitoring dan Evaluasi

Monitoring dan evaluasi proyek dilakukan secara sistematis untuk memastikan kelancaran dan ketercapaian setiap tahapan pengembangan aplikasi sesuai dengan objektif yang telah ditetapkan.

### 1. Monitoring Progress
- Proses monitoring dilakukan oleh Manajer Proyek (Manpro) sebanyak satu kali setiap minggu.
- Monitoring dapat dilakukan secara langsung maupun daring melalui aplikasi Zoom.
- Setiap perkembangan proyek terdokumentasi dalam logbook SIAPPBL, yang digunakan sebagai acuan dalam memantau kemajuan pengerjaan.
- Komunikasi asinkron dilakukan melalui WhatsApp, memungkinkan koordinasi yang fleksibel di luar jadwal pertemuan resmi.

### 2. Evaluasi Proyek
- Evaluasi dilakukan dalam setiap pertemuan untuk meninjau progres dan mengidentifikasi kendala yang dihadapi.
- Evaluasi terjadwal dilaksanakan pada dua tahap utama:
  - ATS (Assessment Tengah Semester) untuk meninjau capaian sementara dan melakukan perbaikan jika diperlukan.
  - AAS (Assessment Akhir Semester) sebagai evaluasi menyeluruh terhadap keberhasilan proyek berdasarkan indikator ketercapaian yang telah ditetapkan.

Melalui mekanisme monitoring dan evaluasi ini, diharapkan proyek dapat berjalan sesuai rencana, kendala dapat diatasi lebih awal, dan hasil akhir sesuai dengan ekspektasi klien serta standar kualitas yang telah disepakati.

![Gambar Pelaksanaan Monitoring](Gambar2.png)

![Gambar Pelaksanaan Evaluasi](Gambar3.png)

## 13. Riwayat Perubahan Proyek yang akan ditangani

| No. Revisi/tanggal | Deskripsi Perubahan | Originator |
|-------------------|---------------------|------------|
| | | |

---

Tanda Tangan Persetujuan
Batam, DD/MM/YY

| Klien | P3M | SHILAU | Manajer Proyek |
|-------|-----|--------|---------------|
| | | | |

| Kajur IF | KPS TRPL |
|----------|----------|
| | |




