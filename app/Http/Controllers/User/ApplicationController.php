<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\VolunteeringOffer;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offers = VolunteeringOffer::all();
        
        return view('user.offers.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'volunteering_offer_id' => 'required|exists:volunteering_offers,id',
            'user_id' => 'required|exists:users,id',
            'motivation' => 'required|string|text|min:500', // 'motivation' => 'required|string|max:255
            'age' => 'required|numeric',
        ]);

        try {
            $offer = VolunteeringOffer::findOrFail($data['volunteering_offer_id']);
            $application = Application::create([
                'volunteering_offer_id' => $offer->id,
                'user_id' => auth()->id(),
                'motivation' => $data['motivation'], // 'motivation' => 'required|string|max:255
                'age' => $data['age'],
                'status' => 'pending'
            ]);
            $application->user->assignRole(['volunteer']);
            return redirect()->route('user.applications.index')->with('success', 'Votre demande de bénévolat a été envoyée avec succès, une fois acceptée Vous recevrez un mail.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'envoi de votre demande de bénévolat. Détails de l\'erreur : ' . $e->getMessage());
        }   
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        return view('user.offers.show', compact('application'));
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
