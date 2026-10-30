@extends('layouts.app')

@section('title', 'Manage Destinations - Admin')

@section('content')

{{-- 🌟 CUSTOM CSS UNTUK SELECT2 & SCROLLBAR MODAL 🌟 --}}
<style>
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
        background-color: #11211d !important;
        border-color: #1a2e29 !important;
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

    .select2-dropdown {
        z-index: 9999 !important;
    }

    .select2-container--open {
        z-index: 9999 !important;
    }

    .select2-dropdown {
        background-color: white !important;
        border: 1px solid #cbd5e1 !important;
        border-radius: 0.75rem !important;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1) !important;
        overflow: hidden;
    }

    .dark .select2-dropdown {
        background-color: #0f1a18 !important;
        border-color: #1a2e29 !important;
    }

    .select2-search--dropdown {
        background-color: transparent !important;
        padding: 8px !important;
    }

    .select2-search--dropdown .select2-search__field {
        background-color: #f8fafc !important;
        border: 1px solid #cbd5e1 !important;
        border-radius: 0.5rem !important;
        color: #0f172a !important;
        padding: 8px 12px !important;
        outline: none !important;
        box-sizing: border-box;
    }

    .dark .select2-search--dropdown .select2-search__field {
        background-color: #11211d !important;
        border-color: #1a2e29 !important;
        color: #f8fafc !important;
    }

    .select2-results__options {
        background-color: white !important;
    }

    .dark .select2-results__options {
        background-color: #0f1a18 !important;
    }

    .select2-container--default .select2-results__option {
        padding: 10px 16px !important;
        font-size: 0.875rem !important;
        color: #0f172a !important;
    }

    .dark .select2-container--default .select2-results__option {
        color: #e2e8f0 !important;
    }

    .select2-container--default .select2-results__option--highlighted.select2-results__option--selectable {
        background-color: #10b981 !important;
        color: white !important;
    }

    .select2-container--default .select2-results__option--selected {
        background-color: #ecfdf5 !important;
        color: #047857 !important;
    }

    .dark .select2-container--default .select2-results__option--selected {
        background-color: rgba(16, 185, 129, 0.2) !important;
        color: #34d399 !important;
    }

    .custom-modal-scroll::-webkit-scrollbar {
        width: 8px;
    }

    .custom-modal-scroll::-webkit-scrollbar-track {
        background: transparent;
        margin: 1.5rem 0;
    }

    .custom-modal-scroll::-webkit-scrollbar-thumb {
        background: linear-gradient(#22c55e, #15803d);
        border-radius: 10px;
    }

    .dark .custom-modal-scroll::-webkit-scrollbar-thumb {
        background: linear-gradient(#10b981, #047857);
        border-radius: 10px;
    }
</style>

<!-- OVERLAY MOBILE SIDEBAR -->
<div id="adminSidebarOverlay" onclick="toggleAdminSidebar()" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-[90] hidden md:hidden transition-opacity"></div>

<div class="flex flex-col md:flex-row h-[calc(100vh-80px)] overflow-hidden bg-slate-50 dark:bg-[#091413] text-slate-800 dark:text-white transition-colors duration-300 relative">

    <!-- SIDEBAR KIRI (Off-Canvas di Mobile) -->
    <aside id="adminSidebar" class="fixed md:relative inset-y-0 left-0 z-[100] w-64 h-full bg-white dark:bg-[#0f1a18] border-r border-slate-200 dark:border-[#1a2e29] flex flex-col shrink-0 transition-transform duration-300 transform -translate-x-full md:translate-x-0">

        <div class="p-6 border-b border-slate-200 dark:border-[#1a2e29] shrink-0 flex justify-between items-center">
            <div>
                <h2 class="font-bold text-lg text-slate-900 dark:text-white transition-colors" data-i18n="menu_admin">Admin Menu</h2>
                <p class="text-xs text-slate-500 dark:text-slate-400" data-i18n="kelola_konten">Manage Content</p>
            </div>
            <!-- Tombol Close Sidebar (Mobile) -->
            <button onclick="toggleAdminSidebar()" class="md:hidden text-slate-500 hover:text-red-500">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <div class="flex-1 overflow-y-auto py-6 px-4">
            <p class="text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-4 px-2" data-i18n="utama">Main</p>
            <nav class="space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-[#11211d] rounded-lg">
                    <i class="fas fa-th-large text-sm w-5 text-center"></i>
                    <span class="font-medium text-sm" data-i18n="dashboard">Dashboard</span>
                </a>

                <div class="h-px bg-slate-200 dark:bg-[#1a2e29] my-4"></div>

                <a href="{{ route('admin.destinasi.index') }}" class="flex items-center gap-3 px-3 py-2.5 bg-emerald-600 text-white rounded-lg shadow-sm mb-3">
                    <i class="fas fa-map-marker-alt text-sm w-5 text-center"></i>
                    <span class="font-medium text-sm" data-i18n="destinasi">Destinations</span>
                </a>
                <a href="{{ route('admin.budaya.index') }}" class="flex items-center gap-3 px-3 py-2.5 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-[#11211d] rounded-lg">
                    <i class="fas fa-masks-theater text-sm w-5 text-center"></i>
                    <span class="font-medium text-sm" data-i18n="budaya">Culture</span>
                </a>
                <a href="{{ route('admin.kuliner.index') }}" class="flex items-center gap-3 px-3 py-2.5 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-[#11211d] rounded-lg">
                    <i class="fas fa-utensils text-sm w-5 text-center"></i>
                    <span class="font-medium text-sm" data-i18n="kuliner">Culinary</span>
                </a>
                <button onclick="openUsersModal()" class="w-full flex items-center gap-3 px-3 py-2.5 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-[#11211d] rounded-lg text-left">
                    <i class="fas fa-users text-sm w-5 text-center"></i>
                    <span class="font-medium text-sm" data-i18n="pengguna">Users</span>
                </button>
            </nav>
        </div>

        <div class="p-4 border-t border-slate-200 dark:border-[#1a2e29] space-y-1 shrink-0">
            <button onclick="openSettingsModal()" class="w-full flex items-center gap-3 px-3 py-2.5 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-[#11211d] rounded-lg text-left">
                <i class="fas fa-cog text-sm w-5 text-center"></i>
                <span class="font-medium text-sm" data-i18n="pengaturan">Settings</span>
            </button>
            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-3 py-2.5 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/30 rounded-lg text-left transition-colors">
                    <i class="fas fa-sign-out-alt text-sm w-5 text-center"></i>
                    <span class="font-medium text-sm" data-i18n="keluar">Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- KONTEN KANAN -->
    <main class="flex-1 p-4 md:p-10 overflow-y-auto h-full">

        <!-- TOMBOL HAMBURGER KHUSUS ADMIN (Hanya muncul di HP) -->
        <div class="md:hidden flex items-center gap-3 mb-6">
            <button onclick="toggleAdminSidebar()" class="w-10 h-10 rounded-xl bg-white dark:bg-[#0f1a18] border border-slate-200 dark:border-[#1a2e29] flex items-center justify-center text-slate-900 dark:text-white shadow-sm">
                <i class="fas fa-bars text-lg"></i>
            </button>
            <h1 class="text-xl font-bold text-slate-900 dark:text-white">Menu Admin</h1>
        </div>

        <div class="container mx-auto max-w-6xl">
            <div class="flex flex-col md:flex-row items-center justify-between mb-8 gap-4">
                <div>
                    <h1 class="text-3xl font-black text-slate-900 dark:text-white" data-i18n="kelola_destinasi">Manage Destinations</h1>
                    <p class="text-slate-500 dark:text-slate-400 mt-1" data-i18n="daftar_destinasi">List of all natural attractions in Explore Sumatera.</p>
                </div>
                <div class="flex gap-3 w-full md:w-auto">
                    <a href="{{ route('admin.dashboard') }}" class="bg-slate-200 dark:bg-[#11211d] text-slate-700 dark:text-slate-300 px-5 py-2.5 rounded-xl font-bold hover:bg-slate-300 dark:hover:bg-[#1a2e29] transition flex-1 md:flex-none text-center">
                        <i class="fas fa-arrow-left mr-2"></i> <span data-i18n="kembali">Back</span>
                    </a>
                    <button onclick="openCreateModal()" class="bg-emerald-600 hover:bg-emerald-500 text-white px-5 py-2.5 rounded-xl font-bold transition shadow-lg shadow-emerald-600/30 flex-1 md:flex-none text-center">
                        <i class="fas fa-plus mr-2"></i> <span data-i18n="tambah_destinasi">Add Destination Data</span>
                    </button>
                </div>
            </div>

            @if(session('success'))
            <div class="bg-emerald-100 border border-emerald-400 text-emerald-700 px-4 py-3 rounded-xl mb-6">
                {{ session('success') }}
            </div>
            @endif

            <!-- 🌟 TABEL DESTINASI (SCROLLBAR FIX) 🌟 -->
            <div class="bg-white dark:bg-[#0f1a18] rounded-2xl shadow-xl border border-slate-200 dark:border-[#1a2e29] flex flex-col flex-1 mb-6">
                <div class="overflow-x-auto rounded-t-2xl custom-modal-scroll">
                    <table class="w-full text-left border-collapse relative min-w-[700px]">
                        <thead class="bg-slate-50 dark:bg-[#11211d] text-slate-500 dark:text-slate-400 text-xs uppercase tracking-wider font-bold sticky top-0 z-10 shadow-sm">
                            <tr>
                                <th class="px-6 py-4 border-b border-slate-200 dark:border-[#1a2e29]">No</th>
                                <th class="px-6 py-4 border-b border-slate-200 dark:border-[#1a2e29]">Image</th>
                                <th class="px-6 py-4 border-b border-slate-200 dark:border-[#1a2e29]">Destination Name</th>
                                <th class="px-6 py-4 border-b border-slate-200 dark:border-[#1a2e29]">Regency</th>
                                <th class="px-6 py-4 border-b border-slate-200 dark:border-[#1a2e29]">Category / Type</th>
                                <th class="px-6 py-4 border-b border-slate-200 dark:border-[#1a2e29] text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-[#1a2e29]">
                            @forelse($destinasis as $index => $item)
                            <tr class="hover:bg-slate-50 dark:hover:bg-[#11211d] transition group">
                                <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-300">{{ $destinasis->firstItem() + $index }}</td>
                                <td class="px-6 py-4">
                                    <div class="overflow-hidden rounded-lg w-16 h-16 border border-slate-200 dark:border-[#1a2e29]">
                                        <img src="{{ str_starts_with($item->gambar, 'http') ? $item->gambar : asset('storage/'.$item->gambar) }}" alt="{{ $item->nama }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-bold text-slate-800 dark:text-white text-sm">{{ $item->nama }}</td>
                                <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-300">{{ $item->kabupaten->nama ?? '-' }}</td>
                                <td class="px-6 py-4">
                                    <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded-md bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400">{{ $item->kategori }}</span>
                                    <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded-md bg-slate-100 text-slate-700 dark:bg-[#1a2e29] dark:text-slate-300 ml-1">{{ $item->jenis }}</span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button type="button" data-url="{{ route('admin.destinasi.edit', $item->id) }}" onclick="openEditModal(this.dataset.url)" class="w-8 h-8 rounded-lg bg-blue-50 dark:bg-blue-950/30 text-blue-600 dark:text-blue-400 flex items-center justify-center hover:bg-blue-100 dark:hover:bg-blue-900/50 hover:scale-110 transition-all" title="Edit">
                                            <i class="fas fa-edit text-sm"></i>
                                        </button>
                                        <button class="btn-delete-destinasi w-8 h-8 rounded-lg bg-red-50 dark:bg-red-950/30 text-red-600 dark:text-red-400 flex items-center justify-center hover:bg-red-100 dark:hover:bg-red-900/50 hover:scale-110 transition-all" data-id="{{ $item->id }}" title="Delete">
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
                                <td colspan="6" class="px-6 py-10 text-center text-slate-500 dark:text-slate-400">No destination data yet.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="p-4 border-t border-slate-200 dark:border-[#1a2e29] bg-white dark:bg-[#0f1a18] rounded-b-2xl shrink-0">
                    {{ $destinasis->links() }}
                </div>
            </div>
        </div>
    </main>
</div>

<!-- ========================================== -->
<!-- 🌟 MODAL TAMBAH DATA DESTINASI 🌟 -->
<!-- ========================================== -->
<div id="createModal" class="fixed inset-0 z-[1000] hidden bg-slate-900/60 backdrop-blur-sm flex items-center justify-center opacity-0 transition-opacity duration-300 p-4">
    <div id="createModalContent" class="bg-white dark:bg-[#0f1a18] rounded-3xl w-full max-w-3xl shadow-2xl border border-slate-200 dark:border-[#1a2e29] transform scale-95 transition-transform duration-300 flex flex-col max-h-[90vh]">

        <!-- Header Modal (Fixed) -->
        <div class="flex justify-between items-center px-6 py-5 border-b border-slate-200 dark:border-[#1a2e29] shrink-0">
            <h3 class="text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2"><i class="fas fa-plus text-emerald-500"></i> Add Destination Data</h3>
            <button onclick="closeCreateModal()" type="button" class="w-8 h-8 rounded-full bg-slate-100 dark:bg-[#11211d] flex items-center justify-center text-slate-500 hover:bg-red-100 hover:text-red-600 transition"><i class="fas fa-times"></i></button>
        </div>

        <!-- Body Modal (Scrollable) -->
        <div class="p-6 overflow-y-auto custom-modal-scroll flex-1">
            <form action="{{ route('admin.destinasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Destination Name</label>
                        <input type="text" name="nama" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-[#1a2e29] bg-slate-50 dark:bg-[#11211d] text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Province</label>
                        <select id="create_provinsi" class="w-full">
                            <option value="">-- Select Province --</option>
                            @foreach($kabupatens->unique('provinsi_id') as $kab)
                            <option value="{{ $kab->provinsi_id }}">{{ $kab->provinsi->nama ?? 'Unknown' }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Regency / City</label>
                        <select name="kabupaten_id" id="create_kabupaten" required class="w-full">
                            <option value="">-- Select Regency --</option>
                            @foreach($kabupatens as $kab)
                            <option value="{{ $kab->id }}" data-provinsi="{{ $kab->provinsi_id }}">{{ $kab->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Category</label>
                        <select name="kategori" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-[#1a2e29] bg-slate-50 dark:bg-[#11211d] text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            <option value="">-- Select Category --</option>
                            <option value="alam">Nature (Destination)</option>
                            <option value="budaya">Culture</option>
                            <option value="kuliner">Culinary</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Type</label>
                        <input type="text" name="jenis" required placeholder="Example: Beach, Mountain, Dance, etc..." class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-[#1a2e29] bg-slate-50 dark:bg-[#11211d] text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Ticket Price (Number)</label>
                        <input type="number" name="harga_tiket" value="0" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-[#1a2e29] bg-slate-50 dark:bg-[#11211d] text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>

                    {{-- 🌟 TAMBAHAN JAM BUKA & WAKTU TERBAIK 🌟 --}}
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Jam Buka</label>
                        <input type="text" name="jam_buka" placeholder="Contoh: 08.00 - 17.00 WIB" class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-[#1a2e29] bg-slate-50 dark:bg-[#11211d] text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Terbaik Dikunjungi</label>
                        <input type="text" name="waktu_terbaik" placeholder="Contoh: Pagi / Sore" class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-[#1a2e29] bg-slate-50 dark:bg-[#11211d] text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Upload Image</label>
                        <input type="file" name="gambar" accept="image/*" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-[#1a2e29] bg-slate-50 dark:bg-[#11211d] text-slate-900 dark:text-white focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 dark:file:bg-emerald-900/30 dark:file:text-emerald-400">
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Deskripsi Atas</label>
                    <textarea name="deskripsi" rows="4" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-[#1a2e29] bg-slate-50 dark:bg-[#11211d] text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none"></textarea>
                </div>

                {{-- 🌟 TAMBAHAN DESKRIPSI BAWAH 🌟 --}}
                <div class="mb-6">
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Deskripsi Bawah (Opsional)</label>
                    <textarea name="deskripsi_bawah" rows="4" placeholder="Masukkan deskripsi tambahan bagian bawah..." class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-[#1a2e29] bg-slate-50 dark:bg-[#11211d] text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none"></textarea>
                </div>

                {{-- 🌟 LINK GOOGLE MAPS 🌟 --}}
                <div class="mb-6">
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Link Google Maps (Opsional)</label>
                    <input type="text" name="link_maps" placeholder="Contoh: https://maps.app.goo.gl/..." class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-[#1a2e29] bg-slate-50 dark:bg-[#11211d] text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div class="mb-4 p-4 bg-slate-50 dark:bg-[#11211d] border border-slate-200 dark:border-[#1a2e29] rounded-xl">
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2"><i class="fas fa-map-marked-alt text-emerald-500 mr-1"></i> Determine Location</label>
                    <div class="flex gap-2 mb-3">
                        <input type="text" id="create_searchLocation" placeholder="Type a place name..." class="flex-1 px-4 py-2.5 rounded-lg border border-slate-300 dark:border-[#1a2e29] bg-white dark:bg-[#0f1a18] text-slate-900 dark:text-white focus:outline-none focus:border-emerald-500 text-sm">
                        <button type="button" id="create_btnSearchLocation" class="bg-emerald-600 hover:bg-emerald-500 text-white px-4 py-2.5 rounded-lg font-bold transition text-sm shadow-md"><i class="fas fa-search"></i> Search</button>
                    </div>
                    <div id="createMapPicker" class="w-full h-[300px] rounded-lg border border-slate-300 dark:border-[#1a2e29] z-0 relative"></div>
                    <div class="mt-3 flex items-center justify-between bg-white dark:bg-[#0f1a18] p-3 rounded-lg border border-slate-200 dark:border-[#1a2e29]">
                        <div class="flex items-center gap-4 text-sm font-bold text-slate-700 dark:text-slate-300">
                            <span>Lat: <span id="create_displayLat" class="text-emerald-600 dark:text-emerald-400">Not selected</span></span>
                            <span>Lng: <span id="create_displayLng" class="text-emerald-600 dark:text-emerald-400">Not selected</span></span>
                        </div>
                    </div>
                    <input type="hidden" name="latitude" id="create_inputLat">
                    <input type="hidden" name="longitude" id="create_inputLng">
                </div>

                <div class="flex justify-end gap-4 pt-4 border-t border-slate-200 dark:border-[#1a2e29]">
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-500 text-white font-bold px-8 py-3 rounded-xl transition-all shadow-lg shadow-emerald-600/30"><i class="fas fa-save mr-2"></i> Save Destination</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ========================================== -->
<!-- 🌟 MODAL EDIT DESTINASI (FIXED & RAPI) 🌟 -->
<!-- ========================================== -->
<div id="editModal" class="fixed inset-0 z-[1000] hidden bg-slate-900/60 backdrop-blur-sm flex items-center justify-center opacity-0 transition-opacity duration-300 p-4">
    <div id="editModalContent" class="bg-white dark:bg-[#0f1a18] rounded-3xl w-full max-w-3xl shadow-2xl border border-slate-200 dark:border-[#1a2e29] transform scale-95 transition-transform duration-300 flex flex-col max-h-[90vh]">

        <!-- Header Modal (Fixed) -->
        <div class="flex justify-between items-center px-6 py-5 border-b border-slate-200 dark:border-[#1a2e29] shrink-0">
            <h3 class="text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2"><i class="fas fa-edit text-emerald-500"></i> Edit Destination Data</h3>
            <button onclick="closeEditModal()" type="button" class="w-8 h-8 rounded-full bg-slate-100 dark:bg-[#11211d] flex items-center justify-center text-slate-500 hover:bg-red-100 hover:text-red-600 transition"><i class="fas fa-times"></i></button>
        </div>

        <!-- Body Modal (Scrollable) -->
        <div id="editFormContainer" class="p-6 overflow-y-auto custom-modal-scroll flex-1 text-slate-800 dark:text-white">
            <!-- Form akan diinjeksi oleh JavaScript -->
        </div>
    </div>
</div>

<!-- ========================================== -->
<!-- MODAL PENGGUNA (USERS) -->
<!-- ========================================== -->
<div id="usersModal" class="fixed inset-0 z-[999] hidden bg-slate-900/80 backdrop-blur-sm flex items-center justify-center opacity-0 transition-opacity duration-300 p-4">
    <div id="usersModalContent" class="bg-white dark:bg-[#0f1a18] rounded-3xl p-6 md:p-8 max-w-3xl w-full mx-4 shadow-2xl border border-slate-200 dark:border-[#1a2e29] transform scale-95 transition-transform duration-300">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h3 class="text-xl font-bold flex items-center gap-2"><i class="fas fa-users text-emerald-500"></i> <span data-i18n="kelola_pengguna">Manage Users</span></h3>
            </div>
            <button onclick="closeUsersModal()" class="w-8 h-8 rounded-full bg-slate-100 dark:bg-[#11211d] flex items-center justify-center text-slate-500 hover:bg-slate-200 transition"><i class="fas fa-times"></i></button>
        </div>
        <div class="overflow-auto max-h-[60vh] rounded-xl border border-slate-200 dark:border-[#1a2e29] mb-6 custom-modal-scroll">
            <table class="w-full text-left border-collapse relative">
                <thead class="bg-slate-50 dark:bg-[#11211d] text-slate-500 dark:text-slate-400 text-xs uppercase font-bold sticky top-0 z-10">
                    <tr>
                        <th class="px-4 py-3 bg-slate-50 dark:bg-[#0f1a18] border-b border-slate-200 dark:border-[#1a2e29]" data-i18n="nama">Name</th>
                        <th class="px-4 py-3 bg-slate-50 dark:bg-[#0f1a18] border-b border-slate-200 dark:border-[#1a2e29]">Email</th>
                        <th class="px-4 py-3 bg-slate-50 dark:bg-[#0f1a18] border-b border-slate-200 dark:border-[#1a2e29]">Role</th>
                        <th class="px-4 py-3 bg-slate-50 dark:bg-[#0f1a18] border-b border-slate-200 dark:border-[#1a2e29] text-center" data-i18n="aksi">Action</th>
                    </tr>
                </thead>
                <tbody id="usersTableBody" class="divide-y divide-slate-100 dark:divide-[#1a2e29]">
                    <tr>
                        <td colspan="4" class="text-center py-6 text-slate-500">Loading users or no users found.</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="flex justify-end"><button type="button" onclick="closeUsersModal()" class="px-6 py-2.5 rounded-xl font-bold bg-slate-100 dark:bg-[#11211d] transition" data-i18n="tutup">Close</button></div>
    </div>
</div>

<!-- ========================================== -->
<!-- 🌟 MODAL PENGATURAN (SETTINGS) 🌟 -->
<!-- ========================================== -->
<div id="settingsModal" class="fixed inset-0 z-[999] hidden bg-slate-900/60 backdrop-blur-md flex items-center justify-center opacity-0 transition-opacity duration-300 p-4">
    <div id="settingsModalContent" class="bg-white dark:bg-[#0f1a18] rounded-2xl w-full max-w-4xl h-[600px] shadow-2xl border border-slate-200 dark:border-[#1a2e29] transform scale-95 transition-transform duration-300 overflow-hidden flex flex-col md:flex-row">

        <!-- Sidebar Kiri Modal Settings -->
        <div class="w-full md:w-64 bg-slate-50 dark:bg-[#091413] border-r border-slate-200 dark:border-[#1a2e29] p-6 flex flex-col">
            <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-6" data-i18n="pengaturan">Settings</h3>
            <div class="space-y-2 flex-1">
                <button onclick="switchSettingsTab('general')" id="tab-general" class="w-full flex items-center gap-3 px-4 py-3 bg-slate-200 dark:bg-[#11211d] text-slate-900 dark:text-white rounded-xl font-bold transition text-left">
                    <i class="fas fa-cog"></i> <span data-i18n="umum">General</span>
                </button>
                <button onclick="switchSettingsTab('profile')" id="tab-profile" class="w-full flex items-center gap-3 px-4 py-3 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-[#11211d] rounded-xl font-medium transition text-left">
                    <i class="fas fa-user"></i> <span data-i18n="profil">My Profile</span>
                </button>
                <button onclick="switchSettingsTab('data')" id="tab-data" class="w-full flex items-center gap-3 px-4 py-3 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-[#11211d] rounded-xl font-medium transition text-left">
                    <i class="fas fa-database"></i> <span data-i18n="data">Data</span>
                </button>
                <button onclick="switchSettingsTab('about')" id="tab-about" class="w-full flex items-center gap-3 px-4 py-3 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-[#11211d] rounded-xl font-medium transition text-left">
                    <i class="fas fa-info-circle"></i> <span data-i18n="tentang">About</span>
                </button>
            </div>
        </div>

        <!-- Konten Kanan Modal Settings -->
        <div class="flex-1 p-6 md:p-8 overflow-y-auto relative custom-modal-scroll">
            <button onclick="closeSettingsModal()" class="absolute top-6 right-6 w-8 h-8 rounded-full bg-slate-100 dark:bg-[#11211d] flex items-center justify-center text-slate-500 hover:bg-red-100 hover:text-red-600 transition"><i class="fas fa-times"></i></button>

            <!-- Tab: General -->
            <div id="content-general">
                <h4 class="text-lg font-bold text-slate-900 dark:text-white mb-6" data-i18n="tema_tampilan">Appearance Theme</h4>
                <div class="grid grid-cols-3 gap-4 mb-10">
                    <button onclick="setTheme('light')" id="btn-theme-light" class="flex flex-col items-center justify-center py-5 rounded-xl border-2 border-transparent bg-slate-50 dark:bg-[#11211d] hover:bg-slate-100 dark:hover:bg-[#1a2e29] transition-all focus:outline-none">
                        <i class="fas fa-sun text-slate-400 text-2xl mb-3 transition-colors"></i><span class="text-sm font-semibold text-slate-500 dark:text-slate-400">Light</span>
                    </button>
                    <button onclick="setTheme('dark')" id="btn-theme-dark" class="flex flex-col items-center justify-center py-5 rounded-xl border-2 border-transparent bg-slate-50 dark:bg-[#11211d] hover:bg-slate-100 dark:hover:bg-[#1a2e29] transition-all focus:outline-none">
                        <i class="fas fa-moon text-slate-400 text-2xl mb-3 transition-colors"></i><span class="text-sm font-semibold text-slate-500 dark:text-slate-400">Dark</span>
                    </button>
                    <button onclick="setTheme('system')" id="btn-theme-system" class="flex flex-col items-center justify-center py-5 rounded-xl border-2 border-transparent bg-slate-50 dark:bg-[#11211d] hover:bg-slate-100 dark:hover:bg-[#1a2e29] transition-all focus:outline-none">
                        <i class="fas fa-desktop text-slate-400 text-2xl mb-3 transition-colors"></i><span class="text-sm font-semibold text-slate-500 dark:text-slate-400">System</span>
                    </button>
                </div>

                <h4 class="text-lg font-bold text-slate-900 dark:text-white mb-4" data-i18n="pengaturan_lainnya">Other Settings</h4>
                <div class="p-5 rounded-xl border border-slate-200 dark:border-[#1a2e29] flex items-center justify-between">
                    <div>
                        <p class="font-bold text-sm text-slate-900 dark:text-white" data-i18n="bahasa">Language</p>
                        <p class="text-xs text-slate-500 mt-1" data-i18n="pilih_bahasa">Select interface language.</p>
                    </div>
                    <div class="flex bg-slate-200/50 dark:bg-[#11211d] rounded-xl p-1 shadow-inner border border-slate-200 dark:border-[#1a2e29] relative">
                        <div id="lang-slider" class="absolute top-1 bottom-1 w-[calc(50%-4px)] bg-white dark:bg-[#0f1a18] rounded-lg shadow-sm transition-all duration-300 ease-out z-0"></div>
                        <button onclick="changeLanguage('id')" id="btn-lang-id" class="relative z-10 px-5 py-2 text-sm font-bold text-slate-500 dark:text-slate-400 transition-colors flex items-center gap-2"><span class="text-base">🇮🇩</span> ID</button>
                        <button onclick="changeLanguage('en')" id="btn-lang-en" class="relative z-10 px-5 py-2 text-sm font-bold text-slate-500 dark:text-slate-400 transition-colors flex items-center gap-2"><span class="text-base">🇬🇧</span> EN</button>
                    </div>
                </div>
            </div>

            <!-- Tab: Profile -->
            <div id="content-profile" class="hidden">
                <h4 class="text-lg font-bold text-slate-900 dark:text-white mb-6">Profil Saya</h4>
                <form action="{{ route('admin.profile.update') ?? '#' }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-col md:flex-row gap-8">
                        <!-- Avatar Section -->
                        <div class="flex flex-col items-center shrink-0">
                            <div class="relative w-32 h-32">
                                <div class="w-full h-full rounded-full border-4 border-emerald-500 overflow-hidden bg-slate-100 dark:bg-[#11211d] flex items-center justify-center">
                                    @if(auth()->user()->avatar)
                                    <img src="{{ str_starts_with(auth()->user()->avatar, 'http') ? auth()->user()->avatar : asset('storage/' . auth()->user()->avatar) }}" alt="Profile" class="w-full h-full object-cover">
                                    @else
                                    <i class="fas fa-user text-5xl text-slate-300 dark:text-slate-600"></i>
                                    @endif
                                </div>
                                <label for="avatar-upload" class="absolute bottom-1 right-1 w-8 h-8 bg-emerald-500 rounded-full flex items-center justify-center cursor-pointer border-2 border-white dark:border-[#0f1a18] shadow-sm hover:bg-emerald-600 transition">
                                    <i class="fas fa-camera text-white text-xs"></i>
                                    <input type="file" id="avatar-upload" name="avatar" class="hidden" accept="image/*">
                                </label>
                            </div>
                            <p class="text-[10px] text-slate-500 mt-3 font-semibold">Maks 2MB (JPG, PNG)</p>
                        </div>

                        <!-- Form Fields -->
                        <div class="flex-1 space-y-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-2">Nama Lengkap</label>
                                <div class="relative">
                                    <i class="fas fa-user absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                    <input type="text" name="name" value="{{ auth()->user()->name ?? 'Administrator' }}" required class="w-full pl-11 pr-4 py-3 rounded-xl border border-slate-200 dark:border-[#1a2e29] bg-slate-50 dark:bg-[#11211d] text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none transition-all">
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-2">Alamat Email</label>
                                <div class="relative">
                                    <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                    <input type="email" name="email" value="{{ auth()->user()->email ?? 'admin@exploresumatera.id' }}" required class="w-full pl-11 pr-4 py-3 rounded-xl border border-slate-200 dark:border-[#1a2e29] bg-slate-50 dark:bg-[#11211d] text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none transition-all">
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-2">Ganti Password (Opsional)</label>
                                <div class="relative">
                                    <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                    <input type="password" name="password" id="input-password" placeholder="Biarkan kosong" class="w-full pl-11 pr-12 py-3 rounded-xl border border-slate-200 dark:border-[#1a2e29] bg-slate-50 dark:bg-[#11211d] text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none transition-all">
                                    <button type="button" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-emerald-500 transition-colors" onclick="togglePassword()">
                                        <i class="fas fa-eye" id="icon-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="pt-2">
                                <button type="submit" class="w-full px-8 py-3 bg-emerald-500 hover:bg-emerald-600 text-white font-bold rounded-xl shadow-lg shadow-emerald-500/30 transition-all flex items-center justify-center gap-2">
                                    <i class="fas fa-check-circle"></i> Simpan Perubahan
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Tab: Data Website -->
            <div id="content-data" class="hidden">
                <h4 class="text-lg font-bold text-slate-900 dark:text-white mb-6">Data Website</h4>
                <div class="border-2 border-dashed border-slate-200 dark:border-[#1a2e29] rounded-2xl p-10 flex flex-col items-center justify-center text-center bg-slate-50 dark:bg-[#11211d]">
                    <i class="fas fa-database text-5xl text-slate-300 dark:text-slate-600 mb-4"></i>
                    <p class="text-slate-500 dark:text-slate-400">Fitur Backup & Restore database akan tersedia di sini.</p>
                </div>
            </div>

            <!-- Tab: About -->
            <div id="content-about" class="hidden">
                <h4 class="text-lg font-bold text-slate-900 dark:text-white mb-6">Tentang Aplikasi</h4>
                <div class="border border-slate-200 dark:border-[#1a2e29] rounded-2xl p-10 flex flex-col items-center justify-center text-center bg-slate-50 dark:bg-[#11211d]">
                    <div class="w-20 h-20 bg-emerald-100 dark:bg-emerald-900/30 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-leaf text-4xl text-emerald-500"></i>
                    </div>
                    <h5 class="text-xl font-bold text-slate-900 dark:text-white mb-2">Explore Sumatera</h5>
                    <p class="text-sm font-semibold text-slate-500 dark:text-slate-400 mb-4">Versi 1.0.0</p>
                    <p class="text-sm text-slate-500 dark:text-slate-400 max-w-md">Aplikasi Sistem Informasi Pariwisata Sumatera. Dibuat untuk memenuhi tugas mata kuliah.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL KONFIRMASI HAPUS -->
<div id="deleteModal" class="fixed inset-0 z-[1000] hidden bg-slate-900/80 backdrop-blur-sm flex items-center justify-center opacity-0 transition-opacity duration-300 p-4">
    <div id="deleteModalContent" class="bg-white dark:bg-[#0f1a18] rounded-3xl p-6 md:p-8 max-w-sm w-full mx-4 shadow-2xl border border-slate-200 dark:border-[#1a2e29] transform scale-95 transition-transform duration-300">
        <div class="w-16 h-16 rounded-full bg-red-100 dark:bg-red-900/30 flex items-center justify-center mx-auto mb-4"><i class="fas fa-exclamation-triangle text-2xl text-red-600 dark:text-red-400"></i></div>
        <h3 class="text-xl font-bold text-center mb-2" id="deleteModalTitle" data-i18n="hapus_destinasi">Delete Destination?</h3>
        <p class="text-center text-slate-500 text-sm mb-6" id="deleteModalText" data-i18n="peringatan_hapus">This destination data will be permanently deleted.</p>
        <div class="flex gap-3">
            <button type="button" onclick="closeDeleteModal()" class="flex-1 px-4 py-2.5 rounded-xl font-bold bg-slate-100 dark:bg-[#11211d] transition" data-i18n="batal">Cancel</button>
            <button type="button" id="confirmDeleteBtn" class="flex-1 px-4 py-2.5 rounded-xl font-bold text-white bg-red-600 shadow-lg transition" data-i18n="ya_hapus">Yes, Delete</button>
        </div>
    </div>
</div>

<!-- 🌟 DIV TITIPAN DATA UNTUK JS 🌟 -->
<div id="app-data" data-user-id="{{ auth()->id() }}" data-api-url="{{ route('admin.pengguna.api') }}" data-csrf="{{ csrf_token() }}" style="display: none;"></div>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    // Script Buka Tutup Sidebar Admin (Mobile)
    function toggleAdminSidebar() {
        const sidebar = document.getElementById('adminSidebar');
        const overlay = document.getElementById('adminSidebarOverlay');

        if (sidebar.classList.contains('-translate-x-full')) {
            sidebar.classList.remove('-translate-x-full');
            sidebar.classList.add('translate-x-0');
            overlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        } else {
            sidebar.classList.add('-translate-x-full');
            sidebar.classList.remove('translate-x-0');
            overlay.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    }

    const translations = {
        id: {
            menu_admin: "Menu Admin",
            kelola_konten: "Kelola Konten",
            utama: "Utama",
            dashboard: "Dashboard",
            destinasi: "Destinasi",
            budaya: "Budaya",
            kuliner: "Kuliner",
            peta: "Peta",
            pengguna: "Pengguna",
            pengaturan: "Pengaturan",
            keluar: "Keluar",
            kelola_destinasi: "Kelola Destinasi",
            daftar_destinasi: "Daftar semua wisata alam di Explore Sumatera.",
            kembali: "Kembali",
            tambah_destinasi: "Tambah Data Destinasi",
            umum: "Umum",
            profil: "Profil Saya",
            data: "Data",
            tentang: "Tentang",
            tema_tampilan: "Tema Tampilan",
            pengaturan_lainnya: "Pengaturan Lainnya",
            bahasa: "Bahasa",
            pilih_bahasa: "Pilih bahasa antarmuka.",
            kelola_pengguna: "Kelola Pengguna",
            nama: "Nama",
            aksi: "Aksi",
            tutup: "Tutup",
            hapus_destinasi: "Hapus Destinasi?",
            peringatan_hapus: "Data destinasi ini akan dihapus permanen.",
            hapus_pengguna: "Hapus Pengguna?",
            peringatan_hapus_pengguna: "Akun pengguna ini akan dihapus permanen.",
            batal: "Batal",
            ya_hapus: "Ya, Hapus"
        },
        en: {
            menu_admin: "Admin Menu",
            kelola_konten: "Manage Content",
            utama: "Main",
            dashboard: "Dashboard",
            destinasi: "Destinations",
            budaya: "Culture",
            kuliner: "Culinary",
            peta: "Map",
            pengguna: "Users",
            pengaturan: "Settings",
            keluar: "Logout",
            kelola_destinasi: "Manage Destinations",
            daftar_destinasi: "List of all natural attractions in Explore Sumatera.",
            kembali: "Back",
            tambah_destinasi: "Add Destination Data",
            umum: "General",
            profil: "My Profile",
            data: "Data",
            tentang: "About",
            tema_tampilan: "Appearance Theme",
            pengaturan_lainnya: "Other Settings",
            bahasa: "Language",
            pilih_bahasa: "Select interface language.",
            kelola_pengguna: "Manage Users",
            nama: "Name",
            aksi: "Action",
            tutup: "Close",
            hapus_destinasi: "Delete Destination?",
            peringatan_hapus: "This destination data will be permanently deleted.",
            hapus_pengguna: "Delete User?",
            peringatan_hapus_pengguna: "This user account will be permanently deleted.",
            batal: "Cancel",
            ya_hapus: "Yes, Delete"
        }
    };

    document.addEventListener('DOMContentLoaded', function() {

        var appData = document.getElementById('app-data');
        var currentUserId = appData ? parseInt(appData.dataset.userId) : 0;
        var apiUrl = appData ? appData.dataset.apiUrl : '';
        var csrfToken = appData ? appData.dataset.csrf : '';

        window.togglePassword = function() {
            const input = document.getElementById('input-password');
            const icon = document.getElementById('icon-eye');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
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

        window.updateThemeUI = function(theme) {
            const btnLight = document.getElementById('btn-theme-light');
            const btnDark = document.getElementById('btn-theme-dark');
            const btnSystem = document.getElementById('btn-theme-system');

            [btnLight, btnDark, btnSystem].forEach(btn => {
                if (btn) {
                    btn.className = "flex flex-col items-center justify-center py-5 rounded-xl border-2 border-transparent bg-slate-50 dark:bg-[#11211d] hover:bg-slate-100 dark:hover:bg-[#1a2e29] transition-all focus:outline-none";
                    btn.querySelector('i').className = btn.querySelector('i').className.replace('text-emerald-500', 'text-slate-400');
                    btn.querySelector('span').className = "text-sm font-semibold text-slate-500 dark:text-slate-400";
                }
            });

            const activeBtn = document.getElementById(`btn-theme-${theme}`);
            if (activeBtn) {
                activeBtn.className = "flex flex-col items-center justify-center py-5 rounded-xl border-2 border-emerald-500 bg-emerald-50 dark:bg-emerald-900/20 transition-all shadow-sm focus:outline-none";
                activeBtn.querySelector('i').className = activeBtn.querySelector('i').className.replace('text-slate-400', 'text-emerald-500');
                activeBtn.querySelector('span').className = "text-sm font-semibold text-emerald-700 dark:text-emerald-400";
            }
        };

        window.setTheme = function(theme) {
            localStorage.setItem('theme', theme);
            const html = document.documentElement;
            if (theme === 'system') {
                if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
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
        };

        window.switchSettingsTab = function(tab) {
            ['general', 'profile', 'data', 'about'].forEach(t => {
                document.getElementById('content-' + t).classList.add('hidden');
                document.getElementById('tab-' + t).className = "w-full flex items-center gap-3 px-4 py-3 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-[#11211d] rounded-xl font-medium transition text-left";
            });
            document.getElementById('content-' + tab).classList.remove('hidden');
            document.getElementById('tab-' + tab).className = "w-full flex items-center gap-3 px-4 py-3 bg-slate-200 dark:bg-[#11211d] text-slate-900 dark:text-white rounded-xl font-bold transition text-left";
        };

        window.openSettingsModal = function() {
            const modal = document.getElementById('settingsModal');
            const content = document.getElementById('settingsModalContent');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                content.classList.remove('scale-95');
                content.classList.add('scale-100');
            }, 10);
            switchSettingsTab('general');
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

        const savedLang = localStorage.getItem('language') || 'id';
        changeLanguage(savedLang);
        const savedTheme = localStorage.getItem('theme') || 'system';
        setTheme(savedTheme);

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

            fetch(apiUrl)
                .then(response => response.json())
                .then(users => {
                    let html = '';
                    users.forEach(user => {
                        let roleBadge = user.role === 'admin' ?
                            '<span class="text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded-md bg-amber-100 text-amber-700">ADMIN</span>' :
                            '<span class="text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded-md bg-emerald-100 text-emerald-700">USER</span>';

                        let actionBtn = user.id !== currentUserId ?
                            `<button onclick="confirmDeleteUser(${user.id})" class="w-8 h-8 rounded-lg bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-100 transition mx-auto"><i class="fas fa-trash text-sm"></i></button>` :
                            `<span class="text-[10px] text-slate-400">Anda</span>`;

                        html += `<tr class="hover:bg-slate-50 dark:hover:bg-[#11211d] transition">
                            <td class="px-4 py-3"><div class="flex items-center gap-3"><div class="w-8 h-8 rounded-full bg-emerald-500 text-white flex items-center justify-center font-bold text-xs shrink-0">${user.name.charAt(0).toUpperCase()}</div><span class="font-bold text-slate-800 dark:text-white text-sm">${user.name}</span></div></td>
                            <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-300">${user.email}</td>
                            <td class="px-4 py-3">${roleBadge}</td>
                            <td class="px-4 py-3 text-center">${actionBtn}</td>
                        </tr>`;
                    });
                    tbody.innerHTML = html;
                })
                .catch(err => {
                    tbody.innerHTML = '<tr><td colspan="4" class="text-center py-6 text-red-500">Gagal memuat data pengguna.</td></tr>';
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

                $('#create_provinsi').select2({
                    placeholder: "-- Select Province --",
                    width: '100%',
                    dropdownParent: $('#createModal')
                });
                $('#create_kabupaten').select2({
                    placeholder: "-- Select Regency --",
                    width: '100%',
                    dropdownParent: $('#createModal')
                });

                if (!createMap) {
                    createMap = L.map('createMapPicker').setView([-2.99, 104.75], 11);
                    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '© OpenStreetMap contributors'
                    }).addTo(createMap);
                    createMarker = L.marker([-2.99, 104.75], {
                        draggable: true
                    }).addTo(createMap);

                    createMarker.on('dragend', function() {
                        var pos = createMarker.getLatLng();
                        document.getElementById('create_inputLat').value = pos.lat.toFixed(6);
                        document.getElementById('create_inputLng').value = pos.lng.toFixed(6);
                        document.getElementById('create_displayLat').innerText = pos.lat.toFixed(6);
                        document.getElementById('create_displayLng').innerText = pos.lng.toFixed(6);
                    });

                    createMap.on('click', function(e) {
                        createMarker.setLatLng(e.latlng);
                        document.getElementById('create_inputLat').value = e.latlng.lat.toFixed(6);
                        document.getElementById('create_inputLng').value = e.latlng.lng.toFixed(6);
                        document.getElementById('create_displayLat').innerText = e.latlng.lat.toFixed(6);
                        document.getElementById('create_displayLng').innerText = e.latlng.lng.toFixed(6);
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

        var allKabOptionsCreate = Array.from(document.querySelectorAll('#create_kabupaten option[data-provinsi]'));
        $('#create_provinsi').on('change', function() {
            var selectedProv = $(this).val();
            $('#create_kabupaten').select2('destroy');
            document.getElementById('create_kabupaten').innerHTML = '<option value="">-- Select Regency --</option>';
            if (selectedProv !== '') {
                allKabOptionsCreate.forEach(function(opt) {
                    if (opt.getAttribute('data-provinsi') === selectedProv) {
                        document.getElementById('create_kabupaten').appendChild(opt.cloneNode(true));
                    }
                });
            }
            $('#create_kabupaten').select2({
                placeholder: "-- Select Regency --",
                width: '100%',
                dropdownParent: $('#createModal')
            });
        });

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
            container.innerHTML = '<div class="text-center py-10"><i class="fas fa-spinner fa-spin text-3xl text-emerald-500"></i><p class="mt-4 text-slate-500">Loading form...</p></div>';

            fetch(url)
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const form = doc.querySelector('form[enctype="multipart/form-data"]') || doc.querySelector('form[action*="update"]');

                    if (form) {
                        container.innerHTML = '';
                        container.appendChild(form);

                        const mapContainer = document.createElement('div');
                        mapContainer.className = 'mt-6 p-4 bg-slate-50 dark:bg-[#11211d] border border-slate-200 dark:border-[#1a2e29] rounded-xl';
                        mapContainer.innerHTML = `
                            <label class="block text-sm font-bold mb-2 text-slate-700 dark:text-slate-300"><i class="fas fa-map-marked-alt text-emerald-500 mr-1"></i> Adjust Location (Map)</label>
                            <div id="editMapPicker" class="w-full h-[300px] rounded-lg border border-slate-300 dark:border-[#1a2e29] z-0 relative"></div>
                            <div class="mt-3 flex items-center gap-4 text-sm font-bold text-slate-700 dark:text-slate-300">
                                <span>Lat: <span id="edit_displayLat" class="text-emerald-600 dark:text-emerald-400">-</span></span>
                                <span>Lng: <span id="edit_displayLng" class="text-emerald-600 dark:text-emerald-400">-</span></span>
                            </div>
                        `;
                        form.appendChild(mapContainer);

                        const latInput = form.querySelector('input[name="latitude"]');
                        const lngInput = form.querySelector('input[name="longitude"]');

                        let initialLat = latInput && latInput.value ? parseFloat(latInput.value) : -2.99;
                        let initialLng = lngInput && lngInput.value ? parseFloat(lngInput.value) : 104.75;
                        if (isNaN(initialLat)) initialLat = -2.99;
                        if (isNaN(initialLng)) initialLng = 104.75;

                        document.getElementById('edit_displayLat').innerText = initialLat;
                        document.getElementById('edit_displayLng').innerText = initialLng;

                        setTimeout(() => {
                            let editMap = L.map('editMapPicker').setView([initialLat, initialLng], 11);
                            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution: '© OpenStreetMap'
                            }).addTo(editMap);
                            let editMarker = L.marker([initialLat, initialLng], {
                                draggable: true
                            }).addTo(editMap);

                            editMarker.on('dragend', function() {
                                var pos = editMarker.getLatLng();
                                if (latInput) latInput.value = pos.lat.toFixed(6);
                                if (lngInput) lngInput.value = pos.lng.toFixed(6);
                                document.getElementById('edit_displayLat').innerText = pos.lat.toFixed(6);
                                document.getElementById('edit_displayLng').innerText = pos.lng.toFixed(6);
                            });
                            editMap.on('click', function(e) {
                                editMarker.setLatLng(e.latlng);
                                if (latInput) latInput.value = e.latlng.lat.toFixed(6);
                                if (lngInput) lngInput.value = e.latlng.lng.toFixed(6);
                                document.getElementById('edit_displayLat').innerText = e.latlng.lat.toFixed(6);
                                document.getElementById('edit_displayLng').innerText = e.latlng.lng.toFixed(6);
                            });
                            editMap.invalidateSize();
                        }, 150);

                    } else {
                        container.innerHTML = '<p class="text-red-500 text-center py-4">Failed to load form.</p>';
                    }
                }).catch(err => {
                    container.innerHTML = '<p class="text-red-500 text-center py-4">A system error occurred.</p>';
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

        let actionToExecute = null;

        window.closeDeleteModal = function() {
            const modal = document.getElementById('deleteModal');
            const content = document.getElementById('deleteModalContent');
            modal.classList.add('opacity-0');
            content.classList.remove('scale-100');
            content.classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        };

        document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
            if (typeof actionToExecute === 'function') {
                actionToExecute();
            }
        });

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

        window.confirmDeleteUser = function(id) {
            document.getElementById('deleteModalTitle').innerText = translations[localStorage.getItem('language') || 'id'].hapus_pengguna;
            document.getElementById('deleteModalText').innerText = translations[localStorage.getItem('language') || 'id'].peringatan_hapus_pengguna;

            actionToExecute = function() {
                fetch(`/admin/pengguna/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    }
                }).then(() => {
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
    });
</script>
@endsection