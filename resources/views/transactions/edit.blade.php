@section('title', 'Edit Transaksi')

<x-app-layout>

    <div class="p-6 space-y-6 relative overflow-hidden">
        <div class="absolute top-[-10%] right-[-5%] w-[400px] h-[400px] bg-cyan-600/5 rounded-full blur-[120px] pointer-events-none z-0"></div>

        <div class="max-w-xl mx-auto bg-zinc-900 border border-zinc-800 shadow-2xl rounded-2xl overflow-hidden relative z-10">
            
            <div class="p-6 sm:p-8">
                <div class="mb-6">
                    <h2 class="text-xl font-bold text-white tracking-tight">Edit Transaksi</h2>
                    <p class="text-xs text-zinc-500 mt-1">Ubah data transaksi member yang sudah tercatat.</p>
                </div>

                @if ($errors->any())
                <div class="bg-rose-500/10 border border-rose-500/20 text-rose-455 p-4 mb-6 rounded-xl text-sm font-semibold">
                    <ul class="space-y-1">
                        @foreach ($errors->all() as $error)
                        <li class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                            {{ $error }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('transactions.update', $transaction) }}" method="POST" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-zinc-400 uppercase tracking-wider">Pilih Member</label>
                        <div class="relative">
                            <select name="member_id" required
                                    class="w-full bg-zinc-950/65 border border-zinc-800 text-zinc-200 px-4 py-3 rounded-xl focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 appearance-none cursor-pointer transition">
                                <option value="" class="bg-zinc-900 text-zinc-500">-- Pilih Member --</option>
                                @foreach($members as $member)
                                    <option value="{{ $member->id }}" {{ $transaction->member_id == $member->id ? 'selected' : '' }} class="bg-zinc-900 text-zinc-200">
                                        {{ $member->name }} ({{ $member->phone }})
                                    </option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-zinc-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-zinc-400 uppercase tracking-wider">Pilih Paket Gym</label>
                        <div class="relative">
                            <select name="package_id" required
                                    class="w-full bg-zinc-950/65 border border-zinc-800 text-zinc-200 px-4 py-3 rounded-xl focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 appearance-none cursor-pointer transition">
                                <option value="" class="bg-zinc-900 text-zinc-500">-- Pilih Paket --</option>
                                @foreach($packages as $package)
                                    <option value="{{ $package->id }}" {{ $transaction->package_id == $package->id ? 'selected' : '' }} class="bg-zinc-900 text-zinc-200">
                                        {{ $package->name }} ({{ $package->duration }} Hari) - Rp {{ number_format($package->price, 0, ',', '.') }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-zinc-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-zinc-400 uppercase tracking-wider">Tanggal Mulai</label>
                        <input type="date" name="start_date" required value="{{ $transaction->start_date }}"
                            class="w-full bg-zinc-950/60 border border-zinc-800 text-zinc-200 px-4 py-3 rounded-xl focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition">
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-zinc-400 uppercase tracking-wider">Tanggal Selesai</label>
                        <input type="date" name="end_date" required value="{{ $transaction->end_date }}"
                            class="w-full bg-zinc-950/60 border border-zinc-800 text-zinc-200 px-4 py-3 rounded-xl focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition">
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-zinc-400 uppercase tracking-wider">Harga</label>
                        <div class="relative flex items-center">
                            <span class="absolute left-4 text-zinc-500 font-bold text-sm">Rp</span>
                            <input type="number" name="price" required placeholder="0" min="0" value="{{ $transaction->price }}"
                                class="pl-11 w-full bg-zinc-950/60 border border-zinc-800 text-zinc-200 pr-4 py-3 rounded-xl focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 placeholder-zinc-600 transition">
                        </div>
                    </div>

                    <div class="flex items-center justify-between pt-4 border-t border-zinc-800 mt-6 gap-3">
                        <a href="{{ route('transactions.index') }}"
                            class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl border border-zinc-800 bg-zinc-900 text-zinc-400 hover:text-white hover:bg-zinc-850 transition font-semibold text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                            </svg>
                            <span>Kembali</span>
                        </a>

                        <button type="submit"
                            class="inline-flex items-center gap-2 bg-gradient-to-r from-indigo-500 to-violet-600 hover:from-indigo-650 hover:to-violet-750 text-white px-5 py-2.5 rounded-xl font-semibold shadow-lg shadow-indigo-500/20 hover:shadow-indigo-500/30 transition duration-200">
                            <span>Update Transaksi</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </button>
                    </div>

                </form>
            </div>

        </div>

    </div>

</x-app-layout>
