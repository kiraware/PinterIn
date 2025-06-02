<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $course->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="text-lg">{{ $course->description }}</p>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">{{ floor($course->duration / 60) }}h
                        {{ $course->duration % 60 }}m</p>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Price:
                        ${{ number_format($course->price, 2) }}</p>

                    @if ($course->thumbnail)
                        <img src="{{ route('courses.thumbnail.show', $course) }}" class="mt-4 w-64 rounded shadow">
                    @endif
                </div>
            </div>

            @if (auth()->user()?->is_admin)
                <div class="flex justify-end">
                    <a href="{{ route('courses.edit', $course) }}"
                        class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit Course</a>
                    <form action="{{ route('courses.destroy', $course) }}" method="POST" class="ml-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')"
                            class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Delete</button>
                    </form>
                    <a href="{{ route('courses.lessons.create', $course) }}"
                        class="ml-2 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Lesson</a>
                </div>
            @endif

            <div class="mt-8 space-y-4">
                @foreach ($course->lessons as $index => $lesson)
                    <a href="{{ route('courses.lessons.show', [$course, $lesson]) }}"
                        class="block bg-yellow-400 dark:bg-yellow-600 hover:brightness-110 transition rounded-lg p-4 text-white shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-lg font-bold">
                                    Lesson {{ $index + 1 }}: {{ $lesson->title }}
                                </p>
                                <div class="flex items-center gap-4 mt-2 text-sm font-semibold">
                                    <span
                                        class="block text-white opacity-80">{{ ucfirst($lesson->difficulty->value) }}</span>
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-1 text-white opacity-80" fill="none"
                                            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M12 6v6l4 2"></path>
                                            <circle cx="12" cy="12" r="10"></circle>
                                        </svg>
                                        <span>{{ floor($lesson->duration / 60) }}h
                                            {{ $lesson->duration % 60 }}m</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 18l6-6-6-6"></path>
                                </svg>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
