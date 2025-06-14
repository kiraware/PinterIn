<nav x-data="{ open: false }" class="bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <div class="shrink-0">
                <a href="{{ route('dashboard') }}" class="flex flex-col items-center">
                    <img class="block h-16 w-auto" src="{{ asset('images/logo.png') }}" alt="Pinterin Logo">
                </a>
            </div>

            <div class="hidden sm:flex sm:justify-center sm:grow">
                <div class="flex space-x-8">
                    <a href="{{ route('home') }}"
                        class="{{ request()->routeIs('home') ? 'text-yellow-500' : 'text-gray-300' }} hover:text-yellow-500 px-3 py-2 rounded-md text-sm font-medium">
                        Home
                    </a>
                    <a href="{{ route('about') }}"
                        class="{{ request()->routeIs('about') ? 'text-yellow-500' : 'text-gray-300' }} hover:text-yellow-500 px-3 py-2 rounded-md text-sm font-medium">
                        About
                    </a>
                    @auth
                        <a href="{{ route('courses.index') }}"
                            class="{{ request()->routeIs('courses.index') ? 'text-yellow-500' : 'text-gray-300' }} hover:text-yellow-500 px-3 py-2 rounded-md text-sm font-medium">
                            My Courses
                        </a>

                        <a href="{{ route('payments.index') }}"
                            class="{{ request()->routeIs('payments.index') ? 'text-yellow-500' : 'text-gray-300' }} hover:text-yellow-500 px-3 py-2 rounded-md text-sm font-medium">
                            Payments
                        </a>

                        @if (Auth::user()->is_admin)
                            <a href="{{ route('banks.index') }}"
                                class="{{ request()->routeIs('banks.*') ? 'text-yellow-500' : 'text-gray-300' }} hover:text-yellow-500 px-3 py-2 rounded-md text-sm font-medium">
                                Bank
                            </a>
                        @endif
                    @else
                        <a href="{{ route('courses.publicIndex') }}"
                            class="{{ request()->routeIs('courses.publicIndex') ? 'text-yellow-500' : 'text-gray-300' }} hover:text-yellow-500 px-3 py-2 rounded-md text-sm font-medium">
                            Courses
                        </a>
                    @endauth
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center">
                @guest
                    <a href="{{ route('login') }}"
                        class="flex items-center bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-2 px-6 rounded-lg transition ease-in-out duration-150">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                            </path>
                        </svg>
                        LOGIN
                    </a>
                @else
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-300 hover:text-white focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endguest
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden bg-gray-900">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">Home</x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">About</x-responsive-nav-link>
            @auth
                <x-responsive-nav-link href="{{ route('courses.index') }}" :active="request()->routeIs('courses.index')">
                    My Courses
                </x-responsive-nav-link>

                <x-responsive-nav-link href="{{ route('payments.index') }}" :active="request()->routeIs('payments.index')">
                    Payments
                </x-responsive-nav-link>

                @if (Auth::user()->is_admin)
                    <x-responsive-nav-link href="{{ route('banks.index') }}" :active="request()->routeIs('banks.*')">
                        Bank
                    </x-responsive-nav-link>
                @endif
            @else
                <x-responsive-nav-link href="{{ route('courses.publicIndex') }}" :active="request()->routeIs('courses.publicIndex')">
                    Courses
                </x-responsive-nav-link>
            @endauth

            <div class="pt-4 pb-1 border-t border-gray-700">
                @guest
                    <div class="px-4">
                        <a href="{{ route('login') }}"
                            class="flex items-center justify-center w-full bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-2 px-4 rounded-lg transition ease-in-out duration-150">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                </path>
                            </svg>
                            LOGIN
                        </a>
                    </div>
                @else
                    <div class="px-4">
                        <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <x-responsive-nav-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-responsive-nav-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</nav>
