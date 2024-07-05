@extends('layouts.maintable')
@section('child-content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4">Data Post</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg overflow-hidden shadow-lg">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-center">No</th>
                        <th class="px-4 py-2 text-center">Title</th>
                        <th class="px-4 py-2 text-center">Image</th>
                        <th class="px-4 py-2 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td class="text-xs  px-2 py-1 text-center">{{ $loop->iteration }}</td>
                            <td class="text-xs px-2 py-1 text-center">{{ Str::words($post->title,10) }}</td>
                            <td class="px-2 py-1 text-center">
                                <img src="{{ asset('storage/' . $post->image) }}" class="w-20 h-15 mx-auto mt-2 rounded-lg shadow-dark">
                            </td>
                            <td class="text-xs px-2 py-1 text-center">
                                <div class="flex space-x-2 justify-center">
                                    <a href="{{ route('post.show', $post->slug) }}" class="text-dark hover:text-white hover:bg-blue-700 bg-blue-400 px-4 py-3 rounded-xl shadow-lg"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('post.edit',$post->id) }}" class="text-dark hover:text-white hover:bg-orange-700 bg-orange-400 px-4 py-3 rounded-xl shadow-lg"><i class="fas fa-edit"></i></a>
                                    <form id="delete-post" action="{{ route('post.destroy', $post->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="confirmDelete()" type="button" class="text-dark hover:text-white hover:bg-red-700 bg-red-600 px-4 py-3 rounded-xl shadow-lg"><i class="fas fa-trash"></i></button>
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
