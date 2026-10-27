<?php

namespace App\Http\Controllers;

use App\Models\Budaya;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Favorit;
use Illuminate\Http\Request;

class BudayaController extends Controller
{
    // FUNGSI UNTUK MENAMPILKAN DAFTAR BUDAYA (Yang tadi hilang)
    public function index(Request $request)
    {
        // 1. Ambil data dengan relasi
        $query = Budaya::with('kabupaten.provinsi');

        // 2. Logika Pencarian (Search)
        if ($request->filled('q')) {
            $query->where('nama', 'like', '%' . $request->q . '%')
                ->orWhere('deskripsi', 'like', '%' . $request->q . '%');
        }

        // 3. Logika Filter Jenis
        if ($request->filled('jenis')) {
            $query->where('jenis', $request->jenis);
        }

        // 4. Logika Filter Provinsi
        if ($request->filled('provinsi')) {
            $query->whereHas('kabupaten', function ($q) use ($request) {
                $q->where('provinsi_id', $request->provinsi);
            });
        }

        // 5. Logika Filter Kabupaten
        if ($request->filled('kabupaten')) {
            $query->where('kabupaten_id', $request->kabupaten);
        }

        // 6. Ambil data dan paginasi (misal 9 data per halaman)
        $budayas = $query->latest()->paginate(9);

        // 7. Ambil data untuk dropdown filter
        $provinsis = Provinsi::all();
        $kabupatens = Kabupaten::all();

        return view('budaya.index', compact('budayas', 'provinsis', 'kabupatens'));
    }

    // FUNGSI UNTUK MENAMPILKAN DETAIL BUDAYA & CEK FAVORIT
    public function show(Request $request, $slug)
    {
        $budaya = Budaya::with('kabupaten.provinsi')->where('slug', $slug)->firstOrFail();

        $isFavorited = false;
        $user = $request->user(); // Ambil user dari request (anti garis merah)

        if ($user) {
            $isFavorited = Favorit::where('user_id', $user->id)
                ->where('budaya_id', $budaya->id)
                ->exists();
        }
        $reviews = $budaya->reviews()->with('user')->latest()->get();

        return view('budaya.show', compact('budaya', 'isFavorited', 'reviews'));
    }
}
