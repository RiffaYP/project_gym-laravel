@section('title', 'Data Transaksi')
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-100">
            Data Transaksi
        </h2>
    </x-slot>

    <div class="p-6 bg-gray-900 min-h-screen text-gray-100">

        <div class="flex items-center justify-between mb-6">

            <div class="flex items-center gap-4">
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-2 px-3 py-1.5 border border-gray-600 rounded-md bg-gray-800 text-gray-300 hover:bg-gray-700 transition">
                    ← Back
                </a>

                <h2 class="text-2xl font-bold">
                    Data Transaksi
                </h2>
            </div>

            <a href="{{ route('transactions.create') }}"
               class="bg-gray-800 border border-gray-600 px-4 py-2 rounded shadow hover:bg-gray-700 text-gray-100">
                + Tambah Transaksi
            </a>

        </div>

        <!-- Alert -->
        @if(session('success'))
            <div class="bg-green-900 text-green-200 p-2 mb-4 rounded border border-green-700">
                {{ session('success') }}
            </div>
        @endif

<div class="mb-6 flex items-center justify-between gap-4">
    <form action="{{ route('transactions.index') }}" method="GET" class="flex-1 max-w-md relative group">
        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
            <svg class="h-5 w-5 text-gray-500 group-focus-within:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </span>
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari member..." 
               class="block w-full pl-10 pr-3 py-2.5 bg-gray-800 border border-gray-700 text-gray-100 rounded-xl leading-5 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition sm:text-sm shadow-sm">
    </form>

    <div class="flex items-center gap-2" x-data="{ open: false }">
        
        @if(request('search') || request('filter'))
            <a href="{{ route('transactions.index') }}" class="text-xs text-gray-400 hover:text-white transition px-2">Reset</a>
        @endif

        <div class="relative">
            <button @click="open = !open" 
                    :class="open ? 'bg-indigo-600 text-white' : 'bg-gray-800 text-gray-400 hover:bg-gray-700'"
                    class="p-2.5 rounded-xl border border-gray-700 shadow-sm transition flex items-center gap-2 font-medium text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                </svg>
                <span class="hidden md:block text-xs uppercase tracking-widest">Filter</span>
            </button>

            <div x-show="open" 
                 @click.away="open = false"
                 x-transition:enter="transition ease-out duration-100"
                 x-transition:enter-start="transform opacity-0 scale-95"
                 x-transition:enter-end="transform opacity-100 scale-100"
                 class="absolute right-0 mt-2 w-56 rounded-xl bg-gray-800 border border-gray-700 shadow-2xl z-50 overflow-hidden">
                
                <form action="{{ route('transactions.index') }}" method="GET">
                    <input type="hidden" name="search" value="{{ request('search') }}">
                    
                    <div class="p-2 space-y-1">
                        <button type="submit" name="filter" value="" class="w-full text-left px-4 py-2 text-sm rounded-lg hover:bg-gray-700 transition {{ request('filter') == '' ? 'bg-indigo-600/20 text-indigo-400 font-bold' : 'text-gray-300' }}">Semua Data</button>
                        <button type="submit" name="filter" value="active" class="w-full text-left px-4 py-2 text-sm rounded-lg hover:bg-gray-700 transition {{ request('filter') == 'active' ? 'bg-emerald-600/20 text-emerald-400 font-bold' : 'text-gray-300' }}">Masih Aktif</button>
                        <button type="submit" name="filter" value="expired_soon" class="w-full text-left px-4 py-2 text-sm rounded-lg hover:bg-gray-700 transition {{ request('filter') == 'expired_soon' ? 'bg-amber-600/20 text-amber-400 font-bold' : 'text-gray-300' }}">Mendekati Expired</button>
                        <button type="submit" name="filter" value="expired" class="w-full text-left px-4 py-2 text-sm rounded-lg hover:bg-gray-700 transition {{ request('filter') == 'expired' ? 'bg-red-600/20 text-red-400 font-bold' : 'text-gray-300' }}">Sudah Expired</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

        <!-- Table -->
        <div class="bg-gray-800 shadow-md rounded-lg overflow-hidden border border-gray-700">

            <table class="w-full text-left text-gray-100">

                <thead class="bg-gray-700 text-gray-300 text-sm">
                    <tr>
                        <th class="p-3">No</th>
                        <th class="p-3">Member</th>
                        <th class="p-3">Paket</th>
                            <th class="p-3">Harga</th>
                            <th class="p-3">Mulai</th>
                            <th class="p-3">Selesai</th>
                            <th class="p-3">Status</th>
                            <th class="p-3 text-center">Aksi</th>
                        </tr>
                </thead>

                <tbody>
                    @forelse($transactions as $index => $trx)
                        <tr class="border-t border-gray-700 hover:bg-gray-700/50">

                            <td class="p-3">{{ $index + 1 }}</td>

                            <td class="p-3 font-medium">
                                {{ $trx->member->name }}
                            </td>

                            <td class="p-3">
                                {{ $trx->package->name }}
                            </td>

                            <td class="p-3">
                                Rp {{ number_format($trx->price) }}
                            </td>

                            <td class="p-3">
                                {{ $trx->start_date }}
                            </td>

                            <td class="p-3">
                                {{ $trx->end_date }}
                            </td>

                            <td class="p-3">
                                @if(\Carbon\Carbon::now()->lessThanOrEqualTo($trx->end_date))
                                    <span class="bg-green-900 text-green-200 px-2 py-1 rounded text-xs border border-green-700">
                                        Aktif
                                    </span>
                                @else
                                    <span class="bg-red-900 text-red-200 px-2 py-1 rounded text-xs border border-red-700">
                                        Expired
                                    </span>
                                @endif
                            </td>

                            <td class="p-3">
                                <div class="flex justify-center items-center gap-2">
                                    <!-- EDIT -->
                                    <a href="{{ route('transactions.edit', $trx) }}"
                                       class="flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-500/10 text-indigo-400 hover:bg-indigo-500 hover:text-white transition duration-200"
                                       title="Edit Data">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                        </svg>
                                    </a>

                                    <!-- DELETE -->
                                    <form action="{{ route('transactions.destroy', $trx) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')"
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
                            <td colspan="8" class="text-center p-4 text-gray-400">
                                Belum ada transaksi
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>

    </div>
</x-app-layout>