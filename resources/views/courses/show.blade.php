<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <p>{{ $course->description }}</p>
        <p class="text-sm">Price: ${{ $course->price }}</p>

        <h3 class="mt-4 text-lg font-bold">Lessons</h3>
        <ul class="list-disc ml-6">
            @foreach ($course->lessons as $lesson)
                <li>
                    <a href="{{ route('lessons.show', [$course, $lesson]) }}" class="text-blue-500">{{ $lesson->title }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
