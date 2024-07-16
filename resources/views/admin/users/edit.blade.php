@extends('layouts.dashboard')
@section('title', 'Profile')
@section('content')
    <div class="w-3/2 bg-white rounded-lg p-10 shadow-lg">
        <div class="text-4xl font-bold mb-6 dark:text-primary">Profile</div>
        <form method="POST" enctype="multipart/form-data" action="{{ route('Users.update', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700">Photo Profile</label>
                <div class="flex items-center mt-2">
                    <label for="avatar" class="cursor-pointer">
                        @php
                            $profileImage =
                                isset($user) && $user->profile_image
                                    ? url('storage/' . $user->profile_image)
                                    : asset('dist/img/iconsUsers.jpg');
                        @endphp
                        <img id="previewImage" src="{{ $profileImage }}" alt="Profil"
                            class="rounded-full w-32 border border-red-500 h-32 object-cover dark:focus:border-primary">
                        <input type="file" name="profile_image" id="avatar" class="hidden"
                            onchange="previewImage(event)">
                    </label>
                    <span class="ml-2 text-gray-700">Upload Photo Profile</span>
                </div>
            </div>
            <div class="w-1/2">
                <div class="mb-4">
                    <label class="block text-gray-700">Name</label>
                    <input type="text" name="name" value="{{ $user->name }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500 dark:focus:border-primary">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Username</label>
                    <input type="text" name="username" value="{{ $user->username }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500 dark:focus:border-primary">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Age</label>
                    <input type="number" name="age" value="{{ $user->age }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500 dark:focus:border-primary">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ $user->email }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500 dark:focus:border-primary">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">School</label>
                    <input type="text" name="school" value="{{ $user->school }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500 dark:focus:border-primary">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Address</label>
                    <textarea name="addres" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500 resize-none dark:focus:border-primary"
                        rows="3">{{ $user->addres }}</textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Bio</label>
                    <textarea name="bio" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500 resize-none dark:focus:border-primary"
                        rows="3">{{ $user->bio }}</textarea>
                </div>
                <h3 class="font-bold text-3xl mb-5">Social Media</h3>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-1">Instagram</label>
                    <div class="flex items-center">
                        <i class="bi bi-instagram text-gray-600 mr-3"></i>
                        <input type="url" value="{{ $user->instagram }}" name="instagram"
                            placeholder="https://instagram.com/"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500 dark:focus:border-primary">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-1">TikTok</label>
                    <div class="flex items-center">
                        <i class="bi bi-tiktok text-gray-600 mr-3"></i>
                        <input type="url" value="{{ $user->tiktok }}" name="tiktok" placeholder="https://tiktok.com/"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500 dark:focus:border-primary">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-1">Youtube</label>
                    <div class="flex items-center">
                        <i class="bi bi-youtube text-gray-600 mr-3"></i>
                        <input type="url" value="{{ $user->youtube }}" name="youtube"
                            placeholder="https://youtube.com/"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500 dark:focus:border-primary">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-1">LinkedIn</label>
                    <div class="flex items-center">
                        <i class="bi bi-linkedin text-gray-600 mr-3"></i>
                        <input type="url" value="{{ $user->linkedin }}" name="linkedin"
                            placeholder="https://linkedin.com/"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500 dark:focus:border-primary">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-1">GitHub</label>
                    <div class="flex items-center">
                        <i class="bi bi-github text-gray-600 mr-3"></i>
                        <input type="url" value="{{ $user->github }}" name="github"
                            placeholder="https://github.com/"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500 dark:focus:border-primary">
                    </div>
                </div>
            </div>
            <button type="submit"
                class="px-4 py-2 bg-red-500 text-white font-bold rounded-lg hover:bg-red-600 dark:bg-primary">Save</button>
        </form>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/view image script/preview.js') }}"></script>
    <script src="{{ asset('js/crud file script/scriptCrud.js') }}"></script>
@endsection
