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

    /* 🌟 CARD DESTINASI BARU 🌟 */
    .dest-card {
        position: relative;
        display: flex;
        flex-direction: column;
        height: 100%;
        border-radius: 28px;
        overflow: hidden;
        isolation: isolate;
        background: #ffffff;
        border: 1px solid rgba(226, 232, 240, 0.9);
        box-shadow: 0 4px 6px -1px rgba(15, 23, 42, 0.05), 0 12px 28px -12px rgba(15, 23, 42, 0.12);
        transition: transform 0.55s cubic-bezier(0.2, 0.8, 0.2, 1), box-shadow 0.55s ease, border-color 0.4s ease;
    }

    .dark .dest-card {
        background: linear-gradient(180deg, #111c33 0%, #0b1325 100%);
        border-color: rgba(255, 255, 255, 0.07);
        box-shadow: 0 12px 30px -12px rgba(0, 0, 0, 0.6);
    }

    .dest-card:hover {
        transform: translateY(-10px);
        border-color: rgba(16, 185, 129, 0.55);
        box-shadow: 0 30px 60px -20px rgba(16, 185, 129, 0.35), 0 12px 24px -12px rgba(15, 23, 42, 0.25);
    }

    /* kilau cahaya yang menyapu gambar saat hover */
    .dest-shine {
        position: absolute;
        inset: 0;
        background: linear-gradient(115deg, transparent 30%, rgba(255, 255, 255, 0.28) 46%, transparent 60%);
        transform: translateX(-130%);
        transition: transform 0.9s ease;
        pointer-events: none;
    }

    .dest-card:hover .dest-shine {
        transform: translateX(130%);
    }

    /* garis aksen di dasar kartu */
    .dest-accent {
        position: absolute;
        left: 0;
        bottom: 0;
        height: 4px;
        width: 0;
        background: linear-gradient(90deg, #34d399, #fcd34d);
        transition: width 0.6s cubic-bezier(0.2, 0.8, 0.2, 1);
    }

    .dest-card:hover .dest-accent {
        width: 100%;
    }

    /* 🌟 GALERI: 2 BARIS MARQUEE ARAH BERLAWANAN 🌟 */
    .gallery-container {
        width: 100%;
        overflow: hidden;
        padding: 18px 0;
        -webkit-mask-image: linear-gradient(to right, transparent, black 8%, black 92%, transparent);
        mask-image: linear-gradient(to right, transparent, black 8%, black 92%, transparent);
    }

    .gallery-track {
        display: flex;
        width: max-content;
        will-change: transform;
        animation: galleryLeft 70s linear infinite;
    }

    .gallery-row-b {
        animation-name: galleryRight;
        animation-duration: 85s;
    }

    /* hover pada salah satu baris: baris itu berhenti */
    .gallery-container:hover .gallery-track {
        animation-play-state: paused;
    }

    @keyframes galleryLeft {
        from {
            transform: translateX(0);
        }

        to {
            transform: translateX(-50%);
        }
    }

    @keyframes galleryRight {
        from {
            transform: translateX(-50%);
        }

        to {
            transform: translateX(0);
        }
    }

    /* tiap salinan punya padding-right = gap, supaya loop mulus tanpa loncat */
    .gallery-set {
        display: flex;
        flex-shrink: 0;
        gap: 20px;
        padding-right: 20px;
    }

    .gallery-card {
        position: relative;
        flex-shrink: 0;
        width: 300px;
        height: 250px;
        border-radius: 26px;
        overflow: hidden;
        background: #1e293b;
        box-shadow: 0 12px 24px -10px rgba(15, 23, 42, 0.35);
        transition: transform 0.55s cubic-bezier(0.2, 0.8, 0.2, 1), opacity 0.4s ease, filter 0.4s ease, box-shadow 0.55s ease;
    }

    /* variasi ukuran: setiap kartu ke-2 lebih lebar */
    .gallery-set .gallery-card:nth-child(3n+2) {
        width: 390px;
    }

    /* baris kedua sedikit lebih pendek supaya terlihat berlapis */
    .gallery-row-b .gallery-card {
        width: 270px;
        height: 205px;
    }

    .gallery-row-b .gallery-set .gallery-card:nth-child(3n+2) {
        width: 340px;
    }

    /* efek fokus: kartu lain meredup saat satu kartu di-hover */
    .gallery-container:hover .gallery-card:not(:hover) {
        opacity: 0.5;
        filter: saturate(0.5) blur(1px);
    }

    .gallery-card:hover {
        transform: translateY(-10px) scale(1.04);
        z-index: 5;
        box-shadow: 0 30px 50px -15px rgba(16, 185, 129, 0.45), 0 0 0 2px rgba(52, 211, 153, 0.6);
    }

    .gallery-card .g-info {
        transform: translateY(26px);
        transition: transform 0.5s cubic-bezier(0.2, 0.8, 0.2, 1);
    }

    .gallery-card:hover .g-info {
        transform: translateY(0);
    }

    .gallery-card .g-more {
        opacity: 0;
        transition: opacity 0.4s ease 0.05s;
    }

    .gallery-card:hover .g-more {
        opacity: 1;
    }

    .gallery-card .g-arrow {
        opacity: 0;
        transform: scale(0.5) rotate(-90deg);
        transition: all 0.45s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .gallery-card:hover .g-arrow {
        opacity: 1;
        transform: scale(1) rotate(-45deg);
    }

    @media (max-width: 640px) {
        .gallery-card {
            width: 230px;
            height: 190px;
            border-radius: 20px;
        }

        .gallery-set .gallery-card:nth-child(3n+2) {
            width: 290px;
        }

        .gallery-row-b .gallery-card {
            width: 210px;
            height: 165px;
        }

        .gallery-row-b .gallery-set .gallery-card:nth-child(3n+2) {
            width: 260px;
        }

        .gallery-set {
            gap: 14px;
            padding-right: 14px;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .gallery-track {
            animation: none;
        }

        .gallery-container {
            overflow-x: auto;
        }
    }
</style>

{{-- HERO --}}
<section id="heroSection" class="relative min-h-[700px] flex items-center overflow-hidden">
    <div class="absolute inset-0 z-0 parallax-bg" id="parallaxBg">
        <img src="https://i0.wp.com/www.infobudaya.net/wp-content/uploads/2021/04/large-holbung-hill-view-at-toba-lake-sumatera-indonesia-0c6f46cefbcf08ccb86f5df01e34be43.jpg?fit=1200%2C675&ssl=1" alt="Pemandangan Danau Toba, Sumatera Utara" class="w-full h-[120%] object-cover object-center">
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

            <form action="{{ route('search') }}" method="GET" class="reveal-4 search-glow bg-white/[0.08] backdrop-blur-2xl border border-white/[0.15] rounded-2xl p-2 flex gap-2 max-w-2xl shadow-2xl">
                <div class="flex-1 flex items-center gap-3 px-5">
                    <i class="fas fa-compass text-emerald-400 text-lg" id="searchIcon"></i>
                    <input type="text" name="q" id="searchInput" placeholder="Cari destinasi, kota, atau provinsi..." class="w-full bg-transparent py-3.5 outline-none text-white placeholder-white/50 font-medium">
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
    <div class="scroll-reveal bg-white/90 dark:bg-slate-900/90 backdrop-blur-xl rounded-[2rem] shadow-2xl shadow-gray-900/10 dark:shadow-black/50 border border-gray-100 dark:border-slate-800 p-3 md:p-4">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4">
            @php
            $kategori = [
            ['icon' => 'fa-map-marker-alt', 'label' => 'Destinasi', 'sub' => 'Tempat wisata pilihan', 'url' => route('destinasi.index'), 'color' => 'from-emerald-500 to-green-600', 'glow' => 'group-hover:shadow-emerald-500/40', 'delay' => 0],
            ['icon' => 'fa-masks-theater', 'label' => 'Budaya', 'sub' => 'Tradisi & kesenian', 'url' => route('budaya.index'), 'color' => 'from-purple-500 to-pink-600', 'glow' => 'group-hover:shadow-purple-500/40', 'delay' => 150],
            ['icon' => 'fa-utensils', 'label' => 'Kuliner', 'sub' => 'Cita rasa khas daerah', 'url' => route('kuliner.index'), 'color' => 'from-orange-500 to-red-600', 'glow' => 'group-hover:shadow-orange-500/40', 'delay' => 300],
            ['icon' => 'fa-route', 'label' => 'Jelajahi', 'sub' => 'Temukan petualanganmu', 'url' => route('destinasi.index'), 'color' => 'from-blue-500 to-cyan-600', 'glow' => 'group-hover:shadow-blue-500/40', 'delay' => 450],
            ];
            @endphp

            @foreach ($kategori as $k)
            <a href="{{ $k['url'] }}" class="kategori-card group block" data-delay="{{ $k['delay'] }}">
                {{-- Efek hover ada di div dalam, supaya tidak bentrok dengan animasi masuk di kartu luar --}}
                <div class="relative h-full flex flex-col md:flex-row items-center gap-3 md:gap-4 p-4 md:p-5 rounded-3xl overflow-hidden text-center md:text-left bg-gray-50 dark:bg-slate-800/60 border border-gray-100 dark:border-white/5 transition-all duration-500 ease-out group-hover:-translate-y-2 group-hover:shadow-2xl {{ $k['glow'] }} group-hover:border-transparent">

                    {{-- Warna penuh yang muncul saat hover --}}
                    <span class="absolute inset-0 bg-gradient-to-br {{ $k['color'] }} opacity-0 group-hover:opacity-100 transition-opacity duration-500"></span>

                    {{-- Kilau yang menyapu --}}
                    <span class="pointer-events-none absolute inset-y-0 -left-1/2 w-1/2 skew-x-12 bg-gradient-to-r from-transparent via-white/25 to-transparent -translate-x-full group-hover:translate-x-[320%] transition-transform duration-1000 ease-out"></span>

                    {{-- Ikon besar samar --}}
                    <i class="fas {{ $k['icon'] }} absolute -right-3 -bottom-5 text-7xl leading-none text-gray-900/[0.04] dark:text-white/[0.04] group-hover:text-white/20 group-hover:scale-125 group-hover:-rotate-12 transition-all duration-700 pointer-events-none"></i>

                    {{-- Ikon utama --}}
                    <div class="kategori-icon relative z-10 w-16 h-16 md:w-[4.5rem] md:h-[4.5rem] shrink-0 rounded-2xl bg-gradient-to-br {{ $k['color'] }} bg-[length:200%_200%] flex items-center justify-center shadow-lg transition-all duration-500 group-hover:bg-none group-hover:bg-white/20 group-hover:ring-4 group-hover:ring-white/30">
                        <span class="ripple-effect absolute inset-0 rounded-2xl bg-white/30 opacity-0"></span>
                        <i class="fas {{ $k['icon'] }} text-white text-2xl md:text-3xl kategori-icon-inner transition-transform duration-500"></i>
                    </div>

                    {{-- Teks --}}
                    <div class="relative z-10 flex-1 min-w-0">
                        <p class="text-base md:text-lg font-extrabold text-gray-800 dark:text-white group-hover:text-white transition-colors">{{ $k['label'] }}</p>
                        <p class="text-[11px] md:text-xs text-gray-500 dark:text-slate-400 group-hover:text-white/85 transition-colors leading-snug mt-0.5">{{ $k['sub'] }}</p>
                    </div>

                    {{-- Panah --}}
                    <span class="relative z-10 hidden xl:flex w-9 h-9 shrink-0 rounded-full bg-white dark:bg-slate-700 text-gray-500 dark:text-slate-300 group-hover:bg-white group-hover:text-gray-900 items-center justify-center shadow-sm transition-all duration-300 group-hover:translate-x-1 group-hover:-rotate-45">
                        <i class="fas fa-arrow-right text-xs"></i>
                    </span>
                </div>
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

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-7">
        @forelse ($destinasiPopuler as $i => $d)
        @php
        // 🌟 FIX: TAMBAHKAN 'storage/' DI SINI 🌟
        $gambarUrl = $d->gambar ? (str_starts_with($d->gambar, 'http') ? $d->gambar : asset('storage/' . $d->gambar)) : 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=600';
        @endphp

        {{-- Wrapper terpisah: scroll-reveal di luar, hover di dalam (supaya animasinya tidak bentrok) --}}
        <div class="scroll-reveal h-full" data-delay="{{ $i * 100 }}">
            <a href="{{ route('destinasi.show', $d->slug) }}" class="dest-card group">

                {{-- GAMBAR --}}
                <div class="relative h-60 overflow-hidden bg-gray-200 dark:bg-slate-800 shimmer" data-image-wrapper>
                    <img src="{{ $gambarUrl }}" alt="{{ $d->nama }}" loading="lazy" class="w-full h-full object-cover transition-transform duration-[900ms] ease-out group-hover:scale-110 group-hover:rotate-1" data-image>

                    {{-- Overlay gradasi --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/85 via-slate-950/10 to-slate-950/30"></div>
                    <div class="dest-shine"></div>

                    {{-- Badge kategori (kiri atas) --}}
                    <div class="absolute top-4 left-4 inline-flex items-center gap-1.5 bg-black/30 backdrop-blur-md border border-white/25 text-white text-[10px] font-bold uppercase tracking-wider pl-2.5 pr-3 py-1.5 rounded-full">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 shadow-[0_0_8px_rgba(52,211,153,0.9)]"></span>
                        {{ $d->kategori }}
                    </div>

                    {{-- Rating (kanan atas) --}}
                    <div class="absolute top-4 right-4 inline-flex items-center gap-1 bg-white/95 backdrop-blur-md px-2.5 py-1.5 rounded-full shadow-lg">
                        <i class="fas fa-star text-amber-500 text-[10px]"></i>
                        <span class="text-xs font-extrabold text-gray-800">{{ $d->rating }}</span>
                    </div>

                    {{-- Nomor urut (dekoratif) --}}
                    <span class="absolute bottom-3 right-5 text-5xl font-black leading-none text-white/20 select-none transition-all duration-500 group-hover:text-white/40 group-hover:-translate-y-1">{{ sprintf('%02d', $i + 1) }}</span>

                    {{-- Lokasi (kiri bawah) --}}
                    <div class="absolute bottom-4 left-4 inline-flex items-center gap-1.5 bg-white/15 backdrop-blur-md border border-white/20 text-white text-xs font-semibold px-3 py-1.5 rounded-full">
                        <i class="fas fa-location-dot text-emerald-300 text-[11px]"></i>
                        {{ $d->kabupaten->nama }}
                    </div>
                </div>

                {{-- ISI KARTU --}}
                <div class="flex flex-col flex-1 p-6 pt-5">
                    <h3 class="font-extrabold text-xl leading-snug text-gray-900 dark:text-white group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors line-clamp-1">{{ $d->nama }}</h3>
                    <p class="text-sm text-gray-500 dark:text-slate-400 leading-relaxed mt-2 mb-5 line-clamp-2 flex-1">{{ Str::limit($d->deskripsi, 80) }}</p>

                    {{-- Footer: harga + tombol detail --}}
                    <div class="flex items-center justify-between gap-3 pt-4 border-t border-dashed border-gray-200 dark:border-slate-700/70">
                        <div>
                            <p class="text-[10px] text-gray-400 dark:text-slate-500 uppercase tracking-widest font-bold mb-0.5">Tiket masuk</p>
                            @if($d->harga_tiket == 0)
                            <span class="inline-flex items-center gap-1.5 bg-emerald-50 dark:bg-emerald-500/15 text-emerald-700 dark:text-emerald-400 font-extrabold text-sm px-3 py-1 rounded-full">
                                <i class="fas fa-ticket text-xs"></i> Gratis
                            </span>
                            @else
                            <p class="text-emerald-700 dark:text-emerald-400 font-black text-lg leading-none">
                                Rp {{ number_format($d->harga_tiket, 0, ',', '.') }}
                            </p>
                            @endif
                        </div>

                        <span class="inline-flex items-center gap-2 pl-4 pr-1.5 py-1.5 rounded-full bg-gray-100 dark:bg-white/5 text-gray-700 dark:text-slate-300 text-xs font-bold group-hover:bg-emerald-600 group-hover:text-white transition-all duration-300">
                            Detail
                            <span class="w-7 h-7 rounded-full bg-white dark:bg-slate-700 text-gray-700 dark:text-white group-hover:bg-white/25 group-hover:text-white flex items-center justify-center transition-all duration-300 group-hover:rotate-[-45deg]">
                                <i class="fas fa-arrow-right text-[10px]"></i>
                            </span>
                        </span>
                    </div>
                </div>

                <span class="dest-accent"></span>
            </a>
        </div>
        @empty
        <p class="text-gray-500 col-span-4 text-center py-12">Belum ada destinasi.</p>
        @endforelse
    </div>
</section>

{{-- CTA JELAJAHI WISATA --}}
<section class="container mx-auto px-6 pb-24">
    <div class="scroll-reveal relative bg-gradient-to-br from-emerald-900 via-emerald-800 to-green-900 rounded-[2rem] overflow-hidden shadow-2xl">
        <div class="absolute inset-0 opacity-[0.07]" style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 24px 24px;"></div>
        <div class="absolute -top-32 -right-32 w-96 h-96 bg-emerald-500/20 rounded-full blur-3xl float-anim"></div>
        <div class="absolute -bottom-32 -left-32 w-80 h-80 bg-amber-400/10 rounded-full blur-3xl"></div>

        <div class="relative p-8 md:p-14">
            <div class="max-w-2xl mx-auto text-center text-white mb-10">
                <div class="inline-flex items-center gap-2 bg-white/[0.12] backdrop-blur-md border border-white/20 px-4 py-2 rounded-full mb-6 text-xs font-bold uppercase tracking-widest">
                    <i class="fas fa-compass text-amber-300"></i>
                    Temukan Petualanganmu
                </div>
                <h2 class="text-4xl md:text-5xl font-black mb-5 leading-tight tracking-tight">
                    Mau Liburan <br>
                    <span class="bg-gradient-to-r from-amber-200 to-emerald-300 bg-clip-text text-transparent">ke Mana?</span>
                </h2>
                <p class="text-emerald-100/90 max-w-xl mx-auto leading-relaxed text-base md:text-lg font-light">
                    Setiap sudut Sumatera menyimpan cerita. Pilih pengalaman wisata favoritmu dan temukan tempat yang paling sesuai untuk petualangan berikutnya.
                </p>
            </div>

            @php
            $kartuWisata = [
                [
                    'judul' => 'Wisata Alam',
                    'desk' => 'Jelajahi keindahan gunung, danau, air terjun, dan panorama alam Sumatera.',
                    'url' => route('destinasi.index'),
                    'ikon' => 'fa-mountain',
                    'ikonBg' => 'bg-emerald-500 shadow-emerald-900/40',
                    'grad' => 'from-emerald-400/25 to-emerald-950/40',
                    'glow' => 'hover:shadow-emerald-400/25',
                    'cta' => 'Jelajahi Alam',
                    'chips' => ['Gunung', 'Danau', 'Air Terjun'],
                ],
                [
                    'judul' => 'Wisata Budaya',
                    'desk' => 'Kenali tradisi, kesenian, rumah adat, dan warisan budaya masyarakat Sumatera.',
                    'url' => route('budaya.index'),
                    'ikon' => 'fa-masks-theater',
                    'ikonBg' => 'bg-purple-500 shadow-purple-900/40',
                    'grad' => 'from-purple-400/25 to-purple-950/30',
                    'glow' => 'hover:shadow-purple-400/25',
                    'cta' => 'Jelajahi Budaya',
                    'chips' => ['Tari', 'Rumah Adat', 'Tradisi'],
                ],
                [
                    'judul' => 'Wisata Kuliner',
                    'desk' => 'Nikmati cita rasa khas Sumatera dari makanan tradisional hingga kuliner legendaris.',
                    'url' => route('kuliner.index'),
                    'ikon' => 'fa-utensils',
                    'ikonBg' => 'bg-orange-500 shadow-orange-900/40',
                    'grad' => 'from-orange-400/25 to-orange-950/30',
                    'glow' => 'hover:shadow-orange-400/25',
                    'cta' => 'Jelajahi Kuliner',
                    'chips' => ['Makanan Khas', 'Jajanan', 'Legendaris'],
                ],
                [
                    'judul' => 'Semua Destinasi',
                    'desk' => 'Temukan berbagai pilihan tempat wisata menarik untuk perjalananmu berikutnya.',
                    'url' => route('destinasi.index'),
                    'ikon' => 'fa-route',
                    'ikonBg' => 'bg-amber-500 shadow-amber-900/40',
                    'grad' => 'from-amber-300/25 to-amber-900/30',
                    'glow' => 'hover:shadow-amber-300/25',
                    'cta' => 'Lihat Destinasi',
                    'chips' => ['Alam', 'Budaya', 'Kuliner'],
                ],
            ];
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                @foreach($kartuWisata as $k)
                <a href="{{ $k['url'] }}" class="group relative flex flex-col h-full overflow-hidden rounded-3xl p-6 border border-white/15 bg-gradient-to-br {{ $k['grad'] }} backdrop-blur-md transition-all duration-500 hover:-translate-y-2 hover:border-white/40 hover:shadow-2xl {{ $k['glow'] }}">

                    {{-- Ikon besar sebagai watermark --}}
                    <i class="fas {{ $k['ikon'] }} absolute -right-5 -bottom-8 text-[9rem] leading-none text-white/[0.06] transition-all duration-700 group-hover:text-white/[0.13] group-hover:scale-110 group-hover:-rotate-12 pointer-events-none"></i>

                    {{-- Kilau yang menyapu saat hover --}}
                    <span class="pointer-events-none absolute inset-y-0 -left-1/2 w-1/2 skew-x-12 bg-gradient-to-r from-transparent via-white/15 to-transparent -translate-x-full group-hover:translate-x-[300%] transition-transform duration-1000 ease-out"></span>

                    {{-- Nomor --}}
                    <span class="absolute top-6 right-6 text-xs font-black tracking-[0.25em] text-white/30 group-hover:text-white/70 transition-colors">0{{ $loop->iteration }}</span>

                    {{-- Ikon kategori --}}
                    <div class="relative w-14 h-14 rounded-2xl {{ $k['ikonBg'] }} flex items-center justify-center mb-6 shadow-lg ring-4 ring-white/10 transition-all duration-500 group-hover:scale-110 group-hover:-rotate-6">
                        <i class="fas {{ $k['ikon'] }} text-white text-2xl"></i>
                    </div>

                    <h3 class="relative text-white text-xl font-extrabold mb-2">{{ $k['judul'] }}</h3>
                    <p class="relative text-emerald-50/70 text-sm leading-relaxed mb-5 flex-1">{{ $k['desk'] }}</p>

                    {{-- Chip isi kategori --}}
                    <div class="relative flex flex-wrap gap-1.5 mb-5">
                        @foreach($k['chips'] as $chip)
                        <span class="text-[10px] font-semibold uppercase tracking-wider text-white/80 bg-white/10 border border-white/15 px-2.5 py-1 rounded-full group-hover:bg-white/20 transition-colors">{{ $chip }}</span>
                        @endforeach
                    </div>

                    {{-- CTA (selalu sejajar di dasar kartu) --}}
                    <div class="relative mt-auto flex items-center justify-between pt-4 border-t border-white/15 text-sm font-bold text-emerald-100 group-hover:text-white transition-colors">
                        <span>{{ $k['cta'] }}</span>
                        <span class="w-8 h-8 rounded-full bg-white/15 group-hover:bg-white group-hover:text-emerald-800 flex items-center justify-center transition-all duration-300 group-hover:translate-x-1 group-hover:-rotate-45">
                            <i class="fas fa-arrow-right text-xs"></i>
                        </span>
                    </div>
                </a>
                @endforeach
            </div>

            <div class="text-center mt-10">
                <p class="text-emerald-100/70 text-sm mb-4">Petualangan terbaikmu di Sumatera dimulai dari sini.</p>
                <a href="{{ route('destinasi.index') }}" class="inline-flex items-center gap-3 bg-white text-emerald-900 px-8 py-4 rounded-2xl font-extrabold hover:bg-amber-50 transition-all shadow-xl hover:scale-105">
                    Temukan Destinasi <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- 🌟 GALERI KEINDAHAN (1 BARIS MARQUEE) 🌟 --}}
<section class="relative py-24 bg-slate-50 dark:bg-slate-950 overflow-hidden transition-colors duration-300">
    {{-- Dekorasi latar --}}
    <div class="absolute -top-24 left-1/4 w-96 h-96 bg-emerald-400/10 dark:bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-24 right-1/4 w-96 h-96 bg-amber-300/10 dark:bg-amber-400/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="container mx-auto px-6 mb-14 text-center relative scroll-reveal">
        <div class="inline-flex items-center gap-2 text-emerald-700 dark:text-emerald-400 text-xs font-bold uppercase tracking-[0.2em] mb-3">
            <span class="w-8 h-px bg-emerald-700 dark:bg-emerald-400"></span>
            Galeri Keindahan
            <span class="w-8 h-px bg-emerald-700 dark:bg-emerald-400"></span>
        </div>
        <h2 class="text-4xl md:text-5xl font-black text-gray-900 dark:text-white tracking-tight">Momen di Sumatera</h2>
        <p class="text-gray-500 dark:text-slate-400 mt-3 max-w-md mx-auto">Arahkan kursor ke gambar untuk menghentikan galeri dan melihat detailnya.</p>
    </div>

    @php
    $galeriItems = isset($galeriDestinasi) ? $galeriDestinasi->values() : collect();
    $jumlahGaleri = $galeriItems->count();
    $dasarGaleri = collect();
    if ($jumlahGaleri > 0) {
    // ulangi data kalau sedikit, supaya marquee selalu penuh di layar lebar
    for ($r = 0; $r < (int) ceil(8 / $jumlahGaleri); $r++) {
        $dasarGaleri=$dasarGaleri->concat($galeriItems);
        }
        }
        $barisGaleri = [
        ['class' => 'gallery-row-a', 'items' => $dasarGaleri],
        ];
        @endphp

        @if($jumlahGaleri > 0)
        <div class="relative space-y-2 md:space-y-3">
            @foreach($barisGaleri as $baris)
            <div class="gallery-container">
                <div class="gallery-track {{ $baris['class'] }}">
                    {{-- Dua salinan identik agar loop tanpa putus --}}
                    @foreach([0, 1] as $salinan)
                    <div class="gallery-set" @if($salinan) aria-hidden="true" @endif>
                        @foreach($baris['items'] as $d)
                        @php
                        $galeriGambar = $d->gambar ? (str_starts_with($d->gambar, 'http') ? $d->gambar : asset('storage/' . $d->gambar)) : 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=600';
                        @endphp
                        <a href="{{ route('destinasi.show', $d->slug) }}" class="gallery-card group block" @if($salinan) tabindex="-1" @endif>
                            <img src="{{ $galeriGambar }}" alt="{{ $d->nama }}" loading="lazy" class="absolute inset-0 w-full h-full object-cover transition-transform duration-[900ms] ease-out group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/20 to-slate-950/10"></div>

                            {{-- Chip kategori --}}
                            <span class="absolute top-4 left-4 inline-flex items-center gap-1.5 bg-black/30 backdrop-blur-md border border-white/25 text-white text-[10px] font-bold uppercase tracking-wider pl-2.5 pr-3 py-1.5 rounded-full">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 shadow-[0_0_8px_rgba(52,211,153,0.9)]"></span>
                                {{ $d->kategori }}
                            </span>

                            {{-- Ikon panah (muncul saat hover) --}}
                            <span class="g-arrow absolute top-4 right-4 w-9 h-9 rounded-full bg-emerald-500 text-white flex items-center justify-center shadow-lg">
                                <i class="fas fa-arrow-right text-xs"></i>
                            </span>

                            {{-- Info (naik saat hover) --}}
                            <div class="g-info absolute left-5 right-5 bottom-5 text-white">
                                <p class="text-lg font-extrabold leading-tight drop-shadow line-clamp-1">{{ $d->nama }}</p>
                                <p class="g-more text-xs font-semibold text-emerald-300 mt-1.5 flex items-center gap-1.5">
                                    <i class="fas fa-compass"></i> Jelajahi destinasi
                                </p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-12 relative">
            <a href="{{ route('destinasi.index') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-full border border-emerald-600/30 dark:border-emerald-400/30 text-emerald-700 dark:text-emerald-400 font-bold text-sm hover:bg-emerald-600 hover:text-white dark:hover:bg-emerald-500 dark:hover:text-white transition-all group">
                Lihat semua destinasi <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>
        @else
        <div class="container mx-auto px-6 text-center text-slate-500">Belum ada gambar.</div>
        @endif
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
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