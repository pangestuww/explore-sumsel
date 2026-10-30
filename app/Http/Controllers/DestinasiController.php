<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use App\Models\Kabupaten;
use App\Models\Provinsi;
use App\Models\Favorit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DestinasiController extends Controller
{
    public function index(Request $request)
    {
        // 🌟 TAMBAHKAN 'reviews' DI DALAM WITH 🌟
        $query = Destinasi::with(['kabupaten.provinsi', 'reviews']);

        if ($request->filled('provinsi')) {
            $query->whereHas('kabupaten', function ($q) use ($request) {
                $q->where('provinsi_id', $request->provinsi);
            });
        }

        if ($request->filled('kabupaten')) {
            $query->where('kabupaten_id', $request->kabupaten);
        }

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        if ($request->filled('jenis')) {
            $query->where('jenis', $request->jenis);
        }

        if ($request->filled('q')) {
            $query->where('nama', 'like', '%' . $request->q . '%');
        }

        $destinasis = $query->orderBy('rating', 'desc')->paginate(9)->withQueryString();

        $provinsis = Provinsi::orderBy('nama')->get();
        $kabupatens = Kabupaten::orderBy('nama')->get();

        return view('destinasi.index', compact('destinasis', 'provinsis', 'kabupatens'));
    }

    public function show($slug)
    {
        $destinasi = Destinasi::with(['kabupaten.provinsi', 'reviews.user'])
            ->where('slug', $slug)
            ->firstOrFail();

        $terkait = Destinasi::with('kabupaten')
            ->where('kabupaten_id', $destinasi->kabupaten_id)
            ->where('id', '!=', $destinasi->id)
            ->take(3)
            ->get();

        if ($terkait->isEmpty()) {
            $terkait = Destinasi::with('kabupaten')
                ->where('id', '!=', $destinasi->id)
                ->inRandomOrder()
                ->take(3)
                ->get();
        }

        $isFavorited = false;
        if (Auth::check()) {
            $isFavorited = Favorit::where('user_id', Auth::id())
                ->where('destinasi_id', $destinasi->id)
                ->exists();
        }

        $reviews = $destinasi->reviews()->with('user')->latest()->get();

        return view('destinasi.show', compact('destinasi', 'terkait', 'isFavorited', 'reviews'));
    }
}
