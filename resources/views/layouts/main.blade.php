<!DOCTYPE html>
<html lang="en" class="scroll-smooth" id="html">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Portfolio ku')</title>
    @include('asset.css.mainAsset.cdnMain')
</head>
<body>
    @yield('content')
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
    @yield('script')
</body>
</html>
