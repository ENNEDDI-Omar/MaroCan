<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Journalist\BadgeController;
use App\Http\Requests\AccreditationBadgeStoreRequest;
use App\Models\AccreditationBadge;
use App\Models\MediaPlatform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccreditationController extends Controller
{
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medias = MediaPlatform::all();
        return view('user.accreditation_badge_form', compact('medias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AccreditationBadgeStoreRequest $request)
    {
        $data = $request->validated();
    
        try {
            $media = MediaPlatform::findOrFail($data['mediaPlatform_id']);

            if ($media->media_platform_code !== $data['media_platform_code']) {
                return redirect()->back()->withErrors(['media_platform_code' => 'Le code média que vous avez saisi n\'est pas valide pour le média sélectionné.'])->withInput();
            }
            $badge = AccreditationBadge::create([
                'user_id' => auth()->id(),
                'mediaPlatform_id' => $media->id,
                'license_number' =>$data['license_number']

            ]);

            $badge->user->assignRole(['journalist']);
             
            $badgeController = new BadgeController;
            $badgeController->generateBadge($badge);
            
            return redirect()->route('home.index')->with('success', 'Votre demande d\'accréditation a été envoyée avec succès et votre badge a été généré.');
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => 'Erreur lors de la création de l\'accréditation: ' . $e->getMessage()])->withInput();
        }
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
