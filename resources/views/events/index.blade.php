<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <meta name="description" content="Event EcoZense - Temukan berbagai acara edukatif dan kolaboratif seputar eco enzim, daur ulang, dan lingkungan hijau." />
        <meta name="theme-color" content="#8DD363" />
        <title>Event - EcoZense</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100 overflow-x-hidden">
        <!-- Preloader -->
        <div id="preloader" class="fixed inset-0 bg-green-50 z-[9999] flex items-center justify-center">
            <div class="animate-spin rounded-full h-16 w-16 border-b-4 border-green-600"></div>
        </div>

        <!-- Navbar -->
        <x-home.navbar />

        <!-- Main Content Wrapper -->
        <main class="overflow-x-hidden">
            <!-- Hero Section for Articles -->
            <section class="h-[60vh] flex items-center relative">
                <!-- Background image layer -->
                <div class="absolute inset-0 z-0">
                    <img src="{{ asset('images/bg7.jpeg') }}" class="w-full h-full object-cover" alt="Background">
                </div>
                
                <!-- Overlay -->
                <div class="absolute inset-0 bg-green-900/50 z-10"></div>
                
                <!-- Content -->
                <div class="container mx-auto px-6 md:px-8 relative z-20 py-16 md:py-20">
                    <div class="max-w-4xl mx-auto text-center">
                        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 animate-fade-in">
                            Event & Kegiatan
                        </h1>
                        <p class="text-xl text-green-100 animate-slide-up mb-8">
                            Temukan berbagai acara edukatif dan kolaboratif seputar eco enzim, daur ulang, dan lingkungan hijau.
                        </p>
                        
                        <!-- Search Bar -->
                        <div class="max-w-xl mx-auto mt-8 relative">
                            <div class="flex items-center bg-white rounded-full shadow-lg overflow-hidden border-2 border-green-100 hover:border-green-200 transition-all duration-300">
                                <input type="text" placeholder="Cari event..." class="w-full px-6 py-3 text-gray-700 focus:outline-none text-lg">
                                <button class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 transition-all duration-300 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Event List Section -->
            <section class="py-12 bg-gray-100">
                <div class="container mx-auto px-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($events as $event)
                        <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-all duration-300">
                            <div class="p-4">
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $event->title }}</h3>
                                <p class="text-gray-600 text-sm mb-4">{{ Str::limit($event->description, 150) }}</p>
                                <a href="{{ route('events.show', ['id' => $event->id]) }}" class="inline-block bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition-all duration-300 text-sm">Selengkapnya</a>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        {{ $events->links() }}
                    </div>
                </div>
            </section>
        </main>

        <!-- Footer -->
        <x-home.footer />

        <!-- Back to top button -->
        <button id="back-to-top" class="fixed bottom-6 right-6 bg-green-600 text-white w-12 h-12 rounded-full shadow-lg flex items-center justify-center opacity-0 invisible transition-all duration-300 z-50 hover:bg-green-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
            </svg>
        </button>

        <script>
            // Preloader
            window.addEventListener('load', function() {
                document.getElementById('preloader').style.opacity = '0';
                setTimeout(function() {
                    document.getElementById('preloader').style.display = 'none';
                }, 500);
            });
            
            // Back to top button
            const backToTopButton = document.getElementById('back-to-top');
            
            if (backToTopButton) {
                window.addEventListener('scroll', function() {
                    if (window.pageYOffset > 300) {
                        backToTopButton.classList.remove('opacity-0', 'invisible');
                        backToTopButton.classList.add('opacity-100', 'visible');
                    } else {
                        backToTopButton.classList.remove('opacity-100', 'visible');
                        backToTopButton.classList.add('opacity-0', 'invisible');
                    }
                });
                
                backToTopButton.addEventListener('click', function() {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            }
        </script>
    </body>
</html>
