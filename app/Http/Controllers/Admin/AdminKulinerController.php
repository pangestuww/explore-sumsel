<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kuliner;
use App\Models\Kabupaten;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewContentNotification;

class AdminKulinerController extends Controller
{
    public function index()
    {
        $kuliners = Kuliner::with('kabupaten')->latest()->paginate(10);
        $kabupatens = Kabupaten::with('provinsi')->get();
        return view('admin.kuliner.index', compact('kuliners', 'kabupatens'));
    }

    public function create()
    {
        $kabupatens = Kabupaten::with('provinsi')->get();
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
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'latitude' => 'nullable|string',
            'longitude' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->nama);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('kuliner', 'public');
            $data['gambar'] = $path;
        }

        $kuliner = Kuliner::create($data);

        $kabupaten = Kabupaten::find($request->kabupaten_id);
        $users = User::where('role', 'user')->get();
        $notifData = [
            'nama' => $request->nama,
            'kategori' => 'kuliner',
            'kabupaten' => $kabupaten ? $kabupaten->nama : 'Sumatera',
            'url' => route('kuliner.show', $kuliner->slug)
        ];
        Notification::send($users, new NewContentNotification($notifData));

        return redirect()->route('admin.kuliner.index')->with('success', 'Data kuliner berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kuliner = Kuliner::findOrFail($id);
        $kabupatens = Kabupaten::with('provinsi')->get();
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
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'latitude' => 'nullable|string',
            'longitude' => 'nullable|string',
            'link_maps' => 'nullable|string',
        ]);

        $kuliner = Kuliner::findOrFail($id);
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama);

        if ($request->hasFile('gambar')) {
            if ($kuliner->gambar && Storage::disk('public')->exists($kuliner->gambar)) {
                Storage::disk('public')->delete($kuliner->gambar);
            }
            $path = $request->file('gambar')->store('kuliner', 'public');
            $data['gambar'] = $path;
        }

        $kuliner->update($data);

        return redirect()->route('admin.kuliner.index')->with('success', 'Data kuliner berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kuliner = Kuliner::findOrFail($id);

        if ($kuliner->gambar && Storage::disk('public')->exists($kuliner->gambar)) {
            Storage::disk('public')->delete($kuliner->gambar);
        }

        $kuliner->delete();

        return redirect()->route('admin.kuliner.index')->with('success', 'Data kuliner berhasil dihapus!');
    }
}
