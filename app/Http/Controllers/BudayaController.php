<?php

namespace App\Http\Controllers;

use App\Models\Budaya;
use App\Models\Kabupaten;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class BudayaController extends Controller
{
    public function index(Request $request)
    {
        $query = Budaya::with(['kabupaten.provinsi']);

        if ($request->filled('q')) {
            $query->where(function ($sub) use ($request) {
                $sub->where('nama', 'like', '%' . $request->q . '%')
                    ->orWhere('deskripsi', 'like', '%' . $request->q . '%');
            });
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

        $budayas = $query->orderBy('nama')->paginate(9)->withQueryString();

        $provinsis = Provinsi::orderBy('nama')->get();
        $kabupatens = Kabupaten::orderBy('nama')->get();

        return view('budaya.index', compact('budayas', 'provinsis', 'kabupatens'));
    }

    public function show($slug)
    {
        $budaya = Budaya::with('kabupaten.provinsi')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('budaya.show', compact('budaya'));
    }
}