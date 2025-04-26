<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>EcoZense - Solusi Ramah Lingkungan</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-image-fixed">
        <!-- Navbar -->
        <x-home.navbar />

        <!-- Hero Section -->
        <x-home.hero />

        <!-- Pusat Informasi Section -->
        <x-home.information-center />

        <!-- About Us Section -->
        <x-home.about-us />

        <!-- Kenapa Pilih EcoZense Section -->
        <x-home.features />

        <!-- Produk Eco Enzim Section -->
        <x-home.products />

        <!-- Program Nasabah Section -->
        <x-home.program />

        <!-- Lokasi Bank Sampah Section -->
        <x-home.location />

        <!-- Footer -->
        <x-home.footer />
    </body>
</html>
