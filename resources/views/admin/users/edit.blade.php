@extends('layouts.dash')
@section('content')

<div class="container mx-auto">
    <h1 class="text-2xl font-bold my-4">Modifier l'Utilisateur</h1>
    <div class="bg-white shadow-md rounded px-8 py-6 mb-4">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
        
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" value="{{ old('nom', $user->nom) }}"
                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('nom')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" value="{{ old('prenom', $user->prenom) }}"
                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('prenom')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Adresse Email :</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('email')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="tel">Téléphone :</label>
                <input type="tel" id="tel" name="tel" value="{{ old('tel', $user->tel) }}"
                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('tel')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="role_id">Rôle :</label>
                <select id="role_id" name="roles[]" multiple 
                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ in_array($role->id, old('roles', $user->roles->pluck('id')->toArray())) ? 'selected' : '' }}>
                            {{ $role->nom }}
                        </option>
                    @endforeach
                </select>
                @error('roles')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Enregistrer</button>
                <a href="{{ route('users.index') }}"
                    class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Annuler</a>
            </div>
        </form>
        
    </div>
</div>

@endsection