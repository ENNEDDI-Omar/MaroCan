@extends('layouts.dash')
@section('content')

<div class="container p-2 mx-auto sm:p-4 text-gray-800">
    <h2 class="mb-4 text-2xl font-semibold leading-tight">Volunteering Offers</h2>
    <div class="mb-4">
        <a href="{{ route('admin.volunteering-offers.create') }}"
           class="inline-block rounded bg-blue-500 px-6 py-2 text-white text-sm font-medium hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            Create New Volunteering Offer
        </a>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full text-xs">
            <colgroup>
                <col span="1" style="width: 20%;">
                <col span="1" style="width: 25%;">
                <col span="1" style="width: 20%;">
                <col span="1" style="width: 15%;">
                <col span="1" style="width: 20%;">
            </colgroup>
            <thead class="bg-gray-700 text-white">
                <tr class="text-left">
                    <th class="p-3">Offer Title</th>
                    <th class="p-3">Football Match</th>
                    <th class="p-3">Volunteers Required</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($volunteeringOffers as $offer)
                <tr class="border-b border-gray-300 bg-white">
                    <td class="p-3">
                        <p>{{ $offer->title }}</p>
                    </td>
                    <td class="p-3">
                        <p>{{ $offer->footballMatch->team1->name ?? 'N/A' }} VS {{ $offer->footballMatch->team2->name ?? 'N/A' }}</p>
                    </td>
                    <td class="p-3">
                        <p>{{ $offer->number_of_volunteers }}</p>
                    </td>
                    <td class="p-3">
                        <span class="px-3 py-1 font-semibold rounded-md {{ $offer->status === 'available' ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }}">
                            {{ ucfirst($offer->status) }}
                        </span>
                    </td>
                    <td class="p-3 flex gap-2">
                        <a href="{{ route('admin.volunteering-offers.edit', $offer->id) }}" class="text-blue-500 hover:text-blue-600">Edit</a>
                        |
                        <a href="{{ route('admin.volunteering-offers.show', $offer->id) }}" class="text-green-500 hover:text-green-600">View</a>
                        |
                        <form method="POST" action="{{ route('admin.volunteering-offers.destroy', $offer->id) }}" onsubmit="return confirm('Are you sure you want to delete this offer?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Pagination links --}}
        <div class="mt-4">
            {{ $volunteeringOffers->links() }}
        </div>
    </div>
</div>

@endsection
