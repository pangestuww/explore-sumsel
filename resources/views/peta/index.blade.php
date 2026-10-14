@extends('layouts.app')

@section('title', 'Peta Wisata - Explore Sumatera')

@section('content')

<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .fade-in-up {
        animation: fadeInUp 0.6s ease-out both;
    }

    .peta-item {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .peta-item:hover {
        background: linear-gradient(135deg, #ecfdf5, #f0fdf4);
        border-color: #10b981;
        transform: translateX(4px);
    }

    .dark .peta-item:hover {
        background: linear-gradient(135deg, #064e3b, #065f46);
    }

    .peta-item:hover .peta-item-arrow {
        opacity: 1;
        transform: translateX(0);
    }

    .peta-item-arrow {
        opacity: 0;
        transform: translateX(-8px);
        transition: all 0.3s ease;
    }

    .sidebar-scroll::-webkit-scrollbar {
        width: 6px;
    }

    .sidebar-scroll::-webkit-scrollbar-track {
        background: #f1f5f9;
        border-radius: 10px;
    }

    .sidebar-scroll::-webkit-scrollbar-thumb {
        background: linear-gradient(#22c55e, #15803d);
        border-radius: 10px;
    }

    .dark .sidebar-scroll::-webkit-scrollbar-track {
        background: #1e293b;
    }

    @keyframes pulse-dot {

        0%,
        100% {
            box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.7);
        }

        70% {
            box-shadow: 0 0 0 8px rgba(34, 197, 94, 0);
        }
    }

    .pulse-dot {
        animation: pulse-dot 2s infinite;
    }

    .leaflet-control-zoom {
        border-radius: 12px !important;
        border: 1px solid #e2e8f0 !important;
        box-shadow: 0 10px 30px -5px rgba(15, 23, 42, 0.15) !important;
        overflow: hidden;
    }

    .leaflet-control-zoom a {
        background: white !important;
        color: #15803d !important;
        font-weight: bold !important;
        transition: all 0.2s !important;
    }

    .dark .leaflet-control-zoom a {
        background: #1e293b !important;
        color: #10b981 !important;
    }

    .leaflet-control-zoom a:hover {
        background: #ecfdf5 !important;
        color: #14532d !important;
    }

    .dark .leaflet-control-zoom a:hover {
        background: #334155 !important;
        color: #34d399 !important;
    }

    .leaflet-popup-content-wrapper {
        border-radius: 14px !important;
        box-shadow: 0 20px 40px -10px rgba(15, 23, 42, 0.25) !important;
        padding: 0 !important;
        overflow: hidden;
        background: white;
    }

    .dark .leaflet-popup-content-wrapper {
        background: #1e293b !important;
        color: #f8fafc;
    }

    .leaflet-popup-content {
        margin: 0 !important;
        font-family: 'Plus Jakarta Sans', sans-serif !important;
    }

    .leaflet-popup-tip {
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1) !important;
    }

    .dark .leaflet-popup-tip {
        background: #1e293b !important;
    }
</style>

{{-- HERO SECTION --}}
<section class="relative min-h-[360px] flex items-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1526778548025-fa2f459cd5c1?w=1920&q=80"
            alt="Peta Sumatera"
            class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900/95 via-slate-900/75 to-slate-900/40"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10 py-14">
        <nav class="text-sm mb-5 text-gray-300 fade-in-up flex items-center gap-2">
            <a href="{{ route('home') }}" class="hover:text-emerald-400 transition">Beranda</a>
            <i class="fas fa-chevron-right text-[10px] text-gray-500"></i>
            <span class="text-white font-medium">Peta</span>
        </nav>

        <div class="max-w-3xl">
            <div class="fade-in-up inline-flex items-center gap-2 bg-white/[0.08] backdrop-blur-xl border border-white/[0.15] px-4 py-2 rounded-full mb-5"
                style="animation-delay: 0.1s;">
                <i class="fas fa-map-marked-alt text-amber-400"></i>
                <span class="text-sm text-white font-medium tracking-wide">Peta Interaktif</span>
            </div>

            <h1 class="fade-in-up text-5xl md:text-6xl font-black text-white mb-4 leading-[1.05] tracking-tight"
                style="animation-delay: 0.2s;">
                Jelajahi Sumatera
                <span class="block bg-gradient-to-r from-emerald-300 to-amber-200 bg-clip-text text-transparent italic font-serif">
                    Lewat Peta
                </span>
            </h1>

            <p class="fade-in-up text-lg text-gray-300 max-w-2xl leading-relaxed font-light"
                style="animation-delay: 0.3s;">
                Klik marker untuk melihat detail destinasi, atau pilih dari daftar di samping.
            </p>
        </div>
    </div>
</section>

{{-- PETA SECTION --}}
<section class="container mx-auto px-6 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

        {{-- SIDEBAR: Daftar Destinasi --}}
        <div class="lg:col-span-1 fade-in-up" style="animation-delay: 0.4s;">
            <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl shadow-slate-900/[0.06] dark:shadow-black/40 border border-slate-100 dark:border-slate-800 p-5 sticky top-24">
                <div class="flex items-center justify-between mb-4 pb-4 border-b border-slate-100 dark:border-slate-800">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-emerald-500 to-green-600 flex items-center justify-center shadow-md">
                            <i class="fas fa-map-pin text-white text-sm"></i>
                        </div>
                        <div>
                            <h3 class="font-extrabold text-slate-900 dark:text-white text-sm leading-tight">Daftar Destinasi</h3>
                            <p class="text-[10px] text-slate-500 dark:text-slate-400 font-bold uppercase tracking-widest">{{ $destinasis->count() }} Lokasi</p>
                        </div>
                    </div>
                </div>

                <div class="space-y-2 max-h-[560px] overflow-y-auto sidebar-scroll pr-1">
                    @foreach ($destinasis as $d)
                    @php
                    $dotColor = match(strtolower($d->kategori)) {
                    'alam' => 'bg-emerald-500',
                    'budaya' => 'bg-purple-500',
                    'kuliner' => 'bg-orange-500',
                    default => 'bg-slate-500',
                    };
                    @endphp
                    <button
                        data-destinasi-id="{{ $d->id }}"
                        onclick="fokusDestinasi(this.dataset.destinasiId)"
                        class="peta-item w-full text-left p-3 rounded-xl border border-slate-100 dark:border-slate-800 bg-white dark:bg-slate-800/50 group">
                        <div class="flex items-center justify-between gap-2">
                            <div class="min-w-0 flex-1">
                                <p class="font-bold text-sm text-slate-800 dark:text-white truncate group-hover:text-emerald-700 dark:group-hover:text-emerald-400 transition flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full {{ $dotColor }} flex-shrink-0"></span>
                                    {{ $d->nama }}
                                </p>
                                <p class="text-xs text-slate-500 dark:text-slate-400 truncate flex items-center gap-1.5 mt-0.5">
                                    <i class="fas fa-map-marker-alt text-emerald-600 dark:text-emerald-400 text-[10px]"></i>
                                    {{ $d->kabupaten->nama ?? 'Sumatera' }}
                                    @if ($d->kabupaten && $d->kabupaten->provinsi)
                                    <span class="text-slate-400">•</span>
                                    {{ $d->kabupaten->provinsi->nama }}
                                    @endif
                                </p>
                            </div>
                            <i class="fas fa-arrow-right peta-item-arrow text-emerald-600 dark:text-emerald-400 text-xs"></i>
                        </div>
                    </button>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- MAP --}}
        <div class="lg:col-span-3 fade-in-up" style="animation-delay: 0.5s;">
            <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl shadow-slate-900/[0.06] dark:shadow-black/40 border border-slate-100 dark:border-slate-800 overflow-hidden"
                id="map-container"
                data-destinasis='@json($destinasis)'>
                <div id="map" style="height: 650px; width: 100%;"></div>
            </div>

            {{-- Legend --}}
            <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl shadow-slate-900/[0.06] dark:shadow-black/40 border border-slate-100 dark:border-slate-800 p-5 mt-4 flex flex-wrap items-center gap-6">
                <span class="text-xs uppercase tracking-widest text-slate-500 dark:text-slate-400 font-bold">Keterangan:</span>

                <div class="flex items-center gap-2.5">
                    <span class="w-3 h-3 rounded-full bg-emerald-500 pulse-dot"></span>
                    <span class="text-sm font-bold text-slate-700 dark:text-slate-300">Alam</span>
                </div>

                <div class="flex items-center gap-2.5">
                    <span class="w-3 h-3 rounded-full bg-purple-500"></span>
                    <span class="text-sm font-bold text-slate-700 dark:text-slate-300">Budaya</span>
                </div>

                <div class="flex items-center gap-2.5">
                    <span class="w-3 h-3 rounded-full bg-orange-500"></span>
                    <span class="text-sm font-bold text-slate-700 dark:text-slate-300">Kuliner</span>
                </div>

                <div class="flex items-center gap-2.5">
                    <i class="fas fa-hand-pointer text-emerald-600 dark:text-emerald-400"></i>
                    <span class="text-sm text-slate-500 dark:text-slate-400">Klik marker untuk detail</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Leaflet CSS & JS dari CDN --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        // ============================================
        // 1. BATAS PETA — ASEAN
        // ============================================
        var batasASEAN = L.latLngBounds(
            [-11.0, 92.0],
            [29.0, 141.0]
        );

        // ============================================
        // 2. INISIALISASI PETA
        // ============================================
        var map = L.map('map', {
            center: [-0.5, 101.5],
            zoom: 6,
            minZoom: 4,
            maxZoom: 18,
            worldCopyJump: false,
            maxBounds: batasASEAN,
            maxBoundsViscosity: 1.0,
        });

        // ============================================
        // 3. LAYER PETA — OpenStreetMap
        // ============================================
        var petaJalan = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors',
            maxZoom: 19,
            noWrap: true,
        });

        petaJalan.addTo(map);

        // ============================================
        // 4. CONFIG MARKER PER KATEGORI
        // ============================================
        var markerConfig = {
            'alam': {
                color1: '#10b981',
                color2: '#059669',
                shadow: 'rgba(16,185,129,0.5)',
                icon: 'fa-mountain',
            },
            'budaya': {
                color1: '#a855f7',
                color2: '#7e22ce',
                shadow: 'rgba(168,85,247,0.5)',
                icon: 'fa-masks-theater',
            },
            'kuliner': {
                color1: '#f97316',
                color2: '#ea580c',
                shadow: 'rgba(249,115,22,0.5)',
                icon: 'fa-utensils',
            },
            'default': {
                color1: '#64748b',
                color2: '#475569',
                shadow: 'rgba(100,116,139,0.5)',
                icon: 'fa-map-marker-alt',
            },
        };

        // ============================================
        // 5. KOORDINAT FALLBACK (kalau DB NULL)
        // ============================================
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
            'Danau Ranau OKU Selatan': [-4.90000, 103.95000],
            'Taman Nasional Sembilang': [-1.9500, 104.5667],
            'Gunung Dempo': [-4.016, 103.121],
            'Kebun Teh Pagar Alam': [-4.0219, 103.2385],
            'Air Terjun Lematang': [-4.0219, 103.2385],
            'Air Terjun Suban': [-3.5296, 103.7654],
            'Curup Maung': [-3.991031, 103.390944],
            'Taman Bukit Sulap': [-3.2877, 102.8549],
            'Kuliner Nanas Prabumulih': [-3.4344, 104.2354],
            'Air Terjun Sukamaju': [-3.9500, 104.7500],
        };

        // ============================================
        // 6. DATA DESTINASI
        // ============================================
        var destinasis = JSON.parse(document.getElementById('map-container').dataset.destinasis);
        console.log('Total destinasi:', destinasis.length);

        var markers = {};

        // ============================================
        // 7. LOOP DESTINASI — BIKIN MARKER
        // ============================================
        destinasis.forEach(function(d) {
            var lat = parseFloat(d.latitude);
            var lng = parseFloat(d.longitude);

            if (isNaN(lat) || isNaN(lng) || lat === 0 || lng === 0) {
                if (koordinatFallback[d.nama]) {
                    lat = koordinatFallback[d.nama][0];
                    lng = koordinatFallback[d.nama][1];
                } else if (d.kabupaten && d.kabupaten.latitude && d.kabupaten.longitude) {
                    lat = parseFloat(d.kabupaten.latitude);
                    lng = parseFloat(d.kabupaten.longitude);
                } else {
                    return;
                }
            }

            var gambarUrl = (d.gambar && d.gambar.indexOf('http') === 0) ?
                d.gambar :
                '/' + d.gambar;

            var namaProvinsi = (d.kabupaten && d.kabupaten.provinsi) ?
                d.kabupaten.provinsi.nama :
                'Sumatera';

            // Warna text kategori di popup
            var kategori = (d.kategori || 'default').toLowerCase();
            var cfg = markerConfig[kategori] || markerConfig['default'];

            var popupHtml = `
                <div style="min-width: 240px; font-family: 'Plus Jakarta Sans', sans-serif;">
                    <img src="${gambarUrl}"
                         style="width: 100%; height: 120px; object-fit: cover; display: block;"
                         onerror="this.style.display='none'">
                    <div style="padding: 12px;">
                        <span style="display: inline-block; background: ${cfg.color1}; color: white; font-size: 10px; font-weight: 800; padding: 3px 8px; border-radius: 20px; margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.05em;">${d.kategori}</span>
                        <h3 style="font-weight: 800; margin: 0 0 6px 0; font-size: 15px; color: #0f172a; letter-spacing: -0.01em; line-height: 1.3;">${d.nama}</h3>
                        <p style="margin: 0 0 4px 0; font-size: 12px; color: #64748b; font-weight: 600;">
                            <span style="color: ${cfg.color1};">●</span> ${d.kabupaten.nama}, ${namaProvinsi}
                        </p>
                        <p style="margin: 0 0 10px 0; font-size: 12px; color: #f59e0b; font-weight: 700;">
                            ⭐ ${d.rating} / 5.0
                        </p>
                        <a href="/destinasi/${d.slug}"
                           style="display: block; background: linear-gradient(135deg, ${cfg.color1}, ${cfg.color2}); color: white; padding: 8px; border-radius: 8px; text-align: center; text-decoration: none; font-size: 12px; font-weight: 800; letter-spacing: 0.02em;">
                            Lihat Detail →
                        </a>
                    </div>
                </div>
            `;

            // Custom marker dengan warna + icon per kategori
            var customIcon = L.divIcon({
                html: '<div style="background: linear-gradient(135deg, ' + cfg.color1 + ', ' + cfg.color2 + '); width: 34px; height: 34px; border-radius: 50% 50% 50% 0; transform: rotate(-45deg); box-shadow: 0 4px 15px ' + cfg.shadow + '; border: 3px solid white; display: flex; align-items: center; justify-content: center;"><i class="fas ' + cfg.icon + '" style="transform: rotate(45deg); color: white; font-size: 13px;"></i></div>',
                className: 'custom-marker',
                iconSize: [34, 34],
                iconAnchor: [17, 34],
                popupAnchor: [0, -34],
            });

            var marker = L.marker([lat, lng], {
                    icon: customIcon
                })
                .addTo(map)
                .bindPopup(popupHtml, {
                    maxWidth: 260
                });

            // ✅ Zoom ke lokasi pas marker diklik
            marker.on('click', function() {
                map.flyTo([lat, lng], 13, {
                    duration: 1.2,
                    easeLinearity: 0.25
                });
            });

            markers[d.id] = {
                marker: marker,
                lat: lat,
                lng: lng
            };
        });

        console.log('Total markers dibuat:', Object.keys(markers).length);

        // ============================================
        // 8. AUTO-SET VIEW
        // ============================================
        setTimeout(function() {
            map.invalidateSize();
            map.setView([-0.5, 101.5], 6);
        }, 300);

        window.addEventListener('resize', function() {
            map.invalidateSize();
        });

        // ============================================
        // 9. FUNGSI FOKUS DARI SIDEBAR
        // ============================================
        window.fokusDestinasi = function(id) {
            if (markers[id]) {
                map.flyTo([markers[id].lat, markers[id].lng], 12, {
                    duration: 1.2
                });
                setTimeout(function() {
                    markers[id].marker.openPopup();
                }, 800);
            }
        };
    });
</script>

@endsection