<!DOCTYPE html>
<html lang="id" class="scroll-smooth" id="html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    @include('asset.css.mainAsset.styleDashboard')
</head>

<body class="bg-gray-100 flex">
    <div class="w-64 bg-white min-h-dvh shadow-lg dark:bg-dark">
        <div class="py-4 text-center font-bold text-sm text-gray-700 dark:text-white">
            <span class="font-base text-2xl text-red-500 dark:text-primary">
                @if (Auth::user()->role == 'admin')
                    Admin
                @else
                    User
                @endif
            </span>| Dashboard
        </div>
        <hr class="border-3 bg-red-500 h-[3.2px] dark:bg-primary">
        <div class="p-4 mt-4">
            <h3 class="text-gray-700 text-lg font-bold mb-4 dark:text-white">Fitur @if (Auth::user()->role == 'admin')
                    Admin
                @else
                    User
                @endif
            </h3>
            <ul class="space-y-4">
                <li>
                    <details class="group [&_summary::-webkit-details-marker]:hidden">
                        <summary
                            class="flex cursor-pointer items-center justify-between rounded-lg px-4 py-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:hover:bg-opacity-0">
                            <span class="text-sm font-medium dark:text-primary">Data</span>

                            <span class="shrink-0 transition duration-300 group-open:-rotate-180 dark:text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </summary>
                            <ul class="mt-2 space-y-1 px-4">
                                <li>
                                    <a href="{{ route('layouts.maintable') }}"
                                        class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:hover:text-primary dark:hover:bg-opacity-0">
                                        Table Data
                                    </a>
                                </li>
                                @if (Auth::user()->role == 'admin')

                                <li>
                                    <a href="{{ route('admin.dashboard') }}"
                                        class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:hover:text-primary dark:hover:bg-opacity-0">
                                        Dashboard
                                    </a>
                                </li>
                        @endif

                            </ul>

                    </details>
                </li>
                <li>
                    <details class="group [&_summary::-webkit-details-marker]:hidden">
                        <summary
                            class="flex cursor-pointer items-center justify-between rounded-lg px-4 py-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:hover:bg-opacity-0">
                            <span class="text-sm font-medium dark:text-primary">Form</span>

                            <span class="shrink-0 transition duration-300 group-open:-rotate-180  dark:text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </summary>

                        <ul class="mt-2 space-y-1 px-4">
                            <li>
                                <a href="{{ route('post.create') }}"
                                    class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:hover:text-primary dark:hover:bg-opacity-0">
                                    Form Post
                                </a>
                            </li>
                            @if (Auth::user()->role == 'admin')
                                <li>
                                    <a href="{{ route('project.create') }}"
                                        class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:hover:text-primary dark:hover:bg-opacity-0">
                                        Form Projects
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('sertifikat.create') }}"
                                        class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:hover:text-primary dark:hover:bg-opacity-0">
                                        Form Certificate
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('category.create') }}"
                                        class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:hover:text-primary dark:hover:bg-opacity-0">
                                        Form Category
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </details>
                </li>
                <li>
                    <details class="group [&_summary::-webkit-details-marker]:hidden">
                        <summary
                            class="flex cursor-pointer items-center justify-between rounded-lg px-4 py-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-primary dark:hover:bg-opacity-0">
                            <span class="text-sm font-medium">Profile</span>

                            <span class="shrink-0 transition duration-300 group-open:-rotate-180 dark:text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </summary>

                        <ul class="mt-2 space-y-1 px-4">
                            <li>
                                <a href="{{ route('Users.edit', ['id' => Auth::user()->id]) }}"
                                    class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:hover:text-primary dark:hover:bg-opacity-0">
                                    Profile
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('Auth.Form_password') }}"
                                    class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:hover:text-primary dark:hover:bg-opacity-0">
                                    Password
                                </a>
                            </li>
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="button" onclick="confirmLogout()"
                                        class="flex items-center text-gray-700 hover:text-red-500 transition rounded-lg py-2 px-4 dark:hover:text-primary dark:hover:bg-opacity-0">
                                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </details>
                </li>
                </li>
                <li>
                    <a href="{{ route('index') }}"
                        class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:hover:text-primary dark:hover:bg-opacity-0">
                        Home
                    </a>
                </li>
                <li>
                    <div class="w-full py-2 p-3 rounded-lg relative shadow-xl border-l-4 border-dark bg-yellow-300 dark:bg-primary">
                        <span class="text-white text-sm font-semibold dark:text-white">Halaman Ini Belum Responsif</span>
                        <span
                            class="inline-flex items-center justify-center rounded-full bg-amber-100 px-2.5 py-0.5 text-amber-700 dark:text-white dark:bg-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="-ms-1 me-1.5 h-4 w-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 9.75h4.875a2.625 2.625 0 010 5.25H12M8.25 9.75L10.5 7.5M8.25 9.75L10.5 12m9-7.243V21.75l-3.75-1.5-3.75 1.5-3.75-1.5-3.75 1.5V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0c1.1.128 1.907 1.077 1.907 2.185z" />
                            </svg>

                            <p class="whitespace-nowrap text-sm">beta</p>
                        </span>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- Konten Utama -->
    <div class="flex-1 p-6 bg-gray-100 dark:bg-slate-800">
        @yield('content')
    </div>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    @yield('script')
</body>

</html>
