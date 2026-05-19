@section('title', 'Tambah Transaksi')

<x-app-layout>

<div class="p-6 bg-gray-900 min-h-screen text-white">

    <div class="max-w-xl mx-auto bg-gray-800 p-6 rounded-xl shadow">

        <h2 class="text-2xl font-bold mb-4">Tambah Transaksi</h2>

        <a href="{{ route('transactions.index') }}"
           class="mb-4 inline-block px-3 py-1.5 bg-gray-700 text-white rounded hover:bg-gray-600 transition">
            ← Kembali
        </a>

        <form action="{{ route('transactions.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="text-gray-300">Pilih Member</label>
                <select name="member_id"
                        class="w-full bg-gray-900 border border-gray-600 text-white p-2 rounded focus:ring-2 focus:ring-gray-500">
                    <option value="">-- Pilih Member --</option>
                    @foreach($members as $member)
                        <option value="{{ $member->id }}">
                            {{ $member->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="text-gray-300">Pilih Paket</label>
                <select name="package_id"
                        class="w-full bg-gray-900 border border-gray-600 text-white p-2 rounded focus:ring-2 focus:ring-gray-500">
                    <option value="">-- Pilih Paket --</option>
                    @foreach($packages as $package)
                        <option value="{{ $package->id }}">
                            {{ $package->name }} - Rp {{ number_format($package->price, 0, ',', '.') }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit"
                class="bg-green-600 px-4 py-2 rounded text-white hover:bg-green-500 transition">
                Simpan
            </button>

        </form>

    </div>

</div>

</x-app-layout>