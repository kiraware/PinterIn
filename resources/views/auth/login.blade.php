<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#272A31] to-[#101015]">
        <div class="flex text-white overflow-hidden w-full max-w-4xl">

            <!-- Left: Logo & Brand -->
            <div class="w-1/2 flex flex-col items-center justify-center p-10">
                <img src="{{ asset('images/logo 2.png') }}" alt="Pinterin Logo" class="w-[230px] mx-auto mb-4">
            </div>

            <!-- Right: Login Form -->
            <div class="w-1/2 text-white p-10">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <h2 class="text-2xl font-bold mb-6 text-center">Log in Account</h2>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-semibold mb-1">Email</label>
                        <input id="email" type="email" placeholder="Enter your Email" name="email"
                            value="{{ old('email') }}" required autofocus autocomplete="username"
                            class="text-black w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-gray-800" />
                        <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-500 text-sm" />
                    </div>

                    <!-- Password -->
                    <div class="mb-2">
                        <label for="password" class="block text-sm font-semibold mb-1">Password</label>
                        <div class="relative">
                            <input id="password" type="password" placeholder="Enter your Password" name="password"
                                required autocomplete="current-password"
                                class="text-black w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-gray-800" />
                            <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-500 text-sm" />
                        </div>
                    </div>

                    <!-- Forgot Password -->
                    @if (Route::has('password.request'))
                        <div class="text-right mb-4">
                            <a href="{{ route('password.request') }}" class="text-sm text-gray-500 hover:underline">
                                Forgot password?
                            </a>
                        </div>
                    @endif

                    <!-- Login Button -->
                    <div class="mb-4">
                        <button type="submit"
                            class="w-full bg-gray-800 text-white py-2 rounded-md hover:bg-gray-700 transition">
                            Login
                        </button>
                    </div>

                    <!-- Register Link -->
                    <p class="text-sm text-center text-white">
                        Don’t have an account?
                        <a href="{{ route('register') }}" class="font-semibold text-white hover:underline">Register
                            Here</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
