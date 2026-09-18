@extends('layouts.app')

@section('title', 'Budaya Sumatera Selatan - Explore Sumsel')

@section('content')

{{-- HEADER --}}
<section class="bg-gradient-to-r from-green-800 to-green-700 text-white py-16">
    <div class="container mx-auto px-6">
        <nav class="text-sm mb-3 text-green-100">
            <a href="{{ route('home') }}" class="hover:text-white">Beranda</a>
            <span class="mx-2">/</span>
            <span class="text-white">Budaya</span>
        </nav>
        <h1 class="text-4xl font-bold mb-2">Budaya Sumatera Selatan</h1>
        <p class="text-green-100 max-w-2xl">
            Warisan budaya tak benda dan benda yang menjadi identitas masyarakat Sumatera Selatan.
        </p>
    </div>
</section>

{{-- FILTER JENIS --}}
<section class="container mx-auto px-6 -mt-8 relative z-10">
    <div class="bg-white rounded-xl shadow-lg p-4 flex flex-wrap gap-3 items-center">
        <span class="text-sm font-medium text-gray-600 mr-2">
            <i class="fas fa-filter mr-1"></i> Filter:
        </span>

        <a href="{{ route('budaya.index') }}"
            class="px-4 py-2 rounded-lg text-sm font-medium transition
                {{ !request('jenis') ? 'bg-green-700 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
            Semua
        </a>
        <a href="{{ route('budaya.index', ['jenis' => 'rumah_adat']) }}"
            class="px-4 py-2 rounded-lg text-sm font-medium transition
                {{ request('jenis') == 'rumah_adat' ? 'bg-green-700 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
            Rumah Adat
        </a>
        <a href="{{ route('budaya.index', ['jenis' => 'tari']) }}"
            class="px-4 py-2 rounded-lg text-sm font-medium transition
                {{ request('jenis') == 'tari' ? 'bg-green-700 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
            Tari
        </a>
        <a href="{{ route('budaya.index', ['jenis' => 'pakaian']) }}"
            class="px-4 py-2 rounded-lg text-sm font-medium transition
                {{ request('jenis') == 'pakaian' ? 'bg-green-700 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
            Pakaian
        </a>
        <a href="{{ route('budaya.index', ['jenis' => 'senjata']) }}"
            class="px-4 py-2 rounded-lg text-sm font-medium transition
                {{ request('jenis') == 'senjata' ? 'bg-green-700 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
            Senjata
        </a>
    </div>
</section>

{{-- HASIL --}}
<section class="container mx-auto px-6 py-12">

    <div class="flex items-center justify-between mb-6">
        <p class="text-gray-600">
            Menampilkan <strong>{{ $budayas->total() }}</strong> budaya
        </p>
    </div>

    @if ($budayas->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($budayas as $b)
        <a href="{{ route('budaya.show', $b->slug) }}"
            class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition group">
            <div class="h-52 bg-gray-200 overflow-hidden relative">
                @php
                $budayaGambar = str_starts_with($b->gambar, 'http') ? $b->gambar : asset($b->gambar);
                @endphp
                <img src="{{ $budayaGambar }}"
                    alt="{{ $b->nama }}"
                    class="w-full h-full object-cover group-hover:scale-110 transition duration-300">

                <span class="absolute top-3 left-3 bg-green-700 text-white text-xs font-semibold px-3 py-1 rounded-full capitalize">
                    {{ str_replace('_', ' ', $b->jenis) }}
                </span>
            </div>
            <div class="p-4">
                <h3 class="font-bold text-lg text-gray-800 mb-2 group-hover:text-green-700 transition">
                    {{ $b->nama }}
                </h3>
                <p class="text-sm text-gray-500 line-clamp-2 mb-3">
                    {{ Str::limit($b->deskripsi, 100) }}
                </p>
                <p class="text-sm text-gray-400">
                    <i class="fas fa-map-marker-alt mr-1"></i>
                    {{ $b->kabupaten->nama ?? 'Sumatera Selatan' }}
                </p>
            </div>
        </a>
        @endforeach
    </div>

    <div class="mt-10 flex justify-center">
        {{ $budayas->links() }}
    </div>
    @else
    <div class="text-center py-16">
        <i class="fas fa-masks-theater text-5xl text-gray-300 mb-4"></i>
        <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum ada data budaya</h3>
        <p class="text-gray-500">Data budaya akan segera ditambahkan.</p>
    </div>
    @endif
</section>

@endsection