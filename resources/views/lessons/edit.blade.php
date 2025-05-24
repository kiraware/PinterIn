<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lessons') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <form method="POST" action="{{ route('courses.lessons.update', [$course, $lesson]) }}" class="space-y-4">
            @csrf
            @method('PUT')
            @include('lessons.form', ['lesson' => $lesson])
            <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 dark:bg-yellow-400 dark:hover:bg-yellow-500">
                Update
            </button>
        </form>
    </div>
</x-app-layout>
