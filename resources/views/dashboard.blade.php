@extends('layouts.app')

@section('title', 'Dashboard User - Explore Sumatera')

@section('content')
<div class="min-h-screen bg-slate-50 dark:bg-[#0b1120] py-10 transition-colors duration-300">
    <div class="container mx-auto px-4 md:px-6 max-w-6xl">

        <!-- Banner Selamat Datang -->
        <div class="bg-gradient-to-br from-emerald-100 to-teal-50 dark:from-[#064e3b] dark:to-[#0f172a] rounded-2xl p-6 md:p-8 border border-emerald-200 dark:border-emerald-900/50 mb-6 shadow-sm dark:shadow-lg relative overflow-hidden transition-colors duration-300">
            <div class="absolute -top-10 -right-10 w-40 h-40 bg-emerald-500/10 rounded-full blur-2xl"></div>

            <div class="relative z-10">
                <p class="text-emerald-700 dark:text-emerald-400 text-xs font-bold tracking-widest uppercase mb-2">Dashboard User</p>
                <h1 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white mb-2 flex items-center gap-2 transition-colors duration-300">
                    Halo, {{ Auth::user()->name ?? 'Pengguna' }}! 👋
                </h1>
                <p class="text-slate-600 dark:text-slate-300 text-sm mb-6 transition-colors duration-300">Mau menjelajahi Sumatera ke mana hari ini?</p>

                <button type="button" onclick="getLocation()" class="w-full bg-emerald-600 hover:bg-emerald-500 text-white font-bold py-3 px-6 rounded-xl transition-all flex items-center justify-center gap-2 shadow-lg shadow-emerald-600/30">
                    <i class="fas fa-location-arrow"></i> Gunakan Lokasi Saya
                </button>
            </div>
        </div>

        <!-- Statistik -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <a href="#review-section" class="bg-white dark:bg-[#0f172a] rounded-2xl p-6 border border-slate-200 dark:border-slate-800 relative group hover:border-amber-500/50 transition-all duration-300 block shadow-sm dark:shadow-none">
                <div class="w-10 h-10 rounded-xl bg-amber-100 dark:bg-amber-500/20 flex items-center justify-center mb-4 transition-colors">
                    <i class="fas fa-star text-amber-500 dark:text-amber-400"></i>
                </div>
                <p class="text-4xl font-bold text-slate-900 dark:text-white mb-1 transition-colors">{{ $totalReviews }}</p>
                <p class="text-slate-500 dark:text-slate-400 text-sm transition-colors">Review Saya</p>
            </a>

            <a href="{{ route('favorit.index') }}" class="bg-white dark:bg-[#0f172a] rounded-2xl p-6 border border-slate-200 dark:border-slate-800 relative group hover:border-pink-500/50 transition-all duration-300 block shadow-sm dark:shadow-none">
                <div class="w-10 h-10 rounded-xl bg-pink-100 dark:bg-pink-500/20 flex items-center justify-center mb-4 transition-colors">
                    <i class="fas fa-heart text-pink-500 dark:text-pink-400"></i>
                </div>
                <p class="text-4xl font-bold text-slate-900 dark:text-white mb-1 transition-colors">{{ $totalFavorit }}</p>
                <p class="text-slate-500 dark:text-slate-400 text-sm transition-colors">Favorit Saya</p>
            </a>
        </div>

        <!-- Perjalanan Saya -->
        <div class="mb-8">
            <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-4 transition-colors">Perjalanan Saya</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Wisata Terdekat -->
                <a href="{{ route('peta.index') }}" class="bg-white dark:bg-[#0f172a] rounded-2xl p-6 border border-slate-200 dark:border-slate-800 hover:border-emerald-500/50 transition-all duration-300 cursor-pointer group block shadow-sm dark:shadow-none">
                    <div class="mb-4">
                        <i class="fas fa-location-arrow text-emerald-500 dark:text-emerald-400 text-xl group-hover:scale-110 transition-transform"></i>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-1 transition-colors">Wisata Terdekat</h3>
                    <p class="text-slate-500 dark:text-slate-400 text-sm transition-colors">Temukan wisata dari lokasimu.</p>
                </a>

                <!-- Rute Wisata -->
                <a href="{{ route('peta.index') }}" class="bg-white dark:bg-[#0f172a] rounded-2xl p-6 border border-slate-200 dark:border-slate-800 hover:border-emerald-500/50 transition-all duration-300 cursor-pointer group block shadow-sm dark:shadow-none">
                    <div class="mb-4">
                        <i class="fas fa-route text-emerald-500 dark:text-emerald-400 text-xl group-hover:scale-110 transition-transform"></i>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-1 transition-colors">Rute Wisata</h3>
                    <p class="text-slate-500 dark:text-slate-400 text-sm transition-colors">Susun rute ke beberapa tempat.</p>
                </a>

                <!-- Itinerary Saya -->
                <a href="{{ route('destinasi.index') }}" class="bg-white dark:bg-[#0f172a] rounded-2xl p-6 border border-slate-200 dark:border-slate-800 hover:border-emerald-500/50 transition-all duration-300 cursor-pointer group block shadow-sm dark:shadow-none">
                    <div class="mb-4">
                        <i class="fas fa-calendar-alt text-emerald-500 dark:text-emerald-400 text-xl group-hover:scale-110 transition-transform"></i>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-1 transition-colors">Itinerary Saya</h3>
                    <p class="text-slate-500 dark:text-slate-400 text-sm transition-colors">Atur jadwal perjalanan.</p>
                </a>

                <!-- Favorit Saya -->
                <a href="{{ route('favorit.index') }}" class="bg-white dark:bg-[#0f172a] rounded-2xl p-6 border border-slate-200 dark:border-slate-800 hover:border-emerald-500/50 transition-all duration-300 cursor-pointer group block shadow-sm dark:shadow-none">
                    <div class="mb-4">
                        <i class="fas fa-bookmark text-emerald-500 dark:text-emerald-400 text-xl group-hover:scale-110 transition-transform"></i>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-1 transition-colors">Favorit Saya</h3>
                    <p class="text-slate-500 dark:text-slate-400 text-sm transition-colors">Lihat wisata tersimpan.</p>
                </a>
            </div>
        </div>

        <!-- Review Terakhir -->
        <div id="review-section" class="bg-white dark:bg-[#0f172a] rounded-2xl p-6 border border-slate-200 dark:border-slate-800 mb-8 transition-colors duration-300 shadow-sm dark:shadow-none">
            <div class="flex items-center justify-between mb-2">
                <h2 class="text-xl font-bold text-slate-900 dark:text-white transition-colors">Review Terakhir</h2>
                <a href="{{ route('destinasi.index') }}" class="text-sm font-bold text-emerald-600 dark:text-emerald-400 hover:text-emerald-500">Cari Destinasi</a>
            </div>
            <p class="text-slate-500 dark:text-slate-400 text-sm mb-6 transition-colors">Aktivitas ulasan destinasi kamu.</p>

            @if($recentReviews->count() > 0)
            <div class="space-y-4">
                @foreach($recentReviews as $review)
                @php
                $link = '#';
                $namaTempat = 'Destinasi';

                if ($review->destinasi) {
                $link = route('destinasi.show', $review->destinasi->slug);
                $namaTempat = $review->destinasi->nama;
                } elseif ($review->budaya) {
                $link = route('budaya.show', $review->budaya->slug);
                $namaTempat = $review->budaya->nama;
                } elseif ($review->kuliner) {
                $link = route('kuliner.show', $review->kuliner->slug);
                $namaTempat = $review->kuliner->nama;
                }
                @endphp

                <a href="{{ $link }}" class="p-4 bg-slate-50 dark:bg-slate-900 rounded-xl border border-slate-100 dark:border-slate-800 flex items-start gap-4 transition-all duration-200 hover:bg-slate-100 dark:hover:bg-slate-800 hover:border-emerald-300 dark:hover:border-emerald-700 hover:shadow-md cursor-pointer group block">
                    <div class="w-10 h-10 rounded-full bg-emerald-100 dark:bg-emerald-500/20 flex items-center justify-center shrink-0 transition-colors">
                        <i class="fas fa-check text-emerald-600 dark:text-emerald-400"></i>
                    </div>

                    <div class="flex-grow">
                        <div class="flex justify-between items-start">
                            <h4 class="text-slate-900 dark:text-white font-bold text-sm transition-colors group-hover:text-emerald-600 dark:group-hover:text-emerald-400">
                                {{ $namaTempat }}
                            </h4>
                            <i class="fas fa-chevron-right text-slate-400 group-hover:text-emerald-500 transition-colors text-xs mt-1"></i>
                        </div>

                        <div class="flex items-center gap-1 text-amber-500 text-xs mt-1">
                            @for($i=1; $i<=5; $i++)
                                <i class="fas fa-star {{ $i <= $review->rating ? '' : 'text-slate-300 dark:text-slate-700' }}"></i>
                                @endfor
                        </div>
                        <p class="text-slate-600 dark:text-slate-300 text-sm mt-2 transition-colors line-clamp-2">{{ $review->komentar }}</p>
                    </div>
                </a>
                @endforeach
            </div>
            @else
            <div class="flex flex-col items-center justify-center py-12 text-center border-t border-slate-100 dark:border-slate-800/50 mt-4">
                <div class="w-16 h-16 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center mb-4 transition-colors">
                    <i class="fas fa-comment-slash text-slate-400 dark:text-slate-500 text-2xl"></i>
                </div>
                <p class="text-slate-700 dark:text-slate-300 font-medium mb-1 transition-colors">Belum ada review</p>
                <p class="text-slate-500 dark:text-slate-400 text-sm mb-4 transition-colors">Mulai beri review destinasi favoritmu!</p>
                <a href="{{ route('destinasi.index') }}" class="bg-emerald-600 hover:bg-emerald-500 text-white px-5 py-2.5 rounded-lg font-bold transition text-sm">
                    Cari Destinasi
                </a>
            </div>
            @endif
        </div>

    </div>
</div>

<!-- Script Geolocation -->
<script>
    function getLocation() {
        if (navigator.geolocation) {
            alert("Sedang mencari lokasi...");

            navigator.geolocation.getCurrentPosition(
                function(position) {
                    var lat = position.coords.latitude;
                    var lng = position.coords.longitude;
                    window.location.href = "{{ route('peta.index') }}?lat=" + lat + "&lng=" + lng;
                },
                function(error) {
                    alert("Gagal mendapatkan lokasi. Pastikan izin GPS/Lokasi di browser kamu sudah menyala.");
                }, {
                    enableHighAccuracy: true,
                    timeout: 10000,
                    maximumAge: 0
                }
            );
        } else {
            alert("Browser kamu tidak mendukung fitur lokasi.");
        }
    }
</script>
@endsection