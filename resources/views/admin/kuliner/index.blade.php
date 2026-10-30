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
            </nav>
        </div>

        <!-- 🌟 PENGATURAN & KELUAR (SUDAH DIPERBAIKI) 🌟 -->
        <div class="p-4 border-t border-slate-200 dark:border-[#1a2e29] space-y-1 shrink-0">
            <button onclick="openSettingsModal()" class="w-full flex items-center gap-3 px-3 py-2.5 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-[#11211d] rounded-lg text-left">
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
                <div class="mb-6">
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Link Google Maps (Opsional)</label>
                    <input type="text" name="link_maps" placeholder="Contoh: https://maps.app.goo.gl/..." class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-[#1a2e29] bg-slate-50 dark:bg-[#11211d] text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
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

    // Script Buka Tutup Modal Create
    function openCreateModal() {
        const modal = document.getElementById('createModal');
        const content = document.getElementById('createModalContent');
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            content.classList.remove('scale-95');
            content.classList.add('scale-100');
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
@endsection