<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MediaPlatform;
use Illuminate\Http\Request;
use App\Http\Requests\MediaPlatformStoreRequest;
use App\Http\Requests\MediaPlatformUpdateRequest;

class MediaPlatformController extends Controller
{
    public function index()
    {
        try {
            $mediaPlatforms = MediaPlatform::paginate(6);
            return view('admin.media_platforms.index', compact('mediaPlatforms'));
        } catch (\Exception $e) {
            
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la récupération des plateformes médias. Détails de l\'erreur : ' . $e->getMessage());
        }
    }


    public function create()
    {
        return view('admin.media_platforms.create');
    }


    public function store(MediaPlatformStoreRequest $request)
    {
        try {
            $mediaPlatform = MediaPlatform::create($request->validated());
            if ($request->hasFile('logo')) {
                $mediaPlatform->addMediaFromRequest('logo')->toMediaCollection('platforms');
            }
            return redirect()->route('admin.media-platforms.index')->with('success', 'Plateforme média créée avec succès.');
        } catch (\Exception $e) {
            
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de l\'enregistrement de la plateforme média. Détails de l\'erreur : ' . $e->getMessage());
        }
    }


    public function edit(MediaPlatform $media)
    {
        return view('admin.media_platforms.edit', compact('mediaPlatform'));
    }


    public function update(MediaPlatformUpdateRequest $request, MediaPlatform $media)
    {
        try {
            $media->update($request->validated());
            if ($request->hasFile('logo'))
            {
                $media ->clearMediaCollection('platforms');
                $media->addMediaFromRequest('logo')->toMediaCollection('platforms');
            }
            return redirect()->route('admin.media-platforms.index')->with('success', 'Plateforme média mise à jour avec succès.');
        } catch (\Exception $e) {
            
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la mise à jour de la plateforme média. Détails de l\'erreur : ' . $e->getMessage());
        }
    }


    public function destroy(MediaPlatform $media)
    {
        try {
            $media->delete();
            return redirect()->route('admin.media-platforms.index')->with('success', 'Plateforme média supprimée avec succès.');
        } catch (\Exception $e) {
            
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la suppression de la plateforme média. Détails de l\'erreur : ' . $e->getMessage());
        }
    }
}
