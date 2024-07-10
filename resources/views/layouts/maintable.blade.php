@extends('layouts.dashboard')
@section('title', 'Data Project')
@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow-inner rounded-lg p-6">
        <nav class="flex space-x-4 mb-6">
            <div class="bg-slate-100 p-3 rounded-xl">
                <a href="{{ route('layouts.maintable') }}" class="py-2 px-4  rounded-lg text-dark {{ Request::route()->named('layouts.maintable') ? 'bg-white shadow-xl' : 'hover:hover:bg-slate-200' }} ">Postingan</a>
                <a href="{{ route('layouts.maintable.Users') }}" class="py-2 px-4  rounded-lg {{ Request::route()->named('layouts.maintable.Users') ? 'bg-white shadow-xl' : 'hover:hover:bg-slate-200' }}">Users</a>
                <a href="{{ route('layouts.maintable.sertifikat') }}" class="py-2 px-4  rounded-lg {{ Request::route()->named('layouts.maintable.sertifikat') ? 'bg-white shadow-xl' : 'hover:hover:bg-slate-200' }} ">Sertifikat</a>
                <a href="{{ route('layouts.maintable.project') }}" class="py-2 px-4  rounded-lg {{ Request::route()->named('layouts.maintable.project') ? 'bg-white shadow-xl' : 'hover:hover:bg-slate-200' }} ">Project</a>
                <a href="{{ route('layouts.maintable.category') }}" class="py-2 px-4  rounded-lg {{ Request::route()->named('layouts.maintable.category') ? 'bg-white shadow-xl' : 'hover:hover:bg-slate-200' }} ">Category</a>
            </div>
        </nav>
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


