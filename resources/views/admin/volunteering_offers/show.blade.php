@extends('layouts.dash')
@section('content')

<section class="py-14 md:py-24 bg-white dark:bg-[#0b1727] text-black dark:text-white">
    <div class="container px-4">
      <!-- Heading -->
      <div class="grid grid-cols-12 justify-between">
        <!-- Details Section -->
        <div class="col-span-12 lg:col-span-6">
          <div>
            <h1 class="text-3xl md:text-[45px] font-bold leading-snug mb-4">{{ $volunteeringOffer->title }}</h1>
            <p class="text-lg opacity-80 mb-12">{{ $volunteeringOffer->description }}</p>
          </div>
          <!-- Additional Information Cards -->
          <div class="flex flex-col sm:flex-row gap-6">
            <!-- Card for Position -->
            <div class="mb-6">
              <h3 class="font-black text-3xl md:text-[45px] mb-4">{{ $volunteeringOffer->position }}</h3>
              <h5 class="text-xl font-bold mb-2">Position Required</h5>
              <p class="mb-0">This is the role the volunteer will be fulfilling in this offer.</p>
            </div>
            <!-- Card for Status -->
            <div class="mb-6">
              <h3 class="font-black text-3xl md:text-[45px] mb-4">{{ $volunteeringOffer->status }}</h3>
              <h5 class="text-xl font-bold mb-2">Current Status</h5>
              <p class="mb-0">This indicates whether the volunteering offer is currently available or not.</p>
            </div>
          </div>

          <div class="flex flex-col sm:flex-row gap-6">
            <!-- Card for Number of Volunteers -->
            <div class="mb-6">
              <h3 class="font-black text-3xl md:text-[45px] mb-4">{{ $volunteeringOffer->number_of_volunteers }}</h3>
              <h5 class="text-xl font-bold mb-2">Volunteers Needed</h5>
              <p class="mb-0">The number of volunteers required for this offer.</p>
            </div>

            <!-- Card for Associated Football Match -->
            <div class="mb-6 rounded-lg">
              <h3 class="font-black text-3xl md:text-[45px] mb-4">{{ $volunteeringOffer->footballMatch->team1->name }} VS {{ $volunteeringOffer->footballMatch->team2->name }}</h3>
              <h5 class="text-xl font-bold mb-2">Associated Football Match</h5>
              <p class="mb-0">This is the football match associated with the volunteering opportunity.</p>
            </div>
          </div>
        </div>
        
        <!-- Image Section -->
        <div class="col-span-12 lg:col-span-4 lg:col-start-8">
          <div class="flex justify-center items-end h-full">
            <!-- Assuming you have a method to retrieve the media image -->
            <img
              src="{{ $volunteeringOffer->getMedia('offers') ? $volunteeringOffer->getFirstMediaUrl('offers') : 'https://via.placeholder.com/800x600'}}" 
              alt="Featured Image for {{ $volunteeringOffer->title }}"
              class="max-w-full h-auto rounded-lg mt-12 md:mt-0"
            />
          </div>
        </div>
      </div>
    </div>
    <a href="{{ route('admin.volunteering-offers.index') }}"
       class="cursor-pointer rounded-lg bg-red-600 px-8 py-5 text-sm font-semibold text-white">Back to Offers</a>
  </section>
  
@endsection
