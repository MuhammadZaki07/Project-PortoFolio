@extends('page_blog_project.main')
@section('title', 'Blog')
@section('text-title', 'My Blog')
@section('content-1')
@section('img-null')
@if ($posts->isEmpty())
<div class="mx-auto">
    <img src="{{ asset('dist/img/svg/Project.svg') }}" alt="Empty Projects" class="svg-image mx-auto mb-4">
    <h1 class="font-bold text-slate-500 text-4xl text-center sm:text-2xl">Tidak ada Blog saat ini</h1>
</div>
@endif
@endsection
    @foreach ($posts as $post)
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="{{ route('post.views', $post->slug) }}">
                <img class="rounded-t-lg" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" />
            </a>
            <div class="p-5">
                <a href="{{ route('post.views', $post->slug) }}">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ Str::words($post->title, 8) }}</h5>
                </a>
                <div class="mb-3 font-normal text-gray-700 dark:text-gray-400">{!! Str::words($post->content, 10) !!}</div>
                <a href="{{ route('post.views', $post->slug) }}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Read more
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
                @if (Auth::user()->role == 'admin')
                <div class="flex justify-start py-1">
                    <a href="{{ route('post.edit', $post->id) }}"
                        class="text-dark hover:text-white hover:bg-orange-600 bg-orange-400 px-4 py-3 rounded-xl shadow-lg"><i
                            class="fas fa-edit"></i></a>
                    <form id="delete-post" action="{{ route('post.destroy2', $post->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button onclick="confirmDelete()" type="button"
                            class="text-dark hover:text-white ml-2 hover:bg-red-700 bg-red-600 px-4 py-3 rounded-xl shadow-lg"><i
                                class="fas fa-trash"></i></button>
                    </form>
                </div>
                    @endif
            </div>
        </div>
    @endforeach

@endsection
@section('content-2')
@section('form-title', 'criticism and suggestions!!')
<form action="{{ route('message.store') }}" method="post" class="space-y-4">
    @csrf
    <div>
        <label for="name" class="block font-bold mb-2">Your Name</label>
        <input type="text" id="name" name="name"
            class="w-full border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500"
            placeholder="Enter your name">
    </div>
    <div>
        <label for="email" class="block font-bold mb-2">Your Email</label>
        <input type="email" id="email" name="email"
            class="w-full border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500"
            placeholder="Enter your email">
    </div>
    <div>
        <label for="message" class="block font-bold mb-2">Your Message</label>
        <textarea name="message" id="message" rows="4"
            class="w-full border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500"
            placeholder="Enter your message"></textarea>
    </div>
    <button type="submit"
        class="bg-blue-600 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-700 transition duration-300">Submit</button>
</form>
@endsection
