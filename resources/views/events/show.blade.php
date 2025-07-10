@extends('layouts.app')

@section('content')
@php
    $now = \Carbon\Carbon::now();
    $start = \Carbon\Carbon::parse($event->date);
    $end = $event->expired_at ? \Carbon\Carbon::parse($event->expired_at) : null;
    
    // Format untuk tampilan
    $startDateFormatted = $start->format('d F Y H:i');
    $endDateFormatted = $end ? $end->format('d F Y H:i') : null;
    
    // Perbaikan logika status event
    if($now->lt($start)) {
        $eventStatus = 'Belum'; // belum dimulai
        $countdownTs = $start->timestamp;
        $countdownLabel = 'Acara akan dimulai dalam';
        $countdownEnd = $start->diffInSeconds($now);
    } elseif($end && $now->gt($end)) {
        $eventStatus = 'Selesai';
        $countdownTs = null; // Tidak perlu countdown jika sudah selesai
    } else {
        $eventStatus = 'Tersedia';
        if($end) {
            $countdownTs = $end->timestamp;
            $countdownLabel = 'Acara akan ditutup dalam';
            $countdownEnd = $end->diffInSeconds($now);
        } else {
            $countdownTs = null; // Tidak ada tanggal akhir
        }
    }
@endphp
<div class="min-h-screen bg-gray-50">
    <!-- Hero Section dengan Background Image -->
    <div class="relative h-[60vh] w-full">
        @if($event->image)
        <div class="absolute inset-0">
            <img src="{{ asset($event->image) }}" alt="Banner" class="w-full h-full object-cover object-center">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        </div>
        @endif
        
        <div class="relative h-full flex items-center">
            <div class="container mx-auto px-4">
                <div class="max-w-3xl">
                    <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">{{ $event->title }}</h1>
                    <div class="flex flex-wrap gap-4 text-white">
                        <div class="flex items-center">
                            <i class="fas fa-calendar-alt mr-2"></i>
                            <span>{{ $startDateFormatted }} @if($endDateFormatted) – {{ $endDateFormatted }} @endif</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            <span>{{ $event->location }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto">
            <!-- Description Card -->
            <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Deskripsi Acara</h2>
                <div class="prose max-w-none">
                    {!! nl2br(e($event->description)) !!}
                </div>
            </div>

            <!-- Registration Card -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Informasi Pendaftaran</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-lg font-medium text-gray-700 mb-2">Tanggal & Waktu</h3>
                        <p class="text-gray-600">{{ $startDateFormatted }} @if($endDateFormatted) – {{ $endDateFormatted }} @endif</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-lg font-medium text-gray-700 mb-2">Lokasi</h3>
                        <p class="text-gray-600">{{ $event->location }}</p>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 justify-between items-center" id="registrationSection">
                    <a href="{{ route('events.index') }}" 
                       class="inline-flex items-center px-6 py-3 border border-gray-300 text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali ke Daftar Acara
                    </a>

                    @if($eventStatus == 'Tersedia')
                        @if($event->link_form_acara)
                            <button
                                type="button"
                                onclick="showDaftarEventModal('{{ $event->link_form_acara }}')"
                                class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                <i class="fas fa-ticket-alt mr-2"></i>
                                Daftar Acara
                            </button>
                        @else
                            <button class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-gray-400 cursor-not-allowed" disabled>
                                <i class="fas fa-times-circle mr-2"></i>
                                Link Pendaftaran Belum Tersedia
                            </button>
                        @endif
                    @elseif($eventStatus == 'Belum')
                        <button class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-yellow-500 cursor-not-allowed" disabled>
                            <i class="fas fa-clock mr-2"></i>
                            Acara Belum Dimulai
                        </button>
                    @else
                        <button class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-gray-400 cursor-not-allowed" disabled>
                            <i class="fas fa-times-circle mr-2"></i>
                            Acara Telah Selesai
                        </button>
                    @endif
                </div>
                @if(isset($countdownTs) && $countdownTs > $now->timestamp)
                <div class="mt-4 text-center text-sm text-gray-700" id="countdownWrapper">
                    <span>{{ $countdownLabel }} <span id="countdown"></span></span>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Back to Top Button -->
<button id="back-to-top" class="fixed bottom-6 right-6 bg-green-600 text-white w-12 h-12 rounded-full shadow-lg flex items-center justify-center opacity-0 invisible transition-all duration-300 z-50 hover:bg-green-700">
    <i class="fas fa-arrow-up"></i>
</button>

<x-home.footer />

<!-- Modal Konfirmasi Daftar Event -->
<div id="modalDaftarEvent" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-sm w-full text-center transform scale-90 opacity-0 transition-all duration-300" id="modalDaftarEventBox">
        <h2 class="text-2xl font-bold mb-4 text-green-600">Konfirmasi Pendaftaran</h2>
        <p class="mb-4 text-gray-700">Apakah anda ingin mendaftar acara tersebut?</p>
        <p class="mb-6 text-gray-700 break-all">Link: <span id="eventLinkText" class="text-blue-600 underline"></span></p>
        <div class="flex justify-center gap-4">
            <button onclick="closeDaftarEventModal()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-2 rounded">Batal</button>
            <button id="btnKonfirmasiDaftar" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded">Ya, Daftar</button>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Back to Top Button
    const backToTopButton = document.getElementById('back-to-top');
    
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 100) {
            backToTopButton.classList.remove('opacity-0', 'invisible');
            backToTopButton.classList.add('opacity-100', 'visible');
        } else {
            backToTopButton.classList.remove('opacity-100', 'visible');
            backToTopButton.classList.add('opacity-0', 'invisible');
        }
    });

    backToTopButton.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    function showDaftarEventModal(link) {
        document.getElementById('modalDaftarEvent').classList.remove('hidden');
        const box = document.getElementById('modalDaftarEventBox');
        document.getElementById('eventLinkText').textContent = link;
        setTimeout(() => {
            box.classList.remove('scale-90', 'opacity-0');
            box.classList.add('scale-100', 'opacity-100');
        }, 10);
        document.getElementById('btnKonfirmasiDaftar').onclick = function() {
            window.open(link, '_blank');
            closeDaftarEventModal();
        };
    }

    function closeDaftarEventModal() {
        const box = document.getElementById('modalDaftarEventBox');
        box.classList.remove('scale-100', 'opacity-100');
        box.classList.add('scale-90', 'opacity-0');
        setTimeout(() => {
            document.getElementById('modalDaftarEvent').classList.add('hidden');
        }, 250);
    }

    @if(isset($countdownTs))
    function updateCountdown() {
        const target = {{ $countdownTs }} * 1000;
        const now = Date.now();
        const diff = target - now;
        
        // Reload halaman jika countdown sudah selesai
        if(diff <= 0) { 
            console.log("Countdown selesai, memuat ulang halaman");
            location.reload(); 
            return; 
        }
        
        // Format countdown
        const sec = Math.floor(diff / 1000) % 60;
        const min = Math.floor(diff / (1000*60)) % 60;
        const hrs = Math.floor(diff / (1000*60*60)) % 24;
        const days= Math.floor(diff / (1000*60*60*24));
        
        // Tampilkan dalam format yang lebih jelas
        const parts = [];
        if(days > 0) parts.push(days + ' hari');
        if(hrs > 0 || days > 0) parts.push(String(hrs).padStart(2,'0') + ' jam');
        parts.push(String(min).padStart(2,'0') + ':' + String(sec).padStart(2,'0'));
        
        const countdownEl = document.getElementById('countdown');
        if (countdownEl) {
            countdownEl.textContent = parts.join(' ');
        }
    }
    
    // Update countdown setiap detik
    updateCountdown();
    const countdownInterval = setInterval(updateCountdown, 1000);
    
    // Hentikan interval jika halaman berganti
    window.addEventListener('beforeunload', function() {
        clearInterval(countdownInterval);
    });
    @endif
</script>
@endpush
@endsection