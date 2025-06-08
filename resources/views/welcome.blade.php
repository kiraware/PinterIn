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
            class="py-20 px-4 lg:px-8 w-full mx-auto bg-linear-to-br from-[#F3F4F6] to-white dark:from-[#272A31] dark:to-[#101015] shadow-inner">
            <div class="flex flex-col-reverse lg:flex-row items-center justify-between gap-12">
                <!-- Text Section -->
                <div class="w-full lg:w-1/2 text-center lg:text-left px-32">
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

    <x-footer></x-footer>
</body>

</html>
