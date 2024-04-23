@extends('layouts.dash')

@section('content')

    <div class="flex bg-gray-100 min-h-screen">

        <div class="flex-grow text-gray-800">

            <main class="p-6 sm:p-10 space-y-6">

                <section class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">
                    <div class="flex items-center p-8 bg-white shadow rounded-lg">
                        <div
                            class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-purple-600 bg-purple-100 rounded-full mr-6">
                            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div>
                            <span class="block text-2xl font-bold">62</span>
                            <span class="block text-gray-500">Artistes</span>
                        </div>
                    </div>
                    <div class="flex items-center p-8 bg-white shadow rounded-lg">
                        <div
                            class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-green-600 bg-green-100 rounded-full mr-6">
                            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                        </div>
                        <div>
                            <span class="block text-2xl font-bold">6.8</span>
                            <span class="block text-gray-500">Average mark</span>
                        </div>
                    </div>
                    <div class="flex items-center p-8 bg-white shadow rounded-lg">
                        <div
                            class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-red-600 bg-red-100 rounded-full mr-6">
                            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />
                            </svg>
                        </div>
                        <div>
                            <span class="inline-block text-2xl font-bold">9</span>
                            <span class="inline-block text-xl text-gray-500 font-semibold">(14%)</span>
                            <span class="block text-gray-500">Underperforming Artistes</span>
                        </div>
                    </div>
                    <div class="flex items-center p-8 bg-white shadow rounded-lg">
                        <div
                            class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-blue-600 bg-blue-100 rounded-full mr-6">
                            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <div>
                            <span class="block text-2xl font-bold">83%</span>
                            <span class="block text-gray-500">Finished projects</span>
                        </div>
                    </div>
                </section>
                <section class="grid md:grid-cols-2 xl:grid-cols-4 xl:grid-rows-3 xl:grid-flow-col gap-6">
                    <div class="container mx-auto my-8">
                        <h1 class="text-3xl font-semibold mb-4">Tags:</h1>

                        <button onclick="openCustomModal()" class="bg-blue-500 text-white py-2 px-4 rounded-md mt-4">
                            Create a Tag
                        </button>



                        @if (count($tags) > 0)
                            <table class="min-w-full bg-white border border-gray-300 shadow-md rounded-md overflow-hidden">
                                <thead>
                                    <tr>
                                        <th class="py-2 px-4 border-b">ID</th>
                                        <th class="py-2 px-4 border-b">Name</th>
                                        <th class="py-2 px-4 border-b">Created At</th>
                                        <th class="py-2 px-4 border-b">Updated At</th>
                                        <th class="py-2 px-4 border-b">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tags as $tag)
                                        <tr>
                                            <td class="py-2 px-4 border-b">{{ $tag->id }}</td>
                                            
                                                <td class="py-2 px-4 border-b"><a href="#" onclick="openShowModal('{{ $tag->name }}')">{{ $tag->name }}</a></td>
                                            
                                            <td class="py-2 px-4 border-b">{{ $tag->created_at->format('Y-m-d') }}</td>
                                            <td class="py-2 px-4 border-b">{{ $tag->updated_at->format('Y-m-d') }}</td>
                                            <td class="py-2 px-4 border-b">
                                                {{-- Edit button to open the modal --}}
                                                <button
                                                    onclick="openEditModal('{{ $tag->id }}', '{{ $tag->name }}')"
                                                    class="bg-yellow-500 text-black py-2 px-4 rounded-md mt-4">
                                                    Edit
                                                </button>
                                                <form action="{{ route('admin.tags.destroy', $tag) }}" method="post"
                                                    class="inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="text-red-500 hover:underline ml-2"
                                                        onclick="return confirm('Are you sure you want to delete this tag?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        @else
                            <p class="text-gray-600">No tag found.</p>
                        @endif
                    </div>
                </section>
                <div id="customModal" class="hidden fixed inset-0 z-50 overflow-y-auto">
                    <div class="flex items-center justify-center min-h-screen p-4">
                        <div class="bg-white p-8 rounded-md shadow-md w-full max-w-md">
                            <h2 class="text-2xl font-semibold mb-4">Tag Modal</h2>
                            <form id="createForm" action="{{ route('admin.tags.store') }}" method="post">
                                @csrf
                                <label for="categoryName" class="block text-gray-700">Tag Name:</label>
                                <input type="text" id="categoryName" name="name"
                                    class="border rounded-md py-1 px-2 mb-4 w-full" required>
                                @if ($errors->has('name'))
                                    <p class="text-red-500 text-sm">{{ $errors->first('name') }}</p>
                                @endif
                                <button type="submit" class="bg-blue-500 text-white py-1 px-4 rounded-md"
                                    id="createBtn">Create</button>
                            </form>

                            <!-- Formulaire pour la mise à jour -->
                            {{-- <form id="editForm" action="{{ route('admin.tags.update', $tag->id) }}" method="post"
                                style="display: none;">
                                @csrf
                                @method('put')
                                <input type="hidden" id="editCategoryId" name="category_id"
                                    value="{{ $tag->id }}">
                                <label for="editCategoryName" class="block text-gray-700">Tag Name:</label>
                                <input type="text" id="editCategoryName" name="name"
                                    class="border rounded-md py-1 px-2 mb-4 w-full">
                                @if ($errors->has('name'))
                                    <p class="text-red-500 text-sm">{{ $errors->first('name') }}</p>
                                @endif
                                <button type="submit" class="bg-yellow-500 text-white py-1 px-4 rounded-md"
                                    id="editBtn">Update</button>
                            </form>
                            <button onclick="closeCustomModal()" class="mt-4 text-gray-600 hover:underline">Close
                            </button> --}}
                        </div>
                    </div>
                </div>
                {{-- <form id="editForm" action="{{ route('admin.tags.update', $tag) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="editTagId" name="tag_id" value="{{ $tag->id }}">
                    <label for="editTagName" class="block text-gray-700">Tag Name:</label>
                    <input type="text" id="editTagName" name="name" class="border rounded-md py-1 px-2 mb-4 w-full" value="{{ $tag->name }}">
                    <button type="submit" class="bg-yellow-500 text-white py-1 px-4 rounded-md" id="editBtn">Update</button>
                </form> --}}
                <!-- Edit Tag Modal -->
                <div id="editTagModal" class="hidden fixed inset-0 z-50 overflow-y-auto">
                    <div class="flex items-center justify-center min-h-screen p-4">
                        <div class="bg-white p-8 rounded-md shadow-md w-full max-w-md">
                            <h2 class="text-2xl font-semibold mb-4">Edit Tag</h2>
                            <form id="editTagForm" action="" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" id="editTagId" name="tag_id">
                                <div class="mb-4">
                                    <label for="editTagName" class="block text-gray-700">Tag Name:</label>
                                    <input type="text" id="editTagName" name="name"
                                        class="border rounded-md py-2 px-4 w-full" required>
                                        @error('name')
                                            <p class="text-red-500 text-sm">{{ $message }}</p>
                                        @enderror
                                </div>
                                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md">Update
                                    Tag</button>
                            </form>
                            <button onclick="closeEditModal()" class="mt-4 text-gray-500 hover:underline">Close</button>
                        </div>
                    </div>
                </div>

                <!-- Show Tag Modal -->
                <div id="showTagModal" class="hidden fixed inset-0 z-50 overflow-y-auto">
                    <div class="flex items-center justify-center min-h-screen p-4">
                        <div class="bg-white p-8 rounded-md shadow-md w-full max-w-md">
                            <h2 class="text-2xl font-semibold mb-4">Tag Details</h2>
                            <div>
                                <strong class="block text-gray-700">Tag Name:</strong>
                                <p id="showTagName" class="text-gray-600 mb-4"></p>
                            </div>
                            <button onclick="closeShowModal()" class="mt-4 text-gray-500 hover:underline">Close</button>
                        </div>
                    </div>
                </div>



            </main>
        </div>
    </div>

    <script>
        // Function to open the custom modal
        function openCustomModal(action, categoryId = null, categoryName = null) {
            var modal = document.getElementById('customModal');
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';

            // Mettez à jour le formulaire et le bouton en fonction de l'action
            var createForm = document.getElementById('createForm');
            var editForm = document.getElementById('editForm');

            if (action === 'create') {
                createForm.style.display = 'block';
                editForm.style.display = 'none';
            } else if (action === 'edit' && categoryId !== null && categoryName !== null) {
                createForm.style.display = 'none';
                editForm.style.display = 'block';

                // Remplir les champs pour la mise à jour
                document.getElementById('editCategoryId').value = categoryId;
                document.getElementById('editCategoryName').value = categoryName;
            }
        }

        // Function to close the custom modal
        function closeCustomModal() {
            var modal = document.getElementById('customModal');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
        // Function to open the edit modal
        function openEditModal(tagId, tagName) {
            // Show the modal
            var modal = document.getElementById('editTagModal');
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';

            // Set the values in the form
            document.getElementById('editTagId').value = tagId;
            document.getElementById('editTagName').value = tagName;

            // Set the form's action dynamically
            var form = document.getElementById('editTagForm');
            form.action = `/admin/tags/${tagId}`; // Make sure this URL matches your route setup
        }

        function closeEditModal() {
            var modal = document.getElementById('editTagModal');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        function openShowModal(tagName) {
            // Show the modal
            var modal = document.getElementById('showTagModal');
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';

            // Set the values in the modal
            document.getElementById('showTagName').textContent = tagName;
        }

        function closeShowModal() {
            var modal = document.getElementById('showTagModal');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    </script>

@endsection
