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

        // 2. Validasi Input
        $validated = $request->validate([
            'type' => 'required|in:destinasi,budaya,kuliner',
            'id' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // 3. 🌟 CEK DUPLIKASI: Apakah user sudah pernah ulas tempat ini? 🌟
        $kolom = '';
        if ($validated['type'] === 'destinasi') $kolom = 'destinasi_id';
        elseif ($validated['type'] === 'budaya') $kolom = 'budaya_id';
        elseif ($validated['type'] === 'kuliner') $kolom = 'kuliner_id';

        $sudahUlas = Review::where('user_id', Auth::id())
                           ->where($kolom, $validated['id'])
                           ->exists();

        if ($sudahUlas) {
            // Jika sudah ada, kembalikan dengan pesan error
            return back()->with('error', 'Anda sudah pernah memberikan ulasan untuk tempat ini!');
        }

        // 4. Proses Upload Foto (Jika user mengunggah foto)
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('reviews', 'public');
        }

        // 5. Simpan Data Ulasan ke Database
        $review = Review::create([
            'user_id'      => Auth::id(),
            'destinasi_id' => ($validated['type'] === 'destinasi') ? $validated['id'] : null,
            'budaya_id'    => ($validated['type'] === 'budaya') ? $validated['id'] : null,
            'kuliner_id'   => ($validated['type'] === 'kuliner') ? $validated['id'] : null,
            'rating'       => $validated['rating'],
            'komentar'     => $validated['komentar'],
            'foto'         => $fotoPath,
        ]);

        // 6. Kirim Notifikasi ke Semua Admin
        $admins = User::where('role', 'admin')->get();
        if ($admins->isNotEmpty()) {
            Notification::send($admins, new NewReviewNotification($review));
        }

        // 7. Kembalikan user ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Ulasan berhasil ditambahkan!');
    }
}