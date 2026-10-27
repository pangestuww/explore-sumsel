@extends('layouts.app')

@section('title', 'Admin Dashboard - Explore Sumatera')

@section('content')
<div class="flex flex-col md:flex-row h-[calc(100vh-80px)] overflow-hidden bg-slate-50 dark:bg-[#0b1120] text-slate-800 dark:text-white transition-colors duration-300">

    <!-- SIDEBAR KIRI -->
    <aside class="w-full md:w-64 h-full bg-white dark:bg-[#0f172a] border-r border-slate-200 dark:border-slate-800 flex flex-col shrink-0 transition-colors duration-300">
        <div class="p-6 border-b border-slate-200 dark:border-slate-800 shrink-0">
            <h2 class="font-bold text-lg text-slate-900 dark:text-white transition-colors" data-i18n="menu_admin">Menu Admin</h2>
            <p class="text-xs text-slate-500 dark:text-slate-400" data-i18n="kelola_konten">Kelola Konten</p>
        </div>

        <div class="flex-1 overflow-y-auto py-6 px-4">
            <p class="text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-4 px-2" data-i18n="utama">Utama</p>
            <nav class="space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 bg-emerald-600 text-white rounded-lg shadow-sm mb-3">
                    <i class="fas fa-th-large text-sm w-5 text-center"></i>
                    <span class="font-medium text-sm" data-i18n="dashboard">Dashboard</span>
                </a>

                <a href="{{ route('admin.destinasi.create') }}" class="flex items-center gap-3 px-3 py-2.5 bg-emerald-50 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-800/50 hover:bg-emerald-100 rounded-lg shadow-sm mb-4">
                    <i class="fas fa-plus-circle text-sm w-5 text-center"></i>
                    <span class="font-bold text-sm" data-i18n="tambah_konten">Tambah Konten</span>
                </a>

                <div class="h-px bg-slate-200 dark:bg-slate-800 my-4"></div>

                <a href="{{ route('admin.destinasi.index') }}" class="flex items-center gap-3 px-3 py-2.5 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg">
                    <i class="fas fa-map-marker-alt text-sm w-5 text-center"></i>
                    <span class="font-medium text-sm" data-i18n="destinasi">Destinasi</span>
                </a>

                <a href="{{ route('admin.budaya.index') }}" class="flex items-center gap-3 px-3 py-2.5 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg">
                    <i class="fas fa-masks-theater text-sm w-5 text-center"></i>
                    <span class="font-medium text-sm" data-i18n="budaya">Budaya</span>
                </a>

                <a href="{{ route('admin.kuliner.index') }}" class="flex items-center gap-3 px-3 py-2.5 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg">
                    <i class="fas fa-utensils text-sm w-5 text-center"></i>
                    <span class="font-medium text-sm" data-i18n="kuliner">Kuliner</span>
                </a>

                <a href="{{ route('peta.index') }}" class="flex items-center gap-3 px-3 py-2.5 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg">
                    <i class="fas fa-map text-sm w-5 text-center"></i>
                    <span class="font-medium text-sm" data-i18n="peta">Peta</span>
                </a>

                <button onclick="openUsersModal()" class="w-full flex items-center gap-3 px-3 py-2.5 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg text-left">
                    <i class="fas fa-users text-sm w-5 text-center"></i>
                    <span class="font-medium text-sm" data-i18n="pengguna">Pengguna</span>
                </button>
            </nav>
        </div>

        <div class="p-4 border-t border-slate-200 dark:border-slate-800 space-y-1 shrink-0">
            <!-- Tombol Pengaturan -->
            <button onclick="openSettingsModal('general')" class="w-full flex items-center gap-3 px-3 py-2.5 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg text-left transition-colors">
                <i class="fas fa-cog text-sm w-5 text-center"></i>
                <span class="font-medium text-sm" data-i18n="pengaturan">Pengaturan</span>
            </button>

            <!-- 🌟 TOMBOL KELUAR BARU 🌟 -->
            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-3 py-2.5 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/30 rounded-lg text-left transition-colors">
                    <i class="fas fa-sign-out-alt text-sm w-5 text-center"></i>
                    <span class="font-medium text-sm">Keluar</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- KONTEN KANAN (DASHBOARD) -->
    <main class="flex-1 p-6 md:p-10 overflow-y-auto h-full">
        <header class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-slate-900 dark:text-white mb-1" data-i18n="dashboard_admin">Dashboard Admin</h1>
                <p class="text-slate-500 dark:text-slate-400 text-sm" data-i18n="kelola_explore">Kelola Explore Sumatera</p>
            </div>
        </header>

        <!-- Welcome Banner -->
        <div class="bg-gradient-to-r from-emerald-50 to-teal-50 dark:from-emerald-900/50 dark:to-emerald-800/30 border border-emerald-200 dark:border-emerald-800/50 rounded-2xl p-6 mb-8 relative overflow-hidden">
            <div class="relative z-10">
                <p class="text-emerald-700 dark:text-emerald-400 text-sm font-medium mb-1" data-i18n="welcome_back">Selamat datang kembali!</p>
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-2 flex items-center gap-2"><span data-i18n="hello_admin">Halo, Admin</span> <span class="text-2xl">👋</span></h2>
                <p class="text-slate-600 dark:text-slate-300 text-sm" data-i18n="pantau_aktivitas">Pantau aktivitas website kamu.</p>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
            <div class="bg-white dark:bg-[#0f172a] border border-slate-200 dark:border-slate-800 rounded-2xl p-6 relative overflow-hidden group hover:border-emerald-500/50 transition-all shadow-sm">
                <div class="w-8 h-8 rounded-lg bg-emerald-100 dark:bg-emerald-500/10 flex items-center justify-center mb-4">
                    <i class="fas fa-map-marker-alt text-emerald-600 dark:text-emerald-400"></i>
                </div>
                <p class="text-3xl font-bold text-slate-900 dark:text-white mb-1">{{ $stats['totalDestinasi'] ?? '0' }}</p>
                <p class="text-slate-500 dark:text-slate-400 text-sm" data-i18n="destinasi">Destinasi</p>
            </div>
            <div class="bg-white dark:bg-[#0f172a] border border-slate-200 dark:border-slate-800 rounded-2xl p-6 relative overflow-hidden group hover:border-emerald-500/50 transition-all shadow-sm">
                <div class="w-8 h-8 rounded-lg bg-emerald-100 dark:bg-emerald-500/10 flex items-center justify-center mb-4">
                    <i class="fas fa-masks-theater text-emerald-600 dark:text-emerald-400"></i>
                </div>
                <p class="text-3xl font-bold text-slate-900 dark:text-white mb-1">{{ $stats['totalBudaya'] ?? '0' }}</p>
                <p class="text-slate-500 dark:text-slate-400 text-sm" data-i18n="budaya">Budaya</p>
            </div>
            <div class="bg-white dark:bg-[#0f172a] border border-slate-200 dark:border-slate-800 rounded-2xl p-6 relative overflow-hidden group hover:border-emerald-500/50 transition-all shadow-sm">
                <div class="w-8 h-8 rounded-lg bg-emerald-100 dark:bg-emerald-500/10 flex items-center justify-center mb-4">
                    <i class="fas fa-utensils text-emerald-600 dark:text-emerald-400"></i>
                </div>
                <p class="text-3xl font-bold text-slate-900 dark:text-white mb-1">{{ $stats['totalKuliner'] ?? '0' }}</p>
                <p class="text-slate-500 dark:text-slate-400 text-sm" data-i18n="kuliner">Kuliner</p>
            </div>
            <div class="bg-white dark:bg-[#0f172a] border border-slate-200 dark:border-slate-800 rounded-2xl p-6 relative overflow-hidden group hover:border-emerald-500/50 transition-all shadow-sm">
                <div class="w-8 h-8 rounded-lg bg-emerald-100 dark:bg-emerald-500/10 flex items-center justify-center mb-4">
                    <i class="fas fa-star text-emerald-600 dark:text-emerald-400"></i>
                </div>
                <p class="text-3xl font-bold text-slate-900 dark:text-white mb-1">{{ $stats['totalReview'] ?? '0' }}</p>
                <p class="text-slate-500 dark:text-slate-400 text-sm" data-i18n="review">Review</p>
            </div>
        </div>

        <!-- AREA GRAFIK -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
            <div class="bg-white dark:bg-[#0f172a] border border-slate-200 dark:border-slate-800 rounded-2xl p-6 shadow-sm">
                <h3 class="text-lg font-bold text-slate-900 dark:text-white" data-i18n="statistik_ulasan">Statistik Ulasan</h3>
                <p class="text-slate-500 dark:text-slate-400 text-sm mb-4" data-i18n="distribusi_rating">Distribusi rating bintang.</p>
                <div class="relative w-full h-[250px]"><canvas id="ratingChart"></canvas></div>
            </div>
            <div class="bg-white dark:bg-[#0f172a] border border-slate-200 dark:border-slate-800 rounded-2xl p-6 shadow-sm">
                <h3 class="text-lg font-bold text-slate-900 dark:text-white" data-i18n="distribusi_konten">Distribusi Konten</h3>
                <p class="text-slate-500 dark:text-slate-400 text-sm mb-4" data-i18n="perbandingan_konten">Perbandingan Destinasi, Budaya, Kuliner.</p>
                <div class="relative w-full h-[250px] flex justify-center"><canvas id="contentChart"></canvas></div>
            </div>
            <div class="bg-white dark:bg-[#0f172a] border border-slate-200 dark:border-slate-800 rounded-2xl p-6 lg:col-span-2 shadow-sm">
                <h3 class="text-lg font-bold text-slate-900 dark:text-white" data-i18n="top_destinasi">Top 5 Destinasi</h3>
                <p class="text-slate-500 dark:text-slate-400 text-sm mb-4" data-i18n="berdasarkan_ulasan">Berdasarkan jumlah ulasan pengunjung.</p>
                <div class="relative w-full h-[250px]"><canvas id="topDestinasiChart"></canvas></div>
            </div>
            <div class="bg-white dark:bg-[#0f172a] border border-slate-200 dark:border-slate-800 rounded-2xl p-6 shadow-sm">
                <h3 class="text-lg font-bold text-slate-900 dark:text-white" data-i18n="top_kuliner">Top 5 Kuliner</h3>
                <p class="text-slate-500 dark:text-slate-400 text-sm mb-4" data-i18n="berdasarkan_ulasan">Berdasarkan jumlah ulasan pengunjung.</p>
                <div class="relative w-full h-[250px]"><canvas id="topKulinerChart"></canvas></div>
            </div>
            <div class="bg-white dark:bg-[#0f172a] border border-slate-200 dark:border-slate-800 rounded-2xl p-6 shadow-sm">
                <h3 class="text-lg font-bold text-slate-900 dark:text-white" data-i18n="top_budaya">Top 5 Budaya</h3>
                <p class="text-slate-500 dark:text-slate-400 text-sm mb-4" data-i18n="berdasarkan_ulasan">Berdasarkan jumlah ulasan pengunjung.</p>
                <div class="relative w-full h-[250px]"><canvas id="topBudayaChart"></canvas></div>
            </div>
            <div class="bg-white dark:bg-[#0f172a] border border-slate-200 dark:border-slate-800 rounded-2xl p-6 shadow-sm">
                <h3 class="text-lg font-bold text-slate-900 dark:text-white" data-i18n="user_aktif">Pengguna Paling Aktif Menilai</h3>
                <p class="text-slate-500 dark:text-slate-400 text-sm mb-4" data-i18n="user_terbanyak">User dengan ulasan terbanyak.</p>
                <div class="relative w-full h-[250px]"><canvas id="userReviewChart"></canvas></div>
            </div>
            <div class="bg-white dark:bg-[#0f172a] border border-slate-200 dark:border-slate-800 rounded-2xl p-6 shadow-sm">
                <h3 class="text-lg font-bold text-slate-900 dark:text-white" data-i18n="sebaran_destinasi">Sebaran Destinasi</h3>
                <p class="text-slate-500 dark:text-slate-400 text-sm mb-4" data-i18n="top_kabupaten">Top 5 Kabupaten dengan destinasi terbanyak.</p>
                <div class="relative w-full h-[250px]"><canvas id="kabupatenChart"></canvas></div>
            </div>
        </div>
    </main>
</div>

{{-- Titip Data untuk Chart --}}
<div id="chartDataHolder"
    data-rating="{{ json_encode($chartData) }}"
    data-content="{{ json_encode($contentStats) }}"
    data-top-destinasi-labels="{{ json_encode($topDestinasiLabels) }}"
    data-top-destinasi-data="{{ json_encode($topDestinasiData) }}"
    data-top-kuliner-labels="{{ json_encode($topKulinerLabels) }}"
    data-top-kuliner-data="{{ json_encode($topKulinerData) }}"
    data-top-budaya-labels="{{ json_encode($topBudayaLabels) }}"
    data-top-budaya-data="{{ json_encode($topBudayaData) }}"
    data-user-review-labels="{{ json_encode($userReviewLabels) }}"
    data-user-review-data="{{ json_encode($userReviewData) }}"
    data-kab-labels="{{ json_encode($kabLabels) }}"
    data-kab-data="{{ json_encode($kabData) }}"
    style="display: none;">
</div>

<div id="app-data" data-user-id="{{ auth()->id() }}" data-api-url="{{ route('admin.pengguna.api') }}" data-csrf="{{ csrf_token() }}" style="display: none;"></div>

<!-- ========================================== -->
<!-- 🌟 MODAL PENGATURAN (DENGAN TAB & BAHASA) 🌟 -->
<!-- ========================================== -->
<div id="settingsModal" class="fixed inset-0 z-[999] hidden bg-slate-900/60 backdrop-blur-md flex items-center justify-center opacity-0 transition-opacity duration-300 p-4">
    <div id="settingsModalContent" class="bg-white dark:bg-[#0f172a] rounded-2xl w-full max-w-4xl h-[650px] shadow-2xl border border-slate-200 dark:border-slate-800 transform scale-95 transition-transform duration-300 overflow-hidden flex flex-col md:flex-row">

        <!-- Sidebar Tabs (Kiri) -->
        <div class="w-full md:w-56 bg-slate-50 dark:bg-slate-800/30 border-r border-slate-200 dark:border-slate-800 p-4 flex flex-col shrink-0">
            <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-6 px-4" data-i18n="settings">Settings</h3>
            <div class="space-y-1">
                <button id="btn-tab-general" onclick="switchSettingsTab('general')" class="settings-tab-btn w-full flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 dark:text-slate-400 font-semibold text-sm transition-colors">
                    <i class="fas fa-cog"></i> <span data-i18n="general">General</span>
                </button>
                <button id="btn-tab-profil" onclick="switchSettingsTab('profil')" class="settings-tab-btn w-full flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 dark:text-slate-400 font-semibold text-sm transition-colors">
                    <i class="fas fa-user"></i> <span data-i18n="profil_saya">Profil Saya</span>
                </button>
                <button id="btn-tab-data" onclick="switchSettingsTab('data')" class="settings-tab-btn w-full flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 dark:text-slate-400 font-semibold text-sm transition-colors">
                    <i class="fas fa-database"></i> <span data-i18n="data">Data</span>
                </button>
                <button id="btn-tab-about" onclick="switchSettingsTab('about')" class="settings-tab-btn w-full flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 dark:text-slate-400 font-semibold text-sm transition-colors">
                    <i class="fas fa-info-circle"></i> <span data-i18n="about">About</span>
                </button>
            </div>
        </div>

        <!-- Area Konten (Kanan) -->
        <div class="flex-1 p-6 md:p-8 overflow-y-auto relative">
            <!-- Tombol Close -->
            <button onclick="closeSettingsModal()" class="absolute top-6 right-6 w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-500 hover:bg-red-100 hover:text-red-600 transition z-10"><i class="fas fa-times"></i></button>

            <!-- 🌟 KONTEN TAB: GENERAL (TEMA & BAHASA) 🌟 -->
            <div id="tab-general" class="tab-content hidden">
                <h4 class="text-xl font-bold text-slate-900 dark:text-white mb-8" data-i18n="tema_tampilan">Tema Tampilan</h4>
                <div class="grid grid-cols-3 gap-4 mb-10">
                    <button onclick="setTheme('light')" id="btn-theme-light" class="flex flex-col items-center justify-center py-4 rounded-xl border-2 border-transparent bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700 transition-all group focus:outline-none">
                        <i class="fas fa-sun text-slate-400 group-hover:text-amber-500 text-2xl mb-3 transition-colors"></i>
                        <span class="text-sm font-semibold text-slate-500 dark:text-slate-400 group-hover:text-slate-900 dark:group-hover:text-white" data-i18n="light">Light</span>
                    </button>
                    <button onclick="setTheme('dark')" id="btn-theme-dark" class="flex flex-col items-center justify-center py-4 rounded-xl border-2 border-transparent bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700 transition-all group focus:outline-none">
                        <i class="fas fa-moon text-slate-400 group-hover:text-indigo-400 text-2xl mb-3 transition-colors"></i>
                        <span class="text-sm font-semibold text-slate-500 dark:text-slate-400 group-hover:text-slate-900 dark:group-hover:text-white" data-i18n="dark">Dark</span>
                    </button>
                    <button onclick="setTheme('system')" id="btn-theme-system" class="flex flex-col items-center justify-center py-4 rounded-xl border-2 border-transparent bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700 transition-all group focus:outline-none">
                        <i class="fas fa-desktop text-slate-400 group-hover:text-emerald-500 text-2xl mb-3 transition-colors"></i>
                        <span class="text-sm font-semibold text-slate-500 dark:text-slate-400 group-hover:text-slate-900 dark:group-hover:text-white" data-i18n="system">System</span>
                    </button>
                </div>

                <h4 class="text-xl font-bold text-slate-900 dark:text-white mb-4" data-i18n="pengaturan_lainnya">Pengaturan Lainnya</h4>
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 rounded-xl border border-slate-200 dark:border-slate-800">
                        <div>
                            <p class="font-bold text-sm text-slate-900 dark:text-white" data-i18n="bahasa">Bahasa</p>
                            <p class="text-xs text-slate-500" data-i18n="pilih_bahasa">Pilih bahasa antarmuka.</p>
                        </div>

                        <!-- 🌟 TOGGLE BAHASA INTERAKTIF (Gantiin Dropdown Kuno) 🌟 -->
                        <div class="flex bg-slate-200/50 dark:bg-slate-800 rounded-xl p-1 shadow-inner border border-slate-200 dark:border-slate-700 relative">
                            <!-- Latar Belakang Animasi (Slider) -->
                            <div id="lang-slider" class="absolute top-1 bottom-1 w-[calc(50%-4px)] bg-white dark:bg-slate-600 rounded-lg shadow-sm transition-all duration-300 ease-out z-0"></div>

                            <button onclick="changeLanguage('id')" id="btn-lang-id" class="relative z-10 px-4 py-1.5 text-sm font-bold text-slate-500 dark:text-slate-400 transition-colors flex items-center gap-1.5">
                                <span class="text-base">🇮🇩</span> ID
                            </button>
                            <button onclick="changeLanguage('en')" id="btn-lang-en" class="relative z-10 px-4 py-1.5 text-sm font-bold text-slate-500 dark:text-slate-400 transition-colors flex items-center gap-1.5">
                                <span class="text-base">🇬🇧</span> EN
                            </button>
                        </div>
                        <!-- END TOGGLE BAHASA -->

                    </div>
                </div>
            </div>

            <!-- 🌟 KONTEN TAB: PROFIL 🌟 -->
            <div id="tab-profil" class="tab-content hidden">
                <h4 class="text-xl font-bold text-slate-900 dark:text-white mb-6" data-i18n="profil_saya">Profil Saya</h4>

                @if(session('success'))
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl mb-6 text-sm flex items-center gap-2">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-col md:flex-row gap-8 items-start">
                        <!-- Foto -->
                        <div class="flex flex-col items-center shrink-0 mx-auto md:mx-0">
                            <div class="relative group">
                                <div class="w-28 h-28 rounded-full p-1 bg-gradient-to-tr from-emerald-500 to-teal-400 shadow-lg">
                                    <label for="avatarInput" class="cursor-pointer block w-full h-full rounded-full overflow-hidden bg-white dark:bg-[#0f172a] relative">
                                        @if(auth()->user()->avatar)
                                        <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="Avatar" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                        @else
                                        <div class="w-full h-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-400 text-5xl font-bold">{{ substr(auth()->user()->name ?? 'A', 0, 1) }}</div>
                                        @endif
                                        <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300"><i class="fas fa-camera text-white text-2xl"></i></div>
                                    </label>
                                </div>
                                <div class="absolute bottom-0 right-0 bg-emerald-500 text-white w-9 h-9 flex items-center justify-center rounded-full shadow-lg border-2 border-white dark:border-[#0f172a] pointer-events-none"><i class="fas fa-camera text-sm"></i></div>
                            </div>
                            <input type="file" id="avatarInput" name="avatar" class="hidden" accept="image/*" onchange="previewImage(event)">
                            <p class="text-[10px] text-slate-400 mt-3 font-medium text-center" data-i18n="maks_foto">Maks 2MB (JPG, PNG)</p>
                        </div>

                        <!-- Form Input -->
                        <div class="flex-1 space-y-4 w-full">
                            <div>
                                <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2 ml-1" data-i18n="nama_lengkap">Nama Lengkap</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400"><i class="fas fa-user"></i></div>
                                    <input type="text" name="name" value="{{ auth()->user()->name }}" class="w-full pl-11 pr-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 text-slate-900 dark:text-white focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-500 outline-none" required>
                                </div>
                            </div>
                            <div>
                                <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2 ml-1" data-i18n="alamat_email">Alamat Email</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400"><i class="fas fa-envelope"></i></div>
                                    <input type="email" name="email" value="{{ auth()->user()->email }}" class="w-full pl-11 pr-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 text-slate-900 dark:text-white focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-500 outline-none" required>
                                </div>
                            </div>
                            <div class="pt-2 border-t border-slate-100 dark:border-slate-800">
                                <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2 ml-1 mt-3" data-i18n="ganti_password">Ganti Password (Opsional)</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400"><i class="fas fa-lock"></i></div>
                                    <input type="password" name="password" id="passwordInput" placeholder="Biarkan kosong" class="w-full pl-11 pr-12 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 text-slate-900 dark:text-white focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-500 outline-none text-sm" data-i18n-placeholder="password_kosong">
                                    <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-emerald-500"><i class="fas fa-eye" id="toggleIcon"></i></button>
                                </div>
                            </div>
                            <div class="pt-4">
                                <button type="submit" class="w-full px-4 py-3 rounded-xl font-bold text-white bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-400 hover:to-emerald-500 shadow-lg shadow-emerald-500/40 flex items-center justify-center gap-2 transform hover:-translate-y-0.5"><i class="fas fa-check-circle"></i> <span data-i18n="simpan_perubahan">Simpan Perubahan</span></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- TAB DATA -->
            <div id="tab-data" class="tab-content hidden">
                <h4 class="text-xl font-bold text-slate-900 dark:text-white mb-4" data-i18n="data_website">Data Website</h4>
                <div class="p-10 text-center bg-slate-50 dark:bg-slate-800/50 rounded-xl border border-dashed border-slate-300 dark:border-slate-700">
                    <i class="fas fa-database text-4xl text-slate-300 mb-4"></i>
                    <p class="text-slate-500" data-i18n="fitur_backup">Fitur Backup & Restore database akan tersedia di sini.</p>
                </div>
            </div>

            <!-- TAB ABOUT -->
            <div id="tab-about" class="tab-content hidden">
                <h4 class="text-xl font-bold text-slate-900 dark:text-white mb-4" data-i18n="tentang_app">Tentang Aplikasi</h4>
                <div class="p-6 bg-slate-50 dark:bg-slate-800/50 rounded-xl border border-slate-200 dark:border-slate-700 text-center">
                    <div class="w-16 h-16 bg-emerald-100 dark:bg-emerald-900/30 rounded-2xl flex items-center justify-center mx-auto mb-4 text-emerald-500">
                        <i class="fas fa-leaf text-3xl"></i>
                    </div>
                    <h5 class="text-lg font-bold text-slate-900 dark:text-white">Explore Sumatera</h5>
                    <p class="text-sm text-slate-500 mt-2">Versi 1.0.0</p>
                    <p class="text-xs text-slate-400 mt-4" data-i18n="deskripsi_app">Aplikasi Sistem Informasi Pariwisata Sumatera. Dibuat untuk memenuhi tugas mata kuliah.</p>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- MODAL PENGGUNA (AJAX) -->
