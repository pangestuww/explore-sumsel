<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destinasi;
use App\Models\Kabupaten;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewContentNotification;

class AdminDestinasiController extends Controller
{
    public function index()
    {
        $destinasis = Destinasi::with('kabupaten.provinsi')->latest()->paginate(10);
        $kabupatens = Kabupaten::orderBy('nama')->get();

        return view('admin.destinasi.index', compact('destinasis', 'kabupatens'));
    }

    public function create()
    {
        $kabupatens = Kabupaten::with('provinsi')->orderBy('nama')->get();
        return view('admin.destinasi.create', compact('kabupatens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kabupaten_id' => 'required|exists:kabupatens,id',
            'kategori' => 'required|in:alam,budaya,kuliner',
            'jenis' => 'required|string',
            'harga_tiket' => 'required|numeric',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->nama);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('destinasi', 'public');
        }

        Destinasi::create($data);

        // Kirim Notifikasi
        $kabupaten = Kabupaten::find($request->kabupaten_id);
        $users = User::where('role', 'user')->get();
        $notifData = [
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'kabupaten' => $kabupaten ? $kabupaten->nama : 'Sumatera',
            'url' => route('destinasi.index')
        ];
        Notification::send($users, new NewContentNotification($notifData));

        return redirect()->route('admin.destinasi.index')->with('success', 'Destinasi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $destinasi = Destinasi::findOrFail($id);
        $kabupatens = Kabupaten::with('provinsi')->orderBy('nama')->get();
        return view('admin.destinasi.edit', compact('destinasi', 'kabupatens'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kabupaten_id' => 'required|exists:kabupatens,id',
            'kategori' => 'required|in:alam,budaya,kuliner',
            'jenis' => 'required|string',
            'harga_tiket' => 'required|numeric',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $destinasi = Destinasi::findOrFail($id);
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama);

        if ($request->hasFile('gambar')) {
            if ($destinasi->gambar && Storage::disk('public')->exists($destinasi->gambar)) {
                Storage::disk('public')->delete($destinasi->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('destinasi', 'public');
        }

        $destinasi->update($data);

        return redirect()->route('admin.destinasi.index')->with('success', 'Destinasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $destinasi = Destinasi::findOrFail($id);

        if ($destinasi->gambar && Storage::disk('public')->exists($destinasi->gambar)) {
            Storage::disk('public')->delete($destinasi->gambar);
        }

        $destinasi->delete();

        return redirect()->route('admin.destinasi.index')->with('success', 'Destinasi berhasil dihapus!');
    }
}