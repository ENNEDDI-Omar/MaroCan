<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\FootballMatch;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matches = FootballMatch::paginate(12);
        
        return view('user.matches.index', compact('matches'));
    }

    public function search(Request $request)
{
    $search = $request->input('searchKey');
    
    $matches = FootballMatch::query()
        ->join('teams as t1', 'football_matches.team1_id', '=', 't1.id')
        ->join('teams as t2', 'football_matches.team2_id', '=', 't2.id')
        ->where('t1.name', 'like', "%{$search}%")
        ->orWhere('t2.name', 'like', "%{$search}%")
        ->select('football_matches.*') // Ensure that only columns from football_matches are selected
        ->paginate(2);

    return view('user.matches.index', compact('matches'));
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
    public function show(FootballMatch $match)
    {
        return view('user.matches.show', compact('match'));
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
