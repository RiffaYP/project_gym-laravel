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
            class="fixed inset-y-0 left-0 w-64 bg-gray-800 p-6 space-y-6 z-50 transform transition-transform duration-300"
            :class="open ? 'translate-x-0' : '-translate-x-full'">

            <h1 class="text-2xl font-bold flex items-center gap-3">
                <x-application-logo class="w-8 h-8 text-indigo-500 drop-shadow-md" />
                Gym App
            </h1>

            <nav class="space-y-2 text-gray-300">

                <a href="/dashboard"
                    class="block px-4 py-2 rounded hover:bg-gray-700 transition">
                    📊 Dashboard
                </a>

                <a href="/members"
                    class="block px-4 py-2 rounded hover:bg-gray-700 transition">
                    👤 Data Member
                </a>

                <a href="/packages"
                    class="block px-4 py-2 rounded hover:bg-gray-700 transition">
                    📦 Paket Gym
                </a>

                <a href="/transactions"
                    class="block px-4 py-2 rounded hover:bg-gray-700 transition">
                    💳 Transaksi
                </a>

                <div class="pt-4 mt-4 border-t border-gray-700">

                    <a href="{{ route('profile.edit') }}"
                        class="block px-4 py-2 rounded hover:bg-gray-700 transition text-gray-300">
                        Profil
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full text-left px-4 py-2 rounded text-red-400 hover:bg-red-500/10 hover:text-red-500 transition">
                            Keluar
                        </button>
                    </form>
                </div>

            </nav>
        </aside>

        <!-- MAIN CONTENT -->
        <div class="flex-1 flex flex-col w-full">

            <!-- TOP BAR -->
            <div class="bg-gray-800 p-4 flex items-center shadow">

                <!-- HAMBURGER -->
                <button @click="open = !open" class="text-2xl mr-4">
                    ☰
                </button>

                <!-- HOME / DASHBOARD LINK -->
                <a href="/dashboard" class="flex items-center hover:opacity-80 transition">
                    <x-application-logo class="w-8 h-8 text-indigo-500 drop-shadow-md" />
                </a>

                <!-- PAGE TITLE -->
                <h2 class="text-xl font-semibold ml-4 text-gray-300">
                    @yield('title')
                </h2>
            </div>

            <!-- CONTENT -->
            <main class="p-6">
                {{ $slot }}
            </main>

        </div>

    </div>

</body>

</html>