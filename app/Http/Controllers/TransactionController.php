<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Package;
use Carbon\Carbon;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{
    $query = Transaction::with(['member', 'package']);

    // Logika Pencarian Nama Member
    if ($request->has('search') && $request->search != '') {
        $query->whereHas('member', function($q) use ($request) {
            $q->where('name', 'like', '%' . $request->search . '%');
        });
    }

    // Logika Filter Status
    if ($request->filter == 'active') {
        $query->where('end_date', '>=', now())
              ->orderBy('end_date', 'asc');
    } elseif ($request->filter == 'expired') {
        $query->where('end_date', '<', now())
              ->orderBy('end_date', 'desc');
    } elseif ($request->filter == 'expired_soon') {
        $query->where('end_date', '>=', now())
              ->where('end_date', '<=', now()->addDays(7))
              ->orderBy('end_date', 'asc');
    } else {
        $query->latest();
    }

    $transactions = $query->get();

    return view('transactions.index', compact('transactions'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $members = Member::all();
        $packages = Package::all();
        return view('transactions.create', compact('members', 'packages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ambil package yang dipilih
        $package = Package::findOrFail($request->package_id);

        // tanggal mulai
        $start = Carbon::now();

         // hitung tanggal selesai (berdasarkan durasi paket)
        $end = $start->copy()->addDays($package->duration);

    // simpan ke database
    Transaction::create([
        'member_id' => $request->member_id,
        'package_id' => $request->package_id,
        'price' => $package->price,
        'start_date' => $start,
        'end_date' => $end,
    ]);

    return redirect()->route('transactions.index')
        ->with('success', 'Transaksi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
