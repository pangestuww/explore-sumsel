<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;

class HomeController extends Controller
{
    public function index()
    {
        // 4 Destinasi Populer (buat card di atas)
        $destinasiPopuler = Destinasi::with('kabupaten')
            ->orderBy('rating', 'desc')
            ->take(4)
            ->get();

        // 8 Destinasi Acak (khusus buat Galeri di bawah)
        $galeriDestinasi = Destinasi::inRandomOrder()->take(8)->get();

        return view('home', compact('destinasiPopuler', 'galeriDestinasi'));
    }
}
