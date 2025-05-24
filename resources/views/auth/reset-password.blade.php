<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#272A31] to-[#101015]">
        <div class="flex text-white overflow-hidden w-full max-w-4xl">
            <!-- back button -->
                <a href="{{ route('login') }}" class="absolute top-4 left-4 flex items-center text-yellow-600 hover:text-yellow-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali
                </a>

            <!-- Left: Logo & Brand -->
            <div class="w-1/2 flex flex-col items-center justify-center p-10 ">
                <img src="{{ asset('images/logo.png') }}" alt="Pinterin Logo" class="w-[230px] mx-auto mb-4">
            </div>

            <!-- Right: Form -->
            <div class="w-1/2 text-white p-10 relative">

                <h2 class="text-2xl font-bold mb-4 text-center">Kata Sandi Baru</h2>

                @if ($errors->any())
                    <div class="text-red-600 text-sm mb-3">
                        Kata sandi baru harus berbeda dengan sebelumnya!
                    </div>
                @endif

                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <!-- Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email (hidden) -->
                    <input type="hidden" name="email" value="{{ old('email', $request->email) }}">

                    <!-- Password -->
                    <div class="mb-4">
                        <input id="password" type="password" name="password" required autocomplete="new-password"
                            placeholder="Enter Password"
                            class="text-black w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-gray-800" />
                        <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-500 text-sm" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-4">
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                            placeholder="Confirm Password"
                            class="text-black w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-gray-800" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-red-500 text-sm" />
                    </div>

                    <!-- Submit -->
                    <div>
                        <button type="submit"
                            class="w-full bg-gray-800 text-white py-2 rounded-md hover:bg-gray-700 transition">
                            Lanjut
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-guest-layout>
