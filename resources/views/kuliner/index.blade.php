@extends('layouts.app')

@section('title', 'Kuliner Sumatera Selatan - Explore Sumsel')

@section('content')

{{-- HEADER --}}
<section class="bg-gradient-to-r from-green-700 to-green-600 text-white py-16">
    <div class="container mx-auto px-6">
        <nav class="text-sm mb-3 text-green-100">
            <a href="{{ route('home') }}" class="hover:text-white">Beranda</a>
            <span class="mx-2">/</span>
            <span class="text-white">Kuliner</span>
        </nav>
        <h1 class="text-4xl font-bold mb-2">Kuliner Khas Sumatera Selatan</h1>
        <p class="text-green-100 max-w-2xl">
            Cita rasa otentik dari Sumatera Selatan yang menggugah selera.
        </p>
    </div>
</section>

{{-- FILTER --}}
<section class="container mx-auto px-6 -mt-8 relative z-10">
    <div class="bg-white rounded-xl shadow-lg p-4 flex flex-wrap gap-3 items-center">
        <span class="text-sm font-medium text-gray-600 mr-2">
            <i class="fas fa-filter mr-1"></i> Filter:
        </span>

        <a href="{{ route('kuliner.index') }}"
            class="px-4 py-2 rounded-lg text-sm font-medium transition
                {{ !request('jenis') ? 'bg-green-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
            Semua
        </a>
        <a href="{{ route('kuliner.index', ['jenis' => 'makanan']) }}"
            class="px-4 py-2 rounded-lg text-sm font-medium transition
                {{ request('jenis') == 'makanan' ? 'bg-green-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
            Makanan
        </a>
        <a href="{{ route('kuliner.index', ['jenis' => 'minuman']) }}"
            class="px-4 py-2 rounded-lg text-sm font-medium transition
                {{ request('jenis') == 'minuman' ? 'bg-green-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
            Minuman
        </a>
        <a href="{{ route('kuliner.index', ['jenis' => 'snack']) }}"
            class="px-4 py-2 rounded-lg text-sm font-medium transition
                {{ request('jenis') == 'snack' ? 'bg-green-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
            Snack
        </a>
    </div>
</section>

{{-- HASIL --}}
<section class="container mx-auto px-6 py-12">

    <div class="flex items-center justify-between mb-6">
        <p class="text-gray-600">
            Menampilkan <strong>{{ $kuliners->total() }}</strong> kuliner
        </p>
    </div>

    @if ($kuliners->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($kuliners as $k)
        <a href="{{ route('kuliner.show', $k->slug) }}"
            class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition group">
            <div class="h-52 bg-gray-200 overflow-hidden relative">
                @php
                $kulinerGambar = str_starts_with($k->gambar, 'http') ? $k->gambar : asset($k->gambar);
                @endphp
                <img src="{{ $kulinerGambar }}"
                    alt="{{ $k->nama }}"
                    class="w-full h-full object-cover group-hover:scale-110 transition duration-300">

                <span class="absolute top-3 left-3 bg-orange-600 text-white text-xs font-semibold px-3 py-1 rounded-full capitalize">
                    {{ $k->jenis }}
                </span>
                <span class="absolute top-3 right-3 bg-white text-orange-600 text-xs font-bold px-3 py-1 rounded-full">
                    Rp {{ number_format($k->harga, 0, ',', '.') }}
                </span>
            </div>
            <div class="p-4">
                <h3 class="font-bold text-lg text-gray-800 mb-2 group-hover:text-orange-600 transition">
                    {{ $k->nama }}
                </h3>
                <p class="text-sm text-gray-500 line-clamp-2 mb-3">
                    {{ Str::limit($k->deskripsi, 100) }}
                </p>
                <p class="text-sm text-gray-400">
                    <i class="fas fa-map-marker-alt mr-1"></i>
                    {{ $k->kabupaten->nama ?? 'Sumatera Selatan' }}
                </p>
            </div>
        </a>
        @endforeach
    </div>

    <div class="mt-10 flex justify-center">
        {{ $kuliners->links() }}
    </div>
    @else
    <div class="text-center py-16">
        <i class="fas fa-utensils text-5xl text-gray-300 mb-4"></i>
        <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum ada data kuliner</h3>
        <p class="text-gray-500">Data kuliner akan segera ditambahkan.</p>
    </div>
    @endif
</section>

@endsection