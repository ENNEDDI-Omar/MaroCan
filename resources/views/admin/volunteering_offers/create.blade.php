@extends('layouts.dash')
@section('content')
<div class="mx-14 mt-10 border-2 border-blue-400 rounded-lg">
    
    <div class="mt-3 text-center text-4xl font-bold">Create your Volunteering Offer</div>
    <form action="{{ route('admin.volunteering-offers.store') }}" method="POST" enctype="multipart/form-data" class="p-8">
        @csrf
        <div class="flex gap-4">
            <input type="text" name="title"
                class="mt-1 block w-1/2 rounded-md border border-slate-300 bg-white px-3 py-4 placeholder-slate-400 shadow-sm placeholder:font-semibold placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm"
                placeholder="Title of the Offer *" required />
            <input type="file" name="affiche"
                class="mt-1 block w-1/2 rounded-md border border-slate-300 bg-white px-3 py-4 placeholder-slate-400 shadow-sm placeholder:font-semibold placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm"
                accept="image/*" />
                @error('affiche')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
        </div>
        <div class="my-6 flex gap-4">
            <select name="football_match_id"
                class="block w-1/2 rounded-md border border-slate-300 bg-white px-3 py-4 font-semibold text-gray-500 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm" required>
                <option value="">Select Football Match</option>
                @foreach ($footballMatches as $match)
                    <option value="{{ $match->id }}">{{ $match->team1->name }} VS {{$match->team2->name}}</option>
                @endforeach
            </select>
            <select name="status"
                class="block w-1/2 rounded-md border border-slate-300 bg-white px-3 py-4 font-semibold text-gray-500 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm" required>
                <option value="available">Available</option>
                <option value="not available">Not Available</option>
            </select>
            @error('status')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="my-6">
            <textarea name="description"
                class="mb-10 w-full resize-none rounded-md border border-slate-300 p-5 font-semibold text-gray-500"
                placeholder="Describe the role and responsibilities" rows="5" required></textarea>
                @error('description')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
        </div>
        <div class="flex gap-4">
            <input type="text" name="position"
                class="mt-1 block w-1/2 rounded-md border border-slate-300 bg-white px-3 py-4 placeholder-slate-400 shadow-sm placeholder:font-semibold placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm"
                placeholder="Position required *" required />
            <input type="number" name="number_of_volunteers"
                class="mt-1 block w-1/2 rounded-md border border-slate-300 bg-white px-3 py-4 placeholder-slate-400 shadow-sm placeholder:font-semibold placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm"
                placeholder="Number of volunteers needed" min="1" max="100" required />
                @error('number_of_volunteers')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
        </div>
        <div class="text-center flex justify-between">
            <a href="{{ route('admin.volunteering-offers.index') }}"
                class="cursor-pointer rounded-lg bg-red-600 px-8 py-5 text-sm font-semibold text-white">Cancel</a>
            <button type="submit"
                class="cursor-pointer rounded-lg bg-blue-700 px-8 py-5 text-sm font-semibold text-white">Submit Offer</button>
        </div>
    </form>
</div>
@endsection
