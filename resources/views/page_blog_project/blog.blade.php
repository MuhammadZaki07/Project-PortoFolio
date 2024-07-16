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
    <div class="max-w-sm mx-auto mb-6">
        <div class="border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="{{ route('post.views', $post->slug) }}" class="group block">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                    class="w-full h-64 object-cover transform transition rounded-lg duration-500 group-hover:scale-110 hover:shadow-xl hover:rounded-lg" />
            </a>
        </div>
        <div class="p-3">
            <a href="{{ route('post.views', $post->slug) }}">
                <h5 class="mb-2 text-xl lg:text-2xl font-bold tracking-tight text-gray-900 dark:text-primary">
                    {{ Str::words($post->title, 8) }}</h5>
                <h6 class="text-xs lg:text-xs text-slate-400 mb-2">Category: {{ $post->category->name_category }}</h6>
            </a>
            <a href="{{ route('post.views', $post->slug) }}"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Read more
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>
    </div>
@endforeach
@endsection
@section('pagination')
<div class="flex justify-center mt-10">
    @if ($posts->hasPages())
        <nav>
            <ul class="flex space-x-1">
                <!-- Previous Page Link -->
                @if ($posts->onFirstPage())
                    <li aria-disabled="true" class="hidden">
                        <span class="mx-1 flex h-9 w-9 items-center justify-center rounded-full border border-blue-gray-100 bg-transparent p-0 text-sm text-blue-gray-500 transition duration-150 ease-in-out" aria-label="Previous">
                            <span class="material-icons text-sm">keyboard_arrow_left</span>
                        </span>
                    </li>
                @else
                    <li>
                        <a class="mx-1 flex h-9 w-9 items-center justify-center rounded-full border border-blue-gray-100 bg-transparent p-0 text-sm text-blue-gray-500 transition duration-150 ease-in-out hover:bg-light-300" href="{{ $posts->previousPageUrl() }}" aria-label="Previous">
                            <span class="material-icons text-sm">keyboard_arrow_left</span>
                        </a>
                    </li>
                @endif

                <!-- Pagination Elements -->
                @foreach ($posts->links()->elements as $element)
                    <!-- "Three Dots" Separator -->
                    @if (is_string($element))
                        <li aria-disabled="true">
                            <span class="mx-1 flex h-9 w-9 items-center justify-center rounded-full border border-blue-gray-100 bg-transparent p-0 text-sm text-blue-gray-500 transition duration-150 ease-in-out">{{ $element }}</span>
                        </li>
                    @endif

                    <!-- Array Of Links -->
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $posts->currentPage())
                                <li aria-current="page">
                                    <span class="mx-1 flex h-9 w-9 items-center justify-center rounded-full bg-red-500 p-0 dark:bg-primary text-sm text-white dark:text-primary shadow-md transition duration-150 ease-in-out">{{ $page }}</span>
                                </li>
                            @else
                                <li>
                                    <a class="mx-1 flex h-9 w-9 items-center justify-center rounded-full border border-blue-gray-100 bg-transparent p-0 text-sm text-blue-gray-500 transition duration-150 ease-in-out hover:bg-light-300" href="{{ $url }}">
                                        {{ $page }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                <!-- Next Page Link -->
                @if ($posts->hasMorePages())
                    <li>
                        <a class="mx-1 flex h-9 w-9 items-center justify-center rounded-full border border-blue-gray-100 bg-transparent p-0 text-sm text-blue-gray-500 transition duration-150 ease-in-out hover:bg-light-300" href="{{ $posts->nextPageUrl() }}" aria-label="Next">
                            <span class="material-icons text-sm">keyboard_arrow_right</span>
                        </a>
                    </li>
                @else
                    <li aria-disabled="true">
                        <span class="mx-1 flex h-9 w-9 items-center justify-center rounded-full border border-blue-gray-100 bg-transparent p-0 text-sm text-blue-gray-500 transition duration-150 ease-in-out" aria-label="Next">
                            <span class="material-icons text-sm">keyboard_arrow_right</span>
                        </span>
                    </li>
                @endif
            </ul>
        </nav>
    @endif
</div>
@endsection
@section('content-2')
@section('form-title', 'criticism and suggestions!!')
<form action="{{ route('message.store') }}" method="post" class="space-y-4">
    @csrf
    <div>
        <label for="name" class="block font-bold mb-2 dark:text-primary">Your Name</label>
        <input type="text" id="name" name="name" class="w-full border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500" placeholder="Enter your name">
    </div>
    <div>
        <label for="email" class="block font-bold mb-2 dark:text-primary">Your Email</label>
        <input type="email" id="email" name="email" class="w-full border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500" placeholder="Enter your email">
    </div>
    <div>
        <label for="message" class="block font-bold mb-2 dark:text-primary">Your Message</label>
        <textarea name="message" id="message" rows="4" class="w-full border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500" placeholder="Enter your message"></textarea>
    </div>
    <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-700 transition duration-300">Submit</button>
</form>
@endsection
