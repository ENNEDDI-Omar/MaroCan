<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\VolunteeringOffer;
use Illuminate\Http\Request;

class VolunteerOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $volunteerOffers = VolunteeringOffer::paginate(9);
        return view('user.offers.index', compact('volunteerOffers'));
    }
    

    public function search(Request $request)
    {
        $search = $request->input('searchKey');
        
        $volunteerOffers = VolunteeringOffer::query()
            ->where('title', 'like', "%{$search}%")
            ->orWhere('description', 'like', "%{$search}%")
            ->paginate(2);

        return view('user.offers.index', compact('volunteerOffers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(VolunteeringOffer $volunteeringOffer)
    {
        return view('user.offers.show', compact('volunteeringOffer'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
