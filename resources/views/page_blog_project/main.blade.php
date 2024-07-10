<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
       @include('asset.css.mainAsset.styleIndex')
       <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css"  rel="stylesheet" />
       <link rel="icon" type="image/png" href="{{ asset('dist/img/logo.png') }}">
</head>

<body class="bg-gray-100">
    <div class="shadow-lg" style="background: url('/dist/img/header_project1.png'); object-position: center; background-position: center; background-size: cover;">
    <nav class=" text-white py-4">
        <div class="container mx-auto px-4">
            <a href="#" class="text-4xl font-bold">@yield('text-title')</a>
            <ul class="flex space-x-4 mt-3">
                <li><a href="/" class="hover:text-gray-300 font-semibold xl:text-lg underline sm:text-sm lg:text-sm">Home</a></li>
                <li><a href="{{ route('blog.show') }}" class="hover:text-gray-300 font-semibold xl:text-lg underline sm:text-sm lg:text-sm">Blog</a></li>
                <li><a href="{{ route('project.show') }}" class="hover:text-gray-300 font-semibold xl:text-lg underline sm:text-sm lg:text-sm">Projects</a></li>
                <li><a href="#" class="hover:text-gray-300 font-semibold xl:text-lg underline sm:text-sm lg:text-sm">Informations</a></li>
            </ul>
        </div>
    </nav>
    <header class="py-20 text-center text-white" >
        <div class="container mx-auto px-4">
            <h1 class="xl:text-5xl lg:text-3xl sm:text-3xl font-bold  mb-4">👋Haii! Selamat datang {{ Auth::user()->name }}🎉</h1>
            <p class="mt-2 xl:text-lg sm:text-sm">Cooding,Ibadah,Olahraga,Success</p>
        </div>
    </header>
</div>
    <!-- Projects Section -->
    <section class="py-10 shadow-inner bg-slate-300">
        <form class="max-w-lg mx-auto">
            <div class="flex">
                <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your Email</label>
                <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">All categories <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
        </svg></button>
                <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                        @foreach ($categories as $category )
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $category->name_category }}</button>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="relative w-full">
                    <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Search..." required />
                    <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
            </div>
        </form>
        <div class="container mx-auto px-4 p-10">
            @yield('img-null')
            <div class="grid grid-cols-5 w-full md:grid-cols-3 lg:grid-cols-3 gap-5">
                <!-- Project Card -->
                @yield('content-1')
                <!-- Repeat for other projects -->
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="bg-gray-200 py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold mb-8 text-center">@yield('form-title')</h2>
            <div class="max-w-md mx-auto">
                    @yield('content-2')
                <p class="mt-4 text-center">My Email<a target=_blank" href="https://veilmail.io/muhammad_zaki_ulumuddin" class="text-blue-600 font-bold hover:underline"> https://veilmail.io/muhammad_zaki_ulumuddin</a></p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2024 DevcodeId. All rights reserved. Designed with  by muhmamad zaki ulumuddin</p>
        </div>
    </footer>
    @include('asset.js.SwitchAlerts.cdnScript')
    @include('asset.js.assetAdmin.AssetJS')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</body>
</html>
