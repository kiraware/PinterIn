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

                    <div class="flex justify-end gap-4">
                        <a href="{{ route('courses.lessons.show', [$lesson->course, $lesson]) }}"
                            class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Cancel</a>
                        <button type="submit"
                            class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
