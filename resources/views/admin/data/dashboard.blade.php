@extends('layouts.dashboard')
@section('title', 'Admin Dashboard')
@section('content')
    <div class="text-2xl font-bold mb-6 dark:text-primary">Dashboard Admin</div>
    <p class="dark:text-white text-base font-semibold">Selamat Datang Di Dashboard Admin</p>
    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
            <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5 dark:bg-dark">
                <div class="flex justify-between mb-6">
                    <div>
                        <div class="flex items-center mb-1">
                            <div class="text-2xl font-semibold dark:text-white">{{ $user }}</div>
                        </div>
                        <div class="text-sm font-medium text-gray-400 dark:text-primary">Users</div>
                    </div>
                </div>
                <a href="{{ route('layouts.maintable.Users') }}" class="text-[#f84525] font-medium text-sm hover:text-red-800 dark:text-white">View</a>
            </div>
            <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5 dark:bg-dark">
                <div class="flex justify-between mb-4">
                    <div>
                        <div class="flex items-center mb-1">
                            <div class="text-2xl font-semibold dark:text-white">{{ $project }}</div>
                        </div>
                        <div class="text-sm font-medium text-gray-400 dark:text-primary">Project</div>
                    </div>
                </div>
                <a href="{{ route('layouts.maintable.project') }}" class="text-[#f84525] font-medium text-sm hover:text-red-800 dark:text-white">View</a>
            </div>
            <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5 dark:bg-dark">
                <div class="flex justify-between mb-6">
                    <div>
                        <div class="text-2xl font-semibold mb-1 dark:text-white">{{ $post }}</div>
                        <div class="text-sm font-medium text-gray-400 dark:text-primary">Blogs</div>
                    </div>
                </div>
                <a href="{{ route('layouts.maintable') }}" class="text-[#f84525] font-medium text-sm hover:text-red-800 dark:text-white">View</a>
            </div>
            <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5 dark:bg-dark">
                <div class="flex justify-between mb-6">
                    <div>
                        <div class="flex items-center mb-1">
                            <div class="text-2xl font-semibold dark:text-white">{{ $certifikat }}</div>
                        </div>
                        <div class="text-sm font-medium text-gray-400 dark:text-primary">Certificates</div>
                    </div>
                </div>
                <a href="{{ route('layouts.maintable.sertifikat') }}" class="text-[#f84525] font-medium text-sm hover:text-red-800 dark:text-white">View</a>
            </div>
            <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5 dark:bg-dark">
                <div class="flex justify-between mb-6">
                    <div>
                        <div class="flex items-center mb-1">
                            <div class="text-2xl font-semibold  dark:text-white">{{ $like }}</div>
                        </div>
                        <div class="text-sm font-medium text-gray-400 dark:text-primary">Like</div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5 dark:bg-dark">
                <div class="flex justify-between mb-4">
                    <div>
                        <div class="flex items-center mb-1">
                            <div class="text-2xl font-semibold dark:text-white">{{ $comments }}</div>
                        </div>
                        <div class="text-sm font-medium text-gray-400 dark:text-primary">Comments</div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
