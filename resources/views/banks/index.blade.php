<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100">Banks</h2>
            <a href="{{ route('banks.create') }}"
                class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md text-sm font-medium shadow">
                Add Bank
            </a>
        </div>
    </x-slot>

    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($banks as $bank)
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-6 flex flex-col justify-between">
                <div class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">
                    {{ $bank->name }}
                </div>
                <div class="mt-4 flex justify-end gap-2">
                    <a href="{{ route('banks.edit', $bank) }}"
                        class="text-sm px-3 py-1 rounded bg-blue-500 hover:bg-blue-600 text-white font-medium">
                        Edit
                    </a>
                    <form action="{{ route('banks.destroy', $bank) }}" method="POST"
                        onsubmit="return confirm('Delete this bank?')">
                        @csrf @method('DELETE')
                        <button type="submit"
                            class="text-sm px-3 py-1 rounded bg-red-500 hover:bg-red-600 text-white font-medium">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
