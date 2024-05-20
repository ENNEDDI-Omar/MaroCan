@extends('layouts.home')

@section('content')
    <div class="flex flex-wrap md:flex-no-wrap space-x-0 md:space-x-6 mb-16">
        <!-- main post -->
        <!-- Tab navigation -->
        <div class="flex items-center space-x-2 overflow-x-auto sm:justify-center flex-nowrap bg-white text-gray-800 px-4 py-2">
            
            <a href="#" class="flex items-center px-5 py-2 border-b-4 border-transparent hover:border-green-700 text-gray-600 hover:text-gray-800 transition duration-300 ease-in-out">
                Articles
            </a>
            <a href="{{route('journalist.articles.index')}}" class="flex items-center px-5 py-2 border-b-4 border-transparent hover:border-green-700 text-gray-500 hover:text-gray-800 transition duration-300 ease-in-out">
                My Articles
            </a>
            
        </div>
        <div class="text-end translate-x-40">
            <form action="{{route('user.articles.search')}}" method="GET"
                class="flex flex-col justify-center w-3/4 max-w-sm space-y-3 md:flex-row md:w-full md:space-x-3 md:space-y-0">
                <div class=" relative ">
                    <input name="searchKey" type="text" placeholder="Search..." 
                        class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                        placeholder="Enter a title" />
                </div>
                <button
                    class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200"
                    type="submit">
                    Search
                </button>
            </form>
        </div>
        
        
        <div class="mb-4 lg:mb-0 p-4 lg:p-0 w-full md:w-4/7 relative rounded block flex flex-col">
            {{-- <img src="{{ $latestArticle?->getFirstMediaUrl('articles', 'thumb') ?: 'https://images.unsplash.com/photo-1427751840561-9852520f8ce8?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60' }}"
                class="rounded-md object-cover w-full h-64">
            <span class="text-green-700 text-sm hidden md:block mt-4"> {{ $latestArticle->tags->pluck('name')->join(', ') }}
            </span>
            <h1 class="text-gray-800 text-4xl font-bold mt-2 mb-2 leading-tight">
                {{ $latestArticle->title }}
            </h1>
            <p class="text-gray-600 mb-4">
                {{ $latestArticle->content }}
            </p>
            <a href="{{ route('user.articles.show', $latestArticle->id) }}"
                class="mt-auto self-end px-6 py-3 rounded-md bg-green-700 text-gray-100">
                Read more
            </a> --}}
        </div>



        <!-- sub-main posts -->
        <div class="w-full md:w-4/7">
            <div class="flex mt-16 mb-4 px-4 lg:px-0 items-center justify-between">
                <h2 class="font-bold text-3xl">Latest Articles:</h2>

            </div>
            @foreach ($articles as $article)
                <div class="rounded w-full flex flex-col md:flex-row mb-10">
                    <img src="{{ $article->getFirstMediaUrl('articles', 'thumb') ?: 'default-image.jpg' }}"
                        class="block md:block lg:block rounded-md h-64 md:h-32 m-4 md:m-0" />
                    <div class="bg-white rounded px-4 flex flex-col justify-between flex-grow">
                        <div>
                            <span
                                class="text-green-700 text-sm hidden md:block">{{ $article->tags->pluck('name')->join(', ') }}</span>
                            <a href="{{ route('user.articles.show', $article) }}">
                                <h3 class="md:mt-0 text-gray-800 font-semibold text-xl mb-2">
                                    {{ $article->title }}
                                </h3>
                            </a>
                            <p class="text-sm text-gray-600">
                                {{ Str::limit($article->content, 150) }}
                            </p>
                        </div>
                        <a href="{{ route('user.articles.show', $article) }}"
                            class="mt-4 self-end py-2 px-4 rounded bg-green-700 text-white hover:bg-green-800">
                            Read more
                        </a>
                    </div>
                </div>
            @endforeach
        </div>


    </div>
    <!-- end featured section -->


    <!-- recent posts -->
    <div class="flex mt-16 mb-4 px-4 lg:px-0 items-center justify-between">
        <h2 class="font-bold text-3xl">Latest Articles</h2>

    </div>

    <!-- end recent posts -->

    <!-- subscribe -->
    <div class="rounded flex md:shadow mt-12">
        <img src="https://images.unsplash.com/photo-1579275542618-a1dfed5f54ba?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60"
            class="w-0 md:w-1/4 object-cover rounded-l" />
        <div class="px-4 py-2">
            <h3 class="text-3xl text-gray-800 font-bold">Subscribe to newsletter</h3>
            <p class="text-xl text-gray-700">We sent latest news and posts once in every week, fresh from the oven</p>
            <form class="mt-4 mb-10">
                <input type="email" class="rounded bg-gray-100 px-4 py-2 border focus:border-green-400"
                    placeholder="john@tech.com" />
                <button class="px-4 py-2 rounded bg-green-800 text-gray-100">
                    Subscribe
                    <i class='bx bx-right-arrow-alt'></i>
                </button>
                <p class="text-green-900 opacity-50 text-sm mt-1">No spam. We promise</p>
            </form>
        </div>
    </div>
    <!-- ens subscribe section -->



    <!-- popular posts -->
    <div class="flex mt-16 mb-4 px-4 lg:px-0 items-center justify-between">
        <h2 class="font-bold text-3xl">Popular Articles</h2>
        <a class="bg-gray-200 hover:bg-green-200 text-gray-800 px-3 py-1 rounded cursor-pointer">
            View all
        </a>
    </div>
    <div class="block space-x-0 lg:flex lg:space-x-6">



        <div class="rounded w-full lg:w-1/2 lg:w-1/3 p-4 lg:p-0">
            <img src="https://images.unsplash.com/photo-1504384764586-bb4cdc1707b0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60"
                class="rounded" alt="technology" />
            <div class="p-4 pl-0">
                <h2 class="font-bold text-2xl text-gray-800">Is at purse tried jokes china ready decay an. </h2>
                <p class="text-gray-700 mt-2">
                    Small its shy way had woody downs power. To denoting admitted speaking learning my exercise so in.
                    Procured shutters mr it feelings. To or three offer house begin taken am at.
                </p>

                <a href="#" class="inline-block py-2 rounded text-green-900 mt-2 ml-auto"> Read more </a>
            </div>
        </div>

        <div class="rounded w-full lg:w-1/2 lg:w-1/3 p-4 lg:p-0">
            <img src="https://images.unsplash.com/photo-1483058712412-4245e9b90334?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2100&q=80"
                class="rounded" alt="technology" />
            <div class="p-4 pl-0">
                <h2 class="font-bold text-2xl text-gray-800">As dissuade cheerful overcame so of friendly he indulged
                    unpacked.</h2>
                <p class="text-gray-700 mt-2">
                    Alteration connection to so as collecting me.
                    Difficult in delivered extensive at direction allowance.
                    Alteration put use diminution can considered sentiments interested discretion.
                </p>

                <a href="#" class="inline-block py-2 rounded text-green-900 mt-2 ml-auto"> Read more </a>
            </div>
        </div>

    </div>
