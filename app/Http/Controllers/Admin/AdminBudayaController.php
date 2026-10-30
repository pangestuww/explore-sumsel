<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Budaya;
use App\Models\Kabupaten;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewContentNotification;

class AdminBudayaController extends Controller
{
    public function index()
    {
        $budayas = Budaya::with('kabupaten')->latest()->paginate(10);
        $kabupatens = Kabupaten::with('provinsi')->get();
        return view('admin.budaya.index', compact('budayas', 'kabupatens'));
    }

    public function create()
    {
        $kabupatens = Kabupaten::with('provinsi')->get();
        return view('admin.budaya.create', compact('kabupatens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kabupaten_id' => 'required|exists:kabupatens,id',
            'jenis' => 'required|string',
            'deskripsi' => 'required|string',
            'deskripsi_bawah' => 'nullable|string', // 🌟 Tambahan Baru
            'harga_tiket' => 'nullable|numeric', // 🌟 Tambahan Baru
            'jam_buka' => 'nullable|string|max:255', // 🌟 Tambahan Baru
            'waktu_terbaik' => 'nullable|string|max:255', // 🌟 Tambahan Baru
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'latitude' => 'nullable|string',
            'longitude' => 'nullable|string',
            'link_maps' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->nama);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('budaya', 'public');
            $data['gambar'] = $path;
        }

        $budaya = Budaya::create($data);

        $kabupaten = Kabupaten::find($request->kabupaten_id);
        $users = User::where('role', 'user')->get();
        $notifData = [
            'nama' => $request->nama,
            'kategori' => 'budaya',
            'kabupaten' => $kabupaten ? $kabupaten->nama : 'Sumatera',
            'url' => route('budaya.show', $budaya->slug)
        ];
        Notification::send($users, new NewContentNotification($notifData));

        return redirect()->route('admin.budaya.index')->with('success', 'Data budaya berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $budaya = Budaya::findOrFail($id);
        $kabupatens = Kabupaten::with('provinsi')->get();
        return view('admin.budaya.edit', compact('budaya', 'kabupatens'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kabupaten_id' => 'required|exists:kabupatens,id',
            'jenis' => 'required|string',
            'deskripsi' => 'required|string',
            'deskripsi_bawah' => 'nullable|string', // 🌟 Tambahan Baru
            'harga_tiket' => 'nullable|numeric', // 🌟 Tambahan Baru
            'jam_buka' => 'nullable|string|max:255', // 🌟 Tambahan Baru
            'waktu_terbaik' => 'nullable|string|max:255', // 🌟 Tambahan Baru
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'latitude' => 'nullable|string',
            'longitude' => 'nullable|string',
            'link_maps' => 'nullable|string', // 🌟 Tambahan (sebelumnya belum ada di update)
        ]);

        $budaya = Budaya::findOrFail($id);
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama);

        if ($request->hasFile('gambar')) {
            if ($budaya->gambar && Storage::disk('public')->exists($budaya->gambar)) {
                Storage::disk('public')->delete($budaya->gambar);
            }
            $path = $request->file('gambar')->store('budaya', 'public');
            $data['gambar'] = $path;
        }

        $budaya->update($data);

        return redirect()->route('admin.budaya.index')->with('success', 'Data budaya berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $budaya = Budaya::findOrFail($id);

        if ($budaya->gambar && Storage::disk('public')->exists($budaya->gambar)) {
            Storage::disk('public')->delete($budaya->gambar);
        }

        $budaya->delete();

        return redirect()->route('admin.budaya.index')->with('success', 'Data budaya berhasil dihapus!');
    }
}
