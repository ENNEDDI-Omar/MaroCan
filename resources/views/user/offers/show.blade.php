@extends('layouts.home')
@section('content')
    <section class="ezy__featured8 light py-14 md:py-24 bg-white dark:bg-[#0b1727] text-zinc-900 dark:text-white">
        <div class="container px-16 md:px-8 lg:px-28">
            <div class="grid grid-cols-12 mb-6 sm:mb-12">
                <div class="col-span-12 lg:col-span-6">
                    <h2 class="text-[25px] md:text-[45px] leading-none font-bold mb-6">{{$volunteeringOffer->title}}</h2>
                    <p class="text-lg leading-6 mb-6">
                        {{ $volunteeringOffer->description }}
                    </p>
                </div>
            </div>
            <div class="grid grid-cols-12 gap-8">
                <div class="col-span-12 lg:col-span-4">
                    <img src="{{ $volunteeringOffer->getFirstMediaUrl('offers') }}" alt="Offer Image"
                        class="h-auto max-w-full" />
                </div>
                <div class="col-span-12 lg:col-span-8">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12 md:col-span-6">
                            <div class="bg-blue-50 dark:bg-[#1E2735] rounded-xl relative p-6 pt-12 lg:p-12">
                                <div class="text-blue-600 text-[32px] inline-flex items-center justify-center mb-6">
                                    <i class="fas fa-cannabis"></i>
                                </div>
                                <h4 class="text-2xl font-bold mb-4">Position:</h4>
                                <p class="opacity-70">
                                    {{ $volunteeringOffer->position }}
                                </p>
                            </div>
                        </div>
                        <div class="col-span-12 md:col-span-6">
                            <div class="bg-blue-50 dark:bg-[#1E2735] rounded-xl relative p-6 pt-12 lg:p-12">
                                <div class="text-blue-600 text-[32px] inline-flex items-center justify-center mb-6">
                                    <i class="fas fa-random"></i>
                                </div>
                                <h4 class="text-2xl font-bold mb-4">Match:</h4>
                                <p class="opacity-70">
                                    {{ $volunteeringOffer->footballMatch->team1->name }} VS
                                    {{ $volunteeringOffer->footballMatch->team2->name }}
                                </p>
                            </div>
                        </div>
                        <div class="col-span-12 md:col-span-6">
                            <div class="bg-blue-50 dark:bg-[#1E2735] rounded-xl relative p-6 pt-12 lg:p-12">
                                <div class="text-blue-600 text-[32px] inline-flex items-center justify-center mb-6">
                                    <i class="fas fa-camera"></i>
                                </div>
                                <h4 class="text-2xl font-bold mb-4">Stadium</h4>
                                <p class="opacity-70">
                                    {{ $volunteeringOffer->footballMatch->stadium }}
                                </p>
                            </div>
                        </div>
                        <div class="col-span-12 md:col-span-6">
                            <div class="bg-blue-50 dark:bg-[#1E2735] rounded-xl relative p-6 pt-12 lg:p-12">
                                <div class="text-blue-600 text-[32px] inline-flex items-center justify-center mb-6">
                                    <i class="fas fa-random"></i>
                                </div>
                                <h4 class="text-2xl font-bold mb-4">City</h4>
                                <p class="opacity-70">
                                    {{ $volunteeringOffer->footballMatch->city }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



{{-- <div class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full lg:w-2/3 px-4 mb-8 lg:mb-0">
                <img class="w-full rounded-lg shadow-lg" src="https://images.unsplash.com/photo-1524368535928-5b5e00ddc76b" alt="Concert Image">
            </div>
            <div class="w-full lg:w-1/3 px-4">
                <h1 class="text-4xl font-bold mb-4">John Smith Live in Concert</h1>
                <p class="text-lg mb-6">Join us for an unforgettable evening of music with John Smith.</p>
                <div class="mb-6">
                    <p class="text-xl font-bold mb-2">When:</p>
                    <p class="text-lg">Friday, April 15th at 8:00 PM</p>
                </div>
                <div class="mb-6">
                    <p class="text-xl font-bold mb-2">Where:</p>
                    <p class="text-lg">The Fillmore Auditorium</p>
                    <p class="text-lg">1805 Geary Blvd, San Francisco, CA</p>
                </div>
                <div class="mb-6">
                    <p class="text-xl font-bold mb-2">Tickets:</p>
                    <p class="text-lg">$35 - General Admission</p>
                    <p class="text-lg">$75 - VIP</p>
                </div>
                <button
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="button">
                    Buy Tickets
                </button>
            </div>
        </div>
    </div>
</div> --}}
