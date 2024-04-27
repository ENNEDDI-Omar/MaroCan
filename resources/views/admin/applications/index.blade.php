@extends('layouts.dash')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Applications Overview</h2>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">ID</th>
                            <th class="px-4 py-3">User</th>
                            <th class="px-4 py-3">Volunteering Offer</th>
                            <th class="px-4 py-3">Motivation Message</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @forelse ($applications as $application)
                            <tr class="text-gray-700 dark:text-gray-400">

                                <td class="px-4 py-3 text-sm">
                                    {{ $application->id }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $application->user->name }}
                                </td>

                                <td class="px-4 py-3 text-sm">
                                    <a href="{{ route('admin.applications.show', $application->id) }}">
                                        {{ Str::limit($application->volunteeringOffer->title, 30) }}
                                    </a>
                                </td>

                                <td class="px-4 py-3 text-sm">

                                    {{ Str::limit($application->motivation, 50) }}

                                </td>

                                <td class="px-4 py-3 text-sm">
                                    <div
                                        class="font-semibold rounded-md text-center {{ $application->status === 'accepted' ? 'bg-green-200 text-green-800' : ($application->status === 'rejected' ? 'bg-red-200 text-red-800' : 'bg-yellow-200 text-yellow-800') }}">
                                        {{ ucfirst($application->status) }}
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <button onclick="toggleModal('modal{{ $application->id }}')"
                                        class="px-3 py-1 text-sm text-blue-500 bg-blue-100 rounded">Update Status</button>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div id="modal{{ $application->id }}"
                                class="fixed inset-0 z-50 hidden items-center justify-center overflow-y-auto"
                                aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                <div class="min-h-screen px-4 text-center">
                                    <div class="flex justify-center items-center min-h-screen">
                                        <div class="bg-gray-500 bg-opacity-75 transition-opacity fixed inset-0"></div>
                                        <div
                                            class="inline-block overflow-hidden text-left align-middle transition-all transform bg-white rounded-lg shadow-xl">
                                            <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                                                <div class="sm:flex sm:items-start">
                                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                                        <h3 class="text-lg font-medium leading-6 text-gray-900"
                                                            id="modal-title">Update Application Status</h3>
                                                        <div class="mt-2">
                                                            <form
                                                                action="{{ route('admin.applications.update', $application->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PATCH')
                                                                <select
                                                                    class="block w-full mt-1 bg-white border-gray-300 rounded-md shadow-sm form-select focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                                                    name="status">
                                                                    <option value="pending"
                                                                        {{ $application->status == 'pending' ? 'selected' : '' }}>
                                                                        Pending</option>
                                                                    <option value="accepted"
                                                                        {{ $application->status == 'accepted' ? 'selected' : '' }}>
                                                                        Accepted</option>
                                                                    <option value="rejected"
                                                                        {{ $application->status == 'rejected' ? 'selected' : '' }}>
                                                                        Rejected</option>
                                                                </select>
                                                                <div
                                                                    class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                                                                    <button type="submit"
                                                                        class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                                        Save Changes
                                                                    </button>
                                                                    <button type="button"
                                                                        onclick="toggleModal('modal{{ $application->id }}')"
                                                                        class="mt-3 inline-flex justify-center w-full px-4 py-2 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                                        Cancel
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="6" class="p-3 text-center">No applications found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function toggleModal(modalID) {
            document.getElementById(modalID).classList.toggle('hidden');
            document.getElementById(modalID).classList.toggle('flex');
        }
    </script>
@endsection
