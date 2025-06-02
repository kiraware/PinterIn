<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $lesson->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
                <p class="mb-4"><span class="font-semibold">Difficulty:</span> {{ ucfirst($lesson->difficulty->value) }}
                </p>
                <p class="mb-4"><span class="font-semibold">Duration:</span>
                    {{ gmdate('H\h i\m', $lesson->duration * 60) }}</p>
                <div class="prose dark:prose-invert max-w-none">
                    {!! nl2br(e($lesson->content)) !!}
                </div>

                @if (auth()->user()->is_admin)
                    <div class="mt-6">
                        <a href="{{ route('courses.lessons.edit', [$lesson->course, $lesson]) }}"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
                            Edit Lesson
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
