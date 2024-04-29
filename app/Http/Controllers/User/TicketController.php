<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;



class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
/**
 * Generate a PDF ticket for the given reservation.
 */
public function generateTicket(Reservation $reservation)
{
    $pdf = Pdf::loadView('ticket', compact('reservation'));
    
    $pdf->save(storage_path('app/public/tickets/' . $reservation->id . '.pdf'));

    return $pdf->download("ticket" . $reservation->id . ".pdf");
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        $filePath = storage_path('app/public/tickets/' . $reservation->id . '.pdf');

        return response()->file($filePath);
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
