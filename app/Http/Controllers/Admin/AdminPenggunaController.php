<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <--- Tambahkan ini

class AdminPenggunaController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('admin.pengguna.index', compact('users'));
    }

    public function apiIndex()
    {
        // Ambil semua user, urutkan terbaru
        $users = \App\Models\User::latest()->get();
        return response()->json($users);
    }

    public function destroy(User $user)
    {
        // 🌟 PENGAMAN: Menggunakan Auth::id() agar VS Code tidak protes
        if (Auth::id() === $user->id) {
            return back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri!');
        }

        $user->delete();
        return back()->with('success', 'Akun pengguna berhasil dihapus.');
    }
}
