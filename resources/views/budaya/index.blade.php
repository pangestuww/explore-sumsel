@extends('layouts.app')

@section('title', 'Budaya Sumatera - Explore Sumatera')

@section('content')

<style>
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .fade-in-up { animation: fadeInUp 0.6s ease-out both; }

    .card-hover { transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); }
    .card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 30px 60px -15px rgba(16, 185, 129, 0.35);
    }
    .dark .card-hover:hover {
        box-shadow: 0 30px 60px -15px rgba(16, 185, 129, 0.5);
    }
    .card-hover:hover .card-image { transform: scale(1.08); }
    .card-hover:hover .card-arrow {
        transform: rotate(-45deg);
        background: linear-gradient(135deg, #f59e0b, #ea580c);
    }
    .card-hover:hover .card-arrow i { color: white; }
    .card-image { transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1); }
    .card-arrow { transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); }

    .scroll-reveal {
        opacity: 0;
        transform: translateY(25px);
        transition: all 0.7s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .scroll-reveal.active { opacity: 1; transform: translateY(0); }

    @keyframes shimmer {
        0% { background-position: -1000px 0; }
        100% { background-position: 1000px 0; }
    }
    .shimmer {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 1000px 100%;
        animation: shimmer 1.8s infinite;
    }
    .dark .shimmer {
        background: linear-gradient(90deg, #1e293b 25%, #334155 50%, #1e293b 75%);
        background-size: 1000px 100%;
    }

    .line-clamp-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
    .line-clamp-1 { display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden; }
    .search-input:focus { box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.15); }
    .custom-select { appearance: none; -webkit-appearance: none; -moz-appearance: none; }
    .custom-select::-ms-expand { display: none; }
</style>

{{-- HERO --}}
<section class="relative min-h-[420px] flex items-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1583417319070-4a69db38a482?w=1920&q=80"
             alt="Budaya Sumatera" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900/95 via-slate-900/75 to-slate-900/40"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10 py-16">
        <nav class="text-sm mb-5 text-gray-300 fade-in-up flex items-center gap-2">
            <a href="{{ route('home') }}" class="hover:text-emerald-400 transition">Beranda</a>
            <i class="fas fa-chevron-right text-[10px] text-gray-500"></i>
            <span class="text-white font-medium">Budaya</span>
        </nav>

        <div class="max-w-3xl">
            <div class="fade-in-up inline-flex items-center gap-2 bg-white/[0.08] backdrop-blur-xl border border-white/[0.15] px-4 py-2 rounded-full mb-5"
                 style="animation-delay: 0.1s;">
                <i class="fas fa-masks-theater text-amber-400"></i>
                <span class="text-sm text-white font-medium tracking-wide">Warisan Budaya Nusantara</span>
            </div>

            <h1 class="fade-in-up text-5xl md:text-6xl font-black text-white mb-4 leading-[1.05] tracking-tight"
                style="animation-delay: 0.2s;">
                Kekayaan Budaya
                <span class="block bg-gradient-to-r from-emerald-300 to-amber-200 bg-clip-text text-transparent italic font-serif">
                    Pulau Sumatera
                </span>
            </h1>

            <p class="fade-in-up text-lg text-gray-300 max-w-2xl leading-relaxed font-light"
               style="animation-delay: 0.3s;">
                Warisan budaya tak benda dan benda — dari rumah adat, tarian, hingga senjata tradisional yang menjadi identitas masyarakat Sumatera.
            </p>
        </div>
    </div>
</section>

{{-- FILTER --}}
<section class="container mx-auto px-6 -mt-12 relative z-30">
    <div class="fade-in-up bg-white dark:bg-slate-900 rounded-2xl shadow-2xl shadow-slate-900/[0.08] dark:shadow-black/40 border border-slate-100 dark:border-slate-800 p-6"
         style="animation-delay: 0.4s;">
        <form method="GET" action="{{ route('budaya.index') }}">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-3">

                {{-- Search --}}
                <div class="md:col-span-4 relative">
                    <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 dark:text-slate-500 z-10"></i>
                    <input type="text" name="q" value="{{ request('q') }}"
                        placeholder="Cari budaya khas Sumatera..."
                        class="search-input w-full pl-11 pr-4 py-3.5 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-xl focus:outline-none focus:border-emerald-500 transition-all font-medium text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-slate-500">
                </div>

                {{-- Jenis --}}
                <div class="md:col-span-2 relative">
                    <i class="fas fa-masks-theater absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 dark:text-slate-500 z-10 pointer-events-none"></i>
                    <select name="jenis" class="custom-select w-full pl-11 pr-10 py-3.5 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-xl focus:outline-none focus:border-emerald-500 transition-all cursor-pointer font-medium text-slate-900 dark:text-white">
                        <option value="">Semua</option>
                        <option value="rumah_adat" {{ request('jenis') == 'rumah_adat' ? 'selected' : '' }}>Rumah Adat</option>
                        <option value="tari"       {{ request('jenis') == 'tari'       ? 'selected' : '' }}>Tari</option>
                        <option value="pakaian"    {{ request('jenis') == 'pakaian'    ? 'selected' : '' }}>Pakaian</option>
                        <option value="senjata"    {{ request('jenis') == 'senjata'    ? 'selected' : '' }}>Senjata</option>
                        <option value="upacara"    {{ request('jenis') == 'upacara'    ? 'selected' : '' }}>Upacara</option>
                        <option value="alat_musik" {{ request('jenis') == 'alat_musik' ? 'selected' : '' }}>Alat Musik</option>
                    </select>
                    <i class="fas fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 dark:text-slate-500 pointer-events-none text-xs z-10"></i>
                </div>

                {{-- Provinsi --}}
                <div class="md:col-span-3 relative">
                    <i class="fas fa-map absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 dark:text-slate-500 z-10 pointer-events-none"></i>
                    <select name="provinsi" id="filterProvinsi" class="custom-select w-full pl-11 pr-10 py-3.5 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-xl focus:outline-none focus:border-emerald-500 transition-all cursor-pointer font-medium text-slate-900 dark:text-white">
                        <option value="">Semua Provinsi</option>
                        @foreach ($provinsis as $prov)
                            <option value="{{ $prov->id }}" {{ request('provinsi') == $prov->id ? 'selected' : '' }}>
                                {{ $prov->nama }}
                            </option>
                        @endforeach
                    </select>
                    <i class="fas fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 dark:text-slate-500 pointer-events-none text-xs z-10"></i>
                </div>

                {{-- Kabupaten --}}
                <div class="md:col-span-2 relative">
                    <i class="fas fa-map-marker-alt absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 dark:text-slate-500 z-10 pointer-events-none"></i>
                    <select name="kabupaten" id="filterKabupaten" class="custom-select w-full pl-11 pr-10 py-3.5 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-xl focus:outline-none focus:border-emerald-500 transition-all cursor-pointer font-medium text-slate-900 dark:text-white">
                        <option value="">Semua Kabupaten</option>
                        @foreach ($kabupatens as $kab)
                            <option value="{{ $kab->id }}" data-provinsi="{{ $kab->provinsi_id }}" {{ request('kabupaten') == $kab->id ? 'selected' : '' }}>
                                {{ $kab->nama }}
                            </option>
                        @endforeach
                    </select>
                    <i class="fas fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 dark:text-slate-500 pointer-events-none text-xs z-10"></i>
                </div>

                {{-- Submit --}}
                <div class="md:col-span-1">
                    <button type="submit"
                        class="w-full h-full min-h-[52px] bg-gradient-to-r from-emerald-600 to-green-700 hover:from-emerald-700 hover:to-green-800 text-white rounded-xl font-bold shadow-lg shadow-emerald-600/20 hover:shadow-emerald-600/40 transition-all flex items-center justify-center">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>

            @if (request()->anyFilled(['q', 'jenis', 'provinsi', 'kabupaten']))
            <div class="mt-4 pt-4 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between flex-wrap gap-3">
                <div class="flex items-center gap-2 flex-wrap">
                    <span class="text-xs uppercase tracking-widest text-slate-500 dark:text-slate-400 font-bold">Filter Aktif:</span>
                    @if (request('q'))
                    <span class="bg-emerald-50 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-400 px-3 py-1 rounded-full text-xs font-bold">"{{ request('q') }}"</span>
                    @endif
                    @if (request('jenis'))
                    <span class="bg-emerald-50 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-400 px-3 py-1 rounded-full text-xs font-bold capitalize">{{ str_replace('_', ' ', request('jenis')) }}</span>
                    @endif
                    @if (request('provinsi'))
                    <span class="bg-emerald-50 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-400 px-3 py-1 rounded-full text-xs font-bold">
                        {{ $provinsis->where('id', request('provinsi'))->first()->nama ?? '' }}
                    </span>
                    @endif
                    @if (request('kabupaten'))
                    <span class="bg-emerald-50 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-400 px-3 py-1 rounded-full text-xs font-bold">
                        {{ $kabupatens->where('id', request('kabupaten'))->first()->nama ?? '' }}
                    </span>
                    @endif
                </div>
                <a href="{{ route('budaya.index') }}" class="text-red-600 dark:text-red-400 hover:text-red-700 font-bold text-xs uppercase tracking-widest">
                    <i class="fas fa-times-circle mr-1"></i> Reset
                </a>
            </div>
            @endif
        </form>
    </div>
</section>

{{-- HASIL --}}
<section class="container mx-auto px-6 py-16">
    <div class="flex items-center justify-between mb-10 scroll-reveal">
        <div>
            <div class="inline-flex items-center gap-2 text-emerald-700 dark:text-emerald-400 text-xs font-bold uppercase tracking-[0.2em] mb-3">
                <span class="w-8 h-px bg-emerald-700 dark:bg-emerald-400"></span>
                Koleksi Budaya
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-slate-900 dark:text-white tracking-tight">
                @if (request('q'))
                    Hasil untuk "<span class="text-emerald-700 dark:text-emerald-400">{{ request('q') }}</span>"
                @else
                    Semua Budaya
                @endif
            </h2>
            <p class="text-slate-500 dark:text-slate-400 mt-2 flex items-center gap-2">
                <i class="fas fa-check-circle text-emerald-600 dark:text-emerald-400"></i>
                Menampilkan <strong class="text-slate-900 dark:text-white">{{ $budayas->total() }}</strong> warisan budaya
            </p>
        </div>
    </div>

    @if ($budayas->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($budayas as $i => $b)
                @php
                    $budayaGambar = str_starts_with($b->gambar, 'http') ? $b->gambar : asset($b->gambar);
                @endphp
                <a href="{{ route('budaya.show', $b->slug) }}"
                    class="scroll-reveal card-hover group bg-white dark:bg-slate-900 rounded-2xl overflow-hidden block border border-slate-100 dark:border-slate-800"
                    data-delay="{{ $i * 70 }}">

                    <div class="h-60 bg-slate-200 dark:bg-slate-800 overflow-hidden relative shimmer" data-image-wrapper>
                        <img src="{{ $budayaGambar }}"
                            alt="{{ $b->nama }}"
                            loading="lazy"
                            class="card-image w-full h-full object-cover"
                            data-image>

                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/70 via-transparent to-transparent"></div>

                        <div class="absolute top-4 left-4 bg-white/95 dark:bg-slate-800/95 backdrop-blur-md text-slate-800 dark:text-slate-100 text-[10px] font-bold px-3 py-1.5 rounded-full uppercase tracking-wider inline-flex items-center gap-1.5 shadow-lg">
                            <span class="w-1.5 h-1.5 bg-emerald-600 dark:bg-emerald-400 rounded-full"></span>
                            {{ str_replace('_', ' ', $b->jenis) }}
                        </div>

                        <div class="absolute bottom-4 left-4 text-white">
                            <p class="text-xs font-bold flex items-center gap-1.5 drop-shadow-lg">
                                <i class="fas fa-map-marker-alt text-amber-400"></i>
                                {{ $b->kabupaten->nama ?? 'Sumatera' }}
                                @if ($b->kabupaten && $b->kabupaten->provinsi)
                                    <span class="text-white/60">•</span>
                                    {{ $b->kabupaten->provinsi->nama }}
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="p-6">
                        <h3 class="font-extrabold text-xl text-slate-900 dark:text-white mb-2 group-hover:text-emerald-700 dark:group-hover:text-emerald-400 transition line-clamp-1">
                            {{ $b->nama }}
                        </h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400 line-clamp-2 mb-5 leading-relaxed">
                            {{ Str::limit($b->deskripsi, 100) }}
                        </p>

                        <div class="flex items-center justify-between pt-5 border-t border-slate-100 dark:border-slate-800">
                            <span class="text-xs font-bold text-emerald-700 dark:text-emerald-400 uppercase tracking-widest">
                                <i class="fas fa-book-open mr-1.5"></i> Warisan Budaya
                            </span>
                            <span class="card-arrow w-10 h-10 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center">
                                <i class="fas fa-arrow-right text-slate-700 dark:text-slate-300 text-sm"></i>
                            </span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="mt-14 flex justify-center scroll-reveal">
            {{ $budayas->links() }}
        </div>
    @else
        <div class="scroll-reveal text-center py-24 bg-gradient-to-br from-emerald-50 to-green-50 dark:from-slate-900 dark:to-slate-900 rounded-3xl border-2 border-dashed border-emerald-200 dark:border-slate-700">
            <div class="w-24 h-24 mx-auto mb-6 bg-white dark:bg-slate-800 rounded-full flex items-center justify-center shadow-lg">
                <i class="fas fa-masks-theater text-4xl text-emerald-600 dark:text-emerald-400"></i>
            </div>
            <h3 class="text-2xl font-black text-slate-800 dark:text-white mb-2">Belum Ada Data Budaya</h3>
            <p class="text-slate-500 dark:text-slate-400 mb-8 max-w-md mx-auto">Data budaya untuk kategori ini belum tersedia.</p>
            <a href="{{ route('budaya.index') }}"
                class="inline-flex items-center gap-2 bg-gradient-to-r from-emerald-600 to-green-700 text-white px-7 py-3.5 rounded-2xl font-bold hover:shadow-lg transition-all">
                <i class="fas fa-redo"></i> Lihat Semua Budaya
            </a>
        </div>
    @endif
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Scroll Reveal
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    var el = entry.target;
                    var delay = parseInt(el.dataset.delay) || 0;
                    setTimeout(function() { el.classList.add('active'); }, delay);
                    observer.unobserve(el);
                }
            });
        }, { threshold: 0.1 });
        document.querySelectorAll('.scroll-reveal').forEach(function(el) { observer.observe(el); });

        // Shimmer remove
        document.querySelectorAll('[data-image]').forEach(function(img) {
            function removeShimmer() {
                var wrapper = img.closest('[data-image-wrapper]');
                if (wrapper) wrapper.classList.remove('shimmer');
            }
            if (img.complete && img.naturalHeight !== 0) removeShimmer();
            else {
                img.addEventListener('load', removeShimmer);
                img.addEventListener('error', removeShimmer);
            }
        });

        // Dependent Dropdown: Provinsi → Kabupaten
        var provinsiSelect = document.getElementById('filterProvinsi');
        var kabupatenSelect = document.getElementById('filterKabupaten');

        if (provinsiSelect && kabupatenSelect) {
            var allKabupatenData = [];
            kabupatenSelect.querySelectorAll('option').forEach(function(opt) {
                if (opt.value !== '') {
                    allKabupatenData.push({
                        value: opt.value,
                        text: opt.textContent.trim(),
                        provinsi: opt.getAttribute('data-provinsi')
                    });
                }
            });

            function filterKabupaten(provinsiId) {
                kabupatenSelect.innerHTML = '<option value="">Semua Kabupaten</option>';
                var count = 0;
                allKabupatenData.forEach(function(item) {
                    if (!provinsiId || item.provinsi === provinsiId) {
                        var opt = document.createElement('option');
                        opt.value = item.value;
                        opt.textContent = item.text;
                        opt.setAttribute('data-provinsi', item.provinsi);
                        kabupatenSelect.appendChild(opt);
                        count++;
                    }
                });
            }

            provinsiSelect.addEventListener('change', function() {
                filterKabupaten(this.value);
            });

            if (provinsiSelect.value) {
                filterKabupaten(provinsiSelect.value);
            }
        }
    });
</script>

@endsection