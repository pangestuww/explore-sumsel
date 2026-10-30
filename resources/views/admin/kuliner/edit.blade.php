<form action="{{ route('admin.kuliner.update', $kuliner->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div>
            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Nama Kuliner</label>
            <input type="text" name="nama" value="{{ old('nama', $kuliner->nama) }}" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Kabupaten / Kota</label>
            <select name="kabupaten_id" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                @foreach($kabupatens as $kab)
                <option value="{{ $kab->id }}" {{ $kuliner->kabupaten_id == $kab->id ? 'selected' : '' }}>{{ $kab->nama }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Jenis Kuliner</label>
            <select name="jenis" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                <option value="Makanan" {{ $kuliner->jenis == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                <option value="Minuman" {{ $kuliner->jenis == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                <option value="Snack" {{ $kuliner->jenis == 'Snack' ? 'selected' : '' }}>Snack</option>
                <option value="Dessert" {{ $kuliner->jenis == 'Dessert' ? 'selected' : '' }}>Dessert</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Harga (Angka)</label>
            <input type="number" name="harga" value="{{ old('harga', $kuliner->harga) }}" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
        </div>

        <div class="md:col-span-2">
            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Ganti Gambar (Opsional)</label>
            <input type="file" name="gambar" accept="image/*" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 dark:file:bg-emerald-900/30 dark:file:text-emerald-400">
            <p class="text-xs text-slate-500 mt-1">Biarkan kosong jika tidak ingin mengganti gambar.</p>
        </div>
    </div>

    <div class="mb-6">
        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Deskripsi Atas</label>
        <textarea name="deskripsi" rows="4" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">{{ old('deskripsi', $kuliner->deskripsi) }}</textarea>
    </div>

    <div class="mb-6">
        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Deskripsi Bawah (Opsional)</label>
        <textarea name="deskripsi_bawah" rows="4" placeholder="Masukkan deskripsi tambahan bagian bawah..." class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">{{ old('deskripsi_bawah', $kuliner->deskripsi_bawah ?? '') }}</textarea>
    </div>

    <div class="mb-8 p-4 bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-800 rounded-xl">
        <label class="block text-sm font-bold text-emerald-700 dark:text-emerald-400 mb-2">
            <i class="fas fa-map-marker-alt mr-1"></i> Perbarui Lokasi (Tempel Link Google Maps)
        </label>
        <input type="text" name="link_maps" id="gmapsLink" value="{{ old('link_maps', $kuliner->link_maps) }}" placeholder="Contoh: https://www.google.com/maps/@-2.982,104.723,15z" class="w-full px-4 py-3 rounded-xl border border-emerald-300 dark:border-emerald-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none mb-2">
        <p class="text-xs text-slate-500 dark:text-slate-400">Sistem akan otomatis mengambil koordinat dari link tersebut.</p>
        <div id="coordStatus" class="mt-2 text-sm font-bold text-emerald-600 dark:text-emerald-400 {{ $kuliner->latitude ? '' : 'hidden' }}">
            <i class="fas fa-check-circle"></i> Koordinat saat ini: <span id="coordDisplay">{{ $kuliner->latitude }}, {{ $kuliner->longitude }}</span>
        </div>
        <input type="hidden" name="latitude" id="inputLat" value="{{ old('latitude', $kuliner->latitude) }}">
        <input type="hidden" name="longitude" id="inputLng" value="{{ old('longitude', $kuliner->longitude) }}">
    </div>

    <div class="flex justify-end gap-4 pt-4 border-t border-slate-200 dark:border-slate-800">
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

        if(gmapsInput) {
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
                        inputLat.value = "{{ $kuliner->latitude }}";
                        inputLng.value = "{{ $kuliner->longitude }}";
                        if (inputLat.value) coordStatus.innerHTML = '<i class="fas fa-check-circle"></i> Koordinat saat ini: <span>' + inputLat.value + ", " + inputLng.value + '</span>';
                        else coordStatus.classList.add('hidden');
                    }
                }
            });
        }
    });
</script>