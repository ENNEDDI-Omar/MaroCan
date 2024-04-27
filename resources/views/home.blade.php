<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to MaroCan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.0.0/dist/tailwind.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
@extends('layouts.dash')
@section('content')

    <body>
        <div class="bg-white pb-6 sm:pb-8 lg:pb-12">
            <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                <!-- header -->
                <header class="flex justify-between items-center py-4 md:py-8 border-b">
                    <a href="/" class="text-3xl font-bold text-gray-800">MaroCan.25</a>
                    <nav class="space-x-4">
                        <a href="#" class="text-gray-500 hover:text-indigo-600">Home</a>
                        <a href="#" class="text-gray-500 hover:text-indigo-600">Matchs</a>
                        <a href="{{ route('user.articles.index') }}"
                            class="text-gray-500 hover:text-indigo-600">Articles</a>
                        <a href="{{ route('user.volunteering-offers.index') }}"
                            class="text-gray-500 hover:text-indigo-600">Volunteer Offers</a>
                    </nav>

                    <div>
                        @unless (Auth::user()->hasRole(['journalist']))
                            <a href="{{ route('user.accreditations.create') }}"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Get Your Accreditation Badge
                            </a>
                        @endunless
                    </div>


                </header>

                <!-- hero section -->
                <section class="text-center py-20 bg-gray-100">
                    <h1 class="text-5xl text-gray-800 font-bold mb-4">Capture the Moment</h1>
                    <h2 class="text-3xl text-indigo-600 mb-8">Get accredited and cover Africa's premier football events</h2>
                    <a href="{{ route('user.accreditations.create') }}"
                        class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-lg">
                        Apply for Press Badge
                    </a>
                </section>

                <!-- features -->
                <section class="grid grid-cols-1 md:grid-cols-3 gap-4 text-center py-8">
                    <div class="p-8 shadow-lg rounded-lg">
                        <h3 class="text-lg text-indigo-600 font-semibold mb-2">Instant Accreditation</h3>
                        <p class="text-gray-600">Quick and easy process to get your credentials and access all areas needed
                            to bring the news to the world.</p>
                    </div>
                    <div class="p-8 shadow-lg rounded-lg">
                        <h3 class="text-lg text-indigo-600 font-semibold mb-2">Exclusive Access</h3>
                        <p class="text-gray-600">Get behind the scenes, interview players and coaches, and gain insights
                            that only a few can obtain.</p>
                    </div>
                    <div class="p-8 shadow-lg rounded-lg">
                        <h3 class="text-lg text-indigo-600 font-semibold mb-2">Publish Globally</h3>
                        <p class="text-gray-600">Your articles and coverage will be featured in our global platform,
                            reaching millions of readers.</p>
                    </div>
                </section>

                <!-- call to action -->
                <div class="bg-indigo-600 text-white text-center py-8">
                    <h2 class="text-3xl font-bold mb-2">Ready to Dive Into the Action?</h2>
                    <p class="mb-4">Join our network of professional journalists at the African Football Competition.</p>
                    <a href="{{ route('user.accreditations.create') }}"
                        class="bg-white text-indigo-600 hover:bg-gray-100 font-bold py-2 px-4 rounded">
                        Get Accredited Now
                    </a>
                </div>

                <!-- footer -->
                <footer class="text-center p-4 text-gray-600">
                    © 2021 MaroCan Media. All rights reserved.
                </footer>
            </div>
        </div>
    </body>
@endsection

</html>
