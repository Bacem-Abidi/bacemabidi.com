<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Roboto:ital,wght@0,100..900;1,100..900&family=Ubuntu+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/admin/app.js', 'resources/js/admin/theme-admin.js', 'resources/css/admin.css'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="antialiased font-robotoMono">
    <header class="fixed top-0 w-full z-40 mx-auto">
        <div
            class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mx-auto max-w-screen-4xl md:px-14 sm:px-1 px-1 py-2">
            <svg class="w-5 h-5 mt-1 moon-admin cursor-pointer" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M12 22C17.5228 22 22 17.5228 22 12C22 11.5373 21.3065 11.4608 21.0672 11.8568C19.9289 13.7406 17.8615 15 15.5 15C11.9101 15 9 12.0899 9 8.5C9 6.13845 10.2594 4.07105 12.1432 2.93276C12.5392 2.69347 12.4627 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                    fill="currentColor"></path>
            </svg>
            <svg class="w-5 h-5 mt-1 sun-admin cursor-pointer" viewBox="0 0 16 16" fill="none"
                xmlns="http://www.w3.org/2000/svg">

                <path d="M7 3V0H9V3H7Z" fill="currentColor"></path>
                <path d="M9 13V16H7V13H9Z" fill="currentColor"></path>
                <path
                    d="M11 8C11 9.65685 9.65685 11 8 11C6.34315 11 5 9.65685 5 8C5 6.34315 6.34315 5 8 5C9.65685 5 11 6.34315 11 8Z"
                    fill="currentColor"></path>
                <path d="M0 9H3V7H0V9Z" fill="currentColor"></path>
                <path d="M16 7H13V9H16V7Z" fill="currentColor"></path>
                <path d="M3.75735 5.17157L1.63603 3.05025L3.05025 1.63603L5.17157 3.75735L3.75735 5.17157Z"
                    fill="currentColor"></path>
                <path d="M12.2426 10.8284L14.364 12.9497L12.9497 14.364L10.8284 12.2426L12.2426 10.8284Z"
                    fill="currentColor"></path>
                <path d="M3.05025 14.364L5.17157 12.2426L3.75735 10.8284L1.63603 12.9498L3.05025 14.364Z"
                    fill="currentColor"></path>
                <path d="M12.9497 1.63604L10.8284 3.75736L12.2426 5.17158L14.364 3.05026L12.9497 1.63604Z"
                    fill="currentColor"></path>
            </svg>
        </div>
    </header>
    <div class="font-sans text-gray-900 dark:text-gray-100 antialiased">
        {{ $slot }}
    </div>



    @livewireScripts
</body>

</html>
