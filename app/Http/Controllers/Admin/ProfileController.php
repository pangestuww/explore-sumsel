<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
            'password' => ['nullable', 'string', 'min:8'], // Opsional
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Maks 2MB
        ]);

        /** @var \App\Models\User $user */ // <-- INI OBAT GARIS MERAHNYA
        $user = Auth::user();

        // 2. Update Nama & Email
        $user->name = $request->name;
        $user->email = $request->email;

        // 3. Update Password (Jika diisi)
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // 4. Handle Upload Avatar
        if ($request->hasFile('avatar')) {
            // Hapus foto lama jika ada
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }

            // Simpan foto baru ke folder 'avatars'
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
        }

        // 5. Simpan ke Database
        $user->save(); // Garis merah di sini bakal HILANG

        // 6. Kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
}
