@extends('layouts.dashboard')
@section('content')
    <div class="max-w-6xl mx-auto bg-white relative rounded-xl shadow-lg p-8 mb-6">
        <div class="mx-auto w-1/2">
            <div class="flex items-center mb-4">
                <img src="{{ asset('storage/' . $post->image) }}" alt="Featured Image"
                    class="rounded-lg w-full object-cover shadow-md h-64 mx-auto">
            </div>
            <div class="flex items-center mb-4 justify-start">
                <img src="{{ $post->user->profile_image ? asset('storage/' . $post->user->profile_image) : asset('dist/img/iconsUsers.jpg') }}"
                    class="rounded-full h-8 w-8 border border-red-500 mr-2">
                <div>
                    <p class="text-gray-600 text-xs">{{ $post->user->name }}
                        @if ($post->user->isAdmin())
                        <i class="bi bi-patch-check-fill text-lg text-blue-500"></i>
                        @endif
                    </p>
                    <p class="text-xs text-gray-400">{{ $post->created_at->format('d M Y') }}</p>
                </div>
            </div>
            <h2 class="text-3xl font-semibold mb-2">{{ $post->title }}</h2>
            <p class="text-xs font-semibold text-gray-700">Category : {{ $post->category->name_category }}</p>
            <div class="w-full font-sans mb-10">
                <p class="mt-4"> {!! $post->content !!}</p>
            </div>
        </div>
    </div>
@endsection
