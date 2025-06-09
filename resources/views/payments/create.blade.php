<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">Buy Course</h2>
    </x-slot>

    <div class="p-4 sm:p-8 bg-white dark:bg-gray-900 shadow sm:rounded-lg max-w-2xl mx-auto">
        <form method="POST" action="{{ route('payments.store', $course) }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-4 text-center">
                <p class="text-3xl font-bold text-yellow-500">Rp{{ number_format($course->price, 0, ',', '.') }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-2">Pilih Bank</label>
                <select name="bank_id" required class="w-full rounded border-gray-300 dark:bg-gray-800 dark:text-white">
                    @foreach ($banks as $bank)
                        <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-2">Nomor Rekening Anda</label>
                <input type="text" name="account_number" required
                    class="w-full rounded border-gray-300 dark:bg-gray-800 dark:text-white" />
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-2">Upload Bukti Transfer</label>
                <input type="file" name="payment_proof" required
                    class="block w-full text-gray-900 dark:text-white file:mr-4 file:py-2 file:px-4 file:border file:rounded file:text-sm file:bg-yellow-500 file:text-white hover:file:bg-yellow-600" />
                <p class="text-sm text-gray-500 mt-1">JPEG/PNG max 5MB</p>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                    Proceed
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
