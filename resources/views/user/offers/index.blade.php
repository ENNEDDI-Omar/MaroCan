@extends('layouts.home')
@section('content')
    <div class="w-full p-12 bg-white dark:bg-gray-700">
        <div class="flex items-end justify-between mb-12 header">
            <div class="title">
                <p class="mb-4 text-4xl font-bold text-gray-800">
                    Lastest Volunteering Offers:
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
            @foreach ($volunteerOffers as $offer)
                <div class="m-auto overflow-hidden rounded-lg shadow-lg cursor-pointer h-90 w-60 md:w-80">
                    <a href="{{ route('user.volunteering-offers.show', $offer->id) }}" class="block w-full h-full">
                        <img alt="Offer image" src="{{ $offer->getFirstMediaUrl('offers') ?? asset('images/default.jpg') }}"
                            class="object-cover w-full max-h-40" />
                        <div class="w-full p-4 bg-white dark:bg-gray-800">
                            <p class="font-medium text-indigo-500 text-md">
                                {{ $offer->category }}
                            </p>
                            <p class="mb-2 text-xl font-medium text-gray-800 dark:text-white">
                                {{ $offer->title }}
                            </p>
                            <p class="font-light text-gray-400 dark:text-gray-300 text-md">
                                {{ Str::limit($offer->description, 100) }}
                            </p>

                            <div class="flex justify-between mt-4">
                                @if ($offer->status == 'available')
                                    <a href="{{ route('user.volunteering-offers.show', $offer->id) }}"
                                        class="border border-yellow-400 px-3 py-2 hover:bg-blue-600 hover:text-white duration-300 rounded uppercase text-sm"
                                        type="button">Show
                                    </a>
                                    <a href="#"
                                        class="border border-green-600 px-3 py-2 ml-2 hover:bg-blue-600 hover:text-white duration-300 rounded uppercase text-sm" onclick="openModal(true, {{ $offer->id }})"
                                        type="button">Apply
                                    </a>
                                @else
                                    <button href="#"
                                        class="border border-red-600 px-3 py-2 hover:bg-blue-600 hover:text-white duration-300 rounded uppercase text-sm"
                                        type="button">Not Available
                                @endif

                            </div>



                        </div>
                    </a>
                </div>
                 <!-- Modal Structure -->
        <div id="modal{{ $offer->id }}" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
            <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                <div class="mt-3 text-center">
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                        <svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Apply for Volunteering</h3>
                    <form action="{{ route('user.applications.store') }}" method="POST" class="mt-2">
                        @csrf
                        <input type="hidden" name="volunteering_offer_id" value="{{ $offer->id }}">
                        <div>
                            <label for="motivation" class="block text-sm font-medium text-gray-700">Motivation</label>
                            <textarea name="motivation" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required></textarea>
                            @error('motivation')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
                            <input type="number" name="age" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            @error('age')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="items-center px-4 py-3">
                            <button id="ok-btn" class="px-4 py-2 bg-green-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-300">
                                Submit
                            </button>
                        </div>
                    </form>
                    <div class="items-center px-4 py-3">
                        <button onclick="openModal(false, {{ $offer->id }})" class="px-4 py-2 bg-red-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-300">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
            @endforeach
        </div>
    </div>
    </div>
    <script>
        function openModal(open, id) {
            var modal = document.getElementById('modal' + id);
            if (open) {
                modal.style.display = 'block';
            } else {
                modal.style.display = 'none';
            }
        }
    </script>
    
@endsection
