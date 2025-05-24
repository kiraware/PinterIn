<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($courses as $course)
                <div class="p-4 rounded-lg shadow dark:bg-gray-800 bg-gray-100">
                    <h2 class="text-xl font-semibold">{{ $course->title }}</h2>
                    <p>{{ $course->description }}</p>
                    <a href="{{ route('courses.show', $course) }}" class="text-blue-500">View</a>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
