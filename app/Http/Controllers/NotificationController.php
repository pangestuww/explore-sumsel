<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function fetch()
    {
        if (!Auth::check()) {
            return response()->json(['count' => 0, 'data' => []]);
        }

        // 🌟 TRIK ANTI GARIS MERAH: Kasih tau VS Code kalau ini Model User
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $notifications = $user->notifications()->take(10)->get();
        $unreadCount = $user->unreadNotifications()->count();

        return response()->json([
            'count' => $unreadCount,
            'data' => $notifications
        ]);
    }

    public function markAsRead()
    {
        if (Auth::check()) {
            // 🌟 TRIK ANTI GARIS MERAH JUGA
            /** @var \App\Models\User $user */
            $user = Auth::user();
            $user->unreadNotifications->markAsRead();
        }
        return response()->json(['success' => true]);
    }

    public function markSingleAsRead($id)
    {
        if (Auth::check()) {
            // 🌟 TRIK ANTI GARIS MERAH LAGI
            /** @var \App\Models\User $user */
            $user = Auth::user();

            $notification = $user->notifications()->find($id);
            if ($notification) {
                $notification->markAsRead();
            }
        }
        return response()->json(['success' => true]);
    }
}
