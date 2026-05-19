@section('title', 'Tambah Paket')

<x-app-layout>

<div class="p-6 bg-gray-900 min-h-screen text-white">

    <div class="max-w-xl mx-auto bg-gray-800 p-6 rounded-xl shadow">

        <h2 class="text-2xl font-bold mb-4">Tambah Paket</h2>

        <a href="{{ route('packages.index') }}"
           class="mb-4 inline-block px-3 py-1.5 bg-gray-700 text-white rounded hover:bg-gray-600 transition">
            ← Back
        </a>

        <form action="/packages" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="text-gray-300">Nama Paket</label>
                <input type="text" name="name"
                    class="w-full bg-gray-900 border border-gray-600 text-white p-2 rounded focus:ring-2 focus:ring-gray-500">
            </div>

            <div>
                <label class="text-gray-300">Durasi (hari)</label>
                <input type="number" name="duration"
                    class="w-full bg-gray-900 border border-gray-600 text-white p-2 rounded focus:ring-2 focus:ring-gray-500">
            </div>

            <div>
                <label class="text-gray-300">Harga</label>
                <input type="number" name="price"
                    class="w-full bg-gray-900 border border-gray-600 text-white p-2 rounded focus:ring-2 focus:ring-gray-500">
            </div>

            <button
                class="bg-green-600 px-4 py-2 rounded text-white hover:bg-green-500 transition">
                Simpan
            </button>

        </form>

    </div>

</div>

</x-app-layout>