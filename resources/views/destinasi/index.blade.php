@extends('layouts.app')

@section('title', 'Destinasi Wisata - Explore Sumsel')

@section('content')

{{-- HEADER --}}
<section class="bg-green-800 text-white py-16">
    <div class="container mx-auto px-6">
        <nav class="text-sm mb-3 text-green-100">
            <a href="{{ route('home') }}" class="hover:text-white">Beranda</a>
            <span class="mx-2">/</span>
            <span class="text-white">Destinasi</span>
        </nav>
        <h1 class="text-4xl font-bold mb-2">Destinasi Wisata</h1>
        <p class="text-green-100">Temukan destinasi wisata terbaik di Sumatera Selatan.</p>
    </div>
</section>

{{-- FILTER --}}
<section class="container mx-auto px-6 -mt-8 relative z-10">
    <form method="GET" action="{{ route('destinasi.index') }}"
        class="bg-white rounded-xl shadow-lg p-4 flex flex-wrap gap-3 items-center">

        {{-- Search --}}
        <div class="flex-1 min-w-[200px] relative">
            <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
            <input type="text" name="q" value="{{ request('q') }}"
                placeholder="Cari destinasi..."
                class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>

        {{-- Filter Kategori --}}
        <select name="kategori"
            class="px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            <option value="">Semua Kategori</option>
            <option value="alam" {{ request('kategori') == 'alam' ? 'selected' : '' }}>Alam</option>
            <option value="budaya" {{ request('kategori') == 'budaya' ? 'selected' : '' }}>Budaya</option>
            <option value="kuliner" {{ request('kategori') == 'kuliner' ? 'selected' : '' }}>Kuliner</option>
        </select>

        {{-- Filter Kabupaten --}}
        <select name="kabupaten"
            class="px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            <option value="">Semua Kabupaten</option>
            @foreach ($kabupatens as $kab)
            <option value="{{ $kab->id }}" {{ request('kabupaten') == $kab->id ? 'selected' : '' }}>
                {{ $kab->nama }}
            </option>
            @endforeach
        </select>

        <button type="submit"
            class="bg-green-700 text-white px-6 py-2 rounded-lg hover:bg-green-800 transition font-medium">
            <i class="fas fa-filter mr-1"></i> Filter
        </button>

        @if (request()->anyFilled(['q', 'kategori', 'kabupaten']))
        <a href="{{ route('destinasi.index') }}"
            class="text-gray-500 hover:text-red-600 text-sm px-3">
            <i class="fas fa-times mr-1"></i> Reset
        </a>
        @endif
    </form>
</section>

{{-- HASIL --}}
<section class="container mx-auto px-6 py-12">

    {{-- Info hasil --}}
    <div class="flex items-center justify-between mb-6">
        <p class="text-gray-600">
            Menampilkan <strong>{{ $destinasis->total() }}</strong> destinasi
            @if (request('q'))
            untuk "<strong>{{ request('q') }}</strong>"
            @endif
        </p>
    </div>

    {{-- Grid --}}
    @if ($destinasis->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($destinasis as $d)
        <a href="{{ route('destinasi.show', $d->slug) }}"
            class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition group">
            <div class="h-52 bg-gray-200 overflow-hidden relative">
                <img src="{{ $d->gambar ?? 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=600' }}"
                    alt="{{ $d->nama }}"
                    class="w-full h-full object-cover group-hover:scale-110 transition duration-300">

                {{-- Badge Kategori --}}
                <span class="absolute top-3 left-3 bg-green-700 text-white text-xs font-semibold px-3 py-1 rounded-full capitalize">
                    {{ $d->kategori }}
                </span>
            </div>
            <div class="p-4">
                <div class="flex items-center gap-1 text-yellow-500 text-sm mb-2">
                    <i class="fas fa-star"></i>
                    <span class="text-gray-600 font-medium">{{ $d->rating }}</span>
                </div>
                <h3 class="font-bold text-lg text-gray-800 mb-1 group-hover:text-green-700 transition">
                    {{ $d->nama }}
                </h3>
                <p class="text-sm text-gray-500 mb-3">
                    <i class="fas fa-map-marker-alt mr-1"></i>
                    {{ $d->kabupaten->nama }}
                </p>
                <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                    <span class="text-green-700 font-bold">
                        {{ $d->harga_tiket == 0 ? 'Gratis' : 'Rp ' . number_format($d->harga_tiket, 0, ',', '.') }}
                    </span>
                    <span class="text-sm text-gray-400">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                </div>
            </div>
        </a>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="mt-10 flex justify-center">
        {{ $destinasis->links() }}
    </div>
    @else
    <div class="text-center py-16">
        <i class="fas fa-search text-5xl text-gray-300 mb-4"></i>
        <h3 class="text-xl font-semibold text-gray-700 mb-2">Tidak ada destinasi ditemukan</h3>
        <p class="text-gray-500 mb-6">Coba ubah filter atau kata kunci pencarian.</p>
        <a href="{{ route('destinasi.index') }}"
            class="inline-block bg-green-700 text-white px-6 py-2 rounded-lg hover:bg-green-800 transition">
            Lihat Semua Destinasi
        </a>
    </div>
    @endif
</section>

@endsection