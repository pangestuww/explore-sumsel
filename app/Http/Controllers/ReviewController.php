<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use App\Notifications\NewReviewNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth; // 🌟 Wajib ada biar gak merah

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validasi dan simpan ke variabel $validated
        // Ini cara paling ampuh biar VS Code tau isinya array
        $validated = $request->validate([
            'type' => 'required|in:destinasi,budaya,kuliner',
            'id' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'required|string'
        ]);

        // 2. Simpan Data
        $review = Review::create([
            'user_id' => Auth::id(), // 🌟 Pake Facade, gak bakal merah
            'destinasi_id' => ($validated['type'] === 'destinasi') ? $validated['id'] : null,
            'budaya_id'    => ($validated['type'] === 'budaya') ? $validated['id'] : null,
            'kuliner_id'   => ($validated['type'] === 'kuliner') ? $validated['id'] : null,
            'rating'       => $validated['rating'],
            'komentar'     => $validated['komentar'],
        ]);

        // 3. Kirim Notifikasi ke Admin
        $admins = User::where('role', 'admin')->get();

        if ($admins->isNotEmpty()) {
            Notification::send($admins, new NewReviewNotification($review));
        }

        return back()->with('success', 'Ulasan berhasil ditambahkan!');
    }
}
