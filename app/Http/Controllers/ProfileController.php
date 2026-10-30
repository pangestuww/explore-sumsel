<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = $request->user();

        // 🌟 1. VALIDASI (Wajib ada 'photo')
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Maks 2MB
            'job' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);

        // 🌟 2. UPDATE DATA TEKS
        $user->name = $request->name;
        $user->email = $request->email;
        $user->job = $request->job;
        $user->address = $request->address;

        // 🌟 3. PROSES UPLOAD FOTO
        if ($request->hasFile('photo')) {
            // Hapus foto lama kalau ada
            if ($user->photo && Storage::disk('public')->exists($user->photo)) {
                Storage::disk('public')->delete($user->photo);
            }

            // Simpan foto baru
            $path = $request->file('photo')->store('photos', 'public');
            $user->photo = $path;
        }

        // Ganti password (opsional)
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return Redirect::back()->with('success', 'Profil berhasil diperbarui!');
    }
}
