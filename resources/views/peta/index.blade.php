@extends('layouts.app')

@section('title', 'Peta Wisata - Explore Sumatera')

@section('content')

<style>
    /* Styling Scrollbar yang mendukung Light/Dark mode */
    .sidebar-list {
        overflow-y: auto;
        background: transparent;
    }

    .sidebar-list::-webkit-scrollbar {
        width: 6px;
    }

    .sidebar-list::-webkit-scrollbar-track {
        background: #f1f5f9;
    }

    .dark .sidebar-list::-webkit-scrollbar-track {
        background: #0f172a;
    }

    .sidebar-list::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
    }

    .dark .sidebar-list::-webkit-scrollbar-thumb {
        background: #334155;
        border-radius: 10px;
    }

    .list-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 16px;
        border-bottom: 1px solid #e2e8f0;
        cursor: pointer;
        transition: all 0.2s;
    }

    .dark .list-item {
        border-bottom: 1px solid #1e293b;
    }

    .list-item:hover {
        background: #f8fafc;
    }

    .dark .list-item:hover {
        background: #1e293b;
    }

    .tab-btn {
        padding: 6px 12px;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 700;
        background: #f1f5f9;
        color: #475569;
        border: 1px solid #cbd5e1;
        transition: all 0.2s;
        white-space: nowrap;
    }

    .dark .tab-btn {
        background: #1e293b;
        color: #94a3b8;
        border: 1px solid #334155;
    }

    .tab-btn:hover {
        background: #e2e8f0;
    }

    .dark .tab-btn:hover {
        background: #334155;
    }

    .tab-btn.active {
        background: #10b981;
        color: white;
        border-color: #10b981;
    }

    .leaflet-container {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .leaflet-popup-content-wrapper {
        border-radius: 12px !important;
        padding: 0 !important;
        overflow: hidden;
        background: white;
    }

    .leaflet-popup-content {
        margin: 0 !important;
    }

    #fullMap {
        pointer-events: auto !important;
        cursor: grab;
    }

    #fullMap:active {
        cursor: grabbing;
    }

    /* Animasi Titik User */
    @keyframes pulse-ring {
        0% {
            transform: scale(0.8);
            opacity: 1;
        }

        80%,
        100% {
            transform: scale(2);
            opacity: 0;
        }
    }

    .user-location-dot {
        background: #3b82f6;
        border-radius: 50%;
        box-shadow: 0 0 10px rgba(59, 130, 246, 0.8);
        border: 2px solid white;
    }

    .user-location-pulse {
        position: absolute;
        left: -5px;
        top: -5px;
        width: 20px;
        height: 20px;
        background: rgba(59, 130, 246, 0.5);
        border-radius: 50%;
        animation: pulse-ring 2s cubic-bezier(0.215, 0.61, 0.355, 1) infinite;
    }

    /* Styling Slider Custom */
    input[type=range] {
        -webkit-appearance: none;
        width: 100%;
        background: transparent;
    }

    input[type=range]::-webkit-slider-thumb {
        -webkit-appearance: none;
        height: 18px;
        width: 18px;
        border-radius: 50%;
        background: #10b981;
        cursor: pointer;
        margin-top: -7px;
        box-shadow: 0 0 10px rgba(16, 185, 129, 0.5);
    }

    input[type=range]::-webkit-slider-runnable-track {
        width: 100%;
        height: 4px;
        cursor: pointer;
        background: #cbd5e1;
        border-radius: 2px;
    }

    .dark input[type=range]::-webkit-slider-runnable-track {
        background: #334155;
    }

    /* Z-INDEX untuk elemen melayang */
    .leaflet-control-container {
        z-index: 400 !important;
    }

    .floating-ui {
        z-index: 500 !important;
    }

    .custom-routing-panel {
        z-index: 1000 !important;
    }

    /* Styling untuk Tombol Mode Transportasi */
    .mode-btn.active {
        background-color: #2563eb !important;
        color: white !important;
    }
</style>

