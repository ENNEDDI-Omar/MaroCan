@extends('layouts.home')
@section('content')

<div class="w-full p-12 bg-white dark:bg-gray-700">
    <div class="flex flex-col items-center text-center">
        <h1 class="text-3xl md:text-[45px] font-bold mb-2">Our Exclusive Matches</h1>

        <!-- tab bar -->
        <ul class="flex flex-wrap justify-center my-6">
            <li class="px-4 py-2 border-b-2 border-blue-600">
                <a class="nav-link" href="{{route('user.matchs.index')}}">Matches</a>
            </li>
            <li class="px-4 py-2 hover:border-b-2 hover:border-blue-600 transition duration-300 opacity-80">
                <a class="nav-link" href="#">Teams</a>
            </li>
            <li class="px-4 py-2 hover:border-b-2 hover:border-blue-600 transition duration-300 opacity-80">
                <a class="nav-link" href="#">My Reservations</a>
            </li>
        </ul>
    </div>
    <div class="flex items-end justify-between mb-12 header">
        <div class="title">
            <p class="mb-4 text-4xl font-bold text-gray-800">
                
            </p>

        </div>
        <div class="text-end">
            <form
                class="flex flex-col justify-center w-3/4 max-w-sm space-y-3 md:flex-row md:w-full md:space-x-3 md:space-y-0">
                <div class=" relative ">
                    <input type="text" id="&quot;form-subscribe-Search"
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
    </div>
    <div class="grid grid-cols-1 gap-12 md:grid-cols-3 xl:grid-cols-3">
        
    </div>
</div>
</div>

     {{-- <section class="ezy__portfolio12 light py-14 md:py-24 bg-white dark:bg-[#0b1727] text-zinc-900 dark:text-white">
        <div class="container px-4 mx-auto">
            <div class="flex flex-col items-center text-center">
                <h1 class="text-3xl md:text-[45px] font-bold mb-2">Our Exclusive Courses</h1>

                <!-- tab bar -->
                <ul class="flex flex-wrap justify-center my-6">
                    <li class="px-4 py-2 border-b-2 border-blue-600">
                        <a class="nav-link" href="#">Most Popular</a>
                    </li>
                    <li class="px-4 py-2 hover:border-b-2 hover:border-blue-600 transition duration-300 opacity-80">
                        <a class="nav-link" href="#">Culinary Arts</a>
                    </li>
                    <li class="px-4 py-2 hover:border-b-2 hover:border-blue-600 transition duration-300 opacity-80">
                        <a class="nav-link" href="#">Film & TV</a>
                    </li>
                </ul>
            </div>

            <div>
                <!-- tab contents -->
                <div class="grid grid-cols-12 gap-6 mt-6">
                    <!-- card starts -->
                    <div class="col-span-12 sm:col-span-6 lg:col-span-4 xl:col-span-3">
                        <div class="bg-slate-50 dark:bg-slate-800 h-full rounded overflow-hidden">
                            <div class="relative">
                                <div
                                    class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-white flex items-center justify-center w-12 h-12 bg-white bg-opacity-50 rounded-full cursor-pointer">


                                </div>
                                <img src="https://cdn.easyfrontend.com/pictures/courses/courses1.jpg" class="w-full"
                                    alt="..." />
                            </div>
                            <div class="p-4">
                                <a>
                                    <p class="text-[15px] opacity-80 mb-2">Marketing</p>
                                </a>
                                <a>
                                    <h5 class="text-[19px] font-medium leading-snug mb-2">
                                        The Complete Digital Marketing Guide Course
                                    </h5>
                                </a>
                                <p class="text-[15px] opacity-80">Some quick example text to build on the card the bulk
                                    content...</p>
                                <div class="flex justify-between mt-4 mb-2">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            <img src="https://cdn.easyfrontend.com/pictures/testimonial/testimonial_square_1.jpeg"
                                                alt="" class="max-w-full h-auto rounded-full border"
                                                width="40" />
                                        </div>
                                        <div>
                                            <h4 class="text-base font-medium mb-0">John Smith</h4>
                                        </div>
                                    </div>
                                    <a href="#"
                                        class="border border-blue-600 px-3 py-2 hover:bg-blue-600 hover:text-white duration-300 rounded uppercase text-sm"
                                        type="button">Gift</a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <!-- pagination -->
                <div class="col-span-12">
                    <nav>
                        <ul class="flex flex-wrap gap-3 justify-center mt-12">
                            <li>
                                <a class="bg-blue-600 text-white hover:bg-opacity-90 w-12 h-12 flex justify-center items-center rounded text-lg cursor-pointer"
                                    href="#">
                                    <i class="fas fa-angle-left"></i>
                                </a>
                            </li>

                            <li
                                class="bg-blue-600 text-white hover:bg-opacity-90 w-12 h-12 flex justify-center items-center rounded text-lg cursor-pointer">
                                <a class="m-0" href="#">1</a>
                            </li>
                            <li
                                class="border border-gray-300 dark:border-gray-600 hover:border-blue-600 hover:text-white hover:bg-blue-600 w-12 h-12 flex justify-center items-center rounded text-lg cursor-pointer">
                                <a class="" href="#">2</a>
                            </li>
                            <li
                                class="border border-gray-300 dark:border-gray-600 hover:border-blue-600 hover:text-white hover:bg-blue-600 w-12 h-12 flex justify-center items-center rounded text-lg cursor-pointer">
                                <a class="" href="#">3</a>
                            </li>
                            <li
                                class="border border-gray-300 dark:border-gray-600 hover:border-blue-600 hover:text-white hover:bg-blue-600 w-12 h-12 flex justify-center items-center rounded text-lg cursor-pointer">
                                <a class="" href="#">4</a>
                            </li>
                            <li
                                class="border border-gray-300 dark:border-gray-600 hover:border-blue-600 hover:text-white hover:bg-blue-600 w-12 h-12 flex justify-center items-center rounded text-lg cursor-pointer">
                                <a class="" href="#">5</a>
                            </li>
                            <li
                                class="border border-gray-300 dark:border-gray-600 hover:border-blue-600 hover:text-white hover:bg-blue-600 w-12 h-12 flex justify-center items-center rounded text-lg cursor-pointer">
                                <a class="" href="#">...</a>
                            </li>
                            <li
                                class="border border-gray-300 dark:border-gray-600 hover:border-blue-600 hover:text-white hover:bg-blue-600 w-12 h-12 flex justify-center items-center rounded text-lg cursor-pointer">
                                <a class="" href="#">11</a>
                            </li>

                            <li>
                                <a class="bg-blue-600 text-white hover:bg-opacity-90 w-12 h-12 flex justify-center items-center rounded text-lg cursor-pointer"
                                    href="#">
                                    <i class="fas fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>  --}}
@endsection