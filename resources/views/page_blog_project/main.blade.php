<!DOCTYPE html>
<html lang="en" class="scroll-smooth" id="html">

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
        <div class="py-20 text-center text-white">
            <div class="container mx-auto px-4">
                @if (Auth::check())
                    <h1 class="xl:text-5xl lg:text-5xl sm:text-3xl font-bold mb-4">👋Haii! Selamat datang
                        {{ Auth::user()->name }} 🎉</h1>
                @else
                    <h1 class="xl:text-5xl lg:text-5xl sm:text-3xl font-bold mb-4">👋Haii! Selamat datang 🎉</h1>
                @endif

                <p class="mt-2 xl:text-lg sm:text-sm">Cooding, Ibadah, Olahraga, Success</p>
            </div>
        </div>
    </div>
    <!-- Projects Section -->
    <section class="py-10 shadow-inner bg-slate-100 dark:bg-dark">
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
    <section class="bg-gray-200 py-16 dark:bg-dark">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold mb-8 text-center dark:text-primary">@yield('form-title')</h2>
            <div class="max-w-md mx-auto">
                @yield('content-2')
                <p class="mt-4 text-center dark:text-primary">My Email<a target=_blank" href="https://veilmail.io/muhammad_zaki_ulumuddin"
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
    <div class="relative bg-white dark:bg-slate-900 pattern">
        <nav
            class="z-20 flex shrink-0 grow-0 justify-around gap-4 border-t border-gray-200 bg-white p-2.5 shadow-lg fixed top-2/4 -translate-y-2/4 right-6 min-h-[auto] min-w-[64px] flex-col rounded-lg border">
            <span id="light"
                class="flex aspect-square hover:cursor-pointer min-h-[32px] w-16 flex-col items-center justify-center gap-1 rounded-md p-1.5 bg-white dark:border-opacity-0 border border-solid border-dark text-dark dark:bg-slate-100 hover:border-opacity-100 dark:text-slate-400">
                <i class="bi bi-lightbulb-fill"></i>
                <small class="text-center text-xs font-medium"> light </small>
            </span>

            <span id="dark"
                class="flex aspect-square hover:cursor-pointer min-h-[32px] w-16 flex-col items-center justify-center gap-1 bg-white rounded-md p-1.5 text-gray-700 dark:bg-slate-800 hover:bg-gray-100 dark:text-primary dark:hover:bg-slate-800">
                <i class="bi bi-moon-stars-fill"></i>
                <small class="text-center text-xs font-medium"> dark </small>
            </span>
        </nav>
    </div>
    @include('asset.js.SwitchAlerts.switchAlerts')
    <script src="{{ asset('dist/js/script.js') }}"></script>
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</body>

</html>
