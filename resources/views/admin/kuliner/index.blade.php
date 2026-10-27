@extends('layouts.app')

@section('title', 'Kelola Kuliner - Admin')

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

    .animate-fade-in-up {
        animation: fadeInUp 0.5s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    }

    .sidebar-link {
        transition: all 0.2s ease-in-out;
    }

    .sidebar-link:hover {
        transform: translateX(5px);
        background-color: rgba(16, 185, 129, 0.1);
        color: #10b981;
    }

    .dark .sidebar-link:hover {
        background-color: rgba(16, 185, 129, 0.2);
        color: #34d399;
    }
</style>

<div class="flex flex-col md:flex-row min-h-[calc(100vh-80px)] bg-slate-50 dark:bg-[#0b1120] text-slate-800 dark:text-white transition-colors duration-300">

    {{-- SIDEBAR KIRI --}}
    <aside class="w-full md:w-64 bg-white dark:bg-[#0f172a] border-r border-slate-200 dark:border-slate-800 flex flex-col shrink-0 transition-colors duration-300">
        <div class="p-6 border-b border-slate-200 dark:border-slate-800 transition-colors duration-300">
            <h2 class="font-bold text-lg text-slate-900 dark:text-white transition-colors">Menu Admin</h2>
            <p class="text-xs text-slate-500 dark:text-slate-400 transition-colors">Kelola Konten</p>
        </div>

        <div class="flex-1 overflow-y-auto py-6 px-4">
            <p class="text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-4 px-2">Utama</p>
            <nav class="space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-600 text-white shadow-sm' : 'text-slate-600 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                    <i class="fas fa-th-large text-sm w-5 text-center"></i>
                    <span class="font-medium text-sm">Dashboard</span>
                </a>
                <a href="{{ route('admin.destinasi.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-colors {{ request()->routeIs('admin.destinasi.*') ? 'bg-emerald-600 text-white shadow-sm' : 'text-slate-600 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                    <i class="fas fa-map-marker-alt text-sm w-5 text-center"></i>
                    <span class="font-medium text-sm">Destinasi</span>
                </a>
                <a href="{{ route('admin.budaya.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-colors {{ request()->routeIs('admin.budaya.*') ? 'bg-emerald-600 text-white shadow-sm' : 'text-slate-600 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                    <i class="fas fa-masks-theater text-sm w-5 text-center"></i>
                    <span class="font-medium text-sm">Budaya</span>
                </a>
                <a href="{{ route('admin.kuliner.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-colors {{ request()->routeIs('admin.kuliner.*') ? 'bg-emerald-600 text-white shadow-sm' : 'text-slate-600 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                    <i class="fas fa-utensils text-sm w-5 text-center"></i>
                    <span class="font-medium text-sm">Kuliner</span>
                </a>
                <a href="{{ route('peta.index') }}" target="_blank" class="flex items-center gap-3 px-3 py-2.5 text-slate-600 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors">
                    <i class="fas fa-map text-sm w-5 text-center"></i>
                    <span class="font-medium text-sm">Peta</span>
                </a>
                <button onclick="openUsersModal()" class="w-full sidebar-link flex items-center gap-3 px-3 py-2.5 text-slate-600 dark:text-slate-400 rounded-lg text-left">
                    <i class="fas fa-users text-sm w-5 text-center"></i>
                    <span class="font-medium text-sm">Pengguna</span>
                </button>
            </nav>
        </div>

        <div class="p-4 border-t border-slate-200 dark:border-slate-800 transition-colors duration-300">
            <button onclick="openSettingsModal()" class="w-full flex items-center gap-3 px-3 py-2.5 text-slate-600 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors text-left">
                <i class="fas fa-cog text-sm w-5 text-center"></i>
                <span class="font-medium text-sm">Pengaturan</span>
            </button>
        </div>
    </aside>

    {{-- KONTEN KANAN --}}
    <main class="flex-1 p-6 md:p-10 animate-fade-in-up">
        <div class="container mx-auto max-w-6xl">
            <div class="flex flex-col md:flex-row items-center justify-between mb-8 gap-4">
                <div>
                    <h1 class="text-3xl font-black text-slate-900 dark:text-white">Kelola Kuliner</h1>
                    <p class="text-slate-500 dark:text-slate-400 mt-1">Daftar kuliner khas di Explore Sumatera.</p>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('admin.dashboard') }}" class="bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 px-5 py-2.5 rounded-xl font-bold hover:bg-slate-300 dark:hover:bg-slate-700 transition">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali
                    </a>
                    <a href="{{ route('admin.kuliner.create') }}" class="bg-orange-600 hover:bg-orange-500 text-white px-5 py-2.5 rounded-xl font-bold transition shadow-lg shadow-orange-600/30">
                        <i class="fas fa-plus mr-2"></i> Tambah Kuliner
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
                                <th class="px-6 py-4 border-b border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-[#0f172a]">Nama Kuliner</th>
                                <th class="px-6 py-4 border-b border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-[#0f172a]">Kabupaten</th>
                                <th class="px-6 py-4 border-b border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-[#0f172a]">Jenis</th>
                                <th class="px-6 py-4 border-b border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-[#0f172a]">Harga</th>
                                <th class="px-6 py-4 border-b border-slate-200 dark:border-slate-800 text-center bg-slate-50 dark:bg-[#0f172a]">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                            @forelse($kuliners as $index => $item)
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition group">
                                <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-300">{{ $kuliners->firstItem() + $index }}</td>
                                <td class="px-6 py-4">
                                    <div class="overflow-hidden rounded-lg w-16 h-16 border border-slate-200 dark:border-slate-700">
                                        <img src="{{ str_starts_with($item->gambar, 'http') ? $item->gambar : asset('storage/'.$item->gambar) }}" alt="{{ $item->nama }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-bold text-slate-800 dark:text-white text-sm">{{ $item->nama }}</td>
                                <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-300">{{ $item->kabupaten->nama ?? '-' }}</td>
                                <td class="px-6 py-4">
                                    <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded-md bg-orange-100 text-orange-700 dark:bg-orange-900/30 dark:text-orange-400">{{ $item->jenis }}</span>
                                </td>
                                <td class="px-6 py-4 text-sm font-semibold text-slate-800 dark:text-white">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button type="button" data-url="{{ route('admin.kuliner.edit', $item->id) }}" onclick="openEditModal(this.dataset.url)" class="w-8 h-8 rounded-lg bg-blue-50 dark:bg-blue-950/30 text-blue-600 dark:text-blue-400 flex items-center justify-center hover:bg-blue-100 hover:scale-110 transition-all" title="Edit">
                                            <i class="fas fa-edit text-sm"></i>
                                        </button>
                                        <button class="btn-delete-kuliner w-8 h-8 rounded-lg bg-red-50 dark:bg-red-950/30 text-red-600 dark:text-red-400 flex items-center justify-center hover:bg-red-100 hover:scale-110 transition-all" data-id="{{ $item->id }}" title="Hapus">
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
                                <td colspan="7" class="px-6 py-10 text-center text-slate-500 dark:text-slate-400">Belum ada data kuliner.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="p-4 border-t border-slate-200 dark:border-slate-800 bg-white dark:bg-[#0f172a] rounded-b-2xl shrink-0">
                    {{ $kuliners->links() }}
                </div>
            </div>
        </div>
    </main>
