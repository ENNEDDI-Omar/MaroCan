@extends('layouts.auth')
@section('content')

<section class="min-h-screen flex items-stretch text-white">
    <div class="lg:flex w-1/2 hidden bg-gray-500 bg-no-repeat bg-cover relative items-center"
        style="background-image: url('{{ asset('images/africa.jpg') }}');">
        <div class="absolute bg-black opacity-40 inset-0 z-0"></div>
        <div class="w-full px-24 z-10">
            <h1 class="text-5xl font-bold text-left tracking-wide">Keep it special</h1>
            <p class="text-3xl my-4">Reserve your Ticket and enjoy your moment in a unique way, anywhere.</p>
        </div>
        <div class="bottom-0 absolute p-4 text-center right-0 left-0 flex justify-center space-x-4">
            <!-- Social icons -->
        </div>
    </div>
    <div class="lg:w-1/2 w-full flex items-center justify-center text-center md:px-16 px-0 z-0"
        style="background-color: #161616;">
        <div class="absolute lg:hidden z-10 inset-0 bg-gray-500 bg-no-repeat bg-cover items-center"
            style="background-image: url(https://images.unsplash.com/photo-1577495508048-b635879837f1?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGV;">
            <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
        </div>
        <div class="w-full py-6 z-20">
            <a href="/" class="inline-flex items-center gap-2.5 text-2xl font-bold text-white md:text-3xl"
                aria-label="logo">
                <svg width="95" height="94" viewBox="0 0 95 94" class="h-auto w-6 text-indigo-500"
                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M96 0V47L48 94H0V47L48 0H96Z" />
                </svg>
                MaroCan.25
            </a>
            <!-- Social icons -->

            <form method="POST" action="{{ route('register') }}"
                class="grid grid-cols-1 gap-6 mt-8 md:grid-cols-2" enctype="multipart/form-data">
                @csrf
                <div class="pb-2 pt-4">
                    <label for="name"
                        class="block mb-2 text-sm text-gray-600 dark:text-gray-200">{{ __('Name:') }}</label>
                    <input id="name"
                        class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                        type="text" name="name" value="{{ old('name') }}" required autofocus
                        autocomplete="name" placeholder="Full-Name" />
                    @error('name')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="pb-2 pt-4">
                    <label for="email" class="text-left text-white">{{ __('Email:') }}</label>
                    <input id="email"
                        class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                        type="email" name="email" value="{{ old('email') }}" autocomplete="email"
                        placeholder="example@gmail.com" required />
                    @error('email')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="pb-2 pt-4">
                    <label for="password" class="text-left text-white">{{ __('Password:') }}</label>
                    <input id="password"
                        class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                        type="password" name="password" required autocomplete="new-password"
                        placeholder="********" />
                    @error('password')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                {{-- <div class="pb-2 pt-4">
                    <label for="password_confirmation"
                        class="text-left text-white">{{ __('Confirm Password:') }}</label>
                    <input id="password_confirmation"
                        class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                        type="password" name="password_confirmation" required 
                        placeholder="********" />
                    @error('password_confirmation')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div> --}}

                <div class="pb-2 pt-4">
                    <label for="phone" class="text-left text-white">{{ __('Phone:') }}</label>
                    <input id="phone"
                        class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                        type="text" name="phone" value="{{ old('phone') }}" required autocomplete="phone"
                        placeholder="Phone Number" />
                    @error('phone')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                {{-- <div>
                    <label for="dropzone-file" class="flex items-center px-3 py-3 mx-auto mt-6 text-center bg-white border-2 border-dashed rounded-lg cursor-pointer dark:border-gray-600 dark:bg-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-300 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                        </svg>
 
                        <h2 class="mx-3 text-gray-400">Profile Photo</h2>
 
                        <input id="dropzone-file" type="file" name="Profil" class="hidden" />
                    </label>
                </div> --}}
                <div class="pb-2 pt-4">
                   <div>
                       <a href="{{ route('login') }}"
                           class="underline text-sm text-white hover:text-indigo-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{ __('Already registered?') }}</a>
                   </div>
                   <div class="px-4 pb-2 pt-4">
                       <button
                           class="uppercase block w-full p-4 text-lg rounded-full bg-indigo-500 hover:bg-indigo-600 focus:outline-none">{{ __('Register') }}</button>
                   </div>
                </div>
                
            </form>

            {{-- <form class="grid grid-cols-1 gap-6 mt-8 md:grid-cols-2" name="X" method="POST" action="../../app/controller/AuthController.php" enctype="multipart/form-data">
               <div>
                   <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Nom</label>
                   <input type="text" placeholder="John" name="Nom" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
               </div>

               <div>
                   <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Prénom</label>
                   <input type="text" placeholder="Snow" name="Prenom" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
               </div>

               <div>
                   <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Email address</label>
                   <input type="email" placeholder="johnsnow@example.com" name="Email" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
               </div>

               <div>
                   <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Password</label>
                   <input type="password" placeholder="Entrez votre password" name="password" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
               </div>

               <div>
                   <label for="dropzone-file" class="flex items-center px-3 py-3 mx-auto mt-6 text-center bg-white border-2 border-dashed rounded-lg cursor-pointer dark:border-gray-600 dark:bg-gray-900">
                       <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-300 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                       </svg>

                       <h2 class="mx-3 text-gray-400">Profile Photo</h2>

                       <input id="dropzone-file" type="file" name="Profil" class="hidden" />
                   </label>
               </div>

               <button type="submit" name="submit-up" class="flex items-center justify-between w-full px-6 py-3 text-sm tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                   <span>Sign Up </span>

                   <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 rtl:-scale-x-100" viewBox="0 0 20 20" fill="currentColor">
                       <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                   </svg>
               </button>
           </form> --}}
        </div>
    </div>
</section>

@endsection
