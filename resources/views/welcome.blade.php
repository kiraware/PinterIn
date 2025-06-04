<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-white dark:bg-gray-950 text-[#1b1b18] dark:text-white min-h-screen">
    <header
        class="w-full h-20 flex items-center justify-between px-4 lg:px-8 bg-[#1B1B1B] dark:bg-gray-900 text-[#EDEDEC] dark:text-gray-100 fixed top-0 left-0 z-50 shadow-md">
        <div class="flex items-center gap-2">
            <img src="{{ asset('images/logo.png') }}" alt="Pinterin Logo" class="h-16 w-auto object-contain">
        </div>

        <nav class="hidden md:flex items-center gap-8 text-sm font-medium">
            <a href="{{ route('home') }}" class="hover:text-[#D4AF37] transition-colors duration-200">Home</a>
            <a href="#" class="hover:text-[#D4AF37] transition-colors duration-200">About</a>
            <a href="{{ route('courses.publicIndex') }}"
                class="hover:text-[#D4AF37] transition-colors duration-200">Courses</a>
        </nav>

        <div class="flex items-center">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="inline-block px-6 py-2 bg-[#D4AF37] text-[#1B1B1B] font-semibold rounded-md shadow-md hover:bg-[#C2A02C] transition-colors duration-200 text-sm leading-normal">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="inline-flex items-center justify-center gap-2 px-6 py-2 bg-[#D4AF37] text-white font-semibold rounded-md shadow-md hover:bg-[#C2A02C] transition-colors duration-200 text-sm leading-normal">
                            LOGIN
                        </a>
                    @endauth
                </nav>
            @endif
        </div>
    </header>

    <div class="pt-20"></div>

    <main class="w-full">
        <section
            class="py-20 px-4 lg:px-8 max-w-7xl mx-auto bg-gradient-to-br from-[#F3F4F6] to-white dark:from-[#272A31] dark:to-[#101015] shadow-inner">
            <div class="flex flex-col-reverse lg:flex-row items-center justify-between gap-12">
                <!-- Text Section -->
                <div class="w-full lg:w-1/2 text-center lg:text-left">
                    <h1
                        class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-[#1B1B18] dark:text-white mb-4 leading-tight">
                        Pintar Bersama <br>
                        <span class="text-[#D4AF37]">PinterIn</span>
                    </h1>
                    <p class="text-base sm:text-lg text-gray-700 dark:text-gray-300 mb-6">
                        Belajar skill baru secara online dan fleksibel melalui kursus-kursus yang kami berikan
                    </p>
                    <a href="{{ route('courses.publicIndex') }}"
                        class="inline-block px-6 py-3 bg-[#D4AF37] text-white font-semibold rounded-md shadow-md hover:bg-[#C2A02C] transition-colors duration-200 text-sm">
                        Learn Now →
                    </a>
                </div>

                <!-- Image Section -->
                <div class="w-full lg:w-1/2">
                    <img src="{{ asset('images/hero-illustration.png') }}" alt="Online Learning Illustration"
                        class="w-full h-auto max-w-md mx-auto drop-shadow-xl">
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-[#1B1B1B] dark:bg-gray-900 text-[#EDEDEC] dark:text-gray-200 py-8">
        <div class="max-w-7xl mx-auto px-4 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="flex flex-col items-center md:items-start text-center md:text-left">
                <div class="flex items-center gap-2 mb-4">
                    <img src="{{ asset('images/logo.png') }}" alt="Pinterin Logo" class="h-16 w-auto object-contain">
                </div>
                <p class="text-sm text-gray-400 dark:text-gray-300 mb-4">
                    Pinterin adalah platform edukasi online terkemuka yang menyediakan kursus berkualitas untuk
                    meningkatkan keahlian Anda.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-[#D4AF37] transition-colors duration-200">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33V22H12c5.523 0 10-4.477 10-10z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-[#D4AF37] transition-colors duration-200">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M8.297 18.297L3 21l2.703-5.297c-1.042-1.28-1.703-2.906-1.703-4.703C4 5.477 7.523 2 12 2s8 3.477 8 7.703c0 4.227-3.523 7.703-8 7.703a6.792 6.792 0 01-3.703-1.006z" />
                        </svg>
                    </a>
                </div>
            </div>

            <div class="text-center md:text-left">
                <h4 class="text-lg font-semibold text-white mb-4">Navigasi Cepat</h4>
                <ul class="space-y-2 text-gray-400 dark:text-gray-300 text-sm">
                    <li><a href="{{ route('home') }}"
                            class="hover:text-[#D4AF37] transition-colors duration-200">Home</a></li>
                    <li><a href="#" class="hover:text-[#D4AF37] transition-colors duration-200">About Us</a></li>
                    <li><a href="{{ route('courses.publicIndex') }}"
                            class="hover:text-[#D4AF37] transition-colors duration-200">Courses</a></li>
                </ul>
            </div>

            <div class="text-center md:text-left">
                <h4 class="text-lg font-semibold text-white mb-4">Hubungi Kami</h4>
                <address class="space-y-2 text-gray-400 dark:text-gray-300 text-sm not-italic">
                    <p>Jl. Bumimanti II, Bandar Lampung, Indonesia</p>
                    <p>+62 812-3456-7890</p>
                    <p>info@pinterin.com</p>
                </address>
            </div>
        </div>

        <div class="text-center text-gray-500 dark:text-gray-400 text-sm mt-8 border-t border-gray-700 pt-4">
            &copy; {{ date('Y') }} Pinterin. All rights reserved.
        </div>
    </footer>
</body>

</html>
