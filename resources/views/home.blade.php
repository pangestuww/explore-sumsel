@extends('layouts.app')

@section('title', 'Beranda - Explore Sumatera')

@section('content')

<style>
    @keyframes revealUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .reveal-1 {
        animation: revealUp 0.8s ease-out 0.1s both;
    }

    .reveal-2 {
        animation: revealUp 0.8s ease-out 0.3s both;
    }

    .reveal-3 {
        animation: revealUp 0.8s ease-out 0.5s both;
    }

    .reveal-4 {
        animation: revealUp 0.8s ease-out 0.7s both;
    }

    .reveal-5 {
        animation: revealUp 0.8s ease-out 0.9s both;
    }

    .search-glow {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .search-glow:focus-within {
        box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.2), 0 20px 40px rgba(0, 0, 0, 0.2);
        transform: scale(1.02);
        border-color: rgba(34, 197, 94, 0.6);
    }

    .card-hover {
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .card-hover:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    .scroll-reveal {
        opacity: 0;
        transform: translateY(40px);
        transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .scroll-reveal.active {
        opacity: 1;
        transform: translateY(0);
    }

    @keyframes shimmer {
        0% {
            background-position: -1000px 0;
        }

        100% {
            background-position: 1000px 0;
        }
    }

    .shimmer {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 1000px 100%;
        animation: shimmer 2s infinite;
    }

    .dark .shimmer {
        background: linear-gradient(90deg, #1e293b 25%, #334155 50%, #1e293b 75%);
        background-size: 1000px 100%;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-10px);
        }
    }

    .float-anim {
        animation: float 3s ease-in-out infinite;
    }

    @keyframes pulse-ring {
        0% {
            transform: scale(0.95);
            box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.7);
        }

        70% {
            transform: scale(1);
            box-shadow: 0 0 0 10px rgba(34, 197, 94, 0);
        }

        100% {
            transform: scale(0.95);
            box-shadow: 0 0 0 0 rgba(34, 197, 94, 0);
        }
    }

    .pulse-ring {
        animation: pulse-ring 2s infinite;
    }

    @keyframes gradient {

        0%,
        100% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }
    }

    .gradient-anim {
        background-size: 200% auto;
        animation: gradient 3s ease infinite;
    }

    .parallax-bg {
        transition: transform 0.1s ease-out;
    }

    .hero-title {
        text-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
    }

    @keyframes kategoriBounceIn {
        0% {
            opacity: 0;
            transform: translateY(40px) scale(0.8);
        }

        60% {
            opacity: 1;
            transform: translateY(-10px) scale(1.05);
        }

        100% {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .kategori-card {
        opacity: 0;
    }

    .kategori-card.loaded {
        animation: kategoriBounceIn 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
    }

    @keyframes iconFloat {

        0%,
        100% {
            transform: translateY(0) rotate(0deg);
        }

        50% {
            transform: translateY(-6px) rotate(2deg);
        }
    }

    .kategori-card.loaded .kategori-icon {
        animation: iconFloat 3s ease-in-out infinite;
        animation-delay: var(--float-delay, 0s);
    }

    .kategori-icon {
        background-size: 200% 200%;
        animation: gradientShift 4s ease infinite;
    }

    @keyframes gradientShift {

        0%,
        100% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }
    }

    .kategori-card:hover .kategori-icon {
        transform: scale(1.15) rotate(-6deg);
        box-shadow: 0 20px 30px -10px rgba(0, 0, 0, 0.3);
        animation-play-state: paused;
    }

    .kategori-card:hover .kategori-icon-inner {
        transform: rotate(360deg) scale(1.1);
    }

    .kategori-card:hover .ripple-effect {
        animation: rippleAnim 0.8s ease-out;
    }

    @keyframes rippleAnim {
        0% {
            opacity: 0.6;
            transform: scale(0.8);
        }

        100% {
            opacity: 0;
            transform: scale(1.5);
        }
    }

    .kategori-card:hover {
        transform: translateY(-8px);
    }
</style>

{{-- HERO --}}
<section id="heroSection" class="relative min-h-[700px] flex items-center overflow-hidden">
    <div class="absolute inset-0 z-0 parallax-bg" id="parallaxBg">
        <img src="https://images.unsplash.com/photo-1518509562904-e7ef99cdcc86?w=1920&q=80" alt="Sumatera" class="w-full h-[120%] object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900/95 via-slate-900/70 to-slate-900/30"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-transparent to-transparent"></div>
    </div>

    <div class="absolute inset-0 z-0 pointer-events-none">
        <div class="absolute top-24 left-24 w-2 h-2 bg-emerald-400/60 rounded-full float-anim"></div>
        <div class="absolute top-48 right-40 w-3 h-3 bg-amber-300/50 rounded-full float-anim"></div>
        <div class="absolute bottom-40 left-1/3 w-2 h-2 bg-green-400/60 rounded-full float-anim"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10 text-white py-24">
        <div class="max-w-4xl">
            <div class="reveal-1 inline-flex items-center gap-2 bg-white/[0.08] backdrop-blur-xl border border-white/[0.15] px-5 py-2.5 rounded-full mb-8 shadow-lg">
                <span class="relative flex h-2.5 w-2.5">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-400"></span>
                </span>
                <span class="text-sm font-medium tracking-wide">Jelajahi Pulau Sumatera</span>
            </div>

            <h1 class="reveal-2 text-6xl md:text-8xl font-black leading-[0.95] mb-8 tracking-tighter hero-title">
                Pesona
                <span class="block bg-gradient-to-r from-emerald-300 via-amber-200 to-emerald-300 bg-clip-text text-transparent gradient-anim italic font-serif">
                    Sumatera
                </span>
                <span class="text-white/95">Menanti.</span>
            </h1>

            <p class="reveal-3 text-lg md:text-xl mb-12 max-w-2xl text-gray-300 leading-relaxed font-light">
                Dari puncak vulkanik hingga pesisir tersembunyi — temukan keindahan alam, kekayaan budaya, dan cita rasa kuliner Pulau Sumatera.
            </p>

            <form action="{{ route('search') }}" method="GET"
                class="reveal-4 search-glow bg-white/[0.08] backdrop-blur-2xl border border-white/[0.15] rounded-2xl p-2 flex gap-2 max-w-2xl shadow-2xl">
                <div class="flex-1 flex items-center gap-3 px-5">
                    <i class="fas fa-compass text-emerald-400 text-lg" id="searchIcon"></i>
                    <input type="text" name="q" id="searchInput" placeholder="Cari destinasi, kota, atau provinsi..."
                        class="w-full bg-transparent py-3.5 outline-none text-white placeholder-white/50 font-medium">
                </div>
                <button type="submit" class="bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 text-white px-7 py-3.5 rounded-xl transition-all font-bold shadow-lg hover:shadow-emerald-500/40 hover:scale-105">
                    Cari
                </button>
            </form>

            <div class="reveal-5 flex flex-wrap gap-12 mt-14 pt-8 border-t border-white/10">
                <div>
                    <p class="text-4xl md:text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-amber-300 counter" data-target="10">0</p>
                    <p class="text-xs uppercase tracking-widest text-gray-400 font-semibold mt-1">Provinsi</p>
                </div>
                <div>
                    <p class="text-4xl md:text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-amber-300 counter" data-target="100" data-suffix="+">0</p>
                    <p class="text-xs uppercase tracking-widest text-gray-400 font-semibold mt-1">Destinasi</p>
                </div>
                <div>
                    <p class="text-4xl md:text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-amber-300 counter" data-target="50" data-suffix="+">0</p>
                    <p class="text-xs uppercase tracking-widest text-gray-400 font-semibold mt-1">Budaya</p>
                </div>
            </div>
        </div>
    </div>

    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 text-white/40 animate-bounce">
        <i class="fas fa-chevron-down text-xl"></i>
    </div>
</section>

{{-- KATEGORI --}}
<section class="container mx-auto px-6 -mt-16 relative z-20 pt-16">
    <div class="scroll-reveal bg-white dark:bg-slate-900 rounded-3xl shadow-2xl shadow-gray-900/[0.08] dark:shadow-black/40 border border-gray-100 dark:border-slate-800 p-10">
        <div class="text-center mb-8">
            <div class="inline-flex items-center gap-2 text-emerald-700 dark:text-emerald-400 text-xs font-bold uppercase tracking-[0.2em] mb-3">
                <span class="w-8 h-px bg-emerald-700 dark:bg-emerald-400"></span>
                Kategori Wisata
                <span class="w-8 h-px bg-emerald-700 dark:bg-emerald-400"></span>
            </div>
            <h2 class="text-3xl font-black text-gray-900 dark:text-white mb-2 tracking-tight">Jelajahi Berdasarkan Kategori</h2>
            <p class="text-gray-500 dark:text-slate-400">Pilih kategori wisata favoritmu</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-5">
            @php
            $kategori = [
            ['icon' => 'fa-mountain', 'label' => 'Gunung', 'url' => route('destinasi.index', ['kategori' => 'alam']), 'color' => 'from-emerald-500 to-green-600', 'delay' => 0],
            ['icon' => 'fa-water', 'label' => 'Air Terjun', 'url' => route('destinasi.index', ['kategori' => 'alam']), 'color' => 'from-cyan-500 to-blue-600', 'delay' => 150],
            ['icon' => 'fa-utensils', 'label' => 'Kuliner', 'url' => route('kuliner.index'), 'color' => 'from-orange-500 to-red-600', 'delay' => 300],
            ['icon' => 'fa-masks-theater', 'label' => 'Budaya', 'url' => route('budaya.index'), 'color' => 'from-purple-500 to-pink-600', 'delay' => 450],
            ];
            @endphp

            @foreach ($kategori as $k)
            <a href="{{ $k['url'] }}"
                class="kategori-card group relative flex flex-col items-center gap-4 p-4 rounded-2xl hover:bg-gray-50 dark:hover:bg-slate-800 transition-all duration-500"
                data-delay="{{ $k['delay'] }}">
                <div class="kategori-icon relative w-20 h-20 rounded-2xl bg-gradient-to-br {{ $k['color'] }} bg-[length:200%_200%] flex items-center justify-center shadow-lg transition-all duration-500">
                    <span class="ripple-effect absolute inset-0 rounded-2xl bg-white/30 opacity-0"></span>
                    <i class="fas {{ $k['icon'] }} text-white text-3xl transition-transform duration-500 kategori-icon-inner"></i>
                    <span class="absolute inset-0 rounded-2xl ring-2 ring-white/0 group-hover:ring-white/50 transition-all duration-300"></span>
                </div>
                <span class="relative text-sm font-bold text-gray-700 dark:text-slate-300 group-hover:text-emerald-700 dark:group-hover:text-emerald-400 transition-colors">
                    {{ $k['label'] }}
                    <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-emerald-700 group-hover:w-full transition-all duration-300"></span>
                </span>
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- DESTINASI POPULER --}}
<section class="container mx-auto px-6 py-24">
    <div class="flex items-end justify-between mb-12 scroll-reveal">
        <div>
            <div class="inline-flex items-center gap-2 text-emerald-700 dark:text-emerald-400 text-xs font-bold uppercase tracking-[0.2em] mb-3">
                <span class="w-8 h-px bg-emerald-700 dark:bg-emerald-400"></span>
                Rekomendasi Pilihan
            </div>
            <h2 class="text-5xl font-black text-gray-900 dark:text-white tracking-tight">Destinasi Populer</h2>
            <p class="text-gray-500 dark:text-slate-400 mt-3 max-w-md">Destinasi paling banyak dikunjungi wisatawan di Sumatera</p>
        </div>
        <a href="{{ route('destinasi.index') }}" class="hidden md:inline-flex items-center gap-2 px-5 py-3 bg-gray-900 dark:bg-white text-white dark:text-gray-900 rounded-xl font-bold hover:bg-emerald-700 dark:hover:bg-emerald-400 transition-all group shadow-lg">
            Lihat Semua <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse ($destinasiPopuler as $i => $d)
        @php
        $gambarUrl = $d->gambar ? (str_starts_with($d->gambar, 'http') ? $d->gambar : asset($d->gambar)) : 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=600';
        @endphp
        <a href="{{ route('destinasi.show', $d->slug) }}"
            class="scroll-reveal card-hover group bg-white rounded-3xl overflow-hidden block shadow-md border border-gray-100"
            data-delay="{{ $i * 100 }}">
            <div class="h-64 bg-gray-200 overflow-hidden relative shimmer" data-image-wrapper>
                <img src="{{ $gambarUrl }}" alt="{{ $d->nama }}" loading="lazy" class="w-full h-full object-cover group-hover:scale-110 transition duration-700" data-image>
                <div class="absolute top-4 right-4 bg-white/95 backdrop-blur-md px-3 py-1.5 rounded-full flex items-center gap-1 shadow-lg">
                    <i class="fas fa-star text-amber-500 text-xs"></i>
                    <span class="text-xs font-bold text-gray-800">{{ $d->rating }}</span>
                </div>
                <div class="absolute top-4 left-4 bg-emerald-700/90 backdrop-blur-md text-white text-[10px] font-bold px-3 py-1.5 rounded-full uppercase tracking-wider">
                    {{ $d->kategori }}
                </div>
                <div class="absolute inset-x-0 bottom-0 h-20 bg-gradient-to-t from-slate-900/80 to-transparent"></div>
                <div class="absolute bottom-4 left-4 text-white">
                    <p class="text-xs font-semibold flex items-center gap-1.5 drop-shadow">
                        <i class="fas fa-map-marker-alt text-emerald-400"></i>
                        {{ $d->kabupaten->nama }}
                    </p>
                </div>
            </div>
            <div class="p-6">
                <h3 class="font-extrabold text-xl text-gray-900 mb-2 group-hover:text-emerald-700 transition line-clamp-1">{{ $d->nama }}</h3>
                <p class="text-sm text-gray-500 line-clamp-2 mb-5 leading-relaxed">{{ Str::limit($d->deskripsi, 80) }}</p>
                <div class="flex items-center justify-between pt-5 border-t border-gray-100">
                    <div>
                        <p class="text-[10px] text-gray-400 uppercase tracking-wider font-bold">Mulai dari</p>
                        <p class="text-emerald-700 font-black text-lg">
                            {{ $d->harga_tiket == 0 ? 'Gratis' : 'Rp ' . number_format($d->harga_tiket, 0, ',', '.') }}
                        </p>
                    </div>
                    <span class="w-10 h-10 rounded-full bg-gray-100 group-hover:bg-emerald-700 flex items-center justify-center transition-all group-hover:rotate-[-45deg]">
                        <i class="fas fa-arrow-right text-gray-700 group-hover:text-white text-sm transition"></i>
                    </span>
                </div>
            </div>
        </a>
        @empty
        <p class="text-gray-500 col-span-4 text-center py-12">Belum ada destinasi.</p>
        @endforelse
    </div>
