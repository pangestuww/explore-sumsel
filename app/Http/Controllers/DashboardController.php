<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Favorit;
use App\Models\Destinasi; // 🌟 Tambahan Baru
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Kalau yang login Admin, langsung tendang ke Admin Dashboard
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        // --- Khusus untuk User Biasa ---

        // Statistik user
        $totalReviews = Review::where('user_id', $user->id)->count();
        $totalFavorit = Favorit::where('user_id', $user->id)->count();

        // Review terakhir user
        $recentReviews = Review::with(['destinasi', 'budaya', 'kuliner'])
            ->where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        // Ambil data favorit user beserta relasinya
        $favorites = Favorit::with(['destinasi', 'budaya', 'kuliner'])
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        // 🌟 TAMBAHAN BARU: Ambil semua data destinasi untuk Dropdown Itinerary 🌟
        $destinasis = Destinasi::orderBy('nama', 'asc')->get();

        // Kirim $destinasis ke view
        return view('dashboard', compact('totalReviews', 'totalFavorit', 'recentReviews', 'favorites', 'destinasis'));
    }
}
