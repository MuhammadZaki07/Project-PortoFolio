@extends('layouts.dashboard')
@section('title', 'Tambah Postingan')
@section('content')
    <div class="w-3/2 bg-white rounded-lg p-10 shadow-lg">
        <div class="text-4xl font-bold mb-6">Tambah Postingan</div>
        <form action="{{ route('post.store') }}" method="POST" id="postForm" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Judul</label>
                <input type="text" id="title" name="title"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Slug</label>
                <input type="text" id="slug" readonly name="slug"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Upload Gambar</label>
                <input type="file" id="postImage" required name="image_post"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500"
                    onchange="previewPostImage(event)">
                <span class="text-red-400 mr-5 block font-semibold text-sm" id="text">pastikan gambar 16:9</span>
            </div>
            <div id="imagePreviewContainer" class="mb-4 hidden">
                <div id="postImagePreview" class="max-w-xl rounded-lg overflow-hidden"></div>
            </div>
            <div class="mb-4">
                <label for="category" class="block text-sm font-medium text-gray-900"> Category </label>
                <select name="category" id="category"
                    class="mt-1.5 w-full rounded-lg py-3 border-dark border text-gray-700 sm:text-sm">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id_category }}">{{ $category->name_category }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Konten</label>
                <input type="hidden" name="content" id="content">
                <div id="editor"></div>
            </div>
            <button type="submit"
                class="px-4 py-2 bg-red-500 text-white font-bold rounded-lg hover:bg-red-600">Simpan</button>
        </form>
    </div>
@endsection
@section('script')
@include('asset.js.SwitchAlerts.switchAlerts')
<script src="{{ asset('js/crud file script/scriptCrud.js') }}"></script>
<script src="{{ asset('js/view image script/preview.js') }}"></script>
<script src="{{ asset('js/quil file script/quil.js') }}"></script>
@endsection
