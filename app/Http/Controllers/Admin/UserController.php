<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
{
    
    $users = User::with('roles')->paginate(6); 
    return view('admin.users.index', compact('users'));
}


    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(UserStoreRequest $request)
    {
        try {
            $data = $request->validated();
            $data['password'] = bcrypt($request->input('password'));

            $CreatedUser = User::create($data);

            if ($request->hasFile('profil')) {
                $CreatedUser->addMediaFromRequest('profil')->toMediaCollection('users');
            }
            if ($request->has('roles')) {
                $CreatedUser->assignRole($request->input('roles', []));
            }
            return redirect()->route('admin.users.index')->with('success', 'Utilisateur créé avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la création de l\'utilisateur. Détails de l\'erreur : ' . $e->getMessage());
        }
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }


    public function update(UserUpdateRequest $request, User $user)
    {
        try {
            $data = $request->validated();
            $data['password'] = Hash::make($request->password);


            $user->update($data);

            if ($request->hasFile('profil')) {
                $user->clearMediaCollection('users');
                $user->addMediaFromRequest('profil')->toMediaCollection('users');
            }
            if ($request->has('roles')) {
                $user->roles()->sync($request->input('roles', []));
            }

            return redirect()->route('admin.users.index')->with('success', 'Utilisateur modifié avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la modification de l\'utilisateur. Détails de l\'erreur : ' . $e->getMessage());
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la suppression de l\'utilisateur. Détails de l\'erreur : ' . $e->getMessage());
        }
    }

    public function ban(User $user)
    {
        try {
            $user->update(['status' => 'banned']);
            return redirect()->route('admin.users.index')->with('success', 'Utilisateur banni avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la tentative de bannissement de l\'utilisateur. Détails de l\'erreur : ' . $e->getMessage());
        }
    }
}