</div>

<div id="app-data" data-user-id="{{ auth()->id() }}" data-api-url="{{ route('admin.pengguna.api') }}" data-csrf="{{ csrf_token() }}" style="display: none;"></div>

<!-- MODAL EDIT -->
<div id="editModal" class="fixed inset-0 z-[1000] hidden bg-slate-900/60 backdrop-blur-sm flex items-center justify-center opacity-0 transition-opacity duration-300">
    <div id="editModalContent" class="bg-white dark:bg-[#0f172a] rounded-3xl p-6 md:p-8 max-w-3xl w-full mx-4 shadow-2xl border border-slate-200 dark:border-slate-800 transform scale-95 transition-transform duration-300 max-h-[90vh] overflow-y-auto relative">
        <div class="flex justify-between items-center mb-6 sticky top-0 bg-white dark:bg-[#0f172a] z-10 pb-4 border-b border-slate-200 dark:border-slate-800">
            <h3 class="text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2"><i class="fas fa-edit text-emerald-500"></i> Edit Data Kuliner</h3>
            <button onclick="closeEditModal()" type="button" class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-500 hover:bg-slate-200 transition"><i class="fas fa-times"></i></button>
        </div>
        <div id="editFormContainer" class="text-slate-800 dark:text-white"></div>
    </div>
</div>

<!-- MODAL PENGATURAN -->
<div id="settingsModal" class="fixed inset-0 z-[999] hidden bg-slate-900/60 backdrop-blur-sm flex items-center justify-center opacity-0 transition-opacity duration-300">
    <div id="settingsModalContent" class="bg-white dark:bg-[#0f172a] rounded-3xl p-6 md:p-8 max-w-md w-full mx-4 shadow-2xl border border-slate-200 dark:border-slate-800 transform scale-95 transition-transform duration-300">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2"><i class="fas fa-cog text-emerald-500"></i> Pengaturan</h3>
            <button onclick="closeSettingsModal()" class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-500 hover:bg-slate-200 transition"><i class="fas fa-times"></i></button>
        </div>
        <div class="space-y-4 mb-8">
            <div>
                <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Nama Website</label>
                <input type="text" value="Explore Sumatera" class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
            </div>
        </div>
        <div class="flex gap-3">
            <button type="button" onclick="closeSettingsModal()" class="flex-1 px-4 py-3 rounded-xl font-bold text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 transition">Batal</button>
            <button type="button" onclick="closeSettingsModal()" class="flex-1 px-4 py-3 rounded-xl font-bold text-white bg-emerald-600 hover:bg-emerald-500 transition">Simpan</button>
        </div>
    </div>
