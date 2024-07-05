<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    @include('asset.css.mainAsset.styleDashboard')
    @php
        use Illuminate\Support\Facades\Auth;
    @endphp
</head>

<body class="bg-gray-100 flex">
    <div class="w-64 bg-white min-h-dvh shadow-lg">
        <div class="py-4 text-center font-bold text-sm text-gray-700">
            <span class="font-base text-2xl text-red-500">@if (Auth::user()->role == 'admin')
                Admin
            @else
                User
            @endif</span>| Dashboard
        </div>
        <hr class="border-3 bg-red-500 h-[3.2px]">
        <div class="p-4 mt-4">
            <h3 class="text-gray-700 text-lg font-bold mb-4">Fitur @if (Auth::user()->role == 'admin')
                Admin
            @else
                User
            @endif</h3>
            <ul class="space-y-4">
                @if (Auth::user()->role == 'admin')
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center text-gray-700 hover:text-red-500 transition {{ Request::route()->named('admin.dashboard') ? 'bg-gray-200 border-l-4 border-red-500 text-gray-900' : '' }} rounded-lg py-2 px-4">
                        <i class="fas fa-edit mr-2"></i> Dashboard
                    </a>
                </li>
                @endif
                <li>
                    <a href="{{ route('Users.edit', ['id' => Auth::user()->id]) }}"
                        class="flex items-center text-gray-700 hover:text-red-500 transition {{ Request::route()->named('Users.edit') ? 'bg-gray-200 border-l-4 border-red-500 text-gray-900' : '' }} rounded-lg py-2 px-4">
                        <i class="fas fa-user-edit mr-2"></i> Profil
                    </a>
                </li>
                @if (Auth::user()->role == 'admin')
                <li>
                    <a href="{{ route('layouts.maintable') }}"
                        class="flex items-center text-gray-700 hover:text-red-500 transition {{ Request::route()->named('layouts.maintable*') ? 'bg-gray-200 border-l-4 border-red-500 text-gray-900' : '' }} rounded-lg py-2 px-4">
                        <i class="fas fa-table mr-2"></i> Table
                    </a>
                </li>
                @endif
                <li>
                    <a href="{{ route('post.create') }}"
                        class="flex items-center text-gray-700 hover:text-red-500 transition {{ Request::route()->named('post.create') ? 'bg-gray-200 border-l-4 border-red-500 text-gray-900' : '' }} rounded-lg py-2 px-4">
                        <i class="fas fa-pencil-alt mr-2"></i> Tambah Postingan
                    </a>
                </li>
                @if (Auth::user()->role == 'admin')
                <li>
                    <a href="{{ route('project.create') }}"
                        class="flex items-center text-gray-700 hover:text-red-500 transition {{ Request::route()->named('project.create') ? 'bg-gray-200 border-l-4 border-red-500 text-gray-900' : '' }} rounded-lg py-2 px-4">
                        <i class="fas fa-project-diagram mr-2"></i> Tambah Project
                    </a>
                </li>
                @endif
                @if (Auth::user()->role == 'admin')
                <li>
                    <a href="{{ route('sertifikat.create') }}"
                        class="flex items-center text-gray-700 hover:text-red-500 transition {{ Request::route()->named('sertifikat.create') ? 'bg-gray-200 border-l-4 border-red-500 text-gray-900' : '' }} rounded-lg py-2 px-4">
                        <i class="fas fa-certificate mr-2"></i> Tambah Sertifikat
                    </a>
                </li>
                @endif
                <li>
                    <a href="{{ route('Auth.Form_password') }}"
                        class="flex items-center text-gray-700 hover:text-red-500 transition {{ Request::route()->named('Auth.Form_password') ? 'bg-gray-200 border-l-4 border-red-500 text-gray-900' : '' }} rounded-lg py-2 px-4">
                        <i class="fas fa-key mr-2"></i> Ganti Password
                    </a>
                </li>
                <li>
                    <a href="{{ route('index') }}"
                        class="flex items-center text-gray-700 hover:text-red-500 transition {{ Request::route()->named('index') ? 'bg-gray-200 border-l-4 border-red-500 text-gray-900' : '' }} rounded-lg py-2 px-4">
                        <i class="fas fa-eye mr-2"></i> Views
                    </a>
                </li>
                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="button" onclick="confirmLogout()"
                            class="flex items-center text-gray-700 hover:text-red-500 transition rounded-lg py-2 px-4">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                </li>
                <li>
                    <div class="w-full py-2 p-3 rounded-lg relative shadow-xl border-l-4 border-dark bg-yellow-300">
                        <span class="text-white text-sm font-semibold">Halaman Ini Belum Responsif</span>
                        <span
                        class="inline-flex items-center justify-center rounded-full bg-amber-100 px-2.5 py-0.5 text-amber-700"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke-width="1.5"
                          stroke="currentColor"
                          class="-ms-1 me-1.5 h-4 w-4"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M8.25 9.75h4.875a2.625 2.625 0 010 5.25H12M8.25 9.75L10.5 7.5M8.25 9.75L10.5 12m9-7.243V21.75l-3.75-1.5-3.75 1.5-3.75-1.5-3.75 1.5V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0c1.1.128 1.907 1.077 1.907 2.185z"
                          />
                        </svg>

                        <p class="whitespace-nowrap text-sm">beta</p>
                      </span>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- Konten Utama -->
    <div class="flex-1 p-6 bg-gray-100">
        @yield('content')
    </div>
    @include('asset.js.SwitchAlerts.cdnScript')
    @yield('script')
</body>

</html>
