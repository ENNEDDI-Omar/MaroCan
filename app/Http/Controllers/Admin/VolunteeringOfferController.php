<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VolunteeringOfferStoreRequest;
use App\Http\Requests\VolunteeringOfferUpdateRequest;
use App\Models\FootballMatch;
use App\Models\VolunteeringOffer;
use Illuminate\Http\Request;

class VolunteeringOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $volunteeringOffers = VolunteeringOffer::paginate(6);
        return view('admin.volunteering_offers.index', compact('volunteeringOffers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $footballMatches = FootballMatch::all();
        return view('admin.volunteering_offers.create', compact('footballMatches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VolunteeringOfferStoreRequest $request)
    {
        $data = $request->validate();

        try {
            $volunteeringOffer = VolunteeringOffer::create($data);
            if ($request->hasFile('affiche')) {
                $volunteeringOffer->addMediaFromRequest('affiche')->toMediaCollection('offers');
            }
            
            return redirect()->route('admin.volunteering-offers.index')->with('success', 'Offre de bénévolat créée avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la création de l\'offre de bénévolat. Détails de l\'erreur : ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(VolunteeringOffer $volunteeringOffer)
    {
        return view('admin.volunteering_offers.show', compact('volunteeringOffer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VolunteeringOffer $volunteeringOffer)
    {
        $footballMatches = FootballMatch::all();
        return view('admin.volunteering_offers.edit', compact('volunteeringOffer', 'footballMatches'));
    }
    
        
    

    /**
     * Update the specified resource in storage.
     */
    public function update(VolunteeringOfferUpdateRequest $request, VolunteeringOffer $volunteeringOffer)
    {
        $data = $request->validated();

        try {
            $volunteeringOffer->update($data);
            if ($request->hasFile('affiche')) {
                $volunteeringOffer->clearMediaCollection('offers');
                $volunteeringOffer->addMediaFromRequest('affiche')->toMediaCollection('offers');
            }
            
            return redirect()->route('admin.volunteering-offers.index')->with('success', 'Offre de bénévolat modifiée avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la modification de l\'offre de bénévolat. Détails de l\'erreur : ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VolunteeringOffer $volunteeringOffer)
    {
        try {
            $volunteeringOffer->delete();
            return redirect()->route('admin.volunteering-offers.index')->with('success', 'Offre de bénévolat supprimée avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la suppression de l\'offre de bénévolat. Détails de l\'erreur : ' . $e->getMessage());
        }
    }
}
