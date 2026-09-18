@extends('layouts.app')

@section('title', $destinasi->nama . ' - Explore Sumsel')

@section('content')

{{-- HERO IMAGE --}}
<section class="relative h-[450px] w-full">
    <img src="{{ $destinasi->gambar ? asset($destinasi->gambar) : 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1200' }}"
        alt="{{ $destinasi->nama }}"
        class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>

    <div class="absolute bottom-0 left-0 right-0 container mx-auto px-6 pb-8 text-white">
        {{-- Breadcrumb --}}
        <nav class="text-sm mb-3 text-gray-200">
            <a href="{{ route('home') }}" class="hover:text-white">Beranda</a>
            <span class="mx-2">/</span>
            <a href="{{ route('destinasi.index') }}" class="hover:text-white">Destinasi</a>
            <span class="mx-2">/</span>
            <span class="text-white">{{ $destinasi->nama }}</span>
        </nav>

        {{-- Kategori Badge --}}
        <span class="inline-block bg-green-700 text-white text-xs font-semibold px-3 py-1 rounded-full capitalize mb-3">
            {{ $destinasi->kategori }}
        </span>

        {{-- Nama Destinasi --}}
        <h1 class="text-4xl md:text-5xl font-bold mb-3">{{ $destinasi->nama }}</h1>

        {{-- Info Singkat --}}
        <div class="flex flex-wrap items-center gap-5 text-sm">
            <span>
                <i class="fas fa-map-marker-alt text-green-300 mr-1"></i>
                {{ $destinasi->kabupaten->nama }}
            </span>
            <span>
                <i class="fas fa-star text-yellow-400 mr-1"></i>
                <strong>{{ $destinasi->rating }}</strong> / 5.0
            </span>
            <span>
                <i class="fas fa-ticket-alt text-green-300 mr-1"></i>
                {{ $destinasi->harga_tiket == 0 ? 'Gratis' : 'Rp ' . number_format($destinasi->harga_tiket, 0, ',', '.') }}
            </span>
        </div>
    </div>
</section>

