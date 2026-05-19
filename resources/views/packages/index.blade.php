@section('title', 'Data Paket')

<x-app-layout>

<div class="p-6 bg-gray-900 min-h-screen text-white">

    <!-- TOP -->
    <div class="flex items-center justify-between mb-6">

        <div class="flex items-center gap-4">
            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-2 px-3 py-1.5 border border-gray-600 rounded-md bg-gray-800 text-gray-300 hover:bg-gray-700 transition">
                ← Back
            </a>

            <h2 class="text-2xl font-bold">
                Data Paket
            </h2>
        </div>

        <a href="/packages/create"
           class="bg-gray-800 border border-gray-600 text-white px-4 py-2 rounded shadow hover:bg-gray-700 transition">
            + Tambah Paket
        </a>

    </div>

    <!-- ALERT -->
    @if(session('success'))
        <div class="bg-green-600 text-white p-3 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- TABLE -->
    <div class="bg-gray-800 shadow rounded-xl overflow-hidden">

        <table class="w-full text-left">

            <thead class="bg-gray-700 text-gray-300 text-sm">
                <tr>
                    <th class="p-3">No</th>
                    <th class="p-3">Nama Paket</th>
                    <th class="p-3">Durasi</th>
                    <th class="p-3">Harga</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($packages as $index => $package)
                    <tr class="border-t border-gray-700 hover:bg-gray-700 transition">

                        <td class="p-3">{{ $index + 1 }}</td>

                        <td class="p-3 font-medium">
                            {{ $package->name }}
                        </td>

                        <td class="p-3">
                            {{ $package->duration }} hari
                        </td>

                        <td class="p-3">
                            Rp {{ number_format($package->price) }}
                        </td>

                        <td class="p-3 flex justify-center gap-2">

                            <!-- EDIT -->
                            <a href="/packages/{{ $package->id }}/edit"
                               class="px-3 py-1 text-sm bg-blue-600 text-white rounded hover:bg-blue-500 transition">
                                Edit
                            </a>

                            <!-- DELETE -->
                            <form action="/packages/{{ $package->id }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button onclick="return confirm('Yakin hapus paket?')"
                                    class="px-3 py-1 text-sm bg-red-600 text-white rounded hover:bg-red-500 transition">
                                    Hapus
                                </button>
                            </form>

                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center p-4 text-gray-400">
                            Belum ada paket
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>

    </div>

</div>

</x-app-layout>