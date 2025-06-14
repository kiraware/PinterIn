<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Lesson: {{ $lesson->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 text-gray-900 dark:text-white p-6 rounded-lg shadow-lg">
                <form method="POST" action="{{ route('courses.lessons.update', [$lesson->course, $lesson]) }}">
                    @csrf
                    @method('PUT')

                    {{-- Title --}}
                    <div class="mb-4">
                        <label for="title"
                            class="block text-sm font-medium text-gray-900 dark:text-white">Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $lesson->title) }}"
                            class="mt-1 block w-full rounded p-2 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    {{-- Content --}}
                    <div class="mb-4">
                        <label for="content"
                            class="block text-sm font-medium text-gray-900 dark:text-white">Content</label>
                        <input id="content" type="hidden" name="content"
                            value="{{ old('content', $lesson->content) }}">
                        <trix-editor input="content"
                            class="trix-content bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white rounded-md"></trix-editor>
                    </div>

                    {{-- Difficulty --}}
                    <div class="mb-4">
                        <label for="difficulty"
                            class="block text-sm font-medium text-gray-900 dark:text-white">Difficulty</label>
                        <select name="difficulty" id="difficulty"
                            class="mt-1 block w-full rounded p-2 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @foreach (['beginner', 'intermediate', 'advanced'] as $level)
                                <option value="{{ $level }}"
                                    {{ old('difficulty', $lesson->difficulty->value) === $level ? 'selected' : '' }}>
                                    {{ ucfirst($level) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Duration --}}
                    <div class="mb-6">
                        <label for="duration" class="block text-sm font-medium text-gray-900 dark:text-white">Duration
                            (minutes)</label>
                        <input type="number" name="duration" id="duration"
                            value="{{ old('duration', $lesson->duration) }}"
                            class="mt-1 block w-full rounded p-2 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    <div class="flex justify-end gap-3">
                        <a href="{{ route('courses.lessons.show', [$lesson->course, $lesson]) }}"
                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">Cancel</a>
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Trix --}}
    <link rel="stylesheet" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

    {{-- Only Bold & Italic --}}
    <style>
        trix-toolbar [data-trix-button-group="text-tools"]> :not([data-trix-attribute="bold"]):not([data-trix-attribute="italic"]) {
            display: none !important;
        }

        trix-toolbar [data-trix-button-group]:not([data-trix-button-group="text-tools"]) {
            display: none !important;
        }

        trix-toolbar .trix-button {
            color: white;
        }

        trix-toolbar .trix-button:hover {
            background-color: #4B5563;
            border-radius: 0.375rem;
        }

        html.light trix-toolbar .trix-button {
            color: black;
        }

        html.light trix-toolbar .trix-button:hover {
            background-color: #E5E7EB;
        }

        trix-toolbar {
            border: none;
            background-color: transparent;
        }
    </style>
</x-app-layout>