{{-- KONTEN UTAMA --}}
<section class="container mx-auto px-6 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        {{-- KOLOM KIRI: Deskripsi --}}
        <div class="lg:col-span-2 space-y-8">
            <div>
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Tentang Destinasi</h2>
                <p class="text-gray-600 leading-relaxed">
                    {{ $destinasi->deskripsi }}
                </p>
            </div>

            {{-- Info Tambahan --}}
            <div>
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Informasi Wisata</h2>
                <div class="bg-gray-50 rounded-xl p-6 grid grid-cols-2 md:grid-cols-3 gap-4">
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-green-700"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Lokasi</p>
                            <p class="font-semibold text-gray-800 text-sm">{{ $destinasi->kabupaten->nama }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-tag text-green-700"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Kategori</p>
                            <p class="font-semibold text-gray-800 text-sm capitalize">{{ $destinasi->kategori }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-ticket-alt text-green-700"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Tiket Masuk</p>
                            <p class="font-semibold text-gray-800 text-sm">
                                {{ $destinasi->harga_tiket == 0 ? 'Gratis' : 'Rp ' . number_format($destinasi->harga_tiket, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-clock text-green-700"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Jam Buka</p>
                            <p class="font-semibold text-gray-800 text-sm">08.00 - 17.00 WIB</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-star text-green-700"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Rating</p>
                            <p class="font-semibold text-gray-800 text-sm">{{ $destinasi->rating }} / 5.0</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-calendar text-green-700"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Terbaik Dikunjungi</p>
                            <p class="font-semibold text-gray-800 text-sm">Pagi / Sore</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- REVIEW SECTION --}}
            <div>
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-2xl font-bold text-gray-800">Ulasan Pengunjung</h2>
                    <span class="text-sm text-gray-500">{{ $destinasi->reviews->count() ?? 0 }} ulasan</span>
                </div>

                @if (isset($destinasi->reviews) && $destinasi->reviews->count() > 0)
                <div class="space-y-4">
                    @foreach ($destinasi->reviews as $review)
                    <div class="bg-white rounded-xl p-4 border border-gray-100">
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 rounded-full bg-green-700 text-white flex items-center justify-center font-bold flex-shrink-0">
                                {{ strtoupper(substr($review->user->name ?? 'U', 0, 1)) }}
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-1">
                                    <p class="font-semibold text-gray-800">{{ $review->user->name ?? 'User' }}</p>
                                    <div class="flex items-center gap-1 text-yellow-500 text-sm">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star {{ $i <= $review->rating ? 'text-yellow-500' : 'text-gray-300' }}"></i>
                                            @endfor
                                    </div>
                                </div>
                                <p class="text-sm text-gray-600">{{ $review->komentar }}</p>
                                <p class="text-xs text-gray-400 mt-2">{{ $review->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center py-8 bg-gray-50 rounded-xl">
                    <i class="fas fa-comment-dots text-4xl text-gray-300 mb-3"></i>
                    <p class="text-gray-500">Belum ada ulasan untuk destinasi ini.</p>
                    <p class="text-sm text-gray-400">Jadilah yang pertama memberikan ulasan!</p>
                </div>
                @endif
            </div>
        </div>

        {{-- KOLOM KANAN: Sidebar --}}
        <div class="space-y-6">
            {{-- Card Info & Aksi --}}
            <div class="bg-white rounded-2xl shadow-lg p-6 sticky top-24">
                <div class="text-center mb-6">
                    <div class="inline-flex items-center gap-1 bg-yellow-50 text-yellow-700 px-3 py-1 rounded-full font-semibold mb-3">
                        <i class="fas fa-star"></i>
                        <span>{{ $destinasi->rating }}</span>
                    </div>
                    <p class="text-sm text-gray-500">Rating dari pengunjung</p>
                </div>

                <div class="border-t border-gray-100 pt-4 mb-4">
                    <p class="text-xs text-gray-500 mb-1">Harga Tiket</p>
                    <p class="text-2xl font-bold text-green-700">
                        {{ $destinasi->harga_tiket == 0 ? 'Gratis' : 'Rp ' . number_format($destinasi->harga_tiket, 0, ',', '.') }}
                    </p>
                </div>

                <button class="w-full bg-green-700 text-white py-3 rounded-lg font-semibold hover:bg-green-800 transition mb-2">
                    <i class="fas fa-heart mr-2"></i> Simpan ke Favorit
                </button>

                <button class="w-full bg-gray-100 text-gray-700 py-3 rounded-lg font-semibold hover:bg-gray-200 transition">
                    <i class="fas fa-share-alt mr-2"></i> Bagikan
                </button>

                <div class="mt-4 pt-4 border-t border-gray-100 text-sm text-gray-500 text-center">
                    <i class="fas fa-info-circle mr-1"></i>
                    Login untuk menulis ulasan
                </div>
            </div>
        </div>
    </div>
</section>

{{-- DESTINASI TERKAIT --}}
@if ($terkait->count() > 0)
<section class="bg-gray-50 py-16">
    <div class="container mx-auto px-6">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-800">Destinasi Terkait</h2>
            <a href="{{ route('destinasi.index') }}" class="text-green-700 font-medium hover:underline">
                Lihat Semua →
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($terkait as $t)
            <a href="{{ route('destinasi.show', $t->slug) }}"
                class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition group">
                <div class="h-48 bg-gray-200 overflow-hidden">
                    <img src="{{ $t->gambar ? asset($t->gambar) : 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=600' }}"
                        alt="{{ $t->nama }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                </div>
                <div class="p-4">
                    <div class="flex items-center gap-1 text-yellow-500 text-sm mb-2">
                        <i class="fas fa-star"></i>
                        <span class="text-gray-600">{{ $t->rating }}</span>
                    </div>
                    <h3 class="font-bold text-lg text-gray-800 mb-1 group-hover:text-green-700 transition">
                        {{ $t->nama }}
                    </h3>
                    <p class="text-sm text-gray-500">
                        <i class="fas fa-map-marker-alt mr-1"></i>
                        {{ $t->kabupaten->nama }}
                    </p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection