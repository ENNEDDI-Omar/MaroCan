@extends('layouts.home')
@section('content')

<section class="py-28 md:py-52 bg-white dark:bg-gray-700 text-gray-900 dark:text-white relative flex items-center overflow-hidden" style="background-image: url('{{asset('images/team12.jpg')}}'); background-size: cover; background-position: center;">
  <div class="container mx-auto px-4">
    <div class="max-w-2xl mx-auto bg-white rounded-lg p-8 shadow-lg relative">
      <h2 class="text-2xl font-bold mb-6 text-center">Reserve Your Tickets for {{ $match->team1->name }} VS {{ $match->team2->name }}</h2>
      <form action="{{ route('user.reservations.store') }}" method="POST">
        @csrf
        <input type="hidden" name="football_match_id" value="{{ $match->id }}">
        <div class="mb-4">
          <label for="zone" class="block text-gray-700 text-sm font-bold mb-2">Select Zone:</label>
          <select name="zone" id="zone" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
            <option value="">Choose your Zone</option>
            <option value="gradins">Gradins - $500</option>
            <option value="tribunes">Tribunes - $800</option>
            <option value="vip">VIP - $1500</option>
          </select>
        </div>
        <div class="mb-4">
          <label for="number_of_tickets" class="block text-gray-700 text-sm font-bold mb-2">Number of Tickets:</label>
          <input type="number" name="number_of_tickets" id="number_of_tickets" min="1" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
          @error('number_of_tickets')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
              
          @enderror
        </div>
        <div class="flex justify-between items-center">
          <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Reserve Now</button>
          
        </div>
      </form>
    </div>
  </div>
</section>

@endsection
