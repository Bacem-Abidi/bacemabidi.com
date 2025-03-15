<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/theme-admin.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="antialiased dark:bg-background dark:text-text font-robotoMono overflow-x-hidden">
    <div class="min-h-screen dark:bg-background">
        <x-admin.sidebar />
        {{-- @livewire('navigation-menu') --}}

        <!-- Page Heading -->
        @if (isset($header))
            <header class="fixed top-0 w-full bg-white dark:bg-background shadow z-40">
                <div class="max-w-7xl mx-auto py-6 flex flex-row justify-between">
                    {{ $header }}
                    
                </div>
            </header>
        @endif


        <!-- Page Content -->
        <main class="mt-12">
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
