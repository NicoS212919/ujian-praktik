<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Maxindo') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">



    @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <div id="app">
        <nav class="bg-white shadow">
            <div class="container mx-auto px-4 py-4 flex justify-between items-center">
                <!-- Logo -->
                <a class="text-lg font-semibold text-gray-800" href="{{ url('/') }}">
                    {{ config('app.name', 'Maxindo') }}
                </a>

                <!-- Navbar items container -->
                <div class="flex flex-1 justify-between items-center ml-8">
                    <!-- Left Side Of Navbar -->
                    <ul class="flex space-x-4">
                        <li>
                            <a href="{{ route('home') }}"
                                class="text-blue-500 {{ Route::is('home') ? 'font-bold' : '' }} hover:text-blue-700 hover:underline hover:scale-110 transition-transform duration-300 ease-in-out">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}"
                                class="text-blue-500 {{ Route::is('about') ? 'font-bold' : '' }} hover:text-blue-700 hover:underline hover:scale-110 transition-transform duration-300 ease-in-out">
                                About
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.index') }}"
                                class="text-blue-500 {{ Route::is('services.index') ? 'font-bold' : '' }} hover:text-blue-700 hover:underline hover:scale-110 transition-transform duration-300 ease-in-out">
                                Services
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact.index') }}"
                                class="text-blue-500 {{ Route::is('contact.index') ? 'font-bold' : '' }} hover:text-blue-700 hover:underline hover:scale-110 transition-transform duration-300 ease-in-out">
                                Contact Us
                            </a>
                        </li>
                    </ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="flex space-x-4 items-center">
                        @guest
                            @if (Route::has('login'))
                                <li><a class="px-4 py-2 border border-blue-500 text-blue-500 rounded hover:bg-blue-500 hover:text-white transition"
                                        href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            @endif

                            @if (Route::has('register'))
                                <li><a class="px-4 py-2 border border-gray-500 text-gray-500 rounded hover:bg-gray-500 hover:text-white transition"
                                        href="{{ route('register') }}">{{ __('Register') }}</a></li>
                            @endif
                        @else
                            <li class="relative">
                                <button id="navbarDropdown" class="text-gray-800 hover:underline">
                                    {{ Auth::user()->name }}
                                </button>

                                <div class="absolute right-0 mt-2 bg-white shadow-lg rounded py-2 z-10 hidden"
                                    id="dropdownMenu">
                                    <a class="block px-4 py-2 text-gray-800 hover:bg-gray-100" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main class="py-8">
            @yield('content')
        </main>
    </div>

    <script>
        // Add JavaScript for toggling the mobile menu
        const dropdownButton = document.getElementById('navbarDropdown');
        const dropdownMenu = document.getElementById('dropdownMenu');
        dropdownButton?.addEventListener('click', () => {
            dropdownMenu?.classList.toggle('hidden');
        });
    </script>
</body>

</html>
