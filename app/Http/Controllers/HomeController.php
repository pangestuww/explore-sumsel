<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use App\Models\Budaya;
use App\Models\Provinsi; // Pastikan model ini ada di project-mu
// use App\Models\Kabupaten; // Uncomment ini JIKA kamu tidak punya model Provinsi

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

        // 🌟 TAMBAHAN BARU: Hitung data asli dari Database untuk Hero Section 🌟
        $totalDestinasi = Destinasi::count();
        $totalBudaya = Budaya::count();

        // Pilih salah satu cara menghitung provinsi di bawah ini:

        // Opsi A: Jika kamu punya tabel/model Provinsi
        $totalProvinsi = Provinsi::count();

        // Opsi B: Jika TIDAK punya tabel Provinsi, hitung dari tabel Kabupaten (hapus // di bawah)
        // $totalProvinsi = \App\Models\Kabupaten::distinct('provinsi_id')->count('provinsi_id');

        // Kirim semua variabel ke view home
        return view('home', compact(
            'destinasiPopuler',
            'galeriDestinasi',
            'totalDestinasi',
            'totalBudaya',
            'totalProvinsi'
        ));
    }
}
