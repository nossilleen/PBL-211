# Format Rencana Pelaksanaan Proyek (RPP)
**No.FO.8.6.1-V1**  
**3 November 2023**

| Informasi | Keterangan |
|-----------|------------|
| Nomor ID | PBL TRPL - 211 |
| Pengusul Proyek | Maria, S.ST., M.Sn |
| Manajer proyek | Alena Uperiati, S.T, M.Cs |
| Judul Proyek | Aplikasi Web Eco Enzim |
| Luaran | • Aplikasi Web EcoZense<br>• Dokumen Perancangan<br>• Manual Book / Video Penggunaan<br>• Dokumen Testing<br>• Poster Aplikasi<br>• BAST<br>• Draft HKI |
| Sponsor | - |
| Biaya | - |
| Klien/Pelanggan | Maria S.ST., M.Sn |
| Waktu | 1 Semester (14 Minggu) |

## 1. Ruang lingkup

Eco Enzim adalah cairan alami serbaguna yang dihasilkan dari fermentasi limbah dapur organik (seperti kulit buah dan sayuran), gula merah, dan air selama sekitar tiga bulan. Eco Enzim dipopulerkan oleh Dr. Rosukon Poompanvong, seorang ilmuwan Thailand, sebagai cara untuk mempromosikan hidup tanpa limbah dan mengurangi polusi.

Banyak orang yang belum memahami apa itu Eco Enzim dan bagaimana cara membuatnya, sehingga edukasi yang terbatas ini menghambat adopsi teknologi yang bermanfaat ini. Selain itu, pengelolaan sampah organik sering kali tidak dilakukan dengan baik, yang dapat menyebabkan pencemaran lingkungan. Eco Enzim dapat menjadi solusi untuk mengubah limbah menjadi produk yang bermanfaat. Masyarakat juga kesulitan menemukan informasi dan dukungan dari komunitas yang berfokus pada pengelolaan sampah dan penggunaan Eco Enzim.

Dengan adanya aplikasi ini, tujuan utamanya adalah untuk memberikan informasi yang jelas dan mudah diakses mengenai Eco Enzim, mendorong masyarakat agar lebih aktif dalam mengelola sampah organik, serta membangun komunitas di mana pengguna dapat berbagi pengalaman dan pengetahuan. Dengan demikian, diharapkan masyarakat dapat lebih memahami dan memanfaatkan Eco Enzim, serta berkontribusi pada pengelolaan lingkungan yang lebih baik.

## 2. Desain Umum

[Gambar/tampilan rancangan umum sistem yang akan dikembangkan/dikerjakan]

Aplikasi yang akan dibangun adalah aplikasi berbasis website. Adapun fitur yang akan dibangun, yaitu:
1. Register
2. Login
3. Akun profil
4. Halaman artikel
5. Landing page informatif
6. Bergabung sebagai nasabah atau anggota program bank sampah
7. Feedback
8. Sistem jual/beli produk eco enzim atau sembako menggunakan poin dari penyetoran sampah (poin hanya dapat ditukarkan pada bank sampah tempat nasabah melakukan penyetoran)
9. Promosi kegiatan dan event
10. Publikasi produk eco enzim

## 3. Konstruksi Produk

[Rancangan rinci (gambar/desain/per-subsistem) sistem yang akan dikembangkan/dikerjakan]

Source: sekayuweb.com

Produk akan dikembangkan dengan pendekatan metode waterfall. Urutan dalam metode waterfall bersifat serial yang dimulai dari proses requirement analysis, design, development, testing, maintenance. Project PBL ini akan dilaksanakan selama 14 Minggu, prosesnya akan terstruktur sebagai berikut:

### 1. Requirement Analysis
* **Estimasi**: 2 minggu
* **Aktivitas**:
  - Melakukan wawancara dengan stakeholder untuk mengidentifikasi kebutuhan sistem
  - Menganalisis kebutuhan fungsional dan non-fungsional
  - Mendokumentasikan spesifikasi kebutuhan dalam SKPPL
  - Membuat use case diagram untuk fitur utama (pendaftaran nasabah, penyetoran sampah, penukaran poin)
  - Mengidentifikasi karakteristik pengguna (nasabah, pengelola bank sampah, admin)
  - Menentukan batasan sistem

### 2. System Design
* **Estimasi**: 2 minggu
* **Aktivitas**:
  - Merancang arsitektur sistem berbasis web
  - Membuat desain database dengan ERD
  - Merancang antarmuka pengguna dengan Figma
  - Membuat class diagram dan activity diagram
  - Merancang alur proses bisnis sistem (pendaftaran, penyetoran sampah, penukaran poin)
  - Mendesain sistem poin untuk penukaran produk eco enzim dan sembako (dengan batasan poin hanya dapat ditukarkan di bank sampah tempat nasabah menyetor sampah)

### 3. Implementation
* **Estimasi**: 5 minggu
* **Aktivitas**:
  - Mengembangkan landing page informatif
  - Membangun sistem registrasi dan login
  - Mengimplementasikan fitur profil pengguna
  - Membuat sistem pengelolaan artikel dan konten edukasi
  - Mengembangkan sistem bank sampah (penyetoran dan pemberian poin spesifik untuk setiap bank sampah)
  - Membangun marketplace untuk produk eco enzim dan sembako dengan validasi penukaran poin khusus per bank sampah
  - Mengimplementasikan sistem feedback
  - Membuat dashboard untuk pengelola dan admin

### 4. Testing
* **Estimasi**: 3 minggu
* **Aktivitas**:
  - Melakukan unit testing untuk setiap modul
  - Menjalankan integration testing antar komponen sistem
  - Melakukan user acceptance testing dengan stakeholder
  - Menguji kompatibilitas pada berbagai browser
  - Melakukan pengujian keamanan sistem
  - Menguji performa dan responsivitas website

### 5. Deployment
* **Estimasi**: 1 minggu
* **Aktivitas**:
  - Menyiapkan server untuk hosting aplikasi
  - Mengonfigurasi database di lingkungan produksi
  - Melakukan deployment aplikasi ke server
  - Melakukan pengujian final di lingkungan produksi
  - Membuat dokumentasi deployment

### 6. Maintenance
* **Estimasi**: Berkelanjutan
* **Aktivitas**:
  - Memonitor kinerja sistem
  - Melakukan backup database secara berkala
  - Memperbaiki bug yang ditemukan setelah deployment
  - Mengupdate konten edukasi secara berkala
  - Mengelola feedback dari pengguna untuk perbaikan sistem
  - Melakukan pemeliharaan server dan database

Adapun armonisasi matakuliah PBL pada semester ini adalah:

### 1. Statistika
* **Dosen Pengajar**: Yeni Rokhayati, S.Si., M.Sc
* **Capaian Pembelajaran**: Mahasiswa mampu mengolah dan menganalisis data penggunaan aplikasi serta mengukur efektivitas fitur berdasarkan metode statistik deskriptif.
* **Minimum Requirement**: Aplikasi harus dapat menyajikan data statistik sederhana mengenai penggunaan fitur dan jumlah transaksi.

### 2. Struktur Data
* **Dosen Pengajar**: Sartikha, S.ST., M.Eng
* **Capaian Pembelajaran**: Mahasiswa mampu menerapkan struktur data yang efisien (array, linked list, tree, graph) dalam pengolahan dan penyimpanan data pengguna, artikel, dan transaksi.
* **Minimum Requirement**: Aplikasi harus memiliki sistem pengolahan data yang optimal untuk pencarian artikel dan transaksi pengguna.

### 3. Pengantar Manajemen Proyek
* **Dosen Pengajar**: Noper Ardi, S.Pd., M.Eng
* **Capaian Pembelajaran**: Mahasiswa mampu merancang, mengelola, dan mengevaluasi proyek perangkat lunak dengan metode waterfall, termasuk mitigasi risiko dan komunikasi dengan stakeholder.
* **Minimum Requirement**: Proyek harus memiliki dokumen perencanaan yang mencakup milestone, timeline, dan evaluasi risiko.

### 4. Perancangan Perangkat Lunak
* **Dosen Pengajar**: Metta Santiputri, S.T., M.Sc, Ph.D
* **Capaian Pembelajaran**: Mahasiswa mampu membuat model sistem menggunakan UML (Use Case Diagram, ERD, Class Diagram) serta menyusun arsitektur sistem berbasis MVC.
* **Minimum Requirement**: Aplikasi harus memiliki perancangan sistem yang terdokumentasi (UML, ERD, Wireframe).

### 5. Pemrograman Berorientasi Objek
* **Dosen Pengajar**: Swono Sibagariang, S.Kom., M.Kom
* **Capaian Pembelajaran**: Mahasiswa mampu mengembangkan aplikasi berbasis PHP dan JavaScript menggunakan konsep OOP (Class, Inheritance, Polymorphism).
* **Minimum Requirement**: Kode aplikasi harus menggunakan prinsip OOP untuk modularitas dan efisiensi.

### 6. Pemrograman Basis Data
* **Dosen Pengajar**: Ahmadi Irmansyah Lubis, S.Kom., M.Kom
* **Capaian Pembelajaran**: Mahasiswa mampu mendesain dan mengimplementasikan database menggunakan SQL Server, termasuk normalisasi, query optimasi, dan integrasi dengan aplikasi.
* **Minimum Requirement**: Database harus terstruktur dengan relasi antar tabel yang sesuai dengan normalisasi minimal 3NF.

### 7. Pendidikan Bahasa Indonesia
* **Dosen Pengajar**: Luki Aswar, M.Pd
* **Capaian Pembelajaran**: Mahasiswa mampu menyusun dokumentasi teknis proyek, laporan akademik, dan konten edukatif dalam aplikasi sesuai dengan kaidah kebahasaan yang benar.
* **Minimum Requirement**: Aplikasi harus memiliki dokumentasi teknis dan konten edukasi yang mudah dipahami oleh pengguna.

## 4. Kebutuhan Peralatan/Perangkat dan Bahan/Komponen

| Fase/Proses | Peralatan/Perangkat (SW/HW) | Bahan/Komponen |
|-------------|------------------------------|----------------|
| | Nama | Jumlah | Catatan | Nama | Jumlah | Catatan |
| Requirement Analysis | Laptop/PC Windows 10/11 | 6 | HW | | | |
| | Microsoft Word | 6 | SW | | | |
| | Microsoft Power Point | 6 | SW | | | |
| | Zoom/Google Meet | 6 | SW | | | |
| | Akses Internet | 6 | SW | | | |
| System Design | Laptop/PC Windows 10/11 | 6 | HW | | | |
| | Figma | 6 | SW | | | |
| | Draw.io | 6 | SW | | | |
| | DB Diagram | 6 | SW | | | |
| | Akses Internet | 6 | SW | | | |
| Implementation | Laptop/PC Windows 10/11 | 6 | HW | | | |
| | XAMPP | 5 | SW | | | |
| | Laragon | 1 | SW | | | |
| | Visual Studio Code | 6 | SW | | | |
| | SQL Server | 6 | SW | | | |
| Testing | Laptop/PC Windows 10/11 | 6 | HW | | | |
| | XAMPP | 5 | SW | | | |
| | Laragon | 1 | SW | | | |
| | Chrome/Firefox/Edge/Web browser lainnya | 6 | SW | | | |
| Deployment | PC Windows 10/11 | 6 | HW | | | |
| | Web Hosting | 1 | SW | | | |
| | Domain | 1 | SW | | | |
| Maintenance | Laptop/PC Windows 10/11 | 6 | HW | | | |

## 5. Tantangan dan Isu

[Identifikasi potensi tantangan/isu yang mungkin muncul terkait dengan proses/fase atau terkait dengan peralatan/perangkat/bahan/lainnya menggunakan No.FO.17.1.1-V0 format identifikasi bahaya, dan penilaian risiko dilampirkan pada dokumen RPP]

| No | Fase/Proses | Tantangan/Isu | Level Risiko* | Rencana Tindakan | Catatan |
|----|-------------|---------------|---------------|------------------|---------|
| 1 | Requirement | Perubahan kebutuhan dari stakeholder, kurangnya data valid terkait eco enzim. | H | Melakukan diskusi rutin dengan stakeholder atau manpro. | |
| 2 | System Design | Menyesuaikan desain agar ramah lingkungan dan efisien dalam akses data eco enzim. | M | Menggunakan arsitektur modular, optimasi database. | |
| 3 | Implementation | Pemahaman dan penguasaan bahasa pemrograman yang digunakan, waktu yang minim serta fitur yang tidak sesuai dengan rancangan aplikasi. | H | Mencari referensi serta dokumentasi pemrograman, memaksimalkan waktu yang diberikan dan memaksimalkan fitur yang sesuai direncanakan. | |
| 4 | Testing | Aplikasi tidak berjalan sempurna | H | Melakukan troubleshooting | |
| 5 | Deployment | Potensi downtime saat update, kesulitan dalam skalabilitas aplikasi | L | Menggunakan CI/CD, monitoring performa aplikasi secara real-time | |
| 6 | Maintenance | Update secara berkala, potensi technical debt seiring bertambahnya fitur | M | Refactoring berkala, perencanaan fitur berbasis feedback user | |

*H: High; M: Medium; L: Low

## 6. Estimasi Waktu Pekerjaan

| Fase/Proses | Uraian Pekerjaan | Estimasi Waktu | Catatan |
|-------------|------------------|----------------|---------|
| Requirement Analysis | Mengidentifikasi kebutuhan pengguna, ruang lingkup sistem, dan tujuan aplikasi. | 2 minggu | |
| System Design | Merancang arsitektur sistem, UI/UX, dan basis data. Meninjau desain sebelum pengembangan. | 2 minggu | |
| Implementation | Membangun fungsionalitas inti, integrasi frontend-backend, serta autentikasi pengguna. | 5 minggu | |
| Testing | Melakukan pengujian fungsional dan UAT, serta optimasi performa dan keamanan. | 3 minggu | |
| Deployment | Menerapkan aplikasi ke server, memastikan stabilitas, dan dokumentasi teknis. | 1 minggu | |
| Maintenance | Memelihara sistem, memperbaharui fitur, dan menangani masalah teknis | 1 minggu | |

## 7. Biaya Proyek (Biaya Bahan dan Peralatan)

| Fase/Proses | Uraian Pekerjaan | Perkiraan Biaya | Catatan |
|-------------|------------------|-----------------|---------|
| ... | ... | ... | |
| ... | ... | ... | |
| ... | ... | ... | |
| ... | ... | ... | |
| **Total** | | **Rp 0.00** | |

## 8. Tim proyek (Dosen, Laboran dan/atau Mahasiswa)

| No | Nama | NIK/NIM | Program Studi |
|----|------|---------|--------------|
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
| 1. | Statistika | Mahasiswa menguasai konsep sanis alam dan matematika terapan serta memahami prinsip statistik dalam pengolahan data untuk pengembangan perangkat lunak. | Mahasiswa mampu menjelaskan teori dasar tatistika, merancang metode pengumpulan data, menyajikan data secara representatif, serta menganalisis data secara deskriptif. |
| 2. | Struktur Data | Mahasiswa memahami prinsip rekayasa perangkat lunak, desain algoritma, serta mampu mengembangkan dan menganalisis struktur data dalam sistem komputer. | Mahasiswa mampu memahami dan mengimplementasikan konsep struktur data seperti array, stack, queue, linked list, tree, dan graf dalam pemrograman, serta menerapkan operasi dasar pada struktur-struktur tersebut. |
| 3. | Pengantar Manajemen Proyek | Mahasiswa menguasai prinsip rekayasa perangkat lunak, teknologi informasi terkini, serta memiliki keterampilan dalam manajemen proyek perangkat lunak. | Mahasiswa mampu merancang, mengelola, dan mengevaluasi proyek perangkat lunak, termasuk perencanaan, alokasi sumber daya, mitigasi risiko, komunikasi dengan stakuholder, serta penyusunan laporan akhir proyek. |
| 4. | Perancangan Perangkat Lunak | Mahasiswa menguasai rekayasa perangkat lunak, desain algoritma, serta metode analisis dan pemodelan sistem dalam pengembangan perangkat lunak. | Mahasiswa mampu merancang perangkat lunak menggunakan unified modeling language(UML), menganalisis kebutuhan sistem, serta meneraokan metode pemodelan yang tepat dalam pengembangan perangkat lunak berbasis tim. |
| 5. | Pemrograman Berorientasi Objek | Mahasiswa menguasai konsep pemrograman berorientasi objek dan mampu menerapkan pendekatan berbasis objek dalam pengembangan perangkat lunak. | Mahasiswa mampu memahami dan mengimplementasikan konsep PBO, termasuk enkapsulasi, pewarisan, dan polimorfisme, serta mengembangkan aplikasi berbasis web dengan framework Model-View-Controller(MVC). |
| 6. | Pemrograman Basis Data | Mahasiswa menguasai konsep basis data, algoritma, dan teknologi informasi untuk membangun serta mengelola sistem basis data dalam perangkat lunak. | Mahasiswa mampu memahami, mengimplementasikan, dan mengelola pemrograman basis data menggunakan SQL tingkat lanjut, termasuk subqueries, constraints, triggers, procedures, functions, dan normalisasi dalam pengembangan aplikasi perangkat lunak. |
| 7. | Pendidikan Bahasa Indonesia | Mahasiswa memiliki keterampilan komunikasi akademik, baik lisan maupun tulisan, serta memahami kaidah kebahasaan dalam penulisan ilmiah dan laporan akademik. | Mahasiswa mampu memahami sejarah, fungsi, dan ragam bahasa Indonesia, menerapkan kaidah kebahasaan dalam karya ilmiah, menyusun laporan akademik, serta berkomunikasi secara efektif dalam lingkungan akademik dan profesional. |

## 11. Komunikasi antara Manajer Proyek dan Klien

| Fase/Proses | Pertanyaan/Komentar | Jawaban | Catatan |
|-------------|---------------------|---------|---------|
| ... | ... | ... | ... |

## 12. Monitoring dan Evaluasi
[Jelaskan bagaimana melakukan monitoring dan evaluasi selama dan di akhir proyek yang disepakati dengan klien. Formulasikan dengan jelas indikator-indikator ketercapaian untuk objektif yang telah ditetapkan]

## 13. Riwayat Perubahan Proyek yang akan ditangani

| No. | Revisi/tanggal | Deskripsi Perubahan | Originator |
|-----|----------------|---------------------|------------|
| ... | ... | ... | ... |

## Tanda Tangan Persetujuan

Batam, DD/MM/YY

| Klien | P3M | SHILAU | Manajer Proyek |
|-------|-----|--------|----------------|
|       |     |        |                |

| Kajur ____ | Kajur ____ | KPS _____ | KPS ______ |
|------------|------------|-----------|------------|
|            |            |           |            |