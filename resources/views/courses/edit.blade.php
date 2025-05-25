<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('courses.update', $course) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                            <input type="text" name="title" value="{{ old('title', $course->title) }}" class="w-full mt-1 p-2 border rounded bg-gray-100 dark:bg-gray-700 dark:text-white" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                            <textarea name="description" rows="4" class="w-full mt-1 p-2 border rounded bg-gray-100 dark:bg-gray-700 dark:text-white" required>{{ old('description', $course->description) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Price (USD)</label>
                            <input type="number" step="0.01" name="price" value="{{ old('price', $course->price) }}" class="w-full mt-1 p-2 border rounded bg-gray-100 dark:bg-gray-700 dark:text-white" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Thumbnail</label>
                            @if ($course->thumbnail)
                                <div class="mb-2">
                                    <img src="{{ route('courses.thumbnail.show', $course) }}" alt="Thumbnail" class="h-24 rounded">
                                </div>
                            @endif
                            <input type="file" name="thumbnail" accept="image/*" class="w-full mt-1 p-2 border rounded bg-gray-100 dark:bg-gray-700 dark:text-white">
                        </div>

                        <div class="flex justify-end">
                            <a href="{{ route('courses.index') }}" class="mr-4 text-sm text-gray-600 dark:text-gray-400 hover:underline">Cancel</a>
                            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
