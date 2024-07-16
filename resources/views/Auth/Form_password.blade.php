@extends('layouts.main')
@section('title', 'Ganti Password')
@section('content')
    <div class="w-3/2 bg-white rounded-lg p-10 shadow-lg">
        <div class="text-2xl font-bold mb-6">Update Password</div>
        <form method="POST" action="{{ route('password.change') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Current Password</label>
                <div class="flex items-center border rounded-lg">
                    <span class="px-3 border-r"><i class="fas fa-lock"></i></span>
                    <input type="password" name="current_password" id="current_password" required
                        class="w-full px-4 py-2 focus:outline-none focus:border-red-500 border-none rounded-r-lg text-yellow-500">
                    <span class="px-3 border-l cursor-pointer" onclick="togglePassword('current_password', this)">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>
                @error('current_password')
                    <p class="mt-3 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">New Password</label>
                <div class="flex items-center border rounded-lg">
                    <span class="px-3 border-r"><i class="fas fa-lock"></i></span>
                    <input type="password" name="password_new" id="password_new" required
                        class="w-full px-4 py-2 focus:outline-none focus:border-red-500 border-none rounded-r-lg text-green-500 dark:focus:border-primary dark:text-primary">
                    <span class="px-3 border-l cursor-pointer" onclick="togglePassword('password_new', this)">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>
                @error('password_new')
                    <p class="mt-3 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Confirm New Password</label>
                <div class="flex items-center border rounded-lg">
                    <span class="px-3 border-r"><i class="fas fa-lock"></i></span>
                    <input type="password" name="password_new_confirmation" id="password_new_confirmation" required
                        class="w-full px-4 py-2 focus:outline-none focus:border-red-500 border-none rounded-r-lg text-red-500 dark:focus:border-primary dark:text-primary">
                    <span class="px-3 border-l cursor-pointer" onclick="togglePassword('password_new_confirmation', this)">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>
            </div>
            <button type="submit" class="px-4 py-2 bg-red-500 text-white font-bold rounded-lg hover:bg-red-200">Change
                Password</button>
        </form>
    </div>
@endsection
@section('script')
    <script src="{{ asset('dist/js/script.js') }}"></script>
    <script src="{{ asset('js/crud file script/scriptCrud.js') }}"></script>
    @include('asset.js.SwitchAlerts.switchAlerts')
@endsection
