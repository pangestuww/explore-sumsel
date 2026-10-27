@extends('layouts.app')

@section('title', 'Kelola Budaya - Admin')

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
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg">
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
                <a href="{{ route('admin.budaya.index') }}" class="flex items-center gap-3 px-3 py-2.5 bg-emerald-600 text-white rounded-lg shadow-sm mb-3">
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
            <button onclick="openSettingsModal()" class="w-full flex items-center gap-3 px-3 py-2.5 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg text-left">
                <i class="fas fa-cog text-sm w-5 text-center"></i>
                <span class="font-medium text-sm" data-i18n="pengaturan">Pengaturan</span>
            </button>
        </div>
    </aside>

    <!-- KONTEN KANAN -->
    <main class="flex-1 p-6 md:p-10 overflow-y-auto h-full">
        <div class="container mx-auto max-w-6xl">
            <div class="flex flex-col md:flex-row items-center justify-between mb-8 gap-4">
                <div>
                    <h1 class="text-3xl font-black text-slate-900 dark:text-white" data-i18n="kelola_budaya">Kelola Budaya</h1>
                    <p class="text-slate-500 dark:text-slate-400 mt-1" data-i18n="daftar_budaya">Daftar warisan budaya di Explore Sumatera.</p>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('admin.dashboard') }}" class="bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 px-5 py-2.5 rounded-xl font-bold hover:bg-slate-300 dark:hover:bg-slate-700 transition">
                        <i class="fas fa-arrow-left mr-2"></i> <span data-i18n="kembali">Kembali</span>
                    </a>
                    <a href="{{ route('admin.budaya.create') }}" class="bg-emerald-600 hover:bg-emerald-500 text-white px-5 py-2.5 rounded-xl font-bold transition shadow-lg shadow-emerald-600/30">
                        <i class="fas fa-plus mr-2"></i> <span data-i18n="tambah_budaya">Tambah Budaya</span>
                    </a>
                </div>
            </div>

            @if(session('success'))
            <div class="bg-emerald-100 border border-emerald-400 text-emerald-700 px-4 py-3 rounded-xl mb-6">
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white dark:bg-[#0f172a] rounded-2xl shadow-xl border border-slate-200 dark:border-slate-800 flex flex-col" style="height: calc(100vh - 250px);">
                <div class="overflow-auto flex-grow rounded-t-2xl">
                    <table class="w-full text-left border-collapse relative">
                        <thead class="bg-slate-50 dark:bg-slate-800/50 text-slate-500 dark:text-slate-400 text-xs uppercase tracking-wider font-bold sticky top-0 z-10 shadow-sm">
                            <tr>
                                <th class="px-6 py-4 border-b border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-[#0f172a]">No</th>
                                <th class="px-6 py-4 border-b border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-[#0f172a]">Gambar</th>
                                <th class="px-6 py-4 border-b border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-[#0f172a]">Nama Budaya</th>
                                <th class="px-6 py-4 border-b border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-[#0f172a]">Kabupaten</th>
                                <th class="px-6 py-4 border-b border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-[#0f172a]">Jenis</th>
                                <th class="px-6 py-4 border-b border-slate-200 dark:border-slate-800 text-center bg-slate-50 dark:bg-[#0f172a]">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                            @forelse($budayas as $index => $item)
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition group">
                                <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-300">{{ $budayas->firstItem() + $index }}</td>
                                <td class="px-6 py-4">
                                    <div class="overflow-hidden rounded-lg w-16 h-16 border border-slate-200 dark:border-slate-700">
                                        <img src="{{ str_starts_with($item->gambar, 'http') ? $item->gambar : asset('storage/'.$item->gambar) }}" alt="{{ $item->nama }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-bold text-slate-800 dark:text-white text-sm">{{ $item->nama }}</td>
                                <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-300">{{ $item->kabupaten->nama ?? '-' }}</td>
                                <td class="px-6 py-4">
                                    <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded-md bg-purple-100 text-purple-700 dark:bg-purple-900/30 dark:text-purple-400">{{ $item->jenis }}</span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button type="button" data-url="{{ route('admin.budaya.edit', $item->id) }}" onclick="openEditModal(this.dataset.url)" class="w-8 h-8 rounded-lg bg-blue-50 dark:bg-blue-950/30 text-blue-600 dark:text-blue-400 flex items-center justify-center hover:bg-blue-100 hover:scale-110 transition-all" title="Edit">
                                            <i class="fas fa-edit text-sm"></i>
                                        </button>
                                        <button class="btn-delete-budaya w-8 h-8 rounded-lg bg-red-50 dark:bg-red-950/30 text-red-600 dark:text-red-400 flex items-center justify-center hover:bg-red-100 hover:scale-110 transition-all" data-id="{{ $item->id }}" title="Hapus">
                                            <i class="fas fa-trash text-sm"></i>
                                        </button>
                                        <form id="delete-budaya-form-{{ $item->id }}" action="{{ route('admin.budaya.destroy', $item->id) }}" method="POST" class="hidden">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-6 py-10 text-center text-slate-500 dark:text-slate-400">Belum ada data budaya.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="p-4 border-t border-slate-200 dark:border-slate-800 bg-white dark:bg-[#0f172a] rounded-b-2xl shrink-0">
                    {{ $budayas->links() }}
                </div>
            </div>
        </div>
    </main>
</div>

<div id="app-data" data-user-id="{{ auth()->id() }}" data-api-url="{{ route('admin.pengguna.api') }}" data-csrf="{{ csrf_token() }}" style="display: none;"></div>

<!-- MODAL EDIT BUDAYA -->
<div id="editModal" class="fixed inset-0 z-[1000] hidden bg-slate-900/60 backdrop-blur-sm flex items-center justify-center opacity-0 transition-opacity duration-300 p-4">
    <div id="editModalContent" class="bg-white dark:bg-[#0f172a] rounded-3xl p-6 md:p-8 max-w-3xl w-full mx-4 shadow-2xl border border-slate-200 dark:border-slate-800 transform scale-95 transition-transform duration-300 max-h-[90vh] overflow-y-auto relative">
        <div class="flex justify-between items-center mb-6 sticky top-0 bg-white dark:bg-[#0f172a] z-10 pb-4 border-b border-slate-200 dark:border-slate-800">
            <h3 class="text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2"><i class="fas fa-edit text-emerald-500"></i> Edit Data Budaya</h3>
            <button onclick="closeEditModal()" type="button" class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-500 hover:bg-red-100 hover:text-red-600 transition"><i class="fas fa-times"></i></button>
        </div>
        <div id="editFormContainer" class="text-slate-800 dark:text-white"></div>
    </div>
</div>

<!-- MODAL PENGATURAN -->
<div id="settingsModal" class="fixed inset-0 z-[999] hidden bg-slate-900/60 backdrop-blur-md flex items-center justify-center opacity-0 transition-opacity duration-300 p-4">
    <div id="settingsModalContent" class="bg-white dark:bg-[#0f172a] rounded-2xl w-full max-w-lg shadow-2xl border border-slate-200 dark:border-slate-800 transform scale-95 transition-transform duration-300 overflow-hidden flex flex-col">
        <div class="flex justify-between items-center p-6 border-b border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-800/30">
            <h3 class="text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2">
                <i class="fas fa-cog text-emerald-500"></i> <span data-i18n="settings">Pengaturan</span>
            </h3>
            <button onclick="closeSettingsModal()" class="w-8 h-8 rounded-full bg-white dark:bg-slate-800 flex items-center justify-center text-slate-500 hover:bg-red-100 hover:text-red-600 transition"><i class="fas fa-times"></i></button>
        </div>
        <div class="p-6 md:p-8 overflow-y-auto">
            <h4 class="text-lg font-bold text-slate-900 dark:text-white mb-4" data-i18n="tema_tampilan">Tema Tampilan</h4>
            <div class="grid grid-cols-3 gap-4 mb-8">
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
            <h4 class="text-lg font-bold text-slate-900 dark:text-white mb-4" data-i18n="pengaturan_lainnya">Pengaturan Lainnya</h4>
            <div class="space-y-4">
                <div class="flex items-center justify-between p-4 rounded-xl border border-slate-200 dark:border-slate-800">
                    <div>
                        <p class="font-bold text-sm text-slate-900 dark:text-white" data-i18n="bahasa">Bahasa</p>
                        <p class="text-xs text-slate-500" data-i18n="pilih_bahasa">Pilih bahasa antarmuka.</p>
                    </div>
                    <div class="flex bg-slate-200/50 dark:bg-slate-800 rounded-xl p-1 shadow-inner border border-slate-200 dark:border-slate-700 relative">
                        <div id="lang-slider" class="absolute top-1 bottom-1 w-[calc(50%-4px)] bg-white dark:bg-slate-600 rounded-lg shadow-sm transition-all duration-300 ease-out z-0"></div>
                        <button onclick="changeLanguage('id')" id="btn-lang-id" class="relative z-10 px-4 py-1.5 text-sm font-bold text-slate-500 dark:text-slate-400 transition-colors flex items-center gap-1.5"><span class="text-base">🇮🇩</span> ID</button>
                        <button onclick="changeLanguage('en')" id="btn-lang-en" class="relative z-10 px-4 py-1.5 text-sm font-bold text-slate-500 dark:text-slate-400 transition-colors flex items-center gap-1.5"><span class="text-base">🇬🇧</span> EN</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL PENGGUNA (AJAX) -->
<div id="usersModal" class="fixed inset-0 z-[999] hidden bg-slate-900/80 backdrop-blur-sm flex items-center justify-center opacity-0 transition-opacity duration-300 p-4">
    <div id="usersModalContent" class="bg-white dark:bg-[#0f172a] rounded-3xl p-6 md:p-8 max-w-3xl w-full mx-4 shadow-2xl border border-slate-200 dark:border-slate-800 transform scale-95 transition-transform duration-300">
        <div class="flex justify-between items-center mb-6">
            <div><h3 class="text-xl font-bold flex items-center gap-2"><i class="fas fa-users text-emerald-500"></i> <span data-i18n="kelola_pengguna">Kelola Pengguna</span></h3></div>
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
        <h3 id="deleteModalTitle" class="text-xl font-bold text-center mb-2" data-i18n="hapus_budaya">Hapus Budaya?</h3>
        <p id="deleteModalText" class="text-center text-slate-500 text-sm mb-6" data-i18n="peringatan_hapus">Data ini akan dihapus permanen.</p>
        <div class="flex gap-3">
            <button type="button" onclick="closeDeleteModal()" class="flex-1 px-4 py-2.5 rounded-xl font-bold bg-slate-100 dark:bg-slate-800 transition" data-i18n="batal">Batal</button>
            <button type="button" id="confirmDeleteBtn" class="flex-1 px-4 py-2.5 rounded-xl font-bold text-white bg-red-600 shadow-lg transition" data-i18n="ya_hapus">Ya, Hapus</button>
        </div>
    </div>
</div>

<script>
    // 🌟 KAMUS BAHASA
    const translations = {
        id: { menu_admin: "Menu Admin", kelola_konten: "Kelola Konten", utama: "Utama", dashboard: "Dashboard", tambah_konten: "Tambah Konten", destinasi: "Destinasi", budaya: "Budaya", kuliner: "Kuliner", peta: "Peta", pengguna: "Pengguna", pengaturan: "Pengaturan", kelola_budaya: "Kelola Budaya", daftar_budaya: "Daftar warisan budaya di Explore Sumatera.", kembali: "Kembali", tambah_budaya: "Tambah Budaya", settings: "Settings", tema_tampilan: "Tema Tampilan", light: "Light", dark: "Dark", system: "System", pengaturan_lainnya: "Pengaturan Lainnya", bahasa: "Bahasa", pilih_bahasa: "Pilih bahasa antarmuka.", kelola_pengguna: "Kelola Pengguna", nama: "Nama", aksi: "Aksi", tutup: "Tutup", hapus_budaya: "Hapus Budaya?", peringatan_hapus: "Data budaya ini akan dihapus permanen.", batal: "Batal", ya_hapus: "Ya, Hapus" },
        en: { menu_admin: "Admin Menu", kelola_konten: "Manage Content", utama: "Main", dashboard: "Dashboard", tambah_konten: "Add Content", destinasi: "Destination", budaya: "Culture", kuliner: "Culinary", peta: "Map", pengguna: "Users", pengaturan: "Settings", kelola_budaya: "Manage Culture", daftar_budaya: "List of cultural heritage in Explore Sumatera.", kembali: "Back", tambah_budaya: "Add Culture", settings: "Settings", tema_tampilan: "Appearance Theme", light: "Light", dark: "Dark", system: "System", pengaturan_lainnya: "Other Settings", bahasa: "Language", pilih_bahasa: "Select interface language.", kelola_pengguna: "Manage Users", nama: "Name", aksi: "Action", tutup: "Close", hapus_budaya: "Delete Culture?", peringatan_hapus: "This cultural data will be permanently deleted.", batal: "Cancel", ya_hapus: "Yes, Delete" }
    };

    window.changeLanguage = function(lang) {
        localStorage.setItem('language', lang);
        document.querySelectorAll('[data-i18n]').forEach(el => {
            const key = el.getAttribute('data-i18n');
            if(translations[lang] && translations[lang][key]) el.innerText = translations[lang][key];
        });
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
        const savedLang = localStorage.getItem('language') || 'id';
        changeLanguage(savedLang);

        const html = document.documentElement;
        const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');

        function updateThemeUI(theme) {
            const btnLight = document.getElementById('btn-theme-light');
            const btnDark = document.getElementById('btn-theme-dark');
            const btnSystem = document.getElementById('btn-theme-system');
            [btnLight, btnDark, btnSystem].forEach(btn => {
                if(btn) {
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
                if (mediaQuery.matches) { html.classList.add('dark'); } else { html.classList.remove('dark'); }
            } else if (theme === 'dark') { html.classList.add('dark'); } else { html.classList.remove('dark'); }
            updateThemeUI(theme);
        }

        const savedTheme = localStorage.getItem('theme') || 'system';
        setTheme(savedTheme);
        mediaQuery.addEventListener('change', e => { if (localStorage.getItem('theme') === 'system') setTheme('system'); });

        // MODAL LOGIC
        var appData = document.getElementById('app-data');
        var currentUserId = parseInt(appData.dataset.userId);
        var apiUrl = appData.dataset.apiUrl;
        var csrfToken = appData.dataset.csrf;

        // 🌟 LOGIKA BUKA & TUTUP MODAL EDIT (UDAH DI-UPGRADE) 🌟
        window.openEditModal = function(url) {
            const modal = document.getElementById('editModal');
            const content = document.getElementById('editModalContent');
            const container = document.getElementById('editFormContainer');
            
            modal.classList.remove('hidden');
            setTimeout(() => { 
                modal.classList.remove('opacity-0'); 
                content.classList.remove('scale-95'); 
                content.classList.add('scale-100'); 
            }, 10);

            container.innerHTML = '<div class="text-center py-10"><i class="fas fa-spinner fa-spin text-3xl text-emerald-500"></i><p class="mt-4 text-slate-500">Memuat formulir...</p></div>';

            fetch(url)
                .then(response => {
                    if (!response.ok) throw new Error('Gagal ambil data (Status: ' + response.status + ')');
                    return response.text();
                })
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    
                    // Cari form yang punya enctype multipart, kalau gak ada cari yang actionnya update
                    const form = doc.querySelector('form[enctype="multipart/form-data"]') || doc.querySelector('form[action*="update"]');

                    if (form) {
                        container.innerHTML = '';
                        container.appendChild(form);
                    } else {
                        // Tampilkan pesan error di dalam modal biar ketahuan
                        container.innerHTML = '<div class="p-6 bg-red-50 text-red-600 rounded-xl border border-red-200"><p class="font-bold">Gagal Memuat Formulir</p><p class="text-sm mt-2">Form edit tidak ditemukan di halaman tersebut. Pastikan file <code>edit.blade.php</code> memiliki tag <code>&lt;form&gt;</code>.</p></div>';
                    }
                })
                .catch(err => {
                    console.error("Fetch Error:", err);
                    container.innerHTML = '<div class="p-6 bg-red-50 text-red-600 rounded-xl border border-red-200"><p class="font-bold">Error Sistem</p><p class="text-sm mt-2">' + err.message + '</p><p class="text-xs mt-2">Cek Console (F12) untuk detail.</p></div>';
                });
        };

        window.closeEditModal = function() {
            const modal = document.getElementById('editModal');
            const content = document.getElementById('editModalContent');
            modal.classList.add('opacity-0'); 
            content.classList.remove('scale-100'); 
            content.classList.add('scale-95');
            setTimeout(() => { modal.classList.add('hidden'); }, 300);
            document.getElementById('editFormContainer').innerHTML = '';
        };
        // 🌟 END LOGIKA EDIT MODAL 🌟

        // ... (Sisa script modal settings, user, hapus biarin sama persis) ...
        window.openSettingsModal = function() {
            const modal = document.getElementById('settingsModal');
            const content = document.getElementById('settingsModalContent');
            modal.classList.remove('hidden');
            setTimeout(() => { modal.classList.remove('opacity-0'); content.classList.remove('scale-95'); content.classList.add('scale-100'); }, 10);
        };
        window.closeSettingsModal = function() { 
            const modal = document.getElementById('settingsModal');
            const content = document.getElementById('settingsModalContent');
            modal.classList.add('opacity-0'); content.classList.remove('scale-100'); content.classList.add('scale-95');
            setTimeout(() => { modal.classList.add('hidden'); }, 300);
        };

        window.openUsersModal = function() {
            const modal = document.getElementById('usersModal');
            const content = document.getElementById('usersModalContent');
            modal.classList.remove('hidden');
            setTimeout(() => { modal.classList.remove('opacity-0'); content.classList.remove('scale-95'); content.classList.add('scale-100'); }, 10);
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
            modal.classList.add('opacity-0'); content.classList.remove('scale-100'); content.classList.add('scale-95');
            setTimeout(() => { modal.classList.add('hidden'); }, 300);
        };

        let actionToExecute = null;
        window.confirmDeleteUser = function(id) {
            document.getElementById('deleteModalTitle').innerText = translations[localStorage.getItem('language') || 'id'].kelola_pengguna;
            actionToExecute = function() {
                fetch(`/admin/pengguna/${id}`, { method: 'DELETE', headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' } })
                .then(() => { closeDeleteModal(); openUsersModal(); });
            };
            const modal = document.getElementById('deleteModal');
            const content = document.getElementById('deleteModalContent');
            modal.classList.remove('hidden');
            setTimeout(() => { modal.classList.remove('opacity-0'); content.classList.remove('scale-95'); content.classList.add('scale-100'); }, 10);
        };

        // Logika Hapus Budaya
        document.querySelectorAll('.btn-delete-budaya').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.dataset.id;
                document.getElementById('deleteModalTitle').innerText = translations[localStorage.getItem('language') || 'id'].hapus_budaya;
                document.getElementById('deleteModalText').innerText = translations[localStorage.getItem('language') || 'id'].peringatan_hapus;
                actionToExecute = function() {
                    document.getElementById(`delete-budaya-form-${id}`).submit();
                };
                const modal = document.getElementById('deleteModal');
                const content = document.getElementById('deleteModalContent');
                modal.classList.remove('hidden');
                setTimeout(() => { modal.classList.remove('opacity-0'); content.classList.remove('scale-95'); content.classList.add('scale-100'); }, 10);
            });
        });

        document.getElementById('confirmDeleteBtn').addEventListener('click', function() { if (typeof actionToExecute === 'function') { actionToExecute(); } });
        window.closeDeleteModal = function() { 
            const modal = document.getElementById('deleteModal');
            const content = document.getElementById('deleteModalContent');
            modal.classList.add('opacity-0'); content.classList.remove('scale-100'); content.classList.add('scale-95');
            setTimeout(() => { modal.classList.add('hidden'); }, 300); 
            actionToExecute = null;
        };
    });
</script>
@endsection