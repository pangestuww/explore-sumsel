<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Favorit;
use App\Models\Destinasi;
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

        // Review terakhir user (UBAH: Urutkan berdasarkan updated_at agar yang baru diedit naik ke atas)
        $recentReviews = Review::with(['destinasi', 'budaya', 'kuliner'])
            ->where('user_id', $user->id)
            ->orderBy('updated_at', 'desc') // <-- Diubah dari latest()
            ->take(5)
            ->get();

        // TAMBAHAN BARU: Ambil SEMUA review user untuk modal "All My Reviews"
        $allReviews = Review::with(['destinasi', 'budaya', 'kuliner'])
            ->where('user_id', $user->id)
            ->orderBy('updated_at', 'desc') // <-- Urutkan berdasarkan updated_at
            ->get();

        // Ambil data favorit user beserta relasinya
        $favorites = Favorit::with(['destinasi', 'budaya', 'kuliner'])
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        // Ambil semua data destinasi untuk Dropdown Itinerary
        $destinasis = Destinasi::orderBy('nama', 'asc')->get();

        // Kirim semua variabel ke view (termasuk $allReviews)
        return view('dashboard', compact('totalReviews', 'totalFavorit', 'recentReviews', 'allReviews', 'favorites', 'destinasis'));
    }
}