<div id="usersModal" class="fixed inset-0 z-[999] hidden bg-slate-900/80 backdrop-blur-sm flex items-center justify-center opacity-0 transition-opacity duration-300 p-4">
    <div id="usersModalContent" class="bg-white dark:bg-[#0f172a] rounded-3xl p-6 md:p-8 max-w-3xl w-full mx-4 shadow-2xl border border-slate-200 dark:border-slate-800 transform scale-95 transition-transform duration-300">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h3 class="text-xl font-bold flex items-center gap-2"><i class="fas fa-users text-emerald-500"></i> <span data-i18n="kelola_pengguna">Kelola Pengguna</span></h3>
            </div>
            <button onclick="closeUsersModal()" class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-500 hover:bg-slate-200 transition"><i class="fas fa-times"></i></button>
        </div>
        <div class="overflow-auto max-h-[60vh] rounded-xl border border-slate-200 dark:border-slate-800 mb-6">
            <table class="w-full text-left border-collapse relative">
                <thead class="bg-slate-50 dark:bg-slate-800/50 text-slate-500 dark:text-slate-400 text-xs uppercase font-bold sticky top-0 z-10">
                    <tr>
                        <th class="px-4 py-3 bg-slate-50 dark:bg-[#0f172a] border-b" data-i18n="nama">Nama</th>
                        <th class="px-4 py-3 bg-slate-50 dark:bg-[#0f172a] border-b">Email</th>
                        <th class="px-4 py-3 bg-slate-50 dark:bg-[#0f172a] border-b">Role</th>
                        <th class="px-4 py-3 bg-slate-50 dark:bg-[#0f172a] border-b text-center" data-i18n="aksi">Aksi</th>
                    </tr>
                </thead>
                <tbody id="usersTableBody" class="divide-y divide-slate-100 dark:divide-slate-800"></tbody>
            </table>
        </div>
        <div class="flex justify-end"><button type="button" onclick="closeUsersModal()" class="px-6 py-2.5 rounded-xl font-bold bg-slate-100 dark:bg-slate-800 transition" data-i18n="tutup">Tutup</button></div>
    </div>
