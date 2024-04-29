@extends('layouts.home')
@section('content')

    <body>
        <div class="bg-white pb-6 sm:pb-8 lg:pb-12">
            <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                <!-- header -->


                <!-- hero section -->
                <section class="text-center py-20 bg-gray-100 bg-cover bg-center bg-no-repeat"
                    style="background-image: url('{{ asset('images/Lions-Coupe-du-monde.jpg') }}');">
                    <h1 class="text-5xl text-white font-bold mb-4">Live the Moment and Enjoy MaroCan</h1>
                    <h2 class="text-3xl text-black mb-8">Get accredited and cover Africa's premier football events</h2>
                    <div>
                        @unless (Auth::user()->hasRole(['journalist']))
                            <a href="{{ route('user.accreditations.create') }}"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Get Your Accreditation Badge
                            </a>
                        @endunless
                    </div>
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

                <section class="text-gray-600 body-font overflow-hidden">
                    <h1 class="text-3xl font-bold text-center">Latest Articles</h1>
                    <div class="container px-5 py-24 mx-auto">
                        <div class="-my-8 divide-y-2 divide-gray-100">
                            @foreach ($publishedArticles as $article)
                            <div class="flex border items-center rounded-md cursor-pointer transition duration-500 shadow-sm hover:shadow-md hover:shadow-green-600">
                                <!-- Image, now larger -->
                                <div class="w-64 p-2 shrink-0"> <!-- Adjusted the width of the container -->
                                    <img src="{{ $article->getFirstMediaUrl('articles') }}" alt="media-logo" class="h-32 w-32"> <!-- Adjusted the size of the image -->
                                </div>
                                <!-- Article title and excerpt -->
                                <div class="flex-grow p-2">
                                    <p class="font-semibold text-lg">{{$article->title}}</p>
                                    <span class="text-gray-600">{{ Str::limit($article->content, 200) }}</span>
                                </div>
                                <!-- Read More button -->
                                <div class="p-2">
                                    <a href="{{ route('user.articles.show', $article->id) }}" class="text-white bg-red-600 hover:bg-green-600 font-bold py-2 px-4 rounded inline-flex items-center">
                                        Read More
                                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
                
                
                

                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-24 mx-auto">
                        <h1 class="text-3xl font-bold text-center">Upcoming Football Matches</h1>
                        <div class="flex flex-wrap w-full mb-20">
                            <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                                <div class="h-1 w-20 bg-green-500 rounded mx-auto"></div>
                            </div>
                            <p class="lg:w-1/2 w-full leading-relaxed text-gray-500 text-center">Check out the upcoming matches and never miss a game!</p>
                        </div>
                        <div class="flex flex-wrap -m-4">
                            @foreach ($matches as $match)
                            <div class="xl:w-1/4 md:w-1/2 p-4">
                                <div class="bg-gray-100 p-6 rounded-lg">
                                    <img class="h-50 rounded w-full object-cover object-center mb-6"
                                        src="{{ asset('images/match1.jpg') ?? 'https://dummyimage.com/720x400' }}" alt="team-logo">
                                    <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">{{ $match->city }}</h3>
                                    <h2 class="text-lg text-gray-900 font-medium title-font mb-4">{{ $match->team1->name }} VS {{$match->team2->name}}</h2>
                                    <p class="leading-relaxed text-base">{{ $match->description ?? 'No description available.' }}</p>
                                    <a href="#" class="mt-3 text-green-600 bg-transparent border border-solid border-red-600 hover:bg-green-600 hover:text-white active:bg-indigo-600 font-bold uppercase px-8 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                                        Reserve a Ticket
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
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
