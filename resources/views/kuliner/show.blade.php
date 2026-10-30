@extends('layouts.app')

@section('title', $kuliner->nama . ' - Explore Sumatera')

@section('content')

@php
$totalReview = $reviews->count();
$avgRating = $totalReview > 0 ? number_format($reviews->avg('rating'), 1) : '0.0';
@endphp

{{-- HERO SECTION (Menggunakan Background Image) --}}
@php
$gambarUrl = str_starts_with($kuliner->gambar, 'http') ? $kuliner->gambar : asset($kuliner->gambar);
@endphp
<section class="relative w-full min-h-[500px] md:min-h-[600px] flex items-end overflow-hidden pb-12 pt-32">
    <div class="absolute inset-0 z-0 bg-cover bg-center" style="background-image: url('{{ $gambarUrl }}');"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-[#091413] via-[#091413]/70 to-[#091413]/30 z-0"></div>

    <div class="container mx-auto px-6 relative z-10">
        <nav class="text-sm mb-4 text-gray-300 flex items-center gap-2 fade-in-up">
            <a href="{{ route('home') }}" class="hover:text-orange-400 transition">Beranda</a>
            <i class="fas fa-chevron-right text-[10px] text-gray-500"></i>
            <a href="{{ route('kuliner.index') }}" class="hover:text-orange-400 transition">Kuliner</a>
            <i class="fas fa-chevron-right text-[10px] text-gray-500"></i>
            <span class="text-white font-medium truncate max-w-[200px] md:max-w-full">{{ $kuliner->nama }}</span>
        </nav>

        <div class="max-w-4xl fade-in-up" style="animation-delay: 0.1s;">
            <h1 class="text-4xl md:text-5xl font-black text-white leading-tight tracking-tight mb-4 drop-shadow-lg">
                {{ $kuliner->nama }}
            </h1>
            <div class="flex flex-wrap items-center gap-4 text-sm font-medium">
                <span class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/20 text-white px-4 py-1.5 rounded-full uppercase tracking-wider text-xs">
                    <i class="fas fa-utensils"></i> {{ str_replace('_', ' ', $kuliner->jenis) }}
                </span>
                <span class="inline-flex items-center gap-2 text-gray-200">
                    <i class="fas fa-map-marker-alt text-amber-400"></i>
                    {{ $kuliner->kabupaten->nama ?? 'Sumatera' }}, {{ $kuliner->kabupaten->provinsi->nama ?? '' }}
                </span>
                <span class="inline-flex items-center gap-2 text-gray-200 bg-white/10 px-3 py-1.5 rounded-full backdrop-blur-md border border-white/20">
                    <i class="fas fa-star text-amber-400"></i>
                    <strong class="text-white">{{ $avgRating }}</strong> / 5.0
                    <span class="text-gray-400 text-xs ml-1">({{ $totalReview }} ulasan)</span>
                </span>
            </div>
        </div>
    </div>
</section>

{{-- MAIN CONTENT --}}
<section class="bg-slate-50 dark:bg-[#091413] py-12 relative z-20 transition-colors duration-300">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            <div class="md:col-span-2 space-y-10">

                @if(session('success'))
                <div class="bg-emerald-100 border border-emerald-400 text-emerald-700 px-4 py-3 rounded-xl mb-4 text-sm font-bold">
                    <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                </div>
                @endif

                <div class="bg-white dark:bg-[#0f1a18] rounded-3xl p-6 md:p-8 shadow-sm border border-slate-200 dark:border-[#1a2e29] transition-colors duration-300">
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">Tentang Kuliner</h2>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed text-lg whitespace-pre-line">
                        {{ $kuliner->deskripsi }}
                    </p>
                </div>

                <div class="bg-white dark:bg-[#0f1a18] rounded-3xl p-6 md:p-8 shadow-sm border border-slate-200 dark:border-[#1a2e29] transition-colors duration-300">
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">Informasi Kuliner</h2>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 flex items-center justify-center shrink-0">
                                <i class="fas fa-utensils text-orange-500 text-xl"></i>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Kategori</p>
                                <p class="text-sm font-bold text-slate-900 dark:text-white capitalize">{{ str_replace('_', ' ', $kuliner->jenis) }}</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 flex items-center justify-center shrink-0">
                                <i class="fas fa-map text-blue-500 text-xl"></i>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Provinsi</p>
                                <p class="text-sm font-bold text-slate-900 dark:text-white">{{ $kuliner->kabupaten->provinsi->nama ?? '-' }}</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 flex items-center justify-center shrink-0">
                                <i class="fas fa-map-marker-alt text-amber-500 text-xl"></i>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Kabupaten/Kota</p>
                                <p class="text-sm font-bold text-slate-900 dark:text-white">{{ $kuliner->kabupaten->nama ?? '-' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- DESKRIPSI BAWAH --}}
                @if(!empty($kuliner->deskripsi_bawah))
                <div class="bg-white dark:bg-[#0f1a18] rounded-3xl p-6 md:p-8 shadow-sm border border-slate-200 dark:border-[#1a2e29] transition-colors duration-300">
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">Informasi Tambahan</h2>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed text-lg whitespace-pre-line">
                        {{ $kuliner->deskripsi_bawah }}
                    </p>
                </div>
                @endif

                {{-- ULASAN PENGUNJUNG --}}
                <div class="pt-6 border-t border-slate-200 dark:border-[#1a2e29] transition-colors duration-300">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold text-slate-900 dark:text-white">Ulasan Pengunjung</h2>
                        <span class="text-sm text-slate-500 dark:text-slate-400">{{ $totalReview }} ulasan</span>
                    </div>

                    <div class="bg-white dark:bg-[#0f1a18] border border-slate-200 dark:border-[#1a2e29] rounded-2xl p-6 mb-8 shadow-sm transition-colors duration-300">
                        <h3 class="font-bold text-slate-900 dark:text-white mb-4">Tulis Ulasan Anda</h3>
                        @auth
                        <form action="{{ route('review.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="type" value="kuliner">
                            <input type="hidden" name="id" value="{{ $kuliner->id }}">

                            <div class="flex gap-1 mb-4 text-2xl text-slate-300 dark:text-slate-600 star-rating-container">
                                <input type="radio" name="rating" value="1" id="star1-kul" class="hidden" required><label for="star1-kul" class="cursor-pointer hover:text-amber-400 transition-colors"><i class="far fa-star"></i></label>
                                <input type="radio" name="rating" value="2" id="star2-kul" class="hidden"><label for="star2-kul" class="cursor-pointer hover:text-amber-400 transition-colors"><i class="far fa-star"></i></label>
                                <input type="radio" name="rating" value="3" id="star3-kul" class="hidden"><label for="star3-kul" class="cursor-pointer hover:text-amber-400 transition-colors"><i class="far fa-star"></i></label>
                                <input type="radio" name="rating" value="4" id="star4-kul" class="hidden"><label for="star4-kul" class="cursor-pointer hover:text-amber-400 transition-colors"><i class="far fa-star"></i></label>
                                <input type="radio" name="rating" value="5" id="star5-kul" class="hidden"><label for="star5-kul" class="cursor-pointer hover:text-amber-400 transition-colors"><i class="far fa-star"></i></label>
                            </div>

                            <textarea name="komentar" rows="3" placeholder="Bagaimana rasanya kuliner ini?" class="w-full bg-slate-50 dark:bg-[#11211d] border border-slate-300 dark:border-[#1a2e29] rounded-xl p-4 text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 mb-4 text-sm transition-colors" required></textarea>

                            <button type="submit" class="bg-emerald-600 hover:bg-emerald-500 text-white px-6 py-2.5 rounded-xl font-bold transition-all text-sm shadow-lg shadow-emerald-600/30">Kirim Ulasan</button>
                        </form>
                        @else
                        <p class="text-slate-600 dark:text-slate-400 text-sm"><a href="{{ route('login') }}" class="text-emerald-500 dark:text-emerald-400 hover:underline font-bold">Login</a> untuk menulis ulasan.</p>
                        @endauth
                    </div>

                    <div class="space-y-4">
                        @forelse($reviews as $review)
                        <div class="bg-white dark:bg-[#0f1a18] border border-slate-200 dark:border-[#1a2e29] rounded-2xl p-5 shadow-sm transition-colors duration-300">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-emerald-100 dark:bg-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center font-bold text-xs">{{ substr($review->user->name ?? 'U', 0, 1) }}</div>
                                    <h4 class="font-bold text-slate-900 dark:text-white text-sm">{{ $review->user->name ?? 'Pengunjung' }}</h4>
                                </div>
                                <div class="flex text-amber-400 text-xs">
                                    @for($i=1; $i<=5; $i++)
                                        <i class="{{ $i <= $review->rating ? 'fas' : 'far' }} fa-star"></i>
                                        @endfor
                                </div>
                            </div>
                            <p class="text-slate-600 dark:text-slate-300 text-sm mt-2">{{ $review->komentar }}</p>
                            <p class="text-xs text-slate-400 dark:text-slate-500 mt-3">{{ $review->created_at->diffForHumans() }}</p>
                        </div>
                        @empty
                        <div class="text-center py-8 bg-slate-100 dark:bg-[#11211d] rounded-2xl border border-slate-300 dark:border-[#1a2e29] border-dashed transition-colors">
                            <p class="text-slate-500 dark:text-slate-400 italic text-sm">Belum ada ulasan untuk kuliner ini.</p>
                        </div>
                        @endforelse
                    </div>
                </div>

            </div>

            {{-- KOLOM KANAN (Sidebar) --}}
            <div class="md:col-span-1">
                <div class="bg-white dark:bg-[#0f1a18] border border-slate-200 dark:border-[#1a2e29] rounded-2xl p-6 shadow-lg transition-colors duration-300">
                    <div class="text-center pb-6 border-b border-slate-200 dark:border-[#1a2e29]">
                        <div class="inline-flex items-center gap-2 bg-emerald-100 dark:bg-emerald-500/20 text-emerald-600 dark:text-emerald-400 px-4 py-1.5 rounded-full text-sm font-bold mb-2">
                            <i class="fas fa-fire"></i> Kuliner Khas
                        </div>
                        <p class="text-xs text-slate-500 dark:text-slate-400">Cita rasa otentik Sumatera</p>
                    </div>

                    <div class="py-6 space-y-4 border-b border-slate-200 dark:border-[#1a2e29]">
                        <div class="flex justify-between items-center bg-slate-100 dark:bg-[#11211d] p-3 rounded-xl border border-slate-200 dark:border-[#1a2e29] backdrop-blur-sm">
                            <span class="text-sm font-bold text-slate-700 dark:text-slate-300 flex items-center gap-1.5"><i class="fas fa-star text-amber-500"></i> Rating</span>
                            <span class="text-lg font-black text-slate-900 dark:text-white">{{ $avgRating }} <span class="text-xs font-medium text-slate-500 dark:text-slate-400">/ 5.0</span></span>
                        </div>

                        <div class="flex justify-between items-center">
                            <span class="text-sm text-slate-500 dark:text-slate-400">Jenis Sajian</span>
                            <span class="text-sm font-bold text-slate-900 dark:text-white capitalize text-right">{{ str_replace('_', ' ', $kuliner->jenis) }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-slate-500 dark:text-slate-400">Asal Daerah</span>
                            <span class="text-sm font-bold text-slate-900 dark:text-white text-right">{{ $kuliner->kabupaten->nama ?? 'Sumatera' }}</span>
                        </div>
                    </div>

                    <div class="pt-6 space-y-3">
                        @auth
                        @if(isset($isFavorited) && $isFavorited)
                        <form action="{{ route('favorit.destroy', ['type' => 'kuliner', 'id' => $kuliner->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full flex items-center justify-center gap-2 bg-red-500 hover:bg-red-600 text-white py-3.5 rounded-xl font-bold transition-all text-sm shadow-lg shadow-red-500/30">
                                <i class="fas fa-heart-broken"></i> Hapus dari Favorit
                            </button>
                        </form>
                        @else
                        <form action="{{ route('favorit.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="type" value="kuliner">
                            <input type="hidden" name="id" value="{{ $kuliner->id }}">
                            <button type="submit" class="w-full flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-500 text-white py-3.5 rounded-xl font-bold transition-all text-sm shadow-lg shadow-emerald-600/30">
                                <i class="fas fa-heart"></i> Tambah ke Favorit
                            </button>
                        </form>
                        @endif
                        @else
                        <a href="{{ route('login') }}" class="w-full flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-500 text-white py-3.5 rounded-xl font-bold transition-all text-sm shadow-lg shadow-emerald-600/30">
                            <i class="fas fa-heart"></i> Login untuk Favorit
                        </a>
                        @endauth

                        <button onclick="navigator.share({title: '{{ $kuliner->nama }}', url: window.location.href})" class="w-full flex items-center justify-center gap-2 bg-slate-100 hover:bg-slate-200 dark:bg-[#11211d] dark:hover:bg-[#1a2e29] text-slate-700 dark:text-white py-3.5 rounded-xl font-bold transition-all text-sm">
                            <i class="fas fa-share-alt"></i> Bagikan
                        </button>

                        {{-- 🌟 TOMBOL BUKA PETA LOKASI 🌟 --}}
                        @if(isset($kuliner->link_maps) && $kuliner->link_maps)
                        <a href="{{ $kuliner->link_maps }}" target="_blank" class="w-full flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-500 text-white py-3.5 rounded-xl font-bold transition-all text-sm shadow-lg shadow-blue-600/30">
                            <i class="fas fa-map-marked-alt"></i> Buka Peta Lokasi
                        </a>
                        @endif

                        <a href="{{ route('kuliner.index') }}" class="w-full flex items-center justify-center gap-2 border-2 border-slate-300 hover:border-slate-400 text-slate-600 hover:text-slate-900 dark:border-[#1a2e29] dark:hover:border-[#2a3e39] dark:text-slate-300 dark:hover:text-white py-3.5 rounded-xl font-bold transition-all text-sm">
                            <i class="fas fa-arrow-left"></i> Kembali ke Daftar
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- SCRIPT BINTANG NYALA --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ratingContainers = document.querySelectorAll('.star-rating-container');

        ratingContainers.forEach(container => {
            const inputs = container.querySelectorAll('input[type="radio"]');
            const icons = container.querySelectorAll('i');
            const labels = container.querySelectorAll('label');

            function updateStars(value) {
                icons.forEach((icon, index) => {
                    if (index < value) {
                        icon.classList.remove('far');
                        icon.classList.add('fas', 'text-amber-400');
                    } else {
                        icon.classList.remove('fas', 'text-amber-400');
                        icon.classList.add('far');
                    }
                });
            }

            inputs.forEach(input => {
                input.addEventListener('change', function() {
                    updateStars(parseInt(this.value));
                });
            });

            labels.forEach((label, index) => {
                label.addEventListener('mouseenter', () => {
                    icons.forEach((icon, i) => {
                        if (i <= index) {
                            icon.classList.add('text-amber-400');
                        } else {
                            icon.classList.remove('text-amber-400');
                        }
                    });
                });
                label.addEventListener('mouseleave', () => {
                    const checked = container.querySelector('input:checked');
                    if (checked) {
                        updateStars(parseInt(checked.value));
                    } else {
                        icons.forEach(icon => icon.classList.remove('text-amber-400'));
                    }
                });
            });
        });
    });
</script>
@endsection