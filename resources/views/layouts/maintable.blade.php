@extends('layouts.dashboard')
@section('title', 'Data Post')
@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="font-semibold text-dark text-4xl mb-5">Tabel</h2>
        <nav class="flex space-x-4 mb-6">
            <div class="bg-slate-100 p-3 rounded-xl">
                <a href="{{ route('layouts.maintable') }}" class="py-2 px-4  rounded-lg text-dark {{ Request::route()->named('layouts.maintable') ? 'bg-white shadow-xl' : 'hover:hover:bg-slate-200' }} ">Postingan</a>
                <a href="{{ route('layouts.maintable.Users') }}" class="py-2 px-4  rounded-lg {{ Request::route()->named('layouts.maintable.Users') ? 'bg-white shadow-xl' : 'hover:hover:bg-slate-200' }}">Users</a>
                <a href="{{ route('layouts.maintable.sertifikat') }}" class="py-2 px-4  rounded-lg {{ Request::route()->named('layouts.maintable.sertifikat') ? 'bg-white shadow-xl' : 'hover:hover:bg-slate-200' }} ">Sertifikat</a>
                <a href="{{ route('layouts.maintable.project') }}" class="py-2 px-4  rounded-lg {{ Request::route()->named('layouts.maintable.project') ? 'bg-white shadow-xl' : 'hover:hover:bg-slate-200' }} ">Project</a>
            </div>
        </nav>

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

        <div>
            @yield('child-content')
        </div>
    </div>
</div>

<script>
function toggleDropdown() {
        document.getElementById('dropdownMenu').classList.toggle('hidden');
    }
</script>
@endsection


