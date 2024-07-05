@extends('layouts.dashboard')
@section('title', 'Admin Dashboard')
@section('content')
<div class="text-2xl font-bold mb-6">Dashboard Admin</div>
<p>Selamat Datang Di Dashboard Admin</p>

<div class="grid grid-cols-1 mt-5 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <div class="bg-white shadow-lg rounded-lg p-5">
        <h3 class="text-lg font-semibold">Komentar</h3>
        <p class="text-2xl mt-2">1 Komentar</p>
    </div>
    <div class="bg-white shadow-lg rounded-lg p-5">
        <h3 class="text-lg font-semibold">Likes</h3>
        <p class="text-2xl mt-2">1 Like</p>
    </div>
    <div class="bg-white shadow-lg rounded-lg p-5">
        <h3 class="text-lg font-semibold">Projects</h3>
        <p class="text-2xl mt-2">54</p>
    </div>
    <div class="bg-white shadow-lg rounded-lg p-5">
        <h3 class="text-lg font-semibold">Sertifkat</h3>
        <p class="mt-2">5 Sertifikat</p>
        <p>128 Umpan</p>
    </div>
</div>

<div class="bg-white shadow-lg rounded-lg p-5 mt-6">
    <h3 class="text-lg font-semibold">Grafik</h3>
    <div class="mt-4">

        <div class="h-64 bg-gray-200 flex items-center justify-center">
            <span>Placeholder Grafik</span>
        </div>
    </div>
</div>
@endsection

