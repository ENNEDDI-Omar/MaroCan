<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleStoreRequest;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        // $user = Auth::user()->journalist;
        $articles = Article::with('journalist', 'tags')->paginate(6);
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        $tags = Tag::all();

        return view('admin.articles.create', compact('tags'));
    }

    public function store(ArticleStoreRequest $request)
    {   
        try
        {   $user = Auth::user();
            
            if (!$user || !$user->journalist) {
                return redirect()->back()->with('error', 'L’utilisateur actuel n’est pas un journaliste ou n’est pas authentifié.');
            }
        
           $data = $request->validated();
           $data['journalist_id'] = $user->journalist->id;

            $article = Article::create($data);

            if ($request->hasFile('image')) 
                {
                    $article->addMediaFromRequest('image')->toMediaCollection('articles');
                }
            if ($request->has('tags')) 
            {
                $article->tags()->attach($request->input('tags', []));
            }    

            return redirect()->route('admin.articles.index')->with('success', 'Article créé avec succès');

        }catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la création de l\'article. Détails de l\'erreur : ' . $e->getMessage());
        }
    }

    public function show(Article $article)
    {
        return view('admin.articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(ArticleStoreRequest $request, Article $article)
    {
        try {
            $data = $request->validated();
            $article->update($data);

            if ($request->hasFile('image')) 
            {
                $article->clearMediaCollection('articles');
                $article->addMediaFromRequest('image')->toMediaCollection('articles');
            }
            if ($request->has('tags')) 
            {
                $article->tags()->sync($request->input('tags', []));
            }

            return redirect()->route('admin.articles.index')->with('success', 'Article modifié avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la modification de l\'article. Détails de l\'erreur : ' . $e->getMessage());
        }
    }

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
