<nav class="bg-white dark:bg-slate-900 shadow-sm sticky top-0 z-50 border-b border-gray-100 dark:border-slate-800">
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
            <a href="{{ route('home') }}"
                class="px-4 py-2 rounded-lg transition {{ request()->routeIs('home') ? 'text-green-700 dark:text-green-400 bg-green-50 dark:bg-emerald-950' : 'hover:text-green-700 dark:hover:text-green-400 hover:bg-gray-50 dark:hover:bg-slate-800' }}">
                Beranda
            </a>
            <a href="{{ route('destinasi.index') }}"
                class="px-4 py-2 rounded-lg transition {{ request()->routeIs('destinasi.*') ? 'text-green-700 dark:text-green-400 bg-green-50 dark:bg-emerald-950' : 'hover:text-green-700 dark:hover:text-green-400 hover:bg-gray-50 dark:hover:bg-slate-800' }}">
                Destinasi
            </a>
            <a href="{{ route('budaya.index') }}"
                class="px-4 py-2 rounded-lg transition {{ request()->routeIs('budaya.*') ? 'text-green-700 dark:text-green-400 bg-green-50 dark:bg-emerald-950' : 'hover:text-green-700 dark:hover:text-green-400 hover:bg-gray-50 dark:hover:bg-slate-800' }}">
                Budaya
            </a>
            <a href="{{ route('kuliner.index') }}"
                class="px-4 py-2 rounded-lg transition {{ request()->routeIs('kuliner.*') ? 'text-green-700 dark:text-green-400 bg-green-50 dark:bg-emerald-950' : 'hover:text-green-700 dark:hover:text-green-400 hover:bg-gray-50 dark:hover:bg-slate-800' }}">
                Kuliner
            </a>
            <a href="{{ route('peta.index') }}"
                class="px-4 py-2 rounded-lg transition {{ request()->routeIs('peta.*') ? 'text-green-700 dark:text-green-400 bg-green-50 dark:bg-emerald-950' : 'hover:text-green-700 dark:hover:text-green-400 hover:bg-gray-50 dark:hover:bg-slate-800' }}">
                Peta
            </a>
        </div>

        {{-- Right Actions --}}
        <div class="flex items-center gap-2">
            {{-- Search --}}
            <a href="{{ route('destinasi.index') }}"
                class="w-10 h-10 rounded-full bg-gray-100 dark:bg-slate-800 flex items-center justify-center hover:bg-gray-200 dark:hover:bg-slate-700 transition">
                <i class="fas fa-search text-gray-600 dark:text-slate-300 text-sm"></i>
            </a>

            {{-- Theme Toggle --}}
            <button id="themeToggle" type="button" aria-label="Ganti Tema"
                class="w-10 h-10 rounded-full bg-gray-100 dark:bg-slate-800 flex items-center justify-center hover:bg-gray-200 dark:hover:bg-slate-700 transition cursor-pointer">
                <i class="theme-sun fas fa-sun text-amber-500 text-sm"></i>
                <i class="theme-moon fas fa-moon text-emerald-400 text-sm"></i>
            </button>

            {{-- Auth --}}
            @auth
            <div class="flex items-center gap-2">
                <a href="{{ Auth::user()->isAdmin() ? route('admin.dashboard') : route('dashboard') }}"
                    class="flex items-center gap-2 bg-green-700 hover:bg-green-800 text-white pl-2 pr-4 py-1.5 rounded-full transition shadow-md shadow-green-700/20">
                    <div class="w-7 h-7 rounded-full bg-white/20 flex items-center justify-center text-xs font-black">
                        {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                    </div>
                    <span class="hidden sm:inline text-sm font-bold">
                        {{ Auth::user()->isAdmin() ? 'Admin' : 'Dashboard' }}
                    </span>
                </a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit"
                        title="Keluar"
                        class="w-10 h-10 rounded-full bg-red-50 dark:bg-red-950/30 flex items-center justify-center hover:bg-red-100 dark:hover:bg-red-900/40 transition">
                        <i class="fas fa-sign-out-alt text-red-600 dark:text-red-400 text-sm"></i>
                    </button>
                </form>
            </div>
            @else
            <a href="{{ route('login') }}"
                class="inline-flex items-center gap-2 bg-green-700 hover:bg-green-800 text-white px-5 py-2.5 rounded-lg transition font-bold text-sm shadow-md shadow-green-700/20">
                <i class="fas fa-sign-in-alt text-xs"></i> Masuk
            </a>
            @endauth
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var toggle = document.getElementById('themeToggle');
        if (!toggle) return;

        toggle.addEventListener('click', function() {
            var html = document.documentElement;
            var isDark = html.classList.contains('dark');

            if (isDark) {
                html.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                html.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        });
    });
</script>