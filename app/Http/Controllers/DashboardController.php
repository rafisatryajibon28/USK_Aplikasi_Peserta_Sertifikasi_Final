<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Skema;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Data ringkasan (sama untuk admin & user)
        $totalPeserta = Peserta::count();
        $totalSkema   = Skema::count();
        $totalUser    = User::count();

        // Ambil 5 peserta terbaru untuk ditampilkan di dashboard
        $pesertaTerbaru = Peserta::with('skema')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('dashboard', compact(
            'user',
            'totalPeserta',
            'totalSkema',
            'totalUser',
            'pesertaTerbaru'
        ));
    }
}
