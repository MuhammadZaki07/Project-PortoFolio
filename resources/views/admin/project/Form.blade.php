@extends('layouts.dashboard')
@section('title', 'Project')

@section('content')
<div class="w-3/2 bg-white rounded-lg p-10 shadow-lg">
    <div class="w-1/8">
    <div class="text-2xl font-bold mb-6">Push Project</div>
    <form method="POST" action="{{ route('project.store') }}" id="postForm" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Nama Project</label>
            <input type="text" name="name_project" autofocus class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Link Project</label>
            <input type="url" name="url_project" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Link Youtube | Tutorial</label>
            <input type="url" name="url_youtube" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Link Github | Repository</label>
            <input type="url" name="url_github" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Upload Thumnail Project</label>
            <input type="file" name="thumnail_project" id="projectImage" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500" onchange="previewProjectImage(event)">
        </div>
        <div id="projectImagePreviewContainer" class="mb-4 hidden">
            <img id="projectImagePreview" class="mt-4 max-w-xl h-auto rounded-lg" />
        </div>
        <div class="mb-4">
        <label class="block text-gray-700">Deskripsi Project</label>
        <input type="hidden" name="content" id="content">
        <div id="editor"></div>
        </div>
        <button type="submit" class="px-4 py-2 bg-red-500 text-white font-bold rounded-lg hover:bg-red-600">Save</button>
    </form>
    </div>
</div>
@include('asset.js.assetAdmin.Assetquill.quill')
@include('asset.js.previewImage.previewImage')
@include('asset.js.assetAdmin.AssetJS')
@endsection
