@extends('layouts.dashboard')
@section('title', 'Admin Dashboard')
@section('content')
    <div class="text-2xl font-bold mb-6">Dashboard Admin</div>
    <p>Selamat Datang Di Dashboard Admin</p>
    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
            <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                <div class="flex justify-between mb-6">
                    <div>
                        <div class="flex items-center mb-1">
                            <div class="text-2xl font-semibold">{{ $user }}</div>
                        </div>
                        <div class="text-sm font-medium text-gray-400">Users</div>
                    </div>
                </div>
                <a href="{{ route('layouts.maintable.Users') }}" class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
            </div>
            <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                <div class="flex justify-between mb-4">
                    <div>
                        <div class="flex items-center mb-1">
                            <div class="text-2xl font-semibold">{{ $project }}</div>
                        </div>
                        <div class="text-sm font-medium text-gray-400">Project</div>
                    </div>
                </div>
                <a href="{{ route('layouts.maintable.project') }}" class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
            </div>
            <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                <div class="flex justify-between mb-6">
                    <div>
                        <div class="text-2xl font-semibold mb-1">{{ $post }}</div>
                        <div class="text-sm font-medium text-gray-400">Blogs</div>
                    </div>
                </div>
                <a href="{{ route('layouts.maintable') }}" class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
            </div>
            <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                <div class="flex justify-between mb-6">
                    <div>
                        <div class="flex items-center mb-1">
                            <div class="text-2xl font-semibold">{{ $certifikat }}</div>
                        </div>
                        <div class="text-sm font-medium text-gray-400">Certificates</div>
                    </div>
                </div>
                <a href="{{ route('layouts.maintable.sertifikat') }}" class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
            </div>
            <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                <div class="flex justify-between mb-6">
                    <div>
                        <div class="flex items-center mb-1">
                            <div class="text-2xl font-semibold">{{ $like }}</div>
                        </div>
                        <div class="text-sm font-medium text-gray-400">Like</div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                <div class="flex justify-between mb-4">
                    <div>
                        <div class="flex items-center mb-1">
                            <div class="text-2xl font-semibold">{{ $comments }}</div>
                        </div>
                        <div class="text-sm font-medium text-gray-400">Comments</div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
