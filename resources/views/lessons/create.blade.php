<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Add Lesson to {{ $course->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
                <form method="POST" action="{{ route('courses.lessons.store', $course) }}">
                    @csrf
                    @include('lessons._form', ['lesson' => null])

                    <div class="flex justify-end gap-4">
                        <a href="{{ route('courses.show', $course) }}"
                            class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Cancel</a>
                        <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
