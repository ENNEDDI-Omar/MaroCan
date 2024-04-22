<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagStoreRequest;
use App\Http\Requests\TagUpdateRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.index');
    }   

    public function store(TagStoreRequest $request)
    {
        try {
            
            $tag = Tag::create($request->validated());
            return redirect()->route('admin.tags.index')->with('success', 'Tag créé avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la création du tag. Détails de l\'erreur : ' . $e->getMessage());
        }
    }

    public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }

    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(TagUpdateRequest $request, Tag $tag)
    {
        try {
            $data = $request->validated();
            $tag->update($data);
            return redirect()->route('admin.tags.index')->with('success', 'Tag modifié avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la modification du tag. Détails de l\'erreur : ' . $e->getMessage());
        }
    }

    public function destroy(Tag $tag)
    {
        try {
            $tag->delete();
            return redirect()->route('admin.tags.index')->with('success', 'Tag supprimé avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la suppression du tag. Détails de l\'erreur : ' . $e->getMessage());
        }
    }

}
