@section('title', 'Data Paket')

<x-app-layout>

<div x-data="{ searchQuery: '' }" class="p-6 space-y-6 relative overflow-hidden">
    <!-- Ambient Background Glow Effects -->
    <div class="absolute top-[-10%] right-[-5%] w-[400px] h-[400px] bg-emerald-600/5 rounded-full blur-[120px] pointer-events-none z-0"></div>

    <!-- TOP HEADER -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 relative z-10">
        <div class="flex items-center gap-3">
            <a href="{{ route('dashboard') }}"
               class="flex items-center justify-center w-10 h-10 border border-zinc-800 rounded-xl bg-zinc-900 text-zinc-400 hover:text-white hover:bg-zinc-800 hover:border-zinc-700 transition duration-200 shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
            </a>
            <div>
                <h2 class="text-2xl font-extrabold text-white tracking-tight">Data Paket</h2>
                <p class="text-xs text-zinc-500 mt-0.5">Kelola paket membership dan harga langganan gym.</p>
            </div>
        </div>

        <a href="{{ route('packages.create') }}"
           class="inline-flex items-center gap-2 bg-gradient-to-r from-indigo-500 to-violet-600 hover:from-indigo-650 hover:to-violet-700 text-white px-4 py-2.5 rounded-xl font-semibold shadow-lg shadow-indigo-500/25 hover:shadow-indigo-500/35 hover:-translate-y-0.5 transition duration-250">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            <span>Tambah Paket</span>
        </a>
    </div>

    <!-- ALERT SUCCESS -->
    @if(session('success'))
        <div class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 px-4 py-3.5 rounded-xl flex items-center gap-3 relative z-10 shadow-lg" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5 text-emerald-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="text-sm font-semibold">{{ session('success') }}</span>
        </div>
    @endif

    <!-- SEARCH BAR -->
    <div class="w-full md:max-w-md relative group z-10">
        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
            <svg class="h-4 w-4 text-zinc-500 group-focus-within:text-indigo-400 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </span>
        <input type="text" x-model="searchQuery" placeholder="Cari nama paket, durasi atau harga..." 
               class="block w-full pl-11 pr-4 py-3 bg-zinc-900 border border-zinc-800 text-zinc-100 rounded-xl leading-5 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition text-sm shadow-inner placeholder-zinc-500">
    </div>

    <!-- TABLE CARD -->
    <div class="bg-zinc-900 border border-zinc-800 rounded-2xl overflow-hidden shadow-2xl relative z-10">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-zinc-950 border-b border-zinc-800 text-zinc-400 text-xs font-bold uppercase tracking-wider">
                        <th class="p-4 pl-6 w-16">No</th>
                        <th class="p-4">Nama Paket</th>
                        <th class="p-4">Durasi</th>
                        <th class="p-4">Harga</th>
                        <th class="p-4 text-center w-36">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-800/60">
                    @forelse($packages as $index => $package)
                        <tr x-show="searchQuery === '' || $el.innerText.toLowerCase().includes(searchQuery.toLowerCase())"
                            class="hover:bg-zinc-800/35 transition duration-150 group">
                            <td class="p-4 pl-6 text-zinc-500 text-sm font-semibold">
                                {{ $index + 1 }}
                            </td>
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-emerald-500/15 to-cyan-500/15 border border-emerald-500/25 flex items-center justify-center text-emerald-400 font-bold text-sm shadow-inner group-hover:scale-105 transition duration-200">
                                        {{ substr($package->name, 0, 1) }}
                                    </div>
                                    <span class="font-bold text-zinc-200 text-sm group-hover:text-white transition duration-150">
                                        {{ $package->name }}
                                    </span>
                                </div>
                            </td>
                            <td class="p-4 text-zinc-400 text-sm font-medium">
                                {{ $package->duration }} hari
                            </td>
                            <td class="p-4 text-sm font-extrabold text-white">
                                Rp {{ number_format($package->price, 0, ',', '.') }}
                            </td>
                            <td class="p-4">
                                <div class="flex justify-center items-center gap-2">
                                    <!-- EDIT -->
                                    <a href="{{ route('packages.edit', $package) }}"
                                       class="flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-500/10 text-indigo-400 hover:bg-indigo-500 hover:text-white transition duration-200"
                                       title="Edit Data">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                        </svg>
                                    </a>

                                    <!-- DELETE -->
                                    <form action="{{ route('packages.destroy', $package) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus paket ini?')"
                                            class="flex items-center justify-center w-8 h-8 rounded-lg bg-rose-500/10 text-rose-500 hover:bg-rose-500 hover:text-white transition duration-200"
                                            title="Hapus Data">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center p-8 text-zinc-500">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="w-12 h-12 rounded-full bg-zinc-800 flex items-center justify-center text-zinc-600 mb-3 text-lg">
                                        📦
                                    </div>
                                    <p class="text-sm font-medium">Belum ada paket terdaftar.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

</x-app-layout>