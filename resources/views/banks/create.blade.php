<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100">Add New Bank</h2>
    </x-slot>

    <form action="{{ route('banks.store') }}" method="POST"
        class="max-w-xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-xl shadow mt-4">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bank Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                class="mt-1 block w-full rounded-md bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 focus:ring-yellow-500 focus:border-yellow-500"
                required>
            @error('name')
                <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end">
            <a href="{{ route('banks.index') }}"
                class="mr-4 text-sm text-gray-600 dark:text-gray-300 hover:underline">Cancel</a>
            <button type="submit"
                class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-md text-sm font-medium">
                Create
            </button>
        </div>
    </form>
</x-app-layout>
