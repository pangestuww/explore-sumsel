<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use App\Models\Kabupaten;
use Illuminate\Http\Request;

class DestinasiController extends Controller
{
    /**
     * Tampilkan daftar semua destinasi dengan filter & pencarian.
     */
    public function index(Request $request)
    {
        $query = Destinasi::with('kabupaten');

        // Filter berdasarkan kategori
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        // Filter berdasarkan kabupaten
        if ($request->filled('kabupaten')) {
            $query->where('kabupaten_id', $request->kabupaten);
        }

        // Search berdasarkan nama
        if ($request->filled('q')) {
            $query->where('nama', 'like', '%' . $request->q . '%');
        }

        // Urutkan & paginate
        $destinasis = $query->orderBy('rating', 'desc')->paginate(9)->withQueryString();
        $kabupatens = Kabupaten::all();

        return view('destinasi.index', compact('destinasis', 'kabupatens'));
    }

    /**
     * Tampilkan detail satu destinasi berdasarkan slug.
     */
    public function show($slug)
    {
        $destinasi = Destinasi::with(['kabupaten', 'reviews.user'])
            ->where('slug', $slug)
            ->firstOrFail();

        // Ambil destinasi terkait (kabupaten sama, kecuali dirinya sendiri)
        $terkait = Destinasi::with('kabupaten')
            ->where('kabupaten_id', $destinasi->kabupaten_id)
            ->where('id', '!=', $destinasi->id)
            ->take(3)
            ->get();

        // Fallback: kalau tidak ada destinasi di kabupaten yang sama,
        // ambil random dari seluruh Sumsel
        if ($terkait->isEmpty()) {
            $terkait = Destinasi::with('kabupaten')
                ->where('id', '!=', $destinasi->id)
                ->inRandomOrder()
                ->take(3)
                ->get();
        }

        return view('destinasi.show', compact('destinasi', 'terkait'));
    }
}
