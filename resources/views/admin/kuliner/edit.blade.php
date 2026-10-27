@extends('layouts.app')

@section('title', 'Edit Kuliner - Admin')

@section('content')
<div class="min-h-screen bg-slate-50 dark:bg-[#0b1120] py-10 transition-colors duration-300">
    <div class="container mx-auto px-4 md:px-6 max-w-4xl">

        <!-- Header Halaman -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-black text-slate-900 dark:text-white">Edit Kuliner</h1>
                <p class="text-slate-500 dark:text-slate-400 mt-1">Perbarui data kuliner: <strong>{{ $kuliner->nama }}</strong></p>
            </div>
            <a href="{{ route('admin.kuliner.index') }}" class="bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 px-5 py-2.5 rounded-xl font-bold hover:bg-slate-300 dark:hover:bg-slate-700 transition">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>

        <!-- Notifikasi Error Validasi -->
        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-6">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Card Form -->
        <div class="bg-white dark:bg-[#0f172a] rounded-2xl shadow-xl border border-slate-200 dark:border-slate-800 p-6 md:p-8">
            <form action="{{ route('admin.kuliner.update', $kuliner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Nama Kuliner -->
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Nama Kuliner</label>
                        <input type="text" name="nama" value="{{ old('nama', $kuliner->nama) }}" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>

                    <!-- Kabupaten / Kota -->
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Kabupaten / Kota</label>
                        <select name="kabupaten_id" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            <option value="">-- Pilih Kabupaten --</option>
                            @foreach($kabupatens as $kab)
                            <option value="{{ $kab->id }}" {{ $kuliner->kabupaten_id == $kab->id ? 'selected' : '' }}>
                                {{ $kab->nama }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Jenis -->
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Jenis Kuliner</label>
                        <select name="jenis" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            <option value="">-- Pilih Jenis --</option>
                            <option value="makanan" {{ $kuliner->jenis == 'makanan' ? 'selected' : '' }}>Makanan</option>
                            <option value="minuman" {{ $kuliner->jenis == 'minuman' ? 'selected' : '' }}>Minuman</option>
                            <option value="snack" {{ $kuliner->jenis == 'snack' ? 'selected' : '' }}>Snack</option>
                            <option value="dessert" {{ $kuliner->jenis == 'dessert' ? 'selected' : '' }}>Dessert</option>
                        </select>
                    </div>

                    <!-- Harga -->
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Harga (Angka)</label>
                        <input type="number" name="harga" value="{{ old('harga', $kuliner->harga) }}" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>

                    <!-- Upload Gambar -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Ganti Gambar (Opsional)</label>
                        <input type="file" name="gambar" accept="image/*" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100 dark:file:bg-orange-900/30 dark:file:text-orange-400">
                        <p class="text-xs text-slate-500 mt-1">Biarkan kosong jika tidak ingin mengganti gambar.</p>
                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="mb-8">
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Deskripsi</label>
                    <textarea name="deskripsi" rows="4" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">{{ old('deskripsi', $kuliner->deskripsi) }}</textarea>
                </div>

                <!-- Tombol Simpan -->
                <div class="flex justify-end gap-4 pt-4 border-t border-slate-200 dark:border-slate-800">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white font-bold px-8 py-3 rounded-xl transition-all shadow-lg shadow-blue-600/30">
                        <i class="fas fa-save mr-2"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection