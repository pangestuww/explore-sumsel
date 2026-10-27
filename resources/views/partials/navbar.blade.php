<nav class="bg-white dark:bg-slate-900 shadow-sm sticky top-0 z-50 border-b border-gray-100 dark:border-slate-800 transition-colors duration-300">
    <div class="container mx-auto px-6 py-4 flex items-center justify-between">

        {{-- Logo --}}
        <a href="{{ route('home') }}" class="flex items-center gap-2 group">
            <div class="w-10 h-10 bg-gradient-to-br from-green-600 to-green-800 rounded-xl flex items-center justify-center shadow-lg shadow-green-600/20 group-hover:scale-105 transition-transform">
                <i class="fas fa-leaf text-white text-lg"></i>
            </div>
            <span class="font-extrabold text-xl text-gray-900 dark:text-white tracking-tight">
                Explore<span class="text-green-700 dark:text-green-400">Sumatera</span>
            </span>
        </a>

        {{-- Menu --}}
        <div class="hidden md:flex items-center gap-1 text-gray-700 dark:text-slate-300 text-sm font-semibold">
            <a href="{{ route('home') }}" class="px-4 py-2 rounded-lg transition {{ request()->routeIs('home') ? 'text-green-700 dark:text-green-400 bg-green-50 dark:bg-emerald-950' : 'hover:text-green-700 dark:hover:text-green-400 hover:bg-gray-50 dark:hover:bg-slate-800' }}" data-i18n="nav_home">Beranda</a>
            <a href="{{ route('destinasi.index') }}" class="px-4 py-2 rounded-lg transition {{ request()->routeIs('destinasi.*') ? 'text-green-700 dark:text-green-400 bg-green-50 dark:bg-emerald-950' : 'hover:text-green-700 dark:hover:text-green-400 hover:bg-gray-50 dark:hover:bg-slate-800' }}" data-i18n="nav_destinasi">Destinasi</a>
            <a href="{{ route('budaya.index') }}" class="px-4 py-2 rounded-lg transition {{ request()->routeIs('budaya.*') ? 'text-green-700 dark:text-green-400 bg-green-50 dark:bg-emerald-950' : 'hover:text-green-700 dark:hover:text-green-400 hover:bg-gray-50 dark:hover:bg-slate-800' }}" data-i18n="nav_budaya">Budaya</a>
            <a href="{{ route('kuliner.index') }}" class="px-4 py-2 rounded-lg transition {{ request()->routeIs('kuliner.*') ? 'text-green-700 dark:text-green-400 bg-green-50 dark:bg-emerald-950' : 'hover:text-green-700 dark:hover:text-green-400 hover:bg-gray-50 dark:hover:bg-slate-800' }}" data-i18n="nav_kuliner">Kuliner</a>
            <a href="{{ route('peta.index') }}" class="px-4 py-2 rounded-lg transition {{ request()->routeIs('peta.*') ? 'text-green-700 dark:text-green-400 bg-green-50 dark:bg-emerald-950' : 'hover:text-green-700 dark:hover:text-green-400 hover:bg-gray-50 dark:hover:bg-slate-800' }}" data-i18n="nav_peta">Peta</a>
        </div>

        {{-- Right Actions --}}
        <div class="flex items-center gap-2">

            {{-- 🌟 SEARCH BUTTON 🌟 --}}
            <a href="{{ route('destinasi.index') }}" class="w-10 h-10 rounded-full bg-gray-100 dark:bg-slate-800 flex items-center justify-center hover:bg-gray-200 dark:hover:bg-slate-700 transition cursor-pointer" title="Cari">
                <i class="fas fa-search text-gray-600 dark:text-slate-300 text-sm"></i>
            </a>

            {{-- 🌟 FITUR NOTIFIKASI LONCENG 🌟 --}}
            @auth
            <div class="relative">
                <button id="navNotifBtn" type="button" class="w-10 h-10 rounded-full bg-gray-100 dark:bg-slate-800 flex items-center justify-center hover:bg-gray-200 dark:hover:bg-slate-700 transition relative">
                    <i class="fas fa-bell text-gray-600 dark:text-slate-300 text-sm"></i>
                    <span id="navNotifDot" class="hidden absolute top-2 right-2 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-white dark:border-slate-900 animate-pulse"></span>
                </button>

                <div id="navNotifDropdown" class="hidden absolute right-0 mt-3 w-80 bg-white dark:bg-slate-900 rounded-xl shadow-2xl border border-gray-100 dark:border-slate-800 z-[100] overflow-hidden transition-all duration-200">
                    <div class="p-4 border-b border-gray-100 dark:border-slate-800 flex justify-between items-center bg-gray-50 dark:bg-slate-800/50">
                        <h3 class="font-bold text-gray-800 dark:text-white text-sm" data-i18n="notif_title">Notifikasi</h3>
                        <span id="navNotifCount" class="text-xs text-emerald-600 dark:text-emerald-400 font-semibold">Memuat...</span>
                    </div>
                    <div id="navNotifList" class="max-h-80 overflow-y-auto custom-scrollbar">
                        <div class="p-6 text-center text-sm text-gray-500"><i class="fas fa-spinner fa-spin text-xl mb-2 text-emerald-500"></i><br>Memuat notifikasi...</div>
                    </div>
                </div>
            </div>
            @endauth

            {{-- Auth --}}
            @auth
            <div class="flex items-center gap-2">
                <a href="{{ Auth::user()->isAdmin() ? route('admin.dashboard') : route('dashboard') }}" class="flex items-center gap-2 bg-green-700 hover:bg-green-800 text-white pl-2 pr-4 py-1.5 rounded-full transition shadow-md shadow-green-700/20">
                    @if(Auth::user()->avatar)
                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Avatar" class="w-7 h-7 rounded-full object-cover shadow-sm">
                    @else
                    <div class="w-7 h-7 rounded-full bg-white/20 flex items-center justify-center text-xs font-black">
                        {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                    </div>
                    @endif
                    <span class="hidden sm:inline text-sm font-bold" data-i18n="nav_dashboard">
                        {{ Auth::user()->isAdmin() ? 'Admin' : 'Dashboard' }}
                    </span>
                </a>
            </div>
            @else
            <a href="{{ route('login') }}" class="inline-flex items-center gap-2 bg-green-700 hover:bg-green-800 text-white px-5 py-2.5 rounded-lg transition font-bold text-sm shadow-md shadow-green-700/20" data-i18n="nav_login">
                <i class="fas fa-sign-in-alt text-xs"></i> Masuk
            </a>
            @endauth
        </div>
    </div>
</nav>

<!-- Gaya Scrollbar Custom untuk Notifikasi -->
<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background-color: #cbd5e1;
        border-radius: 10px;
    }

    .dark .custom-scrollbar::-webkit-scrollbar-thumb {
        background-color: #475569;
    }
