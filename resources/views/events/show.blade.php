@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Hero Section dengan Background Image -->
    <div class="relative h-[60vh] w-full">
        @if($event->image)
        <div class="absolute inset-0">
            <img src="{{ asset($event->image) }}" alt="Banner" class="w-full h-full object-cover">
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
                            <span>{{ \Carbon\Carbon::parse($event->date)->format('d F Y H:i') }}</span>
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
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Deskripsi Event</h2>
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
                        <p class="text-gray-600">{{ \Carbon\Carbon::parse($event->date)->format('d F Y H:i') }}</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-lg font-medium text-gray-700 mb-2">Lokasi</h3>
                        <p class="text-gray-600">{{ $event->location }}</p>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 justify-between items-center">
                    <a href="{{ route('events.index') }}" 
                       class="inline-flex items-center px-6 py-3 border border-gray-300 text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali ke Daftar Event
                    </a>
                    <button class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <i class="fas fa-ticket-alt mr-2"></i>
                        Daftar Event
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Back to Top Button -->
<button id="back-to-top" class="fixed bottom-6 right-6 bg-green-600 text-white w-12 h-12 rounded-full shadow-lg flex items-center justify-center opacity-0 invisible transition-all duration-300 z-50 hover:bg-green-700">
    <i class="fas fa-arrow-up"></i>
</button>

<x-home.footer />

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
</script>
@endpush
@endsection