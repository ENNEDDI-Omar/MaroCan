@extends('layouts.home')
@section('content')

<section class="ezy__httpcodes9 light py-14 md:py-24 bg-white dark:bg-[#0b1727] text-zinc-900 dark:text-white">
    <div class="container px-4 mx-auto">
      <div class="flex flex-wrap justify-center text-center">
        <div class="w-full">
          <div
            class="bg-cover bg-no-repeat bg-bottom min-h-[300px] rounded-2xl"
            style="background-image: url(https://cdn.easyfrontend.com/pictures/httpcodes/https9.jpg)"
          ></div>
        </div>
        <div class="w-full pt-12">
          <h1 class="text-[32px] font-bold leading-none md:text-[40px] mb-4">Oh no! Error 404</h1>
          <p class="text-lg opacity-80">Something went wrong, this page is broken.</p>
          <div class="flex justify-center mt-6">
            <a href="{{route('home.index')}}" class="px-6 py-2.5 font-medium bg-blue-600 hover:bg-opacity-90 rounded text-white duration-300">
              Go Home
            </a>
            <button
              class="px-6 py-2.5 font-medium border border-blue-600 hover:bg-blue-600 rounded text-blue-600 hover:text-white duration-300 ml-2"
            >
              Try Again
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
  

@endsection