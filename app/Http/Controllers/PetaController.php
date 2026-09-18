<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use App\Models\Kabupaten;

class PetaController extends Controller
{
    public function index()
    {
        $destinasis = Destinasi::with('kabupaten')->get();
        $kabupatens = Kabupaten::has('destinasis')->get();

        return view('peta.index', compact('destinasis', 'kabupatens'));
    }
}
