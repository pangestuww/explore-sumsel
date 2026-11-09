<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard - Explore Sumatera</title>

    <script>
        (function() {
            const theme = localStorage.getItem('theme');
            if (theme === 'dark' || (!theme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        .font-serif {
            font-family: 'Instrument Serif', serif;
        }

        .dark body {
            background-image:
                radial-gradient(900px 500px at 85% -10%, rgba(16, 185, 129, 0.10), transparent 60%),
                radial-gradient(700px 450px at -10% 110%, rgba(20, 184, 166, 0.07), transparent 60%);
            background-attachment: fixed;
        }

        .app-shell {
            height: 100vh;
            height: 100dvh;
        }

        @keyframes slideDownFade {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-navbar {
            animation: slideDownFade 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        @keyframes bellRing {
            0% {
                transform: rotate(0);
            }

            15% {
                transform: rotate(16deg);
            }

            30% {
                transform: rotate(-14deg);
            }

            45% {
                transform: rotate(10deg);
            }

            60% {
                transform: rotate(-8deg);
            }

            75% {
                transform: rotate(4deg);
            }

            100% {
                transform: rotate(0);
            }
        }

        .bell-btn:hover i {
            animation: bellRing 0.8s ease-in-out;
            transform-origin: top center;
        }

        @keyframes dropdownPop {
            from {
                opacity: 0;
                transform: translateY(-8px) scale(0.95);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .animate-dropdown {
            animation: dropdownPop 0.25s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .custom-modal-scroll::-webkit-scrollbar {
            width: 6px;
        }

        .custom-modal-scroll::-webkit-scrollbar-track {
            background: transparent;
            margin: 10px 0;
        }

        .custom-modal-scroll::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        .dark .custom-modal-scroll::-webkit-scrollbar-thumb {
            background: #475569;
        }

        .custom-modal-scroll {
            scrollbar-width: thin;
            scrollbar-color: #cbd5e1 transparent;
        }

        .dark .custom-modal-scroll {
            scrollbar-color: #475569 transparent;
        }

        .sidebar-scroll::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar-scroll::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 10px;
        }
    </style>
</head>

<body class="bg-[#f8fafc] dark:bg-[#0b1120] text-slate-800 dark:text-white transition-colors duration-300 overflow-x-hidden">

    <!-- OVERLAY SIDEBAR (MOBILE) -->
    <div id="adminSidebarOverlay" onclick="toggleAdminSidebar()" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-[90] hidden md:hidden transition-opacity"></div>

    <div class="app-shell flex h-screen overflow-hidden relative">

        <!-- ========================================== -->
        <!-- SIDEBAR KIRI                               -->
        <!-- ========================================== -->
        <aside id="adminSidebar" class="fixed md:relative inset-y-0 left-0 z-[100] w-[85%] max-w-[300px] md:w-64 bg-gradient-to-b from-[#0f3d2e] to-[#062116] text-white flex flex-col shrink-0 transform -translate-x-full md:translate-x-0 transition-transform duration-300 shadow-2xl overflow-hidden rounded-r-3xl md:rounded-none">

            <img src="https://images.unsplash.com/photo-1518531933037-91b2f5f229cc?q=80&w=600&auto=format&fit=crop" class="hidden md:block absolute bottom-0 left-0 w-full h-1/2 object-cover opacity-20 mix-blend-luminosity pointer-events-none z-0" alt="">

            <!-- Logo -->
            <div class="p-5 md:p-6 relative z-10 flex justify-between items-start gap-2 shrink-0">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-lg group-hover:scale-105 transition-transform shrink-0">
                        <i class="fas fa-leaf text-green-700 text-lg"></i>
                    </div>
                    <div>
                        <h1 class="font-extrabold text-base md:text-lg tracking-tight leading-none">ExploreSumatera</h1>
                        <p class="text-[10px] text-emerald-200 mt-1 leading-tight flex items-center gap-1"><i class="fas fa-shield-alt text-[9px]"></i> <span data-i18n="menu_admin">Menu Admin</span></p>
                    </div>
                </a>
                <button onclick="toggleAdminSidebar()" class="md:hidden w-8 h-8 shrink-0 rounded-full bg-white/10 text-white/80 hover:text-white hover:bg-white/20 flex items-center justify-center transition border border-white/10">
                    <i class="fas fa-times text-sm"></i>
                </button>
            </div>

            <!-- Menu -->
            <div class="flex-1 overflow-y-auto sidebar-scroll px-4 py-2 md:py-4 relative z-10">
                <p class="text-[10px] font-bold text-emerald-200/50 uppercase tracking-widest mb-3 px-2" data-i18n="utama">Utama</p>
                <nav class="space-y-1">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 bg-emerald-600/30 text-white rounded-xl shadow-sm border border-emerald-500/30">
                        <i class="fas fa-th-large text-sm w-5 text-center"></i>
                        <span class="font-semibold text-sm" data-i18n="dashboard">Dashboard</span>
                    </a>

                    <a href="{{ route('admin.destinasi.create') }}" class="flex items-center gap-3 px-4 py-3 bg-emerald-400/10 text-emerald-300 border border-dashed border-emerald-400/40 hover:bg-emerald-400/20 hover:border-emerald-300/60 rounded-xl transition-all my-2">
                        <i class="fas fa-plus-circle text-sm w-5 text-center"></i>
                        <span class="font-bold text-sm" data-i18n="tambah_konten">Tambah Konten</span>
                    </a>

                    <div class="h-px bg-white/10 my-3"></div>

                    <a href="{{ route('admin.destinasi.index') }}" class="group flex items-center gap-3 px-4 py-3 text-emerald-100/70 hover:text-white hover:bg-emerald-800/50 rounded-xl transition-all">
                        <i class="fas fa-map-marker-alt text-sm w-5 text-center"></i>
                        <span class="font-medium text-sm" data-i18n="destinasi">Destinasi</span>
                    </a>

                    <a href="{{ route('admin.budaya.index') }}" class="group flex items-center gap-3 px-4 py-3 text-emerald-100/70 hover:text-white hover:bg-emerald-800/50 rounded-xl transition-all">
                        <i class="fas fa-masks-theater text-sm w-5 text-center"></i>
                        <span class="font-medium text-sm" data-i18n="budaya">Budaya</span>
                    </a>

                    <a href="{{ route('admin.kuliner.index') }}" class="group flex items-center gap-3 px-4 py-3 text-emerald-100/70 hover:text-white hover:bg-emerald-800/50 rounded-xl transition-all">
                        <i class="fas fa-utensils text-sm w-5 text-center"></i>
                        <span class="font-medium text-sm" data-i18n="kuliner">Kuliner</span>
                    </a>

                    <button onclick="openUsersModal()" class="group w-full flex items-center gap-3 px-4 py-3 text-emerald-100/70 hover:text-white hover:bg-emerald-800/50 rounded-xl transition-all text-left">
                        <i class="fas fa-users text-sm w-5 text-center"></i>
                        <span class="font-medium text-sm" data-i18n="pengguna">Pengguna</span>
                    </button>

                    <button onclick="openAdminFeedbackModal()" class="group w-full flex items-center gap-3 px-4 py-3 text-emerald-100/70 hover:text-white hover:bg-emerald-800/50 rounded-xl transition-all text-left">
                        <i class="fas fa-comment-dots text-sm w-5 text-center"></i>
                        <span class="font-medium text-sm" data-i18n="feedback">Feedback</span>
                    </button>
                </nav>
            </div>

            <!-- Bawah sidebar -->
            <div class="relative z-10 p-4 border-t border-white/10 space-y-1 shrink-0 bg-[#062116]/70 backdrop-blur-sm">
                <button onclick="openSettingsModal('general')" class="w-full flex items-center gap-3 px-4 py-3 text-emerald-100/70 hover:text-white hover:bg-emerald-800/50 rounded-xl text-left transition-all">
                    <i class="fas fa-cog text-sm w-5 text-center"></i>
                    <span class="font-medium text-sm" data-i18n="pengaturan">Pengaturan</span>
                </button>

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-red-300 hover:text-red-200 hover:bg-red-500/15 rounded-xl text-left transition-all">
                        <i class="fas fa-sign-out-alt text-sm w-5 text-center"></i>
                        <span class="font-medium text-sm" data-i18n="keluar">Keluar</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- ========================================== -->
        <!-- AREA KONTEN                                -->
        <!-- ========================================== -->
        <div class="flex-1 flex flex-col h-full relative overflow-hidden w-full min-w-0">

            <!-- TOP NAVBAR (FLOATING PILL) -->
            <div class="px-2.5 md:px-8 pt-2.5 md:pt-5 pb-1 shrink-0 relative z-50">
                <header class="group/nav relative h-14 md:h-[68px] max-w-6xl mx-auto bg-white/70 dark:bg-[#111c33]/75 backdrop-blur-2xl rounded-2xl flex items-center justify-between gap-2 md:gap-3 px-2 md:px-4 animate-navbar border border-slate-200/70 dark:border-white/10 shadow-[0_8px_30px_rgba(15,61,46,0.08)] dark:shadow-[0_8px_30px_rgba(0,0,0,0.45)] hover:shadow-[0_12px_40px_rgba(16,185,129,0.18)] hover:border-emerald-500/30 dark:hover:border-emerald-400/30 transition-all duration-300">
                    <span class="pointer-events-none absolute bottom-0 inset-x-8 h-[2px] rounded-full bg-gradient-to-r from-transparent via-emerald-500 to-transparent opacity-0 scale-x-0 group-hover/nav:opacity-100 group-hover/nav:scale-x-100 transition-all duration-500"></span>

                    <div class="flex items-center gap-2 md:gap-3 flex-1 min-w-0">
                        <button onclick="toggleAdminSidebar()" class="md:hidden w-9 h-9 shrink-0 rounded-xl bg-emerald-50 dark:bg-emerald-500/15 text-emerald-700 dark:text-emerald-400 dark:ring-1 dark:ring-emerald-400/20 flex items-center justify-center hover:bg-emerald-100 dark:hover:bg-emerald-500/25 active:scale-95 transition-all duration-200">
                            <i class="fas fa-bars text-sm"></i>
                        </button>

                        <form action="{{ route('admin.destinasi.index') }}" method="GET" class="relative w-full min-w-0 md:max-w-md md:focus-within:max-w-lg group transition-all duration-500 ease-out">
                            <div class="absolute inset-y-0 left-0 pl-3 md:pl-3.5 flex items-center pointer-events-none">
                                <i class="fas fa-search text-slate-400 group-hover:text-emerald-400 group-focus-within:text-emerald-500 group-focus-within:scale-125 transition-all duration-300 text-xs md:text-sm"></i>
                            </div>
                            <input type="text" name="q" placeholder="Cari destinasi, budaya, kuliner..." data-i18n-placeholder="search_placeholder"
                                class="w-full pl-8 md:pl-10 pr-3 md:pr-4 h-9 md:h-10 rounded-xl bg-slate-100/80 dark:bg-white/5 border border-transparent dark:border-white/5 hover:border-slate-200 dark:hover:border-white/10 hover:bg-white dark:hover:bg-white/10 focus:shadow-lg focus:shadow-emerald-500/10 focus:border-emerald-500/40 focus:bg-white dark:focus:bg-[#0b1120] text-xs md:text-sm text-slate-800 dark:text-white placeholder:text-slate-400 dark:placeholder:text-slate-500 placeholder:text-xs md:placeholder:text-sm focus:ring-4 focus:ring-emerald-500/10 outline-none transition-all truncate">
                        </form>
                    </div>

                    <div class="flex items-center gap-1 md:gap-2 shrink-0">
                        <!-- Notifikasi -->
                        <div class="relative">
                            <button id="notifBtn" class="bell-btn relative w-9 h-9 md:w-10 md:h-10 rounded-xl bg-slate-100/80 dark:bg-white/5 dark:ring-1 dark:ring-white/5 hover:bg-emerald-50 dark:hover:bg-emerald-500/10 flex items-center justify-center text-slate-500 dark:text-slate-300 hover:text-emerald-600 dark:hover:text-emerald-400 hover:-translate-y-0.5 hover:shadow-md hover:shadow-emerald-500/20 active:scale-95 transition-all duration-200 focus:outline-none">
                                <i class="fas fa-bell text-sm md:text-base"></i>
                                <span id="notifDot" class="hidden absolute top-1.5 right-2 md:top-2 md:right-2.5 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-white dark:border-[#111c33] animate-pulse"></span>
                            </button>

                            <div id="notifDropdown" class="animate-dropdown hidden absolute -right-16 sm:right-0 mt-4 w-[calc(100vw-1.5rem)] max-w-xs sm:max-w-none sm:w-80 bg-white/95 dark:bg-[#111c33]/95 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-200/50 dark:border-white/10 z-[100] overflow-hidden origin-top-right">
                                <div class="p-4 border-b border-slate-100/50 dark:border-white/5 bg-slate-50/50 dark:bg-white/5 flex justify-between items-center">
                                    <h3 class="font-bold text-sm text-slate-800 dark:text-white" data-i18n="notif_title">Notifikasi</h3>
                                    <span id="notifCount" class="text-xs text-emerald-600 dark:text-emerald-400 font-semibold bg-emerald-50 dark:bg-emerald-900/30 px-2 py-1 rounded-full">Memuat...</span>
                                </div>
                                <div id="notifList" class="max-h-72 overflow-y-auto custom-modal-scroll">
                                    <div class="p-6 text-center text-sm text-slate-500"><i class="fas fa-spinner fa-spin text-emerald-500 mb-2"></i><br>Memuat...</div>
                                </div>
                            </div>
                        </div>

                        <div class="hidden sm:block w-px h-7 bg-slate-200 dark:bg-white/10 mx-1"></div>

                        <!-- Menu Profil Admin -->
                        <div class="relative">
                            <button id="userMenuBtn" class="group flex items-center gap-2.5 hover:bg-slate-100/80 dark:hover:bg-white/5 hover:shadow-sm p-0.5 md:p-1 md:pr-3 rounded-xl active:scale-95 transition-all duration-200 focus:outline-none">
                                @if(Auth::user()->photo)
                                <img src="{{ asset('storage/' . Auth::user()->photo) }}" class="w-9 h-9 rounded-xl object-cover ring-2 ring-emerald-500/30 group-hover:ring-4 group-hover:ring-emerald-500/40 group-hover:scale-105 transition-all duration-300" alt="Avatar">
                                @elseif(Auth::user()->avatar)
                                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="w-9 h-9 rounded-xl object-cover ring-2 ring-emerald-500/30 group-hover:ring-4 group-hover:ring-emerald-500/40 group-hover:scale-105 transition-all duration-300" alt="Avatar">
                                @else
                                <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-emerald-400 to-emerald-600 text-white flex items-center justify-center font-bold shadow-md shadow-emerald-500/30 group-hover:scale-105 group-hover:rotate-3 transition-all duration-300">{{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}</div>
                                @endif
                                <div class="hidden md:block text-left max-w-[120px]">
                                    <p class="text-sm font-bold text-slate-800 dark:text-white leading-tight truncate">{{ Auth::user()->name ?? 'Admin' }}</p>
                                    <p class="text-[11px] text-emerald-600 dark:text-emerald-400 font-medium truncate" data-i18n="role_admin">Admin</p>
                                </div>
                                <span class="hidden md:inline-flex items-center"><i class="fas fa-chevron-down text-[10px] text-slate-400 transition-transform duration-300" id="userChevron"></i></span>
                            </button>

                            <div id="userDropdown" class="animate-dropdown hidden absolute right-0 mt-4 w-56 bg-white/95 dark:bg-[#111c33]/95 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-200/50 dark:border-white/10 z-[100] overflow-hidden origin-top-right">
                                <div class="px-4 py-3 bg-slate-50/70 dark:bg-white/5 border-b border-slate-100 dark:border-white/5 md:hidden">
                                    <p class="text-sm font-bold text-slate-800 dark:text-white truncate">{{ Auth::user()->name ?? 'Admin' }}</p>
                                    <p class="text-[11px] text-slate-500 dark:text-slate-400 truncate">{{ Auth::user()->email ?? '' }}</p>
                                </div>
                                <div class="p-2">
                                    <button onclick="openSettingsModal('profil')" class="group w-full text-left flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-slate-700 dark:text-slate-300 hover:bg-emerald-50 dark:hover:bg-emerald-500/10 hover:text-emerald-700 dark:hover:text-emerald-400 rounded-xl hover:translate-x-1 transition-all duration-200">
                                        <span class="w-7 h-7 rounded-lg bg-slate-100 dark:bg-white/5 flex items-center justify-center transition-transform duration-300 group-hover:scale-110 group-hover:rotate-6"><i class="fas fa-user text-xs text-slate-500 dark:text-slate-400"></i></span>
                                        <span data-i18n="profil_saya">Profil Saya</span>
                                    </button>
                                    <a href="{{ route('home') }}" class="group w-full text-left flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-slate-700 dark:text-slate-300 hover:bg-emerald-50 dark:hover:bg-emerald-500/10 hover:text-emerald-700 dark:hover:text-emerald-400 rounded-xl hover:translate-x-1 transition-all duration-200">
                                        <span class="w-7 h-7 rounded-lg bg-slate-100 dark:bg-white/5 flex items-center justify-center transition-transform duration-300 group-hover:scale-110"><i class="fas fa-globe text-xs text-slate-500 dark:text-slate-400"></i></span>
                                        <span data-i18n="lihat_website">Lihat Website</span>
                                    </a>
                                    <div class="h-px bg-slate-100 dark:bg-white/5 my-1"></div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="group w-full flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-xl hover:translate-x-1 transition-all duration-200 text-left">
                                            <span class="w-7 h-7 rounded-lg bg-red-50 dark:bg-red-900/20 flex items-center justify-center transition-transform duration-300 group-hover:scale-110 group-hover:-rotate-6"><i class="fas fa-sign-out-alt text-xs"></i></span>
                                            <span data-i18n="keluar">Keluar</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
            </div>

            <!-- ISI DASHBOARD -->
            <main class="flex-1 overflow-y-auto px-4 pt-4 pb-10 md:p-8 custom-modal-scroll">
                <div class="max-w-6xl mx-auto space-y-5 md:space-y-8">

                    <!-- Welcome Banner -->
                    <div class="relative overflow-hidden rounded-2xl md:rounded-3xl p-6 md:p-8 bg-gradient-to-br from-emerald-600 via-emerald-500 to-teal-500 dark:from-emerald-900 dark:via-emerald-800 dark:to-teal-900 shadow-xl shadow-emerald-600/20 dark:shadow-black/40 dark:ring-1 dark:ring-white/10">
                        <div class="absolute -right-12 -top-12 w-56 h-56 rounded-full bg-white/10 blur-sm"></div>
                        <div class="absolute right-16 -bottom-16 w-48 h-48 rounded-full bg-teal-300/20 blur-2xl"></div>
                        <i class="fas fa-leaf absolute right-6 md:right-12 top-1/2 -translate-y-1/2 text-7xl md:text-[130px] text-white/15 -rotate-12 pointer-events-none"></i>
                        <div class="relative z-10">
                            <p class="text-emerald-100 text-xs md:text-sm font-semibold mb-1" data-i18n="welcome_back">Selamat datang kembali!</p>
                            <h2 class="text-2xl sm:text-3xl md:text-5xl font-black text-white mb-2 md:mb-3 flex items-center gap-2 leading-tight"><span data-i18n="hello_admin">Halo, Admin</span> <span class="text-xl md:text-4xl">👋</span></h2>
                            <p class="text-xs md:text-base text-emerald-50/90 max-w-md mb-3 md:mb-5 leading-relaxed" data-i18n="pantau_aktivitas">Pantau aktivitas website kamu.</p>
                            <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-md border border-white/30 px-3 py-1.5 md:px-4 md:py-2 rounded-full text-[10px] md:text-xs font-bold w-max text-white">
                                <i class="fas fa-shield-alt"></i> <span data-i18n="kelola_explore">Kelola Explore Sumatera</span>
                            </div>
                        </div>
                    </div>

                    <!-- Stats Grid -->
                    <div class="grid grid-cols-2 xl:grid-cols-4 gap-3 md:gap-6">
                        <div class="relative overflow-hidden bg-white/80 dark:bg-gradient-to-br dark:from-[#16233f] dark:to-[#0e182c] backdrop-blur-md rounded-2xl md:rounded-3xl p-4 md:p-6 shadow-sm dark:shadow-[0_10px_30px_rgba(0,0,0,0.35)] border border-slate-200/50 dark:border-white/10 hover:shadow-md hover:border-emerald-400/60 dark:hover:border-emerald-400/30 transition-all group">
                            <i class="fas fa-map-marker-alt absolute -right-3 -bottom-4 text-7xl md:text-8xl text-emerald-500/[0.07] group-hover:text-emerald-500/10 transition-colors pointer-events-none"></i>
                            <div class="relative">
                                <div class="w-11 h-11 md:w-14 md:h-14 rounded-xl md:rounded-2xl bg-emerald-100 dark:bg-emerald-500/15 dark:ring-1 dark:ring-emerald-400/30 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-lg md:text-2xl shadow-inner mb-3 md:mb-4">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <p class="text-3xl md:text-4xl font-black tracking-tight text-slate-900 dark:text-white mb-0.5">{{ $stats['totalDestinasi'] ?? '0' }}</p>
                                <p class="text-slate-500 dark:text-slate-400 text-xs md:text-sm font-semibold" data-i18n="destinasi">Destinasi</p>
                            </div>
                        </div>

                        <div class="relative overflow-hidden bg-white/80 dark:bg-gradient-to-br dark:from-[#16233f] dark:to-[#0e182c] backdrop-blur-md rounded-2xl md:rounded-3xl p-4 md:p-6 shadow-sm dark:shadow-[0_10px_30px_rgba(0,0,0,0.35)] border border-slate-200/50 dark:border-white/10 hover:shadow-md hover:border-purple-400/60 dark:hover:border-purple-400/30 transition-all group">
                            <i class="fas fa-masks-theater absolute -right-3 -bottom-4 text-7xl md:text-8xl text-purple-500/[0.07] group-hover:text-purple-500/10 transition-colors pointer-events-none"></i>
                            <div class="relative">
                                <div class="w-11 h-11 md:w-14 md:h-14 rounded-xl md:rounded-2xl bg-purple-100 dark:bg-purple-500/15 dark:ring-1 dark:ring-purple-400/30 text-purple-600 dark:text-purple-400 flex items-center justify-center text-lg md:text-2xl shadow-inner mb-3 md:mb-4">
                                    <i class="fas fa-masks-theater"></i>
                                </div>
                                <p class="text-3xl md:text-4xl font-black tracking-tight text-slate-900 dark:text-white mb-0.5">{{ $stats['totalBudaya'] ?? '0' }}</p>
                                <p class="text-slate-500 dark:text-slate-400 text-xs md:text-sm font-semibold" data-i18n="budaya">Budaya</p>
                            </div>
                        </div>

                        <div class="relative overflow-hidden bg-white/80 dark:bg-gradient-to-br dark:from-[#16233f] dark:to-[#0e182c] backdrop-blur-md rounded-2xl md:rounded-3xl p-4 md:p-6 shadow-sm dark:shadow-[0_10px_30px_rgba(0,0,0,0.35)] border border-slate-200/50 dark:border-white/10 hover:shadow-md hover:border-orange-400/60 dark:hover:border-orange-400/30 transition-all group">
                            <i class="fas fa-utensils absolute -right-3 -bottom-4 text-7xl md:text-8xl text-orange-500/[0.07] group-hover:text-orange-500/10 transition-colors pointer-events-none"></i>
                            <div class="relative">
                                <div class="w-11 h-11 md:w-14 md:h-14 rounded-xl md:rounded-2xl bg-orange-100 dark:bg-orange-500/15 dark:ring-1 dark:ring-orange-400/30 text-orange-600 dark:text-orange-400 flex items-center justify-center text-lg md:text-2xl shadow-inner mb-3 md:mb-4">
                                    <i class="fas fa-utensils"></i>
                                </div>
                                <p class="text-3xl md:text-4xl font-black tracking-tight text-slate-900 dark:text-white mb-0.5">{{ $stats['totalKuliner'] ?? '0' }}</p>
                                <p class="text-slate-500 dark:text-slate-400 text-xs md:text-sm font-semibold" data-i18n="kuliner">Kuliner</p>
                            </div>
                        </div>

                        <div class="relative overflow-hidden bg-white/80 dark:bg-gradient-to-br dark:from-[#16233f] dark:to-[#0e182c] backdrop-blur-md rounded-2xl md:rounded-3xl p-4 md:p-6 shadow-sm dark:shadow-[0_10px_30px_rgba(0,0,0,0.35)] border border-slate-200/50 dark:border-white/10 hover:shadow-md hover:border-amber-400/60 dark:hover:border-amber-400/30 transition-all group">
                            <i class="fas fa-star absolute -right-3 -bottom-4 text-7xl md:text-8xl text-amber-500/[0.07] group-hover:text-amber-500/10 transition-colors pointer-events-none"></i>
                            <div class="relative">
                                <div class="w-11 h-11 md:w-14 md:h-14 rounded-xl md:rounded-2xl bg-amber-100 dark:bg-amber-500/15 dark:ring-1 dark:ring-amber-400/30 text-amber-500 dark:text-amber-400 flex items-center justify-center text-lg md:text-2xl shadow-inner mb-3 md:mb-4">
                                    <i class="fas fa-star"></i>
                                </div>
                                <p class="text-3xl md:text-4xl font-black tracking-tight text-slate-900 dark:text-white mb-0.5">{{ $stats['totalReview'] ?? '0' }}</p>
                                <p class="text-slate-500 dark:text-slate-400 text-xs md:text-sm font-semibold" data-i18n="review">Review</p>
                            </div>
                        </div>
                    </div>

                    <!-- AREA GRAFIK -->
                    <div class="flex items-center gap-2">
                        <i class="fas fa-chart-line text-emerald-600 dark:text-emerald-400 text-lg md:text-xl"></i>
                        <h2 class="text-base md:text-xl font-bold text-slate-900 dark:text-white" data-i18n="statistik_title">Statistik Website</h2>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-6">
                        <div class="bg-white dark:bg-gradient-to-br dark:from-[#16233f] dark:to-[#0e182c] border border-slate-200/60 dark:border-white/10 rounded-2xl md:rounded-3xl p-5 md:p-6 shadow-sm dark:shadow-[0_10px_30px_rgba(0,0,0,0.35)]">
                            <div class="flex items-start gap-3 mb-5">
                                <div class="w-9 h-9 rounded-xl bg-amber-100 dark:bg-amber-500/15 text-amber-500 flex items-center justify-center shrink-0"><i class="fas fa-star-half-alt text-sm"></i></div>
                                <div>
                                    <h3 class="text-base md:text-lg font-bold leading-tight text-slate-900 dark:text-white" data-i18n="statistik_ulasan">Statistik Ulasan</h3>
                                    <p class="text-slate-500 dark:text-slate-400 text-xs md:text-sm" data-i18n="distribusi_rating">Distribusi rating bintang.</p>
                                </div>
                            </div>
                            <div class="relative w-full h-[250px]"><canvas id="ratingChart"></canvas></div>
                        </div>

                        <div class="bg-white dark:bg-gradient-to-br dark:from-[#16233f] dark:to-[#0e182c] border border-slate-200/60 dark:border-white/10 rounded-2xl md:rounded-3xl p-5 md:p-6 shadow-sm dark:shadow-[0_10px_30px_rgba(0,0,0,0.35)]">
                            <div class="flex items-start gap-3 mb-5">
                                <div class="w-9 h-9 rounded-xl bg-emerald-100 dark:bg-emerald-500/15 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0"><i class="fas fa-chart-pie text-sm"></i></div>
                                <div>
                                    <h3 class="text-base md:text-lg font-bold leading-tight text-slate-900 dark:text-white" data-i18n="distribusi_konten">Distribusi Konten</h3>
                                    <p class="text-slate-500 dark:text-slate-400 text-xs md:text-sm" data-i18n="perbandingan_konten">Perbandingan Destinasi, Budaya, Kuliner.</p>
                                </div>
                            </div>
                            <div class="relative w-full h-[250px] flex justify-center"><canvas id="contentChart"></canvas></div>
                        </div>

                        <div class="bg-white dark:bg-gradient-to-br dark:from-[#16233f] dark:to-[#0e182c] border border-slate-200/60 dark:border-white/10 rounded-2xl md:rounded-3xl p-5 md:p-6 lg:col-span-2 shadow-sm dark:shadow-[0_10px_30px_rgba(0,0,0,0.35)]">
                            <div class="flex items-start gap-3 mb-5">
                                <div class="w-9 h-9 rounded-xl bg-emerald-100 dark:bg-emerald-500/15 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0"><i class="fas fa-map-marker-alt text-sm"></i></div>
                                <div>
                                    <h3 class="text-base md:text-lg font-bold leading-tight text-slate-900 dark:text-white" data-i18n="top_destinasi">Top 5 Destinasi</h3>
                                    <p class="text-slate-500 dark:text-slate-400 text-xs md:text-sm" data-i18n="berdasarkan_ulasan">Berdasarkan jumlah ulasan pengunjung.</p>
                                </div>
                            </div>
                            <div class="relative w-full h-[250px]"><canvas id="topDestinasiChart"></canvas></div>
                        </div>

                        <div class="bg-white dark:bg-gradient-to-br dark:from-[#16233f] dark:to-[#0e182c] border border-slate-200/60 dark:border-white/10 rounded-2xl md:rounded-3xl p-5 md:p-6 shadow-sm dark:shadow-[0_10px_30px_rgba(0,0,0,0.35)]">
                            <div class="flex items-start gap-3 mb-5">
                                <div class="w-9 h-9 rounded-xl bg-orange-100 dark:bg-orange-500/15 text-orange-500 flex items-center justify-center shrink-0"><i class="fas fa-utensils text-sm"></i></div>
                                <div>
                                    <h3 class="text-base md:text-lg font-bold leading-tight text-slate-900 dark:text-white" data-i18n="top_kuliner">Top 5 Kuliner</h3>
                                    <p class="text-slate-500 dark:text-slate-400 text-xs md:text-sm" data-i18n="berdasarkan_ulasan">Berdasarkan jumlah ulasan pengunjung.</p>
                                </div>
                            </div>
                            <div class="relative w-full h-[250px]"><canvas id="topKulinerChart"></canvas></div>
                        </div>

                        <div class="bg-white dark:bg-gradient-to-br dark:from-[#16233f] dark:to-[#0e182c] border border-slate-200/60 dark:border-white/10 rounded-2xl md:rounded-3xl p-5 md:p-6 shadow-sm dark:shadow-[0_10px_30px_rgba(0,0,0,0.35)]">
                            <div class="flex items-start gap-3 mb-5">
                                <div class="w-9 h-9 rounded-xl bg-purple-100 dark:bg-purple-500/15 text-purple-500 flex items-center justify-center shrink-0"><i class="fas fa-masks-theater text-sm"></i></div>
                                <div>
                                    <h3 class="text-base md:text-lg font-bold leading-tight text-slate-900 dark:text-white" data-i18n="top_budaya">Top 5 Budaya</h3>
                                    <p class="text-slate-500 dark:text-slate-400 text-xs md:text-sm" data-i18n="berdasarkan_ulasan">Berdasarkan jumlah ulasan pengunjung.</p>
                                </div>
                            </div>
                            <div class="relative w-full h-[250px]"><canvas id="topBudayaChart"></canvas></div>
                        </div>

                        <div class="bg-white dark:bg-gradient-to-br dark:from-[#16233f] dark:to-[#0e182c] border border-slate-200/60 dark:border-white/10 rounded-2xl md:rounded-3xl p-5 md:p-6 shadow-sm dark:shadow-[0_10px_30px_rgba(0,0,0,0.35)]">
                            <div class="flex items-start gap-3 mb-5">
                                <div class="w-9 h-9 rounded-xl bg-blue-100 dark:bg-blue-500/15 text-blue-500 flex items-center justify-center shrink-0"><i class="fas fa-user-check text-sm"></i></div>
                                <div>
                                    <h3 class="text-base md:text-lg font-bold leading-tight text-slate-900 dark:text-white" data-i18n="user_aktif">Pengguna Paling Aktif Menilai</h3>
                                    <p class="text-slate-500 dark:text-slate-400 text-xs md:text-sm" data-i18n="user_terbanyak">User dengan ulasan terbanyak.</p>
                                </div>
                            </div>
                            <div class="relative w-full h-[250px]"><canvas id="userReviewChart"></canvas></div>
                        </div>

                        <div class="bg-white dark:bg-gradient-to-br dark:from-[#16233f] dark:to-[#0e182c] border border-slate-200/60 dark:border-white/10 rounded-2xl md:rounded-3xl p-5 md:p-6 shadow-sm dark:shadow-[0_10px_30px_rgba(0,0,0,0.35)]">
                            <div class="flex items-start gap-3 mb-5">
                                <div class="w-9 h-9 rounded-xl bg-pink-100 dark:bg-pink-500/15 text-pink-500 flex items-center justify-center shrink-0"><i class="fas fa-location-dot text-sm"></i></div>
                                <div>
                                    <h3 class="text-base md:text-lg font-bold leading-tight text-slate-900 dark:text-white" data-i18n="sebaran_destinasi">Sebaran Destinasi</h3>
                                    <p class="text-slate-500 dark:text-slate-400 text-xs md:text-sm" data-i18n="top_kabupaten">Top 5 Kabupaten dengan destinasi terbanyak.</p>
                                </div>
                            </div>
                            <div class="relative w-full h-[250px]"><canvas id="kabupatenChart"></canvas></div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
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
    <!-- MODAL PENGATURAN (TAB & BAHASA)            -->
    <!-- ========================================== -->
    <div id="settingsModal" class="fixed inset-0 z-[9999] hidden bg-slate-900/60 backdrop-blur-md flex items-center justify-center opacity-0 transition-opacity duration-300 p-4">
        <div id="settingsModalContent" class="bg-white dark:bg-[#0f172a] rounded-3xl w-full max-w-4xl h-[650px] max-h-[90vh] shadow-2xl border border-slate-200 dark:border-white/10 transform scale-95 transition-transform duration-300 overflow-hidden flex flex-col md:flex-row">

            <!-- Sidebar Tabs -->
            <div class="w-full md:w-56 bg-slate-50 dark:bg-slate-800/30 border-b md:border-b-0 md:border-r border-slate-200 dark:border-slate-800 p-4 flex flex-col shrink-0">
                <div class="flex md:hidden items-center justify-between mb-4 px-2">
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white" data-i18n="settings">Settings</h3>
                    <button onclick="closeSettingsModal()" class="w-8 h-8 rounded-full bg-slate-200 dark:bg-slate-700 flex items-center justify-center text-slate-500 hover:bg-red-100 hover:text-red-600 transition"><i class="fas fa-times"></i></button>
                </div>

                <h3 class="hidden md:block text-lg font-bold text-slate-900 dark:text-white mb-6 px-4" data-i18n="settings">Settings</h3>

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

            <!-- Area Konten -->
            <div class="flex-1 p-4 md:p-8 overflow-y-auto relative custom-modal-scroll">
                <button onclick="closeSettingsModal()" class="hidden md:flex absolute top-6 right-6 w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800 items-center justify-center text-slate-500 hover:bg-red-100 hover:text-red-600 transition z-10"><i class="fas fa-times"></i></button>

                <!-- TAB GENERAL -->
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

                            <div class="flex bg-slate-200/50 dark:bg-slate-800 rounded-xl p-1 shadow-inner border border-slate-200 dark:border-slate-700 relative">
                                <div id="lang-slider" class="absolute top-1 bottom-1 w-[calc(50%-4px)] bg-white dark:bg-slate-600 rounded-lg shadow-sm transition-all duration-300 ease-out z-0"></div>

                                <button onclick="changeLanguage('id')" id="btn-lang-id" class="relative z-10 px-4 py-1.5 text-sm font-bold text-slate-500 dark:text-slate-400 transition-colors flex items-center gap-1.5">
                                    <span class="text-base">🇮🇩</span> ID
                                </button>
                                <button onclick="changeLanguage('en')" id="btn-lang-en" class="relative z-10 px-4 py-1.5 text-sm font-bold text-slate-500 dark:text-slate-400 transition-colors flex items-center gap-1.5">
                                    <span class="text-base">🇬🇧</span> EN
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB PROFIL -->
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

    <!-- MODAL PENGGUNA (AJAX) -->
    <div id="usersModal" class="fixed inset-0 z-[9999] hidden bg-slate-900/60 backdrop-blur-md flex items-center justify-center opacity-0 transition-opacity duration-300 p-4">
        <div id="usersModalContent" class="bg-white dark:bg-[#0f172a] rounded-3xl p-5 md:p-8 max-w-3xl w-full shadow-2xl border border-slate-200 dark:border-white/10 transform scale-95 transition-transform duration-300">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold flex items-center gap-3 text-slate-900 dark:text-white">
                    <span class="w-10 h-10 rounded-xl bg-emerald-100 dark:bg-emerald-500/10 flex items-center justify-center"><i class="fas fa-users text-emerald-500"></i></span>
                    <span data-i18n="kelola_pengguna">Kelola Pengguna</span>
                </h3>
                <button onclick="closeUsersModal()" class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-500 hover:bg-red-100 hover:text-red-600 transition"><i class="fas fa-times"></i></button>
            </div>
            <div class="overflow-auto max-h-[60vh] rounded-2xl border border-slate-200 dark:border-slate-800 mb-6 custom-modal-scroll">
                <table class="w-full text-left border-collapse relative">
                    <thead class="bg-slate-50 dark:bg-slate-800/50 text-slate-500 dark:text-slate-400 text-xs uppercase font-bold sticky top-0 z-10">
                        <tr>
                            <th class="px-4 py-3 bg-slate-50 dark:bg-[#0f172a] border-b dark:border-slate-800" data-i18n="nama">Nama</th>
                            <th class="px-4 py-3 bg-slate-50 dark:bg-[#0f172a] border-b dark:border-slate-800">Email</th>
                            <th class="px-4 py-3 bg-slate-50 dark:bg-[#0f172a] border-b dark:border-slate-800">Role</th>
                            <th class="px-4 py-3 bg-slate-50 dark:bg-[#0f172a] border-b dark:border-slate-800 text-center" data-i18n="aksi">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="usersTableBody" class="divide-y divide-slate-100 dark:divide-slate-800"></tbody>
                </table>
            </div>
            <div class="flex justify-end"><button type="button" onclick="closeUsersModal()" class="px-6 py-2.5 rounded-xl font-bold bg-slate-100 dark:bg-slate-800 text-slate-800 dark:text-white hover:bg-slate-200 dark:hover:bg-slate-700 transition" data-i18n="tutup">Tutup</button></div>
        </div>
    </div>

    <!-- MODAL ADMIN FEEDBACK -->
    <div id="adminFeedbackModal" class="fixed inset-0 z-[9999] hidden bg-slate-900/60 backdrop-blur-md flex items-center justify-center opacity-0 transition-opacity duration-300 p-4">
        <div id="adminFeedbackModalContent" class="bg-white dark:bg-[#0f172a] rounded-3xl w-full max-w-5xl h-[600px] max-h-[90vh] shadow-2xl border border-slate-200 dark:border-white/10 transform scale-95 transition-transform duration-300 overflow-hidden flex flex-col">
            <div class="flex justify-between items-center p-4 md:p-6 border-b border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-800/30 shrink-0">
                <h3 class="text-lg md:text-xl font-bold text-slate-900 dark:text-white flex items-center gap-3">
                    <span class="w-10 h-10 rounded-xl bg-emerald-100 dark:bg-emerald-500/10 flex items-center justify-center shrink-0"><i class="fas fa-comment-dots text-emerald-500"></i></span>
                    <span data-i18n="daftar_feedback">Daftar Feedback Pengguna</span>
                </h3>
                <button onclick="closeAdminFeedbackModal()" class="w-8 h-8 rounded-full bg-white dark:bg-slate-800 flex items-center justify-center text-slate-500 hover:bg-red-100 hover:text-red-600 transition">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="flex-1 p-4 md:p-6 overflow-y-auto custom-modal-scroll bg-slate-50 dark:bg-[#0b1120]">
                <div class="overflow-auto rounded-2xl border border-slate-200 dark:border-slate-800 mb-6 bg-white dark:bg-[#0f172a]">
                    <table class="w-full text-left border-collapse relative">
                        <thead class="bg-slate-50 dark:bg-slate-800/50 text-slate-500 dark:text-slate-400 text-xs uppercase font-bold sticky top-0 z-10">
                            <tr>
                                <th class="px-4 py-3 bg-slate-50 dark:bg-[#0f172a] border-b dark:border-slate-800" data-i18n="pengirim">Pengirim</th>
                                <th class="px-4 py-3 bg-slate-50 dark:bg-[#0f172a] border-b dark:border-slate-800" data-i18n="subjek">Subjek</th>
                                <th class="px-4 py-3 bg-slate-50 dark:bg-[#0f172a] border-b dark:border-slate-800" data-i18n="pesan">Pesan</th>
                                <th class="px-4 py-3 bg-slate-50 dark:bg-[#0f172a] border-b dark:border-slate-800" data-i18n="tanggal">Tanggal</th>
                                <th class="px-4 py-3 bg-slate-50 dark:bg-[#0f172a] border-b dark:border-slate-800 text-center" data-i18n="status">Status</th>
                            </tr>
                        </thead>
                        <tbody id="feedbackTableBody" class="divide-y divide-slate-100 dark:divide-slate-800"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL KONFIRMASI HAPUS -->
    <div id="deleteModal" class="fixed inset-0 z-[10000] hidden bg-slate-900/70 backdrop-blur-sm flex items-center justify-center opacity-0 transition-opacity duration-300 p-4">
        <div id="deleteModalContent" class="bg-white dark:bg-[#0f172a] rounded-3xl p-6 md:p-8 max-w-sm w-full shadow-2xl border border-slate-200 dark:border-white/10 transform scale-95 transition-transform duration-300">
            <div class="w-16 h-16 rounded-full bg-red-100 dark:bg-red-900/30 flex items-center justify-center mx-auto mb-4 ring-8 ring-red-50 dark:ring-red-900/10"><i class="fas fa-exclamation-triangle text-2xl text-red-600 dark:text-red-400"></i></div>
            <h3 id="deleteModalTitle" class="text-xl font-bold text-center mb-2 text-slate-900 dark:text-white" data-i18n="hapus_pengguna">Hapus Pengguna?</h3>
            <p id="deleteModalText" class="text-center text-slate-500 text-sm mb-6" data-i18n="peringatan_hapus">Akun pengguna ini akan dihapus permanen.</p>
            <div class="flex gap-3">
                <button type="button" onclick="closeDeleteModal()" class="flex-1 px-4 py-2.5 rounded-xl font-bold bg-slate-100 dark:bg-slate-800 text-slate-800 dark:text-white hover:bg-slate-200 dark:hover:bg-slate-700 transition" data-i18n="batal">Batal</button>
                <button type="button" id="confirmDeleteBtn" class="flex-1 px-4 py-2.5 rounded-xl font-bold text-white bg-red-600 hover:bg-red-500 shadow-lg shadow-red-600/30 transition" data-i18n="ya_hapus">Ya, Hapus</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // ==========================================
        // TOGGLE SIDEBAR ADMIN (MOBILE)
        // ==========================================
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

        // ==========================================
        // KAMUS BAHASA
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
                feedback: "Feedback",
                pengaturan: "Pengaturan",
                keluar: "Keluar",
                lihat_website: "Lihat Website",
                role_admin: "Admin",
                notif_title: "Notifikasi",
                search_placeholder: "Cari destinasi, budaya, kuliner...",
                statistik_title: "Statistik Website",
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
                ya_hapus: "Ya, Hapus",
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
                tambah_konten: "Add Content",
                destinasi: "Destination",
                budaya: "Culture",
                kuliner: "Culinary",
                peta: "Map",
                pengguna: "Users",
                feedback: "Feedback",
                pengaturan: "Settings",
                keluar: "Logout",
                lihat_website: "View Website",
                role_admin: "Admin",
                notif_title: "Notifications",
                search_placeholder: "Search destinations, culture, culinary...",
                statistik_title: "Website Statistics",
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
                ya_hapus: "Yes, Delete",
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

        window.changeLanguage = function(lang) {
            localStorage.setItem('language', lang);

            document.querySelectorAll('[data-i18n]').forEach(el => {
                const key = el.getAttribute('data-i18n');
                if (translations[lang] && translations[lang][key]) {
                    el.innerText = translations[lang][key];
                }
            });

            document.querySelectorAll('[data-i18n-placeholder]').forEach(el => {
                const key = el.getAttribute('data-i18n-placeholder');
                if (translations[lang] && translations[lang][key]) {
                    el.placeholder = translations[lang][key];
                }
            });

            const slider = document.getElementById('lang-slider');
            const btnId = document.getElementById('btn-lang-id');
            const btnEn = document.getElementById('btn-lang-en');
            if (!slider) return;

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
            };

            // ==========================================
            // LOGIKA TEMA (LIGHT / DARK / SYSTEM)
            // ==========================================
            const html = document.documentElement;
            const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');

            function updateThemeUI(theme) {
                const btns = ['light', 'dark', 'system'].map(t => document.getElementById('btn-theme-' + t));

                btns.forEach(btn => {
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
                    if (mediaQuery.matches) html.classList.add('dark');
                    else html.classList.remove('dark');
                } else if (theme === 'dark') {
                    html.classList.add('dark');
                } else {
                    html.classList.remove('dark');
                }
                updateThemeUI(theme);
            };

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

                function makeBar(canvasId, label, labels, data, color, horizontal) {
                    const valueAxis = {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            color: textColor
                        },
                        grid: {
                            color: gridColor
                        }
                    };
                    const labelAxis = {
                        ticks: {
                            color: textColor
                        },
                        grid: {
                            display: false
                        }
                    };
                    const dataset = {
                        label: label,
                        data: data,
                        backgroundColor: color,
                        borderRadius: 6
                    };
                    if (horizontal) dataset.barThickness = 25;

                    return new Chart(document.getElementById(canvasId).getContext('2d'), {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [dataset]
                        },
                        options: {
                            indexAxis: horizontal ? 'y' : 'x',
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: false
                                }
                            },
                            scales: horizontal ? {
                                x: valueAxis,
                                y: labelAxis
                            } : {
                                y: valueAxis,
                                x: labelAxis
                            }
                        }
                    });
                }

                makeBar('ratingChart', 'Ulasan', ['1', '2', '3', '4', '5'], JSON.parse(holder.dataset.rating), ['#ef4444', '#f97316', '#eab308', '#10b981', '#059669'], false);

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

                makeBar('topDestinasiChart', 'Ulasan', JSON.parse(holder.dataset.topDestinasiLabels), JSON.parse(holder.dataset.topDestinasiData), 'rgba(16, 185, 129, 0.8)', true);
                makeBar('topKulinerChart', 'Ulasan', JSON.parse(holder.dataset.topKulinerLabels), JSON.parse(holder.dataset.topKulinerData), 'rgba(249, 115, 22, 0.8)', true);
                makeBar('topBudayaChart', 'Ulasan', JSON.parse(holder.dataset.topBudayaLabels), JSON.parse(holder.dataset.topBudayaData), 'rgba(168, 85, 247, 0.8)', true);
                makeBar('userReviewChart', 'Review', JSON.parse(holder.dataset.userReviewLabels), JSON.parse(holder.dataset.userReviewData), '#3b82f6', false);
                makeBar('kabupatenChart', 'Destinasi', JSON.parse(holder.dataset.kabLabels), JSON.parse(holder.dataset.kabData), 'rgba(236, 72, 153, 0.8)', true);

                // Sinkron warna chart saat tema berubah
                const observer = new MutationObserver(() => {
                    let nowDark = document.documentElement.classList.contains('dark');
                    let newText = nowDark ? '#94a3b8' : '#64748b';
                    let newGrid = nowDark ? '#334155' : '#e2e8f0';
                    Object.values(Chart.instances).forEach(chart => {
                        if (chart.options.scales) {
                            ['x', 'y'].forEach(axis => {
                                const sc = chart.options.scales[axis];
                                if (sc) {
                                    sc.ticks.color = newText;
                                    if (sc.grid && sc.grid.display !== false) sc.grid.color = newGrid;
                                }
                            });
                        }
                        if (chart.options.plugins.legend && chart.options.plugins.legend.labels) {
                            chart.options.plugins.legend.labels.color = newText;
                        }
                        chart.update();
                    });
                });
                observer.observe(document.documentElement, {
                    attributes: true,
                    attributeFilter: ['class']
                });
            }

            // ==========================================
            // NOTIFIKASI & MENU PROFIL (HEADER)
            // ==========================================
            const notifBtn = document.getElementById('notifBtn');
            const notifDropdown = document.getElementById('notifDropdown');
            const notifDot = document.getElementById('notifDot');
            const notifCount = document.getElementById('notifCount');
            const notifList = document.getElementById('notifList');
            const userMenuBtn = document.getElementById('userMenuBtn');
            const userDropdown = document.getElementById('userDropdown');
            const userChevron = document.getElementById('userChevron');

            function fetchNotifs() {
                fetch("{{ route('notifications.fetch') }}")
                    .then(res => res.json())
                    .then(data => {
                        if (data && data.data) {
                            if (data.count > 0) {
                                notifDot.classList.remove('hidden');
                                notifCount.innerText = data.count + ' Baru';
                            } else {
                                notifDot.classList.add('hidden');
                                notifCount.innerText = 'Tidak ada notif';
                            }
                            if (data.data.length > 0) {
                                let h = '';
                                data.data.forEach(n => {
                                    let isUnread = n.read_at === null;
                                    let bg = isUnread ? 'bg-emerald-50/50 dark:bg-emerald-900/10' : 'bg-transparent hover:bg-slate-50 dark:hover:bg-slate-800/50';
                                    let dot = isUnread ? '<span class="w-2 h-2 rounded-full bg-emerald-500 inline-block ml-2"></span>' : '';
                                    let url = n.data && n.data.url ? n.data.url : '#';
                                    h += `
                                        <a href="${url}" onclick="markRead('${n.id}')" class="block p-3 md:p-4 border-b border-slate-100 dark:border-slate-800 transition ${bg}">
                                            <p class="text-xs md:text-sm font-bold text-slate-800 dark:text-white leading-tight">${n.data.title} ${dot}</p>
                                            <p class="text-[10px] md:text-xs text-slate-600 dark:text-slate-400 mt-1">${n.data.message}</p>
                                            <p class="text-[9px] md:text-[10px] text-slate-400 mt-1"><i class="fas fa-clock mr-1"></i>${new Date(n.created_at).toLocaleString('id-ID')}</p>
                                        </a>
                                    `;
                                });
                                notifList.innerHTML = h;
                            } else {
                                notifList.innerHTML = '<div class="p-6 text-center text-xs md:text-sm text-slate-500"><i class="fas fa-bell-slash text-2xl mb-2 text-slate-300"></i><br>Belum ada notifikasi.</div>';
                            }
                        }
                    })
                    .catch(() => {});
            }

            if (notifBtn) {
                notifBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    notifDropdown.classList.toggle('hidden');
                    userDropdown.classList.add('hidden');
                    userChevron.style.transform = 'rotate(0deg)';
                    if (!notifDropdown.classList.contains('hidden')) {
                        notifDot.classList.add('hidden');
                        notifCount.innerText = 'Tidak ada notif';
                        fetch("{{ route('notifications.read') }}", {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json'
                            }
                        }).then(() => setTimeout(fetchNotifs, 500));
                    }
                });
            }

            if (userMenuBtn) {
                userMenuBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    userDropdown.classList.toggle('hidden');
                    notifDropdown.classList.add('hidden');
                    userChevron.style.transform = userDropdown.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
                });
            }

            window.markRead = function(id) {
                fetch(`/notifications/read/${id}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                }).then(() => fetchNotifs());
            };

            document.addEventListener('click', (e) => {
                if (notifDropdown && !notifDropdown.contains(e.target) && !notifBtn.contains(e.target)) notifDropdown.classList.add('hidden');
                if (userDropdown && !userDropdown.contains(e.target) && !userMenuBtn.contains(e.target)) {
                    userDropdown.classList.add('hidden');
                    userChevron.style.transform = 'rotate(0deg)';
                }
            });

            fetchNotifs();
            setInterval(fetchNotifs, 10000);

            // ==========================================
            // LOGIKA MODAL POP-UP
            // ==========================================
            var appData = document.getElementById('app-data');
            var currentUserId = parseInt(appData.dataset.userId);
            var apiUrl = appData.dataset.apiUrl;
            var csrfToken = appData.dataset.csrf;

            function openModal(modalId, contentId) {
                const modal = document.getElementById(modalId);
                const content = document.getElementById(contentId);
                modal.classList.remove('hidden');
                setTimeout(() => {
                    modal.classList.remove('opacity-0');
                    content.classList.remove('scale-95');
                    content.classList.add('scale-100');
                }, 10);
            }

            function closeModal(modalId, contentId) {
                const modal = document.getElementById(modalId);
                const content = document.getElementById(contentId);
                modal.classList.add('opacity-0');
                content.classList.remove('scale-100');
                content.classList.add('scale-95');
                setTimeout(() => modal.classList.add('hidden'), 300);
            }

            window.openSettingsModal = function(defaultTab = 'general') {
                // tutup dropdown profil & sidebar mobile jika terbuka
                userDropdown.classList.add('hidden');
                userChevron.style.transform = 'rotate(0deg)';
                const sb = document.getElementById('adminSidebar');
                if (sb && !sb.classList.contains('-translate-x-full') && window.innerWidth < 768) toggleAdminSidebar();

                openModal('settingsModal', 'settingsModalContent');
                setTimeout(() => switchSettingsTab(defaultTab), 10);
                updateThemeUI(localStorage.getItem('theme') || 'system');
            };
            window.closeSettingsModal = function() {
                closeModal('settingsModal', 'settingsModalContent');
            };

            window.openUsersModal = function() {
                const sb = document.getElementById('adminSidebar');
                if (sb && !sb.classList.contains('-translate-x-full') && window.innerWidth < 768) toggleAdminSidebar();

                openModal('usersModal', 'usersModalContent');

                const tbody = document.getElementById('usersTableBody');
                tbody.innerHTML = '<tr><td colspan="4" class="text-center py-6 text-slate-500"><i class="fas fa-spinner fa-spin mr-2"></i> Memuat data...</td></tr>';
                fetch(apiUrl).then(response => response.json()).then(users => {
                    let h = '';
                    users.forEach(user => {
                        let roleBadge = user.role === 'admin' ?
                            '<span class="text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded-md bg-amber-100 text-amber-700">ADMIN</span>' :
                            '<span class="text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded-md bg-emerald-100 text-emerald-700">USER</span>';
                        let actionBtn = user.id !== currentUserId ?
                            `<button onclick="confirmDeleteUser(${user.id})" class="w-8 h-8 rounded-lg bg-red-50 dark:bg-red-900/20 text-red-600 flex items-center justify-center hover:bg-red-100 dark:hover:bg-red-900/40 transition mx-auto"><i class="fas fa-trash text-sm"></i></button>` :
                            `<span class="text-[10px] text-slate-400">Anda</span>`;
                        h += `<tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition"><td class="px-4 py-3"><div class="flex items-center gap-3"><div class="w-8 h-8 rounded-full bg-emerald-500 text-white flex items-center justify-center font-bold text-xs shrink-0">${user.name.charAt(0).toUpperCase()}</div><span class="font-bold text-slate-800 dark:text-white text-sm">${user.name}</span></div></td><td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-300">${user.email}</td><td class="px-4 py-3">${roleBadge}</td><td class="px-4 py-3 text-center">${actionBtn}</td></tr>`;
                    });
                    tbody.innerHTML = h;
                }).catch(() => {
                    tbody.innerHTML = '<tr><td colspan="4" class="text-center py-6 text-red-500">Gagal memuat data.</td></tr>';
                });
            };
            window.closeUsersModal = function() {
                closeModal('usersModal', 'usersModalContent');
            };

            // ==========================================
            // LOGIKA MODAL FEEDBACK ADMIN
            // ==========================================
            window.openAdminFeedbackModal = function() {
                const sb = document.getElementById('adminSidebar');
                if (sb && !sb.classList.contains('-translate-x-full') && window.innerWidth < 768) toggleAdminSidebar();

                openModal('adminFeedbackModal', 'adminFeedbackModalContent');

                const tbody = document.getElementById('feedbackTableBody');
                tbody.innerHTML = '<tr><td colspan="5" class="text-center py-6 text-slate-500"><i class="fas fa-spinner fa-spin mr-2"></i> Memuat data feedback...</td></tr>';

                fetch("{{ route('admin.feedback.api') }}")
                    .then(res => res.json())
                    .then(data => {
                        let h = '';
                        const L = translations[localStorage.getItem('language') || 'id'];
                        if (data.length > 0) {
                            data.forEach(fb => {
                                const date = new Date(fb.created_at).toLocaleString('id-ID');
                                const isRead = fb.is_read;
                                const rowClass = isRead ? 'opacity-60 bg-slate-50 dark:bg-slate-800/20' : 'hover:bg-slate-50 dark:hover:bg-slate-800/30';
                                const actionBtn = isRead ?
                                    `<span class="text-xs text-emerald-500 flex items-center justify-center gap-1 font-bold"><i class="fas fa-check-circle"></i> ${L.dibaca}</span>` :
                                    `<button onclick="markFeedbackRead(${fb.id}, this)" class="px-3 py-1.5 bg-emerald-100 text-emerald-700 hover:bg-emerald-200 dark:bg-emerald-900/30 dark:text-emerald-400 rounded-lg transition text-xs font-bold flex items-center justify-center gap-1 mx-auto"><i class="fas fa-check"></i> ${L.tandai_dibaca}</button>`;

                                h += `
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
                            h = '<tr><td colspan="5" class="text-center py-6 text-slate-500">Belum ada feedback.</td></tr>';
                        }
                        tbody.innerHTML = h;
                    })
                    .catch(() => {
                        tbody.innerHTML = '<tr><td colspan="5" class="text-center py-6 text-red-500">Gagal memuat data.</td></tr>';
                    });
            };

            window.closeAdminFeedbackModal = function() {
                closeModal('adminFeedbackModal', 'adminFeedbackModalContent');
            };

            // TANDAI FEEDBACK TELAH DIBACA
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
                            tr.classList.add('opacity-60', 'bg-slate-50', 'dark:bg-slate-800/20');
                            tr.classList.remove('hover:bg-slate-50', 'dark:hover:bg-slate-800/30');

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

            // HAPUS PENGGUNA
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
                openModal('deleteModal', 'deleteModalContent');
            };

            document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
                if (typeof actionToExecute === 'function') actionToExecute();
            });

            window.closeDeleteModal = function() {
                closeModal('deleteModal', 'deleteModalContent');
                actionToExecute = null;
            };
        });

        // Preview Upload Foto
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

        // Lihat Password
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
</body>

</html>