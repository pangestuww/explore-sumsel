<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;

class HomeController extends Controller
{
    public function index()
    {
        $destinasiPopuler = Destinasi::with('kabupaten')
            ->orderBy('rating', 'desc')
            ->take(4)
            ->get();

        return view('home', compact('destinasiPopuler'));
    }
}
