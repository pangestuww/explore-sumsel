<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use App\Models\Kabupaten;

class HomeController extends Controller
{
    public function index()
    {
        $destinasiPopuler = Destinasi::with('kabupaten')
            ->orderBy('rating', 'desc')
            ->take(4)
            ->get();

        $kabupatens = Kabupaten::all();

        return view('home', compact('destinasiPopuler', 'kabupatens'));
    }
}
