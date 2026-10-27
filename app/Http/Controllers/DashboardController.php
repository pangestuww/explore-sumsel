<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Favorit;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // 🌟 KODE SAKTI: Kalau yang login Admin, langsung tendang ke Admin Dashboard 🌟
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        // --- Di bawah ini khusus untuk User Biasa ---

        // Statistik user
        $totalReviews = Review::where('user_id', $user->id)->count();
        $totalFavorit = Favorit::where('user_id', $user->id)->count();

        // Review terakhir user
        $recentReviews = Review::with(['destinasi', 'budaya', 'kuliner']) // Tambahkan budaya & kuliner
            ->where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();


        return view('dashboard', compact('totalReviews', 'totalFavorit', 'recentReviews'));
    }
}
