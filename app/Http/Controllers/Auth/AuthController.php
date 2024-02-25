<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registre(RegisterRequest $request)
    {
        $createdUser = User::create(array_merge($request->validated(), ['password' => bcrypt($request->input('password'))]));
        $userRole = Role::where('name', 'admin')->first();

        if ($userRole) {
            $createdUser->roles()->attach($userRole);
        }
        return redirect()->route('login')->with('success', 'Votre compte a été créé avec succès. Connectez-vous maintenant.');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            return redirect()->intended('home');
        }else {
            return redirect()->route('login')->with('error', 'Les informations d\'identification fournies sont incorrectes.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
