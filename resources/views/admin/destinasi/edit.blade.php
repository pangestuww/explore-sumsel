@extends('layouts.app')

@section('title', 'Edit Destinasi - Admin')

@section('content')
<div class="min-h-screen bg-slate-50 dark:bg-[#0b1120] py-10 transition-colors duration-300">
    <div class="container mx-auto px-4 md:px-6 max-w-4xl">

        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-black text-slate-900 dark:text-white">Edit Destinasi</h1>
                <p class="text-slate-500 dark:text-slate-400 mt-1">Perbarui data wisata: <strong>{{ $destinasi->nama }}</strong></p>
            </div>
            <a href="{{ route('admin.destinasi.index') }}" class="bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 px-5 py-2.5 rounded-xl font-bold hover:bg-slate-300 dark:hover:bg-slate-700 transition">
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
            <form action="{{ route('admin.destinasi.update', $destinasi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Nama Destinasi</label>
                        <input type="text" name="nama" value="{{ old('nama', $destinasi->nama) }}" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Kabupaten / Kota</label>
                        <select name="kabupaten_id" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            <option value="">-- Pilih Kabupaten --</option>
                            @foreach($kabupatens as $kab)
                            <option value="{{ $kab->id }}" {{ $destinasi->kabupaten_id == $kab->id ? 'selected' : '' }}>
                                {{ $kab->nama }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Kategori</label>
                        <select name="kategori" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            <option value="alam" {{ $destinasi->kategori == 'alam' ? 'selected' : '' }}>Alam (Destinasi)</option>
                            <option value="budaya" {{ $destinasi->kategori == 'budaya' ? 'selected' : '' }}>Budaya</option>
                            <option value="kuliner" {{ $destinasi->kategori == 'kuliner' ? 'selected' : '' }}>Kuliner</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Jenis</label>
                        <input type="text" name="jenis" value="{{ old('jenis', $destinasi->jenis) }}" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Harga Tiket (Angka)</label>
                        <input type="number" name="harga_tiket" value="{{ old('harga_tiket', $destinasi->harga_tiket) }}" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>

                    {{-- 🌟 TAMBAHAN JAM BUKA & WAKTU TERBAIK 🌟 --}}
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Jam Buka</label>
                        <input type="text" name="jam_buka" value="{{ old('jam_buka', $destinasi->jam_buka) }}" placeholder="Contoh: 08.00 - 17.00 WIB" class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Terbaik Dikunjungi</label>
                        <input type="text" name="waktu_terbaik" value="{{ old('waktu_terbaik', $destinasi->waktu_terbaik) }}" placeholder="Contoh: Pagi / Sore" class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Ganti Gambar (Opsional)</label>
                        <input type="file" name="gambar" accept="image/*" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 dark:file:bg-emerald-900/30 dark:file:text-emerald-400">
                        <p class="text-xs text-slate-500 mt-1">Biarkan kosong jika tidak ingin mengganti gambar.</p>
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Deskripsi Atas</label>
                    <textarea name="deskripsi" rows="4" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">{{ old('deskripsi', $destinasi->deskripsi) }}</textarea>
                </div>

                {{-- 🌟 DESKRIPSI BAWAH 🌟 --}}
                <div class="mb-6">
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Deskripsi Bawah (Tambahan)</label>
                    <textarea name="deskripsi_bawah" rows="4" placeholder="Masukkan deskripsi tambahan bagian bawah..." class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">{{ old('deskripsi_bawah', $destinasi->deskripsi_bawah ?? '') }}</textarea>
                </div>

                <div class="mb-8 p-4 bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-800 rounded-xl">
                    <label class="block text-sm font-bold text-emerald-700 dark:text-emerald-400 mb-2">
                        <i class="fas fa-map-marker-alt mr-1"></i> Perbarui Lokasi (Tempel Link Google Maps)
                    </label>
                    <input type="text" name="link_maps" id="gmapsLink" value="{{ old('link_maps', $destinasi->link_maps) }}" placeholder="Contoh: https://www.google.com/maps/@-2.982,104.723,15z" class="w-full px-4 py-3 rounded-xl border border-emerald-300 dark:border-emerald-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none mb-2">
                    <p class="text-xs text-slate-500 dark:text-slate-400">Sistem akan otomatis mengambil koordinat dari link tersebut.</p>
                    <div id="coordStatus" class="mt-2 text-sm font-bold text-emerald-600 dark:text-emerald-400 {{ $destinasi->latitude ? '' : 'hidden' }}">
                        <i class="fas fa-check-circle"></i> Koordinat saat ini: <span id="coordDisplay">{{ $destinasi->latitude }}, {{ $destinasi->longitude }}</span>
                    </div>
                    <input type="hidden" name="latitude" id="inputLat" value="{{ old('latitude', $destinasi->latitude) }}">
                    <input type="hidden" name="longitude" id="inputLng" value="{{ old('longitude', $destinasi->longitude) }}">
                </div>

                <div class="flex justify-end gap-4 pt-4 border-t border-slate-200 dark:border-slate-800">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white font-bold px-8 py-3 rounded-xl transition-all shadow-lg shadow-blue-600/30">
                        <i class="fas fa-save mr-2"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var gmapsInput = document.getElementById('gmapsLink');
        var inputLat = document.getElementById('inputLat');
        var inputLng = document.getElementById('inputLng');
        var coordStatus = document.getElementById('coordStatus');

        gmapsInput.addEventListener('input', function() {
            var url = this.value;
            var regexAt = /@(-?\d+\.\d+),(-?\d+\.\d+)/;
            var regexQ = /[?&]q=(-?\d+\.\d+),(-?\d+\.\d+)/;
            var regexData = /!3d(-?\d+\.\d+)!4d(-?\d+\.\d+)/;
            var match = url.match(regexAt) || url.match(regexQ) || url.match(regexData);

            if (match && match[1] && match[2]) {
                inputLat.value = match[1];
                inputLng.value = match[2];
                coordStatus.classList.remove('hidden');
                coordStatus.innerHTML = '<i class="fas fa-check-circle"></i> Koordinat baru ditemukan: <span>' + match[1] + ", " + match[2] + '</span>';
            } else {
                if (url.trim() === '') {
                    inputLat.value = "{{ $destinasi->latitude }}";
                    inputLng.value = "{{ $destinasi->longitude }}";
                    if (inputLat.value) coordStatus.innerHTML = '<i class="fas fa-check-circle"></i> Koordinat saat ini: <span>' + inputLat.value + ", " + inputLng.value + '</span>';
                    else coordStatus.classList.add('hidden');
                }
            }
        });
    });
</script>
@endsection