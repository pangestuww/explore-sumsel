@extends('layouts.app')

@section('title', 'Hasil Pencarian: ' . $q . ' - Explore Sumatera')

@section('content')

<section class="container mx-auto px-6 py-16">

    {{-- Header --}}
    <div class="mb-12">
        <nav class="text-sm mb-5 text-slate-500 dark:text-slate-400 flex items-center gap-2">
            <a href="{{ route('home') }}" class="hover:text-emerald-700 dark:hover:text-emerald-400 transition">Beranda</a>
            <i class="fas fa-chevron-right text-[10px]"></i>
            <span class="text-slate-700 dark:text-slate-300 font-medium">Pencarian</span>
        </nav>

        <div class="inline-flex items-center gap-2 text-emerald-700 dark:text-emerald-400 text-xs font-bold uppercase tracking-[0.2em] mb-3">
            <span class="w-8 h-px bg-emerald-700 dark:bg-emerald-400"></span>
            Hasil Pencarian
        </div>

        <h1 class="text-4xl md:text-5xl font-black text-slate-900 dark:text-white tracking-tight mb-3">
            Hasil untuk "<span class="text-emerald-700 dark:text-emerald-400">{{ $q }}</span>"
        </h1>

        @if ($totalDestinasi + $totalBudaya + $totalKuliner > 0)
        <p class="text-slate-500 dark:text-slate-400">
            Ditemukan <strong class="text-slate-900 dark:text-white">{{ $totalDestinasi + $totalBudaya + $totalKuliner }}</strong> hasil
            ({{ $totalDestinasi }} destinasi, {{ $totalBudaya }} budaya, {{ $totalKuliner }} kuliner)
        </p>
        @endif
    </div>

    {{-- Empty state --}}
    @if ($totalDestinasi == 0 && $totalBudaya == 0 && $totalKuliner == 0)
    <div class="text-center py-24 bg-gradient-to-br from-emerald-50 to-green-50 dark:from-slate-900 dark:to-slate-900 rounded-3xl border-2 border-dashed border-emerald-200 dark:border-slate-700">
        <div class="w-24 h-24 mx-auto mb-6 bg-white dark:bg-slate-800 rounded-full flex items-center justify-center shadow-lg">
            <i class="fas fa-search text-4xl text-emerald-600 dark:text-emerald-400"></i>
        </div>
        <h3 class="text-2xl font-black text-slate-800 dark:text-white mb-2">
            Kata Kunci Tidak Ditemukan
        </h3>
        <p class="text-slate-500 dark:text-slate-400 mb-2 max-w-md mx-auto">
            Tidak ada hasil untuk "<strong>{{ $q }}</strong>".
        </p>
        <p class="text-slate-400 dark:text-slate-500 text-sm mb-8 max-w-md mx-auto">
            Coba periksa ejaan atau gunakan kata kunci lain.
        </p>
        <div class="flex justify-center gap-3 flex-wrap">
            <a href="{{ route('destinasi.index') }}" class="bg-gradient-to-r from-emerald-600 to-green-700 text-white px-5 py-3 rounded-xl font-bold hover:shadow-lg transition-all text-sm">
                <i class="fas fa-compass mr-1"></i> Destinasi
            </a>
            <a href="{{ route('budaya.index') }}" class="bg-gradient-to-r from-emerald-600 to-green-700 text-white px-5 py-3 rounded-xl font-bold hover:shadow-lg transition-all text-sm">
                <i class="fas fa-masks-theater mr-1"></i> Budaya
            </a>
            <a href="{{ route('kuliner.index') }}" class="bg-gradient-to-r from-emerald-600 to-green-700 text-white px-5 py-3 rounded-xl font-bold hover:shadow-lg transition-all text-sm">
                <i class="fas fa-utensils mr-1"></i> Kuliner
            </a>
        </div>
    </div>
    @endif

    {{-- Destinasi --}}
    @if ($totalDestinasi > 0)
    <div class="mb-16">
        <div class="flex items-center justify-between mb-8">
            <div>
                <div class="inline-flex items-center gap-2 text-emerald-700 dark:text-emerald-400 text-xs font-bold uppercase tracking-[0.2em] mb-2">
                    <span class="w-8 h-px bg-emerald-700 dark:bg-emerald-400"></span>
                    Destinasi Wisata
                </div>
                <h2 class="text-3xl font-black text-slate-900 dark:text-white">{{ $totalDestinasi }} Destinasi Ditemukan</h2>
            </div>
            <a href="{{ route('destinasi.index', ['q' => $q]) }}" class="text-sm font-bold text-emerald-700 dark:text-emerald-400 hover:underline">
                Lihat Semua →
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($destinasis->take(4) as $d)
            @php
            $gambarUrl = $d->gambar ? (str_starts_with($d->gambar, 'http') ? $d->gambar : asset($d->gambar)) : 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=600';
            @endphp
            <a href="{{ route('destinasi.show', $d->slug) }}" class="group bg-white dark:bg-slate-900 rounded-2xl overflow-hidden block border border-slate-100 dark:border-slate-800 hover:shadow-xl transition-all hover:-translate-y-1">
                <div class="h-48 bg-slate-200 dark:bg-slate-800 overflow-hidden relative">
                    <img src="{{ $gambarUrl }}" alt="{{ $d->nama }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-slate-900 dark:text-white mb-1 group-hover:text-emerald-700 dark:group-hover:text-emerald-400 transition line-clamp-1">{{ $d->nama }}</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400">
                        <i class="fas fa-map-marker-alt text-emerald-600 mr-1"></i>
                        {{ $d->kabupaten->nama ?? 'Sumatera' }}
                    </p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    @endif

    {{-- Budaya --}}
    @if ($totalBudaya > 0)
    <div class="mb-16">
        <div class="flex items-center justify-between mb-8">
            <div>
                <div class="inline-flex items-center gap-2 text-emerald-700 dark:text-emerald-400 text-xs font-bold uppercase tracking-[0.2em] mb-2">
                    <span class="w-8 h-px bg-emerald-700 dark:bg-emerald-400"></span>
                    Warisan Budaya
                </div>
                <h2 class="text-3xl font-black text-slate-900 dark:text-white">{{ $totalBudaya }} Budaya Ditemukan</h2>
            </div>
            <a href="{{ route('budaya.index', ['q' => $q]) }}" class="text-sm font-bold text-emerald-700 dark:text-emerald-400 hover:underline">
                Lihat Semua →
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($budayas->take(4) as $b)
            @php
            $budayaGambar = str_starts_with($b->gambar, 'http') ? $b->gambar : asset($b->gambar);
            @endphp
            <a href="{{ route('budaya.show', $b->slug) }}" class="group bg-white dark:bg-slate-900 rounded-2xl overflow-hidden block border border-slate-100 dark:border-slate-800 hover:shadow-xl transition-all hover:-translate-y-1">
                <div class="h-48 bg-slate-200 dark:bg-slate-800 overflow-hidden relative">
                    <img src="{{ $budayaGambar }}" alt="{{ $b->nama }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-slate-900 dark:text-white mb-1 group-hover:text-emerald-700 dark:group-hover:text-emerald-400 transition line-clamp-1">{{ $b->nama }}</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400">
                        <i class="fas fa-map-marker-alt text-emerald-600 mr-1"></i>
                        {{ $b->kabupaten->nama ?? 'Sumatera' }}
                    </p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    @endif

    {{-- Kuliner --}}
    @if ($totalKuliner > 0)
    <div class="mb-16">
        <div class="flex items-center justify-between mb-8">
            <div>
                <div class="inline-flex items-center gap-2 text-emerald-700 dark:text-emerald-400 text-xs font-bold uppercase tracking-[0.2em] mb-2">
                    <span class="w-8 h-px bg-emerald-700 dark:bg-emerald-400"></span>
                    Kuliner Khas
                </div>
                <h2 class="text-3xl font-black text-slate-900 dark:text-white">{{ $totalKuliner }} Kuliner Ditemukan</h2>
            </div>
            <a href="{{ route('kuliner.index', ['q' => $q]) }}" class="text-sm font-bold text-emerald-700 dark:text-emerald-400 hover:underline">
                Lihat Semua →
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($kuliners->take(4) as $k)
            @php
            $kulinerGambar = str_starts_with($k->gambar, 'http') ? $k->gambar : asset($k->gambar);
            @endphp
            <a href="{{ route('kuliner.show', $k->slug) }}" class="group bg-white dark:bg-slate-900 rounded-2xl overflow-hidden block border border-slate-100 dark:border-slate-800 hover:shadow-xl transition-all hover:-translate-y-1">
                <div class="h-48 bg-slate-200 dark:bg-slate-800 overflow-hidden relative">
                    <img src="{{ $kulinerGambar }}" alt="{{ $k->nama }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-slate-900 dark:text-white mb-1 group-hover:text-emerald-700 dark:group-hover:text-emerald-400 transition line-clamp-1">{{ $k->nama }}</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400">
                        <i class="fas fa-map-marker-alt text-emerald-600 mr-1"></i>
                        {{ $k->kabupaten->nama ?? 'Sumatera' }}
                    </p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    @endif
</section>

@endsection