</div>

<!-- MODAL KONFIRMASI HAPUS -->
<div id="deleteModal" class="fixed inset-0 z-[1000] hidden bg-slate-900/80 backdrop-blur-sm flex items-center justify-center opacity-0 transition-opacity duration-300 p-4">
    <div id="deleteModalContent" class="bg-white dark:bg-[#0f172a] rounded-3xl p-6 md:p-8 max-w-sm w-full mx-4 shadow-2xl border border-slate-200 dark:border-slate-800 transform scale-95 transition-transform duration-300">
        <div class="w-16 h-16 rounded-full bg-red-100 dark:bg-red-900/30 flex items-center justify-center mx-auto mb-4"><i class="fas fa-exclamation-triangle text-2xl text-red-600 dark:text-red-400"></i></div>
        <h3 id="deleteModalTitle" class="text-xl font-bold text-center mb-2" data-i18n="hapus_pengguna">Hapus Pengguna?</h3>
        <p id="deleteModalText" class="text-center text-slate-500 text-sm mb-6" data-i18n="peringatan_hapus">Akun pengguna ini akan dihapus permanen.</p>
        <div class="flex gap-3">
            <button type="button" onclick="closeDeleteModal()" class="flex-1 px-4 py-2.5 rounded-xl font-bold bg-slate-100 dark:bg-slate-800 transition" data-i18n="batal">Batal</button>
            <button type="button" id="confirmDeleteBtn" class="flex-1 px-4 py-2.5 rounded-xl font-bold text-white bg-red-600 shadow-lg transition" data-i18n="ya_hapus">Ya, Hapus</button>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // ==========================================
    // 🌟 KAMUS BAHASA (TRANSLATIONS DICTIONARY) 🌟
    // ==========================================
    const translations = {
        id: {
            menu_admin: "Menu Admin",
            kelola_konten: "Kelola Konten",
            utama: "Utama",
            dashboard: "Dashboard",
            tambah_konten: "Tambah Konten",
            destinasi: "Destinasi",
            budaya: "Budaya",
            kuliner: "Kuliner",
            peta: "Peta",
            pengguna: "Pengguna",
            pengaturan: "Pengaturan",
            dashboard_admin: "Dashboard Admin",
            kelola_explore: "Kelola Explore Sumatera",
            welcome_back: "Selamat datang kembali!",
            hello_admin: "Halo, Admin",
            pantau_aktivitas: "Pantau aktivitas website kamu.",
            review: "Review",
            statistik_ulasan: "Statistik Ulasan",
            distribusi_rating: "Distribusi rating bintang.",
            distribusi_konten: "Distribusi Konten",
            perbandingan_konten: "Perbandingan Destinasi, Budaya, Kuliner.",
            top_destinasi: "Top 5 Destinasi",
            berdasarkan_ulasan: "Berdasarkan jumlah ulasan pengunjung.",
            top_kuliner: "Top 5 Kuliner",
            top_budaya: "Top 5 Budaya",
            user_aktif: "Pengguna Paling Aktif Menilai",
            user_terbanyak: "User dengan ulasan terbanyak.",
            sebaran_destinasi: "Sebaran Destinasi",
            top_kabupaten: "Top 5 Kabupaten dengan destinasi terbanyak.",
            settings: "Settings",
            general: "General",
            profil_saya: "Profil Saya",
            data: "Data",
            about: "About",
            tema_tampilan: "Tema Tampilan",
            light: "Light",
            dark: "Dark",
            system: "System",
            pengaturan_lainnya: "Pengaturan Lainnya",
            bahasa: "Bahasa",
            pilih_bahasa: "Pilih bahasa antarmuka.",
            nama_lengkap: "Nama Lengkap",
            alamat_email: "Alamat Email",
            ganti_password: "Ganti Password (Opsional)",
            password_kosong: "Biarkan kosong",
            simpan_perubahan: "Simpan Perubahan",
            maks_foto: "Maks 2MB (JPG, PNG)",
            data_website: "Data Website",
            fitur_backup: "Fitur Backup & Restore database akan tersedia di sini.",
            tentang_app: "Tentang Aplikasi",
            deskripsi_app: "Aplikasi Sistem Informasi Pariwisata Sumatera. Dibuat untuk memenuhi tugas mata kuliah.",
            kelola_pengguna: "Kelola Pengguna",
            nama: "Nama",
            aksi: "Aksi",
            tutup: "Tutup",
            hapus_pengguna: "Hapus Pengguna?",
            peringatan_hapus: "Akun pengguna ini akan dihapus permanen.",
            batal: "Batal",
            ya_hapus: "Ya, Hapus"
        },
        en: {
            menu_admin: "Admin Menu",
            kelola_konten: "Manage Content",
            utama: "Main",
            dashboard: "Dashboard",
            tambah_konten: "Add Content",
            destinasi: "Destination",
            budaya: "Culture",
            kuliner: "Culinary",
            peta: "Map",
            pengguna: "Users",
            pengaturan: "Settings",
            dashboard_admin: "Admin Dashboard",
            kelola_explore: "Manage Explore Sumatera",
            welcome_back: "Welcome back!",
            hello_admin: "Hello, Admin",
            pantau_aktivitas: "Monitor your website activity.",
            review: "Reviews",
            statistik_ulasan: "Review Statistics",
            distribusi_rating: "Star rating distribution.",
            distribusi_konten: "Content Distribution",
            perbandingan_konten: "Comparison of Destinations, Culture, Culinary.",
            top_destinasi: "Top 5 Destinations",
            berdasarkan_ulasan: "Based on total visitor reviews.",
            top_kuliner: "Top 5 Culinary",
            top_budaya: "Top 5 Culture",
            user_aktif: "Most Active Reviewers",
            user_terbanyak: "Users with the most reviews.",
            sebaran_destinasi: "Destination Distribution",
            top_kabupaten: "Top 5 Regencies with the most destinations.",
            settings: "Settings",
            general: "General",
            profil_saya: "My Profile",
            data: "Data",
            about: "About",
            tema_tampilan: "Appearance Theme",
            light: "Light",
            dark: "Dark",
            system: "System",
            pengaturan_lainnya: "Other Settings",
            bahasa: "Language",
            pilih_bahasa: "Select interface language.",
            nama_lengkap: "Full Name",
            alamat_email: "Email Address",
            ganti_password: "Change Password (Optional)",
            password_kosong: "Leave blank",
            simpan_perubahan: "Save Changes",
            maks_foto: "Max 2MB (JPG, PNG)",
            data_website: "Website Data",
            fitur_backup: "Database Backup & Restore feature will be available here.",
            tentang_app: "About App",
            deskripsi_app: "Sumatera Tourism Information System Application. Created to fulfill coursework.",
            kelola_pengguna: "Manage Users",
            nama: "Name",
            aksi: "Action",
            tutup: "Close",
            hapus_pengguna: "Delete User?",
            peringatan_hapus: "This user account will be permanently deleted.",
            batal: "Cancel",
            ya_hapus: "Yes, Delete"
        }
    };

    // Fungsi Ganti Bahasa
    window.changeLanguage = function(lang) {
        localStorage.setItem('language', lang);

        // 1. Ganti teks biasa
        document.querySelectorAll('[data-i18n]').forEach(el => {
            const key = el.getAttribute('data-i18n');
            if (translations[lang] && translations[lang][key]) {
                el.innerText = translations[lang][key];
            }
        });

        // 2. Ganti Placeholder (Input)
        document.querySelectorAll('[data-i18n-placeholder]').forEach(el => {
            const key = el.getAttribute('data-i18n-placeholder');
            if (translations[lang] && translations[lang][key]) {
                el.placeholder = translations[lang][key];
            }
        });

        // 3. Update Toggle UI (Animasi geser)
        const slider = document.getElementById('lang-slider');
        const btnId = document.getElementById('btn-lang-id');
        const btnEn = document.getElementById('btn-lang-en');

        if (lang === 'id') {
            slider.style.transform = 'translateX(0)';
            btnId.classList.add('text-slate-900', 'dark:text-white');
            btnId.classList.remove('text-slate-500', 'dark:text-slate-400');
            btnEn.classList.remove('text-slate-900', 'dark:text-white');
            btnEn.classList.add('text-slate-500', 'dark:text-slate-400');
        } else {
            slider.style.transform = 'translateX(100%)';
            btnEn.classList.add('text-slate-900', 'dark:text-white');
            btnEn.classList.remove('text-slate-500', 'dark:text-slate-400');
            btnId.classList.remove('text-slate-900', 'dark:text-white');
            btnId.classList.add('text-slate-500', 'dark:text-slate-400');
        }
    };

    document.addEventListener('DOMContentLoaded', function() {
        // Load bahasa pas pertama buka
        const savedLang = localStorage.getItem('language') || 'id';
        changeLanguage(savedLang);

        // ==========================================
        // LOGIKA TAB PENGATURAN
        // ==========================================
        window.switchSettingsTab = function(tabName) {
            document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
            document.querySelectorAll('.settings-tab-btn').forEach(el => {
                el.classList.remove('bg-slate-200', 'dark:bg-slate-700', 'text-slate-900', 'dark:text-white');
                el.classList.add('text-slate-600', 'dark:text-slate-400');
            });
            document.getElementById('tab-' + tabName).classList.remove('hidden');
            let activeBtn = document.getElementById('btn-tab-' + tabName);
            if (activeBtn) {
                activeBtn.classList.remove('text-slate-600', 'dark:text-slate-400');
                activeBtn.classList.add('bg-slate-200', 'dark:bg-slate-700', 'text-slate-900', 'dark:text-white');
            }
        }

        // ==========================================
        // LOGIKA TEMA (LIGHT / DARK / SYSTEM)
        // ==========================================
        const html = document.documentElement;
        const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');

        function updateThemeUI(theme) {
            const btnLight = document.getElementById('btn-theme-light');
            const btnDark = document.getElementById('btn-theme-dark');
            const btnSystem = document.getElementById('btn-theme-system');

            [btnLight, btnDark, btnSystem].forEach(btn => {
                if (btn) {
                    btn.className = "flex flex-col items-center justify-center py-4 rounded-xl border-2 border-transparent bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700 transition-all group focus:outline-none";
                    const icon = btn.querySelector('i');
                    const text = btn.querySelector('span');
                    icon.className = icon.className.replace('text-emerald-500', 'text-slate-400');
                    text.className = "text-sm font-semibold text-slate-500 dark:text-slate-400";
                }
            });

            const activeBtn = document.getElementById(`btn-theme-${theme}`);
            if (activeBtn) {
                activeBtn.className = "flex flex-col items-center justify-center py-4 rounded-xl border-2 border-emerald-500 bg-emerald-50 dark:bg-emerald-900/20 transition-all group focus:outline-none shadow-sm";
                const icon = activeBtn.querySelector('i');
                const text = activeBtn.querySelector('span');
                icon.className = icon.className.replace('text-slate-400', 'text-emerald-500');
                text.className = "text-sm font-semibold text-emerald-700 dark:text-emerald-400";
            }
        }

        window.setTheme = function(theme) {
            localStorage.setItem('theme', theme);
            if (theme === 'system') {
                if (mediaQuery.matches) {
                    html.classList.add('dark');
                } else {
                    html.classList.remove('dark');
                }
            } else if (theme === 'dark') {
                html.classList.add('dark');
            } else {
                html.classList.remove('dark');
            }
            updateThemeUI(theme);
        }

        const savedTheme = localStorage.getItem('theme') || 'system';
        setTheme(savedTheme);
        mediaQuery.addEventListener('change', e => {
            if (localStorage.getItem('theme') === 'system') setTheme('system');
        });


        // ==========================================
        // LOGIKA CHART.JS
        // ==========================================
        var holder = document.getElementById('chartDataHolder');
        if (holder) {
            var isDarkMode = document.documentElement.classList.contains('dark');
            var textColor = isDarkMode ? '#94a3b8' : '#64748b';
            var gridColor = isDarkMode ? '#334155' : '#e2e8f0';

            new Chart(document.getElementById('ratingChart').getContext('2d'), {
                type: 'bar',
                data: {
                    labels: ['1', '2', '3', '4', '5'],
                    datasets: [{
                        label: 'Ulasan',
                        data: JSON.parse(holder.dataset.rating),
                        backgroundColor: ['#ef4444', '#f97316', '#eab308', '#10b981', '#059669'],
                        borderRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1,
                                color: textColor
                            },
                            grid: {
                                color: gridColor
                            }
                        },
                        x: {
                            ticks: {
                                color: textColor
                            },
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            new Chart(document.getElementById('contentChart').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Destinasi', 'Budaya', 'Kuliner'],
                    datasets: [{
                        data: JSON.parse(holder.dataset.content),
                        backgroundColor: ['#10b981', '#a855f7', '#f97316'],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '65%',
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                color: textColor,
                                usePointStyle: true
                            }
                        }
                    }
                }
            });

            new Chart(document.getElementById('topDestinasiChart').getContext('2d'), {
                type: 'bar',
                data: {
                    labels: JSON.parse(holder.dataset.topDestinasiLabels),
                    datasets: [{
                        label: 'Ulasan',
                        data: JSON.parse(holder.dataset.topDestinasiData),
                        backgroundColor: 'rgba(16, 185, 129, 0.8)',
                        borderRadius: 6,
                        barThickness: 25
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        x: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1,
                                color: textColor
                            },
                            grid: {
                                color: gridColor
                            }
                        },
                        y: {
                            ticks: {
                                color: textColor
                            },
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            new Chart(document.getElementById('topKulinerChart').getContext('2d'), {
                type: 'bar',
                data: {
                    labels: JSON.parse(holder.dataset.topKulinerLabels),
                    datasets: [{
                        label: 'Ulasan',
                        data: JSON.parse(holder.dataset.topKulinerData),
                        backgroundColor: 'rgba(249, 115, 22, 0.8)',
                        borderRadius: 6,
                        barThickness: 25
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        x: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1,
                                color: textColor
                            },
                            grid: {
                                color: gridColor
                            }
                        },
                        y: {
                            ticks: {
                                color: textColor
                            },
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            new Chart(document.getElementById('topBudayaChart').getContext('2d'), {
                type: 'bar',
                data: {
                    labels: JSON.parse(holder.dataset.topBudayaLabels),
                    datasets: [{
                        label: 'Ulasan',
                        data: JSON.parse(holder.dataset.topBudayaData),
                        backgroundColor: 'rgba(168, 85, 247, 0.8)',
                        borderRadius: 6,
                        barThickness: 25
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        x: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1,
                                color: textColor
                            },
                            grid: {
                                color: gridColor
                            }
                        },
                        y: {
                            ticks: {
                                color: textColor
                            },
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            new Chart(document.getElementById('userReviewChart').getContext('2d'), {
                type: 'bar',
                data: {
                    labels: JSON.parse(holder.dataset.userReviewLabels),
                    datasets: [{
                        label: 'Review',
                        data: JSON.parse(holder.dataset.userReviewData),
                        backgroundColor: '#3b82f6',
                        borderRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1,
                                color: textColor
                            },
                            grid: {
                                color: gridColor
                            }
                        },
                        x: {
                            ticks: {
                                color: textColor
                            },
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            new Chart(document.getElementById('kabupatenChart').getContext('2d'), {
                type: 'bar',
                data: {
                    labels: JSON.parse(holder.dataset.kabLabels),
                    datasets: [{
                        label: 'Destinasi',
                        data: JSON.parse(holder.dataset.kabData),
                        backgroundColor: 'rgba(236, 72, 153, 0.8)',
                        borderRadius: 6,
                        barThickness: 25
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        x: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1,
                                color: textColor
                            },
                            grid: {
                                color: gridColor
                            }
                        },
                        y: {
                            ticks: {
                                color: textColor
                            },
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            const observer = new MutationObserver(() => {
                let nowDark = document.documentElement.classList.contains('dark');
                let newText = nowDark ? '#94a3b8' : '#64748b';
                let newGrid = nowDark ? '#334155' : '#e2e8f0';
                Chart.instances.forEach(chart => {
                    if (chart.options.scales) {
                        if (chart.options.scales.y) {
                            chart.options.scales.y.ticks.color = newText;
                            if (chart.options.scales.y.grid) chart.options.scales.y.grid.color = newGrid;
                        }
                        if (chart.options.scales.x) {
                            chart.options.scales.x.ticks.color = newText;
                            if (chart.options.scales.x.grid) chart.options.scales.x.grid.color = newGrid;
                        }
                    }
                    if (chart.options.plugins.legend && chart.options.plugins.legend.labels) {
                        chart.options.plugins.legend.labels.color = newText;
                    }
                    chart.update();
                });
            });
            observer.observe(document.documentElement, {
                attributes: true
            });
        }

        // ==========================================
        // LOGIKA MODAL POP-UP
        // ==========================================
        var appData = document.getElementById('app-data');
        var currentUserId = parseInt(appData.dataset.userId);
        var apiUrl = appData.dataset.apiUrl;
        var csrfToken = appData.dataset.csrf;

        window.openSettingsModal = function(defaultTab = 'general') {
            const modal = document.getElementById('settingsModal');
            const content = document.getElementById('settingsModalContent');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                content.classList.remove('scale-95');
                content.classList.add('scale-100');
                switchSettingsTab(defaultTab);
            }, 10);
        };
        window.closeSettingsModal = function() {
            const modal = document.getElementById('settingsModal');
            const content = document.getElementById('settingsModalContent');
            modal.classList.add('opacity-0');
            content.classList.remove('scale-100');
            content.classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        };

        window.openUsersModal = function() {
            const modal = document.getElementById('usersModal');
            const content = document.getElementById('usersModalContent');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                content.classList.remove('scale-95');
                content.classList.add('scale-100');
            }, 10);

            const tbody = document.getElementById('usersTableBody');
            tbody.innerHTML = '<tr><td colspan="4" class="text-center py-6 text-slate-500"><i class="fas fa-spinner fa-spin mr-2"></i> Memuat data...</td></tr>';
            fetch(apiUrl).then(response => response.json()).then(users => {
                let html = '';
                users.forEach(user => {
                    let roleBadge = user.role === 'admin' ? '<span class="text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded-md bg-amber-100 text-amber-700">ADMIN</span>' : '<span class="text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded-md bg-emerald-100 text-emerald-700">USER</span>';
                    let actionBtn = user.id !== currentUserId ? `<button onclick="confirmDeleteUser(${user.id})" class="w-8 h-8 rounded-lg bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-100 transition mx-auto"><i class="fas fa-trash text-sm"></i></button>` : `<span class="text-[10px] text-slate-400">Anda</span>`;
                    html += `<tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition"><td class="px-4 py-3"><div class="flex items-center gap-3"><div class="w-8 h-8 rounded-full bg-emerald-500 text-white flex items-center justify-center font-bold text-xs shrink-0">${user.name.charAt(0).toUpperCase()}</div><span class="font-bold text-slate-800 dark:text-white text-sm">${user.name}</span></div></td><td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-300">${user.email}</td><td class="px-4 py-3">${roleBadge}</td><td class="px-4 py-3 text-center">${actionBtn}</td></tr>`;
                });
                tbody.innerHTML = html;
            });
        };
        window.closeUsersModal = function() {
            const modal = document.getElementById('usersModal');
            const content = document.getElementById('usersModalContent');
            modal.classList.add('opacity-0');
            content.classList.remove('scale-100');
            content.classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        };

        let actionToExecute = null;
        window.confirmDeleteUser = function(id) {
            document.getElementById('deleteModalTitle').innerText = translations[localStorage.getItem('language') || 'id'].hapus_pengguna;
            actionToExecute = function() {
                fetch(`/admin/pengguna/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        }
                    })
                    .then(() => {
                        closeDeleteModal();
                        openUsersModal();
                    });
            };
            const modal = document.getElementById('deleteModal');
            const content = document.getElementById('deleteModalContent');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                content.classList.remove('scale-95');
                content.classList.add('scale-100');
            }, 10);
        };

        document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
            if (typeof actionToExecute === 'function') {
                actionToExecute();
            }
        });
        window.closeDeleteModal = function() {
            const modal = document.getElementById('deleteModal');
            const content = document.getElementById('deleteModalContent');
            modal.classList.add('opacity-0');
            content.classList.remove('scale-100');
            content.classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
            actionToExecute = null;
        };
    });

    // Script Upload Foto
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = event.target.parentNode.querySelector('img') || event.target.parentNode.querySelector('div');
            if (output.tagName === 'DIV') {
                var img = document.createElement('img');
                img.className = "w-full h-full object-cover group-hover:scale-110 transition-transform duration-300";
                img.src = reader.result;
                output.parentNode.replaceChild(img, output);
            } else {
                output.src = reader.result;
            }
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    // Script Lihat Password
    function togglePassword() {
        var input = document.getElementById('passwordInput');
        var icon = document.getElementById('toggleIcon');
        if (input.type === "password") {
            input.type = "text";
            icon.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            input.type = "password";
            icon.classList.replace('fa-eye-slash', 'fa-eye');
        }
    }
</script>
@endsection