{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>

    <div>
        <h2>Register</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Ajoutez ici les champs du formulaire selon votre besoin -->

            <div>
                <button type="submit">Register</button>
            </div>
        </form>
    </div>

</body>
</html> --}}

@extends('layouts.auth')
@section('content')

<section class="min-h-screen flex items-stretch text-white">
    <div class="lg:flex w-1/2 hidden bg-gray-500 bg-no-repeat bg-cover relative items-center"
        style="background-image: url('{{ asset('media/pe3.jpg') }}');">
        <div class="absolute bg-black opacity-40 inset-0 z-0"></div>
        <div class="w-full px-24 z-10">
            <h1 class="text-5xl font-bold text-left tracking-wide">Keep it special</h1>
            <p class="text-3xl my-4">Reserve your Ticket and enjoy your moment in a unique way, anywhere.</p>
        </div>
        <div class="bottom-0 absolute p-4 text-center right-0 left-0 flex justify-center space-x-4">
            <!-- Social icons -->
        </div>
    </div>
    <div class="lg:w-1/2 w-full flex items-center justify-center text-center md:px-16 px-0 z-0"
        style="background-color: #161616;">
        <div class="absolute lg:hidden z-10 inset-0 bg-gray-500 bg-no-repeat bg-cover items-center"
            style="background-image: url(https://images.unsplash.com/photo-1577495508048-b635879837f1?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGV;">
            <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
        </div>
        <div class="w-full py-6 z-20">
            <a href="/" class="inline-flex items-center gap-2.5 text-2xl font-bold text-white md:text-3xl"
                aria-label="logo">
                <svg width="95" height="94" viewBox="0 0 95 94" class="h-auto w-6 text-indigo-500"
                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M96 0V47L48 94H0V47L48 0H96Z" />
                </svg>
                EVENTO
            </a>
            <!-- Social icons -->

            <form method="POST" action="{{ route('register') }}" class="sm:w-2/3 w-full px-4 lg:px-0 mx-auto">
                @csrf
                <div class="pb-2 pt-4">
                    <label for="name" class="text-left text-white">{{ __('Name:') }}</label>
                    <input id="name" class="block w-full p-4 text-lg rounded-sm bg-black" type="text" name="name"
                        value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Full-Name" />
                    @error('name')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="pb-2 pt-4">
                    <label for="email" class="text-left text-white">{{ __('Email:') }}</label>
                    <input id="email" class="block w-full p-4 text-lg rounded-sm bg-black" type="email"
                        name="email" value="{{ old('email') }}" required autocomplete="username"
                        placeholder="example@gmail.com" />
                    @error('email')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="pb-2 pt-4">
                    <label for="password" class="text-left text-white">{{ __('Password:') }}</label>
                    <input id="password" class="block w-full p-4 text-lg rounded-sm bg-black" type="password"
                        name="password" required autocomplete="new-password" placeholder="********" />
                    @error('password')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="pb-2 pt-4">
                    <label for="password_confirmation"
                        class="text-left text-white">{{ __('Confirm Password:') }}</label>
                    <input id="password_confirmation" class="block w-full p-4 text-lg rounded-sm bg-black"
                        type="password" name="password_confirmation" required autocomplete="new-password"
                        placeholder="********" />
                    @error('password_confirmation')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <a href="{{ route('login') }}"
                        class="underline text-sm text-white hover:text-indigo-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{ __('Already registered?') }}</a>
                </div>
                <div class="px-4 pb-2 pt-4">
                    <button
                        class="uppercase block w-full p-4 text-lg rounded-full bg-indigo-500 hover:bg-indigo-600 focus:outline-none">{{ __('Register') }}</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
