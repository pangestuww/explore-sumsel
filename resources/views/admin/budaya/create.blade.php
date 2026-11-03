@extends('layouts.app')

@section('title', 'Tambah Budaya - Admin')

@section('content')
{{-- CSS Leaflet --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

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

                {{-- ==================================================== --}}
                {{-- PETA LOKASI & LINK GOOGLE MAPS --}}
                {{-- ==================================================== --}}
                <div class="mb-8 bg-slate-50 dark:bg-[#11211d] border border-slate-200 dark:border-[#1a2e29] rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-4 flex items-center gap-2">
                        <i class="fas fa-map-marker-alt text-emerald-500"></i> Determine Location
                    </h3>

                    {{-- 🌟 INPUT LINK DIPINDAH KE ATAS PETA AGAR LANGSUNG KELIHATAN 🌟 --}}
                    <div class="mb-4">
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">
                            <i class="fas fa-link text-emerald-500 mr-1"></i> Perbarui Lokasi (Tempel Link Google Maps)
                        </label>
                        <input type="text" name="link_maps" id="link_maps" value="{{ old('link_maps') }}" class="w-full px-4 py-3 rounded-xl border border-emerald-300 dark:border-[#1a2e29] bg-white dark:bg-[#0f1a18] text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none" placeholder="https://www.google.com/maps/...">
                        <p class="text-xs text-slate-500 mt-2">Sistem akan otomatis mengambil koordinat dari link tersebut.</p>
                    </div>

                    {{-- Container Peta --}}
                    <div id="map" style="height: 300px; width: 100%; z-index: 1;" class="rounded-xl border border-slate-300 dark:border-slate-700 mb-4"></div>

                    <input type="hidden" name="lat" id="lat" value="{{ old('lat') }}">
                    <input type="hidden" name="lng" id="lng" value="{{ old('lng') }}">

                    <div class="flex gap-4">
                        <div class="flex-1 bg-white dark:bg-[#0f1a18] px-4 py-2 rounded-lg border border-slate-200 dark:border-[#1a2e29] text-sm font-bold text-slate-700 dark:text-slate-300">
                            Lat: <span id="lat-display">{{ old('lat') ?: 'Not selected' }}</span>
                        </div>
                        <div class="flex-1 bg-white dark:bg-[#0f1a18] px-4 py-2 rounded-lg border border-slate-200 dark:border-[#1a2e29] text-sm font-bold text-slate-700 dark:text-slate-300">
                            Lng: <span id="lng-display">{{ old('lng') ?: 'Not selected' }}</span>
                        </div>
                    </div>
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

{{-- Script Leaflet --}}
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var defaultLat = parseFloat("{{ old('lat') ? old('lat') : '-2.990934' }}");
        var defaultLng = parseFloat("{{ old('lng') ? old('lng') : '104.756554' }}");
        var defaultZoom = parseInt("{{ old('lat') ? '15' : '9' }}");

        if (document.getElementById('map')) {
            var map = L.map('map').setView([defaultLat, defaultLng], defaultZoom);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            var marker = L.marker([defaultLat, defaultLng], {
                draggable: true
            }).addTo(map);

            function updateLatLng(lat, lng) {
                document.getElementById('lat').value = lat;
                document.getElementById('lng').value = lng;
                document.getElementById('lat-display').innerText = lat;
                document.getElementById('lng-display').innerText = lng;
            }

            map.on('click', function(e) {
                marker.setLatLng(e.latlng);
                updateLatLng(e.latlng.lat, e.latlng.lng);
            });

            marker.on('dragend', function() {
                var position = marker.getLatLng();
                updateLatLng(position.lat, position.lng);
            });

            // Logika mendeteksi link
            document.getElementById('link_maps').addEventListener('input', function(e) {
                var url = e.target.value;
                var regex = /@(-?\d+\.\d+),(-?\d+\.\d+)|q=(-?\d+\.\d+),(-?\d+\.\d+)/;
                var match = url.match(regex);

                if (match) {
                    var lat = match[1] ? parseFloat(match[1]) : parseFloat(match[3]);
                    var lng = match[2] ? parseFloat(match[2]) : parseFloat(match[4]);

                    if (!isNaN(lat) && !isNaN(lng)) {
                        map.setView([lat, lng], 16);
                        marker.setLatLng([lat, lng]);
                        updateLatLng(lat, lng);
                    }
                }
            });
        }
    });
</script>
@endsection