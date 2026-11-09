@extends('layouts.app')

@section('title', $destinasi->nama . ' - Explore Sumatera')

@section('content')

@php
$totalReview = $destinasi->reviews->count();
$avgRating = $totalReview > 0 ? number_format($destinasi->reviews->avg('rating'), 1) : '0.0';

// FUNGSI UNTUK MENGUBAH LINK TEKS MENJADI BISA DIKLIK
$formatTeks = function($teks) {
    // 1. Amankan teks dari script berbahaya
    $teksAman = e($teks);
    // 2. Cari pola URL dan ubah menjadi tag <a>
    $pola = '/((http|https):\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,}(?::[0-9]+)?(?:\/[^\s]*)?)/i';
    $teksLink = preg_replace($pola, '<a href="$1" target="_blank" rel="noopener noreferrer" class="text-emerald-600 dark:text-emerald-400 font-bold hover:underline">$1</a>', $teksAman);
    return $teksLink;
};
@endphp

{{-- 🌟 CSS UNTUK SCROLLABLE GALLERY 🌟 --}}
<style>
    .v-gallery-container {
        height: 380px;
        overflow-y: auto;
        padding-right: 6px;
    }

    .v-gallery-container::-webkit-scrollbar {
        width: 6px;
    }

    .v-gallery-container::-webkit-scrollbar-track {
        background: transparent;
    }

    .v-gallery-container::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
    }

    .dark .v-gallery-container::-webkit-scrollbar-thumb {
        background: #334155;
    }

    .v-gallery-container::-webkit-scrollbar-thumb:hover {
        background: #10b981;
    }

    .v-gallery-track {
        display: flex;
        flex-direction: column;
        gap: 12px;
        width: 100%;
    }

    .v-gallery-card {
        width: 100%;
        height: 160px;
        border-radius: 16px;
        overflow: hidden;
        position: relative;
        flex-shrink: 0;
        border: 1px solid rgba(226, 232, 240, 0.5);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
    }

    .dark .v-gallery-card {
        border-color: rgba(255, 255, 255, 0.1);
    }

    .v-gallery-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .v-gallery-card:hover img {
        transform: scale(1.1);
    }
</style>

{{-- HERO IMAGE --}}
@php
$gambarUrl = $destinasi->gambar ? (str_starts_with($destinasi->gambar, 'http') ? $destinasi->gambar : asset('storage/' . $destinasi->gambar)) : 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1200';
@endphp
<section class="relative w-full h-[500px] md:h-[600px] flex items-end pb-10 overflow-hidden">
    <div class="absolute inset-0 z-0 bg-cover bg-center" style="background-image: url('{{ $gambarUrl }}');"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-900/50 to-transparent z-0"></div>

    <div class="relative z-20 container mx-auto px-6 max-w-7xl text-white">
        <nav class="text-sm mb-4 text-slate-300 flex items-center gap-2">
            <a href="{{ route('home') }}" class="hover:text-emerald-400 transition">Beranda</a>
            <i class="fas fa-chevron-right text-[10px] text-slate-500"></i>
            <a href="{{ route('destinasi.index') }}" class="hover:text-emerald-400 transition">Destinasi</a>
            <i class="fas fa-chevron-right text-[10px] text-slate-500"></i>
            <span class="text-white font-medium">{{ $destinasi->nama }}</span>
        </nav>

        <span class="inline-block bg-white/10 backdrop-blur-md text-white text-xs font-bold px-4 py-1.5 rounded-full capitalize mb-4 border border-white/20 shadow-lg">
            {{ $destinasi->kategori }}
        </span>

        <h1 class="text-4xl md:text-6xl font-black mb-4 tracking-tight drop-shadow-lg">{{ $destinasi->nama }}</h1>

        <div class="flex flex-wrap items-center gap-3 md:gap-4 text-sm font-semibold">
            <span class="flex items-center gap-2 bg-white/10 backdrop-blur-md px-4 py-2 rounded-full border border-white/20">
                <i class="fas fa-map-marker-alt text-emerald-400"></i>
                {{ $destinasi->kabupaten->nama }}
            </span>
            <span class="flex items-center gap-2 bg-white/10 backdrop-blur-md px-4 py-2 rounded-full border border-white/20">
                <i class="fas fa-star text-amber-400"></i>
                <strong>{{ $avgRating }}</strong> / 5.0
            </span>
            <span class="flex items-center gap-2 bg-white/10 backdrop-blur-md px-4 py-2 rounded-full border border-white/20">
                <i class="fas fa-ticket-alt text-emerald-400"></i>
                {{ $destinasi->harga_tiket == 0 ? 'Gratis' : 'Rp ' . number_format($destinasi->harga_tiket, 0, ',', '.') }}
            </span>
        </div>
    </div>
