@extends('layouts.app')

@section('title', 'Kelola Pengguna - Admin')

@section('content')
<div class="container mx-auto px-6 py-12">

    <!-- Header Halaman -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-black text-gray-900 dark:text-white tracking-tight">Kelola Pengguna</h1>
            <p class="text-gray-500 dark:text-slate-400 mt-1">Daftar semua pengguna yang terdaftar di Explore Sumatera.</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-2 bg-slate-800 hover:bg-slate-700 text-white px-5 py-2.5 rounded-xl font-bold transition text-sm">
            <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
        </a>
    </div>

    <!-- Notifikasi (Hanya muncul jika ada session success/error) -->
    @if(session('success'))
    <div id="notif-alert" class="bg-emerald-100 border border-emerald-400 text-emerald-700 px-4 py-3 rounded-xl mb-6 shadow-sm">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div id="notif-alert" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-6 shadow-sm">
        {{ session('error') }}
    </div>
    @endif

    <!-- Tabel Pengguna -->
    <div class="bg-white dark:bg-slate-900 border border-gray-100 dark:border-slate-800 rounded-2xl overflow-hidden shadow-xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 dark:bg-slate-800/50 text-gray-500 dark:text-slate-400 text-xs uppercase tracking-wider font-bold">
                    <tr>
                        <th class="px-6 py-4 border-b border-gray-100 dark:border-slate-800">No</th>
                        <th class="px-6 py-4 border-b border-gray-100 dark:border-slate-800">Nama</th>
                        <th class="px-6 py-4 border-b border-gray-100 dark:border-slate-800">Email</th>
                        <th class="px-6 py-4 border-b border-gray-100 dark:border-slate-800">Role</th>
                        <th class="px-6 py-4 border-b border-gray-100 dark:border-slate-800">Bergabung</th>
                        <th class="px-6 py-4 border-b border-gray-100 dark:border-slate-800 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-slate-800">
                    @forelse($users as $index => $user)
                    <tr class="hover:bg-gray-50 dark:hover:bg-slate-800/30 transition">
                        <!-- Kolom No -->
                        <td class="px-6 py-4 text-sm text-gray-600 dark:text-slate-300">
                            {{ $users->firstItem() + $index }}
                        </td>

                        <!-- Kolom Nama -->
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-emerald-500 to-green-600 flex items-center justify-center text-white font-bold text-xs shrink-0">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <span class="font-bold text-gray-900 dark:text-white text-sm">{{ $user->name }}</span>
                            </div>
                        </td>

                        <!-- Kolom Email -->
                        <td class="px-6 py-4 text-sm text-gray-600 dark:text-slate-300">
                            {{ $user->email }}
                        </td>

                        <!-- Kolom Role -->
                        <td class="px-6 py-4">
                            <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded-full
                                    {{ $user->role === 'admin' 
                                        ? 'bg-amber-100 text-amber-700 dark:bg-amber-950 dark:text-amber-400' 
                                        : 'bg-emerald-100 text-emerald-700 dark:bg-emerald-950 dark:text-emerald-400' }}">
                                {{ $user->role }}
                            </span>
                        </td>

                        <!-- Kolom Tanggal Bergabung -->
                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-slate-400">
                            {{ $user->created_at->format('d M Y') }}
                        </td>

                        <!-- Kolom Aksi (Tombol Hapus) -->
                        <td class="px-6 py-4 text-center">
                            @if(Auth::id() !== $user->id)
                            <form action="{{ route('admin.pengguna.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengguna ini?');" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-8 h-8 rounded-lg bg-red-50 dark:bg-red-950/30 text-red-600 dark:text-red-400 flex items-center justify-center hover:bg-red-100 dark:hover:bg-red-900/50 transition mx-auto" title="Hapus Pengguna">
                                    <i class="fas fa-trash text-sm"></i>
                                </button>
                            </form>
                            @else
                            <span class="text-[10px] font-bold text-slate-400 bg-slate-100 dark:bg-slate-800 px-2 py-1 rounded-md uppercase tracking-wider inline-block">
                                Anda
                            </span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-10 text-center text-gray-500 dark:text-slate-400">
                            Belum ada pengguna terdaftar.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-4 border-t border-gray-100 dark:border-slate-800">
            {{ $users->links() }}
        </div>
    </div>
</div>

<!-- Script untuk menghilangkan notif otomatis setelah 2 detik -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var notif = document.getElementById('notif-alert');
        if (notif) {
            setTimeout(function() {
                notif.style.transition = 'opacity 0.5s ease';
                notif.style.opacity = '0';

                // Hilangkan elemen sepenuhnya setelah efek pudar selesai
                setTimeout(function() {
                    notif.remove();
                }, 500);
            }, 2000); // 2000 milidetik = 2 detik
        }
    });
</script>
@endsection