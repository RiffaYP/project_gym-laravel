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
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 dark:text-gray-100 antialiased bg-gray-50 dark:bg-slate-900 transition-colors duration-300">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative overflow-hidden">
            <!-- Ambient Background Effects -->
            <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden">
                <div class="absolute -top-1/4 -left-1/4 w-1/2 h-1/2 bg-indigo-500/20 dark:bg-indigo-500/30 rounded-full mix-blend-multiply dark:mix-blend-screen filter blur-[100px] opacity-70 animate-pulse" style="animation-duration: 8s;"></div>
                <div class="absolute -bottom-1/4 -right-1/4 w-1/2 h-1/2 bg-purple-500/20 dark:bg-purple-500/30 rounded-full mix-blend-multiply dark:mix-blend-screen filter blur-[100px] opacity-70 animate-pulse" style="animation-duration: 12s;"></div>
            </div>

            <div class="relative z-10 mb-4">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-indigo-600 dark:text-indigo-400 drop-shadow-md transition-transform hover:scale-105 duration-300" />
                </a>
            </div>

            <div class="relative z-10 w-full sm:max-w-md mt-4 px-8 py-8 bg-white/70 dark:bg-slate-800/60 backdrop-blur-xl border border-white/40 dark:border-slate-700/50 shadow-2xl sm:rounded-2xl">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