{{-- HERO SECTION --}}
<section class="relative min-h-[250px] md:min-h-[300px] flex items-center overflow-hidden mb-6">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1526778548025-fa2f459cd5c1?w=1920&q=80" alt="Peta Sumatera" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900/95 via-slate-900/75 to-slate-900/40"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent"></div>
    </div>
    <div class="container mx-auto px-4 md:px-6 relative z-10 py-10">
        <div class="max-w-3xl">
            <h1 class="text-3xl md:text-5xl font-black text-white mb-3 leading-[1.05] tracking-tight">
                Peta Interaktif
                <span class="block bg-gradient-to-r from-emerald-300 to-amber-200 bg-clip-text text-transparent italic font-serif">Pulau Sumatera</span>
            </h1>
            <p class="text-sm md:text-lg text-gray-300 max-w-2xl leading-relaxed font-light">
                Geser radius atau cari rute perjalanan Anda di sini.
            </p>
        </div>
    </div>
</section>

{{-- MAIN CONTENT --}}
<section class="container mx-auto px-4 md:px-6 pb-24">
    <div class="flex flex-col md:flex-row gap-6">

        {{-- SIDEBAR KIRI --}}
        <div class="w-full md:w-[380px] h-[400px] md:h-[700px] flex flex-col bg-white dark:bg-[#0f172a] rounded-2xl overflow-hidden shadow-xl border border-slate-200 dark:border-slate-800 shrink-0 transition-colors duration-300">
            <div class="p-4 border-b border-slate-200 dark:border-slate-800 shrink-0 bg-white dark:bg-[#0f172a] transition-colors duration-300">
                <h2 class="text-lg font-bold text-slate-800 dark:text-white flex items-center gap-2 mb-3">
                    <i class="fas fa-map-marked-alt text-emerald-500 dark:text-emerald-400"></i> Explore Sumatera
                </h2>

                <div class="relative mb-3">
                    <i class="fas fa-search absolute left-3 top-2.5 text-slate-400 dark:text-slate-500 text-sm"></i>
                    <input type="text" id="searchSidebar" placeholder="Cari tempat..." class="w-full bg-slate-50 dark:bg-slate-800 text-sm text-slate-800 dark:text-white pl-9 pr-3 py-2 rounded-lg border border-slate-300 dark:border-slate-700 focus:outline-none focus:border-emerald-500 transition-colors">
                </div>

                <div class="flex gap-2 overflow-x-auto pb-1">
                    <button class="tab-btn active" data-filter="semua">Semua</button>
                    <button class="tab-btn" data-filter="alam">Destinasi</button>
                    <button class="tab-btn" data-filter="budaya">Budaya</button>
                    <button class="tab-btn" data-filter="kuliner">Kuliner</button>
                </div>
            </div>

            <div class="sidebar-list flex-grow" id="listContainer">
                @foreach($semuaData as $index => $item)
                @php
                $bgIcon = 'bg-emerald-100 text-emerald-600 dark:bg-emerald-500/20 dark:text-emerald-400';
                $icon = 'fa-mountain';
                if($item['kategori'] == 'budaya') { $bgIcon = 'bg-purple-100 text-purple-600 dark:bg-purple-500/20 dark:text-purple-400'; $icon = 'fa-masks-theater'; }
                if($item['kategori'] == 'kuliner') { $bgIcon = 'bg-orange-100 text-orange-600 dark:bg-orange-500/20 dark:text-orange-400'; $icon = 'fa-utensils'; }
                @endphp
                <div class="list-item" data-index="{{ $index }}" data-kategori="{{ $item['kategori'] }}" data-nama="{{ strtolower($item['nama']) }}" data-nama-original="{{ $item['nama'] }}">
                    <div class="w-8 h-8 rounded-full {{ $bgIcon }} flex items-center justify-center shrink-0">
                        <i class="fas {{ $icon }} text-xs"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-semibold text-slate-800 dark:text-slate-200">{{ $item['nama'] }}</h4>
                        <p class="text-[11px] text-slate-500 dark:text-slate-400">{{ $item['kabupaten']['nama'] ?? 'Sumatera' }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- MAP KANAN --}}
        <div class="w-full h-[500px] md:h-[700px] relative bg-slate-100 dark:bg-[#0f172a] rounded-2xl overflow-hidden shadow-xl border border-slate-200 dark:border-slate-800 transition-colors duration-300">
            <div id="fullMap" class="w-full h-full z-0"></div>

            {{-- 🌟 TOAST NOTIFIKASI KUSTOM 🌟 --}}
            <div id="customToast" class="fixed bottom-10 left-1/2 transform -translate-x-1/2 bg-white dark:bg-slate-800 text-slate-800 dark:text-white px-6 py-3 rounded-xl shadow-2xl border border-slate-200 dark:border-slate-700 flex items-center gap-3 transition-all duration-500 opacity-0 translate-y-10 pointer-events-none z-[2000]">
                <div class="w-8 h-8 rounded-full bg-amber-100 dark:bg-amber-500/20 flex items-center justify-center shrink-0">
                    <i class="fas fa-exclamation-triangle text-amber-600 dark:text-amber-400"></i>
                </div>
                <p id="toastMessage" class="text-sm font-semibold">Pesan peringatan</p>
            </div>

            {{-- 🌟 PANEL RUTE MELAYANG (ALA GMAPS) 🌟 --}}
            <div id="customRoutePanel" class="hidden custom-routing-panel absolute top-4 left-4 w-[340px] bg-white dark:bg-slate-900 rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[calc(100%-2rem)] border border-slate-200 dark:border-slate-700 transition-colors duration-300">
                <div class="bg-white dark:bg-slate-900 p-4 border-b border-slate-200 dark:border-slate-700 flex items-center justify-between sticky top-0 z-10 transition-colors duration-300">
                    <div class="flex items-center gap-2 text-slate-800 dark:text-white">
                        <i class="fas fa-route text-blue-600 dark:text-blue-400"></i>
                        <h3 class="font-bold text-sm">Rute Perjalanan</h3>
                    </div>
                    <button onclick="tutupRute()" class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 flex items-center justify-center text-slate-500 dark:text-slate-400 transition">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                {{-- 🌟 TOMBOL PILIHAN TRANSPORTASI 🌟 --}}
                <div class="p-3 bg-slate-50 dark:bg-slate-800/50 border-b border-slate-200 dark:border-slate-700 flex gap-2 transition-colors duration-300" id="transportModes">
                    <button class="mode-btn active flex-1 py-2 rounded-lg text-xs font-bold flex flex-col items-center gap-1 transition-all" data-profile="routed-car">
                        <i class="fas fa-car text-sm"></i> Mobil
                    </button>
                    <button class="mode-btn flex-1 py-2 rounded-lg text-xs font-bold flex flex-col items-center gap-1 text-slate-500 dark:text-slate-400 hover:bg-slate-200 dark:hover:bg-slate-700 transition-all" data-profile="routed-bike">
                        <i class="fas fa-motorcycle text-sm"></i> Motor
                    </button>
                    <button class="mode-btn flex-1 py-2 rounded-lg text-xs font-bold flex flex-col items-center gap-1 text-slate-500 dark:text-slate-400 hover:bg-slate-200 dark:hover:bg-slate-700 transition-all" data-profile="routed-foot">
                        <i class="fas fa-walking text-sm"></i> Jalan
                    </button>
                </div>

                <div id="routeResultsList" class="p-3 space-y-3 overflow-y-auto" style="max-height: 400px;">
                    <div class="text-center py-6 text-slate-500 dark:text-slate-400 text-sm">
                        <i class="fas fa-spinner fa-spin text-2xl mb-2 text-blue-500"></i><br>
                        Mencari rute terbaik...
                    </div>
                </div>
            </div>

            {{-- SLIDER MELAYANG RADIUS --}}
            <div id="radiusContainer" class="hidden floating-ui absolute bottom-6 left-1/2 transform -translate-x-1/2 bg-white/95 dark:bg-slate-900/95 backdrop-blur-md px-6 py-4 rounded-full border border-slate-200 dark:border-slate-700 shadow-2xl w-[300px] md:w-[400px] transition-colors duration-300">
                <div class="flex justify-between items-center mb-2 px-1">
                    <span class="text-xs font-semibold text-slate-600 dark:text-slate-300">Radius:</span>
                    <span class="text-sm font-bold text-emerald-600 dark:text-emerald-400" id="radiusText">5 KM</span>
                </div>
                <input type="range" id="radiusSlider" min="1" max="50" value="5">
            </div>
        </div>

    </div>
