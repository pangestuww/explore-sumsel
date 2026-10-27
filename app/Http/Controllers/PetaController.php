<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use App\Models\Budaya;
use App\Models\Kuliner;

class PetaController extends Controller
{
    public function index()
    {
        // 1. Ambil Destinasi
        $destinasis = Destinasi::with('kabupaten.provinsi')->get()->map(function($item) {
            return [
                'id' => 'dest-' . $item->id,
                'nama' => $item->nama,
                'kategori' => 'alam',
                'slug' => $item->slug,
                'gambar' => $item->gambar,
                'latitude' => $item->latitude,
                'longitude' => $item->longitude,
                'kabupaten' => $item->kabupaten,
            ];
        });

        // 2. Ambil Budaya
        $budayas = Budaya::with('kabupaten.provinsi')->get()->map(function($item) {
            return [
                'id' => 'bud-' . $item->id,
                'nama' => $item->nama,
                'kategori' => 'budaya',
                'slug' => $item->slug,
                'gambar' => $item->gambar,
                'latitude' => null,
                'longitude' => null,
                'kabupaten' => $item->kabupaten,
            ];
        });

        // 3. Ambil Kuliner
        $kuliners = Kuliner::with('kabupaten.provinsi')->get()->map(function($item) {
            return [
                'id' => 'kul-' . $item->id,
                'nama' => $item->nama,
                'kategori' => 'kuliner',
                'slug' => $item->slug,
                'gambar' => $item->gambar,
                'latitude' => null,
                'longitude' => null,
                'kabupaten' => $item->kabupaten,
            ];
        });

        // 4. GABUNGKAN SEMUA DATA
        $semuaData = $destinasis->concat($budayas)->concat($kuliners);

        return view('peta.index', compact('semuaData'));
    }
}