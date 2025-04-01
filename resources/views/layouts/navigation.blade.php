<nav x-data="{ open: false, cartOpen: false, cartItems: 0 }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('index') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('index')" :active="request()->routeIs('index')">
                        {{ __('') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Right Section -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <!-- Cart Icon -->
                <div class="relative">
                    <button @click="cartOpen = !cartOpen" class="relative p-2 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l1.68 10.39A2 2 0 008.66 15h6.68a2 2 0 001.98-1.61L19 6H5"></path>
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="15" cy="21" r="1"></circle>
                        </svg>
                        <span x-show="cartItems > 0" class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold text-white bg-red-600 rounded-full" x-text="cartItems"></span>
                    </button>

                    <!-- Cart Dropdown -->
                    <div x-show="cartOpen" @click.away="cartOpen = false" class="absolute right-0 mt-2 w-64 bg-white dark:bg-gray-700 rounded-md shadow-lg overflow-hidden z-50">
                        <div class="p-4 text-gray-800 dark:text-gray-200">
                            <p x-show="cartItems === 0" class="text-center">Tu carrito está vacío</p>
                            <ul x-show="cartItems > 0">
                                <!-- Aquí se pueden iterar los elementos del carrito -->
                                <li class="flex justify-between py-2 border-b">
                                    <span>Producto 1</span>
                                    <span>$100</span>
                                </li>
                                <li class="flex justify-between py-2 border-b">
                                    <span>Producto 2</span>
                                    <span>$200</span>
                                </li>
                            </ul>
                            <button x-show="cartItems > 0" class="w-full mt-2 bg-blue-500 text-white py-2 px-4 rounded-md text-center">
                                Ver Carrito
                            </button>
                        </div>
                    </div>
                </div>

                <!-- User Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
