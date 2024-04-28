@extends('layouts.dash')
@section('content')
    <main class="lg:col-span-9 xl:col-span-6">
        <div class="mt-4">
            <div
                class="flex items-center space-x-2 overflow-x-auto sm:justify-center flex-nowrap bg-white text-gray-800 px-4 py-2">
                <a href="{{route('home.index')}}"
                    class="flex items-center px-5 py-2 border-b-4 border-transparent hover:border-green-700 text-gray-600 hover:text-gray-800 transition duration-300 ease-in-out">
                    Home
                </a>
                <a href="{{route('user.articles.index')}}"
                    class="flex items-center px-5 py-2 border-b-4 border-transparent hover:border-green-700 text-gray-600 hover:text-gray-800 transition duration-300 ease-in-out">
                    Articles
                </a>
                <a href="#"
                    class="flex items-center px-5 py-2 border-b-4 border-transparent hover:border-green-700 text-gray-500 hover:text-gray-800 transition duration-300 ease-in-out">
                    My Articles
                </a>

            </div>

            <div class="flex justify-between items-center">
                <h1 class="text-lg font-semibold text-gray-900">My Articles</h1>
                <a href="{{ route('journalist.articles.create') }}"
                    class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Create New Article
                </a>
            </div>
            <div>
                <h1 class="text-lg font-semibold text-gray-900">Published Articles:</h1>
                <ul role="list" class="space-y-4 mt-4">
                    @foreach ($myAcceptedArticles as $article)
                        <li class="dark:bg-gray-100 dark:text-gray-900 rounded-lg">
                            <div class="container grid grid-cols-12 mx-auto dark:bg-gray-50">
                                <div class="bg-no-repeat bg-cover dark:bg-gray-300 col-span-full lg:col-span-4"
                                    style="background-image: url('{{ $article->getFirstMediaUrl('articles', 'default') ?? 'https://source.unsplash.com/random/640x480' }}'); background-position: right center; background-size: cover;">
                                </div>
                                <div class="flex flex-col p-6 col-span-full row-span-full lg:col-span-8 lg:p-10">
                                    <div class="flex justify-start">
                                        <span
                                            class="px-2 py-1 text-xs rounded-full dark:bg-violet-600 dark:text-gray-50">{{ $article->status }}</span>
                                    </div>
                                    
                                    <h1 class="text-3xl font-semibold">{{ $article->title }}</h1>
                                    <p class="flex-1 pt-2">{{ Str::limit($article->content, 150, '...') }}</p>
                                    <a rel="noopener noreferrer" href="{{ route('journalist.articles.show', $article) }}"
                                        class="inline-flex items-center pt-2 pb-6 space-x-2 text-sm dark:text-violet-600">
                                        <span>Read more</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            class="w-4 h-4">
                                            <path fill-rule="evenodd"
                                                d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                    <div class="flex items-center justify-between pt-2">
                                        <div class="flex space-x-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                                class="w-5 h-5 dark:text-gray-600">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="self-center text-sm">by
                                                {{ $article->accreditationBadge->user->name ?? 'Unknown' }}</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="mt-8">
                <h1 class="text-lg font-semibold text-gray-900">Pending Articles:</h1>
                <ul role="list" class="space-y-4 mt-4">
                    @foreach ($myPendingArticles as $article)
                        <li class="dark:bg-gray-100 dark:text-gray-900">
                            <div class="container grid grid-cols-12 mx-auto dark:bg-gray-50">
                                <div class="bg-no-repeat bg-cover dark:bg-gray-300 col-span-full lg:col-span-4"
                                    style="background-image: url('{{ $article->getFirstMediaUrl('articles', 'default') ?? 'https://source.unsplash.com/random/640x480' }}'); background-position: right center; background-size: cover;">
                                </div>
                                <div class="flex flex-col p-6 col-span-full row-span-full lg:col-span-8 lg:p-10">
                                    <div class="flex justify-start">
                                        <span
                                            class="px-2 py-1 text-xs rounded-full dark:bg-violet-600 dark:text-gray-50">{{ $article->status }}</span>
                                    </div>
                                    <h1 class="text-3xl font-semibold">{{ $article->title }}</h1>
                                    <p class="flex-1 pt-2">{{ Str::limit($article->content, 150, '...') }}</p>
                                    <a rel="noopener noreferrer" href="{{ route('journalist.articles.show', $article) }}"
                                        class="inline-flex items-center pt-2 pb-6 space-x-2 text-sm dark:text-violet-600">
                                        <span>Read more</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            class="w-4 h-4">
                                            <path fill-rule="evenodd"
                                                d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                    <div class="flex items-center justify-between pt-2">
                                        <div class="flex space-x-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                                class="w-5 h-5 dark:text-gray-600">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="self-center text-sm">by
                                                {{ $article->accreditationBadge->user->name ?? 'Unknown' }}</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </main>
@endsection
