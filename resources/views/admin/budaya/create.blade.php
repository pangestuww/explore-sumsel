@extends('layouts.app')

@section('title', 'Tambah Budaya - Admin')

@section('content')
<div class="min-h-screen bg-slate-50 dark:bg-[#0b1120] py-10 transition-colors duration-300">
    <div class="container mx-auto px-4 md:px-6 max-w-4xl">

        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-black text-slate-900 dark:text-white">Tambah Budaya</h1>
                <p class="text-slate-500 dark:text-slate-400 mt-1">Tambahkan data warisan budaya baru.</p>
            </div>
            <a href="{{ route('admin.budaya.index') }}" class="bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 px-5 py-2.5 rounded-xl font-bold hover:bg-slate-300 dark:hover:bg-slate-700 transition">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>

        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-6">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="bg-white dark:bg-[#0f172a] rounded-2xl shadow-xl border border-slate-200 dark:border-slate-800 p-6 md:p-8">
            <form action="{{ route('admin.budaya.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Nama Budaya</label>
                        <input type="text" name="nama" value="{{ old('nama') }}" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Kabupaten / Kota</label>
                        <select name="kabupaten_id" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            <option value="">-- Pilih Kabupaten --</option>
                            @foreach($kabupatens as $kab)
                            <option value="{{ $kab->id }}" {{ old('kabupaten_id') == $kab->id ? 'selected' : '' }}>
                                {{ $kab->nama }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Jenis Budaya</label>
                        <select name="jenis" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            <option value="">-- Pilih Jenis --</option>
                            <option value="rumah_adat" {{ old('jenis') == 'rumah_adat' ? 'selected' : '' }}>Rumah Adat</option>
                            <option value="tari" {{ old('jenis') == 'tari' ? 'selected' : '' }}>Tari</option>
                            <option value="pakaian" {{ old('jenis') == 'pakaian' ? 'selected' : '' }}>Pakaian Adat</option>
                            <option value="senjata" {{ old('jenis') == 'senjata' ? 'selected' : '' }}>Senjata</option>
                            <option value="upacara" {{ old('jenis') == 'upacara' ? 'selected' : '' }}>Upacara</option>
                            <option value="alat_musik" {{ old('jenis') == 'alat_musik' ? 'selected' : '' }}>Alat Musik</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Upload Gambar</label>
                        <input type="file" name="gambar" accept="image/*" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 dark:file:bg-emerald-900/30 dark:file:text-emerald-400">
                    </div>
                </div>

                <div class="mb-8">
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Deskripsi</label>
                    <textarea name="deskripsi" rows="4" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">{{ old('deskripsi') }}</textarea>
                </div>

                <div class="flex justify-end gap-4 pt-4 border-t border-slate-200 dark:border-slate-800">
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-500 text-white font-bold px-8 py-3 rounded-xl transition-all shadow-lg shadow-emerald-600/30">
                        <i class="fas fa-save mr-2"></i> Simpan Budaya
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection