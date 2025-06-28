-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2025 at 12:10 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ecozense`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `artikel_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kategori` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `konten` longtext NOT NULL,
  `tanggal_publikasi` date NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL COMMENT 'Admin yang membuat artikel',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`artikel_id`),
  KEY `artikel_user_id_foreign` (`user_id`),
  KEY `idx_artikel_judul` (`judul`),
  CONSTRAINT `artikel_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `artikel_gambar`
--

CREATE TABLE `artikel_gambar` (
  `gambar_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `artikel_id` bigint(20) unsigned NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`gambar_id`),
  KEY `artikel_gambar_artikel_id_foreign` (`artikel_id`),
  CONSTRAINT `artikel_gambar_artikel_id_foreign` FOREIGN KEY (`artikel_id`) REFERENCES `artikel` (`artikel_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL,
  `location` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `komentar` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `artikel_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`feedback_id`),
  KEY `feedback_user_id_foreign` (`user_id`),
  KEY `feedback_artikel_id_foreign` (`artikel_id`),
  CONSTRAINT `feedback_artikel_id_foreign` FOREIGN KEY (`artikel_id`) REFERENCES `artikel` (`artikel_id`),
  CONSTRAINT `feedback_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `lokasi_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_lokasi` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `latitude` decimal(10,7) DEFAULT NULL,
  `longitude` decimal(10,7) DEFAULT NULL,
  PRIMARY KEY (`lokasi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `point_histories`
--

CREATE TABLE `point_histories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `transaction_type` enum('credit','debit') NOT NULL,
  `amount` bigint(20) unsigned NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` enum('berhasil','pending','gagal') NOT NULL DEFAULT 'berhasil',
  `related_type` varchar(255) DEFAULT NULL,
  `related_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `point_histories_user_id_foreign` (`user_id`),
  KEY `point_histories_related_type_related_id_index` (`related_type`,`related_id`),
  CONSTRAINT `point_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_likes`
--

CREATE TABLE `product_likes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `produk_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_likes_user_id_produk_id_unique` (`user_id`,`produk_id`),
  KEY `product_likes_produk_id_foreign` (`produk_id`),
  CONSTRAINT `product_likes_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`produk_id`) ON DELETE CASCADE,
  CONSTRAINT `product_likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `produk_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(50) NOT NULL,
  `kategori` enum('eco_enzim','sembako') NOT NULL DEFAULT 'eco_enzim',
  `status_ketersediaan` enum('Available','Unavailable') NOT NULL DEFAULT 'Available',
  `harga` int(10) unsigned NOT NULL,
  `suka` int(10) unsigned NOT NULL DEFAULT 0,
  `deskripsi` text DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL COMMENT 'Pengelola yang menyediakan produk',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `harga_points` int(10) unsigned NOT NULL,
  PRIMARY KEY (`produk_id`),
  KEY `produk_user_id_foreign` (`user_id`),
  KEY `idx_produk_nama` (`nama_produk`),
  KEY `idx_produk_status` (`status_ketersediaan`),
  KEY `idx_produk_kategori` (`kategori`),
  CONSTRAINT `produk_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE SET NULL,
  CONSTRAINT `check_harga` CHECK (`harga` >= 0),
  CONSTRAINT `check_suka` CHECK (`suka` >= 0)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk_gambar`
--

CREATE TABLE `produk_gambar` (
  `gambar_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `produk_id` bigint(20) unsigned NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`gambar_id`),
  KEY `produk_gambar_produk_id_foreign` (`produk_id`),
  CONSTRAINT `produk_gambar_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`produk_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `lokasi_id` bigint(20) unsigned DEFAULT NULL,
  `produk_id` bigint(20) unsigned NOT NULL,
  `jumlah_produk` int(10) unsigned NOT NULL DEFAULT 1,
  `harga_total` int(10) unsigned NOT NULL,
  `poin_used` int(10) unsigned DEFAULT NULL,
  `tanggal` datetime NOT NULL,
  `status` enum('belum dibayar','menunggu konfirmasi','sedang dikirim','selesai','dibatalkan') NOT NULL DEFAULT 'belum dibayar',
  `pay_method` enum('transfer','poin') NOT NULL DEFAULT 'transfer',
  `bukti_transfer` varchar(255) DEFAULT NULL COMMENT 'Path file bukti transfer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`transaksi_id`),
  KEY `transaksi_user_id_foreign` (`user_id`),
  KEY `transaksi_lokasi_id_foreign` (`lokasi_id`),
  KEY `transaksi_produk_id_foreign` (`produk_id`),
  KEY `idx_transaksi_tanggal` (`tanggal`),
  KEY `idx_transaksi_status` (`status`),
  CONSTRAINT `transaksi_lokasi_id_foreign` FOREIGN KEY (`lokasi_id`) REFERENCES `lokasi` (`lokasi_id`),
  CONSTRAINT `transaksi_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`produk_id`),
  CONSTRAINT `transaksi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  CONSTRAINT `check_jumlah_produk` CHECK (`jumlah_produk` > 0),
  CONSTRAINT `check_harga_total` CHECK (`harga_total` >= 0),
  CONSTRAINT `check_poin_used_pay_method` CHECK (`pay_method` = 'poin' and `poin_used` > 0 or `pay_method` = 'transfer' and (`poin_used` is null or `poin_used` = 0))
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upgrades`
--

CREATE TABLE `upgrades` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `nama_bank_sampah` varchar(255) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `kota` varchar(255) NOT NULL,
  `alasan_pengajuan` text NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `upgrades_user_id_foreign` (`user_id`),
  CONSTRAINT `upgrades_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `points` bigint(20) unsigned NOT NULL DEFAULT 0,
  `no_hp` varchar(15) NOT NULL,
  `role` enum('admin','nasabah','pengelola') NOT NULL DEFAULT 'nasabah',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `force_password_change` tinyint(1) NOT NULL DEFAULT 0,
  `deskripsi_toko` text DEFAULT NULL,
  `alamat_toko` varchar(255) DEFAULT NULL,
  `jam_operasional` varchar(255) DEFAULT NULL,
  `nomor_rekening` varchar(255) DEFAULT NULL,
  `nama_bank_rekening` varchar(255) DEFAULT NULL,
  `foto_toko` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email_unique` (`email`),
  KEY `idx_user_nama` (`nama`),
  KEY `idx_user_role` (`role`),
  CONSTRAINT `check_email` CHECK (`email` like '%@%.%'),
  CONSTRAINT `check_no_hp` CHECK (octet_length(`no_hp`) >= 10)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `type` enum('transaksi','artikel','event') NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_user_id_index` (`user_id`),
  CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`artikel_id`),
  ADD KEY `artikel_user_id_foreign` (`user_id`),
  ADD KEY `idx_artikel_judul` (`judul`);

--
-- Indexes for table `artikel_gambar`
--
ALTER TABLE `artikel_gambar`
  ADD PRIMARY KEY (`gambar_id`),
  ADD KEY `artikel_gambar_artikel_id_foreign` (`artikel_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `feedback_user_id_foreign` (`user_id`),
  ADD KEY `feedback_artikel_id_foreign` (`artikel_id`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`lokasi_id`);

--
-- Indexes for table `point_histories`
--
ALTER TABLE `point_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `point_histories_user_id_foreign` (`user_id`),
  ADD KEY `point_histories_related_type_related_id_index` (`related_type`,`related_id`);

--
-- Indexes for table `product_likes`
--
ALTER TABLE `product_likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_likes_user_id_produk_id_unique` (`user_id`,`produk_id`),
  ADD KEY `product_likes_produk_id_foreign` (`produk_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_id`),
  ADD KEY `produk_user_id_foreign` (`user_id`),
  ADD KEY `idx_produk_nama` (`nama_produk`),
  ADD KEY `idx_produk_status` (`status_ketersediaan`),
  ADD KEY `idx_produk_kategori` (`kategori`);

--
-- Indexes for table `produk_gambar`
--
ALTER TABLE `produk_gambar`
  ADD PRIMARY KEY (`gambar_id`),
  ADD KEY `produk_gambar_produk_id_foreign` (`produk_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`),
  ADD KEY `transaksi_user_id_foreign` (`user_id`),
  ADD KEY `transaksi_lokasi_id_foreign` (`lokasi_id`),
  ADD KEY `transaksi_produk_id_foreign` (`produk_id`),
  ADD KEY `idx_transaksi_tanggal` (`tanggal`),
  ADD KEY `idx_transaksi_status` (`status`);

--
-- Indexes for table `upgrades`
--
ALTER TABLE `upgrades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `upgrades_user_id_foreign` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email_unique` (`email`),
  ADD KEY `idx_user_nama` (`nama`),
  ADD KEY `idx_user_role` (`role`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_index` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `artikel_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `artikel_gambar`
--
ALTER TABLE `artikel_gambar`
  MODIFY `gambar_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `lokasi_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `point_histories`
--
ALTER TABLE `point_histories`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_likes`
--
ALTER TABLE `product_likes`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `produk_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk_gambar`
--
ALTER TABLE `produk_gambar`
  MODIFY `gambar_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upgrades`
--
ALTER TABLE `upgrades`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `artikel_gambar`
--
ALTER TABLE `artikel_gambar`
  ADD CONSTRAINT `artikel_gambar_artikel_id_foreign` FOREIGN KEY (`artikel_id`) REFERENCES `artikel` (`artikel_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_artikel_id_foreign` FOREIGN KEY (`artikel_id`) REFERENCES `artikel` (`artikel_id`),
  ADD CONSTRAINT `feedback_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `point_histories`
--
ALTER TABLE `point_histories`
  ADD CONSTRAINT `point_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `product_likes`
--
ALTER TABLE `product_likes`
  ADD CONSTRAINT `product_likes_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`produk_id`),
  ADD CONSTRAINT `product_likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `produk_gambar`
--
ALTER TABLE `produk_gambar`
  ADD CONSTRAINT `produk_gambar_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`produk_id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_lokasi_id_foreign` FOREIGN KEY (`lokasi_id`) REFERENCES `lokasi` (`lokasi_id`),
  ADD CONSTRAINT `transaksi_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`produk_id`),
  ADD CONSTRAINT `transaksi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `upgrades`
--
ALTER TABLE `upgrades`
  ADD CONSTRAINT `upgrades_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--
-- Triggers for notifications
--
DELIMITER //

DROP TRIGGER IF EXISTS trg_after_transaksi_update //
CREATE TRIGGER trg_after_transaksi_update AFTER UPDATE ON transaksi
FOR EACH ROW
BEGIN
    IF NEW.status <> OLD.status THEN
        INSERT INTO notifications (user_id, type, title, message, url, created_at, updated_at)
        VALUES (
            NEW.user_id,
            'transaksi',
            CONCAT('Status Pesanan #', NEW.transaksi_id, ' diperbarui'),
            CONCAT('Pesanan Anda sekarang ', NEW.status),
            '/profile#pesanan',
            NOW(),
            NOW()
        );
    END IF;
END //

DROP TRIGGER IF EXISTS trg_after_artikel_insert //
CREATE TRIGGER trg_after_artikel_insert AFTER INSERT ON artikel
FOR EACH ROW
BEGIN
    INSERT INTO notifications (user_id, type, title, message, url, created_at, updated_at)
    SELECT u.user_id,
           'artikel',
           CONCAT('Artikel Baru: ', NEW.judul),
           CONCAT('Baca artikel "', NEW.judul, '" sekarang.'),
           CONCAT('/artikel/', NEW.artikel_id),
           NOW(),
           NOW()
    FROM user u
    WHERE u.role = 'nasabah';
END //

DROP TRIGGER IF EXISTS trg_after_event_insert //
CREATE TRIGGER trg_after_event_insert AFTER INSERT ON events
FOR EACH ROW
BEGIN
    INSERT INTO notifications (user_id, type, title, message, url, created_at, updated_at)
    SELECT u.user_id,
           'event',
           CONCAT('Event Baru: ', NEW.title),
           CONCAT('Ikuti event "', NEW.title, '" pada ', DATE_FORMAT(NEW.date, '%d %M %Y')), 
           CONCAT('/events/', NEW.id),
           NOW(),
           NOW()
    FROM user u
    WHERE u.role = 'nasabah';
END //

DROP TRIGGER IF EXISTS trg_after_artikel_delete //
CREATE TRIGGER trg_after_artikel_delete AFTER DELETE ON artikel
FOR EACH ROW
BEGIN
    DELETE FROM notifications
    WHERE type = 'artikel'
      AND url = CONCAT('/artikel/', OLD.artikel_id);
END //

DROP TRIGGER IF EXISTS trg_after_event_delete //
CREATE TRIGGER trg_after_event_delete AFTER DELETE ON events
FOR EACH ROW
BEGIN
    DELETE FROM notifications
    WHERE type = 'event'
      AND url = CONCAT('/events/', OLD.id);
END //

DELIMITER ;