</div>

<!-- MODAL PENGGUNA -->
<div id="usersModal" class="fixed inset-0 z-[999] hidden bg-slate-900/60 backdrop-blur-sm flex items-center justify-center opacity-0 transition-opacity duration-300">
    <div id="usersModalContent" class="bg-white dark:bg-[#0f172a] rounded-3xl p-6 md:p-8 max-w-3xl w-full mx-4 shadow-2xl border border-slate-200 dark:border-slate-800 transform scale-95 transition-transform duration-300">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2"><i class="fas fa-users text-emerald-500"></i> Kelola Pengguna</h3>
            <button onclick="closeUsersModal()" class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-500 hover:bg-slate-200 transition"><i class="fas fa-times"></i></button>
        </div>
        <div class="overflow-auto max-h-[60vh] rounded-xl border border-slate-200 dark:border-slate-800 mb-6">
            <table class="w-full text-left border-collapse relative">
                <thead class="bg-slate-50 dark:bg-slate-800/50 text-slate-500 dark:text-slate-400 text-xs uppercase font-bold sticky top-0 z-10">
                    <tr>
                        <th class="px-4 py-3 border-b border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-[#0f172a]">Nama</th>
                        <th class="px-4 py-3 border-b border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-[#0f172a]">Email</th>
                        <th class="px-4 py-3 border-b border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-[#0f172a]">Role</th>
                        <th class="px-4 py-3 border-b border-slate-200 dark:border-slate-800 text-center bg-slate-50 dark:bg-[#0f172a]">Aksi</th>
                    </tr>
                </thead>
                <tbody id="usersTableBody" class="divide-y divide-slate-100 dark:divide-slate-800">
                    <tr>
                        <td colspan="4" class="text-center py-6 text-slate-500">Memuat data...</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="flex justify-end">
            <button type="button" onclick="closeUsersModal()" class="px-6 py-2.5 rounded-xl font-bold text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 transition">Tutup</button>
        </div>
    </div>
</div>

