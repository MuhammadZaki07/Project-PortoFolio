@extends('layouts.main')
@section('title', 'Register')
@section('content')
    <div class="bg-gray-100 flex items-center justify-center min-h-screen py-10 dark:bg-gray-800">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-sm dark:bg-dark">
            <h2 class="text-2xl font-bold mb-6 text-center dark:text-primary">Daftar</h2>
            <form action="{{ route('register.index') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nama" class="block mb-1 text-gray-700 dark:text-primary">Name</label>
                    <input type="text" id="nama" name="nama" placeholder="user"
                        class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-red-500 @error('nama') border-red-500 @enderror dark:focus:border-primary"
                        value="{{ old('nama') }}" required>
                    @error('nama')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="username" class="block mb-1 text-gray-700 dark:text-primary">Username</label>
                    <input type="text" id="username" name="username" placeholder="user"
                        class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-red-500 @error('username') border-red-500 @enderror dark:focus:border-primary"
                        value="{{ old('username') }}" required>
                    @error('username')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block mb-1 text-gray-700 dark:text-primary">Email</label>
                    <input type="email" id="email" name="email" placeholder="masukan email aktif"
                        class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-red-500 @error('email') border-red-500 @enderror dark:focus:border-primary"
                        value="{{ old('email') }}" required>
                        <p class="text-red-500 text-xs m-2 dark:text-primary">Info!!, dimohon memasukan email aktif</p>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-1 text-gray-700 dark:text-primary">Password</label>
                    <input type="password" id="password" name="password" placeholder="masukan password"
                        class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-red-500 @error('password') border-red-500 @enderror dark:focus:border-primary"
                        required>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password_confirmation" class="block mb-1 text-gray-700 dark:text-primary">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="konfirmasi password"
                        class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-red-500 dark:focus:border-primary"
                        required>
                </div>
                <button type="submit"
                    class="w-full py-2 bg-red-500 text-white font-bold rounded-lg hover:bg-red-600 dark:bg-primary">Daftar</button>
            </form>
            <div class="mt-4 text-center">
                <span class="dark:text-white">Anda Sudah punya akun? Login <a href="{{ route('login.index') }}"
                        class="text-red-500 hover:underline dark:text-primary">disini</a></span>
            </div>
        </div>
    </div>
@endsection
@section('script')
@include('asset.js.loginAsset.cdnAuth')
<script src="{{ asset('dist/js/script.js') }}"></script>
@endsection
