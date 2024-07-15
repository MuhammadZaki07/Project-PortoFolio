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
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ asset('dist/img/logo.png') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
</head>

<body class="bg-gray-100">
    <div class="shadow-lg"
        style="background: url('/dist/img/header_project1.png'); object-position: center; background-position: center; background-size: cover;">
        <nav class=" text-white py-4">
            <div class="container mx-auto px-4">
                <a href="#" class="text-4xl font-bold">@yield('text-title')</a>
                <ul class="flex space-x-4 mt-3">
                    <li><a href="/"
                            class="hover:text-gray-300 font-semibold xl:text-lg underline sm:text-sm lg:text-sm">Home</a>
                    </li>
                    <li><a href="{{ route('blog.show') }}"
                            class="hover:text-gray-300 font-semibold xl:text-lg underline sm:text-sm lg:text-sm">Blog</a>
                    </li>
                    <li><a href="{{ route('project.show') }}"
                            class="hover:text-gray-300 font-semibold xl:text-lg underline sm:text-sm lg:text-sm">Projects</a>
                    </li>
                </ul>
            </div>
        </nav>
        <header class="py-20 text-center text-white">
            <div class="container mx-auto px-4">
                @if (Auth::check())
                    <h1 class="xl:text-5xl lg:text-5xl sm:text-3xl font-bold mb-4">👋Haii! Selamat datang
                        {{ Auth::user()->name }} 🎉</h1>
                @else
                    <h1 class="xl:text-5xl lg:text-5xl sm:text-3xl font-bold mb-4">👋Haii! Selamat datang 🎉</h1>
                @endif

                <p class="mt-2 xl:text-lg sm:text-sm">Cooding, Ibadah, Olahraga, Success</p>
            </div>
        </header>
    </div>
    <!-- Projects Section -->
    <section class="py-10 shadow-inner bg-slate-100">
        <div class="container mx-auto px-4 py-5">
            @yield('img-null')
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4 gap-5">
                <!-- Project Card -->
                @yield('content-1')
                <!-- Repeat for other projects -->
            </div>
            @yield('pagination')
        </div>
    </section>

    <!-- Contact Section -->
    <section class="bg-gray-200 py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold mb-8 text-center">@yield('form-title')</h2>
            <div class="max-w-md mx-auto">
                @yield('content-2')
                <p class="mt-4 text-center">My Email<a target=_blank" href="https://veilmail.io/muhammad_zaki_ulumuddin"
                        class="text-blue-600 font-bold hover:underline"> https://veilmail.io/muhammad_zaki_ulumuddin</a>
                </p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2024 DevcodeId. All rights reserved. Designed with by muhmamad zaki ulumuddin</p>
        </div>
    </footer>
    @include('asset.js.SwitchAlerts.switchAlerts')
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</body>

</html>