<!-- MODAL KONFIRMASI HAPUS -->
<div id="deleteModal" class="fixed inset-0 z-[1000] hidden bg-slate-900/60 backdrop-blur-sm flex items-center justify-center opacity-0 transition-opacity duration-300">
    <div id="deleteModalContent" class="bg-white dark:bg-[#0f172a] rounded-3xl p-6 md:p-8 max-w-sm w-full mx-4 shadow-2xl border border-slate-200 dark:border-slate-800 transform scale-95 transition-transform duration-300">
        <div class="w-16 h-16 rounded-full bg-red-100 dark:bg-red-900/30 flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-exclamation-triangle text-2xl text-red-600 dark:text-red-400"></i>
        </div>
        <h3 id="deleteModalTitle" class="text-xl font-bold text-center text-slate-900 dark:text-white mb-2">Hapus Data?</h3>
        <p id="deleteModalText" class="text-center text-slate-500 dark:text-slate-400 text-sm mb-6 leading-relaxed">Tindakan ini tidak dapat dibatalkan.</p>
        <div class="flex gap-3">
            <button type="button" onclick="closeDeleteModal()" class="flex-1 px-4 py-2.5 rounded-xl font-bold text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 transition">Batal</button>
            <button type="button" id="confirmDeleteBtn" class="flex-1 px-4 py-2.5 rounded-xl font-bold text-white bg-red-600 hover:bg-red-500 transition shadow-lg shadow-red-600/30">Ya, Hapus</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var appData = document.getElementById('app-data');
        var currentUserId = parseInt(appData.dataset.userId);
        var apiUrl = appData.dataset.apiUrl;
        var csrfToken = appData.dataset.csrf;

        function showModal(modalId, contentId) {
            const modal = document.getElementById(modalId);
            const content = document.getElementById(contentId);
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                content.classList.remove('scale-95');
                content.classList.add('scale-100');
            }, 10);
        }

        function hideModal(modalId, contentId) {
            const modal = document.getElementById(modalId);
            const content = document.getElementById(contentId);
            modal.classList.add('opacity-0');
            content.classList.remove('scale-100');
            content.classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        window.openEditModal = function(url) {
            showModal('editModal', 'editModalContent');
            const container = document.getElementById('editFormContainer');
            container.innerHTML = '<div class="text-center py-10"><i class="fas fa-spinner fa-spin text-3xl text-emerald-500"></i><p class="mt-4 text-slate-500">Memuat formulir...</p></div>';

            fetch(url)
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');

                    // 🌟 FIX: Hanya ambil form dengan enctype multipart (form edit), BUKAN form logout 🌟
                    const form = doc.querySelector('form[enctype="multipart/form-data"]') || doc.querySelector('form[action*="update"]');

                    if (form) {
                        container.innerHTML = '';
                        container.appendChild(form);
                    } else {
                        container.innerHTML = '<p class="text-red-500 text-center py-4">Gagal memuat formulir.</p>';
                    }
                })
                .catch(err => {
                    container.innerHTML = '<p class="text-red-500 text-center py-4">Terjadi kesalahan sistem.</p>';
                });
        };

        window.closeEditModal = function() {
            hideModal('editModal', 'editModalContent');
            document.getElementById('editFormContainer').innerHTML = '';
        };

        window.openSettingsModal = function() {
            showModal('settingsModal', 'settingsModalContent');
        };
        window.closeSettingsModal = function() {
            hideModal('settingsModal', 'settingsModalContent');
        };

        window.openUsersModal = function() {
            showModal('usersModal', 'usersModalContent');
            const tbody = document.getElementById('usersTableBody');
            tbody.innerHTML = '<tr><td colspan="4" class="text-center py-6 text-slate-500"><i class="fas fa-spinner fa-spin mr-2"></i> Memuat data...</td></tr>';
            fetch(apiUrl).then(response => response.json()).then(users => {
                let html = '';
                users.forEach(user => {
                    let roleBadge = user.role === 'admin' ? '<span class="text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded-md bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400">ADMIN</span>' : '<span class="text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded-md bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400">USER</span>';
                    let actionBtn = user.id !== currentUserId ? `<button onclick="confirmDeleteUser(${user.id})" class="w-8 h-8 rounded-lg bg-red-50 dark:bg-red-950/30 text-red-600 dark:text-red-400 flex items-center justify-center hover:bg-red-100 transition mx-auto" title="Hapus"><i class="fas fa-trash text-sm"></i></button>` : `<span class="text-[10px] text-slate-400">Anda</span>`;
                    html += `
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition">
                            <td class="px-4 py-3"><div class="flex items-center gap-3"><div class="w-8 h-8 rounded-full bg-gradient-to-br from-emerald-500 to-green-600 flex items-center justify-center text-white font-bold text-xs shrink-0">${user.name.charAt(0).toUpperCase()}</div><span class="font-bold text-slate-800 dark:text-white text-sm">${user.name}</span></div></td>
                            <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-300">${user.email}</td>
                            <td class="px-4 py-3">${roleBadge}</td>
                            <td class="px-4 py-3 text-center">${actionBtn}</td>
                        </tr>
                    `;
                });
                tbody.innerHTML = html;
            }).catch(err => {
                tbody.innerHTML = '<tr><td colspan="4" class="text-center py-6 text-red-500">Gagal memuat.</td></tr>';
            });
        };
        window.closeUsersModal = function() {
            hideModal('usersModal', 'usersModalContent');
        };

        let actionToExecute = null;
        const deleteModalTitle = document.getElementById('deleteModalTitle');
        const deleteModalText = document.getElementById('deleteModalText');
        const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');

        document.querySelectorAll('.btn-delete-kuliner').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.dataset.id;
                deleteModalTitle.innerText = "Hapus Kuliner?";
                deleteModalText.innerText = "Data kuliner beserta gambarnya akan dihapus secara permanen.";
                actionToExecute = function() {
                    document.getElementById(`delete-kuliner-form-${id}`).submit();
                };
                showModal('deleteModal', 'deleteModalContent');
            });
        });

        window.confirmDeleteUser = function(id) {
            deleteModalTitle.innerText = "Hapus Pengguna?";
            deleteModalText.innerText = "Akun pengguna ini akan dihapus permanen.";
            actionToExecute = function() {
                fetch(`/admin/pengguna/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    }
                }).then(() => {
                    closeDeleteModal();
                    openUsersModal();
                });
            };
            showModal('deleteModal', 'deleteModalContent');
        };

        confirmDeleteBtn.addEventListener('click', function() {
            if (typeof actionToExecute === 'function') {
                actionToExecute();
                if (deleteModalTitle.innerText === "Hapus Kuliner?") closeDeleteModal();
            }
        });
        window.closeDeleteModal = function() {
            hideModal('deleteModal', 'deleteModalContent');
            actionToExecute = null;
        };
    });
</script>
@endsection