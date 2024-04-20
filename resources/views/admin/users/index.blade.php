@extends('layouts.dash')
@section('content')
    <div class="container">
        <div class="row">
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                USERS
            </h4>
            <div class="flex justify-end mb-4">
                <a href="{{ route('admin.users.create') }}"
                    class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Create an User</a>
            </div>
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500  border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">User</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Phone</th>
                                <th class="px-4 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($users as $user)
                                <tr class="text-gray-700 dark:text-gray-400">



                                    <td class="px-4 py-3">
                                        <a href="#"
                                            onclick="openModal('{{ $user->getFirstMediaUrl('users') }}', '{{ $user->name }}', '{{ $user->email }}', '{{ $user->status }}', '{{ $user->phone }}', {{ $user->roles->pluck('name') }})">
                                            <div class="flex items-center text-sm">
                                                <!-- Avatar with inset shadow -->
                                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                    <img class="object-cover w-full h-full rounded-full" 
                                                        src="{{ $user->getFirstMediaUrl('users') }}" alt=""
                                                        loading="lazy" />
                                                    <div class="absolute inset-0 rounded-full shadow-inner"
                                                        aria-hidden="true">
                                                    </div>
                                                </div>
                                                <div>
                                                    <p class="font-semibold">{{ $user->name }}</p>

                                                </div>
                                            </div>
                                        </a>
                                    </td>

                                    <td class="px-4 py-3 text-sm">
                                        {{ $user->email }}
                                    </td>
                                    <td class="px-4 py-3 text-xs">
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight rounded-full
                                              {{ $user->status == 'accepted' ? 'text-black bg-green-300 dark:bg-green-700 dark:text-green-100' : '' }}
                                              {{ $user->status == 'banned' ? 'text-black bg-red-400 dark:bg-red-600 dark:text-red-100' : '' }}">
                                               {{ $user->status }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $user->phone }}
                                    </td>

                                    <td class="px-4 py-3">
                                        <div class="flex items-center space-x-4 text-sm">

                                            <a href="{{ route('admin.users.edit', $user) }}"
                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                aria-label="Edit">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg>
                                            </a>
                                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                    aria-label="Delete">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>

                <!-- Modal -->
                <div id="userModal" class="hidden fixed z-10 inset-0 overflow-y-auto">
                    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <!-- Overlay -->
                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                            <div class="absolute inset-0 bg-gray-900 bg-opacity-75"></div>
                        </div>

                        <!-- Contenu de la modal -->
                        <div
                            class="relative flex flex-col items-center max-w-lg gap-4 p-6 rounded-md shadow-md sm:py-8 sm:px-12 bg-gray-900 dark:bg-gray-50 text-gray-100 dark:text-gray-800">
                            <!-- Bouton de fermeture -->
                            <button class="absolute top-2 right-2" onclick="closeModal()">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor"
                                    class="w-6 h-6">
                                    <polygon
                                        points="427.314 107.313 404.686 84.687 256 233.373 107.314 84.687 84.686 107.313 233.373 256 84.686 404.687 107.314 427.313 256 278.627 404.686 427.313 427.314 404.687 278.627 256 427.314 107.313">
                                    </polygon>
                                </svg>
                            </button>

                            <!-- Image de profil -->
                            <img id="modalImage" src="" alt="Profile Picture"
                                class="w-40 h-40 rounded-full">

                            <!-- Titre et description -->
                            <div class="p-6">
                                <h2 class="text-xl font-semibold leading-tight tracking-wide">User Details:</h2>
                                <p class="text-sm"><strong>Name:</strong> <span id="modalName"></span></p>
                                <p class="text-sm"><strong>Email:</strong> <span id="modalEmail"></span></p>
                                <p class="text-sm"><strong>Status:</strong> <span id="modalStatus"></span></p>
                                <p class="text-sm"><strong>Phone:</strong> <span id="modalPhone"></span></p>
                                <p class="text-sm"><strong>Roles:</strong> <span id="modalRoles"></span></p>
                            </div>


                        </div>
                    </div>
                </div>




                <div
                    class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                    
                    <span class="col-span-2"></span>
                    <!-- Pagination -->
                    <span class="flex lg:justify-self-center col-span-4 mt-2 sm:mt-auto sm:justify-end">
                        <nav aria-label="Table navigation">
                            {{ $users->links() }}   
                        </nav>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <script>
        function openModal(imageUrl, name, email, status, phone, roles) {
            document.getElementById('modalImage').src = imageUrl;
            document.getElementById('modalName').textContent = name;
            document.getElementById('modalEmail').textContent = email;
            document.getElementById('modalStatus').textContent = status;
            document.getElementById('modalPhone').textContent = phone;
            document.getElementById('modalRoles').textContent = roles.join(', ');
            // Afficher la modal
            document.getElementById('userModal').classList.remove('hidden');
            // Ajoutez ici le code pour afficher la modal
        }

        function closeModal() {
            // Masquer la modal
            document.getElementById('userModal').classList.add('hidden');
        }
    </script>
@endsection
