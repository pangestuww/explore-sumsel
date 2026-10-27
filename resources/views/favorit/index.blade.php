@extends('layouts.app')

@section('title', 'Favorit Saya - Explore Sumatera')

@section('content')
<div class="min-h-screen bg-[#0b1120] py-10">
    <div class="container mx-auto px-6 max-w-6xl">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-black text-white">Favorit Saya</h1>
                <p class="text-slate-400 mt-1">Semua destinasi, budaya, dan kuliner yang kamu simpan.</p>
            </div>
            <a href="{{ route('dashboard') }}" class="bg-slate-800 hover:bg-slate-700 text-white px-5 py-2.5 rounded-xl font-bold transition text-sm">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>

        @if($favorits->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($favorits as $fav)
            @php
            $item = null;
            $route = '#';
            $color = 'emerald';

            if($fav->destinasi) {
            $item = $fav->destinasi;
            $route = route('destinasi.show', $item->slug);
            $color = 'emerald';
            } elseif($fav->budaya) {
            $item = $fav->budaya;
            $route = route('budaya.show', $item->slug);
            $color = 'purple';
            } elseif($fav->kuliner) {
            $item = $fav->kuliner;
            $route = route('kuliner.show', $item->slug);
            $color = 'orange';
            }
            @endphp

            @if($item)
            <div class="bg-[#0f172a] rounded-2xl border border-slate-800 overflow-hidden relative">
                <img src="{{ str_starts_with($item->gambar, 'http') ? $item->gambar : asset('storage/'.$item->gambar) }}" class="w-full h-40 object-cover">

                <!-- Tombol Hapus Favorit -->
                <form action="{{ route('favorit.destroy', ['type' => $fav->destinasi ? 'destinasi' : ($fav->budaya ? 'budaya' : 'kuliner'), 'id' => $item->id]) }}" method="POST" class="absolute top-3 right-3">
                    @csrf
                    @method('DELETE')
                    <button class="w-8 h-8 bg-black/50 hover:bg-red-500 text-white rounded-full backdrop-blur-sm transition flex items-center justify-center">
                        <i class="fas fa-trash text-xs"></i>
                    </button>
                </form>

                <div class="p-5">
                    <span class="text-[10px] font-bold uppercase text-{{ $color }}-400 bg-{{ $color }}-400/10 px-2 py-1 rounded-md mb-2 inline-block">
                        {{ $fav->destinasi ? 'Destinasi' : ($fav->budaya ? 'Budaya' : 'Kuliner') }}
                    </span>
                    <h3 class="text-lg font-bold text-white mb-2">{{ $item->nama }}</h3>
                    <a href="{{ $route }}" class="text-emerald-400 text-sm font-bold hover:text-emerald-300 transition">Lihat Detail →</a>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        @else
        <div class="bg-[#0f172a] rounded-2xl border border-slate-800 p-12 text-center">
            <i class="fas fa-heart-broken text-4xl text-slate-600 mb-4"></i>
            <h3 class="text-xl font-bold text-white mb-2">Belum ada favorit</h3>
            <p class="text-slate-400 mb-6">Kamu belum menyimpan destinasi, budaya, atau kuliner apa pun.</p>
            <a href="{{ route('destinasi.index') }}" class="bg-emerald-600 hover:bg-emerald-500 text-white px-6 py-3 rounded-xl font-bold transition">Jelajahi Sekarang</a>
        </div>
        @endif
    </div>
</div>
@endsection