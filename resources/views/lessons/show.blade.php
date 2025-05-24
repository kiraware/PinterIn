<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lessons') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <p>{{ $lesson->content }}</p>
        <p class="text-sm text-gray-500 dark:text-gray-400">Duration: {{ $lesson->duration }} minutes</p>
    </div>
</x-app-layout>
