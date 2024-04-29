@extends('layouts.home')

@section('content')
    <div class="w-full p-12 bg-white dark:bg-gray-700">
        <div class="flex flex-col items-center text-center">
            <h1 class="text-3xl md:text-[45px] font-bold mb-2">Our Exclusive Matchs, Buy your Ticket and enjoy the
                Competition</h1>
            <!-- tab bar -->
            <ul class="flex flex-wrap justify-center my-6">
                <li class="px-4 py-2 border-b-2 border-blue-600">
                    <a class="nav-link" href="{{ route('user.matchs.index') }}">Matchs</a>
                </li>
                <li class="px-4 py-2 hover:border-b-2 hover:border-blue-600 transition duration-300 opacity-80">
                    <a class="nav-link" href="#">Teams</a>
                </li>
                <li class="px-4 py-2 hover:border-b-2 hover:border-blue-600 transition duration-300 opacity-80">
                    <a class="nav-link" href="#">My Reservations</a>
                </li>
            </ul>
        </div>
        <div class="flex justify-end">
            <form action="{{ route('user.matchs.search') }}" method="GET" 
                class="flex flex-col justify-center w-3/4 max-w-sm space-y-3 md:flex-row md:w-full md:space-x-3 md:space-y-0">
                <div class=" relative ">
                    <input type="text" name="searchKey" id="form-subscribe-Search" ...
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
        <div class="grid grid-cols-6 gap-6 mt-12">
            @foreach ($matches as $match)
                <!-- card starts -->
                <div class="col-span-6 md:col-span-3 lg:col-span-2">
                    <div class="relative">
                        
                        <img class="w-full" src="{{ asset('images/match1.jpg') }}" alt="Match Affiche" />
                        <div class="absolute bottom-3 left-1/2 -translate-x-1/2 text-center">
                            <a href="{{ route('user.matchs.show', $match) }}">
                                <h4 class="text-2xl font-medium mb-2 text-black">{{ $match->team1->name }} VS
                                    {{ $match->team2->name }}</h4>
                            </a>
                            <h5 class="font-medium text-[22px] text-green-600 my-3">{{ $match->stadium }}</h5>
                            @if ($match->status == 'available')
                                <a href="{{ route('user.reservations.create', $match) }}"
                                    class="border border-green-600 bg-green-600 px-7 py-3 rounded text-yellow-500 hover:bg-green-600 hover:text-white duration-300 mb-3 uppercase text-sm inline-flex">Buy
                                    a Ticket</a>
                            @else
                                <span
                                    class="border border-red-600 px-7 py-3 rounded text-blue-600 bg-red-600 text-white mb-3 uppercase text-sm inline-flex">
                                    Sold-Out</span>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- card ends -->
            @endforeach

            <!-- Pagination -->
            <div class="col-span-6">
                {{ $matches->links() }} <!-- This will display pagination links -->
            </div>
        </div>
    @endsection
