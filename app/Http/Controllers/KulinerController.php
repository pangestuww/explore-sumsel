<?php

namespace App\Http\Controllers;

use App\Models\Kuliner;
use Illuminate\Http\Request;

class KulinerController extends Controller
{
    public function index(Request $request)
    {
        $query = Kuliner::with('kabupaten');

        if ($request->filled('jenis')) {
            $query->where('jenis', $request->jenis);
        }

        $kuliners = $query->orderBy('nama')->paginate(9)->withQueryString();

        return view('kuliner.index', compact('kuliners'));
    }

    public function show($slug)
    {
        $kuliner = Kuliner::with('kabupaten')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('kuliner.show', compact('kuliner'));
    }
}
