<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Lesson: {{ $lesson->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
                <form method="POST" action="{{ route('courses.lessons.update', [$lesson->course, $lesson]) }}">
                    @csrf
                    @method('PUT')
                    @include('lessons._form', ['lesson' => $lesson])
                    <button type="submit" class="mt-4 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        Update Lesson
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
