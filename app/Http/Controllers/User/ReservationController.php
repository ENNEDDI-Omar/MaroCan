<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use App\Models\FootballMatch;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $myReservations = auth()->user()->reservations;

        return view('user.reservations.index', compact('myReservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // In ReservationController.php
    public function create(FootballMatch $match)
    {
        return view('user.reservations.create', compact('match'));
    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationStoreRequest $request)
    {
        // dd($request->validated());
        $data = $request->validated();
        try {
            
            $zonePrices = [
                'gradins' => 500,
                'tribunes' => 800,
                'vip' => 1500
            ];
             
            $reservation = new Reservation([
                'user_id' => auth()->id(),
                'football_match_id' => $data['football_match_id'],
                'zone' => $data['zone'],
                'number_of_tickets' => $data['number_of_tickets'],
                'total_price' => $zonePrices[$data['zone']] * $data['number_of_tickets']
            ]);
            
            $reservation->save();

            $ticketController = new TicketController();
            return $ticketController->generateTicket($reservation);
            // dd($res);

            // return redirect()->route('home.index')->with('success', 'Votre réservation a été effectuée avec succès et votre ticket a été généré.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Erreur lors de la création de la réservation: ' . $e->getMessage()])->withInput();
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(FootballMatch $match)
    {
        
        return view('user.reservations.create', compact('match'));
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
