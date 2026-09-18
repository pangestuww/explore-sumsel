<?php

namespace App\Http\Controllers;

use App\Models\Budaya;
use Illuminate\Http\Request;

class BudayaController extends Controller
{
    public function index(Request $request)
    {
        $query = Budaya::with('kabupaten');

        if ($request->filled('jenis')) {
            $query->where('jenis', $request->jenis);
        }

        $budayas = $query->orderBy('nama')->paginate(9)->withQueryString();

        return view('budaya.index', compact('budayas'));
    }

    public function show($slug)
    {
        $budaya = Budaya::with('kabupaten')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('budaya.show', compact('budaya'));
    }
}
