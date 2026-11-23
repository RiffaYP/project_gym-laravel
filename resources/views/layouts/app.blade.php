<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gym App') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Alpine JS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-900 text-white">

    <div x-data="{ open: false }" class="flex min-h-screen">

        <!-- OVERLAY -->
        <div
            x-show="open"
            @click="open = false"
            class="fixed inset-0 bg-black bg-opacity-50 z-40"
            x-transition>
        </div>

        <!-- SIDEBAR -->
        <aside
            class="fixed inset-y-0 left-0 w-64 bg-zinc-900 border-r border-zinc-800 p-6 space-y-6 z-50 transform transition-transform duration-300 lg:translate-x-0"
            :class="open ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">

            <h1 class="text-2xl font-bold flex items-center gap-3">
                <x-application-logo class="w-8 h-8 text-indigo-500 drop-shadow-md" />
                Gym App
            </h1>

            <nav class="space-y-2 text-zinc-300">

                <a href="/dashboard"
                    class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-zinc-800 transition {{ request()->is('dashboard') ? 'bg-indigo-600 text-white' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                    </svg>
                    <span class="font-medium">Dashboard</span>
                </a>

                <a href="/members"
                    class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-zinc-800 transition {{ request()->is('members*') ? 'bg-indigo-600 text-white' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>
                    <span class="font-medium">Data Member</span>
                </a>

                <a href="/packages"
                    class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-zinc-800 transition {{ request()->is('packages*') ? 'bg-indigo-600 text-white' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 11.25v8.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5v-8.25M12 4.875A2.625 2.625 0 109.375 7.5H12m0-2.625V7.5m0-2.625A2.625 2.625 0 1114.625 7.5H12m0 0V21m-8.625-9.75h18c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125h-18c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                    </svg>
                    <span class="font-medium">Paket Gym</span>
                </a>

                <a href="/transactions"
                    class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-zinc-800 transition {{ request()->is('transactions*') ? 'bg-indigo-600 text-white' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                    </svg>
                    <span class="font-medium">Transaksi</span>
                </a>

                <div class="pt-4 mt-4 border-t border-zinc-800">

                    <a href="{{ route('profile.edit') }}"
                        class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-zinc-800 transition text-zinc-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="font-medium">Profil</span>
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-rose-400 hover:bg-rose-500/10 hover:text-rose-300 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                            </svg>
                            <span class="font-medium">Keluar</span>
                        </button>
                    </form>
                </div>

            </nav>
        </aside>

        <!-- MAIN CONTENT -->
        <div class="flex-1 flex flex-col w-full lg:ml-64">

            <!-- TOP BAR -->
            <div class="bg-zinc-900 border-b border-zinc-800 p-4 flex items-center shadow-lg sticky top-0 z-30">

                <!-- HAMBURGER (Mobile Only) -->
                <button @click="open = !open" class="text-zinc-200 mr-4 lg:hidden hover:text-white transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>

                <!-- HOME / DASHBOARD LINK -->
                <a href="/dashboard" class="flex items-center hover:opacity-80 transition">
                    <x-application-logo class="w-8 h-8 text-indigo-500 drop-shadow-md" />
                </a>

                <!-- PAGE TITLE -->
                <h2 class="text-xl font-semibold ml-4 text-zinc-100">
                    @yield('title')
                </h2>
            </div>

            <!-- CONTENT -->
            <main class="bg-zinc-950">
                {{ $slot }}
            </main>

        </div>

    </div>

</body>

</html>