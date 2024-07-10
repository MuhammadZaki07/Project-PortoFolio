@extends('layouts.maintable')
@section('child-content')
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
    <div class="container mx-auto p-4">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Data Project</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-lg overflow-hidden shadow-lg">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2 text-center">No</th>
                            <th class="py-3 text-center">Nama Project</th>
                            <th class="px-4 py-2 text-center">Url</th>
                            <th class="px-4 py-2 text-center">Thumnail</th>
                            <th class="px-4 py-2 text-center">Category</th>
                            <th class="px-4 py-2 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($projects as $project)
                            <tr>
                                <td class="text-xs  px-2 py-1 text-center">{{ $loop->iteration }}</td>
                                <td class="text-xs  px-2 py-1 text-center">{{ Str::words($project->name_project,10) }}</td>
                                <td class="text-xs  px-2 py-1 text-center truncate-text">
                                    <a href="{{ $project->url_project }}" target="_blank" class="text-blue-500 underline block cursor-pointer">
                                        {{ Str::limit($project->url_project, 8,'...') }}
                                    </a>
                                </td>
                                <td class="text-xs  px-2 py-1 text-center">
                                    <img src="{{ asset('storage/' . $project->thumnail_project) }}"
                                        class="w-15 h-10 mx-auto rounded-lg shadow-lg">
                                </td>
                                <td class="text-xs  px-2 py-1 text-center">
                                    {{ $project->category->name_category }}
                                </td>
                                <td class="text-xs  px-2 py-1 text-center">

                                        <div class="flex space-x-2 justify-center">
                                            <a href="{{ $project->url_project }}" target="_blank"
                                                class="text-dark hover:text-white hover:bg-blue-700 bg-blue-400 px-4 py-3 rounded-xl shadow-lg"><i
                                                    class="fas fa-eye"></i></a>
                                            <a href="{{ route('project.edit', $project->id) }}"
                                                class="text-dark hover:text-white hover:bg-orange-600 bg-orange-400 px-4 py-3 rounded-xl shadow-lg"><i
                                                    class="fas fa-edit"></i></a>
                                            <form id="delete-post" action="{{ route('project.destroy', $project->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="confirmDelete()" type="button"
                                                    class="text-dark hover:text-white hover:bg-red-700 bg-red-600 px-4 py-3 rounded-xl shadow-lg"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('asset.js.assetAdmin.AssetJS')
@endsection
