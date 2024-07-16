@extends('layouts.main')
@section('title', 'Login')
@section('content')
    <div class="bg-gray-100 flex items-center justify-center min-h-screen dark:bg-gray-800">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-sm dark:bg-dark">
            <h2 class="text-2xl font-bold mb-6 text-center dark:text-primary">Masuk</h2>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block mb-1 text-gray-700 dark:text-primary">Email</label>
                    <input type="email" autofocus id="email" name="email"
                        class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-red-500 @error('email') border-red-500 @enderror dark:focus:border-primary"
                        required>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 relative">
                    <label for="password" class="block mb-1 text-gray-700 dark:text-primary">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password"
                            class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-red-500 @error('password') border-red-500 @enderror dark:focus:border-primary"
                            required>
                        <span id="password-toggle" class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer"
                            onclick="togglePasswordVisibility()">
                            <i id="password-icon" class="bi bi-eye text-gray-700"></i>
                        </span>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <input type="checkbox" id="remember" name="remember" class="mr-2">
                    <label for="remember" class="text-gray-700 dark:text-primary">Remember Me</label>
                </div>
                <button type="submit"
                    class="w-full py-2 bg-red-500 text-white font-bold rounded-lg hover:bg-red-600 dark:bg-primary">Login</button>
            </form>
            <div class="mt-4 text-center">
                <span class="dark:text-white">Anda belum punya akun? daftar <a href="{{ route('register') }}"
                        class="text-red-500 hover:underline dark:text-primary">disini</a></span>
                <span><a href="{{ route('forgot.Password') }}" class="text-slate-400 text-xs block mt-2 underline dark:text-primary">Lupa
                        password?</a></span>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('dist/js/script.js') }}"></script>
    @include('asset.js.SwitchAlerts.switchAlerts')
    <script src="{{ asset('js/crud file script/scriptCrud.js') }}"></script>
@endsection