</section>

{{-- KONTEN UTAMA --}}
<section class="bg-slate-50 dark:bg-[#0b1120] py-12 transition-colors duration-300">
    <div class="container mx-auto px-6 max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- KOLOM KIRI --}}
            <div class="lg:col-span-2 space-y-8">

                {{-- Deskripsi Atas --}}
                <div class="bg-white dark:bg-[#0f172a] rounded-3xl p-6 md:p-8 shadow-sm border border-slate-200 dark:border-slate-800">
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4 flex items-center gap-3">
                        <span class="w-2 h-8 bg-emerald-500 rounded-full"></span> Tentang Destinasi
                    </h2>
                    {{-- PERUBAHAN DI SINI: Menggunakan {!! !!} dan fungsi $formatTeks --}}
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed text-base md:text-lg text-justify whitespace-pre-line">
                        {!! $formatTeks($destinasi->deskripsi) !!}
                    </p>
                </div>

                {{-- Info Tambahan --}}
                <div class="bg-white dark:bg-[#0f172a] rounded-3xl p-6 md:p-8 shadow-sm border border-slate-200 dark:border-slate-800">
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-6 flex items-center gap-3">
                        <span class="w-2 h-8 bg-emerald-500 rounded-full"></span> Informasi Wisata
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        <div class="flex items-center gap-4 p-4 rounded-2xl bg-slate-50 dark:bg-slate-800/50 border border-slate-100 dark:border-slate-700">
                            <div class="w-12 h-12 flex items-center justify-center text-2xl shrink-0">
                                <i class="fas fa-map-marker-alt text-emerald-500"></i>
                            </div>
                            <div>
                                <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Lokasi</p>
                                <p class="font-bold text-slate-900 dark:text-white text-sm">{{ $destinasi->kabupaten->nama }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 p-4 rounded-2xl bg-slate-50 dark:bg-slate-800/50 border border-slate-100 dark:border-slate-700">
                            <div class="w-12 h-12 flex items-center justify-center text-2xl shrink-0">
                                <i class="fas fa-tag text-emerald-500"></i>
                            </div>
                            <div>
                                <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Kategori</p>
                                <p class="font-bold text-slate-900 dark:text-white text-sm capitalize">{{ $destinasi->kategori }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 p-4 rounded-2xl bg-slate-50 dark:bg-slate-800/50 border border-slate-100 dark:border-slate-700">
                            <div class="w-12 h-12 flex items-center justify-center text-2xl shrink-0">
                                <i class="fas fa-ticket-alt text-emerald-500"></i>
                            </div>
                            <div>
                                <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Tiket Masuk</p>
                                <p class="font-bold text-slate-900 dark:text-white text-sm">{{ $destinasi->harga_tiket == 0 ? 'Gratis' : 'Rp ' . number_format($destinasi->harga_tiket, 0, ',', '.') }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 p-4 rounded-2xl bg-slate-50 dark:bg-slate-800/50 border border-slate-100 dark:border-slate-700">
                            <div class="w-12 h-12 flex items-center justify-center text-2xl shrink-0">
                                <i class="fas fa-clock text-emerald-500"></i>
                            </div>
                            <div>
                                <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Jam Buka</p>
                                <p class="font-bold text-slate-900 dark:text-white text-sm">08.00 - 17.00 WIB</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 p-4 rounded-2xl bg-slate-50 dark:bg-slate-800/50 border border-slate-100 dark:border-slate-700">
                            <div class="w-12 h-12 flex items-center justify-center text-2xl shrink-0">
                                <i class="fas fa-star text-emerald-500"></i>
                            </div>
                            <div>
                                <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Rating</p>
                                <p class="font-bold text-slate-900 dark:text-white text-sm">{{ $avgRating }} / 5.0</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 p-4 rounded-2xl bg-slate-50 dark:bg-slate-800/50 border border-slate-100 dark:border-slate-700">
                            <div class="w-12 h-12 flex items-center justify-center text-2xl shrink-0">
                                <i class="fas fa-calendar text-emerald-500"></i>
                            </div>
                            <div>
                                <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Terbaik Dikunjungi</p>
                                <p class="font-bold text-slate-900 dark:text-white text-sm">Pagi / Sore</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- DESKRIPSI BAWAH --}}
                @if(!empty($destinasi->deskripsi_bawah))
                <div class="bg-white dark:bg-[#0f172a] rounded-3xl p-6 md:p-8 shadow-sm border border-slate-200 dark:border-slate-800">
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4 flex items-center gap-3">
                        <span class="w-2 h-8 bg-emerald-500 rounded-full"></span> Informasi Tambahan
                    </h2>
                    {{-- PERUBAHAN DI SINI --}}
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed text-base md:text-lg text-justify whitespace-pre-line">
                        {!! $formatTeks($destinasi->deskripsi_bawah) !!}
                    </p>
                </div>
                @endif

                {{-- REVIEW SECTION (Ulasan Pengunjung) --}}
                <div class="bg-white dark:bg-[#0f172a] rounded-3xl p-6 md:p-8 shadow-sm border border-slate-200 dark:border-slate-800">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold text-slate-900 dark:text-white flex items-center gap-3">
                            <span class="w-2 h-8 bg-emerald-500 rounded-full"></span> Ulasan Pengunjung
                        </h2>
                        <span class="text-sm font-bold text-slate-500 bg-slate-100 dark:bg-slate-800 px-3 py-1 rounded-full">{{ $totalReview }} ulasan</span>
                    </div>

                    @if (session('success'))
                    <div class="bg-emerald-100 dark:bg-emerald-950/50 text-emerald-700 dark:text-emerald-400 p-4 rounded-xl mb-6 font-semibold text-sm border border-emerald-200 dark:border-emerald-900">
                        <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
                    </div>
                    @endif

                    @if ($errors->any())
                    <div class="bg-red-100 dark:bg-red-950/50 text-red-700 dark:text-red-400 p-4 rounded-xl mb-6 font-semibold text-sm border border-red-200 dark:border-red-900">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @auth
                    <form method="POST" action="{{ route('review.store') }}" enctype="multipart/form-data" class="bg-slate-50 dark:bg-slate-800/50 rounded-2xl p-5 border border-slate-200 dark:border-slate-700 mb-8">
                        @csrf
                        <input type="hidden" name="type" value="destinasi">
                        <input type="hidden" name="id" value="{{ $destinasi->id }}">

                        <h3 class="font-bold text-slate-900 dark:text-white mb-3 text-sm">Tulis Ulasan Anda</h3>

                        <div class="flex items-center gap-1 mb-4 flex-row-reverse justify-end">
                            @for($i = 5; $i >= 1; $i--)
                            <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" class="hidden peer" required />
                            <label for="star{{ $i }}" class="text-slate-300 dark:text-slate-600 cursor-pointer text-3xl hover:text-amber-400 peer-checked:text-amber-400 transition-colors">
                                <i class="fas fa-star"></i>
                            </label>
                            @endfor
                        </div>

                        <textarea name="komentar" rows="3" required placeholder="Bagaimana pengalaman Anda di sini?"
                            class="w-full bg-white dark:bg-slate-900 text-slate-800 dark:text-white border border-slate-300 dark:border-slate-600 rounded-xl p-4 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 mb-3 resize-none"></textarea>

                        {{-- INPUT FOTO --}}
                        <div class="mb-4">
                            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Tambah Foto (Opsional)</label>
                            <input type="file" name="foto" id="foto-input" accept="image/*" onchange="previewImage(event)" class="block w-full text-sm text-slate-500 dark:text-slate-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-bold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 dark:file:bg-emerald-500/20 dark:file:text-emerald-400 transition-all cursor-pointer">

                            <div id="image-preview-container" class="mt-3 hidden">
                                <img id="image-preview" src="" alt="Preview" class="w-32 h-32 object-cover rounded-xl border-2 border-emerald-500">
                            </div>
                            @error('foto')
                            <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="bg-emerald-600 hover:bg-emerald-500 text-white px-6 py-2.5 rounded-xl text-sm font-bold transition shadow-lg shadow-emerald-600/30">
                            Kirim Ulasan
                        </button>
                    </form>
                    @endauth

                    @if ($totalReview > 0)
                    <div class="space-y-4">
                        @foreach ($destinasi->reviews as $review)
                        <div class="bg-white dark:bg-[#0f172a] rounded-2xl p-5 border border-slate-100 dark:border-slate-800 shadow-sm">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-full bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400 flex items-center justify-center font-bold text-lg shrink-0">
                                    {{ strtoupper(substr($review->user->name ?? 'U', 0, 1)) }}
                                </div>
                                <div class="flex-1">
                                    <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-2 gap-2">
                                        <p class="font-bold text-slate-900 dark:text-white text-lg">{{ $review->user->name ?? 'User' }}</p>
                                        <div class="flex items-center gap-1 text-amber-400 text-sm">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i class="fas fa-star {{ $i <= $review->rating ? 'text-amber-400' : 'text-slate-200 dark:text-slate-700' }}"></i>
                                                @endfor
                                        </div>
                                    </div>
                                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed">{{ $review->komentar }}</p>

                                    {{-- FOTO DARI USER --}}
                                    @if($review->foto)
                                    <div class="mt-3">
                                        <img src="{{ asset('storage/' . $review->foto) }}" alt="Foto Ulasan" class="w-32 h-32 object-cover rounded-xl border border-slate-200 dark:border-slate-700 cursor-pointer hover:scale-105 transition-transform" onclick="window.open(this.src, '_blank')">
                                    </div>
                                    @endif

                                    <p class="text-xs text-slate-400 dark:text-slate-500 mt-3 font-medium"><i class="far fa-clock mr-1"></i> {{ $review->updated_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center py-12 bg-slate-50 dark:bg-slate-800/30 rounded-2xl border-2 border-dashed border-slate-200 dark:border-slate-700">
                        <i class="fas fa-comment-dots text-5xl text-slate-300 dark:text-slate-600 mb-4"></i>
                        <h3 class="text-lg font-bold text-slate-800 dark:text-white mb-1">Belum Ada Ulasan</h3>
                        <p class="text-slate-500 dark:text-slate-400">Jadilah yang pertama memberikan ulasan untuk destinasi ini!</p>
                    </div>
                    @endif
                </div>
            </div>

            {{-- KOLOM KANAN (Sidebar tanpa sticky) --}}
            <div class="space-y-6">

                {{-- KARTU HARGA & FAVORIT --}}
                <div class="bg-white dark:bg-[#0f172a] rounded-3xl p-6 md:p-8 shadow-xl border border-slate-200 dark:border-slate-800">
                    <div class="text-center mb-6 border-b border-slate-100 dark:border-slate-800 pb-6">
                        <div class="inline-flex items-center gap-1.5 bg-slate-100 dark:bg-slate-800/50 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-700 px-4 py-1.5 rounded-full font-bold mb-3 backdrop-blur-sm">
                            <i class="fas fa-star text-amber-500"></i>
                            <span>{{ $avgRating }}</span>
                        </div>
                        <p class="text-sm font-bold text-slate-500 uppercase tracking-widest mb-1">Harga Tiket</p>
                        <p class="text-4xl font-black text-emerald-600 dark:text-emerald-400">
                            {{ $destinasi->harga_tiket == 0 ? 'Gratis' : 'Rp ' . number_format($destinasi->harga_tiket, 0, ',', '.') }}
                        </p>
                    </div>

                    <div class="space-y-3">
                        @auth
                        <form method="POST" action="{{ route('favorit.toggle', $destinasi->id) }}">
                            @csrf
                            <button type="submit" class="w-full py-3.5 {{ $isFavorited ? 'bg-red-500 hover:bg-red-600 shadow-red-500/30' : 'bg-emerald-600 hover:bg-emerald-500 shadow-emerald-600/30' }} text-white font-bold rounded-xl shadow-lg transition-all flex items-center justify-center gap-2">
                                <i class="fas fa-heart"></i> {{ $isFavorited ? 'Hapus dari Favorit' : 'Simpan ke Favorit' }}
                            </button>
                        </form>
                        @else
                        <a href="{{ route('login') }}" class="w-full py-3.5 bg-emerald-600 hover:bg-emerald-500 text-white font-bold rounded-xl shadow-lg shadow-emerald-600/30 transition-all flex items-center justify-center gap-2">
                            <i class="fas fa-heart"></i> Login untuk Favorit
                        </a>
                        @endauth

                        <button class="w-full py-3.5 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-300 font-bold rounded-xl transition-all flex items-center justify-center gap-2">
                            <i class="fas fa-share-alt"></i> Bagikan
                        </button>

                        @if($destinasi->link_maps)
                        <a href="{{ $destinasi->link_maps }}" target="_blank" class="w-full py-3.5 bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-xl shadow-lg shadow-blue-600/30 transition-all flex items-center justify-center gap-2">
                            <i class="fas fa-map-marked-alt"></i> Buka Peta Lokasi
                        </a>
                        @endif
                    </div>

                    @guest
                    <div class="mt-6 pt-6 border-t border-slate-100 dark:border-slate-800 text-sm text-slate-500 dark:text-slate-400 text-center bg-slate-50 dark:bg-slate-800/50 p-4 rounded-xl">
                        <i class="fas fa-info-circle mr-1 text-emerald-500"></i>
                        <a href="{{ route('login') }}" class="text-emerald-600 dark:text-emerald-400 font-bold hover:underline">Login</a> untuk menulis ulasan
                    </div>
                    @endguest
                </div>

                {{-- 🌟 GALERI PENGUNJUNG (BISA DI-SCROLL) 🌟 --}}
                @if(isset($fotoUlasan) && $fotoUlasan->count() > 0)
                <div class="bg-white dark:bg-[#0f172a] rounded-3xl p-5 shadow-xl border border-slate-200 dark:border-slate-800">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 rounded-lg bg-emerald-100 dark:bg-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center">
                            <i class="fas fa-camera"></i>
                        </div>
                        <h3 class="font-bold text-slate-900 dark:text-white">Galeri Pengunjung</h3>
                    </div>

                    <div class="v-gallery-container">
                        <div class="v-gallery-track">
                            @foreach($fotoUlasan as $item)
                            @php $fotoUrl = asset('storage/' . $item->foto); @endphp
                            <div class="v-gallery-card group cursor-pointer" onclick="window.open('{{ $fotoUrl }}', '_blank')">
                                <img src="{{ $fotoUrl }}" alt="Foto Ulasan" loading="lazy">
                                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                    <i class="fas fa-expand text-white text-xl"></i>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <p class="text-center text-[10px] text-slate-400 mt-3"><i class="fas fa-mouse mr-1"></i> Geser ke bawah untuk melihat semua</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- DESTINASI TERKAIT --}}
@if ($terkait->count() > 0)
<section class="bg-white dark:bg-[#0f172a] py-16 border-t border-slate-200 dark:border-slate-800">
    <div class="container mx-auto px-6 max-w-7xl">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white flex items-center gap-3">
                <span class="w-2 h-8 bg-emerald-500 rounded-full"></span> Destinasi Terkait
            </h2>
            <a href="{{ route('destinasi.index') }}" class="text-emerald-600 dark:text-emerald-400 font-bold hover:underline">
                Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($terkait as $t)
            @php
            $gambarTerkait = $t->gambar ? (str_starts_with($t->gambar, 'http') ? $t->gambar : asset('storage/' . $t->gambar)) : 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=600';
            @endphp
            <a href="{{ route('destinasi.show', $t->slug) }}"
                class="bg-slate-50 dark:bg-slate-800/50 rounded-2xl overflow-hidden hover:shadow-xl transition-all duration-300 group border border-slate-200 dark:border-slate-800">
                <div class="h-48 bg-slate-200 dark:bg-slate-800 overflow-hidden relative">
                    <img src="{{ $gambarTerkait }}"
                        alt="{{ $t->nama }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition duration-500">

                    <div class="absolute top-4 left-4 bg-white/90 dark:bg-slate-900/90 backdrop-blur-md px-3 py-1 rounded-full text-xs font-bold text-slate-800 dark:text-white flex items-center gap-1 shadow-sm">
                        <i class="fas fa-star text-amber-500"></i> {{ $t->rating }}
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-xl text-slate-900 dark:text-white mb-2 group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition line-clamp-1">
                        {{ $t->nama }}
                    </h3>
                    <p class="text-sm font-medium text-slate-500 dark:text-slate-400 flex items-center gap-1.5">
                        <i class="fas fa-map-marker-alt text-emerald-500"></i>
                        {{ $t->kabupaten->nama }}
                    </p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- SCRIPT PREVIEW GAMBAR --}}
<script>
    function previewImage(event) {
        const input = event.target;
        const previewContainer = document.getElementById('image-preview-container');
        const previewImage = document.getElementById('image-preview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.classList.remove('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            previewImage.src = "";
            previewContainer.classList.add('hidden');
        }
    }
</script>

@endsection