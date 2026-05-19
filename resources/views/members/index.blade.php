@section('title', 'Data Member')

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
                Data Member
            </h2>
        </div>

        <a href="/members/create"
           class="bg-gray-800 border border-gray-600 text-white px-4 py-2 rounded shadow hover:bg-gray-700 transition">
            + Tambah Member
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
                    <th class="p-3">Nama</th>
                    <th class="p-3">No HP</th>
                    <th class="p-3">Alamat</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($members as $index => $member)
                    <tr class="border-t border-gray-700 hover:bg-gray-700 transition">

                        <td class="p-3">{{ $index + 1 }}</td>

                        <td class="p-3 font-medium">
                            {{ $member->name }}
                        </td>

                        <td class="p-3">
                            {{ $member->phone }}
                        </td>

                        <td class="p-3">
                            {{ $member->address }}
                        </td>

                        <td class="p-3 flex justify-center gap-2">

                            <!-- EDIT -->
                            <a href="/members/{{ $member->id }}/edit"
                               class="px-3 py-1 text-sm bg-blue-600 text-white rounded hover:bg-blue-500 transition">
                                Edit
                            </a>

                            <!-- DELETE -->
                            <form action="/members/{{ $member->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button
                                    onclick="return confirm('Yakin hapus data?')"
                                    class="px-3 py-1 text-sm bg-red-600 text-white rounded hover:bg-red-500 transition">
                                    Hapus
                                </button>
                            </form>

                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center p-4 text-gray-400">
                            Belum ada data member
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>

    </div>

</div>

</x-app-layout>