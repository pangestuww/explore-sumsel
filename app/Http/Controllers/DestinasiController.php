<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use App\Models\Kabupaten;
use App\Models\Provinsi;
use App\Models\Favorit;
use App\Models\Review; // 🌟 TAMBAHKAN INI: Import model Review
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DestinasiController extends Controller
{
    public function index(Request $request)
    {
        // Kode index() milikmu TETAP UTUH
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
        // 1. Kode asli milikmu TETAP UTUH
        $destinasi = Destinasi::with(['kabupaten.provinsi', 'reviews.user'])
            ->where('slug', $slug)
            ->firstOrFail();

        // 2. Kode asli milikmu TETAP UTUH
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

        // 3. Kode asli milikmu TETAP UTUH
        $isFavorited = false;
        if (Auth::check()) {
            $isFavorited = Favorit::where('user_id', Auth::id())
                ->where('destinasi_id', $destinasi->id)
                ->exists();
        }

        // 4. Kode asli milikmu TETAP UTUH
        $reviews = $destinasi->reviews()->with('user')->latest()->get();

        // 🌟 TAMBAHAN BARU: Ambil foto dari ulasan untuk Galeri Vertikal di Sidebar 🌟
        $fotoUlasan = Review::where('destinasi_id', $destinasi->id)
            ->whereNotNull('foto')
            ->latest()
            ->take(6)
            ->get();

        // 🌟 UBAH BAGIAN INI: Tambahkan 'fotoUlasan' ke dalam compact 🌟
        return view('destinasi.show', compact(
            'destinasi',
            'terkait',
            'isFavorited',
            'reviews',
            'fotoUlasan' // <-- Tambahan variabel baru
        ));
    }
}
