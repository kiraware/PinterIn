<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-linear-to-br from-[#272A31] to-[#101015]">
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

            <!-- Left: Logo -->
            <div class="w-1/2 flex flex-col items-center justify-center p-10 ">
                <img src="{{ asset('images/logo 2.png') }}" alt="Pinterin Logo" class="w-[230px] mx-auto mb-4">
            </div>

            <!-- Right: Message -->
            <div class="w-1/2 text-white p-10 relative">

                <h2 class="text-2xl font-bold mb-4 text-center">CEK EMAIL MU!</h2>

                @if (session('status') == 'verification-link-sent')
                    <div class="text-green-600 text-sm text-center mb-3">
                        Link verifikasi baru telah dikirim ke email kamu.
                    </div>
                @endif

                <p class="text-center text-yellow-600 mb-6">
                    Kami telah mengirim validasi untuk mengaktifkan akun ke email mu atau
                </p>

                <!-- Tombol Lanjut ke login -->
                <div class="flex justify-center">
                    <form method="POST" action="{{ route('verification.send') }}" class="inline">
                        @csrf
                        <button type="submit"
                            class="underline font-semibold text-yellow-700 hover:text-yellow-900 ml-1">
                            Kirim Ulang Email
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-guest-layout>
