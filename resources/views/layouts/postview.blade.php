<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('dist/img/logo.png') }}">
    <title>Post | {{ $posts->slug }}</title>
    @include('asset.js.postAsset.cdnPostsView')
</head>

<body>
    <div class="min-w-full flex justify-center mx-auto bg-white">
        <div class="max-w-lg p-3 xl:max-w-4xl lg:max-w-3xl">
            <div class="header mt-2">
                <img src="{{ asset('storage/' . $posts->image) }}" alt="Image"
                    class="rounded-sm shadow-md object-cover">
                <h1 class="font-bold wrapper text-2xl mt-1.5 text-dark xl:text-3xl xl:mt-5 lg:mt-5">{{ $posts->title }}
                </h1>
            </div>
            <div class="flex items-center my-3 justify-start">
                <img src="{{ $posts->user->profile_image ? asset('storage/' . $posts->user->profile_image) : asset('dist/img/iconsUsers.jpg') }}"
                    class="rounded-full h-8 w-8 xl:h-12 xl:w-12 lg:w-10 lg:h-10 border border-red-500 mr-2">
                <div>
                    <p class="text-dark text-xs font-bold xl:text-sm lg:text-lg">{{ $posts->user->name }}
                        @if ($posts->user->isAdmin())
                         <i class="bi bi-patch-check-fill text-lg text-blue-500"></i>
                         @endif
                    </p>
                    <p class="text-xs text-gray-400">{{ $posts->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <div class="mt-10 p-2 xl:mt-5">
                <div class="font-sans mb-5 text-dark text-base">
                    {!! $posts->content !!}
                </div>
            </div>
            <hr class="my-10">
            <div class="container">
                @guest
                <div class="bg-yellow-100 text-dark px-4 py-5 rounded relative" role="alert">
                    <strong class="font-bold">Perhatian!</strong>
                    <span class="block sm:inline">Anda harus login terlebih dahulu untuk dapat mengakses fitur ini <a href="{{ route('login.index') }}" class="font-bold text-blue-400 underline">Login</a>.</span>
                </div>
                @endguest
                <div class="mt-8 @guest
                hidden
                @endguest">
                    <h3 class="text-xl font-bold mb-4">Tambah Komentar</h3>
                    <form action="{{ route('create.comment', ['slug' => $posts->slug]) }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $posts->id }}">
                        <input type="hidden" name="user_id" value="{{ $posts->user->id }}">
                        <div>
                            <input type="text" name="comment" id="comment"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500"
                                required>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                Kirim Komentar
                            </button>
                        </div>
                    </form>
                </div>
                <hr class="my-10">
                <div class="mt-8">
                    <h3 class="text-xl font-bold mb-4">Komentar</h3>
                    <div class="bg-gray-100 p-2 rounded-lg mb-4">
                        @if ($posts->comments->isEmpty())
                            <span class="text-gray-500 flex justify-center p-3 font-bold text-2xl">Belum ada
                                komentar.</span>
                        @endif
                        @foreach ($posts->comments as $comment)
                            <div class="container mt-5">
                                <div class="flex items-center mb-2 justify-between">
                                    <div class="flex items-center">
                                        <img src="{{ $comment->user->profile_image ? asset('storage/' . $comment->user->profile_image) : asset('dist/img/iconsUsers.jpg') }}"
                                            alt="Avatar" class="rounded-full h-8 w-8 border border-red-500 mr-2">

                                        <div>
                                            <p class="text-dark font-semibold">{{ $comment->user->name }}
                                                @if ($comment->user->isAdmin())
                                                <i class="bi bi-patch-check-fill text-lg text-blue-500"></i>
                                                @endif</p>
                                            <p class="text-xs text-gray-400">
                                                {{ $comment->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                    <form action="{{ route('toggle.like') }}" method="POST" class="like-form">
                                        @csrf
                                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                        <input type="hidden" name="post_id" value="{{ $posts->id }}">
                                        <button type="button" class="like-button">
                                            <i class="fa-solid fa-heart"></i>
                                        </button>
                                        <span class="like-count ml-1 text-black text-xs">{{ $comment->likes->count() }}</span>
                                    </form>
                                </div>
                                <p class="text-gray-700">{{ $comment->content }}</p>
                                <hr class="mt-3">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('asset.js.SwitchAlerts.cdnScript')
</body>

</html>
