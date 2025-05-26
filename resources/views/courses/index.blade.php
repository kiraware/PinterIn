<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 dark:bg-green-800 text-green-800 dark:text-green-200 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if(auth()->user()->is_admin)
                <div class="mb-4">
                    <a href="{{ route('courses.create') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        + Add New Course
                    </a>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($courses as $course)
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition">
                        <img src="{{ route('courses.thumbnail.show', $course) }}" alt="{{ $course->title }}" class="w-full h-48 object-cover">

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
                                <a href="{{ route('courses.show', $course) }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 dark:hover:bg-indigo-500 text-sm">
                                    View
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-gray-700 dark:text-gray-300">No courses available.</div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
