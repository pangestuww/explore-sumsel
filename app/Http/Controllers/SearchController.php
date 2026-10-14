<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use App\Models\Budaya;
use App\Models\Kuliner;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $q = trim($request->input('q', ''));

        if (empty($q)) {
            return redirect()->route('home');
        }

        // Cari di 3 kategori sekaligus
        $destinasis = Destinasi::with('kabupaten')
            ->where(function ($query) use ($q) {
                $query->where('nama', 'like', "%{$q}%")
                    ->orWhere('deskripsi', 'like', "%{$q}%");
            })
            ->get();

        $budayas = Budaya::with('kabupaten')
            ->where(function ($query) use ($q) {
                $query->where('nama', 'like', "%{$q}%")
                    ->orWhere('deskripsi', 'like', "%{$q}%");
            })
            ->get();

        $kuliners = Kuliner::with('kabupaten')
            ->where(function ($query) use ($q) {
                $query->where('nama', 'like', "%{$q}%")
                    ->orWhere('deskripsi', 'like', "%{$q}%");
            })
            ->get();

        $totalDestinasi = $destinasis->count();
        $totalBudaya    = $budayas->count();
        $totalKuliner   = $kuliners->count();

        // ==========================================
        // SMART REDIRECT
        // Kalau cuma 1 kategori yang match → redirect ke halaman itu
        // ==========================================
        $categoriesWithResults = 0;
        if ($totalDestinasi > 0) $categoriesWithResults++;
        if ($totalBudaya > 0)    $categoriesWithResults++;
        if ($totalKuliner > 0)   $categoriesWithResults++;

        if ($categoriesWithResults === 1) {
            if ($totalDestinasi > 0) {
                return redirect()->route('destinasi.index', ['q' => $q]);
            }
            if ($totalBudaya > 0) {
                return redirect()->route('budaya.index', ['q' => $q]);
            }
            if ($totalKuliner > 0) {
                return redirect()->route('kuliner.index', ['q' => $q]);
            }
        }

        // Kalau 0 hasil → tetap tampilkan halaman search kosong
        // Kalau >1 kategori → tampilkan halaman search gabungan

        return view('search.index', compact(
            'q',
            'destinasis',
            'budayas',
            'kuliners',
            'totalDestinasi',
            'totalBudaya',
            'totalKuliner'
        ));
    }
}