@endsection

{{-- <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">

    <div class="border-b mb-5 flex justify-between text-sm">
        <div class="text-indigo-600 flex items-center pb-2 pr-2 border-b-2 border-indigo-600 uppercase">
            <svg class="h-6 mr-3" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 455.005 455.005"
                style="enable-background:new 0 0 455.005 455.005;" xml:space="preserve">
                <g>
                    <path d="M446.158,267.615c-5.622-3.103-12.756-2.421-19.574,1.871l-125.947,79.309c-3.505,2.208-4.557,6.838-2.35,10.343 c2.208,3.505,6.838,4.557,10.343,2.35l125.947-79.309c2.66-1.675,4.116-1.552,4.331-1.432c0.218,0.12,1.096,1.285,1.096,4.428 c0,8.449-6.271,19.809-13.42,24.311l-122.099,76.885c-6.492,4.088-12.427,5.212-16.284,3.084c-3.856-2.129-6.067-7.75-6.067-15.423 c0-19.438,13.896-44.61,30.345-54.967l139.023-87.542c2.181-1.373,3.503-3.77,3.503-6.347s-1.323-4.974-3.503-6.347L184.368,50.615 c-2.442-1.538-5.551-1.538-7.993,0L35.66,139.223C15.664,151.815,0,180.188,0,203.818v4c0,23.63,15.664,52.004,35.66,64.595 l209.292,131.791c3.505,2.207,8.136,1.154,10.343-2.35c2.207-3.505,1.155-8.136-2.35-10.343L43.653,259.72 C28.121,249.941,15,226.172,15,207.818v-4c0-18.354,13.121-42.122,28.653-51.902l136.718-86.091l253.059,159.35l-128.944,81.196 c-20.945,13.189-37.352,42.909-37.352,67.661c0,13.495,4.907,23.636,13.818,28.555c3.579,1.976,7.526,2.956,11.709,2.956 c6.231,0,12.985-2.176,19.817-6.479l122.099-76.885c11.455-7.213,20.427-23.467,20.427-37.004 C455.004,277.119,451.78,270.719,446.158,267.615z"> </path>
                    <path d="M353.664,232.676c2.492,0,4.928-1.241,6.354-3.504c2.207-3.505,1.155-8.136-2.35-10.343l-173.3-109.126 c-3.506-2.207-8.136-1.154-10.343,2.35c-2.207,3.505-1.155,8.136,2.35,10.343l173.3,109.126 C350.916,232.303,352.298,232.676,353.664,232.676z"> </path>
                    <path d="M323.68,252.58c2.497,0,4.938-1.246,6.361-3.517c2.201-3.509,1.14-8.138-2.37-10.338L254.46,192.82 c-3.511-2.202-8.139-1.139-10.338,2.37c-2.201,3.51-1.14,8.138,2.37,10.338l73.211,45.905 C320.941,252.21,322.318,252.58,323.68,252.58z"> </path>
                    <path d="M223.903,212.559c-3.513-2.194-8.14-1.124-10.334,2.39c-2.194,3.514-1.124,8.14,2.39,10.334l73.773,46.062 c1.236,0.771,2.608,1.139,3.965,1.139c2.501,0,4.947-1.251,6.369-3.529c2.194-3.514,1.124-8.14-2.39-10.334L223.903,212.559z"> </path>
                    <path d="M145.209,129.33l-62.33,39.254c-2.187,1.377-3.511,3.783-3.503,6.368s1.345,4.983,3.54,6.348l74.335,46.219 c1.213,0.754,2.586,1.131,3.96,1.131c1.417,0,2.833-0.401,4.071-1.201l16.556-10.7c3.479-2.249,4.476-6.891,2.228-10.37 c-2.248-3.479-6.891-4.475-10.37-2.228l-12.562,8.119l-60.119-37.38l48.2-30.355l59.244,37.147l-6.907,4.464 c-3.479,2.249-4.476,6.891-2.228,10.37c2.249,3.479,6.894,4.476,10.37,2.228l16.8-10.859c2.153-1.392,3.446-3.787,3.429-6.351 c-0.018-2.563-1.344-4.94-3.516-6.302l-73.218-45.909C150.749,127.792,147.647,127.795,145.209,129.33z"> </path>
                    <path d="M270.089,288.846c2.187-3.518,1.109-8.142-2.409-10.329l-74.337-46.221c-3.518-2.188-8.143-1.109-10.329,2.409 c-2.187,3.518-1.109,8.142,2.409,10.329l74.337,46.221c1.232,0.767,2.601,1.132,3.953,1.132 C266.219,292.387,268.669,291.131,270.089,288.846z"> </path>
                    <path d="M53.527,192.864c-2.187,3.518-1.109,8.142,2.409,10.329l183.478,114.081c1.232,0.767,2.601,1.132,3.953,1.132 c2.506,0,4.956-1.256,6.376-3.541c2.187-3.518,1.109-8.142-2.409-10.329L63.856,190.455 C60.338,188.266,55.714,189.346,53.527,192.864z"> </path>
                </g>
            </svg>
            <a href="#" class="font-semibold inline-block">Cooking BLog</a>
        </div>
        <a href="#">See All</a>
    </div>


    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">

        <!-- CARD 1 -->
        <div class="rounded overflow-hidden shadow-lg flex flex-col">
            <a href="#"></a>
            <div class="relative"><a href="#">
                    <img class="w-full"
                        src="https://images.pexels.com/photos/61180/pexels-photo-61180.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=1&amp;w=500"
                        alt="Sunset in the mountains">
                    <div
                        class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
                    </div>
                </a>
                <a href="#!">
                    <div
                        class="text-xs absolute top-0 right-0 bg-indigo-600 px-4 py-2 text-white mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                        Cooking
                    </div>
                </a>
            </div>
            <div class="px-6 py-4 mb-auto">
                <a href="#"
                    class="font-medium text-lg inline-block hover:text-indigo-600 transition duration-500 ease-in-out inline-block mb-2">Simplest
                    Salad Recipe ever</a>
                <p class="text-gray-500 text-sm">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                </p>
            </div>
            <div class="px-6 py-3 flex flex-row items-center justify-between bg-gray-100">
                <span href="#" class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center">
                    <svg height="13px" width="13px" version="1.1" id="Layer_1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                        y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                        xml:space="preserve">
                        <g>
                            <g>
                                <path
                                    d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256 c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128 c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z">
                                </path>
                            </g>
                        </g>
                    </svg>
                    <span class="ml-1">6 mins ago</span>
                </span>

                <span href="#" class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center">
                    <svg class="h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                        </path>
                    </svg>
                    <span class="ml-1">39 Comments</span>
                </span>
            </div>
        </div>



        <!-- CARD 2 -->
        <div class="rounded overflow-hidden shadow-lg flex flex-col">
            <a href="#"></a>
            <div class="relative"><a href="#">
                    <img class="w-full"
                        src="https://images.pexels.com/photos/1600727/pexels-photo-1600727.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=1&amp;w=500"
                        alt="Sunset in the mountains">
                    <div
                        class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
                    </div>
                </a><a href="#!">
                    <div
                        class="text-xs absolute top-0 right-0 bg-indigo-600 px-4 py-2 text-white mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                        Cooking
                    </div>
                </a>
            </div>
            <div class="px-6 py-4 mb-auto">
                <a href="#"
                    class="font-medium text-lg inline-block hover:text-indigo-600 transition duration-500 ease-in-out inline-block mb-2">Best
                    FastFood Ideas (Yummy)</a>
                <p class="text-gray-500 text-sm">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                </p>
            </div>
            <div class="px-6 py-3 flex flex-row items-center justify-between bg-gray-100">
                <span href="#" class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center">
                    <svg height="13px" width="13px" version="1.1" id="Layer_1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                        y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                        xml:space="preserve">
                        <g>
                            <g>
                                <path
                                    d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256 c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128 c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z">
                                </path>
                            </g>
                        </g>
                    </svg>
                    <span class="ml-1"> 10 days ago</span>
                </span>

                <span href="#" class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center">
                    <svg class="h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                        </path>
                    </svg>
                    <span class="ml-1">0 Comments</span>
                </span>
            </div>
        </div>


        
        

    </div>

</div> --}}
