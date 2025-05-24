<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#272A31] to-[#101015]">
        <div class="flex text-white overflow-hidden w-full max-w-4xl">

            <!-- Left: Logo & Brand -->
            <div class="w-1/2 flex flex-col items-center justify-center p-10">
                <img src="{{ asset('images/logo.png') }}" alt="Pinterin Logo" class="w-[230px] mx-auto mb-4">
            </div>

            <!-- Right: Register Form -->
            <div class="w-1/2 text-white p-10">
                <h2 class="text-2xl font-bold mb-6 text-center">Create an Account</h2>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Full Name -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-semibold mb-1">Full Name <span class="text-red-500">*</span></label>
                        <input id="name" type="text" placeholder="Enter your full Name" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                            class="text-black w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-gray-800" />
                        <x-input-error :messages="$errors->get('name')" class="mt-1 text-red-500 text-sm" />
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-semibold mb-1">Email <span class="text-red-500">*</span></label>
                        <input id="email" type="email" placeholder="Enter your Email" name="email" value="{{ old('email') }}" required autocomplete="username"
                            class="text-black w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-gray-800" />
                        <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-500 text-sm" />
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-semibold mb-1">Password <span class="text-red-500">*</span></label>
                        <input id="password" type="password" placeholder="Enter your Password" name="password" required autocomplete="new-password"
                            class="text-black w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-gray-800" />
                        <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-500 text-sm" />
                    </div>

                    <!-- Re-enter Password -->
                    <div class="mb-6">
                        <label for="password_confirmation" class="block text-sm font-semibold mb-1">Re-enter Password <span class="text-red-500">*</span></label>
                        <input id="password_confirmation" type="password" placeholder="Re-Enter your Password" name="password_confirmation" required autocomplete="new-password"
                            class="text-black w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-gray-800" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-red-500 text-sm" />
                    </div>

                    <!-- Register Button -->
                    <div class="mb-4">
                        <button type="submit"
                            class="w-full bg-gray-800 text-white py-2 rounded-md hover:bg-gray-700 transition">
                            Register
                        </button>
                    </div>

                    <!-- Login Link -->
                    <p class="text-sm text-center text-white">
                        Already have an Account?
                        <a href="{{ route('login') }}" class="font-semibold text-white hover:underline">Log in</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
