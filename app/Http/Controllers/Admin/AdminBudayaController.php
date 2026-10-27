<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Budaya;
use App\Models\Kabupaten;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewContentNotification;

class AdminBudayaController extends Controller
{
    public function index()
    {
        $budayas = Budaya::with('kabupaten.provinsi')->latest()->paginate(10);
        return view('admin.budaya.index', compact('budayas'));
    }

    public function create()
    {
        $kabupatens = Kabupaten::with('provinsi')->orderBy('nama')->get();
        return view('admin.budaya.create', compact('kabupatens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kabupaten_id' => 'required|exists:kabupatens,id',
            'jenis' => 'required|string',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->nama);
        $data['kategori'] = 'budaya'; // Paksa kategori budaya

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('budaya', 'public');
        }

        Budaya::create($data);

        // Kirim Notifikasi
        $kabupaten = Kabupaten::find($request->kabupaten_id);
        $users = User::where('role', 'user')->get();
        $notifData = [
            'nama' => $request->nama,
            'kategori' => 'Budaya',
            'kabupaten' => $kabupaten ? $kabupaten->nama : 'Sumatera',
            'url' => route('budaya.index')
        ];
        Notification::send($users, new NewContentNotification($notifData));

        return redirect()->route('admin.budaya.index')->with('success', 'Budaya berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $budaya = Budaya::findOrFail($id);
        $kabupatens = Kabupaten::with('provinsi')->orderBy('nama')->get();
        return view('admin.budaya.edit', compact('budaya', 'kabupatens'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kabupaten_id' => 'required|exists:kabupatens,id',
            'jenis' => 'required|string',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $budaya = Budaya::findOrFail($id);
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama);

        if ($request->hasFile('gambar')) {
            if ($budaya->gambar && Storage::disk('public')->exists($budaya->gambar)) {
                Storage::disk('public')->delete($budaya->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('budaya', 'public');
        }

        $budaya->update($data);

        return redirect()->route('admin.budaya.index')->with('success', 'Budaya berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $budaya = Budaya::findOrFail($id);

        if ($budaya->gambar && Storage::disk('public')->exists($budaya->gambar)) {
            Storage::disk('public')->delete($budaya->gambar);
        }

        $budaya->delete();

        return redirect()->route('admin.budaya.index')->with('success', 'Budaya berhasil dihapus!');
    }
}
