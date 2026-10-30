@extends('layouts.app')

@section('title', 'Tambah Destinasi - Admin')

@section('content')

{{-- 🌟 CUSTOM CSS UNTUK SELECT2 🌟 --}}
<style>
    .select2-container--default .select2-selection--single {
        background-color: #f8fafc !important;
        border: 1px solid #cbd5e1 !important;
        border-radius: 0.75rem !important;
        height: 50px !important;
        display: flex !important;
        align-items: center !important;
        box-sizing: border-box !important;
        transition: all 0.2s !important;
    }

    .dark .select2-container--default .select2-selection--single {
        background-color: #1e293b !important;
        border-color: #334155 !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #0f172a !important;
        padding-left: 1rem !important;
        padding-right: 2.5rem !important;
        font-size: 0.875rem !important;
        line-height: normal !important;
        margin-top: 2px;
    }

    .dark .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #ffffff !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__placeholder {
        color: #94a3b8 !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 100% !important;
        right: 12px !important;
        display: flex !important;
        align-items: center !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow b {
        border-color: #64748b transparent transparent transparent !important;
    }

    .dark .select2-container--default .select2-selection--single .select2-selection__arrow b {
        border-color: #94a3b8 transparent transparent transparent !important;
    }

    .select2-container--default.select2-container--focus .select2-selection--single,
    .select2-container--default.select2-container--open .select2-selection--single {
        border-color: #10b981 !important;
        box-shadow: 0 0 0 1px #10b981 !important;
        outline: none !important;
    }

    .select2-dropdown {
        background-color: #ffffff !important;
        border: 1px solid #cbd5e1 !important;
        border-radius: 0.75rem !important;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1) !important;
        z-index: 9999 !important;
        padding: 4px !important;
        margin-top: 4px !important;
    }

    .dark .select2-dropdown {
        background-color: #0f172a !important;
        border-color: #334155 !important;
    }

    .select2-search--dropdown .select2-search__field {
        border-radius: 0.5rem !important;
        background-color: #f8fafc !important;
        border: 1px solid #cbd5e1 !important;
        color: #0f172a !important;
        padding: 0.5rem 0.75rem !important;
        margin: 4px !important;
        width: calc(100% - 8px) !important;
        outline: none !important;
    }

    .dark .select2-search--dropdown .select2-search__field {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        color: #ffffff !important;
    }

    .select2-search--dropdown .select2-search__field:focus {
        border-color: #10b981 !important;
    }

    .select2-results__option {
        padding: 8px 12px !important;
        font-size: 0.875rem !important;
        border-radius: 0.5rem !important;
        margin: 2px 4px !important;
        color: #0f172a !important;
    }

    .dark .select2-results__option {
        color: #e2e8f0 !important;
    }

    .select2-container--default .select2-results__option--highlighted.select2-results__option--selectable {
        background-color: #10b981 !important;
        color: white !important;
    }

    .select2-container--default .select2-results__option--selected {
        background-color: #e2e8f0 !important;
        color: #0f172a !important;
    }

    .dark .select2-container--default .select2-results__option--selected {
        background-color: #334155 !important;
        color: #ffffff !important;
    }

    .select2-results__group {
        font-weight: bold;
        color: #10b981;
        padding: 8px 12px 4px 12px !important;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
</style>

<div class="min-h-screen bg-slate-50 dark:bg-[#0b1120] py-10 transition-colors duration-300">
    <div class="container mx-auto px-4 md:px-6 max-w-4xl">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-black text-slate-900 dark:text-white">Tambah Destinasi</h1>
                <p class="text-slate-500 dark:text-slate-400 mt-1">Tambahkan data wisata alam baru.</p>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 px-5 py-2.5 rounded-xl font-bold hover:bg-slate-300 dark:hover:bg-slate-700 transition">
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
            <form action="{{ route('admin.destinasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Nama Destinasi</label>
                        <input type="text" name="nama" value="{{ old('nama') }}" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Provinsi</label>
                        <select id="filterProvinsi" class="w-full">
                            <option value="">-- Pilih Provinsi --</option>
                            @foreach($kabupatens->unique('provinsi_id') as $kab)
                            <option value="{{ $kab->provinsi_id }}" {{ old('provinsi_id') == $kab->provinsi_id ? 'selected' : '' }}>
                                {{ $kab->provinsi->nama ?? 'Unknown' }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Kabupaten / Kota</label>
                        <select name="kabupaten_id" id="filterKabupaten" required class="w-full">
                            <option value="">-- Pilih Kabupaten --</option>
                            @foreach($kabupatens as $kab)
                            <option value="{{ $kab->id }}" data-provinsi="{{ $kab->provinsi_id }}" {{ old('kabupaten_id') == $kab->id ? 'selected' : '' }}>
                                {{ $kab->nama }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Kategori</label>
                        <select name="kategori" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            <option value="">-- Pilih Kategori --</option>
                            <option value="alam" {{ old('kategori') == 'alam' ? 'selected' : '' }}>Alam (Destinasi)</option>
                            <option value="budaya" {{ old('kategori') == 'budaya' ? 'selected' : '' }}>Budaya</option>
                            <option value="kuliner" {{ old('kategori') == 'kuliner' ? 'selected' : '' }}>Kuliner</option>
                        </select>
                    </div>

                    {{-- 🌟 JENIS UDAH JADI INPUT TEKS BIASA 🌟 --}}
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Jenis</label>
                        <input type="text" name="jenis" value="{{ old('jenis') }}" required placeholder="Contoh: Pantai, Gunung, Tari, dll..." class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Harga Tiket (Angka)</label>
                        <input type="number" name="harga_tiket" value="{{ old('harga_tiket', 0) }}" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Upload Gambar</label>
                        <input type="file" name="gambar" accept="image/*" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 dark:file:bg-emerald-900/30 dark:file:text-emerald-400">
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Deskripsi</label>
                    <textarea name="deskripsi" rows="4" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">{{ old('deskripsi') }}</textarea>
                    <!-- Tambahan Deskripsi Bawah -->
                    <div class="mb-6">
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Deskripsi Bawah (Tambahan)</label>
                        <textarea name="deskripsi_bawah" rows="4" placeholder="Masukkan deskripsi bagian bawah di sini..." class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none"></textarea>
                    </div>
                </div>

                <div class="mb-8 p-4 bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 rounded-xl">
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">
                        <i class="fas fa-map-marked-alt text-emerald-500 mr-1"></i> Tentukan Lokasi
                    </label>
                    <div class="flex gap-2 mb-3">
                        <input type="text" id="searchLocation" placeholder="Ketik nama tempat..." class="flex-1 px-4 py-2.5 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-white focus:outline-none focus:border-emerald-500 text-sm">
                        <button type="button" id="btnSearchLocation" class="bg-emerald-600 hover:bg-emerald-500 text-white px-4 py-2.5 rounded-lg font-bold transition text-sm shadow-md">
                            <i class="fas fa-search"></i> Cari
                        </button>
                    </div>
                    <div id="mapPicker" class="w-full h-[300px] rounded-lg border border-slate-300 dark:border-slate-600 z-0 relative"></div>
                    <div class="mt-3 flex items-center justify-between bg-white dark:bg-slate-900 p-3 rounded-lg border border-slate-200 dark:border-slate-700">
                        <div class="flex items-center gap-4 text-sm font-bold text-slate-700 dark:text-slate-300">
                            <span>Lat: <span id="displayLat" class="text-emerald-600 dark:text-emerald-400">Belum dipilih</span></span>
                            <span>Lng: <span id="displayLng" class="text-emerald-600 dark:text-emerald-400">Belum dipilih</span></span>
                        </div>
                    </div>
                    <input type="hidden" name="latitude" id="inputLat" value="{{ old('latitude') }}">
                    <input type="hidden" name="longitude" id="inputLng" value="{{ old('longitude') }}">
                </div>

                <div class="flex justify-end gap-4 pt-4 border-t border-slate-200 dark:border-slate-800">
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-500 text-white font-bold px-8 py-3 rounded-xl transition-all shadow-lg shadow-emerald-600/30">
                        <i class="fas fa-save mr-2"></i> Simpan Destinasi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var provSelect = document.getElementById('filterProvinsi');
        var kabSelect = document.getElementById('filterKabupaten');
        var allKabOptions = Array.from(kabSelect.querySelectorAll('option[data-provinsi]'));

        // Inisialisasi Select2 Provinsi & Kabupaten (Jenis udah gak pake ini)
        $(provSelect).select2({
            placeholder: "-- Pilih Provinsi --",
            width: '100%'
        });
        $(kabSelect).select2({
            placeholder: "-- Pilih Kabupaten --",
            width: '100%'
        });

        function filterKabupaten() {
            var selectedProv = provSelect.value;

            // Hancurkan Select2 Kabupaten dulu biar gak bug
            $(kabSelect).select2('destroy');

            // Reset HTML select kabupaten
            kabSelect.innerHTML = '<option value="">-- Pilih Kabupaten --</option>';

            if (selectedProv !== '') {
                allKabOptions.forEach(function(opt) {
                    if (opt.getAttribute('data-provinsi') === selectedProv) {
                        kabSelect.appendChild(opt.cloneNode(true));
                    }
                });
            }

            // Bikin ulang Select2 Kabupaten
            $(kabSelect).select2({
                placeholder: "-- Pilih Kabupaten --",
                width: '100%'
            });
        }

        $(provSelect).on('change', function() {
            filterKabupaten();
        });

        var oldProvId = "{{ old('provinsi_id') }}";
        var oldKabId = "{{ old('kabupaten_id') }}";

        if (oldProvId) {
            $(provSelect).val(oldProvId).trigger('change');
            setTimeout(function() {
                if (oldKabId) {
                    $(kabSelect).val(oldKabId).trigger('change');
                }
            }, 100);
        }

        // PETA
        var map = L.map('mapPicker').setView([-2.99, 104.75], 11);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);
        var marker = L.marker([-2.99, 104.75], {
            draggable: true
        }).addTo(map);
        var inputLat = document.getElementById('inputLat');
        var inputLng = document.getElementById('inputLng');
        var displayLat = document.getElementById('displayLat');
        var displayLng = document.getElementById('displayLng');

        function updateCoords(lat, lng) {
            inputLat.value = lat;
            inputLng.value = lng;
            displayLat.innerText = lat;
            displayLng.innerText = lng;
        }

        marker.on('dragend', function(e) {
            var position = marker.getLatLng();
            updateCoords(position.lat.toFixed(6), position.lng.toFixed(6));
        });

        map.on('click', function(e) {
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;
            marker.setLatLng([lat, lng]);
            updateCoords(lat.toFixed(6), lng.toFixed(6));
        });

        if (inputLat.value && inputLng.value) {
            var oldLat = parseFloat(inputLat.value);
            var oldLng = parseFloat(inputLng.value);
            if (!isNaN(oldLat) && !isNaN(oldLng)) {
                marker.setLatLng([oldLat, oldLng]);
                map.setView([oldLat, oldLng], 14);
                displayLat.innerText = oldLat;
                displayLng.innerText = oldLng;
            }
        }

        // PENCARIAN LOKASI
        var btnSearch = document.getElementById('btnSearchLocation');
        var inputSearch = document.getElementById('searchLocation');

        btnSearch.addEventListener('click', function() {
            var query = inputSearch.value;
            if (!query) return;
            var originalBtnText = btnSearch.innerHTML;
            btnSearch.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mencari...';
            btnSearch.disabled = true;

            fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(query)}&limit=1`)
                .then(response => response.json())
                .then(data => {
                    if (data && data.length > 0) {
                        var lat = parseFloat(data[0].lat);
                        var lon = parseFloat(data[0].lon);
                        map.flyTo([lat, lon], 15, {
                            duration: 1.5
                        });
                        marker.setLatLng([lat, lon]);
                        updateCoords(lat.toFixed(6), lon.toFixed(6));
                    } else {
                        alert("Lokasi tidak ditemukan. Coba kata kunci lain.");
                    }
                })
                .catch(error => {
                    alert("Gagal menghubungi server peta.");
                })
                .finally(() => {
                    btnSearch.innerHTML = originalBtnText;
                    btnSearch.disabled = false;
                });
        });

        inputSearch.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                btnSearch.click();
            }
        });
    });
</script>
@endsection