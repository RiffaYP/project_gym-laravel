<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Package;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $chartData = Transaction::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('count(*) as total')
        )
        ->groupBy('date')
        ->orderBy('date')
        ->get();

        return view('dashboard', [
            'totalMember' => Member::count(),
            'totalPackage' => Package::count(),
            'totalTransaction' => Transaction::count(),

            'recentMembers' => Member::latest()->take(5)->get(),
            'recentTransactions' => Transaction::latest()->take(5)->get(),

            'chartData' => $chartData,

            // 🔥 TAMBAHAN BARU
            'todayTransactions' => Transaction::with(['member', 'package'])
                ->whereDate('created_at', today())
                ->latest()
                ->take(3)
                ->get(),
            'todayTotalPayment' => Transaction::whereDate('created_at', today())->sum('price')
        ]);
    }
}