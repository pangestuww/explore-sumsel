@extends('layouts.app')

@section('title', 'Kelola Destinasi - Admin')

@section('content')

{{-- 🌟 CUSTOM CSS UNTUK SELECT2 & SCROLLBAR MODAL 🌟 --}}
<style>
    /* Styling Select2 */
    .select2-container--default .select2-selection--single {
        background-color: #f8fafc !important;
        border: 1px solid #cbd5e1 !important;
        border-radius: 0.75rem !important;
        height: 50px !important;
        display: flex !important;
        align-items: center !important;
        box-sizing: border-box !important;
        transition: all 0.2s !important;
    }

    .dark .select2-container--default .select2-selection--single {
        background-color: #1e293b !important;
        border-color: #334155 !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #0f172a !important;
        padding-left: 1rem !important;
        padding-right: 2.5rem !important;
        font-size: 0.875rem !important;
        line-height: normal !important;
        margin-top: 2px;
    }

    .dark .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #ffffff !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 100% !important;
        right: 12px !important;
        display: flex !important;
        align-items: center !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow b {
        border-color: #64748b transparent transparent transparent !important;
    }

    .dark .select2-container--default .select2-selection--single .select2-selection__arrow b {
        border-color: #94a3b8 transparent transparent transparent !important;
    }

    /* Fix Dropdown Select2 Biar Gak Ketutup Modal */
    .select2-dropdown {
        z-index: 9999 !important;
    }

    .select2-container--open {
        z-index: 9999 !important;
    }

    /* 🌟 SCROLLBAR MODAL (HIJAU & TANPA PANAH) 🌟 */
    .custom-modal-scroll::-webkit-scrollbar {
        width: 8px;
    }

    .custom-modal-scroll::-webkit-scrollbar-track {
        background: transparent;
        margin: 1.5rem 0;
        /* Memberi jarak atas bawah biar gak nabrak ujung modal */
    }

    .custom-modal-scroll::-webkit-scrollbar-thumb {
        background: linear-gradient(#22c55e, #15803d);
        /* Hijau sama kayak web utama */
        border-radius: 10px;
    }

    .dark .custom-modal-scroll::-webkit-scrollbar-thumb {
        background: linear-gradient(#10b981, #047857);
        border-radius: 10px;
    }

    /* Sembunyikan Tombol Panah Atas Bawah */
    .custom-modal-scroll::-webkit-scrollbar-button {
        display: none;
    }

    /* Untuk Firefox */
    .custom-modal-scroll {
        scrollbar-width: thin;
        scrollbar-color: #22c55e transparent;
    }

    .dark .custom-modal-scroll {
        scrollbar-color: #10b981 transparent;
    }
</style>

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

                <!-- 🌟 TOMBOL TAMBAH KONTEN (LANGSUNG BUKA POP-UP) 🌟 -->
                <button onclick="openCreateModal()" class="w-full flex items-center gap-3 px-3 py-2.5 bg-emerald-50 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-800/50 hover:bg-emerald-100 rounded-lg shadow-sm mb-4 transition-colors text-left">
                    <i class="fas fa-plus-circle text-sm w-5 text-center"></i>
                    <span class="font-bold text-sm" data-i18n="tambah_konten">Tambah Konten</span>
                </button>

                <div class="h-px bg-slate-200 dark:bg-slate-800 my-4"></div>

                <!-- Active Destinasi -->
                <a href="{{ route('admin.destinasi.index') }}" class="flex items-center gap-3 px-3 py-2.5 bg-emerald-600 text-white rounded-lg shadow-sm mb-3">
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
            <button onclick="openSettingsModal('general')" class="w-full flex items-center gap-3 px-3 py-2.5 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg text-left">
                <i class="fas fa-cog text-sm w-5 text-center"></i>
                <span class="font-medium text-sm" data-i18n="pengaturan">Pengaturan</span>
            </button>
            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-3 py-2.5 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/30 rounded-lg text-left transition-colors">
                    <i class="fas fa-sign-out-alt text-sm w-5 text-center"></i>
                    <span class="font-medium text-sm">Keluar</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- KONTEN KANAN -->
    <main class="flex-1 p-6 md:p-10 overflow-y-auto h-full">
        <div class="container mx-auto max-w-6xl">
            <div class="flex flex-col md:flex-row items-center justify-between mb-8 gap-4">
                <div>
                    <h1 class="text-3xl font-black text-slate-900 dark:text-white" data-i18n="kelola_destinasi">Kelola Destinasi</h1>
                    <p class="text-slate-500 dark:text-slate-400 mt-1" data-i18n="daftar_wisata">Daftar semua wisata alam di Explore Sumatera.</p>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('admin.dashboard') }}" class="bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 px-5 py-2.5 rounded-xl font-bold hover:bg-slate-300 dark:hover:bg-slate-700 transition">
                        <i class="fas fa-arrow-left mr-2"></i> <span data-i18n="kembali">Kembali</span>
                    </a>
                    <!-- Tombol Tambah Data Destinasi (Buka Pop-up) -->
                    <button onclick="openCreateModal()" class="bg-emerald-600 hover:bg-emerald-500 text-white px-5 py-2.5 rounded-xl font-bold transition shadow-lg shadow-emerald-600/30">
                        <i class="fas fa-plus mr-2"></i> <span data-i18n="tambah_destinasi">Tambah Data Destinasi</span>
                    </button>
                </div>
            </div>

            @if(session('success'))
            <div class="bg-emerald-100 border border-emerald-400 text-emerald-700 px-4 py-3 rounded-xl mb-6">
                {{ session('success') }}
            </div>
            @endif

            <!-- TABEL DESTINASI -->
            <div class="bg-white dark:bg-[#0f172a] rounded-2xl shadow-xl border border-slate-200 dark:border-slate-800 flex flex-col" style="height: calc(100vh - 250px);">
                <div class="overflow-auto flex-grow rounded-t-2xl">
                    <table class="w-full text-left border-collapse relative">
                        <thead class="bg-slate-50 dark:bg-slate-800/50 text-slate-500 dark:text-slate-400 text-xs uppercase tracking-wider font-bold sticky top-0 z-10 shadow-sm">
                            <tr>
                                <th class="px-6 py-4 border-b border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-[#0f172a]">No</th>
                                <th class="px-6 py-4 border-b border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-[#0f172a]">Gambar</th>
                                <th class="px-6 py-4 border-b border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-[#0f172a]">Nama Destinasi</th>
                                <th class="px-6 py-4 border-b border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-[#0f172a]">Kabupaten</th>
                                <th class="px-6 py-4 border-b border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-[#0f172a]">Kategori / Jenis</th>
                                <th class="px-6 py-4 border-b border-slate-200 dark:border-slate-800 text-center bg-slate-50 dark:bg-[#0f172a]">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                            @forelse($destinasis as $index => $item)
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition group">
                                <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-300">{{ $destinasis->firstItem() + $index }}</td>
                                <td class="px-6 py-4">
                                    <div class="overflow-hidden rounded-lg w-16 h-16 border border-slate-200 dark:border-slate-700">
                                        <img src="{{ str_starts_with($item->gambar, 'http') ? $item->gambar : asset('storage/'.$item->gambar) }}" alt="{{ $item->nama }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-bold text-slate-800 dark:text-white text-sm">{{ $item->nama }}</td>
                                <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-300">{{ $item->kabupaten->nama ?? '-' }}</td>
                                <td class="px-6 py-4">
                                    <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded-md bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400">{{ $item->kategori }}</span>
                                    <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded-md bg-slate-100 text-slate-700 dark:bg-slate-800 dark:text-slate-300 ml-1">{{ $item->jenis }}</span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button type="button" data-url="{{ route('admin.destinasi.edit', $item->id) }}" onclick="openEditModal(this.dataset.url)" class="w-8 h-8 rounded-lg bg-blue-50 dark:bg-blue-950/30 text-blue-600 dark:text-blue-400 flex items-center justify-center hover:bg-blue-100 hover:scale-110 transition-all" title="Edit">
                                            <i class="fas fa-edit text-sm"></i>
                                        </button>
                                        <button class="btn-delete-destinasi w-8 h-8 rounded-lg bg-red-50 dark:bg-red-950/30 text-red-600 dark:text-red-400 flex items-center justify-center hover:bg-red-100 hover:scale-110 transition-all" data-id="{{ $item->id }}" title="Hapus">
                                            <i class="fas fa-trash text-sm"></i>
                                        </button>
                                        <form id="delete-destinasi-form-{{ $item->id }}" action="{{ route('admin.destinasi.destroy', $item->id) }}" method="POST" class="hidden">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-6 py-10 text-center text-slate-500 dark:text-slate-400">Belum ada data destinasi.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="p-4 border-t border-slate-200 dark:border-slate-800 bg-white dark:bg-[#0f172a] rounded-b-2xl shrink-0">
                    {{ $destinasis->links() }}
                </div>
            </div>
        </div>
    </main>
</div>

<div id="app-data" data-user-id="{{ auth()->id() }}" data-api-url="{{ route('admin.pengguna.api') }}" data-csrf="{{ csrf_token() }}" style="display: none;"></div>

<!-- ========================================== -->
<!-- 🌟 MODAL TAMBAH DATA DESTINASI (POP-UP) 🌟 -->
<!-- ========================================== -->
<div id="createModal" class="fixed inset-0 z-[1000] hidden bg-slate-900/60 backdrop-blur-sm flex items-center justify-center opacity-0 transition-opacity duration-300 p-4">
    <!-- 🌟 TAMBAHKAN CLASS custom-modal-scroll DI SINI -->
    <div id="createModalContent" class="bg-white dark:bg-[#0f172a] rounded-3xl p-6 md:p-8 max-w-3xl w-full mx-4 shadow-2xl border border-slate-200 dark:border-slate-800 transform scale-95 transition-transform duration-300 max-h-[90vh] overflow-y-auto custom-modal-scroll relative">
        <div class="flex justify-between items-center mb-6 sticky top-0 bg-white dark:bg-[#0f172a] z-10 pb-4 border-b border-slate-200 dark:border-slate-800">
            <h3 class="text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2"><i class="fas fa-plus text-emerald-500"></i> Tambah Data Destinasi</h3>
            <button onclick="closeCreateModal()" type="button" class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-500 hover:bg-red-100 hover:text-red-600 transition"><i class="fas fa-times"></i></button>
        </div>

        <form action="{{ route('admin.destinasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Nama Destinasi</label>
                    <input type="text" name="nama" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Provinsi</label>
                    <select id="create_provinsi" class="w-full">
                        <option value="">-- Pilih Provinsi --</option>
                        @foreach($kabupatens->unique('provinsi_id') as $kab)
                        <option value="{{ $kab->provinsi_id }}">{{ $kab->provinsi->nama ?? 'Unknown' }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Kabupaten / Kota</label>
                    <select name="kabupaten_id" id="create_kabupaten" required class="w-full">
                        <option value="">-- Pilih Kabupaten --</option>
                        @foreach($kabupatens as $kab)
                        <option value="{{ $kab->id }}" data-provinsi="{{ $kab->provinsi_id }}">{{ $kab->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Kategori</label>
                    <select name="kategori" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        <option value="">-- Pilih Kategori --</option>
                        <option value="alam">Alam (Destinasi)</option>
                        <option value="budaya">Budaya</option>
                        <option value="kuliner">Kuliner</option>
                    </select>
                </div>

                {{-- 🌟 JENIS INPUT TEKS 🌟 --}}
                <div>
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Jenis</label>
                    <input type="text" name="jenis" required placeholder="Contoh: Pantai, Gunung, Tari, dll..." class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Harga Tiket (Angka)</label>
                    <input type="number" name="harga_tiket" value="0" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Upload Gambar</label>
                    <input type="file" name="gambar" accept="image/*" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 dark:file:bg-emerald-900/30 dark:file:text-emerald-400">
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Deskripsi</label>
                <textarea name="deskripsi" rows="4" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none"></textarea>
            </div>

            <div class="mb-8 p-4 bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 rounded-xl">
                <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2"><i class="fas fa-map-marked-alt text-emerald-500 mr-1"></i> Tentukan Lokasi</label>
                <div class="flex gap-2 mb-3">
                    <input type="text" id="create_searchLocation" placeholder="Ketik nama tempat..." class="flex-1 px-4 py-2.5 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-white focus:outline-none focus:border-emerald-500 text-sm">
                    <button type="button" id="create_btnSearchLocation" class="bg-emerald-600 hover:bg-emerald-500 text-white px-4 py-2.5 rounded-lg font-bold transition text-sm shadow-md"><i class="fas fa-search"></i> Cari</button>
                </div>
                <div id="createMapPicker" class="w-full h-[300px] rounded-lg border border-slate-300 dark:border-slate-600 z-0 relative"></div>
                <div class="mt-3 flex items-center justify-between bg-white dark:bg-slate-900 p-3 rounded-lg border border-slate-200 dark:border-slate-700">
                    <div class="flex items-center gap-4 text-sm font-bold text-slate-700 dark:text-slate-300">
                        <span>Lat: <span id="create_displayLat" class="text-emerald-600 dark:text-emerald-400">Belum dipilih</span></span>
                        <span>Lng: <span id="create_displayLng" class="text-emerald-600 dark:text-emerald-400">Belum dipilih</span></span>
                    </div>
                </div>
                <input type="hidden" name="latitude" id="create_inputLat">
                <input type="hidden" name="longitude" id="create_inputLng">
            </div>

            <div class="flex justify-end gap-4 pt-4 border-t border-slate-200 dark:border-slate-800">
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-500 text-white font-bold px-8 py-3 rounded-xl transition-all shadow-lg shadow-emerald-600/30"><i class="fas fa-save mr-2"></i> Simpan Destinasi</button>
            </div>
        </form>
    </div>
</div>

<!-- ========================================== -->
<!-- 🌟 MODAL EDIT DESTINASI 🌟 -->
<!-- ========================================== -->
<div id="editModal" class="fixed inset-0 z-[1000] hidden bg-slate-900/60 backdrop-blur-sm flex items-center justify-center opacity-0 transition-opacity duration-300 p-4">
    <!-- 🌟 TAMBAHKAN CLASS custom-modal-scroll DI SINI JUGA -->
    <div id="editModalContent" class="bg-white dark:bg-[#0f172a] rounded-3xl p-6 md:p-8 max-w-3xl w-full mx-4 shadow-2xl border border-slate-200 dark:border-slate-800 transform scale-95 transition-transform duration-300 max-h-[90vh] overflow-y-auto custom-modal-scroll relative">
        <div class="flex justify-between items-center mb-6 sticky top-0 bg-white dark:bg-[#0f172a] z-10 pb-4 border-b border-slate-200 dark:border-slate-800">
            <h3 class="text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2"><i class="fas fa-edit text-emerald-500"></i> Edit Data Destinasi</h3>
            <button onclick="closeEditModal()" type="button" class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-500 hover:bg-red-100 hover:text-red-600 transition"><i class="fas fa-times"></i></button>
        </div>
        <div id="editFormContainer" class="text-slate-800 dark:text-white"></div>
    </div>
</div>

<!-- MODAL PENGATURAN -->
<div id="settingsModal" class="fixed inset-0 z-[999] hidden bg-slate-900/60 backdrop-blur-md flex items-center justify-center opacity-0 transition-opacity duration-300 p-4">
    <div id="settingsModalContent" class="bg-white dark:bg-[#0f172a] rounded-2xl w-full max-w-lg shadow-2xl border border-slate-200 dark:border-slate-800 transform scale-95 transition-transform duration-300 overflow-hidden flex flex-col">
        <div class="flex justify-between items-center p-6 border-b border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-800/30">
            <h3 class="text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2"><i class="fas fa-cog text-emerald-500"></i> <span data-i18n="settings">Pengaturan</span></h3>
            <button onclick="closeSettingsModal()" class="w-8 h-8 rounded-full bg-white dark:bg-slate-800 flex items-center justify-center text-slate-500 hover:bg-red-100 hover:text-red-600 transition"><i class="fas fa-times"></i></button>
        </div>
        <div class="p-6 md:p-8 overflow-y-auto">
            <h4 class="text-lg font-bold text-slate-900 dark:text-white mb-4" data-i18n="tema_tampilan">Tema Tampilan</h4>
            <div class="grid grid-cols-3 gap-4 mb-8">
                <button onclick="setTheme('light')" id="btn-theme-light" class="flex flex-col items-center justify-center py-4 rounded-xl border-2 border-transparent bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700 transition-all group focus:outline-none">
                    <i class="fas fa-sun text-slate-400 group-hover:text-amber-500 text-2xl mb-3 transition-colors"></i><span class="text-sm font-semibold text-slate-500 dark:text-slate-400 group-hover:text-slate-900 dark:group-hover:text-white" data-i18n="light">Light</span>
                </button>
                <button onclick="setTheme('dark')" id="btn-theme-dark" class="flex flex-col items-center justify-center py-4 rounded-xl border-2 border-transparent bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700 transition-all group focus:outline-none">
                    <i class="fas fa-moon text-slate-400 group-hover:text-indigo-400 text-2xl mb-3 transition-colors"></i><span class="text-sm font-semibold text-slate-500 dark:text-slate-400 group-hover:text-slate-900 dark:group-hover:text-white" data-i18n="dark">Dark</span>
                </button>
                <button onclick="setTheme('system')" id="btn-theme-system" class="flex flex-col items-center justify-center py-4 rounded-xl border-2 border-transparent bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700 transition-all group focus:outline-none">
                    <i class="fas fa-desktop text-slate-400 group-hover:text-emerald-500 text-2xl mb-3 transition-colors"></i><span class="text-sm font-semibold text-slate-500 dark:text-slate-400 group-hover:text-slate-900 dark:group-hover:text-white" data-i18n="system">System</span>
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
        <h3 id="deleteModalTitle" class="text-xl font-bold text-center mb-2" data-i18n="hapus_destinasi">Hapus Destinasi?</h3>
        <p id="deleteModalText" class="text-center text-slate-500 text-sm mb-6" data-i18n="peringatan_hapus">Data ini akan dihapus permanen.</p>
        <div class="flex gap-3">
            <button type="button" onclick="closeDeleteModal()" class="flex-1 px-4 py-2.5 rounded-xl font-bold bg-slate-100 dark:bg-slate-800 transition" data-i18n="batal">Batal</button>
            <button type="button" id="confirmDeleteBtn" class="flex-1 px-4 py-2.5 rounded-xl font-bold text-white bg-red-600 shadow-lg transition" data-i18n="ya_hapus">Ya, Hapus</button>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    // 🌟 KAMUS BAHASA
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
            kelola_destinasi: "Kelola Destinasi",
            daftar_wisata: "Daftar semua wisata alam di Explore Sumatera.",
            kembali: "Kembali",
            tambah_destinasi: "Tambah Data Destinasi",
            settings: "Settings",
            tema_tampilan: "Tema Tampilan",
            light: "Light",
            dark: "Dark",
            system: "System",
            pengaturan_lainnya: "Pengaturan Lainnya",
            bahasa: "Bahasa",
            pilih_bahasa: "Pilih bahasa antarmuka.",
            kelola_pengguna: "Kelola Pengguna",
            nama: "Nama",
            aksi: "Aksi",
            tutup: "Tutup",
            hapus_destinasi: "Hapus Destinasi?",
            peringatan_hapus: "Data destinasi ini akan dihapus permanen.",
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
            kelola_destinasi: "Manage Destinations",
            daftar_wisata: "List of all natural attractions in Explore Sumatera.",
            kembali: "Back",
            tambah_destinasi: "Add Destination Data",
            settings: "Settings",
            tema_tampilan: "Appearance Theme",
            light: "Light",
            dark: "Dark",
            system: "System",
            pengaturan_lainnya: "Other Settings",
            bahasa: "Language",
            pilih_bahasa: "Select interface language.",
            kelola_pengguna: "Manage Users",
            nama: "Name",
            aksi: "Action",
            tutup: "Close",
            hapus_destinasi: "Delete Destination?",
            peringatan_hapus: "This destination data will be permanently deleted.",
            batal: "Cancel",
            ya_hapus: "Yes, Delete"
        }
    };

    window.changeLanguage = function(lang) {
        localStorage.setItem('language', lang);
        document.querySelectorAll('[data-i18n]').forEach(el => {
            const key = el.getAttribute('data-i18n');
            if (translations[lang] && translations[lang][key]) el.innerText = translations[lang][key];
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
        // 🌟 LOGIKA MODAL TAMBAH DESTINASI 🌟
        // ==========================================
        var createMap = null;
        var createMarker = null;

        window.openCreateModal = function() {
            const modal = document.getElementById('createModal');
            const content = document.getElementById('createModalContent');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                content.classList.remove('scale-95');
                content.classList.add('scale-100');

                // Init Select2
                $('#create_provinsi').select2({
                    placeholder: "-- Pilih Provinsi --",
                    width: '100%',
                    dropdownParent: $('#createModal')
                });
                $('#create_kabupaten').select2({
                    placeholder: "-- Pilih Kabupaten --",
                    width: '100%',
                    dropdownParent: $('#createModal')
                });

                // Init Map
                if (!createMap) {
                    createMap = L.map('createMapPicker').setView([-2.99, 104.75], 11);
                    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '© OpenStreetMap contributors'
                    }).addTo(createMap);
                    createMarker = L.marker([-2.99, 104.75], {
                        draggable: true
                    }).addTo(createMap);

                    createMarker.on('dragend', function(e) {
                        var position = createMarker.getLatLng();
                        document.getElementById('create_inputLat').value = position.lat.toFixed(6);
                        document.getElementById('create_inputLng').value = position.lng.toFixed(6);
                        document.getElementById('create_displayLat').innerText = position.lat.toFixed(6);
                        document.getElementById('create_displayLng').innerText = position.lng.toFixed(6);
                    });

                    createMap.on('click', function(e) {
                        var lat = e.latlng.lat;
                        var lng = e.latlng.lng;
                        createMarker.setLatLng([lat, lng]);
                        document.getElementById('create_inputLat').value = lat.toFixed(6);
                        document.getElementById('create_inputLng').value = lng.toFixed(6);
                        document.getElementById('create_displayLat').innerText = lat.toFixed(6);
                        document.getElementById('create_displayLng').innerText = lng.toFixed(6);
                    });
                }
                createMap.invalidateSize();

            }, 10);
        };

        window.closeCreateModal = function() {
            const modal = document.getElementById('createModal');
            const content = document.getElementById('createModalContent');
            modal.classList.add('opacity-0');
            content.classList.remove('scale-100');
            content.classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        };

        // Logika Filter Kabupaten (Tambah)
        var allKabOptionsCreate = Array.from(document.querySelectorAll('#create_kabupaten option[data-provinsi]'));
        $('#create_provinsi').on('change', function() {
            var selectedProv = $(this).val();
            $('#create_kabupaten').select2('destroy');
            document.getElementById('create_kabupaten').innerHTML = '<option value="">-- Pilih Kabupaten --</option>';

            if (selectedProv !== '') {
                allKabOptionsCreate.forEach(function(opt) {
                    if (opt.getAttribute('data-provinsi') === selectedProv) {
                        document.getElementById('create_kabupaten').appendChild(opt.cloneNode(true));
                    }
                });
            }
            $('#create_kabupaten').select2({
                placeholder: "-- Pilih Kabupaten --",
                width: '100%',
                dropdownParent: $('#createModal')
            });
        });

        // ==========================================
        // 🌟 LOGIKA MODAL EDIT DESTINASI 🌟
        // ==========================================
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
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const form = doc.querySelector('form[enctype="multipart/form-data"]') || doc.querySelector('form[action*="update"]');
                    if (form) {
                        container.innerHTML = '';
                        container.appendChild(form);
                    } else {
                        container.innerHTML = '<p class="text-red-500 text-center py-4">Gagal memuat formulir.</p>';
                    }
                }).catch(err => {
                    container.innerHTML = '<p class="text-red-500 text-center py-4">Terjadi kesalahan sistem.</p>';
                });
        };

        window.closeEditModal = function() {
            const modal = document.getElementById('editModal');
            const content = document.getElementById('editModalContent');
            modal.classList.add('opacity-0');
            content.classList.remove('scale-100');
            content.classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
            document.getElementById('editFormContainer').innerHTML = '';
        };

        // ... (Sisa script modal settings, user, hapus biarin sama persis) ...
        window.openSettingsModal = function() {
            /* ... */ };
        window.closeSettingsModal = function() {
            /* ... */ };
        window.openUsersModal = function() {
            /* ... */ };
        window.closeUsersModal = function() {
            /* ... */ };
        let actionToExecute = null;
        window.confirmDeleteUser = function(id) {
            /* ... */ };
        document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
            if (typeof actionToExecute === 'function') {
                actionToExecute();
            }
        });
        window.closeDeleteModal = function() {
            /* ... */ };

        // Logika Hapus Destinasi
        document.querySelectorAll('.btn-delete-destinasi').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.dataset.id;
                document.getElementById('deleteModalTitle').innerText = translations[localStorage.getItem('language') || 'id'].hapus_destinasi;
                document.getElementById('deleteModalText').innerText = translations[localStorage.getItem('language') || 'id'].peringatan_hapus;
                actionToExecute = function() {
                    document.getElementById(`delete-destinasi-form-${id}`).submit();
                };
                const modal = document.getElementById('deleteModal');
                const content = document.getElementById('deleteModalContent');
                modal.classList.remove('hidden');
                setTimeout(() => {
                    modal.classList.remove('opacity-0');
                    content.classList.remove('scale-95');
                    content.classList.add('scale-100');
                }, 10);
            });
        });
    });
</script>
@endsection