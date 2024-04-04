{{-- <!DOCTYPE html>
<html>
<head>
    <title>Laravel - laraveli.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    @vite('resources/css/app.css')
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);
  
        body{
            margin: 0;
            font-size: .9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: left;
            background-color: #f5f8fa;
        }
        .navbar-laravel
        {
            box-shadow: 0 2px 4px rgba(0,0,0,.04);
        }
        .navbar-brand , .nav-link, .my-form, .login-form
        {
            font-family: Raleway, sans-serif;
        }
        .my-form
        {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        .my-form .row
        {
            margin-left: 0;
            margin-right: 0;
        }
        .login-form
        {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        .login-form .row
        {
            margin-left: 0;
            margin-right: 0;
        }
    </style>
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Marocan</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
   
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login.form') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register.form') }}">Register</a>
                    </li>
                
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                
            </ul>
  
        </div>
    </div>
</nav>
  
@yield('content')
     
</body>
</html> --}}


{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="#">
                            <img src="#" class="block h-9 w-auto" alt="MaroCan.25 Logo" />
                        </a>
                    </div>
    
                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <a href="#" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out {{ request()->routeIs('dashboard') ? 'border-indigo-500' : 'border-transparent' }}">
                            {{ __('Dashboard') }}
                        </a>
                    </div>
                </div>
    
                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <div class="ml-3 relative">
                        <div>
                            <button @click="open = ! open" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                <img class="h-8 w-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                        </div>
                        
                        <div x-show="open" @click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg">
                            <div class="py-1 rounded-md bg-white shadow-xs">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{ __('Profile') }}</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{ __('Log Out') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    
        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <a href="#" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium {{ request()->routeIs('dashboard') ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }}">
                    {{ __('Dashboard') }}
                </a>
            </div>
    
            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="flex items-center px-4">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="">
                    </div>
                    <div class="ml-3">
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>
    
                <div class="mt-3 space-y-1">
                    <a href="#" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium {{ request()->routeIs('profile.edit') ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }}">
                        {{ __('Profile') }}
                    </a>
    
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800">
                        {{ __('Log Out') }}
                    </a>
                    <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')
</body>
</html> --}}


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    <div class="min-h-screen bg-gray-100">
        <!-- message.blade.php -->




        <!-- Navigation -->
        <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="#">
                                <img src="#" class="block h-9 w-auto" alt="MaroCan.25 Logo" />
                            </a>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <a href="#"
                                class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out {{ request()->routeIs('dashboard') ? 'border-indigo-500' : 'border-transparent' }}">
                                {{ __('Dashboard') }}
                            </a>
                        </div>
                    </div>
                    <div>
                        @if (session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                                role="alert">
                                <strong class="font-bold">Success!</strong>
                                <span class="block sm:inline">{{ session('success') }}</span>
                                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                    <button onclick="this.parentElement.parentElement.style.display='none';"
                                        class="text-green-700">
                                        <svg class="fill-current h-6 w-6" role="button"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <title>Fermer</title>
                                            <path
                                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.896l-2.651 2.953a1.2 1.2 0 1 1-1.697-1.697l2.951-2.651-2.951-2.651a1.2 1.2 0 1 1 1.697-1.697L10 8.202l2.651-2.951a1.2 1.2 0 1 1 1.697 1.697L11.697 10l2.651 2.651a1.2 1.2 0 0 1 0 1.698z" />
                                        </svg>
                                    </button>
                                </span>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                                role="alert">
                                <strong class="font-bold">Error!</strong>
                                <span class="block sm:inline">{{ session('error') }}</span>
                                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                    <button onclick="this.parentElement.parentElement.style.display='none';"
                                        class="text-red-700">
                                        <svg class="fill-current h-6 w-6" role="button"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <title>Fermer</title>
                                            <path
                                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.896l-2.651 2.953a1.2 1.2 0 1 1-1.697-1.697l2.951-2.651-2.951-2.651a1.2 1.2 0 1 1 1.697-1.697L10 8.202l2.651-2.951a1.2 1.2 0 1 1 1.697 1.697L11.697 10l2.651 2.651a1.2 1.2 0 0 1 0 1.698z" />
                                        </svg>
                                    </button>
                                </span>
                            </div>
                        @endif
                    </div>

                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <div class="ml-3 relative">
                            <div>
                                <button @click="open = ! open"
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                    {{-- <img class="h-8 w-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" /> --}}
                                </button>
                            </div>

                            <div x-show="open" @click.away="open = false"
                                class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg">
                                <div class="py-1 rounded-md bg-white shadow-xs">
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{ __('Profile') }}</a>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{ __('Log Out') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = ! open"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{ 'hidden': open, 'inline-flex': !open }" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                                <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <a href="#"
                        class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium {{ request()->routeIs('dashboard') ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }}">
                        {{ __('Dashboard') }}
                    </a>
                </div>

                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-200">
                    <div class="flex items-center px-4">
                        <div class="flex-shrink-0">
                            {{-- <img class="h-10 w-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt=""> --}}
                        </div>
                        <div class="ml-3">
                            {{-- <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div> --}}
                            {{-- <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div> --}}
                        </div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <a href="#"
                            class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium {{ request()->routeIs('profile.edit') ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }}">
                            {{ __('Profile') }}
                        </a>

                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();"
                            class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800">
                            {{ __('Log Out') }}
                        </a>
                        <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>

            @yield('content')
        </main>
    </div>


    {{-- @if (session('success'))
        <script>
            swal.fire({
                title: 'Succès!',
                text: '{{ session('success') }}',
                icon: 'success',
                button: 'OK'
            });
        </script>
    @endif --}}
</body>

</html>
