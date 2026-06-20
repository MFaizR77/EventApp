<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome to EventApp</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50 text-gray-800 min-h-screen flex flex-col justify-between">
        
        <!-- Header / Navbar -->
        <header class="w-full bg-white border-b border-gray-100 shadow-sm">
            <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
                <div class="flex items-center space-x-2 text-indigo-600 font-bold text-xl">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span>EventApp</span>
                </div>
                
                <nav class="flex space-x-6 items-center">
                    <a href="{{ route('events.index') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900 transition">Daftar Event</a>
                    
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('dashboard') }}" class="text-sm font-semibold bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md transition shadow-sm">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900 transition">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-sm font-semibold bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md transition shadow-sm">Register</a>
                            @endif
                        @endauth
                    @endif
                </nav>
            </div>
        </header>

        <!-- Hero Section -->
        <main class="flex-grow flex items-center justify-center px-6 py-16">
            <div class="max-w-3xl text-center space-y-8">
                <div class="space-y-4">
                    <span class="inline-flex items-center px-3 py-1 text-xs font-medium text-indigo-700 bg-indigo-50 border border-indigo-150 rounded-full">
                        Event Management System
                    </span>
                    <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 tracking-tight leading-tight">
                        Temukan dan Daftarkan Diri Anda di <span class="text-indigo-600">Event Pilihan</span>
                    </h1>
                    <p class="text-md md:text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
                        Aplikasi web sederhana untuk mengelola dan mendaftar berbagai event menarik. Dapatkan email konfirmasi otomatis setelah Anda mendaftar.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ route('events.index') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white text-base font-medium rounded-lg transition shadow-sm">
                        Lihat Daftar Event
                        <svg class="w-5 h-5 ms-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                    
                    @guest
                        <a href="{{ route('register') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 bg-white hover:bg-gray-50 text-gray-700 text-base font-medium rounded-lg border border-gray-300 transition shadow-sm">
                            Daftar Akun Baru
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 bg-white hover:bg-gray-50 text-gray-700 text-base font-medium rounded-lg border border-gray-300 transition shadow-sm">
                            Buka Dashboard
                        </a>
                    @endguest
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="w-full py-6 text-center border-t border-gray-200 bg-white text-gray-500 text-xs">
            <p>&copy; {{ date('Y') }} EventApp. Semua hak cipta dilindungi.</p>
        </footer>

    </body>
</html>
