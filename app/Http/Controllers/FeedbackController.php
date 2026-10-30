<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    // ==========================================
    // USER: Kirim feedback
    // ==========================================
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Feedback::create([
            'user_id' => Auth::id(),
            'subject' => $request->subject,
            'message' => $request->message,
            'is_read' => false,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Feedback berhasil dikirim'
        ]);
    }

    // ==========================================
    // ADMIN: Ambil semua feedback (JSON)
    // ==========================================
    public function apiIndex()
    {
        $feedbacks = Feedback::with('user')->latest()->get();
        return response()->json($feedbacks);
    }

    // ==========================================
    // ADMIN: Tandai feedback sudah dibaca
    // ==========================================
    public function markAsRead($id)
    {
        $feedback = Feedback::find($id);
        if ($feedback) {
            $feedback->is_read = true;
            $feedback->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Feedback tidak ditemukan'], 404);
    }
}