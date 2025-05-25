<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pro Player Academy</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-[#0a0a0a] text-white min-h-screen flex flex-col items-center justify-center p-6 bg-gradient-to-br from-[#272A31] to-[#101015]">

    {{-- Logo Burung Hantu --}}
    <div class="mb-6">
        <img src="{{ asset('images/logo.png') }}" class="w-40 mx-auto">
    </div>

    {{-- Teks Judul --}}
    <h1 class="text-2xl sm:text-3xl md:text-4xl text-center font-bold leading-snug">
        Jadilah Pro Player Mobile <br> Legends,
        <span class="text-yellow-500 font-bold">Mulai dari Sini!</span>
    </h1>

    {{-- Tombol Get Started --}}
    <div class="mt-8">
        <a href="{{ route('login') }}"
           class="bg-yellow-600 hover:bg-yellow-700 text-white px-6 py-3 rounded-full text-lg font-medium transition duration-300">
            Get Started
        </a>
    </div>
</body>
</html>
