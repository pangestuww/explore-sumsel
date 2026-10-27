<?php

namespace App\Http\Controllers;

use App\Models\Favorit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritController extends Controller
{
    // ==========================================
    // 1. FUNGSI UNTUK MENAMPILKAN HALAMAN FAVORIT
    // ==========================================
    public function index()
    {
        // Ambil semua favorit milik user yang sedang login, beserta relasinya
        $favorits = Favorit::with(['destinasi', 'budaya', 'kuliner'])
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('favorit.index', compact('favorits'));
    }

    // ==========================================
    // 2. FUNGSI TOGGLE (KHUSUS DESTINASI)
    // ==========================================
    public function toggle($destinasi_id)
    {
        $user = Auth::user();

        $favorit = Favorit::where('user_id', $user->id)
            ->where('destinasi_id', $destinasi_id)
            ->first();

        if ($favorit) {
            $favorit->delete();
            return back()->with('success', 'Destinasi dihapus dari favorit.');
        } else {
            Favorit::create([
                'user_id' => $user->id,
                'destinasi_id' => $destinasi_id,
            ]);
            return back()->with('success', 'Destinasi ditambahkan ke favorit!');
        }
    }

    // ==========================================
    // 3. FUNGSI MENYIMPAN FAVORIT (DESTINASI/BUDAYA/KULINER)
    // ==========================================
    public function store(Request $request)
    {
        // Validasi request agar aman
        $request->validate([
            'type' => 'required|in:destinasi,budaya,kuliner',
            'id' => 'required|integer'
        ]);

        $type = $request->input('type');
        $id = $request->input('id');

        $data = [
            'user_id' => Auth::id(),
            'destinasi_id' => $type == 'destinasi' ? $id : null,
            'budaya_id' => $type == 'budaya' ? $id : null,
            'kuliner_id' => $type == 'kuliner' ? $id : null,
        ];

        // Cek jika sudah ada, biar tidak dobel
        $exists = Favorit::where($data)->first();
        if (!$exists) {
            Favorit::create($data);
        }

        return back()->with('success', 'Berhasil ditambahkan ke favorit!');
    }

    // ==========================================
    // 4. FUNGSI MENGHAPUS FAVORIT
    // ==========================================
    public function destroy($type, $id)
    {
        $column = $type . '_id'; // menjadi destinasi_id, budaya_id, atau kuliner_id

        Favorit::where('user_id', Auth::id())
            ->where($column, $id)
            ->delete();

        return back()->with('success', 'Berhasil dihapus dari favorit!');
    }
}
