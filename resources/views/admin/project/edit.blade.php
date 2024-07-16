@extends('layouts.dashboard')
@section('title', 'Edit')

@section('content')
    <div class="w-3/2 bg-white rounded-lg p-10 shadow-lg">
        <div class="w-1/2">
            <div class="text-2xl font-bold mb-6 dark:text-primary">Edit Project</div>
            <form method="POST" action="{{ route('project.update', $project->id) }}" id="postForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-gray-700">Nama Project</label>
                    <input type="text" name="name_project" value="{{ $project->name_project }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500 dark:focus:border-primary">
                </div>
                <div class="mb-4">
                    <label for="category" class="block text-sm font-medium text-gray-900"> Category </label>
                    <select name="category" id="category"
                        class="mt-1.5 w-full rounded-lg py-3 border-dark border text-gray-700 sm:text-sm">
                        @foreach ($categories as $category)
                        @php
                            $selected = ($project->category->id_category == $category->id_category) ? 'selected' : '';
                        @endphp
                            <option value="{{ $category->id_category }}" {{ $selected }}>{{ $category->name_category }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Link Project</label>
                    <input type="url" name="url_project" value="{{ $project->url_project }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500 dark:focus:border-primary">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Link Youtube | Tutorial</label>
                    <input type="url" name="url_youtube" value="{{ $project->url_youtube }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500 dark:focus:border-primary">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Link Github | Repository</label>
                    <input type="url" name="url_github" value="{{ $project->url_github }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500 dark:focus:border-primary">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Upload Gambar Project</label>
                    <input type="file" name="thumnail_project" onchange="previewCertificateImage(event)"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500 dark:focus:border-primary">
                </div>
                <div id="certificateImagePreviewContainer" class="mb-4">
                    <div id="certificateImagePreview" class="max-w-lg h-auto rounded-lg overflow-hidden">
                        <img src="{{ url('storage/' . $project->thumnail_project) }}" alt="Sertifkat_gambar_1010">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Deskripsi</label>
                    <input type="hidden" name="content" id="content">
                    <div id="editor">{!! $project->description_project !!}</div>
                </div>
                <button type="submit"
                    class="px-4 py-2 bg-red-500 text-white font-bold rounded-lg hover:bg-red-600 dark:bg-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/quil file script/quil.js') }}"></script>
    <script src="{{ asset('js/view image script/preview.js') }}"></script>
    <script src="{{ asset('js/crud file script/scriptCrud.js') }}"></script>
@endsection
