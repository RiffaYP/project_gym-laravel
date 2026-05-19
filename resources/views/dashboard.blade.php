@section('title', 'Dashboard')

<x-app-layout>

    <div class="p-6 bg-gray-900 min-h-screen space-y-6 text-white relative overflow-hidden">
        <!-- Ambient Background Glow -->
        <div class="absolute top-[-10%] right-[-5%] w-[400px] h-[400px] bg-indigo-600/10 rounded-full blur-[120px] pointer-events-none z-0"></div>
        <div class="absolute bottom-[-10%] left-[-5%] w-[400px] h-[400px] bg-indigo-600/5 rounded-full blur-[100px] pointer-events-none z-0"></div>

        <div class="mb-8 relative z-10">
            <h2 class="text-2xl font-bold text-gray-100">
                🏋️‍♂️💪
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 relative z-10">
            <div class="bg-gradient-to-br from-gray-800 to-gray-800/50 border-t-4 border-indigo-500 p-6 rounded-xl shadow-lg hover:shadow-indigo-500/10 hover:-translate-y-1 transition duration-300">
                <p class="text-gray-300 font-medium text-sm uppercase tracking-wider">Total Member</p>
                <h2 class="text-4xl font-extrabold mt-3 text-indigo-400">{{ $totalMember }}</h2>
            </div>

            <div class="bg-gradient-to-br from-gray-800 to-gray-800/50 border-t-4 border-emerald-500 p-6 rounded-xl shadow-lg hover:shadow-emerald-500/10 hover:-translate-y-1 transition duration-300">
                <p class="text-gray-300 font-medium text-sm uppercase tracking-wider">Paket Aktif</p>
                <h2 class="text-4xl font-extrabold mt-3 text-emerald-400">{{ $totalPackage }}</h2>
            </div>

            <div class="bg-gradient-to-br from-gray-800 to-gray-800/50 border-t-4 border-cyan-500 p-6 rounded-xl shadow-lg hover:shadow-cyan-500/10 hover:-translate-y-1 transition duration-300">
                <p class="text-gray-300 font-medium text-sm uppercase tracking-wider">Total Transaksi</p>
                <h2 class="text-4xl font-extrabold mt-3 text-cyan-400">{{ $totalTransaction }}</h2>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8 relative z-10">

            <a href="/members" class="group bg-gray-800 border border-gray-700 p-6 rounded-xl shadow hover:bg-gray-750 hover:border-indigo-500/50 hover:-translate-y-1 transition duration-300 flex items-center gap-5">
                <div class="p-3 bg-gray-900 rounded-lg group-hover:bg-indigo-500/20 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400 group-hover:text-indigo-400 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5V4H2v16h5m10 0v-6a4 4 0 00-8 0v6m8 0H7" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-semibold text-lg text-white group-hover:text-indigo-300 transition">Data Member</h4>
                    <p class="text-sm text-gray-400">Kelola member gym</p>
                </div>
            </a>

            <a href="/packages" class="group bg-gray-800 border border-gray-700 p-6 rounded-xl shadow hover:bg-gray-750 hover:border-emerald-500/50 hover:-translate-y-1 transition duration-300 flex items-center gap-5">
                <div class="p-3 bg-gray-900 rounded-lg group-hover:bg-emerald-500/20 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400 group-hover:text-emerald-400 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-semibold text-lg text-white group-hover:text-emerald-300 transition">Paket Gym</h4>
                    <p class="text-sm text-gray-400">Kelola paket</p>
                </div>
            </a>

            <a href="/transactions" class="group bg-gray-800 border border-gray-700 p-6 rounded-xl shadow hover:bg-gray-750 hover:border-cyan-500/50 hover:-translate-y-1 transition duration-300 flex items-center gap-5">
                <div class="p-3 bg-gray-900 rounded-lg group-hover:bg-cyan-500/20 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400 group-hover:text-cyan-400 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-semibold text-lg text-white group-hover:text-cyan-300 transition">Transaksi</h4>
                    <p class="text-sm text-gray-400">Kelola transaksi</p>
                </div>
            </a>

        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8 relative z-10">

            <div class="bg-gray-800 p-6 rounded-xl shadow-lg border border-gray-700">
                <h3 class="font-semibold text-lg mb-5 text-gray-200">Member Terbaru</h3>
                <ul class="space-y-4">
                    @forelse($recentMembers as $member)
                    <li class="flex justify-between items-center border-b border-gray-700/50 pb-3">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-indigo-500/20 flex items-center justify-center text-indigo-400 font-bold text-sm">
                                {{ substr($member->name, 0, 1) }}
                            </div>
                            <span class="font-medium text-gray-300">{{ $member->name }}</span>
                        </div>
                        <span class="text-xs bg-gray-900 text-gray-400 px-2 py-1 rounded-md border border-gray-700">
                            {{ $member->created_at->format('d M Y') }}
                        </span>
                    </li>
                    @empty
                    <p class="text-gray-500 text-center py-4">Belum ada data member</p>
                    @endforelse
                </ul>
            </div>

            <div class="bg-gray-800 p-6 rounded-xl shadow-lg border border-gray-700 flex flex-col">
                <h3 class="font-semibold text-lg mb-5 text-gray-200">Transaksi Terakhir</h3>

                @if($todayTransactions->isNotEmpty())
                <div class="space-y-4 mb-4">
                    @foreach($todayTransactions as $transaction)
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-base font-bold text-white mb-1">
                                {{ $transaction->member->name }}
                            </p>
                            <span class="inline-block bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 px-2 py-0.5 rounded text-xs font-medium">
                                {{ $transaction->package->name }}
                            </span>
                        </div>
                        <div class="text-right flex flex-col items-end">
                            <span class="text-xs bg-gray-900 text-gray-400 px-2 py-1 rounded-md border border-gray-700 mb-1">
                                {{ \Carbon\Carbon::parse($transaction->start_date)->format('d M Y') }}
                            </span>
                            <span class="text-sm font-bold text-gray-300">
                                Rp {{ number_format($transaction->price, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="flex justify-between items-end border-t border-gray-700 pt-4 mt-auto">
                    <p class="text-gray-400 text-sm">Total Pembayaran</p>
                    <p class="text-2xl font-bold text-white">
                        Rp {{ number_format($todayTotalPayment, 0, ',', '.') }}
                    </p>
                </div>
                @else
                <p class="text-gray-500 text-center py-4 my-auto">tidak ada transaksi hari ini</p>
                @endif
            </div>

        </div>

        <div class="bg-gray-800 p-6 rounded-xl shadow-lg border border-gray-700 mt-6 relative z-10">
            <h3 class="font-semibold text-lg mb-4 text-gray-200">Statistik Transaksi Bulanan</h3>
            <div class="relative h-72 w-full">
                <canvas id="chart"
                    data-labels="{{ json_encode($chartData->pluck('date')) }}"
                    data-totals="{{ json_encode($chartData->pluck('total')) }}">
                </canvas>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('chart');
        const labels = JSON.parse(ctx.getAttribute('data-labels'));
        const data = JSON.parse(ctx.getAttribute('data-totals'));

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Transaksi',
                    data: data,
                    borderColor: '#6366f1', // Warna garis Indigo
                    backgroundColor: 'rgba(99, 102, 241, 0.15)', // Fill transparan di bawah garis
                    fill: true,
                    borderWidth: 3,
                    tension: 0.4, // Membuat garis lebih melengkung halus (tidak kaku)
                    pointBackgroundColor: '#1f2937',
                    pointBorderColor: '#6366f1',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    pointHoverBackgroundColor: '#6366f1'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    } // Menyembunyikan label legend agar lebih bersih
                },
                scales: {
                    x: {
                        grid: {
                            color: 'rgba(75, 85, 99, 0.2)'
                        },
                        ticks: {
                            color: '#9ca3af'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(75, 85, 99, 0.2)'
                        },
                        ticks: {
                            color: '#9ca3af',
                            stepSize: 1,
                            precision: 0
                        }
                    }
                }
            }
        });
    </script>

</x-app-layout>