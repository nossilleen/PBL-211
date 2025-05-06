@extends('layouts.app')

@section('content')
@php
    $currentRoute = Route::currentRouteName();
    $isDetailPage = true;
@endphp

<x-home.navbar :isDetailPage="$isDetailPage" />

<div class="bg-gray-100 min-h-screen pt-6 font-[\'Lexend Deca\',_sans-serif]">
    <div class="max-w-6xl mx-auto px-2 md:px-0">
        {{-- Gambar Utama Artikel --}}
        <div class="bg-white rounded-lg shadow mb-6 overflow-hidden">
            <img src="/images/Frame 2305.png" alt="Hero Artikel" class="w-full h-64 object-cover">
            <div class="flex items-center justify-between px-4 py-2 border-b">
                <div class="flex items-center space-x-2 text-xs text-gray-600">
                    <span>nama_penulis</span>
                    <span>|</span>
                    <span>tgl_publish</span>
                </div>
                <div class="flex items-center space-x-2">
                    <span>❤️</span>
                    <span>4</span>
                    <span>💬</span>
                    <span>5</span>
                    <span>🔗</span>
                </div>
            </div>
        </div>

        {{-- Judul --}}
        <h1 class="text-3xl md:text-4xl font-bold text-center mb-4">
            How You Can Make Chemical-Free Floor Cleaners from Kitchen Waste!
        </h1>

        <div class="flex flex-col lg:flex-row gap-8">
            {{-- Konten Artikel --}}
            <div class="flex-1">
                <p class="text-lg mb-4">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis...
                </p>
                <p class="text-lg mb-4">
                    Iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae...
                </p>
            </div>

            {{-- You may also like --}}
            <aside class="w-full lg:w-80">
                <div class="bg-white rounded-xl shadow p-4 mb-4">
                    <h3 class="font-semibold mb-3">You may also like</h3>
                    <ul class="space-y-3">
                        <li class="flex space-x-3">
                            <img src="/images/related1.jpg" class="w-16 h-16 object-cover rounded" alt="">
                            <div>
                                <div class="font-medium text-sm">How to use Eco Enzyme at home</div>
                                <div class="text-xs text-gray-500">Practical tips for using Eco Enzyme to keep your home clean and healthy.</div>
                            </div>
                        </li>
                        <li class="flex space-x-3">
                            <img src="/images/related2.jpg" class="w-16 h-16 object-cover rounded" alt="">
                            <div>
                                <div class="font-medium text-sm">Eco Enzyme as Organic Fertilizer</div>
                                <div class="text-xs text-gray-500">How to use Eco Enzyme as organic fertilizer for sustainable agriculture.</div>
                            </div>
                        </li>
                        <li class="flex space-x-3">
                            <img src="/images/related3.jpg" class="w-16 h-16 object-cover rounded" alt="">
                            <div>
                                <div class="font-medium text-sm">Reducing Waste with Eco Enzymes</div>
                                <div class="text-xs text-gray-500">Easy steps to process organic waste into useful Eco Enzymes.</div>
                            </div>
                        </li>
                        <li class="flex space-x-3">
                            <img src="/images/related4.jpg" class="w-16 h-16 object-cover rounded" alt="">
                            <div>
                                <div class="font-medium text-sm">Eco Enzymes for Skin Care</div>
                                <div class="text-xs text-gray-500">The efficacy of Eco Enzyme as a natural ingredient for healthy skin care.</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </aside>
        </div>

        {{-- Likes --}}
        <div class="mt-8 text-lg font-semibold">Likes</div>

        {{-- Feedback --}}
        <div class="mt-8">
            <div class="font-semibold mb-2">Feedback</div>
            <input type="text" class="w-full rounded-lg border px-4 py-3 mb-2" placeholder="Tuangkan komentar Anda...">
            <div class="text-sm font-medium mb-2">Lihat 8 komentar <span class="ml-1">▼</span></div>
        </div>
    </div>

    <x-home.footer />
</div>
@endsection