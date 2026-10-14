<?php

namespace App\Http\Controllers;

use App\Models\Kuliner;
use App\Models\Kabupaten;
use App\Models\Provinsi;
use Illuminate\Http\Request;

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

    public function show($slug)
    {
        $kuliner = Kuliner::with('kabupaten')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('kuliner.show', compact('kuliner'));
    }
}
