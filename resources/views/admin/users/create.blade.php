@extends('layouts.dash')
@section('content')
    {{-- <div class="container mx-auto">
        <h1 class="text-2xl font-bold my-4">Créer un Utilisateur</h1>
        <div class="bg-white shadow-md rounded px-8 py-6 mb-4">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="profil">Photo de profil :</label>
                    <input type="file" id="profil" name="profil"
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('profil')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" value="{{ old('nom') }}"
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('nom')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="prenom">Prénom :</label>
                    <input type="text" id="prenom" name="prenom" value="{{ old('prenom') }}"
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('prenom')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Adresse Email :</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('email')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="tel">Téléphone :</label>
                    <input type="tel" id="tel" name="tel" value="{{ old('tel') }}"
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
                            <option value="{{ $role->id }}"
                                {{ in_array($role->id, old('roles', [])) ? 'selected' : '' }}>
                                {{ $role->nom }}
                            </option>
                        @endforeach
                    </select>
                    @error('roles')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Mot de Passe :</label>
                    <input type="password" id="password" name="password"
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('password')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password_confirmation">Confirmer le Mot
                        de Passe :</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="status">Statut :</label>
                    <select id="status" name="status"
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Actif</option>
                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactif</option>
                    </select>
                    @error('status')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror

                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Enregistrer</button>
                        <a href="{{ route('users.index') }}"
                            class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Annuler</a>
                    </div>
            </form>
        </div>
    </div> --}}


{{-- <div class="container mx-auto">
    <h1 class="text-2xl font-bold my-4">Créer un Utilisateur</h1>
    <div class="bg-white shadow-md rounded px-8 py-6 mb-4">
        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="profil">Photo de profil :</label>
                <input type="file" id="profil" name="profil"
                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('profil')
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
</div> --}}

@extends('layouts.dash')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold my-4">Créer un utilisateur</h1>
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nom:</label>
                <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('name') }}">
                @error('name')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('email') }}">
                @error('email')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Mot de passe:</label>
                <input type="password" name="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('password')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirmer le mot de passe:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="profil" class="block text-gray-700 text-sm font-bold mb-2">Photo de profil :</label>
                <input type="file" id="profil" name="profil" class="block w-full text-sm text-gray-500 p-2 border border-gray-300 rounded-lg">
                @error('profil')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Téléphone:</label>
                <input type="text" name="phone" id="phone" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('phone') }}">
                @error('phone')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="roles" class="block text-gray-700 text-sm font-bold mb-2">Rôles:</label>
                <select multiple name="roles[]" id="roles" class="shadow border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                @error('roles')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Créer</button>
                <a href="{{ route('admin.users.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection

@endsection
