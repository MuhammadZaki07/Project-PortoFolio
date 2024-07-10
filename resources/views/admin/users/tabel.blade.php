@extends('layouts.maintable')
@section('child-content')
<div class="mb-4 flex justify-between items-center">
    <form method="POST" class="flex">
        @csrf
        <input type="text" name="search" placeholder="Search..." class="px-4 py-2 border rounded-lg">
    </form>
    <div class="relative">
        <button onclick="toggleDropdown()" class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">
            <i class="fas fa-filter"></i> Filter
        </button>
        <div id="dropdownMenu" class="absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg hidden">
            <div class="py-2">
                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Sort by Size</a>
                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Sort by Name</a>
                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Sort by Date</a>
            </div>
        </div>
    </div>
</div>
    <div class="container mx-auto p-4">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Data Users</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-lg overflow-hidden shadow-lg">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2 text-center">No</th>
                            <th class="px-4 py-2 text-center">Photo</th>
                            <th class="px-4 py-2 text-center">Name</th>
                            <th class="px-4 py-2 text-center">Email</th>
                            <th class="px-4 py-2 text-center">School</th>
                            <th class="px-4 py-2 text-center">Status</th>
                            <th class="px-4 py-2 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $user)
                            <tr>
                                <td class="text-xs px-2 py-1 text-center">{{ $loop->iteration }}</td>
                                <td class="text-xs px-2 py-1 text-center">
                                    <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('dist/img/iconsUsers.jpg') }}"
                                        alt="Avatar" class="rounded-full h-10 w-10 border border-red-500 mr-2">
                                </td>
                                <td class="text-xs px-2 py-1">{{ $user->name }}
                                    @if ($user->isAdmin())
                                    <i class="bi bi-patch-check-fill text-sm text-blue-500"></i>
                                    @endif</td>
                                <td class="text-xs px-2 py-1">{{ $user->email }}</td>
                                <td class="text-xs px-2 py-1">{{ $user->school }}</td>
                                <td class="text-xs px-2 py-1 text-center">
                                    @if ($user->role == 'admin')
                                        <span class="w-10 h-5 bg-green-500 px-2 py-1 shadow-lg text-sm text-white rounded-lg">
                                            {{ $user->role }}
                                        </span>
                                    @else
                                        <span class="w-10 h-5 bg-red-500 px-2 py-1 shadow-lg text-sm text-white rounded-lg">
                                            {{ $user->role }}
                                        </span>
                                    @endif
                                </td>
                                <td class="text-xs px-2 py-1 text-center">
                                    <div class="flex space-x-2">
                                        @if ($user->role == 'admin')
                                            <a href="#" data-user-id="{{ $user->id }}"
                                                class="viewUserBtn text-dark hover:text-white hover:bg-blue-700 bg-blue-400 px-4 py-3 rounded-xl shadow-lg"><i
                                                    class="fas fa-eye"></i></a>
                                            <a href="{{ route('Users.edit', $user->id) }}"
                                                class="text-dark hover:text-white bg-orange-400 hover:bg-orange-700 px-4 py-3 rounded-xl shadow-lg"><i
                                                    class="fas fa-edit"></i></a>
                                        @else
                                            <a href="#" data-user-id="{{ $user->id }}"
                                                class="viewUserBtn text-dark hover:text-white hover:bg-blue-700 bg-blue-400 px-4 py-3 rounded-xl shadow-lg"><i
                                                    class="fas fa-eye"></i></a>
                                            <a href="{{ route('Users.edit', $user->id) }}"
                                                class="text-dark hover:text-white bg-orange-400 hover:bg-orange-700 px-4 py-3 rounded-xl shadow-lg"><i
                                                    class="fas fa-edit"></i></a>
                                            <form id="delete-user"
                                                action="{{ route('Users.destroy', $user->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="confirmDelete()" type="button"
                                                    class="text-dark hover:text-white bg-red-600 px-4 hover:bg-red-700 py-3 rounded-xl shadow-lg"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="hidden" id="userModal">
        <div class="fixed inset-0 items-center flex justify-center bg-black bg-opacity-50">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-3xl">
                <div class="flex justify-between items-center border-b pb-3 mb-4">
                    <h3 class="text-xl font-semibold">User Details</h3>
                    <button id="closeModalBtn" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="flex flex-col items-center mb-6">
                    <div class="w-24 h-24 bg-gray-200 rounded-full mb-4 flex items-center justify-center">
                        <img id="userPhoto" src="https://via.placeholder.com/150" alt="User Photo"
                            class="w-full h-full rounded-full object-cover">
                    </div>
                    <h4 id="userName" class="text-2xl font-semibold mb-1"></h4>
                    <p id="userEmail" class="text-gray-600 mb-4"></p>
                </div>
                <div class="mb-6">
                    <h5 class="text-gray-700 font-semibold mb-2"></h5>
                    <ul class="text-gray-600 space-y-1 mb-4">
                        <li id="userAge"></li>
                        <li id="userUsername"></li>
                        <li id="userSchool"></li>
                        <li id="userAddress"></li>
                        <li id="userBio"></li>
                    </ul>
                </div>
                <div>
                    <h5 class="text-gray-700 font-semibold mb-2">Social Links</h5>
                    <ul class="text-gray-600 space-y-1 grid grid-cols-2 gap-4">
                        <li class="flex items-center space-x-2">
                            <i class="fab fa-instagram text-pink-600"></i>
                            <a id="userInstagramLink" href="#" target="_blank"
                                class="text-blue-500 hover:underline">Instagram</a>
                        </li>
                        <li class="flex items-center space-x-2">
                            <i class="fab fa-tiktok text-black"></i>
                            <a id="userTiktokLink" href="#" target="_blank"
                                class="text-blue-500 hover:underline">Tiktok</a>
                        </li>
                        <li class="flex items-center space-x-2">
                            <i class="fab fa-youtube text-red-600"></i>
                            <a id="userYoutubeLink" href="#" target="_blank"
                                class="text-blue-500 hover:underline">YouTube</a>
                        </li>
                        <li class="flex items-center space-x-2">
                            <i class="fab fa-github text-gray-800"></i>
                            <a id="userGithubLink" href="#" target="_blank"
                                class="text-blue-500 hover:underline">GitHub</a>
                        </li>
                        <li class="flex items-center space-x-2">
                            <i class="fab fa-linkedin text-blue-700"></i>
                            <a id="userLinkedinLink" href="#" target="_blank"
                                class="text-blue-500 hover:underline">LinkedIn</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @include('asset.js.assetAdmin.AssetJS')
@endsection
