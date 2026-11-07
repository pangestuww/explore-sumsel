<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Services\FeedbackModerationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    // USER: Mengirim feedback
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Periksa isi feedback menggunakan moderasi
        $moderation = app(FeedbackModerationService::class);

        $result = $moderation->check(
            $request->subject . ' ' . $request->message
        );

        // Simpan feedback beserta hasil pemeriksaan
        Feedback::create([
            'user_id' => Auth::id(),
            'subject' => $request->subject,
            'message' => $request->message,
            'is_read' => false,
            'is_spam' => $result['is_spam'],
            'spam_reason' => $result['reason'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Feedback berhasil dikirim'
        ]);
    }

    // ADMIN: Mengambil feedback yang bukan spam
    public function apiIndex()
    {
        $feedbacks = Feedback::with('user')
            ->where('is_spam', false)
            ->latest()
            ->get();

        return response()->json($feedbacks);
    }

    // ADMIN: Menandai feedback sudah dibaca
    public function markAsRead($id)
    {
        $feedback = Feedback::find($id);

        if ($feedback) {
            $feedback->is_read = true;
            $feedback->save();

            return response()->json([
                'success' => true
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Feedback tidak ditemukan'
        ], 404);
    }
}
