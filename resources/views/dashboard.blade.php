@extends('layouts.app')

@section('title', 'Dashboard - Explore Sumatera')

@section('content')

<section class="container mx-auto px-6 py-12">

    {{-- Welcome --}}
    <div class="bg-gradient-to-br from-emerald-700 to-green-800 dark:from-emerald-900 dark:to-slate-900 rounded-3xl p-8 md:p-10 mb-8 relative overflow-hidden">
        <div class="absolute -top-20 -right-20 w-64 h-64 bg-emerald-500/20 rounded-full blur-3xl"></div>
        <div class="relative">
            <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/20 px-3 py-1.5 rounded-full mb-4">
                <span class="w-1.5 h-1.5 bg-emerald-300 rounded-full animate-pulse"></span>
                <span class="text-xs font-bold text-white uppercase tracking-widest">Dashboard User</span>
            </div>
            <h1 class="text-3xl md:text-4xl font-black text-white mb-2 tracking-tight">
                Halo, {{ Auth::user()->name }}! 👋
            </h1>
            <p class="text-emerald-100/90 text-lg font-light">
                Selamat datang kembali di Explore Sumatera.
            </p>
        </div>
    </div>

    {{-- Stats --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-gray-100 dark:border-slate-800">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-amber-500 to-orange-600 flex items-center justify-center shadow-lg">
                    <i class="fas fa-star text-white text-lg"></i>
                </div>
                <span class="text-3xl font-black text-gray-900 dark:text-white">{{ $totalReviews }}</span>
            </div>
            <h3 class="font-bold text-gray-900 dark:text-white">Review Saya</h3>
            <p class="text-sm text-gray-500 dark:text-slate-400">Total review yang sudah kamu berikan</p>
        </div>

        <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-gray-100 dark:border-slate-800">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-pink-500 to-red-600 flex items-center justify-center shadow-lg">
                    <i class="fas fa-heart text-white text-lg"></i>
                </div>
                <span class="text-3xl font-black text-gray-900 dark:text-white">{{ $totalFavorit }}</span>
            </div>
            <h3 class="font-bold text-gray-900 dark:text-white">Favorit Saya</h3>
            <p class="text-sm text-gray-500 dark:text-slate-400">Destinasi yang kamu simpan</p>
        </div>
    </div>

    {{-- Recent Reviews --}}
    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-gray-100 dark:border-slate-800 overflow-hidden">
        <div class="p-6 border-b border-gray-100 dark:border-slate-800 flex items-center justify-between">
            <div>
                <h2 class="text-xl font-black text-gray-900 dark:text-white">Review Terakhir</h2>
                <p class="text-sm text-gray-500 dark:text-slate-400">Aktivitas review kamu</p>
            </div>
            <a href="{{ route('destinasi.index') }}"
                class="text-sm font-bold text-emerald-700 dark:text-emerald-400 hover:underline">
                Cari Destinasi →
            </a>
        </div>

        @if ($recentReviews->count() > 0)
        <div class="divide-y divide-gray-100 dark:divide-slate-800">
            @foreach ($recentReviews as $review)
            <div class="p-6 flex items-start gap-4">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-500 to-green-600 flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-comment-dots text-white"></i>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-center justify-between gap-2 mb-1">
                        <h4 class="font-bold text-gray-900 dark:text-white truncate">
                            {{ $review->destinasi->nama ?? 'Destinasi' }}
                        </h4>
                        <div class="flex items-center gap-1 text-amber-500 text-xs flex-shrink-0">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star {{ $i <= $review->rating ? 'text-amber-500' : 'text-gray-300 dark:text-slate-700' }}"></i>
                                @endfor
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-slate-400 line-clamp-2">{{ $review->komentar }}</p>
                    <p class="text-xs text-gray-400 dark:text-slate-500 mt-1">{{ $review->created_at->diffForHumans() }}</p>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="p-12 text-center">
            <i class="fas fa-comment-slash text-5xl text-gray-300 dark:text-slate-700 mb-4"></i>
            <p class="text-gray-500 dark:text-slate-400 font-medium mb-2">Belum ada review</p>
            <p class="text-sm text-gray-400 dark:text-slate-500 mb-6">Mulai beri review destinasi favoritmu!</p>
            <a href="{{ route('destinasi.index') }}"
                class="inline-flex items-center gap-2 bg-gradient-to-r from-emerald-600 to-green-700 text-white px-6 py-3 rounded-xl font-bold hover:shadow-lg transition-all">
                <i class="fas fa-compass"></i> Jelajahi Destinasi
            </a>
        </div>
        @endif
    </div>
</section>

@endsection