</section>

{{-- CTA PETA --}}
<section class="container mx-auto px-6 pb-24">
    <div class="scroll-reveal relative bg-gradient-to-br from-emerald-900 via-emerald-800 to-green-900 rounded-[2rem] overflow-hidden shadow-2xl">
        <div class="absolute inset-0 opacity-[0.07]" style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 24px 24px;"></div>
        <div class="absolute -top-32 -right-32 w-96 h-96 bg-emerald-500/20 rounded-full blur-3xl float-anim"></div>

        <div class="relative grid md:grid-cols-2 items-center gap-12 p-10 md:p-16">
            <div class="text-white">
                <div class="inline-flex items-center gap-2 bg-white/[0.12] backdrop-blur-md border border-white/20 px-4 py-2 rounded-full mb-6 text-xs font-bold uppercase tracking-widest">
                    <i class="fas fa-map-marked-alt pulse-ring rounded-full"></i>
                    Peta Interaktif
                </div>
                <h2 class="text-4xl md:text-5xl font-black mb-5 leading-tight tracking-tight">
                    Jelajahi Seluruh<br>
                    <span class="bg-gradient-to-r from-amber-200 to-emerald-300 bg-clip-text text-transparent">Pulau Sumatera</span>
                </h2>
                <p class="text-emerald-100/90 mb-9 max-w-md leading-relaxed text-lg font-light">Dari Sabang sampai Lampung — temukan destinasi wisata lewat peta interaktif kami.</p>
                <a href="{{ route('peta.index') }}" class="inline-flex items-center gap-2 bg-white text-emerald-900 px-8 py-4 rounded-2xl font-black hover:bg-amber-50 transition-all shadow-2xl hover:gap-3 hover:scale-[1.02]">
                    Buka Peta <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <div class="relative">
                <div class="bg-white/[0.08] backdrop-blur-xl p-3 rounded-3xl border border-white/20 hover:scale-[1.02] transition-transform duration-500 shadow-2xl">
                    <div id="homeMap" style="width: 100%; height: 320px; border-radius: 16px; overflow: hidden;"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var homeMap = L.map('homeMap', {
            center: [-2.0, 102.0],
            zoom: 5,
            minZoom: 4,
            maxZoom: 10,
            zoomControl: false,
            scrollWheelZoom: false,
            dragging: true,
            attributionControl: false,
        });
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18
        }).addTo(homeMap);

        var kota = [{
                coords: [5.5483, 95.3238],
                nama: 'Banda Aceh'
            },
            {
                coords: [3.5952, 98.6722],
                nama: 'Medan'
            },
            {
                coords: [-0.9471, 100.4171],
                nama: 'Padang'
            },
            {
                coords: [0.5071, 101.4478],
                nama: 'Pekanbaru'
            },
            {
                coords: [-1.6101, 103.6131],
                nama: 'Jambi'
            },
            {
                coords: [-3.8004, 102.2655],
                nama: 'Bengkulu'
            },
            {
                coords: [-2.9761, 104.7754],
                nama: 'Palembang'
            },
            {
                coords: [-5.3971, 105.2668],
                nama: 'Bandar Lampung'
            },
        ];
        kota.forEach(function(k) {
            L.circleMarker(k.coords, {
                radius: 6,
                fillColor: '#22c55e',
                color: '#ffffff',
                weight: 2,
                fillOpacity: 1
            }).addTo(homeMap).bindPopup('<b>' + k.nama + '</b>');
        });

        setTimeout(function() {
            homeMap.invalidateSize();
        }, 400);
        window.addEventListener('resize', function() {
            homeMap.invalidateSize();
        });

        document.querySelectorAll('[data-delay]').forEach(function(el) {
            if (!el.classList.contains('kategori-card')) el.style.transitionDelay = el.dataset.delay + 'ms';
        });

        document.querySelectorAll('[data-image]').forEach(function(img) {
            function removeShimmer() {
                var w = img.closest('[data-image-wrapper]');
                if (w) w.classList.remove('shimmer');
            }
            if (img.complete && img.naturalHeight !== 0) removeShimmer();
            else {
                img.addEventListener('load', removeShimmer);
                img.addEventListener('error', removeShimmer);
            }
        });

        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) entry.target.classList.add('active');
            });
        }, {
            threshold: 0.1
        });
        document.querySelectorAll('.scroll-reveal').forEach(function(el) {
            observer.observe(el);
        });

        var counters = document.querySelectorAll('.counter');
        var counterObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting && !entry.target.dataset.done) {
                    entry.target.dataset.done = '1';
                    animateCounter(entry.target);
                }
            });
        }, {
            threshold: 0.5
        });
        counters.forEach(function(c) {
            counterObserver.observe(c);
        });

        function animateCounter(el) {
            var target = parseInt(el.dataset.target);
            var suffix = el.dataset.suffix || '';
            var duration = 2000;
            var startTime = performance.now();

            function step(ts) {
                var p = Math.min((ts - startTime) / duration, 1);
                var e = p === 1 ? 1 : 1 - Math.pow(2, -10 * p);
                el.textContent = Math.floor(e * target) + suffix;
                if (p < 1) requestAnimationFrame(step);
                else el.textContent = target + suffix;
            }
            requestAnimationFrame(step);
        }

        var parallaxBg = document.getElementById('parallaxBg');
        if (parallaxBg) {
            window.addEventListener('scroll', function() {
                var s = window.pageYOffset;
                if (s < 700) parallaxBg.style.transform = 'translateY(' + (s * 0.3) + 'px)';
            });
        }

        var searchInput = document.getElementById('searchInput');
        var searchIcon = document.getElementById('searchIcon');
        if (searchInput && searchIcon) {
            searchInput.addEventListener('focus', function() {
                searchIcon.classList.remove('fa-compass');
                searchIcon.classList.add('fa-search-plus', 'text-amber-400');
            });
            searchInput.addEventListener('blur', function() {
                searchIcon.classList.remove('fa-search-plus', 'text-amber-400');
                searchIcon.classList.add('fa-compass');
            });
        }

        var kategoriCards = document.querySelectorAll('.kategori-card');
        var kategoriObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    var el = entry.target;
                    var delay = parseInt(el.dataset.delay) || 0;
                    setTimeout(function() {
                        el.classList.add('loaded');
                        var icon = el.querySelector('.kategori-icon');
                        if (icon) icon.style.setProperty('--float-delay', (Math.random() * 2) + 's');
                    }, delay);
                    kategoriObserver.unobserve(el);
                }
            });
        }, {
            threshold: 0.3
        });
        kategoriCards.forEach(function(card) {
            kategoriObserver.observe(card);
        });
    });
</script>

@endsection