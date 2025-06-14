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

                    {{-- Title --}}
                    <div class="mb-4">
                        <label for="title"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}"
                            class="mt-1 block w-full rounded p-2 bg-gray-100 dark:bg-gray-700 text-black dark:text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            required>
                        <x-input-error :messages="$errors->get('title')" class="mt-1 text-red-500 text-sm" />
                    </div>

                    {{-- Content (Trix) --}}
                    <div class="mb-4">
                        <label for="content"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Content</label>
                        <input id="content" type="hidden" name="content" value="{{ old('content') }}">
                        <trix-editor input="content"
                            class="trix-content bg-gray-100 dark:bg-gray-700 text-black dark:text-white rounded-md"></trix-editor>
                        <x-input-error :messages="$errors->get('content')" class="mt-1 text-red-500 text-sm" />
                    </div>

                    {{-- Difficulty --}}
                    <div class="mb-4">
                        <label for="difficulty"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Difficulty</label>
                        <select name="difficulty" id="difficulty"
                            class="mt-1 block w-full rounded p-2 bg-gray-100 dark:bg-gray-700 text-black dark:text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            required>
                            @foreach (\App\Enums\LessonDifficulty::cases() as $level)
                                <option value="{{ $level->value }}" @selected(old('difficulty') === $level->value)>
                                    {{ ucfirst($level->value) }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('difficulty')" class="mt-1 text-red-500 text-sm" />
                    </div>

                    {{-- Duration --}}
                    <div class="mb-6">
                        <label for="duration"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Duration
                            (minutes)</label>
                        <input type="number" name="duration" id="duration" value="{{ old('duration') }}"
                            class="mt-1 block w-full rounded p-2 bg-gray-100 dark:bg-gray-700 text-black dark:text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            min="1" required>
                        <x-input-error :messages="$errors->get('duration')" class="mt-1 text-red-500 text-sm" />
                    </div>

                    {{-- Buttons --}}
                    <div class="flex justify-end gap-4">
                        <a href="{{ route('courses.show', $course) }}"
                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">Cancel</a>
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Trix --}}
    <link rel="stylesheet" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

    {{-- Customize Trix: Only Bold & Italic --}}
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
    </style>
</x-app-layout>
