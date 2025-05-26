<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create New Course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                            <input type="text" name="title" class="w-full mt-1 p-2 border rounded bg-gray-100 dark:bg-gray-700 dark:text-white" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                            <textarea name="description" rows="4" class="w-full mt-1 p-2 border rounded bg-gray-100 dark:bg-gray-700 dark:text-white" required></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Price (USD)</label>
                            <input type="number" step="0.01" name="price" class="w-full mt-1 p-2 border rounded bg-gray-100 dark:bg-gray-700 dark:text-white" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Thumbnail</label>
                            <input type="file" name="thumbnail" accept="image/*" class="w-full mt-1 p-2 border rounded bg-gray-100 dark:bg-gray-700 dark:text-white">
                        </div>

                        <div class="flex justify-end">
                            <a href="{{ route('courses.index') }}" class="mr-4 text-sm text-gray-600 dark:text-gray-400 hover:underline">Cancel</a>
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
