<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#272A31] to-[#101015]">
        <div class="flex text-white overflow-hidden w-full max-w-4xl">
            <!-- back button -->
            <a href="{{ route('login') }}"
                class="absolute top-4 left-4 flex items-center text-[#C0994A] hover:text-yellow-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali
            </a>

            <!-- Left: Logo & Brand -->
            <div class="w-1/2 flex flex-col items-center justify-center p-10 ">
                <img src="{{ asset('images/logo 2.png') }}" alt="Pinterin Logo" class="w-[230px] mx-auto mb-4">
            </div>

            <!-- Right: Forgot Password Form -->
            <div class="w-1/2  text-white p-10 relative">
                <!-- Back Button -->

                <div class="mb-6 text-sm text-red-600">
                    Masukkan Email yang terkait dengan akun Anda untuk mereset password.
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-4">
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus
                            placeholder="Enter your Email"
                            class="text-black w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-gray-800" />
                        <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-500 text-sm" />
                    </div>

                    <!-- Submit -->
                    <div class="mb-2">
                        <button type="submit"
                            class="w-full bg-gray-800 text-white py-2 rounded-md hover:bg-gray-700 transition">
                            Kirim Email
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
