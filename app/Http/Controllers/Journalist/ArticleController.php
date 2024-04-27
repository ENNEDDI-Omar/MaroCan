<?php

namespace App\Http\Controllers\Journalist;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleStoreRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $journalist = auth()->user();
    $accreditationBadge = $journalist->accreditationBadge;
    //dd($accreditationBadge);
    if (!$accreditationBadge) {
        return redirect()->back()->with('error', 'No accreditation badge found.');
    }
    $myArticles = $accreditationBadge->articles; // Assuming this is a loaded collection already

    $myAcceptedArticles = $myArticles->where('status', 'published')->all(); 
    $myPendingArticles = $myArticles->where('status', 'pending')->all();

    return view('journalist.articles.index', compact('myArticles', 'myAcceptedArticles', 'myPendingArticles'));
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        return view('journalist.articles.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleStoreRequest $request)
{
    try {
        $user = auth()->user();

        
        if (!$user->accreditationBadge) {
            return redirect()->back()->with('error', 'Vous devez avoir un badge de journaliste pour publier sur la plateforme. Veuillez en faire la demande.');
        }

        $data = $request->validated();

        
        $data['accreditation_id'] = $user->accreditationBadge->id;
        $data['status'] = 'pending';  

        // Create the article with default status 'pending'
        $article = $user->accreditationBadge->articles()->create($data);

        // Attach tags
        if ($request->has('tags')) {
            $article->tags()->attach($request->input('tags', []));
        }

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $article->addMediaFromRequest('image')->toMediaCollection('articles');
        }

        // Redirect to a more appropriate route after creation
        return redirect()->route('journalist.articles.index')->with('success', 'Article créé avec succès et en attente de révision.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Une erreur est survenue lors de la création de l\'article. Détails de l\'erreur : ' . $e->getMessage());
    }
}



    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        
        return view('journalist.articles.show', compact('article'));
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
    public function update(ArticleUpdateRequest $request, Article $article)
{ 
    try {
        
        $data = $request->validated();
        unset($data['status']); 

        
        if ($request->except('status')) {
            
            $data['status'] = 'pending';
        }

        // Update the article with the new data
        $article->update($data);

        if ($request->hasFile('image')) {
            $article->clearMediaCollection('articles');
            $article->addMediaFromRequest('image')->toMediaCollection('articles');
        }

        if ($request->has('tags')) {
            $article->tags()->sync($request->input('tags', []));
        }

        return redirect()->route('journalist.articles.update')->with('success', 'Article mis à jour avec succès. Statut défini sur "en attente" pour révision.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Une erreur est survenue lors de la modification de l\'article. Détails de l\'erreur : ' . $e->getMessage());
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        try {
            $article->delete();
            return redirect()->route('admin.articles.index')->with('success', 'Article supprimé avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la suppression de l\'article. Détails de l\'erreur : ' . $e->getMessage());
        }
    }
}
