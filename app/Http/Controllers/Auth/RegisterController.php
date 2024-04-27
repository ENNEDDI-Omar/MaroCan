<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.register');
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
    public function register(RegisterRequest $request)
    {

        try 
        {
            $createdUser = User::create(array_merge($request->validated(), ['password' => bcrypt($request->input('password'))]));
            $userRole = $createdUser->assignRole(['user']);
             
             if(!$userRole)
             {
                    return back()->withInput()->with('error', 'Une erreur est servenue lors de l \'attribution du role. Veulliez réessayer svp.');
             }
            return redirect()->route('login.form')->with('success', 'Votre compte a été créé avec succès. Connectez-vous maintenant.');
        }catch(\Exception $e)
        {
            return back()->withInput()->with('error', 'Une erreur est survenue lors de la création de votre compte. Veuillez réessayer. Détails de l\'erreur : ' . $e->getMessage());
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
