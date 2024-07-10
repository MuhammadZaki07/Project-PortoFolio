@extends('layouts.dashboard')
@section('title', 'Ganti Password')
@section('content')
<div class="w-3/2 bg-white rounded-lg p-10 shadow-lg">
        <div class="text-2xl font-bold mb-6">Password</div>
        <form>
            <div class="mb-4">
                <label class="block text-gray-700">Current Password</label>
                <input type="password" disabled name="password_new"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">New Password</label>
                <input type="password" disabled name="password_new"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Confirm New Password</label>
                <input type="password" disabled name="password_confirm"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500">
            </div>
            <button type="submit" disabled class="px-4 py-2 bg-red-200 text-white font-bold rounded-lg hover:bg-red-200 cursor-not-allowed">Change
                Password</button>
            <button type="button" id="open_key"
                class="px-4 py-2 bg-yellow-300 text-white font-bold rounded-lg hover:bg-yellow-600">Open</button>
        </form>
    </div>
    <div class="hidden" id="modal">
        <form action="">
        <div class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
                <h2 class="text-xl font-bold mb-4">Your Active Email</h2>
                <div class="relative mb-4">
                    <input type="email"  placeholder="NameEmail@gmail.com"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                </div>
                <div class="flex justify-end">
                    <button
                    type="button"
                    id="close"
                        class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg mr-2 hover:bg-gray-400 focus:outline-none">Batal</button>
                    <button
                    type="submit"
                        class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 focus:outline-none">Submit</button>
                </div>
            </div>
        </div>
    </form>
    </div>

@include('asset.js.SwitchAlerts.cdnScript')
@endsection
