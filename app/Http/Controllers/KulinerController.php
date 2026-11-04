<?php

namespace App\Http\Controllers;

use App\Models\Kuliner;
use App\Models\Kabupaten;
use App\Models\Provinsi;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KulinerController extends Controller
{
    public function index(Request $request)
    {
        $query = Kuliner::with(['kabupaten.provinsi']);

        if ($request->filled('q')) {
            $query->where('nama', 'like', '%' . $request->q . '%');
        }

        if ($request->filled('jenis')) {
            $query->where('jenis', $request->jenis);
        }

        if ($request->filled('provinsi')) {
            $query->whereHas('kabupaten', function ($q) use ($request) {
                $q->where('provinsi_id', $request->provinsi);
            });
        }

        if ($request->filled('kabupaten')) {
            $query->where('kabupaten_id', $request->kabupaten);
        }

        $kuliners = $query->orderBy('nama')->paginate(9)->withQueryString();

        $provinsis = Provinsi::orderBy('nama')->get();
        $kabupatens = Kabupaten::orderBy('nama')->get();

        return view('kuliner.index', compact('kuliners', 'provinsis', 'kabupatens'));
    }

    public function show(Request $request, $slug)
    {
        $kuliner = Kuliner::with('kabupaten.provinsi')->where('slug', $slug)->firstOrFail();

        $isFavorited = false;
        $user = $request->user();

        if ($user) {
            $isFavorited = \App\Models\Favorit::where('user_id', $user->id)
                ->where('kuliner_id', $kuliner->id)
                ->exists();
        }
        
        // Ambil semua ulasan untuk ditampilkan
        $reviews = $kuliner->reviews()->with('user')->latest()->get();

        // 🌟 Cek apakah user sudah pernah ulas
        $userReview = null;
        if (Auth::check()) {
            $userReview = Review::where('user_id', Auth::id())
                                ->where('kuliner_id', $kuliner->id)
                                ->first();
        }

        // Ambil foto dari ulasan untuk Galeri di Sidebar
        $fotoUlasan = Review::where('kuliner_id', $kuliner->id)
            ->whereNotNull('foto')
            ->latest()
            ->take(6)
            ->get();

        return view('kuliner.show', compact('kuliner', 'isFavorited', 'reviews', 'fotoUlasan', 'userReview'));
    }
}