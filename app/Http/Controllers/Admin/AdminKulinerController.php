<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kuliner;
use App\Models\Kabupaten;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewContentNotification;

class AdminKulinerController extends Controller
{
    public function index()
    {
        $kuliners = Kuliner::with('kabupaten.provinsi')->latest()->paginate(10);
        return view('admin.kuliner.index', compact('kuliners'));
    }

    public function create()
    {
        $kabupatens = Kabupaten::with('provinsi')->orderBy('nama')->get();
        return view('admin.kuliner.create', compact('kabupatens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kabupaten_id' => 'required|exists:kabupatens,id',
            'jenis' => 'required|string',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->nama);
        $data['kategori'] = 'kuliner'; // Paksa kategori kuliner

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('kuliner', 'public');
        }

        Kuliner::create($data);

        // Kirim Notifikasi
        $kabupaten = Kabupaten::find($request->kabupaten_id);
        $users = User::where('role', 'user')->get();
        $notifData = [
            'nama' => $request->nama,
            'kategori' => 'Kuliner',
            'kabupaten' => $kabupaten ? $kabupaten->nama : 'Sumatera',
            'url' => route('kuliner.index')
        ];
        Notification::send($users, new NewContentNotification($notifData));

        return redirect()->route('admin.kuliner.index')->with('success', 'Kuliner berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kuliner = Kuliner::findOrFail($id);
        $kabupatens = Kabupaten::with('provinsi')->orderBy('nama')->get();

        // Pastikan ngirim ke 'admin.kuliner.edit'
        return view('admin.kuliner.edit', compact('kuliner', 'kabupatens'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kabupaten_id' => 'required|exists:kabupatens,id',
            'jenis' => 'required|string',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $kuliner = Kuliner::findOrFail($id);
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama);

        if ($request->hasFile('gambar')) {
            if ($kuliner->gambar && Storage::disk('public')->exists($kuliner->gambar)) {
                Storage::disk('public')->delete($kuliner->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('kuliner', 'public');
        }

        $kuliner->update($data);

        return redirect()->route('admin.kuliner.index')->with('success', 'Kuliner berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kuliner = Kuliner::findOrFail($id);

        if ($kuliner->gambar && Storage::disk('public')->exists($kuliner->gambar)) {
            Storage::disk('public')->delete($kuliner->gambar);
        }

        $kuliner->delete();

        return redirect()->route('admin.kuliner.index')->with('success', 'Kuliner berhasil dihapus!');
    }
}
