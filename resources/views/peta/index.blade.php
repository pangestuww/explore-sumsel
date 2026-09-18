@extends('layouts.app')

@section('title', 'Peta Wisata - Explore Sumsel')

@section('content')

{{-- HEADER --}}
<section class="bg-green-800 text-white py-12">
    <div class="container mx-auto px-6">
        <nav class="text-sm mb-3 text-green-100">
            <a href="{{ route('home') }}" class="hover:text-white">Beranda</a>
            <span class="mx-2">/</span>
            <span class="text-white">Peta</span>
        </nav>
        <h1 class="text-4xl font-bold mb-2">Peta Wisata Sumatera Selatan</h1>
        <p class="text-green-100 max-w-2xl">
            Klik marker untuk melihat detail destinasi.
        </p>
    </div>
</section>

{{-- PETA --}}
<section class="container mx-auto px-6 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

        {{-- SIDEBAR: Daftar Destinasi --}}
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-lg p-4 sticky top-24 max-h-[600px] overflow-y-auto">
                <h3 class="font-bold text-gray-800 mb-3 pb-3 border-b border-gray-100">
                    <i class="fas fa-map-marked-alt text-green-700 mr-2"></i>
                    Daftar Destinasi
                    <span class="text-sm font-normal text-gray-500">({{ $destinasis->count() }})</span>
                </h3>

                <div class="space-y-2">
                    @foreach ($destinasis as $d)
                    <button
                        data-destinasi-id="{{ $d->id }}"
                        onclick="fokusDestinasi(this.dataset.destinasiId)"
                        class="w-full text-left p-3 rounded-lg hover:bg-green-50 transition border border-gray-100 hover:border-green-200">
                        <p class="font-semibold text-sm text-gray-800 truncate">
                            {{ $d->nama }}
                        </p>
                        <p class="text-xs text-gray-500 truncate">
                            <i class="fas fa-map-marker-alt mr-1"></i>
                            {{ $d->kabupaten->nama ?? 'Sumatera Selatan' }}
                        </p>
                    </button>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- MAP --}}
        <div class="lg:col-span-3">
            {{-- Data destinasi dipindah ke data-attribute biar VS Code gak merah --}}
            <div class="bg-white rounded-xl shadow-lg overflow-hidden"
                id="map-container"
                data-destinasis='@json($destinasis)'>
                <div id="map" style="height: 600px; width: 100%;"></div>
            </div>

            {{-- Legend --}}
            <div class="bg-white rounded-xl shadow-lg p-4 mt-4 flex flex-wrap items-center gap-4 text-sm">
                <span class="font-semibold text-gray-700">Keterangan:</span>
                <div class="flex items-center gap-2">
                    <div class="w-3 h-3 rounded-full bg-green-600"></div>
                    <span class="text-gray-600">Destinasi Wisata</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fas fa-info-circle text-gray-400"></i>
                    <span class="text-gray-500">Klik marker untuk detail</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Leaflet CSS & JS dari CDN --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    // ============================================
    // 1. INISIALISASI PETA
    // ============================================
    var map = L.map('map', {
        center: [-3.3194, 103.9144],
        zoom: 7,
        minZoom: 3,
        maxZoom: 18,
        worldCopyJump: false,
    });

    // ============================================
    // 2. LAYER PETA DASAR
    // ============================================

    // Peta Jalan (OSM)
    var petaJalan = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap',
        maxZoom: 19,
    });

    // Satelit (Esri World Imagery)
    var satelit = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        attribution: '© Esri, Maxar',
        maxZoom: 19,
    });

    // ============================================
    // 3. LAYER LABEL MULTI-SCALE (CartoDB)
    // ============================================
    // Satu layer ini otomatis nampilin label
    // dari negara → provinsi → kabupaten → jalan
    // sesuai zoom level
    var label = L.tileLayer('https://basemaps.cartocdn.com/rastertiles/voyager_only_labels/{z}/{x}/{y}.png', {
        attribution: '© CARTO',
        maxZoom: 20,
        maxNativeZoom: 18,
    });

    // Default: Satelit + Label
    satelit.addTo(map);
    label.addTo(map);

    // ============================================
    // 4. LAYER CONTROL
    // ============================================
    var baseLayers = {
        "Satelit": satelit,
        "Peta Jalan": petaJalan,
    };

    var overlayLayers = {
        "Label Nama Tempat": label,
    };

    L.control.layers(baseLayers, overlayLayers, {
        position: 'topright',
        collapsed: false,
    }).addTo(map);

    // ============================================
    // 5. DATA DESTINASI
    // ============================================
    var destinasis = JSON.parse(document.getElementById('map-container').dataset.destinasis);
    console.log('Total destinasi:', destinasis.length);

    var markers = {};

    // ============================================
    // 6. LOOP DESTINASI, BIKIN MARKER
    // ============================================
    destinasis.forEach(function(d) {
        if (!d.kabupaten || !d.kabupaten.latitude || !d.kabupaten.longitude) {
            console.warn('Skip - no koordinat:', d.nama);
            return;
        }

        var lat = parseFloat(d.kabupaten.latitude) + (Math.random() - 0.5) * 0.1;
        var lng = parseFloat(d.kabupaten.longitude) + (Math.random() - 0.5) * 0.1;

        var gambarUrl = (d.gambar && d.gambar.indexOf('http') === 0) ?
            d.gambar :
            '/' + d.gambar;

        var popupHtml = `
            <div style="min-width: 200px;">
                <img src="${gambarUrl}"
                     style="width: 100%; height: 100px; object-fit: cover; border-radius: 8px; margin-bottom: 8px;"
                     onerror="this.style.display='none'">
                <h3 style="font-weight: bold; margin: 0 0 4px 0; font-size: 14px;">${d.nama}</h3>
                <p style="margin: 0; font-size: 12px; color: #666;">
                    📍 ${d.kabupaten.nama}
                </p>
                <p style="margin: 4px 0 0 0; font-size: 12px; color: #f59e0b;">
                    ⭐ ${d.rating}
                </p>
                <a href="/destinasi/${d.slug}"
                   style="display: block; margin-top: 8px; background: #15803d; color: white; padding: 6px; border-radius: 4px; text-align: center; text-decoration: none; font-size: 12px;">
                    Lihat Detail →
                </a>
            </div>
        `;

        var marker = L.marker([lat, lng]).addTo(map).bindPopup(popupHtml);
        markers[d.id] = {
            marker: marker,
            lat: lat,
            lng: lng
        };
    });

    console.log('Total markers dibuat:', Object.keys(markers).length);

    // ============================================
    // 7. AUTO-FIT SETELAH RENDER
    // ============================================
    setTimeout(function() {
        map.invalidateSize();
        map.setView([-3.3194, 103.9144], 7);
    }, 200);

    // ============================================
    // 8. FUNGSI FOKUS DARI SIDEBAR
    // ============================================
    function fokusDestinasi(id) {
        if (markers[id]) {
            map.setView([markers[id].lat, markers[id].lng], 13);
            markers[id].marker.openPopup();
        }
    }
</script>

@endsection