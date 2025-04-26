@extends('layouts.app') @section('content')
<!-- Hero Section -->
<div
    class="py-5 text-center"
    style="background: linear-gradient(135deg, #a8e063 0%, #56ab2f 100%); color: #fff"
>
    <div class="container">
        <h1 class="display-4 mb-3">Welcome to EcoZense</h1>
        <p class="lead mb-4">
            Solusi pengelolaan sampah modern dan terintegrasi untuk kota yang lebih bersih dan
            hijau.
        </p>
        <a href="#info-center" class="btn btn-dark btn-lg">Mulai</a>
        <img
            src="https://i.ibb.co/3y7VZ8B/dashboard-demo.png"
            alt="Demo"
            class="img-fluid mt-4 rounded shadow"
            style="max-width: 600px"
        />
    </div>
</div>

<!-- Pusat Informasi Section -->
<div
    id="info-center"
    class="py-5"
    style="background: linear-gradient(135deg, #e0eafc 0%, #cfdef3 100%)"
>
    <div class="container">
        <h2 class="mb-4 text-center">Pusat Informasi</h2>
        <div class="row justify-content-center">
            <div class="col-md-3 mb-3">
                <div class="card shadow h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Events</h5>
                        <i class="bi bi-calendar-event display-3 mb-3"></i>
                        <p class="card-text">Kegiatan dan acara terbaru seputar lingkungan.</p>
                        <a href="#" class="btn btn-success">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card shadow h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Video</h5>
                        <i class="bi bi-play-circle display-3 mb-3"></i>
                        <p class="card-text">Video edukasi dan dokumentasi kegiatan.</p>
                        <a href="#" class="btn btn-success">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card shadow h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Artikel</h5>
                        <i class="bi bi-journal-text display-3 mb-3"></i>
                        <p class="card-text">Baca artikel inspiratif tentang pengelolaan sampah.</p>
                        <a href="#" class="btn btn-success">Lihat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- About Us Section -->
<div class="py-5 text-white" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%)">
    <div class="container">
        <h2 class="mb-4 text-center">About us</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p class="lead text-center">
                    Kami hadir untuk membantu masyarakat mengelola sampah dengan lebih baik melalui
                    teknologi dan kolaborasi. EcoZense percaya bahwa perubahan dimulai dari langkah
                    kecil yang konsisten.
                </p>
                <div class="text-center mt-3">
                    <a href="#" class="btn btn-light">Pelajari Lebih Lanjut</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Kenapa Pilih EcoZense Section -->
<div class="py-5" style="background: linear-gradient(135deg, #f8ffae 0%, #43c6ac 100%)">
    <div class="container">
        <h2 class="mb-4 text-center">Kenapa Pilih EcoZense?</h2>
        <div class="row text-center">
            <div class="col-md-3 mb-3">
                <div class="p-4 bg-white rounded shadow h-100">
                    <i class="bi bi-globe2 display-4 mb-2 text-success"></i>
                    <h5>Jaringan Luas</h5>
                    <p>Bank sampah tersebar di seluruh kota.</p>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="p-4 bg-white rounded shadow h-100">
                    <i class="bi bi-people display-4 mb-2 text-success"></i>
                    <h5>Komunitas Aktif</h5>
                    <p>Didukung relawan dan komunitas peduli lingkungan.</p>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="p-4 bg-white rounded shadow h-100">
                    <i class="bi bi-shield-check display-4 mb-2 text-success"></i>
                    <h5>Transparan & Aman</h5>
                    <p>Proses penimbangan dan penukaran jelas.</p>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="p-4 bg-white rounded shadow h-100">
                    <i class="bi bi-graph-up-arrow display-4 mb-2 text-success"></i>
                    <h5>Memberdayakan</h5>
                    <p>Memberi nilai tambah bagi masyarakat.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Produk Terbaru Section -->
<div class="py-5" style="background: linear-gradient(135deg, #f7971e 0%, #ffd200 100%)">
    <div class="container">
        <h2 class="mb-4 text-center">Produk EcoZense Terbaru</h2>
        <div class="row justify-content-center">
            <div class="col-md-3 mb-3">
                <div class="card shadow h-100">
                    <div class="card-body text-center">
                        <div
                            class="mb-3"
                            style="height: 80px; background: #eee; border-radius: 8px"
                        ></div>
                        <h5 class="card-title">Produk 1</h5>
                        <p class="card-text">Deskripsi produk singkat.</p>
                        <a href="#" class="btn btn-dark">Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card shadow h-100">
                    <div class="card-body text-center">
                        <div
                            class="mb-3"
                            style="height: 80px; background: #eee; border-radius: 8px"
                        ></div>
                        <h5 class="card-title">Produk 2</h5>
                        <p class="card-text">Deskripsi produk singkat.</p>
                        <a href="#" class="btn btn-dark">Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card shadow h-100">
                    <div class="card-body text-center">
                        <div
                            class="mb-3"
                            style="height: 80px; background: #eee; border-radius: 8px"
                        ></div>
                        <h5 class="card-title">Produk 3</h5>
                        <p class="card-text">Deskripsi produk singkat.</p>
                        <a href="#" class="btn btn-dark">Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Program Nasabah Section -->
<div class="py-5 text-center" style="background: linear-gradient(135deg, #d3cce3 0%, #e9e4f0 100%)">
    <div class="container">
        <h2 class="mb-4">Program Nasabah</h2>
        <p class="lead mb-4">
            Gabung jadi nasabah dan dapatkan berbagai keuntungan menabung sampah!
        </p>
        <a href="#" class="btn btn-success btn-lg">Daftar Sekarang</a>
    </div>
</div>

<!-- Lokasi Bank Sampah Section -->
<div class="py-5" style="background: linear-gradient(135deg, #f9d423 0%, #ff4e50 100%)">
    <div class="container">
        <h2 class="mb-4 text-center">Lokasi Bank Sampah di Batam</h2>
        <div class="rounded shadow overflow-hidden" style="height: 400px">
            <!-- Map Embed Example (Google Maps) -->
            <iframe
                src="https://www.google.com/maps/d/embed?mid=1u6p8u6nO8Y4yZ9Jv6uGZ8f5m3h4&hl=id"
                width="100%"
                height="100%"
                style="border: 0"
                allowfullscreen=""
                loading="lazy"
            ></iframe>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="py-4 bg-dark text-white text-center">
    <div class="container">
        <small>&copy; 2025 EcoZense. All rights reserved.</small>
    </div>
</footer>

<!-- Bootstrap & Icons CDN for demo purpose, remove if already included in app -->
<link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
/>
<link
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    rel="stylesheet"
/>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
