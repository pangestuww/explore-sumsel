@extends('layouts.app')

@section('title', 'Beranda - Explore Sumsel')

@section('content')

{{-- HERO SECTION --}}
<section class="relative h-[550px] flex items-center bg-green-900"
    style="background-image: url('https://enimekspres.disway.id/upload/ce56b7b3eac7293fef69c2b5ae438d84.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">

    <div class="absolute inset-0 bg-black/50"></div>

    <div class="container mx-auto px-6 relative z-10 text-white">
        <h1 class="text-5xl md:text-6xl font-bold leading-tight mb-4">
            Jelajahi Pesona<br>Sumatera Selatan
        </h1>
        <p class="text-lg md:text-xl mb-8 max-w-xl text-gray-100">
            Temukan keindahan alam, budaya, dan kuliner khas Sumatera Selatan.
        </p>

        <form action="{{ route('destinasi.index') }}" method="GET" class="bg-white rounded-lg p-2 flex gap-2 max-w-2xl shadow-lg">
            <i class="fas fa-search text-gray-400 self-center ml-3"></i>
            <input type="text" name="q" placeholder="Cari destinasi wisata..."
                class="flex-1 px-3 py-2 outline-none text-gray-800">
            <button type="submit" class="bg-green-700 text-white px-6 py-2 rounded-md hover:bg-green-800 transition font-medium">
                Cari
            </button>
        </form>
    </div>
</section>

{{-- KATEGORI --}}
<section class="container mx-auto px-6 -mt-12 relative z-20">
    <div class="bg-white rounded-2xl shadow-xl p-6 grid grid-cols-3 md:grid-cols-5 gap-4">
        @php
        $kategori = [
        ['icon' => 'fa-mountain', 'label' => 'Gunung'],
        ['icon' => 'fa-water', 'label' => 'Pantai'],
        ['icon' => 'fa-utensils', 'label' => 'Kuliner'],
        ['icon' => 'fa-masks-theater', 'label' => 'Budaya'],
        ['icon' => 'fa-landmark', 'label' => 'Sejarah'],
        ];
        @endphp
        @foreach ($kategori as $k)
        <div class="flex flex-col items-center gap-2 p-3 rounded-lg hover:bg-green-50 cursor-pointer transition">
            <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center">
                <i class="fas {{ $k['icon'] }} text-green-700"></i>
            </div>
            <span class="text-sm font-medium text-gray-700">{{ $k['label'] }}</span>
        </div>
        @endforeach
    </div>
</section>

{{-- DESTINASI POPULER --}}
<section class="container mx-auto px-6 py-16">
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-3xl font-bold text-gray-800">Destinasi Populer</h2>
        <a href="#" class="text-green-700 font-medium hover:underline">Lihat Semua →</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse ($destinasiPopuler as $d)
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition group">
            <div class="h-48 bg-gray-200 overflow-hidden">
                <img src="{{ $d->gambar ?? 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=600' }}"
                    alt="{{ $d->nama }}"
                    class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
            </div>
            <div class="p-4">
                <div class="flex items-center gap-1 text-yellow-500 text-sm mb-2">
                    <i class="fas fa-star"></i>
                    <span class="text-gray-600">{{ $d->rating }}</span>
                </div>
                <h3 class="font-bold text-lg text-gray-800 mb-1">{{ $d->nama }}</h3>
                <p class="text-sm text-gray-500">
                    <i class="fas fa-map-marker-alt mr-1"></i>
                    {{ $d->kabupaten->nama }}
                </p>
            </div>
        </div>
        @empty
        <p class="text-gray-500">Belum ada destinasi.</p>
        @endforelse
    </div>
</section>

{{-- CTA PETA --}}
<section class="container mx-auto px-6 pb-16">
    <div class="bg-green-800 rounded-2xl p-10 text-white grid md:grid-cols-2 gap-8 items-center">
        <div>
            <h2 class="text-3xl font-bold mb-3">17 Kabupaten/Kota Sumatera Selatan</h2>
            <p class="text-green-100 mb-6">
                Jelajahi setiap sudut Sumatera Selatan melalui peta interaktif.
            </p>
            <a href="#" class="inline-block bg-white text-green-800 px-6 py-3 rounded-lg font-semibold hover:bg-green-50 transition">
                Jelajahi Sekarang
            </a>
        </div>
        <div class="h-52 bg-green-700 rounded-xl flex items-center justify-center">
            <i class="fas fa-map-marked-alt text-7xl text-green-300"></i>
        </div>
    </div>
</section>

@endsection