</section>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />
<script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>

<div id="data-peta" data-semua="{{ json_encode($semuaData) }}" style="display: none;"></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fungsi untuk memunculkan Toast
        window.showToast = function(message) {
            var toast = document.getElementById('customToast');
            var toastMessage = document.getElementById('toastMessage');

            toastMessage.innerText = message;

            // Munculkan
            toast.classList.remove('opacity-0', 'translate-y-10', 'pointer-events-none');
            toast.classList.add('opacity-100', 'translate-y-0');

            // Hilangkan setelah 3 detik
            setTimeout(function() {
                toast.classList.remove('opacity-100', 'translate-y-0');
                toast.classList.add('opacity-0', 'translate-y-10', 'pointer-events-none');
            }, 3000);
        };
        var semuaData = JSON.parse(document.getElementById('data-peta').dataset.semua);
        var processedData = [];

        var urlParams = new URLSearchParams(window.location.search);
        var userLat = parseFloat(urlParams.get('lat'));
        var userLng = parseFloat(urlParams.get('lng'));
        var hasLocation = !isNaN(userLat) && !isNaN(userLng);

        var centerLat = hasLocation ? userLat : -1.5;
        var centerLng = hasLocation ? userLng : 102.5;
        var zoomLevel = hasLocation ? 11 : 6;

        // 🌟 BATAS MAKSIMAL: SELURUH INDONESIA 🌟
        var batasIndonesia = L.latLngBounds(
            [-11.0, 94.0], // Batas Bawah Kiri (Laut Selatan Jawa/Papua)
            [7.0, 142.0] // Batas Atas Kanan (Aceh/Papua)
        );

        var map = L.map('fullMap', {
            center: [-0.5, 101.5], // Titik tengah Sumatera
            zoom: 6, // Zoom awal pas di Sumatera
            minZoom: 5, // Bisa di-zoom out sampai kelihatan seluruh Indonesia
            maxZoom: 18,
            maxBounds: batasIndonesia, // Kunci batas geser di area Indonesia
            maxBoundsViscosity: 1.0,
            scrollWheelZoom: true
        });

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        var userCircle = null;
        var currentRadiusKm = 5;
        var userMarker = null;

        if (hasLocation) {
            document.getElementById('radiusContainer').classList.remove('hidden');

            var userIcon = L.divIcon({
                className: 'custom-user-icon',
                html: `<div style="position:relative; width:20px; height:20px;">
                        <div class="user-location-pulse"></div>
                        <div class="user-location-dot" style="width:20px; height:20px; border: 3px solid white;"></div>
                       </div>`,
                iconSize: [20, 20],
                iconAnchor: [10, 10]
            });

            userMarker = L.marker([userLat, userLng], {
                icon: userIcon,
                draggable: true
            }).addTo(map);
            userCircle = L.circle([userLat, userLng], {
                color: '#3b82f6',
                fillColor: '#3b82f6',
                fillOpacity: 0.1,
                radius: currentRadiusKm * 1000
            }).addTo(map);

            userMarker.on('dragend', function(e) {
                var newPos = e.target.getLatLng();
                userLat = newPos.lat;
                userLng = newPos.lng;
                if (userCircle) userCircle.setLatLng([userLat, userLng]);
                applyFilters();
            });
        }

        var kabupatenCoords = {
            'Banda Aceh': [5.5483, 95.3238],
            'Medan': [3.5952, 98.6722],
            'Karo': [3.1167, 98.4833],
            'Nias': [1.1667, 97.6667],
            'Mandailing Natal': [0.8500, 99.5000],
            'Simalungun': [2.8667, 99.1500],
            'Bukittinggi': [-0.3052, 100.3695],
            'Padang': [-0.9471, 100.4172],
            'Agam': [-0.2500, 100.1667],
            'Tanah Datar': [-0.4500, 100.5833],
            'Pekanbaru': [0.5071, 101.4478],
            'Siak': [0.7948, 102.0490],
            'Kampar': [0.3167, 101.0167],
            'Bengkalis': [1.4667, 102.1167],
            'Tanjung Pinang': [0.9185, 104.4516],
            'Batam': [1.1301, 104.0529],
            'Jambi': [-1.6101, 103.6131],
            'Muaro Jambi': [-1.4779, 103.6671],
            'Kerinci': [-1.8500, 101.4333],
            'Palembang': [-2.9761, 104.7754],
            'Lahat': [-3.7861, 103.5411],
            'Ogan Komering Ilir': [-3.3000, 105.2000],
            'Pangkal Pinang': [-2.1316, 106.1169],
            'Belitung': [-2.8667, 107.9167],
            'Bengkulu': [-3.8004, 102.2655],
            'Bandar Lampung': [-5.4292, 105.2610],
            'Tulang Bawang': [-4.5000, 105.5000]
        };

        var provCoords = {
            'Nanggroe Aceh Darussalam': [5.5483, 95.3238],
            'Sumatera Utara': [3.5952, 98.6722],
            'Sumatera Barat': [-0.9471, 100.4172],
            'Riau': [0.5071, 101.4478],
            'Kepulauan Riau': [0.9185, 104.4516],
            'Jambi': [-1.6101, 103.6131],
            'Sumatera Selatan': [-2.9761, 104.7754],
            'Bengkulu': [-3.8004, 102.2655],
            'Kepulauan Bangka Belitung': [-2.1316, 106.1169],
            'Lampung': [-5.4292, 105.2610]
        };

        var markerConfig = {
            'alam': {
                color1: '#10b981',
                color2: '#059669',
                shadow: 'rgba(16,185,129,0.5)',
                icon: 'fa-mountain'
            },
            'budaya': {
                color1: '#a855f7',
                color2: '#7e22ce',
                shadow: 'rgba(168,85,247,0.5)',
                icon: 'fa-masks-theater'
            },
            'kuliner': {
                color1: '#f97316',
                color2: '#ea580c',
                shadow: 'rgba(249,115,22,0.5)',
                icon: 'fa-utensils'
            }
        };

        var koordinatFallback = {
            'Masjid Raya Baiturrahman': [5.5536, 95.3172],
            'Pulau Weh': [5.8211, 95.2933],
            'Danau Toba': [2.6845, 98.8756],
            'Pulau Samosir': [2.6133, 98.8183],
            'Bukit Gundaling': [3.1993, 98.5023],
            'Jam Gadang': [-0.3052, 100.3695],
            'Danau Maninjau': [-0.3217, 100.1950],
            'Lembah Harau': [-0.1058, 100.6649],
            'Pantai Padang': [-0.9022, 100.3547],
            'Istana Siak Sri Indrapura': [0.7948, 102.0490],
            'Candi Muaro Jambi': [-1.4779, 103.6671],
            'Gunung Kerinci': [-1.6970, 101.2640],
            'Danau Kaco': [-2.3303, 101.5404],
            'Pantai Tanjung Tinggi': [-2.5333, 107.6333],
            'Pantai Parai Tenggiri': [-1.8043, 106.1284],
            'Pantai Panjang': [-3.8123, 102.2664],
            'Benteng Marlborough': [-3.7873, 102.2495],
            'Taman Nasional Way Kambas': [-4.9170, 105.7500],
            'Pantai Gigi Hiu': [-5.7518, 105.0160],
            'Jembatan Ampera': [-2.9917, 104.7635],
            'Benteng Kuto Besak': [-2.9914, 104.7592],
            'Masjid Agung Palembang': [-2.987478, 104.759973],
            'Danau Ranau': [-4.86250, 103.93056],
            'Taman Nasional Sembilang': [-1.9500, 104.5667],
            'Gunung Dempo': [-4.016, 103.121],
            'Kebun Teh Pagar Alam': [-4.0219, 103.2385],
            'Air Terjun Suban': [-3.5296, 103.7654],
            'Curup Maung': [-3.991031, 103.390944],
            'Taman Bukit Sulap': [-3.2877, 102.8549],
            'Kuliner Nanas Prabumulih': [-3.4344, 104.2354],
            'Air Terjun Sukamaju': [-3.9500, 104.7500]
        };

        var markersCluster = L.markerClusterGroup({
            maxClusterRadius: 40,
            chunkedLoading: true
        });

        var markerRefs = {};

        semuaData.forEach(function(d, index) {
            var lat = parseFloat(d.latitude);
            var lng = parseFloat(d.longitude);
            var provName = (d.kabupaten && d.kabupaten.provinsi) ? d.kabupaten.provinsi.nama : null;
            var kabName = (d.kabupaten && d.kabupaten.nama) ? d.kabupaten.nama : null;

            if (isNaN(lat) || isNaN(lng) || lat === 0 || lng === 0) {
                if (koordinatFallback[d.nama]) {
                    lat = koordinatFallback[d.nama][0];
                    lng = koordinatFallback[d.nama][1];
                } else if (kabName && kabupatenCoords[kabName]) {
                    lat = kabupatenCoords[kabName][0] + (Math.random() - 0.5) * 0.02;
                    lng = kabupatenCoords[kabName][1] + (Math.random() - 0.5) * 0.02;
                } else if (provName && provCoords[provName]) {
                    lat = provCoords[provName][0] + (Math.random() - 0.5) * 0.05;
                    lng = provCoords[provName][1] + (Math.random() - 0.5) * 0.05;
                } else {
                    lat = -0.5;
                    lng = 101.5;
                }
            }

            processedData.push({
                index: index,
                lat: lat,
                lng: lng,
                kategori: d.kategori,
                nama: d.nama
            });

            var cfg = markerConfig[d.kategori] || markerConfig['alam'];
            var detailUrl = '/' + d.kategori + '/' + d.slug;
            if (d.kategori === 'alam') detailUrl = '/destinasi/' + d.slug;

            var popupNode = document.createElement('div');
            popupNode.innerHTML = `
                <div style="min-width: 220px; padding: 12px;">
                    <span style="display: inline-block; background: ${cfg.color1}; color: white; font-size: 9px; font-weight: 800; padding: 2px 6px; border-radius: 4px; margin-bottom: 4px; text-transform: uppercase;">${d.kategori}</span>
                    <h3 style="font-weight: 800; margin: 0 0 4px 0; font-size: 14px; color: #0f172a;">${d.nama}</h3>
                    <p style="margin: 0 0 8px 0; font-size: 11px; color: #64748b;">${d.kabupaten ? d.kabupaten.nama : 'Sumatera'}</p>
                    
                    <div style="display: flex; gap: 6px; margin-top: 8px;">
                        <a href="${detailUrl}" style="flex: 1; background: ${cfg.color1}; color: white; padding: 6px; border-radius: 6px; text-align: center; text-decoration: none; font-size: 11px; font-weight: 700;">Detail</a>
                        <button class="btn-route-maps" data-lat="${lat}" data-lng="${lng}" style="flex: 1; background: #3b82f6; color: white; padding: 6px; border-radius: 6px; border: none; font-size: 11px; font-weight: 700; cursor: pointer;">Rute</button>
                    </div>
                </div>
            `;

            L.DomEvent.disableClickPropagation(popupNode);

            L.DomEvent.disableClickPropagation(popupNode);

            var btnRoute = popupNode.querySelector('.btn-route-maps');
            btnRoute.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                window.buatRute(lat, lng);
            });

            var customIcon = L.divIcon({
                html: `<div style="background: linear-gradient(135deg, ${cfg.color1}, ${cfg.color2}); width: 32px; height: 32px; border-radius: 50% 50% 50% 0; transform: rotate(-45deg); box-shadow: 0 4px 15px ${cfg.shadow}; border: 2px solid white; display: flex; align-items: center; justify-content: center;"><i class="fas ${cfg.icon}" style="transform: rotate(45deg); color: white; font-size: 13px;"></i></div>`,
                className: 'custom-marker',
                iconSize: [32, 32],
                iconAnchor: [16, 32],
                popupAnchor: [0, -32],
            });

            var marker = L.marker([lat, lng], {
                icon: customIcon
            });
            marker.bindPopup(popupNode);
            marker.originalLat = lat;
            marker.originalLng = lng;
            markerRefs[d.nama] = marker;
            markersCluster.addLayer(marker);
        });

        map.addLayer(markersCluster);

        var currentRouteLayers = [];
        var currentDestLat = null;
        var currentDestLng = null;
        var currentProfile = 'routed-car';

        window.buatRute = function(destLat, destLng) {
            if (!hasLocation) {
                showToast("Silakan klik 'Gunakan Lokasi Saya' di Dashboard dulu ya!");
                return;
            }

            currentDestLat = destLat;
            currentDestLng = destLng;

            document.getElementById('customRoutePanel').classList.remove('hidden');
            document.getElementById('radiusContainer').classList.add('hidden');
            document.getElementById('routeResultsList').innerHTML = `
                <div class="text-center py-6 text-slate-500 dark:text-slate-400 text-sm">
                    <i class="fas fa-spinner fa-spin text-2xl mb-2 text-blue-500"></i><br>Mencari rute...
                </div>
            `;
            map.closePopup();

            currentRouteLayers.forEach(function(layer) {
                map.removeLayer(layer);
            });
            currentRouteLayers = [];

            var url = `https://routing.openstreetmap.de/routed-car/route/v1/driving/${userLng},${userLat};${destLng},${destLat}?overview=full&geometries=geojson&alternatives=true`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (data.code !== 'Ok' || !data.routes || data.routes.length === 0) {
                        document.getElementById('routeResultsList').innerHTML = `<div class="text-center py-6 text-red-500 text-sm">Rute tidak ditemukan.</div>`;
                        return;
                    }

                    var routes = data.routes;
                    var listHTML = '';

                    routes.forEach(function(route, index) {
                        var distanceKm = (route.distance / 1000).toFixed(1);
                        var durationMin = 0;

                        if (currentProfile === 'routed-car') {
                            durationMin = Math.round(route.duration / 60);
                        } else if (currentProfile === 'routed-bike') {
                            durationMin = Math.round((route.duration * 0.75) / 60);
                        } else if (currentProfile === 'routed-foot') {
                            durationMin = Math.round((route.distance / 1000) / 5 * 60);
                        }

                        var isMain = (index === 0);

                        var color = isMain ? '#3b82f6' : '#94a3b8';
                        var weight = isMain ? 6 : 4;
                        var opacity = isMain ? 0.8 : 0.6;
                        var dashArray = isMain ? null : '10, 10';

                        var geoJsonLayer = L.geoJSON(route.geometry, {
                            style: {
                                color: color,
                                weight: weight,
                                opacity: opacity,
                                dashArray: dashArray
                            }
                        }).addTo(map);

                        currentRouteLayers.push(geoJsonLayer);

                        if (isMain) {
                            map.fitBounds(geoJsonLayer.getBounds(), {
                                padding: [50, 50]
                            });
                        }

                        var bgClass = isMain ? 'bg-blue-50 dark:bg-blue-900/30 border-blue-500' : 'bg-white dark:bg-slate-800 border-slate-200 dark:border-slate-700 hover:border-slate-300 dark:hover:border-slate-500';
                        var textClass = isMain ? 'text-blue-700 dark:text-blue-400' : 'text-slate-800 dark:text-slate-200';

                        var formatWaktu = durationMin > 60 ?
                            Math.floor(durationMin / 60) + ' jam ' + (durationMin % 60) + ' mnt' :
                            durationMin + ' mnt';

                        listHTML += `
                            <div class="route-card p-3 rounded-xl border ${bgClass} cursor-pointer transition mb-2" onclick="pilihRute(${index})">
                                <div class="flex justify-between items-center mb-1">
                                    <span class="text-sm font-bold ${textClass}">${formatWaktu}</span>
                                    <span class="text-xs font-semibold text-slate-500 dark:text-slate-400">${distanceKm} km</span>
                                </div>
                                <p class="text-xs text-slate-500 dark:text-slate-400 truncate">Rute ${isMain ? 'Tercepat' : 'Alternatif ' + index}</p>
                            </div>
                        `;
                    });

                    document.getElementById('routeResultsList').innerHTML = listHTML;
                })
                .catch(error => {
                    console.error("Routing error:", error);
                    document.getElementById('routeResultsList').innerHTML = `<div class="text-center py-6 text-red-500 text-sm">Gagal memuat rute.</div>`;
                });
        };

        window.pilihRute = function(index) {
            currentRouteLayers.forEach(function(layer, i) {
                var isSelected = (i === index);

                layer.setStyle({
                    color: isSelected ? '#3b82f6' : '#94a3b8',
                    weight: isSelected ? 6 : 4,
                    opacity: isSelected ? 0.8 : 0.6,
                    dashArray: isSelected ? null : '10, 10'
                });

                if (isSelected) {
                    layer.bringToFront();
                }
            });

            document.querySelectorAll('.route-card').forEach(function(el, i) {
                if (i === index) {
                    el.classList.remove('bg-white', 'dark:bg-slate-800', 'border-slate-200', 'dark:border-slate-700');
                    el.classList.add('bg-blue-50', 'dark:bg-blue-900/30', 'border-blue-500');
                } else {
                    el.classList.remove('bg-blue-50', 'dark:bg-blue-900/30', 'border-blue-500');
                    el.classList.add('bg-white', 'dark:bg-slate-800', 'border-slate-200', 'dark:border-slate-700');
                }
            });
        };

        document.querySelectorAll('.mode-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.mode-btn').forEach(b => {
                    b.classList.remove('active');
                    b.classList.remove('bg-blue-600', 'text-white');
                    b.classList.add('text-slate-500', 'dark:text-slate-400', 'hover:bg-slate-200', 'dark:hover:bg-slate-700');
                });

                this.classList.add('active');
                this.classList.remove('text-slate-500', 'dark:text-slate-400', 'hover:bg-slate-200', 'dark:hover:bg-slate-700');
                this.classList.add('bg-blue-600', 'text-white');

                currentProfile = this.getAttribute('data-profile');

                if (currentDestLat && currentDestLng) {
                    window.buatRute(currentDestLat, currentDestLng);
                }
            });
        });

        window.tutupRute = function() {
            currentRouteLayers.forEach(function(layer) {
                map.removeLayer(layer);
            });
            currentRouteLayers = [];
            document.getElementById('customRoutePanel').classList.add('hidden');
            if (hasLocation) {
                document.getElementById('radiusContainer').classList.remove('hidden');
            }
        };

        var searchInput = document.getElementById('searchSidebar');
        var tabButtons = document.querySelectorAll('.tab-btn');
        var listItems = document.querySelectorAll('.list-item');
        var currentFilter = 'semua';

        function applyFilters() {
            var bounds = map.getBounds();
            var query = searchInput.value.toLowerCase();
            var userLatLng = L.latLng(userLat, userLng);

            listItems.forEach(function(el) {
                var idx = parseInt(el.getAttribute('data-index'));
                var data = processedData[idx];
                var matchSearch = data.nama.toLowerCase().includes(query);
                var matchCategory = (currentFilter === 'semua' || data.kategori === currentFilter);

                var inArea = false;

                if (hasLocation) {
                    var itemLatLng = L.latLng(data.lat, data.lng);
                    inArea = userLatLng.distanceTo(itemLatLng) <= (currentRadiusKm * 1000);
                } else {
                    inArea = bounds.contains([data.lat, data.lng]);
                }

                if (inArea && matchSearch && matchCategory) {
                    el.style.display = 'flex';
                } else {
                    el.style.display = 'none';
                }
            });
        }

        if (hasLocation) {
            var slider = document.getElementById('radiusSlider');
            var radiusText = document.getElementById('radiusText');
            slider.addEventListener('input', function() {
                currentRadiusKm = parseInt(this.value);
                radiusText.innerText = currentRadiusKm + ' KM';
                if (userCircle) userCircle.setRadius(currentRadiusKm * 1000);
                applyFilters();
            });
        }

        map.on('moveend', applyFilters);
        searchInput.addEventListener('input', applyFilters);

        tabButtons.forEach(function(btn) {
            btn.addEventListener('click', function() {
                tabButtons.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                currentFilter = this.getAttribute('data-filter');
                applyFilters();
            });
        });

        listItems.forEach(item => {
            item.addEventListener('click', function() {
                let nama = this.getAttribute('data-nama-original');
                var marker = markerRefs[nama];
                if (marker) {
                    map.setView([marker.originalLat, marker.originalLng], 14, {
                        animate: true
                    });
                    setTimeout(function() {
                        marker.openPopup();
                    }, 400);
                }
            });
        });

        // 🌟 GLOBAL LISTENER UNTUK TOMBOL RUTE 🌟
        document.body.addEventListener('click', function(e) {
            // Cek apakah yang diklik adalah tombol rute
            if (e.target && e.target.classList.contains('btn-route-maps')) {
                e.preventDefault();
                e.stopPropagation(); // Mencegah popup tertutup

                var lat = parseFloat(e.target.getAttribute('data-lat'));
                var lng = parseFloat(e.target.getAttribute('data-lng'));

                window.buatRute(lat, lng);
            }
        });

        setTimeout(applyFilters, 500);
        setTimeout(function() {
            map.invalidateSize();
        }, 400);
    });
</script>
@endsection