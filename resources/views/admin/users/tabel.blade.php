@extends('layouts.maintable')
@section('child-content')
    <div class="mb-4 flex justify-between items-center">
        <form method="POST" id="search-form" action="{{ route('users.search') }}" class="flex">
            @csrf
            <input type="text" id="search" name="search" placeholder="Search..." class="px-4 py-2 border rounded-lg">
        </form>
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
                    <tbody id="users-results">
                        @include('admin.users.partials.index', ['users' => $users])
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
@endsection
@section('script')
    <script src="{{ asset('js/crud file script/scriptCrud.js') }}"></script>
    <script src="{{ asset('js/modal file script/modal.js') }}"></script>
    <script src="{{ asset('js/ajax file script/ajax.js') }}"></script>
@endsection
