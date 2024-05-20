<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $latestArticle = Article::where('status', 'published')
            ->latest()
            ->first();

        // Fetch all other published articles excluding the latest one
        if ($latestArticle) {
            $articles = Article::where('id', '!=', $latestArticle->id)
                ->where('status', 'published')
                ->latest()
                ->paginate(10);
        } else {
            // If no latest article is found, just fetch other articles
            $articles = Article::where('status', 'published')
                ->latest()
                ->paginate(10);
        }

        return view('user.articles.index', compact('articles', 'latestArticle'));
    }

    public function search(Request $request)
    {

      //  return "hello";

        $search = $request->input('searchKey');
        $latestArticle=[];
        $articles = Article::query()
            ->where('title', 'like', "%".$search."%")
            ->orWhere('content', 'like', "%".$search."%")
            ->paginate(1);


     

        return view('user.articles.index', compact('articles','latestArticle'));
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
    public function show(Article $article)
{
    
    $article->load('tags', 'accreditationBadge.user');

    return view('user.articles.show', compact('article'));
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
