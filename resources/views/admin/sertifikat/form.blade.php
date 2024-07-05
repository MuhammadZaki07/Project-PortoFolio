@extends('layouts.dashboard')

@section('title', 'Form Sertifikat')

@section('content')
<div class="w-3/2 bg-white rounded-lg p-10 shadow-lg">
    <div class="w-1/8">
    <div class="text-2xl font-bold mb-6">Form Sertifikat</div>
    <form action="{{ route('sertifikat.store') }}" method="POST" id="postForm" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Nama Sertifikat</label>
            <input type="text" autofocus required name="name_certificate" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Judul</label>
            <input type="text" required name="title" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Upload Sertifikat</label>
            <input type="file" required name="image" id="certificateImage" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500" onchange="previewCertificateImage(event)">
            <span  class="text-red-400 mr-5 block text-base font-sans" id="text">pastikan gambar 16:9</span>
        </div>
        <div id="certificateImagePreviewContainer" class="mb-4 hidden">
            <div id="certificateImagePreview" class="max-w-lg h-auto rounded-lg overflow-hidden"></div>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Deskripsi</label>
            <input type="hidden" name="content" id="content">
            <div id="editor"></div>
        </div>
        <button type="submit" class="px-4 py-2 bg-red-500 text-white font-bold rounded-lg hover:bg-red-600">Tambah</button>
    </form>
</div>
</div>
@include('asset.js.assetAdmin.Assetquill.quill')
@include('asset.js.previewImage.previewImage')
@include('asset.js.assetAdmin.AssetJS')
@endsection
