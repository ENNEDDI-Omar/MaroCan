@extends('layouts.dash')
@section('content')
    <div class="mx-18 mt-20 w-full p-4 shadow-md rounded-lg border-t-2 border-teal-400">
        <div class="flex justify-between pb-4">
            <p class="font-bold text-xl">Media Platforms:</p>
            <button onclick="showCreateModal()"
                class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Create
                Media</button>
        </div>

        <div class="grid gap-3 grid-cols-1 md:grid-cols-3 lg:grid-cols-3" id="accordion-collapse-body-1">

            @foreach ($mediaPlatforms as $media)
                <div
                    class="flex border items-center rounded-md cursor-pointer transition duration-500 shadow-sm hover:shadow-md hover:shadow-teal-400">

                    <div class="w-16 p-2 shrink-0">
                        <img src="{{ $media->getFirstMediaUrl('platforms') }}" alt="media-logo" class="h-12 w-12">
                    </div>
                    <a href="#"
                        onclick="showMediaModal('{{ $media->getFirstMediaUrl('platforms') }}', '{{ $media->name }}', '{{ $media->mediaPlatform_code }}', '{{ $media->type }}')">
                        <div class="p-2">
                            <p class="font-semibold text-lg">{{ $media->name }}</p>
                            <span class="text-gray-600">{{ $media->type }}</span>
                        </div>
                    </a>
                    <div class="flex items-center space-x-4 text-sm ml-auto">
                        <a href="#"
                            onclick="showEditModal('{{ $media->getFirstMediaUrl('platforms') }}', '{{ $media->name }}', '{{ $media->mediaPlatform_code }}', '{{ $media->type }}')"
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                            aria-label="Edit">
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                </path>
                            </svg>
                        </a>
                        <form action="{{ route('admin.media-platforms.destroy', $media->id) }}" method="POST"
                            class="inline">
                            @csrf
                            @method('DELETE')
                            <button
                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                aria-label="Delete">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div
            class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">

            <span class="col-span-2"></span>
            <!-- Pagination -->
            <span class="flex lg:justify-self-center col-span-4 mt-2 sm:mt-auto sm:justify-end">
                <nav aria-label="Table navigation">
                    {{ $mediaPlatforms->links() }}
                </nav>
            </span>
        </div>


        <!---modal pour la création --->
        <div id="createModal" class="hidden fixed inset-0 z-10 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen">
                <div class="fixed inset-0 bg-gray-500 opacity-75"></div>
                <div class="bg-white rounded-lg shadow-xl transform transition-all sm:max-w-lg sm:w-full w-full">
                    <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="text-center">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Create Media Platform
                            </h3>
                            <div class="mt-2">
                                <form action="{{ route('admin.media-platforms.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="logo"
                                            class="block text-gray-700 text-sm font-bold mb-2">Logo:</label>
                                        <input type="file" name="logo" id="logo"
                                            class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                        @error('logo')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="name"
                                            class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                                        <input type="text" name="name" id="name"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            placeholder="Enter name">
                                        @error('name')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="mediaPlatform_code"
                                            class="block text-gray-700 text-sm font-bold mb-2">Media Platform Code:</label>
                                        <input type="number" name="mediaPlatform_code" id="mediaPlatform_code"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            placeholder="Enter code">
                                        @error('mediaPlatform_code')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="type"
                                            class="block text-gray-700 text-sm font-bold mb-2">Type:</label>
                                        <select name="type" id="type"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                            <option value="newspaper">Newspaper</option>
                                            <option value="radio">Radio</option>
                                            <option value="television">Television</option>
                                            <option value="digital_media">Digital Media</option>
                                        </select>
                                        @error('type')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="flex items-center justify-end">
                                        <button type="submit"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create
                                        </button>

                                        <button onclick="hideCreateModal()"
                                            class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Cancel</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!---modal pour la modification --->
        <div id="editModal" class="hidden fixed inset-0 z-10 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen">
                <div class="fixed inset-0 bg-gray-500 opacity-75"></div>
                <div class="bg-white rounded-lg shadow-xl transform transition-all sm:max-w-lg sm:w-full w-full">
                    <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="text-center">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Edit Media
                                Platform
                            </h3>
                            <div class="mt-2">
                                <form action="{{ route('admin.media-platforms.update', $media->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-4">
                                        <label for="edit_logo"
                                            class="block text-gray-700 text-sm font-bold mb-2">Current
                                            Logo:</label>
                                        <img id="logo_preview" src="" alt="Current Logo"
                                            class="h-16 w-16 mb-2">

                                    </div>
                                    <div class="mb-4">
                                        <label for="edit_logo"
                                            class="block text-gray-700 text-sm font-bold mb-2">New
                                            Logo:</label>
                                        <input type="file" name="logo" id="edit_logo"
                                            class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                        @error('logo')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <input type="hidden" id="edit_logo_url" name="edit_logo_url">
                                    <div class="mb-4">
                                        <label for="edit_name"
                                            class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                                        <input type="text" name="name" id="edit_name" value=" "
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            placeholder="Enter name">
                                        @error('name')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="edit_mediaPlatform_code"
                                            class="block text-gray-700 text-sm font-bold mb-2">Media Platform
                                            Code:</label>
                                        <input type="number" name="mediaPlatform_code"
                                            id="edit_mediaPlatform_code" value=" "
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            placeholder="Enter code">
                                        @error('mediaPlatform_code')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="edit_type"
                                            class="block text-gray-700 text-sm font-bold mb-2">Type:</label>
                                        <select name="type" id="edit_type"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                            <option value="newspaper">Newspaper</option>
                                            <option value="radio">Radio</option>
                                            <option value="television">Television</option>
                                            <option value="digital_media">Digital Media</option>
                                        </select>
                                        @error('type')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </div>



                                    <div class="flex items-center justify-end">
                                        <button type="submit"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update
                                        </button>
                                        <button onclick="hideEditModal()"
                                            class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Cancel
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!---modal pour la visualisation --->
        <div id="showMediaModal" class="hidden fixed inset-0 z-10 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen">
                <div class="fixed inset-0 bg-gray-500 opacity-75"></div>
                <div class="bg-white rounded-lg shadow-xl transform transition-all sm:max-w-lg sm:w-full w-full">
                    <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="text-center">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Media Platform
                            </h3>
                            <div class="mt-2">
                                <div class="mb-4">
                                    <label for="media_logo"
                                        class="block text-gray-700 text-sm font-bold mb-2">Logo:</label>
                                    <img id="media_preview" src="" alt="Media Logo" class="h-16 w-16 mb-2">
                                </div>
                                <div class="mb-4">
                                    <label for="media_name"
                                        class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                                    <p id="media_name"></p>
                                </div>
                                <div class="mb-4">
                                    <label for="media_code" class="block text-gray-700 text-sm font-bold mb-2">Media
                                        Platform Code:</label>
                                    <p id="media_code"></p>
                                </div>
                                <div class="mb-4">
                                    <label for="media_type"
                                        class="block text-gray-700 text-sm font-bold mb-2">Type:</label>
                                    <p id="media_type"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-end">
                        <button onclick="hideMediaModal()"
                            class="bg-slate-500 hover:bg-slate-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Close</button>
                    </div>
                </div>

                <script>
                    function showCreateModal() {
                        document.getElementById("createModal").classList.remove("hidden");
                    }

                    function hideCreateModal() {
                        document.getElementById("createModal").classList.add("hidden");
                    }

                    function showEditModal(logoUrl, name, mediaPlatform_code, type) {

                        document.getElementById("editModal").classList.remove("hidden");
                        document.getElementById("logo_preview").src = logoUrl;
                        document.getElementById("edit_logo_url").value = logoUrl;
                        document.getElementById("edit_name").value = name;
                        document.getElementById("edit_mediaPlatform_code").value = mediaPlatform_code;
                        document.getElementById("edit_type").value = type;

                    }

                    function hideEditModal() {
                        document.getElementById("editModal").classList.add("hidden");
                    }

                    function showMediaModal(logoUrl, name, mediaPlatform_code, type) {
                        document.getElementById("showMediaModal").classList.remove("hidden");

                        document.getElementById("media_preview").src = logoUrl;
                        document.getElementById("media_name").innerText = name;
                        document.getElementById("media_code").innerText = mediaPlatform_code;
                        document.getElementById("media_type").innerText = type;
                    }

                    function hideMediaModal() {
                        document.getElementById("showMediaModal").classList.add("hidden");
                    }
                </script>



                


            </div>
        @endsection
