@extends('layouts.app')

@section('title', 'Destinasi Wisata - Explore Sumatera')

@section('content')

<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .fade-in-up {
        animation: fadeInUp 0.6s ease-out both;
    }

    .card-hover {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 30px 60px -15px rgba(16, 185, 129, 0.35);
    }

    .dark .card-hover:hover {
        box-shadow: 0 30px 60px -15px rgba(16, 185, 129, 0.5);
    }

    .card-hover:hover .card-image {
        transform: scale(1.08);
    }

    .card-hover:hover .card-arrow {
        transform: rotate(-45deg);
        background: linear-gradient(135deg, #f59e0b, #ea580c);
    }

    .card-hover:hover .card-arrow i {
        color: white;
    }

    .card-image {
        transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .card-arrow {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .scroll-reveal {
        opacity: 0;
        transform: translateY(25px);
        transition: all 0.7s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .scroll-reveal.active {
        opacity: 1;
        transform: translateY(0);
    }

    @keyframes shimmer {
        0% {
            background-position: -1000px 0;
        }

        100% {
            background-position: 1000px 0;
        }
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

    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .line-clamp-1 {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .search-input:focus {
        box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.15);
    }

    /* ============ CUSTOM DROPDOWN ============ */
    .custom-dropdown {
        position: relative;
        user-select: none;
    }

    .custom-dropdown-btn {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 8px;
        padding: 14px 16px 14px 44px;
        background: #f8fafc;
        border: 2px solid #f1f5f9;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.2s ease;
        font-weight: 500;
        color: #0f172a;
        text-align: left;
        font-size: 15px;
    }

    .custom-dropdown-btn:hover {
        border-color: #10b981;
    }

    .custom-dropdown.open .custom-dropdown-btn {
        border-color: #10b981;
        box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.15);
    }

    .dark .custom-dropdown-btn {
        background: #1e293b;
        border-color: #334155;
        color: #f8fafc;
    }

    .dark .custom-dropdown.open .custom-dropdown-btn {
        box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.2);
    }

    .custom-dropdown-btn .placeholder {
        color: #94a3b8;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .dark .custom-dropdown-btn .placeholder {
        color: #64748b;
    }

    .custom-dropdown-btn .arrow {
        transition: transform 0.2s ease;
        flex-shrink: 0;
        color: #94a3b8;
        font-size: 12px;
    }

    .custom-dropdown.open .custom-dropdown-btn .arrow {
        transform: rotate(180deg);
    }

    /* Menu dropdown — selalu ke bawah */
    .custom-dropdown-menu {
        position: absolute;
        top: calc(100% + 8px);
        left: 0;
        right: 0;
        background: white;
        border: 2px solid #f1f5f9;
        border-radius: 12px;
        box-shadow: 0 20px 40px -10px rgba(15, 23, 42, 0.2);
        max-height: 280px;
        overflow-y: auto;
        z-index: 100;
        display: none;
        animation: dropdownDown 0.2s ease-out;
    }

    .custom-dropdown.open .custom-dropdown-menu {
        display: block;
    }

    @keyframes dropdownDown {
        from {
            opacity: 0;
            transform: translateY(-8px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .dark .custom-dropdown-menu {
        background: #1e293b;
        border-color: #334155;
    }

    .custom-dropdown-item {
        padding: 12px 16px;
        cursor: pointer;
        transition: background 0.15s ease;
        font-size: 14px;
        font-weight: 500;
        color: #334155;
        border-bottom: 1px solid #f8fafc;
    }

    .custom-dropdown-item:last-child {
        border-bottom: none;
    }

    .custom-dropdown-item:hover {
        background: #ecfdf5;
        color: #047857;
    }

    .custom-dropdown-item.selected {
        background: #10b981;
        color: white;
        font-weight: 700;
    }

    .dark .custom-dropdown-item {
        color: #cbd5e1;
        border-bottom-color: #334155;
    }

    .dark .custom-dropdown-item:hover {
        background: #064e3b;
        color: #34d399;
    }

    .dark .custom-dropdown-item.selected {
        background: #10b981;
        color: white;
    }

    /* Custom scrollbar menu */
    .custom-dropdown-menu::-webkit-scrollbar {
        width: 6px;
    }

    .custom-dropdown-menu::-webkit-scrollbar-track {
        background: transparent;
    }

    .custom-dropdown-menu::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
    }

    .dark .custom-dropdown-menu::-webkit-scrollbar-thumb {
        background: #475569;
    }
</style>

{{-- HERO --}}
<section class="relative min-h-[420px] flex items-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1588668214407-6ea9a6d8c272?w=1920&q=80"
            alt="Pemandangan Sumatera" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900/95 via-slate-900/75 to-slate-900/40"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10 py-16">
        <nav class="text-sm mb-5 text-gray-300 fade-in-up flex items-center gap-2">
            <a href="{{ route('home') }}" class="hover:text-emerald-400 transition">Beranda</a>
            <i class="fas fa-chevron-right text-[10px] text-gray-500"></i>
            <span class="text-white font-medium">Destinasi</span>
        </nav>

        <div class="max-w-3xl">
            <div class="fade-in-up inline-flex items-center gap-2 bg-white/[0.08] backdrop-blur-xl border border-white/[0.15] px-4 py-2 rounded-full mb-5"
                style="animation-delay: 0.1s;">
                <i class="fas fa-compass text-amber-400"></i>
                <span class="text-sm text-white font-medium tracking-wide">Jelajahi Setiap Sudut Sumatera</span>
            </div>

            <h1 class="fade-in-up text-5xl md:text-6xl font-black text-white mb-4 leading-[1.05] tracking-tight"
                style="animation-delay: 0.2s;">
                Temukan Destinasi
                <span class="block bg-gradient-to-r from-emerald-300 to-amber-200 bg-clip-text text-transparent italic font-serif">
                    Impianmu
                </span>
            </h1>

            <p class="fade-in-up text-lg text-gray-300 max-w-2xl leading-relaxed font-light"
                style="animation-delay: 0.3s;">
                Dari puncak gunung hingga keindahan bawah laut — petualangan tak terlupakan menantimu.
            </p>
        </div>
    </div>
</section>

{{-- FILTER --}}
<section class="container mx-auto px-6 -mt-12 relative z-30">
    <div class="fade-in-up bg-white dark:bg-slate-900 rounded-2xl shadow-2xl shadow-slate-900/[0.08] dark:shadow-black/40 border border-slate-100 dark:border-slate-800 p-6"
        style="animation-delay: 0.4s;">
        <form method="GET" action="{{ route('destinasi.index') }}" id="filterForm">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-3">

                {{-- Search --}}
                <div class="md:col-span-4 relative">
                    <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 dark:text-slate-500 z-10"></i>
                    <input type="text" name="q" value="{{ request('q') }}"
                        placeholder="Cari destinasi, kota, atau kata kunci..."
                        class="search-input w-full pl-11 pr-4 py-3.5 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-xl focus:outline-none focus:border-emerald-500 transition-all font-medium text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-slate-500">
                </div>

                {{-- PROVINSI (custom dropdown) --}}
                <div class="md:col-span-3">
                    <div class="custom-dropdown" id="dropdownProvinsi">
                        <button type="button" class="custom-dropdown-btn">
                            <i class="fas fa-map absolute left-4 text-slate-400 dark:text-slate-500"></i>
                            <span class="custom-dropdown-label flex-1 truncate">Semua Provinsi</span>
                            <i class="fas fa-chevron-down arrow"></i>
                        </button>
                        <div class="custom-dropdown-menu">
                            <div class="custom-dropdown-item" data-value="">Semua Provinsi</div>
                            @foreach ($provinsis as $prov)
                            <div class="custom-dropdown-item {{ request('provinsi') == $prov->id ? 'selected' : '' }}" data-value="{{ $prov->id }}">
                                {{ $prov->nama }}
                            </div>
                            @endforeach
                        </div>
                        <input type="hidden" name="provinsi" id="inputProvinsi" value="{{ request('provinsi') }}">
                    </div>
                </div>

                {{-- KABUPATEN (custom dropdown) --}}
                <div class="md:col-span-3">
                    <div class="custom-dropdown" id="dropdownKabupaten">
                        <button type="button" class="custom-dropdown-btn">
                            <i class="fas fa-map-marker-alt absolute left-4 text-slate-400 dark:text-slate-500"></i>
                            <span class="custom-dropdown-label flex-1 truncate">Semua Kabupaten</span>
                            <i class="fas fa-chevron-down arrow"></i>
                        </button>
                        <div class="custom-dropdown-menu">
                            <div class="custom-dropdown-item" data-value="">Semua Kabupaten</div>
                            @foreach ($kabupatens as $kab)
                            <div class="custom-dropdown-item {{ request('kabupaten') == $kab->id ? 'selected' : '' }}"
                                data-value="{{ $kab->id }}"
                                data-provinsi="{{ $kab->provinsi_id }}">
                                {{ $kab->nama }}
                            </div>
                            @endforeach
                        </div>
                        <input type="hidden" name="kabupaten" id="inputKabupaten" value="{{ request('kabupaten') }}">
                    </div>
                </div>

                {{-- Submit --}}
                <div class="md:col-span-2">
                    <button type="submit"
                        class="w-full h-full min-h-[52px] bg-gradient-to-r from-emerald-600 to-green-700 hover:from-emerald-700 hover:to-green-800 text-white rounded-xl font-bold shadow-lg shadow-emerald-600/20 hover:shadow-emerald-600/40 transition-all flex items-center justify-center gap-2">
                        <i class="fas fa-search"></i>
                        <span class="hidden lg:inline">Cari</span>
                    </button>
                </div>
            </div>

            @if (request()->anyFilled(['q', 'provinsi', 'kabupaten', 'kategori']))
            <div class="mt-4 pt-4 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between flex-wrap gap-3">
                <div class="flex items-center gap-2 flex-wrap">
                    <span class="text-xs uppercase tracking-widest text-slate-500 dark:text-slate-400 font-bold">Filter Aktif:</span>
                    @if (request('q'))
                    <span class="bg-emerald-50 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-400 px-3 py-1 rounded-full text-xs font-bold">"{{ request('q') }}"</span>
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
                <a href="{{ route('destinasi.index') }}" class="text-red-600 dark:text-red-400 hover:text-red-700 font-bold text-xs uppercase tracking-widest">
                    <i class="fas fa-times-circle mr-1"></i> Reset
                </a>
            </div>
            @endif
        </form>
    </div>
</section>

{{-- HASIL --}}
<section class="container mx-auto px-6 py-16">
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-10 scroll-reveal">
        <div>
            <div class="inline-flex items-center gap-2 text-emerald-700 dark:text-emerald-400 text-xs font-bold uppercase tracking-[0.2em] mb-3">
                <span class="w-8 h-px bg-emerald-700 dark:bg-emerald-400"></span>
                Koleksi Perjalanan
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-slate-900 dark:text-white tracking-tight">
                @if (request('q'))
                Hasil untuk "<span class="text-emerald-700 dark:text-emerald-400">{{ request('q') }}</span>"
                @else
                Destinasi Pilihan
                @endif
            </h2>
            <p class="text-slate-500 dark:text-slate-400 mt-2 flex items-center gap-2">
                <i class="fas fa-check-circle text-emerald-600 dark:text-emerald-400"></i>
                Menampilkan <strong class="text-slate-900 dark:text-white">{{ $destinasis->total() }}</strong> destinasi wisata
            </p>
        </div>
    </div>

    @if ($destinasis->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($destinasis as $i => $d)
        @php
        $gambarUrl = $d->gambar
        ? (str_starts_with($d->gambar, 'http') ? $d->gambar : asset($d->gambar))
        : 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=600';
        @endphp
        <a href="{{ route('destinasi.show', $d->slug) }}"
            class="scroll-reveal card-hover group bg-white dark:bg-slate-900 rounded-2xl overflow-hidden block border border-slate-100 dark:border-slate-800"
            data-delay="{{ $i * 70 }}">

            <div class="h-60 bg-slate-200 dark:bg-slate-800 overflow-hidden relative shimmer" data-image-wrapper>
                <img src="{{ $gambarUrl }}"
                    alt="{{ $d->nama }}"
                    loading="lazy"
                    class="card-image w-full h-full object-cover"
                    data-image>

                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/70 via-transparent to-transparent"></div>

                <div class="absolute top-4 left-4 bg-white/95 dark:bg-slate-800/95 backdrop-blur-md text-slate-800 dark:text-slate-100 text-[10px] font-bold px-3 py-1.5 rounded-full uppercase tracking-wider inline-flex items-center gap-1.5 shadow-lg">
                    <span class="w-1.5 h-1.5 bg-emerald-600 dark:bg-emerald-400 rounded-full"></span>
                    {{ $d->kategori }}
                </div>

                <div class="absolute top-4 right-4 bg-white/95 dark:bg-slate-800/95 backdrop-blur-md px-3 py-1.5 rounded-full flex items-center gap-1 shadow-lg">
                    <i class="fas fa-star text-amber-500 text-xs"></i>
                    <span class="text-xs font-bold text-slate-800 dark:text-slate-100">{{ $d->rating }}</span>
                </div>

                <div class="absolute bottom-4 left-4 text-white">
                    <p class="text-xs font-bold flex items-center gap-1.5 drop-shadow-lg">
                        <i class="fas fa-map-marker-alt text-amber-400"></i>
                        {{ $d->kabupaten->nama ?? '-' }}
                        @if ($d->kabupaten && $d->kabupaten->provinsi)
                        <span class="text-white/60">•</span>
                        {{ $d->kabupaten->provinsi->nama }}
                        @endif
                    </p>
                </div>
            </div>

            <div class="p-6">
                <h3 class="font-extrabold text-xl text-slate-900 dark:text-white mb-2 group-hover:text-emerald-700 dark:group-hover:text-emerald-400 transition line-clamp-1">
                    {{ $d->nama }}
                </h3>
                <p class="text-sm text-slate-500 dark:text-slate-400 line-clamp-2 mb-5 leading-relaxed">
                    {{ Str::limit($d->deskripsi, 100) }}
                </p>

                <div class="flex items-center justify-between pt-5 border-t border-slate-100 dark:border-slate-800">
                    <div>
                        <p class="text-[10px] text-slate-400 dark:text-slate-500 uppercase tracking-widest font-bold">Mulai dari</p>
                        <p class="text-emerald-700 dark:text-emerald-400 font-black text-lg">
                            {{ $d->harga_tiket == 0 ? 'Gratis' : 'Rp ' . number_format($d->harga_tiket, 0, ',', '.') }}
                        </p>
                    </div>
                    <span class="card-arrow w-10 h-10 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center">
                        <i class="fas fa-arrow-right text-slate-700 dark:text-slate-300 text-sm"></i>
                    </span>
                </div>
            </div>
        </a>
        @endforeach
    </div>

    <div class="mt-14 flex justify-center scroll-reveal">
        {{ $destinasis->links() }}
    </div>
    @else
    <div class="scroll-reveal text-center py-24 bg-gradient-to-br from-emerald-50 to-green-50 dark:from-slate-900 dark:to-slate-900 rounded-3xl border-2 border-dashed border-emerald-200 dark:border-slate-700">
        <div class="w-24 h-24 mx-auto mb-6 bg-white dark:bg-slate-800 rounded-full flex items-center justify-center shadow-lg">
            <i class="fas fa-compass text-4xl text-emerald-600 dark:text-emerald-400"></i>
        </div>
        <h3 class="text-2xl font-black text-slate-800 dark:text-white mb-2">Destinasi Tidak Ditemukan</h3>
        <p class="text-slate-500 dark:text-slate-400 mb-8 max-w-md mx-auto">Coba kata kunci lain atau jelajahi semua destinasi.</p>
        <a href="{{ route('destinasi.index') }}"
            class="inline-flex items-center gap-2 bg-gradient-to-r from-emerald-600 to-green-700 text-white px-7 py-3.5 rounded-2xl font-bold hover:shadow-lg hover:shadow-emerald-600/30 transition-all">
            <i class="fas fa-redo"></i> Lihat Semua Destinasi
        </a>
    </div>
    @endif
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        // ==============================
        // SCROLL REVEAL
        // ==============================
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    var el = entry.target;
                    var delay = parseInt(el.dataset.delay) || 0;
                    setTimeout(function() {
                        el.classList.add('active');
                    }, delay);
                    observer.unobserve(el);
                }
            });
        }, {
            threshold: 0.1
        });
        document.querySelectorAll('.scroll-reveal').forEach(function(el) {
            observer.observe(el);
        });

        // ==============================
        // SHIMMER REMOVE
        // ==============================
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

        // ==============================
        // CUSTOM DROPDOWN HANDLER
        // ==============================
        function setupDropdown(dropdownId, inputId) {
            var dropdown = document.getElementById(dropdownId);
            if (!dropdown) return null;

            var btn = dropdown.querySelector('.custom-dropdown-btn');
            var label = dropdown.querySelector('.custom-dropdown-label');
            var input = document.getElementById(inputId);
            var menu = dropdown.querySelector('.custom-dropdown-menu');

            // Toggle open/close
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                // Close other dropdowns
                document.querySelectorAll('.custom-dropdown.open').forEach(function(d) {
                    if (d !== dropdown) d.classList.remove('open');
                });
                dropdown.classList.toggle('open');
            });

            return {
                dropdown: dropdown,
                label: label,
                input: input,
                menu: menu
            };
        }

        // Close dropdown saat klik di luar
        document.addEventListener('click', function() {
            document.querySelectorAll('.custom-dropdown.open').forEach(function(d) {
                d.classList.remove('open');
            });
        });

        // ==============================
        // DROPDOWN PROVINSI
        // ==============================
        var provinsiDD = setupDropdown('dropdownProvinsi', 'inputProvinsi');

        // Set label awal provinsi
        if (provinsiDD && provinsiDD.input.value) {
            var selectedProv = provinsiDD.menu.querySelector('[data-value="' + provinsiDD.input.value + '"]');
            if (selectedProv) provinsiDD.label.textContent = selectedProv.textContent.trim();
        }

        // ==============================
        // DROPDOWN KABUPATEN
        // ==============================
        var kabupatenDD = setupDropdown('dropdownKabupaten', 'inputKabupaten');

        // Simpan semua data kabupaten awal
        var allKabupatenItems = [];
        if (kabupatenDD) {
            kabupatenDD.menu.querySelectorAll('.custom-dropdown-item').forEach(function(item) {
                allKabupatenItems.push({
                    value: item.getAttribute('data-value'),
                    text: item.textContent.trim(),
                    provinsi: item.getAttribute('data-provinsi'),
                    html: item.outerHTML
                });
            });
        }

        // Set label awal kabupaten
        if (kabupatenDD && kabupatenDD.input.value) {
            var selectedKab = kabupatenDD.menu.querySelector('[data-value="' + kabupatenDD.input.value + '"]');
            if (selectedKab) kabupatenDD.label.textContent = selectedKab.textContent.trim();
        }

        // ==============================
        // CLICK HANDLER PROVINSI
        // ==============================
        if (provinsiDD) {
            provinsiDD.menu.querySelectorAll('.custom-dropdown-item').forEach(function(item) {
                item.addEventListener('click', function(e) {
                    e.stopPropagation();
                    var value = this.getAttribute('data-value');

                    // Update selected state
                    provinsiDD.menu.querySelectorAll('.custom-dropdown-item').forEach(function(i) {
                        i.classList.remove('selected');
                    });
                    this.classList.add('selected');

                    // Update label + input
                    provinsiDD.label.textContent = this.textContent.trim();
                    provinsiDD.input.value = value;
                    provinsiDD.dropdown.classList.remove('open');

                    // Filter kabupaten
                    filterKabupaten(value);
                });
            });
        }

        // ==============================
        // FILTER KABUPATEN BERDASARKAN PROVINSI
        // ==============================
        function filterKabupaten(provinsiId) {
            if (!kabupatenDD) return;

            var menu = kabupatenDD.menu;
            menu.innerHTML = '';

            allKabupatenItems.forEach(function(item) {
                // Kalau provinsi kosong → tampilkan semua
                // Kalau provinsi dipilih → tampilkan yang sesuai
                if (!provinsiId || item.provinsi === provinsiId || item.value === '') {
                    var div = document.createElement('div');
                    div.className = 'custom-dropdown-item';
                    div.setAttribute('data-value', item.value);
                    if (item.provinsi) div.setAttribute('data-provinsi', item.provinsi);
                    div.textContent = item.text;
                    menu.appendChild(div);

                    // Event listener untuk item kabupaten
                    div.addEventListener('click', function(e) {
                        e.stopPropagation();
                        var val = this.getAttribute('data-value');

                        menu.querySelectorAll('.custom-dropdown-item').forEach(function(i) {
                            i.classList.remove('selected');
                        });
                        this.classList.add('selected');

                        kabupatenDD.label.textContent = this.textContent.trim();
                        kabupatenDD.input.value = val;
                        kabupatenDD.dropdown.classList.remove('open');
                    });
                }
            });

            // Reset kabupaten selection kalau ganti provinsi
            kabupatenDD.input.value = '';
            kabupatenDD.label.textContent = 'Semua Kabupaten';

            // Tandai item "Semua Kabupaten" sebagai selected
            var firstItem = menu.querySelector('[data-value=""]');
            if (firstItem) firstItem.classList.add('selected');
        }

        // ==============================
        // CLICK HANDLER KABUPATEN (untuk saat tidak difilter)
        // ==============================
        if (kabupatenDD) {
            // Handler awal untuk item kabupaten yang ada saat load
            kabupatenDD.menu.querySelectorAll('.custom-dropdown-item').forEach(function(item) {
                item.addEventListener('click', function(e) {
                    e.stopPropagation();
                    var val = this.getAttribute('data-value');

                    kabupatenDD.menu.querySelectorAll('.custom-dropdown-item').forEach(function(i) {
                        i.classList.remove('selected');
                    });
                    this.classList.add('selected');

                    kabupatenDD.label.textContent = this.textContent.trim();
                    kabupatenDD.input.value = val;
                    kabupatenDD.dropdown.classList.remove('open');
                });
            });
        }
    });
</script>

@endsection