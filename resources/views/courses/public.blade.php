<x-guest-layout>
    @include('layouts.navigation')

    @isset($header)
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <main
        class="py-12 w-full px-4 md:px-20 mx-auto bg-white dark:bg-gray-950 text-[#1b1b18] dark:text-white min-h-screen">
        <h2 class="text-3xl font-bold mb-8 text-gray-900 dark:text-white">All Courses</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($courses as $course)
                <div
                    class="relative bg-[#1B1B1B] dark:bg-gray-900 rounded-2xl hover:border hover-glow shadow-md overflow-hidden hover:shadow-xl glass-card transition">
                    <!-- Gambar -->
                    <div class="aspect-video w-full overflow-hidden rounded-t-2xl">
                        <img src="{{ route('courses.thumbnail.show', $course) }}" alt="{{ $course->title }}"
                            class="w-full h-full object-cover">
                    </div>

                    <!-- Konten -->
                    <div class="p-4 pb-16 space-y-3">
                        <!-- Judul dan Harga -->
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-bold text-white">
                                {{ $course->title }}
                            </h3>
                            <span class="text-amber-500 font-semibold">
                                Rp{{ number_format($course->price, 0, ',', '.') }}
                            </span>
                        </div>

                        <!-- Bar Informasi -->
                        <div
                            class="flex justify-between items-center text-sm text-gray-300 bg-[#2c2c2e] p-3 rounded-lg">
                            <div class="flex flex-col md:flex-row items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M5 4h10v2H5V4zM5 9h10v2H5V9zM5 14h10v2H5v-2z" />
                                </svg>
                                <span>{{ $course->lessons->count() }} Lessons</span>
                            </div>
                            <div class="flex flex-col md:flex-row items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 2a8 8 0 100 16 8 8 0 000-16zm1 9H9V5h2v6z" />
                                </svg>
                                <span>{{ floor($course->duration / 60) }}h {{ $course->duration % 60 }}m</span>
                            </div>
                            <div class="flex flex-col md:flex-row items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 2a5 5 0 00-5 5v1a5 5 0 1010 0V7a5 5 0 00-5-5zM4 13.25C4 11.179 8 10 10 10s6 1.179 6 3.25V16H4v-2.75z" />
                                </svg>
                                <span>{{ $course->users->count() }}+ Students</span>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Aksi di kanan bawah -->
                    <div class="absolute bottom-4 right-4">
                        @if (!$user)
                            <a href="{{ route('login') }}"
                                class="bg-yellow-500 hover:bg-amber-600 text-white font-semibold py-2 px-4 rounded-full shadow transition">
                                Buy
                            </a>
                        @elseif ($user->is_admin || in_array($course->id, $enrolledCourses))
                            <a href="{{ route('courses.show', $course) }}"
                                class="bg-yellow-500 hover:bg-amber-600 text-white font-semibold py-2 px-4 rounded-full shadow transition">
                                View
                            </a>
                        @else
                            <a href="{{ route('payments.create', $course) }}"
                                class="bg-yellow-500 hover:bg-amber-600 text-white font-semibold py-2 px-4 rounded-full shadow transition">
                                Buy
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-8">
            {{ $courses->links() }}
        </div>
    </main>

    <x-footer />
</x-guest-layout>
