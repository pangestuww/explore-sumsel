@extends('layouts.app')

@section('title', 'Admin Dashboard - Explore Sumatera')

@section('content')

<section class="container mx-auto px-6 py-12">

    {{-- Welcome --}}
    <div class="bg-gradient-to-br from-slate-900 via-emerald-950 to-slate-900 rounded-3xl p-8 md:p-10 mb-8 relative overflow-hidden">
        <div class="absolute -top-20 -right-20 w-64 h-64 bg-emerald-500/20 rounded-full blur-3xl"></div>
        <div class="relative">
            <div class="inline-flex items-center gap-2 bg-amber-500/20 backdrop-blur-md border border-amber-400/30 px-3 py-1.5 rounded-full mb-4">
                <i class="fas fa-crown text-amber-400 text-xs"></i>
                <span class="text-xs font-bold text-amber-300 uppercase tracking-widest">Administrator</span>
            </div>
            <h1 class="text-3xl md:text-4xl font-black text-white mb-2 tracking-tight">
                Admin Dashboard
            </h1>
            <p class="text-gray-400 text-lg font-light">
                Kelola semua konten Explore Sumatera dari sini.
            </p>
        </div>
    </div>

    {{-- Stats Grid --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white dark:bg-slate-900 rounded-2xl p-5 border border-gray-100 dark:border-slate-800">
            <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center mb-3">
                <i class="fas fa-users text-white text-sm"></i>
            </div>
            <p class="text-2xl font-black text-gray-900 dark:text-white">{{ $stats['totalUsers'] }}</p>
            <p class="text-xs text-gray-500 dark:text-slate-400 font-bold uppercase tracking-wider">Users</p>
        </div>

        <div class="bg-white dark:bg-slate-900 rounded-2xl p-5 border border-gray-100 dark:border-slate-800">
            <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-emerald-500 to-green-700 flex items-center justify-center mb-3">
                <i class="fas fa-map-marked-alt text-white text-sm"></i>
            </div>
            <p class="text-2xl font-black text-gray-900 dark:text-white">{{ $stats['totalDestinasi'] }}</p>
            <p class="text-xs text-gray-500 dark:text-slate-400 font-bold uppercase tracking-wider">Destinasi</p>
        </div>

        <div class="bg-white dark:bg-slate-900 rounded-2xl p-5 border border-gray-100 dark:border-slate-800">
            <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-purple-500 to-pink-600 flex items-center justify-center mb-3">
                <i class="fas fa-masks-theater text-white text-sm"></i>
            </div>
            <p class="text-2xl font-black text-gray-900 dark:text-white">{{ $stats['totalBudaya'] }}</p>
            <p class="text-xs text-gray-500 dark:text-slate-400 font-bold uppercase tracking-wider">Budaya</p>
        </div>

        <div class="bg-white dark:bg-slate-900 rounded-2xl p-5 border border-gray-100 dark:border-slate-800">
            <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-orange-500 to-red-600 flex items-center justify-center mb-3">
                <i class="fas fa-utensils text-white text-sm"></i>
            </div>
            <p class="text-2xl font-black text-gray-900 dark:text-white">{{ $stats['totalKuliner'] }}</p>
            <p class="text-xs text-gray-500 dark:text-slate-400 font-bold uppercase tracking-wider">Kuliner</p>
        </div>

        <div class="bg-white dark:bg-slate-900 rounded-2xl p-5 border border-gray-100 dark:border-slate-800">
            <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-amber-500 to-yellow-600 flex items-center justify-center mb-3">
                <i class="fas fa-star text-white text-sm"></i>
            </div>
            <p class="text-2xl font-black text-gray-900 dark:text-white">{{ $stats['totalReview'] }}</p>
            <p class="text-xs text-gray-500 dark:text-slate-400 font-bold uppercase tracking-wider">Review</p>
        </div>

        <div class="bg-white dark:bg-slate-900 rounded-2xl p-5 border border-gray-100 dark:border-slate-800">
            <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center mb-3">
                <i class="fas fa-map text-white text-sm"></i>
            </div>
            <p class="text-2xl font-black text-gray-900 dark:text-white">{{ $stats['totalProvinsi'] }}</p>
            <p class="text-xs text-gray-500 dark:text-slate-400 font-bold uppercase tracking-wider">Provinsi</p>
        </div>

        <div class="bg-white dark:bg-slate-900 rounded-2xl p-5 border border-gray-100 dark:border-slate-800">
            <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center mb-3">
                <i class="fas fa-city text-white text-sm"></i>
            </div>
            <p class="text-2xl font-black text-gray-900 dark:text-white">{{ $stats['totalKabupaten'] }}</p>
            <p class="text-xs text-gray-500 dark:text-slate-400 font-bold uppercase tracking-wider">Kabupaten</p>
        </div>

        <div class="bg-gradient-to-br from-emerald-600 to-green-700 rounded-2xl p-5 shadow-lg">
            <div class="w-10 h-10 rounded-lg bg-white/20 flex items-center justify-center mb-3">
                <i class="fas fa-plus text-white text-sm"></i>
            </div>
            <p class="text-sm font-black text-white">Tambah Konten</p>
            <p class="text-xs text-emerald-100/80 font-medium mt-1">Segera hadir</p>
        </div>
    </div>

    {{-- Two Columns --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        {{-- Recent Users --}}
        <div class="bg-white dark:bg-slate-900 rounded-2xl border border-gray-100 dark:border-slate-800 overflow-hidden">
            <div class="p-5 border-b border-gray-100 dark:border-slate-800">
                <h2 class="font-black text-gray-900 dark:text-white">User Terbaru</h2>
                <p class="text-xs text-gray-500 dark:text-slate-400">5 user terakhir yang bergabung</p>
            </div>
            <div class="divide-y divide-gray-100 dark:divide-slate-800">
                @forelse ($recentUsers as $u)
                <div class="p-4 flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-emerald-500 to-green-600 flex items-center justify-center text-white font-bold text-sm">
                        {{ strtoupper(substr($u->name, 0, 1)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-bold text-sm text-gray-900 dark:text-white truncate">{{ $u->name }}</p>
                        <p class="text-xs text-gray-500 dark:text-slate-400 truncate">{{ $u->email }}</p>
                    </div>
                    <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded-full
                            {{ $u->role === 'admin' 
                                ? 'bg-amber-100 text-amber-700 dark:bg-amber-950 dark:text-amber-400' 
                                : 'bg-emerald-100 text-emerald-700 dark:bg-emerald-950 dark:text-emerald-400' }}">
                        {{ $u->role }}
                    </span>
                </div>
                @empty
                <p class="p-6 text-center text-gray-500 dark:text-slate-400 text-sm">Belum ada user.</p>
                @endforelse
            </div>
        </div>

        {{-- Recent Reviews --}}
        <div class="bg-white dark:bg-slate-900 rounded-2xl border border-gray-100 dark:border-slate-800 overflow-hidden">
            <div class="p-5 border-b border-gray-100 dark:border-slate-800">
                <h2 class="font-black text-gray-900 dark:text-white">Review Terbaru</h2>
                <p class="text-xs text-gray-500 dark:text-slate-400">5 review terakhir dari user</p>
            </div>
            <div class="divide-y divide-gray-100 dark:divide-slate-800">
                @forelse ($recentReviews as $r)
                <div class="p-4">
                    <div class="flex items-center justify-between gap-2 mb-1">
                        <p class="font-bold text-sm text-gray-900 dark:text-white truncate">
                            {{ $r->user->name ?? 'User' }}
                        </p>
                        <div class="flex items-center gap-1 text-xs flex-shrink-0">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star {{ $i <= $r->rating ? 'text-amber-500' : 'text-gray-300 dark:text-slate-700' }}"></i>
                                @endfor
                        </div>
                    </div>
                    <p class="text-xs text-gray-500 dark:text-slate-400 line-clamp-2">{{ $r->komentar }}</p>
                    <p class="text-[10px] text-gray-400 mt-1">
                        <i class="fas fa-map-marker-alt mr-1"></i>
                        {{ $r->destinasi->nama ?? 'Destinasi' }} • {{ $r->created_at->diffForHumans() }}
                    </p>
                </div>
                @empty
                <p class="p-6 text-center text-gray-500 dark:text-slate-400 text-sm">Belum ada review.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>

@endsection 