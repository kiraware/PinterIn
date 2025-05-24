<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lessons') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <form method="POST" action="{{ route('courses.lessons.store', $course) }}" class="space-y-4">
            @csrf
            @include('lessons.form')
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">
                Create
            </button>
        </form>
    </div>
</x-app-layout>
