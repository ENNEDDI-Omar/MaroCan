<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\FootballMatch;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishedArticles = Article::where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

         $matches = FootballMatch::where('status', 'available')
            ->orderBy('match_date', 'asc')
            ->take(4)
            ->get();
        return view('home', compact('publishedArticles', 'matches'));
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
    public function show(string $id)
    {
        //
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
