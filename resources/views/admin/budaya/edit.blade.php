<form action="{{ route('admin.budaya.update', $budaya->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div>
            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Nama Budaya</label>
            <input type="text" name="nama" value="{{ old('nama', $budaya->nama) }}" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-[#1a2e29] bg-slate-50 dark:bg-[#11211d] text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Kabupaten / Kota</label>
            <select name="kabupaten_id" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-[#1a2e29] bg-slate-50 dark:bg-[#11211d] text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                <option value="">-- Pilih Kabupaten --</option>
                @foreach($kabupatens as $kab)
                <option value="{{ $kab->id }}" {{ $budaya->kabupaten_id == $kab->id ? 'selected' : '' }}>
                    {{ $kab->nama }}
                </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Jenis Budaya</label>
            <select name="jenis" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-[#1a2e29] bg-slate-50 dark:bg-[#11211d] text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                <option value="">-- Pilih Jenis --</option>
                <option value="rumah_adat" {{ $budaya->jenis == 'rumah_adat' ? 'selected' : '' }}>Rumah Adat</option>
                <option value="tari" {{ $budaya->jenis == 'tari' ? 'selected' : '' }}>Tari</option>
                <option value="pakaian" {{ $budaya->jenis == 'pakaian' ? 'selected' : '' }}>Pakaian</option>
                <option value="senjata" {{ $budaya->jenis == 'senjata' ? 'selected' : '' }}>Senjata</option>
                <option value="upacara" {{ $budaya->jenis == 'upacara' ? 'selected' : '' }}>Upacara</option>
                <option value="alat_musik" {{ $budaya->jenis == 'alat_musik' ? 'selected' : '' }}>Alat Musik</option>
            </select>
        </div>

        {{-- 🌟 TAMBAHAN INPUT BARU 🌟 --}}
        <div>
            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Harga Tiket (Angka)</label>
            <input type="number" name="harga_tiket" value="{{ old('harga_tiket', $budaya->harga_tiket ?? 0) }}" class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-[#1a2e29] bg-slate-50 dark:bg-[#11211d] text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
        </div>
        <div>
            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Jam Buka</label>
            <input type="text" name="jam_buka" value="{{ old('jam_buka', $budaya->jam_buka) }}" placeholder="Contoh: 08.00 - 17.00 WIB" class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-[#1a2e29] bg-slate-50 dark:bg-[#11211d] text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
        </div>
        <div>
            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Terbaik Dikunjungi</label>
            <input type="text" name="waktu_terbaik" value="{{ old('waktu_terbaik', $budaya->waktu_terbaik) }}" placeholder="Contoh: Pagi / Sore" class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-[#1a2e29] bg-slate-50 dark:bg-[#11211d] text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
        </div>

        <div class="md:col-span-2">
            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Ganti Gambar (Opsional)</label>
            <input type="file" name="gambar" accept="image/*" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-[#1a2e29] bg-slate-50 dark:bg-[#11211d] text-slate-900 dark:text-white focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 dark:file:bg-emerald-900/30 dark:file:text-emerald-400">
            <p class="text-xs text-slate-500 mt-1">Biarkan kosong jika tidak ingin mengganti gambar.</p>
        </div>
    </div>

    <div class="mb-6">
        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Deskripsi Atas</label>
        <textarea name="deskripsi" rows="4" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-[#1a2e29] bg-slate-50 dark:bg-[#11211d] text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">{{ old('deskripsi', $budaya->deskripsi) }}</textarea>
    </div>

    <div class="mb-6">
        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Deskripsi Bawah (Opsional)</label>
        <textarea name="deskripsi_bawah" rows="4" placeholder="Masukkan deskripsi tambahan bagian bawah..." class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-[#1a2e29] bg-slate-50 dark:bg-[#11211d] text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">{{ old('deskripsi_bawah', $budaya->deskripsi_bawah ?? '') }}</textarea>
    </div>

    <div class="mb-8 p-4 bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-800 rounded-xl">
        <label class="block text-sm font-bold text-emerald-700 dark:text-emerald-400 mb-2">
            <i class="fas fa-map-marker-alt mr-1"></i> Perbarui Lokasi (Tempel Link Google Maps)
        </label>
        <input type="text" name="link_maps" id="gmapsLink" value="{{ old('link_maps', $budaya->link_maps) }}" placeholder="Contoh: https://www.google.com/maps/@-2.982,104.723,15z" class="w-full px-4 py-3 rounded-xl border border-emerald-300 dark:border-emerald-700 bg-white dark:bg-[#0f1a18] text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none mb-2">
        <p class="text-xs text-slate-500 dark:text-slate-400">Sistem akan otomatis mengambil koordinat dari link tersebut.</p>
        <div id="coordStatus" class="mt-2 text-sm font-bold text-emerald-600 dark:text-emerald-400 {{ $budaya->latitude ? '' : 'hidden' }}">
            <i class="fas fa-check-circle"></i> Koordinat saat ini: <span id="coordDisplay">{{ $budaya->latitude }}, {{ $budaya->longitude }}</span>
        </div>
        <input type="hidden" name="latitude" id="inputLat" value="{{ old('latitude', $budaya->latitude) }}">
        <input type="hidden" name="longitude" id="inputLng" value="{{ old('longitude', $budaya->longitude) }}">
    </div>

    <div class="flex justify-end gap-4 pt-4 border-t border-slate-200 dark:border-[#1a2e29]">
        <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white font-bold px-8 py-3 rounded-xl transition-all shadow-lg shadow-blue-600/30">
            <i class="fas fa-save mr-2"></i> Simpan Perubahan
        </button>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var gmapsInput = document.getElementById('gmapsLink');
        var inputLat = document.getElementById('inputLat');
        var inputLng = document.getElementById('inputLng');
        var coordStatus = document.getElementById('coordStatus');

        if (gmapsInput) {
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
                        inputLat.value = "{{ $budaya->latitude }}";
                        inputLng.value = "{{ $budaya->longitude }}";
                        if (inputLat.value) coordStatus.innerHTML = '<i class="fas fa-check-circle"></i> Koordinat saat ini: <span>' + inputLat.value + ", " + inputLng.value + '</span>';
                        else coordStatus.classList.add('hidden');
                    }
                }
            });
        }
    });
</script>