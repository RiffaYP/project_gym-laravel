@section('title', 'Edit Member')

<x-app-layout>

<div class="p-6 bg-gray-900 min-h-screen text-white">

    <div class="max-w-xl mx-auto bg-gray-800 shadow rounded-xl p-6">

        <h2 class="text-2xl font-bold mb-4">Edit Member</h2>

        {{-- ERROR --}}
        @if ($errors->any())
            <div class="bg-red-600 text-white p-3 mb-4 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/members/{{ $member->id }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-gray-300 mb-1">Nama</label>
                <input type="text" name="name" value="{{ $member->name }}"
                    class="w-full bg-gray-900 border border-gray-600 text-white p-2 rounded focus:outline-none focus:ring-2 focus:ring-gray-500">
            </div>

            <div>
                <label class="block text-gray-300 mb-1">Phone</label>
                <input type="text" name="phone" value="{{ $member->phone }}"
                    class="w-full bg-gray-900 border border-gray-600 text-white p-2 rounded focus:outline-none focus:ring-2 focus:ring-gray-500">
            </div>

            <div>
                <label class="block text-gray-300 mb-1">Address</label>
                <input type="text" name="address" value="{{ $member->address }}"
                    class="w-full bg-gray-900 border border-gray-600 text-white p-2 rounded focus:outline-none focus:ring-2 focus:ring-gray-500">
            </div>

            <div class="flex justify-between">

                <a href="/members"
                   class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-600 transition">
                    ← Kembali
                </a>

                <button
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-500 transition">
                    Update
                </button>

            </div>

        </form>

    </div>

</div>

</x-app-layout>