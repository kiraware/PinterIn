<x-guest-layout>
    @include('layouts.navigation')

    <!-- Page Heading -->
    @isset($header)
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <main class="py-12 px-4 max-w-7xl mx-auto bg-white dark:bg-gray-950 text-[#1b1b18] dark:text-white min-h-screen">
        <h2 class="text-3xl font-bold mb-8 text-gray-900 dark:text-white">All Courses</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($courses as $course)
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition">
                    <img src="{{ route('courses.thumbnail.show', $course) }}" alt="{{ $course->title }}"
                        class="w-full h-48 object-cover">

                    <div class="p-4 space-y-2">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-white">
                            {{ $course->title }}
                        </h3>

                        <p class="text-gray-500 dark:text-gray-300 text-sm line-clamp-2">
                            {{ Str::limit($course->description, 100) }}
                        </p>

                        <div class="flex items-center justify-between text-sm text-gray-600 dark:text-gray-400 mt-4">
                            <span>{{ $course->lessons->count() }} Lessons</span>
                            <span>{{ floor($course->duration / 60) }}h {{ $course->duration % 60 }}m</span>
                            <span>{{ $course->users->count() }} Students</span>
                        </div>

                        <div class="flex items-center justify-between mt-4">
                            <span class="text-lg font-bold text-indigo-600 dark:text-indigo-400">
                                ${{ number_format($course->price, 2) }}
                            </span>

                            {{-- Tombol Aksi --}}
                            @if (!$user)
                                {{-- Belum login --}}
                                <a href="{{ route('login') }}"
                                    class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 text-sm">
                                    Buy
                                </a>
                            @elseif ($user->is_admin)
                                {{-- Admin --}}
                                <a href="{{ route('courses.show', $course) }}"
                                    class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 text-sm">
                                    View
                                </a>
                            @else
                                {{-- User login biasa --}}
                                @if (in_array($course->id, $enrolledCourses))
                                    <a href="{{ route('courses.show', $course) }}"
                                        class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 text-sm">
                                        View
                                    </a>
                                @else
                                    <form action="route('courses.enroll', $course)" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 text-sm">
                                            Buy
                                        </button>
                                    </form>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

    <x-footer />
</x-guest-layout>
