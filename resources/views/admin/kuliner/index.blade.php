@extends('layouts.app')

@section('title', 'Manage Culinary - Admin')

@section('content')

<style>
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

    <!-- SIDEBAR KIRI -->
    <aside id="adminSidebar" class="fixed md:relative inset-y-0 left-0 z-[100] w-64 h-full bg-white dark:bg-[#0f1a18] border-r border-slate-200 dark:border-[#1a2e29] flex flex-col shrink-0 transition-transform duration-300 transform -translate-x-full md:translate-x-0">

        <div class="p-6 border-b border-slate-200 dark:border-[#1a2e29] shrink-0 flex justify-between items-center">
            <div>
                <h2 class="font-bold text-lg text-slate-900 dark:text-white transition-colors">Admin Menu</h2>
                <p class="text-xs text-slate-500 dark:text-slate-400">Manage Content</p>
            </div>
            <!-- Tombol Close Sidebar (Mobile) -->
            <button onclick="toggleAdminSidebar()" class="md:hidden text-slate-500 hover:text-red-500">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <div class="flex-1 overflow-y-auto py-6 px-4">
            <p class="text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-4 px-2">Main</p>
            <nav class="space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-[#11211d] rounded-lg">
                    <i class="fas fa-th-large text-sm w-5 text-center"></i> <span class="font-medium text-sm">Dashboard</span>
                </a>
                <div class="h-px bg-slate-200 dark:bg-[#1a2e29] my-4"></div>
                <a href="{{ route('admin.destinasi.index') }}" class="flex items-center gap-3 px-3 py-2.5 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-[#11211d] rounded-lg">
                    <i class="fas fa-map-marker-alt text-sm w-5 text-center"></i> <span class="font-medium text-sm">Destinations</span>
                </a>
                <a href="{{ route('admin.budaya.index') }}" class="flex items-center gap-3 px-3 py-2.5 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-[#11211d] rounded-lg">
                    <i class="fas fa-masks-theater text-sm w-5 text-center"></i> <span class="font-medium text-sm">Culture</span>
                </a>
                <a href="{{ route('admin.kuliner.index') }}" class="flex items-center gap-3 px-3 py-2.5 bg-emerald-600 text-white rounded-lg shadow-sm mb-3">
                    <i class="fas fa-utensils text-sm w-5 text-center"></i> <span class="font-medium text-sm">Culinary</span>
                </a>

                {{-- 🌟 TAMBAHAN BARU: MENU PENGGUNA & FEEDBACK 🌟 --}}
                <button onclick="openUsersModal()" class="w-full flex items-center gap-3 px-3 py-2.5 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-[#11211d] rounded-lg text-left">
                    <i class="fas fa-users text-sm w-5 text-center"></i>
                    <span class="font-medium text-sm" data-i18n="pengguna">Users</span>
                </button>
                <button onclick="openAdminFeedbackModal()" class="w-full flex items-center gap-3 px-3 py-2.5 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-[#11211d] rounded-lg text-left">
                    <i class="fas fa-comment-dots text-sm w-5 text-center"></i>
                    <span class="font-medium text-sm" data-i18n="feedback">Feedback</span>
                </button>
                {{-- 🌟 AKHIR TAMBAHAN 🌟 --}}
            </nav>
        </div>

        <!-- 🌟 PENGATURAN & KELUAR (SUDAH DIPERBAIKI) 🌟 -->
        <div class="p-4 border-t border-slate-200 dark:border-[#1a2e29] space-y-1 shrink-0">
            <button onclick="openSettingsModal('general')" class="w-full flex items-center gap-3 px-3 py-2.5 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-[#11211d] rounded-lg text-left">
                <i class="fas fa-cog text-sm w-5 text-center"></i> <span class="font-medium text-sm">Settings</span>
            </button>
            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-3 py-2.5 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/30 rounded-lg text-left transition-colors">
                    <i class="fas fa-sign-out-alt text-sm w-5 text-center"></i> <span class="font-medium text-sm">Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- KONTEN KANAN -->
    <main class="flex-1 p-4 md:p-10 overflow-y-auto h-full">

        <!-- TOMBOL HAMBURGER (MOBILE) -->
        <div class="md:hidden flex items-center gap-3 mb-6">
            <button onclick="toggleAdminSidebar()" class="w-10 h-10 rounded-xl bg-white dark:bg-[#0f1a18] border border-slate-200 dark:border-[#1a2e29] flex items-center justify-center text-slate-900 dark:text-white shadow-sm">
                <i class="fas fa-bars text-lg"></i>
            </button>
            <h1 class="text-xl font-bold text-slate-900 dark:text-white">Menu Admin</h1>
        </div>

        <div class="container mx-auto max-w-6xl">
            <div class="flex flex-col md:flex-row items-center justify-between mb-8 gap-4">
                <div>
                    <h1 class="text-3xl font-black text-slate-900 dark:text-white">Manage Culinary</h1>
                    <p class="text-slate-500 dark:text-slate-400 mt-1">List of all culinary in Explore Sumatera.</p>
                </div>
                <div class="flex gap-3 w-full md:w-auto">
                    <button onclick="openCreateModal()" class="bg-emerald-600 hover:bg-emerald-500 text-white px-5 py-2.5 rounded-xl font-bold transition shadow-lg shadow-emerald-600/30 w-full md:w-auto text-center">
                        <i class="fas fa-plus mr-2"></i> Add Culinary Data
                    </button>
                </div>
            </div>

            @if(session('success'))
            <div class="bg-emerald-100 border border-emerald-400 text-emerald-700 px-4 py-3 rounded-xl mb-6">
                {{ session('success') }}
            </div>
            @endif

            <!-- 🌟 TABEL KULINER (BEBAS DOUBLE SCROLLBAR) 🌟 -->
            <div class="bg-white dark:bg-[#0f1a18] rounded-2xl shadow-xl border border-slate-200 dark:border-[#1a2e29] flex flex-col">
                <div class="overflow-x-auto custom-modal-scroll">
                    <table class="w-full text-left border-collapse relative min-w-[700px]">
                        <thead class="bg-slate-50 dark:bg-[#11211d] text-slate-500 dark:text-slate-400 text-xs uppercase tracking-wider font-bold sticky top-0 z-10 shadow-sm">
                            <tr>
                                <th class="px-6 py-4 border-b border-slate-200 dark:border-[#1a2e29]">No</th>
                                <th class="px-6 py-4 border-b border-slate-200 dark:border-[#1a2e29]">Image</th>
                                <th class="px-6 py-4 border-b border-slate-200 dark:border-[#1a2e29]">Culinary Name</th>
                                <th class="px-6 py-4 border-b border-slate-200 dark:border-[#1a2e29]">Regency</th>
                                <th class="px-6 py-4 border-b border-slate-200 dark:border-[#1a2e29]">Type</th>
                                <th class="px-6 py-4 border-b border-slate-200 dark:border-[#1a2e29]">Price</th>
                                <th class="px-6 py-4 border-b border-slate-200 dark:border-[#1a2e29] text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-[#1a2e29]">
                            @forelse($kuliners as $index => $item)
                            <tr class="hover:bg-slate-50 dark:hover:bg-[#11211d] transition group">
                                <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-300">{{ $kuliners->firstItem() + $index }}</td>
                                <td class="px-6 py-4">
                                    <div class="overflow-hidden rounded-lg w-16 h-16 border border-slate-200 dark:border-[#1a2e29]">
                                        <img src="{{ str_starts_with($item->gambar, 'http') ? $item->gambar : asset('storage/'.$item->gambar) }}" alt="{{ $item->nama }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-bold text-slate-800 dark:text-white text-sm">{{ $item->nama }}</td>
                                <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-300">{{ $item->kabupaten->nama ?? '-' }}</td>
                                <td class="px-6 py-4">
                                    <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded-md bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400">{{ $item->jenis }}</span>
                                </td>
                                <td class="px-6 py-4 font-bold text-emerald-600 dark:text-emerald-400 text-sm">
                                    {{ $item->harga == 0 ? 'Gratis' : 'Rp ' . number_format($item->harga, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button type="button" data-url="{{ route('admin.kuliner.edit', $item->id) }}" onclick="openEditModal(this.dataset.url)" class="w-8 h-8 rounded-lg bg-blue-50 dark:bg-blue-950/30 text-blue-600 dark:text-blue-400 flex items-center justify-center hover:bg-blue-100 dark:hover:bg-blue-900/50 hover:scale-110 transition-all" title="Edit">
                                            <i class="fas fa-edit text-sm"></i>
                                        </button>
                                        <button class="btn-delete-kuliner w-8 h-8 rounded-lg bg-red-50 dark:bg-red-950/30 text-red-600 dark:text-red-400 flex items-center justify-center hover:bg-red-100 dark:hover:bg-red-900/50 hover:scale-110 transition-all" data-id="{{ $item->id }}" title="Delete">
                                            <i class="fas fa-trash text-sm"></i>
                                        </button>
                                        <form id="delete-kuliner-form-{{ $item->id }}" action="{{ route('admin.kuliner.destroy', $item->id) }}" method="POST" class="hidden">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-6 py-10 text-center text-slate-500 dark:text-slate-400">No culinary data yet.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="p-4 border-t border-slate-200 dark:border-[#1a2e29] bg-white dark:bg-[#0f1a18] rounded-b-2xl shrink-0">
                    {{ $kuliners->links() }}
                </div>
            </div>
        </div>
    </main>
</div>

<!-- ========================================== -->
<!-- MODAL TAMBAH DATA KULINER -->
<!-- ========================================== -->
<div id="createModal" class="fixed inset-0 z-[1000] hidden bg-slate-900/60 backdrop-blur-sm flex items-center justify-center opacity-0 transition-opacity duration-300 p-4">
    <div id="createModalContent" class="bg-white dark:bg-[#0f1a18] rounded-3xl w-full max-w-3xl shadow-2xl border border-slate-200 dark:border-[#1a2e29] transform scale-95 transition-transform duration-300 flex flex-col max-h-[90vh]">
        <div class="flex justify-between items-center px-6 py-5 border-b border-slate-200 dark:border-[#1a2e29] shrink-0">
            <h3 class="text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2"><i class="fas fa-plus text-emerald-500"></i> Add Culinary Data</h3>
            <button onclick="closeCreateModal()" type="button" class="w-8 h-8 rounded-full bg-slate-100 dark:bg-[#11211d] flex items-center justify-center text-slate-500 hover:bg-red-100 hover:text-red-600 transition"><i class="fas fa-times"></i></button>
        </div>
        <div class="p-6 overflow-y-auto custom-modal-scroll flex-1">
            <form action="{{ route('admin.kuliner.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Nama Kuliner</label>
                        <input type="text" name="nama" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-[#1a2e29] bg-slate-50 dark:bg-[#11211d] text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Kabupaten / Kota</label>
                        <select name="kabupaten_id" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-[#1a2e29] bg-slate-50 dark:bg-[#11211d] text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            <option value="">-- Pilih Kabupaten --</option>
                            @foreach($kabupatens as $kab)
                            <option value="{{ $kab->id }}">{{ $kab->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Jenis Kuliner</label>
                        <select name="jenis" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-[#1a2e29] bg-slate-50 dark:bg-[#11211d] text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            <option value="Makanan">Makanan</option>
                            <option value="Minuman">Minuman</option>
                            <option value="Snack">Snack</option>
                            <option value="Dessert">Dessert</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Harga (Angka)</label>
                        <input type="number" name="harga" value="0" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-[#1a2e29] bg-slate-50 dark:bg-[#11211d] text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Upload Gambar</label>
                        <input type="file" name="gambar" accept="image/*" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-[#1a2e29] bg-slate-50 dark:bg-[#11211d] text-slate-900 dark:text-white focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 dark:file:bg-emerald-900/30 dark:file:text-emerald-400">
                    </div>
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Deskripsi Atas</label>
                    <textarea name="deskripsi" rows="4" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-[#1a2e29] bg-slate-50 dark:bg-[#11211d] text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none"></textarea>
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Deskripsi Bawah (Opsional)</label>
                    <textarea name="deskripsi_bawah" rows="4" placeholder="Masukkan deskripsi tambahan bagian bawah..." class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-[#1a2e29] bg-slate-50 dark:bg-[#11211d] text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none"></textarea>
                </div>

                {{-- 🌟 TAMBAHAN BARU: INPUT LINK GOOGLE MAPS DI MODAL CREATE 🌟 --}}
                <div class="mb-4 p-4 bg-[#f0fdf4] border border-emerald-200 dark:border-emerald-900/50 rounded-xl">
                    <label class="block text-sm font-bold text-emerald-800 dark:text-emerald-400 mb-3 flex items-center gap-2">
                        <i class="fas fa-map-marker-alt text-emerald-600"></i> Perbarui Lokasi (Tempel Link Google Maps)
                    </label>
                    <input type="text" name="link_maps" id="create_link_maps" class="w-full px-4 py-3 rounded-xl border border-emerald-400 bg-white dark:bg-[#0f1a18] text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none" placeholder="https://www.google.com/maps/...">
                    <p class="text-xs text-emerald-600/80 dark:text-emerald-500 mt-2">Sistem akan otomatis mengambil koordinat dari link tersebut.</p>
                </div>
                {{-- 🌟 AKHIR TAMBAHAN 🌟 --}}

                <div class="mb-4 p-4 bg-slate-50 dark:bg-[#11211d] border border-slate-200 dark:border-[#1a2e29] rounded-xl">
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2"><i class="fas fa-map-marked-alt text-emerald-500 mr-1"></i> Determine Location</label>
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
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-500 text-white font-bold px-8 py-3 rounded-xl transition-all shadow-lg shadow-emerald-600/30"><i class="fas fa-save mr-2"></i> Save Culinary</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ========================================== -->
<!-- MODAL EDIT -->
<!-- ========================================== -->
<div id="editModal" class="fixed inset-0 z-[1000] hidden bg-slate-900/60 backdrop-blur-sm flex items-center justify-center opacity-0 transition-opacity duration-300 p-4">
    <div id="editModalContent" class="bg-white dark:bg-[#0f1a18] rounded-3xl w-full max-w-3xl shadow-2xl border border-slate-200 dark:border-[#1a2e29] transform scale-95 transition-transform duration-300 flex flex-col max-h-[90vh]">
        <div class="flex justify-between items-center px-6 py-5 border-b border-slate-200 dark:border-[#1a2e29] shrink-0">
            <h3 class="text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2"><i class="fas fa-edit text-emerald-500"></i> Edit Culinary Data</h3>
            <button onclick="closeEditModal()" type="button" class="w-8 h-8 rounded-full bg-slate-100 dark:bg-[#11211d] flex items-center justify-center text-slate-500 hover:bg-red-100 hover:text-red-600 transition"><i class="fas fa-times"></i></button>
        </div>
        <div id="editFormContainer" class="p-6 overflow-y-auto custom-modal-scroll flex-1 text-slate-800 dark:text-white">
            <!-- Form akan diinjeksi oleh JavaScript -->
        </div>
    </div>
</div>

<!-- ========================================== -->
<!-- 🌟 TAMBAHAN BARU: MODAL PENGGUNA (USERS) 🌟 -->
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
<!-- 🌟 TAMBAHAN BARU: MODAL ADMIN FEEDBACK 🌟 -->
<!-- ========================================== -->
<div id="adminFeedbackModal" class="fixed inset-0 z-[999] hidden bg-slate-900/60 backdrop-blur-md flex items-center justify-center opacity-0 transition-opacity duration-300 p-4">
    <div id="adminFeedbackModalContent" class="bg-white dark:bg-[#0f1a18] rounded-3xl w-full max-w-5xl h-[600px] max-h-[90vh] shadow-2xl border border-slate-200 dark:border-[#1a2e29] transform scale-95 transition-transform duration-300 overflow-hidden flex flex-col">

        <!-- Header -->
        <div class="flex justify-between items-center p-4 md:p-6 border-b border-slate-200 dark:border-[#1a2e29] bg-slate-50 dark:bg-[#11211d] shrink-0">
            <h3 class="text-lg md:text-xl font-bold text-slate-900 dark:text-white flex items-center gap-3">
                <span class="w-10 h-10 rounded-xl bg-emerald-100 dark:bg-emerald-500/10 flex items-center justify-center shrink-0"><i class="fas fa-comment-dots text-emerald-500"></i></span>
                <span data-i18n="daftar_feedback">User Feedback List</span>
            </h3>
            <button onclick="closeAdminFeedbackModal()" class="w-8 h-8 rounded-full bg-white dark:bg-[#0f1a18] flex items-center justify-center text-slate-500 hover:bg-red-100 hover:text-red-600 transition">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Body -->
        <div class="flex-1 p-4 md:p-6 overflow-y-auto custom-modal-scroll bg-slate-50 dark:bg-[#091413]">
            <div class="overflow-auto rounded-2xl border border-slate-200 dark:border-[#1a2e29] mb-6 bg-white dark:bg-[#0f1a18]">
                <table class="w-full text-left border-collapse relative">
                    <thead class="bg-slate-50 dark:bg-[#11211d] text-slate-500 dark:text-slate-400 text-xs uppercase font-bold sticky top-0 z-10">
                        <tr>
                            <th class="px-4 py-3 bg-slate-50 dark:bg-[#0f1a18] border-b border-slate-200 dark:border-[#1a2e29]" data-i18n="pengirim">Sender</th>
                            <th class="px-4 py-3 bg-slate-50 dark:bg-[#0f1a18] border-b border-slate-200 dark:border-[#1a2e29]" data-i18n="subjek">Subject</th>
                            <th class="px-4 py-3 bg-slate-50 dark:bg-[#0f1a18] border-b border-slate-200 dark:border-[#1a2e29]" data-i18n="pesan">Message</th>
                            <th class="px-4 py-3 bg-slate-50 dark:bg-[#0f1a18] border-b border-slate-200 dark:border-[#1a2e29]" data-i18n="tanggal">Date</th>
                            <th class="px-4 py-3 bg-slate-50 dark:bg-[#0f1a18] border-b border-slate-200 dark:border-[#1a2e29] text-center" data-i18n="status">Status</th>
                        </tr>
                    </thead>
                    <tbody id="feedbackTableBody" class="divide-y divide-slate-100 dark:divide-[#1a2e29]">
                        <!-- Data akan diisi via JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- ========================================== -->
<!-- 🌟 TAMBAHAN BARU: MODAL PENGATURAN (SETTINGS) DIPERBARUI 🌟 -->
<!-- ========================================== -->
<div id="settingsModal" class="fixed inset-0 z-[999] hidden bg-slate-900/60 backdrop-blur-md flex items-center justify-center opacity-0 transition-opacity duration-300 p-4">
    <div id="settingsModalContent" class="bg-white dark:bg-[#0f172a] rounded-3xl w-full max-w-4xl h-[650px] max-h-[90vh] shadow-2xl border border-slate-200 dark:border-slate-800 transform scale-95 transition-transform duration-300 overflow-hidden flex flex-col md:flex-row">

        <!-- Sidebar Tabs (Kiri) -->
        <div class="w-full md:w-56 bg-slate-50 dark:bg-slate-800/30 border-b md:border-b-0 md:border-r border-slate-200 dark:border-slate-800 p-4 flex flex-col shrink-0">

            <!-- Mobile Header (Judul + Tombol Close) - Hanya tampil di HP -->
            <div class="flex md:hidden items-center justify-between mb-4 px-2">
                <h3 class="text-lg font-bold text-slate-900 dark:text-white" data-i18n="settings">Settings</h3>
                <button onclick="closeSettingsModal()" class="w-8 h-8 rounded-full bg-slate-200 dark:bg-slate-700 flex items-center justify-center text-slate-500 hover:bg-red-100 hover:text-red-600 transition"><i class="fas fa-times"></i></button>
            </div>

            <!-- Desktop Title - Hanya tampil di Desktop -->
            <h3 class="hidden md:block text-lg font-bold text-slate-900 dark:text-white mb-6 px-4" data-i18n="settings">Settings</h3>

            <!-- Tab Menu: Bisa digeser ke samping (Horizontal) di HP, Tetap Vertikal di Desktop -->
            <div class="flex flex-row md:flex-col gap-2 md:gap-0 md:space-y-1 overflow-x-auto md:overflow-x-visible pb-2 md:pb-0 [&::-webkit-scrollbar]:hidden md:[&::-webkit-scrollbar]:block w-full">
                <button id="btn-tab-general" onclick="switchSettingsTab('general')" class="settings-tab-btn shrink-0 w-auto md:w-full flex items-center gap-2 md:gap-3 px-3 py-2 md:px-4 md:py-3 rounded-xl text-slate-600 dark:text-slate-400 font-semibold text-sm transition-colors whitespace-nowrap">
                    <i class="fas fa-cog"></i> <span data-i18n="general">General</span>
                </button>
                <button id="btn-tab-profil" onclick="switchSettingsTab('profil')" class="settings-tab-btn shrink-0 w-auto md:w-full flex items-center gap-2 md:gap-3 px-3 py-2 md:px-4 md:py-3 rounded-xl text-slate-600 dark:text-slate-400 font-semibold text-sm transition-colors whitespace-nowrap">
                    <i class="fas fa-user"></i> <span data-i18n="profil_saya">Profil Saya</span>
                </button>
                <button id="btn-tab-data" onclick="switchSettingsTab('data')" class="settings-tab-btn shrink-0 w-auto md:w-full flex items-center gap-2 md:gap-3 px-3 py-2 md:px-4 md:py-3 rounded-xl text-slate-600 dark:text-slate-400 font-semibold text-sm transition-colors whitespace-nowrap">
                    <i class="fas fa-database"></i> <span data-i18n="data">Data</span>
                </button>
                <button id="btn-tab-about" onclick="switchSettingsTab('about')" class="settings-tab-btn shrink-0 w-auto md:w-full flex items-center gap-2 md:gap-3 px-3 py-2 md:px-4 md:py-3 rounded-xl text-slate-600 dark:text-slate-400 font-semibold text-sm transition-colors whitespace-nowrap">
                    <i class="fas fa-info-circle"></i> <span data-i18n="about">About</span>
                </button>
            </div>
        </div>

        <!-- Area Konten (Kanan) -->
        <div class="flex-1 p-4 md:p-8 overflow-y-auto relative custom-modal-scroll">

            <!-- Tombol Close (Desktop) -->
            <button onclick="closeSettingsModal()" class="hidden md:flex absolute top-6 right-6 w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800 items-center justify-center text-slate-500 hover:bg-red-100 hover:text-red-600 transition z-10"><i class="fas fa-times"></i></button>

            <!-- 🌟 KONTEN TAB: GENERAL (TEMA & BAHASA) 🌟 -->
            <div id="tab-general" class="tab-content hidden">
                <h4 class="text-lg md:text-xl font-bold text-slate-900 dark:text-white mb-4 md:mb-8" data-i18n="tema_tampilan">Tema Tampilan</h4>
                <div class="grid grid-cols-3 gap-2 md:gap-4 mb-6 md:mb-10">
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

                <h4 class="text-lg md:text-xl font-bold text-slate-900 dark:text-white mb-4" data-i18n="pengaturan_lainnya">Pengaturan Lainnya</h4>
                <div class="space-y-4">
                    <div class="flex items-center justify-between gap-3 p-4 rounded-2xl border border-slate-200 dark:border-slate-800 bg-slate-50/50 dark:bg-slate-800/20">
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
                                    <input type="text" name="name" value="{{ auth()->user()->name }}" class="w-full pl-11 pr-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 text-slate-900 dark:text-white focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-500 outline-none transition" required>
                                </div>
                            </div>
                            <div>
                                <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2 ml-1" data-i18n="alamat_email">Alamat Email</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400"><i class="fas fa-envelope"></i></div>
                                    <input type="email" name="email" value="{{ auth()->user()->email }}" class="w-full pl-11 pr-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 text-slate-900 dark:text-white focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-500 outline-none transition" required>
                                </div>
                            </div>
                            <div class="pt-2 border-t border-slate-100 dark:border-slate-800">
                                <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2 ml-1 mt-3" data-i18n="ganti_password">Ganti Password (Opsional)</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400"><i class="fas fa-lock"></i></div>
                                    <input type="password" name="password" id="passwordInput" placeholder="Biarkan kosong" class="w-full pl-11 pr-12 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 text-slate-900 dark:text-white focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-500 outline-none text-sm transition" data-i18n-placeholder="password_kosong">
                                    <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-emerald-500"><i class="fas fa-eye" id="toggleIcon"></i></button>
                                </div>
                            </div>
                            <div class="pt-4">
                                <button type="submit" class="w-full px-4 py-3 rounded-xl font-bold text-white bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-400 hover:to-emerald-500 shadow-lg shadow-emerald-500/40 flex items-center justify-center gap-2 transform hover:-translate-y-0.5 transition"><i class="fas fa-check-circle"></i> <span data-i18n="simpan_perubahan">Simpan Perubahan</span></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- TAB DATA -->
            <div id="tab-data" class="tab-content hidden">
                <h4 class="text-xl font-bold text-slate-900 dark:text-white mb-4" data-i18n="data_website">Data Website</h4>
                <div class="p-10 text-center bg-slate-50 dark:bg-slate-800/50 rounded-2xl border border-dashed border-slate-300 dark:border-slate-700">
                    <i class="fas fa-database text-4xl text-slate-300 mb-4"></i>
                    <p class="text-slate-500" data-i18n="fitur_backup">Fitur Backup & Restore database akan tersedia di sini.</p>
                </div>
            </div>

            <!-- TAB ABOUT -->
            <div id="tab-about" class="tab-content hidden">
                <h4 class="text-xl font-bold text-slate-900 dark:text-white mb-4" data-i18n="tentang_app">Tentang Aplikasi</h4>
                <div class="p-6 bg-slate-50 dark:bg-slate-800/50 rounded-2xl border border-slate-200 dark:border-slate-700 text-center">
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

<!-- ========================================== -->
<!-- MODAL KONFIRMASI HAPUS -->
<!-- ========================================== -->
<div id="deleteModal" class="fixed inset-0 z-[1000] hidden bg-slate-900/80 backdrop-blur-sm flex items-center justify-center opacity-0 transition-opacity duration-300 p-4">
    <div id="deleteModalContent" class="bg-white dark:bg-[#0f1a18] rounded-3xl p-6 md:p-8 max-w-sm w-full mx-4 shadow-2xl border border-slate-200 dark:border-[#1a2e29] transform scale-95 transition-transform duration-300">
        <div class="w-16 h-16 rounded-full bg-red-100 dark:bg-red-900/30 flex items-center justify-center mx-auto mb-4"><i class="fas fa-exclamation-triangle text-2xl text-red-600 dark:text-red-400"></i></div>
        <h3 class="text-xl font-bold text-center mb-2" id="deleteModalTitle">Hapus Kuliner?</h3>
        <p class="text-center text-slate-500 text-sm mb-6" id="deleteModalText">Data kuliner ini akan dihapus permanen.</p>
        <div class="flex gap-3">
            <button type="button" onclick="closeDeleteModal()" class="flex-1 px-4 py-2.5 rounded-xl font-bold bg-slate-100 dark:bg-[#11211d] transition">Batal</button>
            <button type="button" id="confirmDeleteBtn" class="flex-1 px-4 py-2.5 rounded-xl font-bold text-white bg-red-600 shadow-lg transition">Ya, Hapus</button>
        </div>
    </div>
</div>

{{-- 🌟 TAMBAHAN BARU: DIV TITIPAN DATA UNTUK JS 🌟 --}}
<div id="app-data" data-user-id="{{ auth()->id() }}" data-api-url="{{ route('admin.pengguna.api') }}" data-csrf="{{ csrf_token() }}" style="display: none;"></div>

{{-- LIBRARY CDN UNTUK PETA --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    // 🌟 SCRIPT TOGGLE SIDEBAR MOBILE 🌟
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

    // 🌟 LOGIKA PETA CREATE 🌟
    var createMap = null;
    var createMarker = null;

    function openCreateModal() {
        const modal = document.getElementById('createModal');
        const content = document.getElementById('createModalContent');
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            content.classList.remove('scale-95');
            content.classList.add('scale-100');

            // Inisialisasi Peta HANYA saat modal dibuka
            if (!createMap) {
                createMap = L.map('createMapPicker').setView([-2.99, 104.75], 11);
                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '© OpenStreetMap contributors'
                }).addTo(createMap);

                createMarker = L.marker([-2.99, 104.75], {
                    draggable: true
                }).addTo(createMap);

                // Event saat marker digeser
                createMarker.on('dragend', function() {
                    var pos = createMarker.getLatLng();
                    document.getElementById('create_inputLat').value = pos.lat.toFixed(6);
                    document.getElementById('create_inputLng').value = pos.lng.toFixed(6);
                    document.getElementById('create_displayLat').innerText = pos.lat.toFixed(6);
                    document.getElementById('create_displayLng').innerText = pos.lng.toFixed(6);
                });

                // Event saat peta diklik
                createMap.on('click', function(e) {
                    createMarker.setLatLng(e.latlng);
                    document.getElementById('create_inputLat').value = e.latlng.lat.toFixed(6);
                    document.getElementById('create_inputLng').value = e.latlng.lng.toFixed(6);
                    document.getElementById('create_displayLat').innerText = e.latlng.lat.toFixed(6);
                    document.getElementById('create_displayLng').innerText = e.latlng.lng.toFixed(6);
                });

                // Logika Otomatis Baca Link Google Maps
                document.getElementById('create_link_maps').addEventListener('input', function(e) {
                    var url = e.target.value;
                    var regex = /@(-?\d+\.\d+),(-?\d+\.\d+)|q=(-?\d+\.\d+),(-?\d+\.\d+)/;
                    var match = url.match(regex);

                    if (match) {
                        var lat = match[1] ? parseFloat(match[1]) : parseFloat(match[3]);
                        var lng = match[2] ? parseFloat(match[2]) : parseFloat(match[4]);

                        if (!isNaN(lat) && !isNaN(lng)) {
                            createMap.setView([lat, lng], 16);
                            createMarker.setLatLng([lat, lng]);
                            document.getElementById('create_inputLat').value = lat.toFixed(6);
                            document.getElementById('create_inputLng').value = lng.toFixed(6);
                            document.getElementById('create_displayLat').innerText = lat.toFixed(6);
                            document.getElementById('create_displayLng').innerText = lng.toFixed(6);
                        }
                    }
                });
            }
            createMap.invalidateSize(); // Memastikan peta render sempurna di dalam modal
        }, 10);
    }

    function closeCreateModal() {
        const modal = document.getElementById('createModal');
        const content = document.getElementById('createModalContent');
        modal.classList.add('opacity-0');
        content.classList.remove('scale-100');
        content.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    // Script Buka Tutup Modal Edit via AJAX
    function openEditModal(url) {
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
                container.innerHTML = html;
            }).catch(err => {
                container.innerHTML = '<p class="text-red-500 text-center py-4">A system error occurred.</p>';
            });
    }

    function closeEditModal() {
        const modal = document.getElementById('editModal');
        const content = document.getElementById('editModalContent');
        modal.classList.add('opacity-0');
        content.classList.remove('scale-100');
        content.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
        document.getElementById('editFormContainer').innerHTML = '';
    }

    // Script Konfirmasi Hapus
    let actionToExecute = null;

    function closeDeleteModal() {
        const modal = document.getElementById('deleteModal');
        const content = document.getElementById('deleteModalContent');
        modal.classList.add('opacity-0');
        content.classList.remove('scale-100');
        content.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
        if (typeof actionToExecute === 'function') {
            actionToExecute();
        }
    });

    document.querySelectorAll('.btn-delete-kuliner').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.dataset.id;
            actionToExecute = function() {
                document.getElementById(`delete-kuliner-form-${id}`).submit();
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
</script>

{{-- ========================================== --}}
{{-- 🌟 TAMBAHAN BARU: SCRIPT SETTINGS, PENGGUNA & FEEDBACK 🌟 --}}
{{-- ========================================== --}}
<script>
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
            feedback: "Feedback",
            pengaturan: "Pengaturan",
            keluar: "Keluar",
            
            // Settings
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

            // Modals
            kelola_pengguna: "Kelola Pengguna",
            nama: "Nama",
            aksi: "Aksi",
            tutup: "Tutup",
            hapus_kuliner: "Hapus Kuliner?",
            peringatan_hapus_kuliner: "Data kuliner ini akan dihapus permanen.",
            hapus_pengguna: "Hapus Pengguna?",
            peringatan_hapus_pengguna: "Akun pengguna ini akan dihapus permanen.",
            batal: "Batal",
            ya_hapus: "Ya, Hapus",
            
            // Feedback
            daftar_feedback: "Daftar Feedback Pengguna",
            pengirim: "Pengirim",
            subjek: "Subjek",
            pesan: "Pesan",
            tanggal: "Tanggal",
            status: "Status",
            tandai_dibaca: "Tandai Dibaca",
            dibaca: "Dibaca"
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
            feedback: "Feedback",
            pengaturan: "Settings",
            keluar: "Logout",
            
            // Settings
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

            // Modals
            kelola_pengguna: "Manage Users",
            nama: "Name",
            aksi: "Action",
            tutup: "Close",
            hapus_kuliner: "Delete Culinary?",
            peringatan_hapus_kuliner: "This culinary data will be permanently deleted.",
            hapus_pengguna: "Delete User?",
            peringatan_hapus_pengguna: "This user account will be permanently deleted.",
            batal: "Cancel",
            ya_hapus: "Yes, Delete",

            // Feedback
            daftar_feedback: "User Feedback List",
            pengirim: "Sender",
            subjek: "Subject",
            pesan: "Message",
            tanggal: "Date",
            status: "Status",
            tandai_dibaca: "Mark as Read",
            dibaca: "Read"
        }
    };

    document.addEventListener('DOMContentLoaded', function() {

        var appData = document.getElementById('app-data');
        var currentUserId = appData ? parseInt(appData.dataset.userId) : 0;
        var apiUrl = appData ? appData.dataset.apiUrl : '';
        var csrfToken = appData ? appData.dataset.csrf : '';

        // Reset teks modal hapus setiap klik hapus kuliner (biar nggak nyangkut teks "Hapus Pengguna?")
        document.querySelectorAll('.btn-delete-kuliner').forEach(button => {
            button.addEventListener('click', function() {
                const lang = localStorage.getItem('language') || 'id';
                document.getElementById('deleteModalTitle').innerText = translations[lang].hapus_kuliner;
                document.getElementById('deleteModalText').innerText = translations[lang].peringatan_hapus_kuliner;
            });
        });

        window.togglePassword = function() {
            const input = document.getElementById('passwordInput');
            const icon = document.getElementById('toggleIcon');
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

        window.updateThemeUI = function(theme) {
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
        };

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

        const savedLang = localStorage.getItem('language') || 'id';
        changeLanguage(savedLang);
        const savedTheme = localStorage.getItem('theme') || 'system';
        setTheme(savedTheme);

        // ==========================================
        // MODAL PENGGUNA
        // ==========================================
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

        // ==========================================
        // MODAL FEEDBACK ADMIN
        // ==========================================
        window.openAdminFeedbackModal = function() {
            const modal = document.getElementById('adminFeedbackModal');
            const content = document.getElementById('adminFeedbackModalContent');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                content.classList.remove('scale-95');
                content.classList.add('scale-100');
            }, 10);

            const tbody = document.getElementById('feedbackTableBody');
            tbody.innerHTML = '<tr><td colspan="5" class="text-center py-6 text-slate-500"><i class="fas fa-spinner fa-spin mr-2"></i> Memuat data feedback...</td></tr>';

            fetch("{{ route('admin.feedback.api') }}")
                .then(res => res.json())
                .then(data => {
                    let html = '';
                    if (data.length > 0) {
                        data.forEach(fb => {
                            const date = new Date(fb.created_at).toLocaleString('id-ID');
                            const isRead = fb.is_read;
                            const rowClass = isRead ? 'opacity-60 bg-slate-50 dark:bg-[#11211d]' : 'hover:bg-slate-50 dark:hover:bg-[#11211d]';
                            const actionBtn = isRead ?
                                `<span class="text-xs text-emerald-500 flex items-center justify-center gap-1 font-bold"><i class="fas fa-check-circle"></i> ${translations[localStorage.getItem('language') || 'id'].dibaca}</span>` :
                                `<button onclick="markFeedbackRead(${fb.id}, this)" class="px-3 py-1.5 bg-emerald-100 text-emerald-700 hover:bg-emerald-200 dark:bg-emerald-900/30 dark:text-emerald-400 rounded-lg transition text-xs font-bold flex items-center justify-center gap-1 mx-auto"><i class="fas fa-check"></i> ${translations[localStorage.getItem('language') || 'id'].tandai_dibaca}</button>`;

                            html += `
                                <tr class="transition-all duration-300 ${rowClass}">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-full bg-emerald-500 text-white flex items-center justify-center font-bold text-xs shrink-0">${fb.user.name.charAt(0).toUpperCase()}</div>
                                            <span class="font-bold text-slate-800 dark:text-white text-sm">${fb.user.name}</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm font-semibold text-slate-700 dark:text-slate-300">${fb.subject}</td>
                                    <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-400">${fb.message}</td>
                                    <td class="px-4 py-3 text-xs text-slate-500">${date}</td>
                                    <td class="px-4 py-3 text-center">${actionBtn}</td>
                                </tr>
                            `;
                        });
                    } else {
                        html = '<tr><td colspan="5" class="text-center py-6 text-slate-500">Belum ada feedback.</td></tr>';
                    }
                    tbody.innerHTML = html;
                })
                .catch(err => {
                    tbody.innerHTML = '<tr><td colspan="5" class="text-center py-6 text-red-500">Gagal memuat data.</td></tr>';
                });
        };

        window.closeAdminFeedbackModal = function() {
            const modal = document.getElementById('adminFeedbackModal');
            const content = document.getElementById('adminFeedbackModalContent');
            modal.classList.add('opacity-0');
            content.classList.remove('scale-100');
            content.classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        };

        window.markFeedbackRead = function(id, btnElement) {
            const originalHtml = btnElement.innerHTML;
            btnElement.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
            btnElement.disabled = true;

            fetch(`/admin/feedback/read/${id}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        const tr = btnElement.closest('tr');
                        tr.classList.add('opacity-60', 'bg-slate-50', 'dark:bg-[#11211d]');
                        tr.classList.remove('hover:bg-slate-50', 'dark:hover:bg-[#11211d]');

                        const td = btnElement.parentElement;
                        td.innerHTML = `<span class="text-xs text-emerald-500 flex items-center justify-center gap-1 font-bold"><i class="fas fa-check-circle"></i> ${translations[localStorage.getItem('language') || 'id'].dibaca}</span>`;
                    } else {
                        btnElement.innerHTML = originalHtml;
                        btnElement.disabled = false;
                        alert('Gagal mengubah status');
                    }
                })
                .catch(err => {
                    console.error(err);
                    btnElement.innerHTML = originalHtml;
                    btnElement.disabled = false;
                    alert('Terjadi kesalahan sistem');
                });
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
</script>
@endsection