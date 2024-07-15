@extends('layouts.dashboard')

@section('title', 'Ubah Postingan')

@section('content')
<div class="w-3/2 bg-white rounded-lg p-10 shadow-lg">
<div class="text-2xl font-bold mb-6">Ubah Postingan</div>
<form action="{{ route('post.update', $post->id) }}" method="POST" id="postForm" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <label class="block text-gray-700">Judul</label>
        <input type="text" id="title" name="title" value="{{ $post->title }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500" required>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700">Slug</label>
        <input type="text" id="slug" readonly name="slug" value="{{ $post->slug }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500" required>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700">Upload Gambar</label>
        <input type="file" id="postImage" name="image_post" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500" onchange="previewPostImage(event)">
        <span  class="text-red-400 mr-5 block font-semibold text-sm" id="text">pastikan gambar 16:9</span>
    </div>
    <div id="imagePreviewContainer" class="mb-4">
        <div id="postImagePreview" class="max-w-xl rounded-lg overflow-hidden">
            <img src="{{ url('storage/' . $post->image) }}" alt="Preview Image" id="postImagePreview">
        </div>
    </div>
    <div class="mb-4">
        <label for="category" class="block text-sm font-medium text-gray-900"> Category </label>
        <select name="category" id="category"
            class="mt-1.5 w-full rounded-lg py-3 border-dark border text-gray-700 sm:text-sm">
            @foreach ($categories as $category)
            @php
                $selected = ($category->id_category == $post->category->id_category) ? 'selected' : '';
            @endphp
                <option  value="{{ $category->id_category }}" {{ $selected }}>{{ $category->name_category }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700">Konten</label>
        <input type="hidden" name="content" id="content">
        <div id="editor">{!! $post->content !!}</div>
    </div>
    <button type="submit" class="px-4 py-2 bg-red-500 text-white font-bold rounded-lg hover:bg-red-600">Ubah</button>
</form>
</div>
@endsection
@section('script')
<script src="{{ asset('js/crud file script/scriptCrud.js') }}"></script>
<script src="{{ asset('js/quil file script/quil.js') }}"></script>
<script src="{{ asset('js/view image script/preview.js') }}"></script>
@endsection
