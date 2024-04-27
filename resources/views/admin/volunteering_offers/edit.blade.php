@extends('layouts.dash')
@section('content')
    <div class="mx-14 mt-10 border-2 border-blue-400 rounded-lg">

        <div class="mt-3 text-center text-4xl font-bold">Edit your Volunteering Offer</div>
        <form action="{{ route('admin.volunteering-offers.update', $volunteeringOffer->id) }}" method="POST"
            enctype="multipart/form-data" class="p-8">
            @csrf
            @method('PUT')
            <div class="flex gap-4">
                <div class="w-1/2">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title of the Offer</label>
                    <input type="text" id="title" name="title" value="{{ $volunteeringOffer->title }}"
                        class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-4 placeholder-slate-400 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                        placeholder="Enter the title" />
                    @error('title')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-1/2">
                    <label for="affiche" class="block text-sm font-medium text-gray-700">Offer Poster</label>
                    <input type="file" id="affiche" name="affiche"
                        class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-4 placeholder-slate-400 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm"
                        accept="image/*" />
                    @error('affiche')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>


            <div class="my-6 flex gap-4">
                <div class="w-1/2">
                    <label for="football_match_id" class="block text-sm font-medium text-gray-700">Select Football
                        Match</label>
                    <select id="football_match_id" name="football_match_id"
                        class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-4 text-gray-500 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                        required>
                        <option value="">Select Football Match</option>
                        @foreach ($footballMatches as $match)
                            <option value="{{ $match->id }}" @if ($match->id == $volunteeringOffer->football_match_id) selected @endif>
                                {{ $match->team1->name }} VS {{ $match->team2->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="w-1/2">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="status" name="status"
                        class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-4 text-gray-500 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                        required>
                        <option value="available" @if ($volunteeringOffer->status == 'available') selected @endif>Available</option>
                        <option value="not available" @if ($volunteeringOffer->status == 'not available') selected @endif>Not Available
                        </option>
                    </select>
                    @error('status')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>


            <div class="my-6">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" name="description"
                    class="mt-1 block w-full resize-none rounded-md border border-slate-300 p-5 text-gray-500"
                    placeholder="Describe the role and responsibilities" rows="5" >{{ $volunteeringOffer->description }}</textarea>
                @error('description')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>


            <div class="flex gap-4 mb-8">
                <div class="w-1/2">
                    <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
                    <input type="text" id="position" name="position" value="{{ $volunteeringOffer->position }}"
                        class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-4 placeholder-slate-400 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                        placeholder="Specify the position required" required />
                    @error('position')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-1/2">
                    <label for="number_of_volunteers" class="block text-sm font-medium text-gray-700">Number of
                        Volunteers</label>
                    <input type="number" id="number_of_volunteers" name="number_of_volunteers"
                        value="{{ $volunteeringOffer->number_of_volunteers }}"
                        class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-4 placeholder-slate-400 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                        placeholder="Enter the required number of volunteers" min="1" max="100" required />
                        @error('number_of_volunteers')
                            <span class="text-red-500">{{ $message }}</span>
                            
                        @enderror
                </div>
            </div>
            

            <div class="text-center flex justify-between mt-4">
                <a href="{{ route('admin.volunteering-offers.index') }}"
                    class="cursor-pointer rounded-lg bg-gray-700 px-8 py-5 text-sm font-semibold text-white shadow-lg">Cancel</a>
                <button type="submit"
                    class="cursor-pointer rounded-lg bg-blue-700 px-8 py-5 text-sm font-semibold text-white shadow-lg">Update
                    Offer</button>
            </div>
        </form>
    </div>
@endsection
