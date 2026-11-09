<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use App\Notifications\NewReviewNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        // 1. Pastikan hanya user yang login yang bisa mengirim ulasan
        if (!Auth::check()) {
            return back()->with('error', 'Anda harus login untuk mengirim ulasan.');
        }

        // 2. Validasi Input (Termasuk validasi Foto)
        $validated = $request->validate([
            'type' => 'required|in:destinasi,budaya,kuliner',
            'id' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // 3. Proses Upload Foto (Jika user mengunggah foto)
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('reviews', 'public');
        }

        // 4. Simpan/Update Data Ulasan ke Database
        $kriteria = [
            'user_id'      => Auth::id(),
            'destinasi_id' => ($validated['type'] === 'destinasi') ? $validated['id'] : null,
            'budaya_id'    => ($validated['type'] === 'budaya') ? $validated['id'] : null,
            'kuliner_id'   => ($validated['type'] === 'kuliner') ? $validated['id'] : null,
        ];

        $dataUlasan = [
            'rating'   => $validated['rating'],
            'komentar' => $validated['komentar'],
        ];

        if ($fotoPath) {
            $dataUlasan['foto'] = $fotoPath;
        }

        $review = Review::updateOrCreate($kriteria, $dataUlasan);

        // 5. Kirim Notifikasi ke Semua Admin
        $admins = User::where('role', 'admin')->get();
        if ($admins->isNotEmpty()) {
            Notification::send($admins, new NewReviewNotification($review));
        }

        // 6. Kembalikan user ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Ulasan berhasil ditambahkan!');
    }
}