</style>

{{-- 🌟 SCRIPT GLOBAL: TEMA 🌟 --}}
<script>
    (function() {
        var html = document.documentElement;
        var savedTheme = localStorage.getItem('theme') || 'system';

        function applyTheme(theme) {
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
        }
        applyTheme(savedTheme);
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
            if (localStorage.getItem('theme') === 'system') applyTheme('system');
        });
    })();
</script>

{{-- 🌟 SCRIPT NOTIFIKASI 🌟 --}}
@auth
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var notifBtn = document.getElementById('navNotifBtn');
        var notifDropdown = document.getElementById('navNotifDropdown');
        var notifDot = document.getElementById('navNotifDot');
        var notifCountText = document.getElementById('navNotifCount');
        var notifList = document.getElementById('navNotifList');

        function fetchNotifications() {
            fetch("{{ route('notifications.fetch') }}")
                .then(response => response.json())
                .then(data => {
                    if (data && data.data) {
                        if (data.count > 0) {
                            notifDot.classList.remove('hidden');
                            notifCountText.innerText = data.count + ' Baru';
                        } else {
                            notifDot.classList.add('hidden');
                            notifCountText.innerText = 'Tidak ada notif baru';
                        }

                        if (data.data.length > 0) {
                            let html = '';
                            data.data.forEach(notif => {
                                let isUnread = notif.read_at === null;
                                let bgClass = isUnread ? 'bg-emerald-50/50 dark:bg-emerald-900/10' : 'bg-transparent hover:bg-gray-50 dark:hover:bg-slate-800/50';
                                let dot = isUnread ? '<span class="w-2 h-2 rounded-full bg-emerald-500 inline-block ml-2"></span>' : '';
                                let url = notif.data && notif.data.url ? notif.data.url : '#';

                                html += `
                                    <a href="${url}" onclick="markSingleNotifRead('${notif.id}')" class="block p-4 border-b border-gray-100 dark:border-slate-800 transition ${bgClass}">
                                        <div class="flex justify-between items-start mb-1">
                                            <p class="text-sm font-bold text-gray-800 dark:text-white leading-tight">${notif.data.title} ${dot}</p>
                                        </div>
                                        <p class="text-xs text-gray-600 dark:text-slate-400 mt-1">${notif.data.message}</p>
                                        <p class="text-[10px] text-gray-400 mt-1"><i class="fas fa-clock mr-1"></i>${new Date(notif.created_at).toLocaleString('id-ID')}</p>
                                    </a>
                                `;
                            });
                            notifList.innerHTML = html;
                        } else {
                            notifList.innerHTML = '<div class="p-6 text-center text-sm text-gray-500 dark:text-slate-400"><i class="fas fa-bell-slash text-2xl mb-2 text-gray-300"></i><br>Belum ada notifikasi baru.</div>';
                        }
                    } else {
                        notifList.innerHTML = '<div class="p-6 text-center text-sm text-red-500">Format data salah.</div>';
                    }
                })
                .catch(err => {
                    notifList.innerHTML = '<div class="p-6 text-center text-sm text-red-500">Gagal terhubung ke server.</div>';
                });
        }

        if (notifBtn && notifDropdown) {
            notifBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                notifDropdown.classList.toggle('hidden');

                if (!notifDropdown.classList.contains('hidden')) {
                    notifDot.classList.add('hidden');
                    notifCountText.innerText = 'Tidak ada notif baru';

                    fetch("{{ route('notifications.read') }}", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        }
                    }).then(() => {
                        setTimeout(fetchNotifications, 500);
                    });
                }
            });

            document.addEventListener('click', function(e) {
                if (!notifDropdown.contains(e.target) && !notifBtn.contains(e.target)) {
                    notifDropdown.classList.add('hidden');
                }
            });
        }

        window.markSingleNotifRead = function(id) {
            fetch(`/notifications/read/${id}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            }).then(() => {
                fetchNotifications();
            });
        };

        fetchNotifications();
        setInterval(fetchNotifications, 10000);
    });
</script>
@endauth