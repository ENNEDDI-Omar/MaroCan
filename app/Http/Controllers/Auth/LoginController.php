<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {

        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        try {
            $credentials = $request->validated();
            $remember = $request->has('remember_me') ? true : false;

            // dd($remember);
            if (Auth::attempt($credentials, $remember)) {
                $user = Auth::user();
                // dd($user);
                
                if ($user->hasRole(['admin'])) {
                    return redirect()->route('admin.dashboard')->with('success', 'Vous êtes connecté comme Admin avec succès.');
                }else if ($user->hasRole(['user'])) {
                    return redirect()->route('user.home.index')->with('success', 'Vous êtes connecté comme Utilisateur avec succès.');
                }
    
                return redirect()->intended('home.index')->with('success', 'Vous êtes connecté avec succès mais sans aucun role.');
            } else {
                return redirect()->route('login')->withInput()->with('error', 'Les informations d\'identification fournies sont incorrectes.');
            }
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Une erreur est survenue lors de la connexion. Veuillez réessayer. Détails de l\'erreur : ' . $e->getMessage());
        }
    }


    public function destroy(Request $request)
    {
        
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
