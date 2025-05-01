<?php
// Mengambil data dari API
$jsonData = file_get_contents('http://127.0.0.1:8000/check-data');
$data = json_decode($jsonData, true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Ecozense</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        h1, h2 {
            color: #2c3e50;
        }
        .section {
            background-color: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <h1>Data Ecozense</h1>
    
    <div class="section">
        <h2>Users</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No. HP</th>
                <th>Role</th>
            </tr>
            <?php foreach ($data['users'] as $user): ?>
            <tr>
                <td><?= $user['user_id'] ?></td>
                <td><?= $user['nama'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['no_hp'] ?></td>
                <td><?= $user['role'] ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    
    <div class="section">
        <h2>Lokasi</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama Lokasi</th>
                <th>Alamat</th>
                <th>Kota</th>
            </tr>
            <?php foreach ($data['lokasi'] as $lok): ?>
            <tr>
                <td><?= $lok['lokasi_id'] ?></td>
                <td><?= $lok['nama_lokasi'] ?></td>
                <td><?= $lok['alamat'] ?></td>
                <td><?= $lok['kota'] ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    
    <div class="section">
        <h2>Produk</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Harga</th>
                <th>Suka</th>
                <th>Pengelola ID</th>
            </tr>
            <?php foreach ($data['produk'] as $prod): ?>
            <tr>
                <td><?= $prod['produk_id'] ?></td>
                <td><?= $prod['nama_produk'] ?></td>
                <td><?= $prod['kategori'] ?></td>
                <td><?= $prod['status_ketersediaan'] ?></td>
                <td><?= $prod['harga'] ?></td>
                <td><?= $prod['suka'] ?></td>
                <td><?= $prod['user_id'] ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    
    <div class="section">
        <h2>Artikel</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Tanggal Publikasi</th>
                <th>Admin ID</th>
            </tr>
            <?php foreach ($data['artikel'] as $art): ?>
            <tr>
                <td><?= $art['artikel_id'] ?></td>
                <td><?= $art['judul'] ?></td>
                <td><?= $art['kategori'] ?></td>
                <td><?= $art['tanggal_publikasi'] ?></td>
                <td><?= $art['user_id'] ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    
    <div class="section">
        <h2>Poin</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Lokasi</th>
                <th>Jumlah Poin</th>
            </tr>
            <?php foreach ($data['poin'] as $poin): ?>
            <tr>
                <td><?= $poin['poin_id'] ?></td>
                <td><?= $poin['user']['nama'] ?> (ID: <?= $poin['user_id'] ?>)</td>
                <td><?= $poin['lokasi']['nama_lokasi'] ?> (ID: <?= $poin['lokasi_id'] ?>)</td>
                <td><?= $poin['jumlah_poin'] ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    
    <div class="section">
        <h2>Transaksi</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Produk</th>
                <th>Lokasi</th>
                <th>Jumlah</th>
                <th>Harga Total</th>
                <th>Metode Pembayaran</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
            <?php foreach ($data['transaksi'] as $trx): ?>
            <tr>
                <td><?= $trx['transaksi_id'] ?></td>
                <td><?= $trx['user']['nama'] ?></td>
                <td><?= $trx['produk']['nama_produk'] ?></td>
                <td><?= $trx['lokasi']['nama_lokasi'] ?></td>
                <td><?= $trx['jumlah_produk'] ?></td>
                <td><?= $trx['harga_total'] ?></td>
                <td><?= $trx['pay_method'] ?> <?= $trx['poin_used'] ? '(' . $trx['poin_used'] . ' poin)' : '' ?></td>
                <td><?= $trx['status'] ?></td>
                <td><?= $trx['tanggal'] ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    
    <div class="section">
        <h2>Feedback</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Artikel</th>
                <th>Komentar</th>
                <th>Tanggal</th>
            </tr>
            <?php foreach ($data['feedback'] as $fb): ?>
            <tr>
                <td><?= $fb['feedback_id'] ?></td>
                <td><?= $fb['user']['nama'] ?></td>
                <td><?= $fb['artikel']['judul'] ?></td>
                <td><?= $fb['komentar'] ?></td>
                <td><?= $fb['created_at'] ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html> 