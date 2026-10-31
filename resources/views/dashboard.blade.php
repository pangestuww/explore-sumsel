<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard User - Explore Sumatera</title>

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

        /* 🌙 Latar tema gelap: cahaya hijau lembut agar tidak datar */
        .dark body {
            background-image:
                radial-gradient(900px 500px at 85% -10%, rgba(16, 185, 129, 0.10), transparent 60%),
                radial-gradient(700px 450px at -10% 110%, rgba(20, 184, 166, 0.07), transparent 60%);
            background-attachment: fixed;
        }

        /* 💬 Chip subjek feedback */
        .fb-chip.active {
            background: #10b981;
            border-color: #10b981;
            color: #fff;
            box-shadow: 0 6px 16px rgba(16, 185, 129, 0.35);
        }

        /* 🧭 Tab modal Perjalanan Saya */
        .journey-tab {
            border-bottom: 2px solid transparent;
        }

        .journey-tab.active {
            border-bottom-color: #10b981;
            color: #059669;
        }

        .dark .journey-tab.active {
            color: #34d399;
        }

        /* 📱 Tinggi layar yang akurat di HP (address bar browser tidak memotong konten) */
        .app-shell {
            height: 100vh;
            height: 100dvh;
        }

        @keyframes floatBtn {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .animate-float-btn {
            animation: floatBtn 3s ease-in-out infinite;
        }

        /* 🌟 ANIMASI NAVBAR 🌟 */
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

        /* 🔔 Lonceng bergoyang saat di-hover */
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

        /* 📂 Dropdown muncul dengan efek pop */
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

        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        .dark ::-webkit-scrollbar-thumb {
            background: #475569;
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
    </style>
</head>

<body class="bg-[#f8fafc] dark:bg-[#0b1120] text-slate-800 dark:text-white transition-colors duration-300 overflow-x-hidden">

    <!-- OVERLAY GELAP SAAT SIDEBAR TERBUKA DI MOBILE -->
    <div id="userSidebarOverlay" onclick="toggleUserSidebar()" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-[90] hidden md:hidden transition-opacity"></div>

    <div class="app-shell flex h-screen overflow-hidden relative">

        <!-- SIDEBAR KIRI (Off-Canvas di Mobile) -->
        <aside id="userSidebar" class="fixed md:relative inset-y-0 left-0 z-[100] w-64 bg-gradient-to-b from-[#0f3d2e] to-[#062116] text-white flex flex-col justify-between shrink-0 transform -translate-x-full md:translate-x-0 transition-transform duration-300 shadow-2xl overflow-hidden">
            <div class="p-5 md:p-6 relative z-10 flex justify-between items-center">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-lg group-hover:scale-105 transition-transform shrink-0">
                        <i class="fas fa-leaf text-green-700 text-lg"></i>
                    </div>
                    <div>
                        <h1 class="font-extrabold text-lg tracking-tight leading-none">ExploreSumatera</h1>
                        <p class="text-[10px] text-emerald-200 mt-1" data-i18n="app_tagline">Jelajahi Keindahan, Rasakan Ceritanya</p>
                    </div>
                </a>
                <!-- Tombol Close Sidebar (Mobile) -->
                <button onclick="toggleUserSidebar()" class="md:hidden w-9 h-9 shrink-0 rounded-xl bg-white/10 text-white/80 hover:text-white hover:bg-white/20 flex items-center justify-center transition"><i class="fas fa-times text-lg"></i></button>
            </div>

            <div class="flex-1 overflow-y-auto px-4 py-4 relative z-10">
                <nav class="space-y-1">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 bg-emerald-600/30 text-white rounded-xl shadow-sm border border-emerald-500/30">
                        <i class="fas fa-home text-sm w-5 text-center"></i>
                        <span class="font-semibold text-sm" data-i18n="menu_home">Beranda</span>
                    </a>
                    <a href="{{ route('destinasi.index') }}" class="flex items-center gap-3 px-4 py-3 text-emerald-100/70 hover:text-white hover:bg-emerald-800/50 rounded-xl transition-all">
                        <i class="fas fa-map-marker-alt text-sm w-5 text-center"></i>
                        <span class="font-medium text-sm" data-i18n="menu_destinasi">Destinasi</span>
                    </a>
                    <a href="{{ route('budaya.index') }}" class="flex items-center gap-3 px-4 py-3 text-emerald-100/70 hover:text-white hover:bg-emerald-800/50 rounded-xl transition-all">
                        <i class="fas fa-masks-theater text-sm w-5 text-center"></i>
                        <span class="font-medium text-sm" data-i18n="menu_budaya">Budaya</span>
                    </a>
                    <a href="{{ route('kuliner.index') }}" class="flex items-center gap-3 px-4 py-3 text-emerald-100/70 hover:text-white hover:bg-emerald-800/50 rounded-xl transition-all">
                        <i class="fas fa-utensils text-sm w-5 text-center"></i>
                        <span class="font-medium text-sm" data-i18n="menu_kuliner">Kuliner</span>
                    </a>

                    <!-- 🌟 MENU FEEDBACK BARU 🌟 -->
                    <button onclick="openFeedbackModal()" class="w-full flex items-center gap-3 px-4 py-3 text-emerald-100/70 hover:text-white hover:bg-emerald-800/50 rounded-xl transition-all text-left">
                        <i class="fas fa-comment-dots text-sm w-5 text-center"></i>
                        <span class="font-medium text-sm" data-i18n="menu_feedback">Feedback</span>
                    </button>
                </nav>
            </div>

            <div class="relative z-10 p-6 mt-auto hidden md:block">
                <div class="absolute inset-0 bg-gradient-to-t from-[#062116] to-transparent z-0"></div>
                <div class="relative z-10">
                    <h2 class="font-serif italic text-2xl text-emerald-300 leading-tight" data-i18n="sidebar_slogan">Sumatera<br>Lebih Dekat<br>Bersama Kami</h2>
                </div>
            </div>
            <img src="https://images.unsplash.com/photo-1518531933037-91b2f5f229cc?q=80&w=600&auto=format&fit=crop" class="absolute bottom-0 left-0 w-full h-1/2 object-cover opacity-20 mix-blend-luminosity pointer-events-none z-0">
        </aside>

        <!-- AREA KONTEN -->
        <div class="flex-1 flex flex-col h-full relative overflow-hidden w-full min-w-0">

            <!-- 🌟 TOP NAVBAR (FLOATING PILL) 🌟 -->
            <div class="px-2.5 md:px-8 pt-2.5 md:pt-5 pb-1 shrink-0 relative z-50">
                <header class="group/nav relative h-14 md:h-[68px] max-w-6xl mx-auto bg-white/70 dark:bg-[#111c33]/75 backdrop-blur-2xl rounded-2xl flex items-center justify-between gap-2 md:gap-3 px-2 md:px-4 animate-navbar border border-slate-200/70 dark:border-white/10 shadow-[0_8px_30px_rgba(15,61,46,0.08)] dark:shadow-[0_8px_30px_rgba(0,0,0,0.45)] hover:shadow-[0_12px_40px_rgba(16,185,129,0.18)] hover:border-emerald-500/30 dark:hover:border-emerald-400/30 transition-all duration-300">
                    <!-- Garis cahaya hijau (muncul saat navbar di-hover) -->
                    <span class="pointer-events-none absolute bottom-0 inset-x-8 h-[2px] rounded-full bg-gradient-to-r from-transparent via-emerald-500 to-transparent opacity-0 scale-x-0 group-hover/nav:opacity-100 group-hover/nav:scale-x-100 transition-all duration-500"></span>

                    <!-- Kiri: Hamburger & Search -->
                    <div class="flex items-center gap-2 md:gap-3 flex-1 min-w-0">
                        <!-- Hamburger (Mobile) -->
                        <button onclick="toggleUserSidebar()" class="md:hidden w-9 h-9 shrink-0 rounded-xl bg-emerald-50 dark:bg-emerald-500/15 text-emerald-700 dark:text-emerald-400 dark:ring-1 dark:ring-emerald-400/20 flex items-center justify-center hover:bg-emerald-100 dark:hover:bg-emerald-500/25 hover:-translate-y-0.5 hover:shadow-md hover:shadow-emerald-500/20 active:scale-95 transition-all duration-200">
                            <i class="fas fa-bars text-sm"></i>
                        </button>

                        <!-- Search -->
                        <form action="{{ url('/search') }}" method="GET" class="relative w-full min-w-0 md:max-w-md md:focus-within:max-w-lg group transition-all duration-500 ease-out">
                            <div class="absolute inset-y-0 left-0 pl-3 md:pl-3.5 flex items-center pointer-events-none">
                                <i class="fas fa-search text-slate-400 group-hover:text-emerald-400 group-focus-within:text-emerald-500 group-focus-within:scale-125 transition-all duration-300 text-xs md:text-sm"></i>
                            </div>
                            <input type="text" name="q" placeholder="Cari destinasi, budaya..." data-i18n-placeholder="search_placeholder"
                                class="w-full pl-8 md:pl-10 pr-3 md:pr-4 h-9 md:h-10 rounded-xl bg-slate-100/80 dark:bg-white/5 border border-transparent dark:border-white/5 hover:border-slate-200 dark:hover:border-white/10 hover:bg-white dark:hover:bg-white/10 hover:shadow-sm focus:shadow-lg focus:shadow-emerald-500/10 focus:border-emerald-500/40 focus:bg-white dark:focus:bg-[#0b1120] text-xs md:text-sm text-slate-800 dark:text-white placeholder:text-slate-400 dark:placeholder:text-slate-500 placeholder:text-xs md:placeholder:text-sm focus:ring-4 focus:ring-emerald-500/10 outline-none transition-all truncate">
                        </form>
                    </div>

                    <!-- Kanan: Notifikasi & Profil -->
                    <div class="flex items-center gap-1 md:gap-2 shrink-0">

                        <!-- NOTIFIKASI -->
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

                        <!-- Pemisah tipis -->
                        <div class="hidden sm:block w-px h-7 bg-slate-200 dark:bg-white/10 mx-1"></div>

                        <!-- PROFIL USER -->
                        <div class="relative">
                            <button id="userMenuBtn" class="group flex items-center gap-2.5 hover:bg-slate-100/80 dark:hover:bg-white/5 hover:shadow-sm p-0.5 md:p-1 md:pr-3 rounded-xl active:scale-95 transition-all duration-200 focus:outline-none">
                                @if(Auth::user()->photo)
                                <img src="{{ asset('storage/' . Auth::user()->photo) }}" class="w-9 h-9 rounded-xl object-cover ring-2 ring-emerald-500/30 group-hover:ring-4 group-hover:ring-emerald-500/40 group-hover:scale-105 transition-all duration-300">
                                @elseif(Auth::user()->avatar)
                                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="w-9 h-9 rounded-xl object-cover ring-2 ring-emerald-500/30 group-hover:ring-4 group-hover:ring-emerald-500/40 group-hover:scale-105 transition-all duration-300">
                                @else
                                <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-emerald-400 to-emerald-600 text-white flex items-center justify-center font-bold shadow-md shadow-emerald-500/30 group-hover:scale-105 group-hover:rotate-3 group-hover:shadow-lg group-hover:shadow-emerald-500/40 transition-all duration-300">{{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}</div>
                                @endif
                                <div class="hidden md:block text-left max-w-[120px]">
                                    <p class="text-sm font-bold text-slate-800 dark:text-white leading-tight truncate">{{ Auth::user()->name ?? 'User' }}</p>
                                    <p class="text-[11px] text-emerald-600 dark:text-emerald-400 font-medium truncate" data-i18n="role_user">User</p>
                                </div>
                                {{-- Dibungkus span agar benar-benar tersembunyi di mobile (class .fas Font Awesome menimpa "hidden") --}}
                                <span class="hidden md:inline-flex items-center"><i class="fas fa-chevron-down text-[10px] text-slate-400 transition-transform duration-300" id="userChevron"></i></span>
                            </button>

                            <!-- Dropdown Profil -->
                            <div id="userDropdown" class="animate-dropdown hidden absolute right-0 mt-4 w-56 bg-white/95 dark:bg-[#111c33]/95 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-200/50 dark:border-white/10 z-[100] overflow-hidden origin-top-right">
                                <div class="px-4 py-3 bg-slate-50/70 dark:bg-white/5 border-b border-slate-100 dark:border-white/5 md:hidden">
                                    <p class="text-sm font-bold text-slate-800 dark:text-white truncate">{{ Auth::user()->name ?? 'User' }}</p>
                                    <p class="text-[11px] text-slate-500 dark:text-slate-400 truncate">{{ Auth::user()->email ?? '' }}</p>
                                </div>
                                <div class="p-2">
                                    <button onclick="openUserProfileModal()" class="group w-full text-left flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-slate-700 dark:text-slate-300 hover:bg-emerald-50 dark:hover:bg-emerald-500/10 hover:text-emerald-700 dark:hover:text-emerald-400 rounded-xl hover:translate-x-1 transition-all duration-200">
                                        <span class="w-7 h-7 rounded-lg bg-slate-100 dark:bg-white/5 flex items-center justify-center transition-transform duration-300 group-hover:scale-110 group-hover:rotate-6"><i class="fas fa-user text-xs text-slate-500 dark:text-slate-400"></i></span>
                                        <span data-i18n="profile_menu">Profil Saya</span>
                                    </button>
                                    <div class="h-px bg-slate-100 dark:bg-white/5 my-1"></div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="group w-full flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-xl hover:translate-x-1 transition-all duration-200 text-left">
                                            <span class="w-7 h-7 rounded-lg bg-red-50 dark:bg-red-900/20 flex items-center justify-center transition-transform duration-300 group-hover:scale-110 group-hover:-rotate-6"><i class="fas fa-sign-out-alt text-xs"></i></span>
                                            <span data-i18n="logout">Keluar</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
            </div>

            <!-- MAIN CONTENT (pb-28 di mobile agar tidak tertutup tombol pengaturan melayang) -->
            <main class="flex-1 overflow-y-auto px-4 pt-4 pb-28 md:p-8 custom-modal-scroll">
                <div class="max-w-6xl mx-auto space-y-5 md:space-y-8">

                    <!-- HERO BANNER -->
                    <div class="relative w-full rounded-2xl md:rounded-3xl overflow-hidden shadow-xl dark:shadow-[0_20px_50px_rgba(0,0,0,0.55)] dark:ring-1 dark:ring-white/10 group">
                        <img src="https://i0.wp.com/www.infobudaya.net/wp-content/uploads/2021/04/large-holbung-hill-view-at-toba-lake-sumatera-indonesia-0c6f46cefbcf08ccb86f5df01e34be43.jpg?fit=1200%2C675&ssl=1" class="w-full h-52 sm:h-64 md:h-72 object-cover group-hover:scale-105 transition-transform duration-700 dark:brightness-90">
                        <div class="absolute inset-0 bg-gradient-to-r from-[#062116]/90 via-[#062116]/60 to-transparent dark:from-[#04140d]/95 dark:via-[#04140d]/65"></div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent pointer-events-none"></div>
                        <div class="absolute inset-0 p-5 md:p-8 flex flex-col justify-center text-white">
                            <p class="text-emerald-300 text-xs md:text-sm font-semibold mb-1" data-i18n="welcome_back">Selamat datang kembali,</p>
                            <h1 class="text-2xl sm:text-3xl md:text-5xl font-black mb-2 md:mb-3 flex items-center gap-2 leading-tight">{{ Auth::user()->name ?? 'User' }} <span class="text-xl md:text-4xl">👋</span></h1>
                            <p class="text-xs md:text-base text-slate-200 max-w-[16rem] sm:max-w-md mb-3 md:mb-6 leading-relaxed" data-i18n="welcome_desc">Kelola perjalanan dan temukan destinasi favoritmu di Sumatera.</p>
                            <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-md border border-white/30 px-3 py-1.5 md:px-4 md:py-2 rounded-full text-[10px] md:text-xs font-bold w-max">
                                <i class="fas fa-map-marker-alt"></i> <span data-i18n="location">Sumatera, Indonesia</span>
                            </div>
                        </div>
                    </div>

                    <!-- STATS CARDS (2 kolom ringkas di mobile) -->
                    <div class="grid grid-cols-2 gap-3 md:gap-6">
                        <div class="relative overflow-hidden bg-white/80 dark:bg-gradient-to-br dark:from-[#16233f] dark:to-[#0e182c] backdrop-blur-md rounded-2xl md:rounded-3xl p-4 md:p-6 flex flex-col md:flex-row md:items-center justify-between shadow-sm dark:shadow-[0_10px_30px_rgba(0,0,0,0.35)] border border-slate-200/50 dark:border-white/10 hover:shadow-md dark:hover:border-amber-400/30 transition-all">
                            <!-- Cahaya aksen (hanya terlihat di tema gelap) -->
                            <div class="pointer-events-none absolute -top-10 -right-10 w-28 h-28 rounded-full bg-amber-400/0 dark:bg-amber-400/15 blur-2xl"></div>
                            <div class="relative flex flex-col md:flex-row md:items-center gap-3 md:gap-5">
                                <div class="w-11 h-11 md:w-14 md:h-14 rounded-xl md:rounded-2xl bg-amber-100 dark:bg-amber-500/15 dark:ring-1 dark:ring-amber-400/30 dark:shadow-[0_0_20px_rgba(245,158,11,0.25)] text-amber-500 dark:text-amber-400 flex items-center justify-center text-lg md:text-2xl shadow-inner shrink-0">
                                    <i class="fas fa-star"></i>
                                </div>
                                <div>
                                    <h3 class="text-sm md:text-lg font-bold text-slate-900 dark:text-white leading-tight" data-i18n="stat_review">Review Saya</h3>
                                    <p class="text-[10px] md:text-xs text-slate-500 dark:text-slate-400 leading-snug mt-0.5 md:mt-0" data-i18n="stat_review_desc">Total ulasan yang kamu buat</p>
                                    <p class="text-3xl md:text-3xl font-black text-slate-900 dark:text-white mt-1.5 md:mt-1">{{ $totalReviews ?? 0 }}</p>
                                </div>
                            </div>
                            <div class="relative hidden md:flex w-8 h-8 md:w-10 md:h-10 rounded-full bg-slate-50 dark:bg-white/5 items-center justify-center text-slate-400 shrink-0">
                                <i class="fas fa-clipboard-list"></i>
                            </div>
                        </div>

                        <div class="relative overflow-hidden bg-white/80 dark:bg-gradient-to-br dark:from-[#16233f] dark:to-[#0e182c] backdrop-blur-md rounded-2xl md:rounded-3xl p-4 md:p-6 flex flex-col md:flex-row md:items-center justify-between shadow-sm dark:shadow-[0_10px_30px_rgba(0,0,0,0.35)] border border-slate-200/50 dark:border-white/10 hover:shadow-md dark:hover:border-pink-400/30 transition-all">
                            <!-- Cahaya aksen (hanya terlihat di tema gelap) -->
                            <div class="pointer-events-none absolute -top-10 -right-10 w-28 h-28 rounded-full bg-pink-400/0 dark:bg-pink-400/15 blur-2xl"></div>
                            <div class="relative flex flex-col md:flex-row md:items-center gap-3 md:gap-5">
                                <div class="w-11 h-11 md:w-14 md:h-14 rounded-xl md:rounded-2xl bg-pink-100 dark:bg-pink-500/15 dark:ring-1 dark:ring-pink-400/30 dark:shadow-[0_0_20px_rgba(236,72,153,0.25)] text-pink-500 dark:text-pink-400 flex items-center justify-center text-lg md:text-2xl shadow-inner shrink-0">
                                    <i class="fas fa-heart"></i>
                                </div>
                                <div>
                                    <h3 class="text-sm md:text-lg font-bold text-slate-900 dark:text-white leading-tight" data-i18n="stat_fav">Favorit Saya</h3>
                                    <p class="text-[10px] md:text-xs text-slate-500 dark:text-slate-400 leading-snug mt-0.5 md:mt-0" data-i18n="stat_fav_desc">Destinasi yang kamu simpan</p>
                                    <p class="text-3xl md:text-3xl font-black text-slate-900 dark:text-white mt-1.5 md:mt-1">{{ $totalFavorit ?? 0 }}</p>
                                </div>
                            </div>
                            <div class="relative hidden md:flex w-8 h-8 md:w-10 md:h-10 rounded-full bg-slate-50 dark:bg-white/5 items-center justify-center text-slate-400 shrink-0">
                                <i class="fas fa-heart"></i>
                            </div>
                        </div>
                    </div>

                    <!-- PERJALANAN SAYA -->
                    <div>
                        <div class="flex items-center justify-between mb-3 md:mb-4">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-route text-emerald-600 dark:text-emerald-400 text-lg md:text-xl"></i>
                                <h2 class="text-base md:text-xl font-bold text-slate-900 dark:text-white" data-i18n="journey_title">Perjalanan Saya</h2>
                            </div>
                            <button type="button" onclick="openJourneyModal()" class="text-xs md:text-sm font-bold text-emerald-600 dark:text-emerald-400 hover:text-emerald-500 dark:hover:text-emerald-300 flex items-center gap-1"><span data-i18n="see_all">Lihat Semua</span> <i class="fas fa-arrow-right text-xs"></i></button>
                        </div>
                        <div class="grid grid-cols-2 gap-3 md:gap-4">

                            {{-- TOMBOL ITINERARY --}}
                            <button onclick="openItineraryModal()" class="w-full text-left bg-white dark:bg-gradient-to-br dark:from-[#16233f] dark:to-[#0e182c] rounded-2xl p-3.5 md:p-4 flex flex-col md:flex-row items-start md:items-center gap-3 md:gap-4 shadow-sm dark:shadow-[0_8px_24px_rgba(0,0,0,0.3)] border border-slate-100 dark:border-white/10 hover:border-emerald-500 dark:hover:border-emerald-400/60 hover:shadow-md dark:hover:shadow-[0_8px_30px_rgba(16,185,129,0.15)] transition group">
                                <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-emerald-50 dark:bg-emerald-500/15 dark:ring-1 dark:ring-emerald-400/25 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-lg md:text-xl shrink-0 group-hover:scale-110 transition-transform">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-bold text-slate-900 dark:text-white text-xs md:text-sm" data-i18n="journey_itinerary">Itinerary Saya</h3>
                                    <p class="text-[10px] md:text-xs text-slate-500 dark:text-slate-400 leading-snug" data-i18n="journey_itinerary_desc">Atur jadwal perjalanan.</p>
                                </div>
                                {{-- Dibungkus span agar benar-benar tersembunyi di mobile --}}
                                <span class="hidden md:block"><i class="fas fa-chevron-right text-slate-300 dark:text-slate-500 group-hover:text-emerald-500 transition-transform group-hover:translate-x-1"></i></span>
                            </button>

                            {{-- TOMBOL FAVORIT (BUKA MODAL) --}}
                            <button onclick="openFavoritModal()" class="w-full text-left bg-white dark:bg-gradient-to-br dark:from-[#16233f] dark:to-[#0e182c] rounded-2xl p-3.5 md:p-4 flex flex-col md:flex-row items-start md:items-center gap-3 md:gap-4 shadow-sm dark:shadow-[0_8px_24px_rgba(0,0,0,0.3)] border border-slate-100 dark:border-white/10 hover:border-emerald-500 dark:hover:border-emerald-400/60 hover:shadow-md dark:hover:shadow-[0_8px_30px_rgba(16,185,129,0.15)] transition group">
                                <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-emerald-50 dark:bg-emerald-500/15 dark:ring-1 dark:ring-emerald-400/25 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-lg md:text-xl shrink-0 group-hover:scale-110 transition-transform">
                                    <i class="fas fa-bookmark"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-bold text-slate-900 dark:text-white text-xs md:text-sm" data-i18n="journey_fav">Favorit Saya</h3>
                                    <p class="text-[10px] md:text-xs text-slate-500 dark:text-slate-400 leading-snug" data-i18n="journey_fav_desc">Lihat wisata tersimpan.</p>
                                </div>
                                <span class="hidden md:block"><i class="fas fa-chevron-right text-slate-300 dark:text-slate-500 group-hover:text-emerald-500 transition-transform group-hover:translate-x-1"></i></span>
                            </button>
                        </div>
                    </div>

                    <!-- REVIEW TERAKHIR -->
                    <div>
                        <div class="flex items-center justify-between mb-3 md:mb-4">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-comments text-emerald-600 dark:text-emerald-400 text-lg md:text-xl"></i>
                                <h2 class="text-base md:text-xl font-bold text-slate-900 dark:text-white" data-i18n="review_title">Review Terakhir</h2>
                            </div>
                            <button type="button" onclick="openReviewsModal()" class="text-xs md:text-sm font-bold text-emerald-600 dark:text-emerald-400 hover:text-emerald-500 dark:hover:text-emerald-300 flex items-center gap-1"><span data-i18n="see_all">Lihat Semua</span> <i class="fas fa-arrow-right text-xs"></i></button>
                        </div>

                        @if(isset($recentReviews) && $recentReviews->count() > 0)
                        @php
                        $review = $recentReviews->first();
                        $link = '#';
                        $namaTempat = 'Destinasi';
                        $gambarUrl = 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?q=80&w=400&auto=format&fit=crop';

                        if ($review->destinasi) {
                        $link = route('destinasi.show', $review->destinasi->slug);
                        $namaTempat = $review->destinasi->nama;
                        if ($review->destinasi->gambar) {
                        $gambarUrl = str_starts_with($review->destinasi->gambar, 'http') ? $review->destinasi->gambar : asset('storage/'.$review->destinasi->gambar);
                        }
                        } elseif ($review->budaya) {
                        $link = route('budaya.show', $review->budaya->slug);
                        $namaTempat = $review->budaya->nama;
                        if ($review->budaya->gambar) {
                        $gambarUrl = str_starts_with($review->budaya->gambar, 'http') ? $review->budaya->gambar : asset('storage/'.$review->budaya->gambar);
                        }
                        } elseif ($review->kuliner) {
                        $link = route('kuliner.show', $review->kuliner->slug);
                        $namaTempat = $review->kuliner->nama;
                        if ($review->kuliner->gambar) {
                        $gambarUrl = str_starts_with($review->kuliner->gambar, 'http') ? $review->kuliner->gambar : asset('storage/'.$review->kuliner->gambar);
                        }
                        }
                        @endphp

                        <a href="{{ $link }}" class="bg-white dark:bg-gradient-to-br dark:from-[#16233f] dark:to-[#0e182c] rounded-2xl p-3 md:p-4 flex flex-col md:flex-row items-start md:items-center gap-3 md:gap-6 shadow-sm dark:shadow-[0_10px_30px_rgba(0,0,0,0.35)] border border-slate-100 dark:border-white/10 relative group hover:border-emerald-500 dark:hover:border-emerald-400/60 transition block">
                            <img src="{{ $gambarUrl }}" alt="{{ $namaTempat }}" class="w-full md:w-48 h-40 md:h-32 object-cover rounded-xl shadow-sm dark:ring-1 dark:ring-white/10">
                            <div class="flex-1 w-full px-1 pb-1 md:p-0">
                                <h3 class="font-bold text-base md:text-lg text-slate-900 dark:text-white mb-1 group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition">{{ $namaTempat }}</h3>
                                <div class="flex items-center gap-2 text-amber-500 dark:text-amber-400 text-xs md:text-sm mb-2">
                                    <div class="flex">
                                        @for($i=1; $i<=5; $i++)
                                            <i class="fas fa-star {{ $i <= $review->rating ? '' : 'text-slate-300 dark:text-slate-600' }}"></i>
                                            @endfor
                                    </div>
                                    <span class="text-slate-600 dark:text-slate-300 font-bold text-[10px] md:text-xs">{{ $review->rating }}.0/5</span>
                                </div>
                                <p class="text-xs md:text-sm text-slate-600 dark:text-slate-300 mb-3 italic line-clamp-2">"{{ $review->komentar }}"</p>
                                <p class="text-[10px] md:text-xs text-slate-400 dark:text-slate-500 flex items-center gap-1"><i class="fas fa-calendar"></i> {{ $review->created_at->translatedFormat('d F Y') }}</p>
                            </div>
                            <span class="hidden md:block"><i class="fas fa-chevron-right text-slate-300 dark:text-slate-500 group-hover:text-emerald-500 transition"></i></span>
                        </a>
                        @else
                        <div class="bg-white dark:bg-gradient-to-br dark:from-[#16233f] dark:to-[#0e182c] rounded-2xl p-8 md:p-10 flex flex-col items-center justify-center text-center shadow-sm border border-slate-100 dark:border-white/10">
                            <i class="fas fa-comment-slash text-4xl text-slate-300 dark:text-slate-600 mb-4"></i>
                            <p class="text-slate-700 dark:text-slate-200 font-bold mb-1" data-i18n="review_empty">Belum ada review</p>
                            <p class="text-slate-500 dark:text-slate-400 text-sm" data-i18n="review_empty_desc">Mulai beri review destinasi favoritmu!</p>
                        </div>
                        @endif
                    </div>

                </div>
            </main>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- 🌟 MODAL PROFIL SAYA (FIXED MOBILE) 🌟 -->
    <!-- ========================================== -->
    @auth
    <div id="userProfileModal" class="fixed inset-0 z-[9999] hidden bg-slate-900/60 backdrop-blur-md flex items-center justify-center opacity-0 transition-opacity duration-300 p-4">
        <div id="userProfileModalContent" class="bg-white dark:bg-[#0f172a] rounded-3xl w-full max-w-4xl shadow-2xl border border-slate-200 dark:border-white/10 transform scale-95 transition-transform duration-300 overflow-hidden flex flex-col md:flex-row h-[90vh] md:h-[600px] md:max-h-[90vh]">

            <!-- Sidebar Kiri Modal (Hanya Desktop) -->
            <div class="hidden md:flex w-64 bg-slate-50 dark:bg-slate-800/50 border-r border-slate-200 dark:border-slate-700 p-6 flex-col">
                <h3 class="text-xl font-bold text-slate-800 dark:text-white mb-6">Pengaturan</h3>
                <nav class="space-y-2 flex-1">
                    <button class="w-full flex items-center gap-3 px-4 py-3 rounded-xl bg-white dark:bg-slate-700 text-slate-900 dark:text-white shadow-sm border border-slate-200 dark:border-slate-600 transition text-left font-bold">
                        <i class="fas fa-user"></i> Profil Saya
                    </button>
                </nav>
            </div>

            <!-- Konten Kanan Modal -->
            <div class="flex-1 flex flex-col h-full overflow-hidden relative bg-white dark:bg-[#0f172a]">

                <!-- Header Modal (Rapi di Mobile & Desktop) -->
                <div class="flex justify-between items-center p-4 md:px-8 md:py-6 border-b border-slate-200 dark:border-slate-800 bg-slate-50/50 dark:bg-slate-800/20 shrink-0">
                    <h2 class="text-lg md:text-2xl font-bold text-slate-900 dark:text-white flex items-center gap-2">
                        <i class="fas fa-user-circle text-emerald-500 md:hidden"></i> Profil Saya
                    </h2>
                    <button onclick="closeUserProfileModal()" class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 flex items-center justify-center text-slate-500 hover:bg-red-100 hover:text-red-600 transition shadow-sm">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <!-- Form Area (Scrollable) -->
                <div class="flex-1 overflow-y-auto p-4 md:p-8 custom-modal-scroll">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="flex flex-col md:flex-row gap-6 md:gap-8 items-start mb-6">

                            <!-- Foto Profil -->
                            <div class="flex flex-col items-center w-full md:w-auto shrink-0">
                                <div class="relative w-24 h-24 md:w-28 md:h-28 rounded-full border-4 border-emerald-500 p-1 mb-2">
                                    @if(Auth::user()->photo)
                                    <img src="{{ asset('storage/' . Auth::user()->photo) }}" class="w-full h-full rounded-full object-cover">
                                    @elseif(Auth::user()->avatar)
                                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="w-full h-full rounded-full object-cover">
                                    @else
                                    <div class="w-full h-full rounded-full bg-emerald-100 dark:bg-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-3xl md:text-4xl font-bold">
                                        {{ substr(Auth::user()->name, 0, 1) }}
                                    </div>
                                    @endif
                                    <label class="absolute bottom-0 right-0 w-7 h-7 md:w-8 md:h-8 bg-emerald-500 rounded-full flex items-center justify-center text-white cursor-pointer hover:bg-emerald-600 transition border-2 border-white dark:border-slate-900 shadow-md">
                                        <i class="fas fa-camera text-[10px] md:text-xs"></i>
                                        <input type="file" name="photo" class="hidden" accept="image/*">
                                    </label>
                                </div>
                                <p class="text-[10px] text-slate-500 text-center font-semibold">Maks 2MB (JPG/PNG)</p>
                            </div>

                            <!-- Input Form -->
                            <div class="flex-1 space-y-4 w-full">
                                <div>
                                    <label class="block text-[11px] md:text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Nama Lengkap</label>
                                    <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" required class="w-full px-4 py-2.5 md:py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 outline-none transition text-sm md:text-base">
                                </div>

                                <div>
                                    <label class="block text-[11px] md:text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Alamat Email</label>
                                    <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" required class="w-full px-4 py-2.5 md:py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 outline-none transition text-sm md:text-base">
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-[11px] md:text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Pekerjaan</label>
                                        <input type="text" name="job" value="{{ old('job', Auth::user()->job ?? '') }}" placeholder="Contoh: Mahasiswa" class="w-full px-4 py-2.5 md:py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 outline-none transition text-sm md:text-base">
                                    </div>
                                    <div>
                                        <label class="block text-[11px] md:text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Alamat</label>
                                        <input type="text" name="address" value="{{ old('address', Auth::user()->address ?? '') }}" placeholder="Contoh: Palembang" class="w-full px-4 py-2.5 md:py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 outline-none transition text-sm md:text-base">
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-[11px] md:text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Ganti Password (Opsional)</label>
                                    <input type="password" name="password" placeholder="Biarkan kosong jika tidak diubah" class="w-full px-4 py-2.5 md:py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 outline-none transition text-sm md:text-base">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-emerald-500 hover:bg-emerald-600 text-white font-bold py-3 md:py-3.5 rounded-xl transition shadow-lg shadow-emerald-500/30 flex items-center justify-center gap-2 text-sm md:text-base">
                            <i class="fas fa-check-circle"></i> Simpan Perubahan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endauth

    <!-- ========================================== -->
    <!-- 🌟 MODAL ITINERARY (JADWAL PERJALANAN) 🌟 -->
    <!-- ========================================== -->
    <div id="itineraryModal" class="fixed inset-0 z-[9999] hidden bg-slate-900/60 backdrop-blur-md flex items-center justify-center opacity-0 transition-opacity duration-300 p-4">
        <div id="itineraryModalContent" class="bg-white dark:bg-[#0f172a] rounded-3xl w-full max-w-lg max-h-[90vh] shadow-2xl border border-slate-200 dark:border-white/10 transform scale-95 transition-transform duration-300 overflow-y-auto custom-modal-scroll">

            <!-- Header -->
            <div class="flex justify-between items-center p-4 md:p-6 border-b border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-800/30">
                <h3 class="text-lg md:text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2">
                    <i class="fas fa-calendar-alt text-emerald-500"></i> Rencana Perjalanan
                </h3>
                <button onclick="closeItineraryModal()" class="w-8 h-8 rounded-full bg-white dark:bg-slate-800 flex items-center justify-center text-slate-500 hover:bg-red-100 hover:text-red-600 transition">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Form -->
            <form class="p-4 md:p-6 space-y-4">
                <div>
                    <label class="block text-[10px] md:text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Nama Perjalanan</label>
                    <input type="text" placeholder="Contoh: Liburan ke Danau Toba" class="w-full px-3 md:px-4 py-2 md:py-3 text-sm rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 outline-none transition">
                </div>

                <div class="grid grid-cols-2 gap-3 md:gap-4">
                    <div>
                        <label class="block text-[10px] md:text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Tanggal Mulai</label>
                        <input type="date" class="w-full px-3 md:px-4 py-2 md:py-3 text-sm rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 outline-none transition">
                    </div>
                    <div>
                        <label class="block text-[10px] md:text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Tanggal Selesai</label>
                        <input type="date" class="w-full px-3 md:px-4 py-2 md:py-3 text-sm rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 outline-none transition">
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] md:text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Destinasi Tujuan</label>
                    <select name="destinasi_id" class="w-full px-3 md:px-4 py-2 md:py-3 text-sm rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 outline-none transition">
                        <option value="">-- Pilih Destinasi --</option>
                        @foreach($destinasis as $dest)
                        <option value="{{ $dest->id }}">{{ $dest->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-[10px] md:text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Catatan (Opsional)</label>
                    <textarea rows="3" placeholder="Bawa baju hangat, siapkan kamera..." class="w-full px-3 md:px-4 py-2 md:py-3 text-sm rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 outline-none transition"></textarea>
                </div>

                <button type="button" class="w-full bg-emerald-500 hover:bg-emerald-600 text-white font-bold py-3 rounded-xl transition shadow-lg shadow-emerald-500/30 flex items-center justify-center gap-2 mt-2 md:mt-4 text-sm">
                    <i class="fas fa-plus-circle"></i> Tambah Ke Itinerary
                </button>
            </form>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- 🌟 MODAL FAVORIT (DESAIN BARU MODERN) 🌟 -->
    <!-- ========================================== -->
    <div id="favoritModal" class="fixed inset-0 z-[9999] hidden bg-slate-900/60 backdrop-blur-md flex items-center justify-center opacity-0 transition-opacity duration-300 p-4">
        <div id="favoritModalContent" class="bg-white dark:bg-[#0f172a] rounded-3xl w-full max-w-5xl shadow-2xl border border-slate-200 dark:border-white/10 transform scale-95 transition-transform duration-300 overflow-hidden flex flex-col h-[600px] max-h-[90vh]">

            <!-- Header Modal -->
            <div class="flex justify-between items-center p-4 md:p-6 border-b border-slate-200 dark:border-slate-800 bg-white dark:bg-[#0f172a] shrink-0">
                <div>
                    <h3 class="text-xl md:text-2xl font-bold text-slate-900 dark:text-white flex items-center gap-2 md:gap-3">
                        <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-red-100 dark:bg-red-900/30 flex items-center justify-center text-red-500">
                            <i class="fas fa-heart text-sm md:text-base"></i>
                        </div>
                        Favorit Saya
                    </h3>
                    <p class="text-xs md:text-sm text-slate-500 dark:text-slate-400 mt-1 md:ml-13">Koleksi destinasi, budaya, dan kuliner yang kamu simpan.</p>
                </div>
                <button onclick="closeFavoritModal()" class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-500 hover:bg-red-100 hover:text-red-600 transition shrink-0 ml-3">
                    <i class="fas fa-times text-base md:text-lg"></i>
                </button>
            </div>

            <!-- Body Modal -->
            <div class="flex-1 p-4 md:p-6 overflow-y-auto custom-modal-scroll bg-slate-50 dark:bg-[#0b1120]">

                @if(isset($favorites) && $favorites->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                    @foreach($favorites as $fav)
                    @php
                    $link = '#';
                    $gambar = 'https://via.placeholder.com/400x300';
                    $judul = 'Tidak diketahui';
                    $tipe = 'Lainnya';
                    $warnaBadge = 'bg-slate-500/80 text-white';

                    // Cek tipe favorit
                    if ($fav->destinasi) {
                    $link = route('destinasi.show', $fav->destinasi->slug);
                    $judul = $fav->destinasi->nama;
                    $tipe = 'Destinasi';
                    $warnaBadge = 'bg-emerald-500/90 text-white';
                    $gambar = $fav->destinasi->gambar ? (str_starts_with($fav->destinasi->gambar, 'http') ? $fav->destinasi->gambar : asset('storage/'.$fav->destinasi->gambar)) : 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400';
                    } elseif ($fav->budaya) {
                    $link = route('budaya.show', $fav->budaya->slug);
                    $judul = $fav->budaya->nama;
                    $tipe = 'Budaya';
                    $warnaBadge = 'bg-purple-500/90 text-white';
                    $gambar = $fav->budaya->gambar ? (str_starts_with($fav->budaya->gambar, 'http') ? $fav->budaya->gambar : asset('storage/'.$fav->budaya->gambar)) : 'https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?w=400';
                    } elseif ($fav->kuliner) {
                    $link = route('kuliner.show', $fav->kuliner->slug);
                    $judul = $fav->kuliner->nama;
                    $tipe = 'Kuliner';
                    $warnaBadge = 'bg-orange-500/90 text-white';
                    $gambar = $fav->kuliner->gambar ? (str_starts_with($fav->kuliner->gambar, 'http') ? $fav->kuliner->gambar : asset('storage/'.$fav->kuliner->gambar)) : 'https://images.unsplash.com/photo-1555939594-58d7cb561ad1?w=400';
                    }
                    @endphp

                    <!-- Card Favorit Modern -->
                    <a href="{{ $link }}" class="bg-white dark:bg-gradient-to-br dark:from-[#16233f] dark:to-[#0e182c] rounded-2xl border border-slate-200 dark:border-white/10 overflow-hidden hover:border-emerald-500 dark:hover:border-emerald-400/60 hover:shadow-xl hover:shadow-emerald-500/10 hover:-translate-y-1 transition-all duration-300 group flex flex-col">

                        <!-- Gambar & Badge -->
                        <div class="relative h-40 md:h-44 w-full overflow-hidden">
                            <img src="{{ $gambar }}" alt="{{ $judul }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>

                            <!-- Badge Kategori -->
                            <span class="absolute top-2 left-2 md:top-3 md:left-3 text-[9px] md:text-[10px] font-bold {{ $warnaBadge }} backdrop-blur-md uppercase tracking-wider px-2 py-0.5 md:px-2.5 md:py-1 rounded-full shadow-sm">
                                {{ $tipe }}
                            </span>
                        </div>

                        <!-- Konten Card -->
                        <div class="p-3 md:p-4 flex-1 flex flex-col justify-between">
                            <div>
                                <h4 class="font-bold text-base md:text-lg text-slate-900 dark:text-white leading-tight group-hover:text-emerald-500 transition line-clamp-1">{{ $judul }}</h4>
                                <p class="text-[10px] md:text-xs text-slate-500 dark:text-slate-400 mt-1">Tersimpan di favorit</p>
                            </div>

                            <!-- Tombol Detail -->
                            <div class="mt-3 md:mt-4 pt-2 md:pt-3 border-t border-slate-100 dark:border-white/10 flex justify-between items-center text-emerald-600 dark:text-emerald-400 font-bold text-xs md:text-sm">
                                <span>Lihat Detail</span>
                                <div class="w-6 h-6 md:w-7 md:h-7 rounded-full bg-emerald-50 dark:bg-emerald-500/15 flex items-center justify-center group-hover:bg-emerald-500 group-hover:text-white transition-colors">
                                    <i class="fas fa-arrow-right text-[10px] md:text-xs"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
                @else
                <!-- Tampilan Jika Belum Ada Favorit -->
                <div class="h-full flex flex-col items-center justify-center text-center py-10 px-4">
                    <div class="w-20 h-20 md:w-24 md:h-24 bg-slate-200 dark:bg-slate-800 rounded-full flex items-center justify-center mb-4 md:mb-6 shadow-inner">
                        <i class="fas fa-heart-broken text-3xl md:text-4xl text-slate-400"></i>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold text-slate-800 dark:text-white mb-2">Belum Ada Favorit</h3>
                    <p class="text-xs md:text-sm text-slate-500 dark:text-slate-400 max-w-sm">Kamu belum menyimpan destinasi, budaya, atau kuliner apa pun. Yuk jelajahi dan simpan tempat favoritmu!</p>
                    <a href="{{ route('destinasi.index') }}" class="mt-4 md:mt-6 bg-emerald-500 hover:bg-emerald-600 text-white font-bold py-2 md:py-2.5 px-4 md:px-6 text-sm rounded-xl transition shadow-lg shadow-emerald-500/30">
                        Mulai Jelajah
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- 🌟 MODAL FEEDBACK (USER) 🌟 -->
    <!-- ========================================== -->
    <div id="feedbackModal" class="fixed inset-0 z-[9999] hidden bg-slate-900/60 backdrop-blur-md flex items-center justify-center opacity-0 transition-opacity duration-300 p-4">
        <div id="feedbackModalContent" class="bg-white dark:bg-[#0f172a] rounded-3xl w-full max-w-lg max-h-[90vh] shadow-2xl border border-slate-200 dark:border-white/10 transform scale-95 transition-transform duration-300 overflow-y-auto custom-modal-scroll">

            <!-- Header bergradasi -->
            <div class="relative overflow-hidden bg-gradient-to-br from-emerald-500 via-emerald-600 to-teal-700 px-5 py-6 md:px-8 md:py-7 text-white">
                <div class="pointer-events-none absolute -top-10 -right-8 w-40 h-40 rounded-full bg-white/10 blur-2xl"></div>
                <div class="pointer-events-none absolute -bottom-12 -left-6 w-32 h-32 rounded-full bg-teal-300/20 blur-2xl"></div>
                <button type="button" onclick="closeFeedbackModal()" class="absolute top-4 right-4 w-8 h-8 rounded-full bg-white/20 hover:bg-white/30 flex items-center justify-center text-white transition">
                    <i class="fas fa-times"></i>
                </button>
                <div class="relative flex items-center gap-4 pr-8">
                    <div class="w-12 h-12 md:w-14 md:h-14 rounded-2xl bg-white/20 ring-1 ring-white/30 backdrop-blur flex items-center justify-center text-xl md:text-2xl shrink-0">
                        <i class="fas fa-comment-dots"></i>
                    </div>
                    <div>
                        <h3 class="text-lg md:text-2xl font-extrabold leading-tight" data-i18n="kirim_feedback">Kirim Feedback</h3>
                        <p class="text-xs md:text-sm text-emerald-50/90 mt-0.5" data-i18n="fb_subtitle">Bantu kami jadi lebih baik dengan saran dan masukanmu.</p>
                    </div>
                </div>
            </div>

            <form class="p-5 md:p-8 space-y-5" onsubmit="submitFeedback(event)">
                <!-- Pilihan cepat subjek -->
                <div>
                    <p class="text-[10px] md:text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-2" data-i18n="fb_quick">Pilih topik cepat</p>
                    <div class="flex flex-wrap gap-2">
                        <button type="button" onclick="setFeedbackSubject(this)" class="fb-chip inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:border-emerald-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition">
                            <i class="fas fa-lightbulb"></i><span data-i18n="fb_chip_saran">Saran</span>
                        </button>
                        <button type="button" onclick="setFeedbackSubject(this)" class="fb-chip inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:border-emerald-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition">
                            <i class="fas fa-bug"></i><span data-i18n="fb_chip_bug">Laporan Masalah</span>
                        </button>
                        <button type="button" onclick="setFeedbackSubject(this)" class="fb-chip inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:border-emerald-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition">
                            <i class="fas fa-circle-question"></i><span data-i18n="fb_chip_tanya">Pertanyaan</span>
                        </button>
                        <button type="button" onclick="setFeedbackSubject(this)" class="fb-chip inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:border-emerald-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition">
                            <i class="fas fa-ellipsis"></i><span data-i18n="fb_chip_lain">Lainnya</span>
                        </button>
                    </div>
                </div>

                <!-- Subjek -->
                <div>
                    <label for="feedbackSubject" class="block text-[10px] md:text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-2" data-i18n="subjek">Subjek</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400"><i class="fas fa-pen text-xs"></i></div>
                        <input type="text" id="feedbackSubject" required placeholder="Tulis subjek singkat..." data-i18n-placeholder="fb_subject_ph" oninput="document.querySelectorAll('.fb-chip').forEach(c => c.classList.remove('active'))" class="w-full pl-10 pr-4 py-3 text-sm rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/60 text-slate-900 dark:text-white placeholder:text-slate-400 dark:placeholder:text-slate-500 focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-500 outline-none transition">
                    </div>
                </div>

                <!-- Pesan -->
                <div>
                    <label for="feedbackMessage" class="block text-[10px] md:text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-2" data-i18n="pesan">Pesan</label>
                    <textarea id="feedbackMessage" rows="5" required placeholder="Ceritakan masukanmu di sini..." data-i18n-placeholder="fb_message_ph" class="w-full px-4 py-3 text-sm rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/60 text-slate-900 dark:text-white placeholder:text-slate-400 dark:placeholder:text-slate-500 focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-500 outline-none transition resize-none"></textarea>
                </div>

                <!-- Tombol kirim -->
                <div class="pt-1">
                    <button type="submit" class="w-full bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-400 hover:to-emerald-500 text-white font-bold py-3.5 rounded-xl transition shadow-lg shadow-emerald-500/30 hover:-translate-y-0.5 flex items-center justify-center gap-2 text-sm">
                        <i class="fas fa-paper-plane"></i> <span data-i18n="kirim_pesan">Kirim Pesan</span>
                    </button>
                    <p class="text-[10px] md:text-xs text-center text-slate-400 dark:text-slate-500 mt-3 flex items-center justify-center gap-1.5"><i class="fas fa-lock text-[10px]"></i> <span data-i18n="fb_note">Feedback kamu hanya dibaca oleh admin.</span></p>
                </div>
            </form>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- 🌟 MODAL PERJALANAN SAYA (LIHAT SEMUA) 🌟 -->
    <!-- ========================================== -->
    @php $journeyFavs = $favorites ?? collect(); @endphp
    <div id="journeyModal" class="fixed inset-0 z-[9999] hidden bg-slate-900/60 backdrop-blur-md flex items-center justify-center opacity-0 transition-opacity duration-300 p-4">
        <div id="journeyModalContent" class="bg-white dark:bg-[#0f172a] rounded-3xl w-full max-w-3xl shadow-2xl border border-slate-200 dark:border-white/10 transform scale-95 transition-transform duration-300 overflow-hidden flex flex-col h-[600px] max-h-[90vh]">

            <!-- Header -->
            <div class="flex justify-between items-center p-4 md:p-6 pb-0 md:pb-0 bg-white dark:bg-[#0f172a] shrink-0">
                <div>
                    <h3 class="text-xl md:text-2xl font-bold text-slate-900 dark:text-white flex items-center gap-2 md:gap-3">
                        <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-emerald-100 dark:bg-emerald-500/15 flex items-center justify-center text-emerald-600 dark:text-emerald-400">
                            <i class="fas fa-route text-sm md:text-base"></i>
                        </div>
                        <span data-i18n="journey_title">Perjalanan Saya</span>
                    </h3>
                    <p class="text-xs md:text-sm text-slate-500 dark:text-slate-400 mt-1" data-i18n="journey_modal_desc">Itinerary dan tempat favorit yang kamu simpan.</p>
                </div>
                <button onclick="closeJourneyModal()" class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-500 hover:bg-red-100 hover:text-red-600 transition shrink-0 ml-3">
                    <i class="fas fa-times text-base md:text-lg"></i>
                </button>
            </div>

            <!-- Tab -->
            <div class="flex gap-1 px-4 md:px-6 mt-4 border-b border-slate-200 dark:border-slate-800 shrink-0">
                <button id="journeyTabFav" onclick="switchJourneyTab('fav')" class="journey-tab active px-3 md:px-4 py-3 text-sm font-bold text-slate-500 dark:text-slate-400 flex items-center gap-2 transition">
                    <i class="fas fa-bookmark"></i> <span data-i18n="tab_fav">Favorit</span>
                    <span class="text-[10px] px-1.5 py-0.5 rounded-full bg-slate-100 dark:bg-slate-800">{{ $journeyFavs->count() }}</span>
                </button>
                <button id="journeyTabItin" onclick="switchJourneyTab('itin')" class="journey-tab px-3 md:px-4 py-3 text-sm font-bold text-slate-500 dark:text-slate-400 flex items-center gap-2 transition">
                    <i class="fas fa-calendar-alt"></i> <span data-i18n="tab_itin">Itinerary</span>
                </button>
            </div>

            <!-- Isi -->
            <div class="flex-1 overflow-y-auto custom-modal-scroll bg-slate-50 dark:bg-[#0b1120]">

                <!-- Panel Favorit -->
                <div id="journeyPaneFav" class="p-4 md:p-6">
                    @if($journeyFavs->count() > 0)
                    <div class="space-y-3 md:space-y-4">
                        @foreach($journeyFavs as $jf)
                        @php
                        $jfLink = '#';
                        $jfNama = 'Tidak diketahui';
                        $jfTipe = 'Lainnya';
                        $jfBadge = 'bg-slate-500/80 text-white';
                        $jfImg = 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400';

                        if ($jf->destinasi) {
                        $jfLink = route('destinasi.show', $jf->destinasi->slug);
                        $jfNama = $jf->destinasi->nama;
                        $jfTipe = 'Destinasi';
                        $jfBadge = 'bg-emerald-500/90 text-white';
                        if ($jf->destinasi->gambar) { $jfImg = str_starts_with($jf->destinasi->gambar, 'http') ? $jf->destinasi->gambar : asset('storage/'.$jf->destinasi->gambar); }
                        } elseif ($jf->budaya) {
                        $jfLink = route('budaya.show', $jf->budaya->slug);
                        $jfNama = $jf->budaya->nama;
                        $jfTipe = 'Budaya';
                        $jfBadge = 'bg-purple-500/90 text-white';
                        if ($jf->budaya->gambar) { $jfImg = str_starts_with($jf->budaya->gambar, 'http') ? $jf->budaya->gambar : asset('storage/'.$jf->budaya->gambar); }
                        } elseif ($jf->kuliner) {
                        $jfLink = route('kuliner.show', $jf->kuliner->slug);
                        $jfNama = $jf->kuliner->nama;
                        $jfTipe = 'Kuliner';
                        $jfBadge = 'bg-orange-500/90 text-white';
                        if ($jf->kuliner->gambar) { $jfImg = str_starts_with($jf->kuliner->gambar, 'http') ? $jf->kuliner->gambar : asset('storage/'.$jf->kuliner->gambar); }
                        }
                        @endphp
                        <a href="{{ $jfLink }}" class="flex items-center gap-3 md:gap-4 bg-white dark:bg-gradient-to-br dark:from-[#16233f] dark:to-[#0e182c] rounded-2xl p-3 md:p-4 border border-slate-200 dark:border-white/10 hover:border-emerald-500 dark:hover:border-emerald-400/60 hover:shadow-lg hover:shadow-emerald-500/10 transition-all group">
                            <img src="{{ $jfImg }}" alt="{{ $jfNama }}" class="w-16 h-16 md:w-20 md:h-20 object-cover rounded-xl shrink-0 dark:ring-1 dark:ring-white/10">
                            <div class="flex-1 min-w-0">
                                <span class="inline-block text-[9px] md:text-[10px] font-bold {{ $jfBadge }} uppercase tracking-wider px-2 py-0.5 rounded-full mb-1">{{ $jfTipe }}</span>
                                <h4 class="font-bold text-sm md:text-base text-slate-900 dark:text-white group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition truncate">{{ $jfNama }}</h4>
                                <p class="text-[10px] md:text-xs text-slate-500 dark:text-slate-400">Tersimpan di favorit</p>
                            </div>
                            <span class="hidden sm:block"><i class="fas fa-chevron-right text-slate-300 dark:text-slate-500 group-hover:text-emerald-500 transition"></i></span>
                        </a>
                        @endforeach
                    </div>
                    @else
                    <div class="flex flex-col items-center justify-center text-center py-14 px-4">
                        <div class="w-20 h-20 bg-slate-200 dark:bg-slate-800 rounded-full flex items-center justify-center mb-4 shadow-inner">
                            <i class="fas fa-heart-broken text-3xl text-slate-400"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-800 dark:text-white mb-1">Belum Ada Favorit</h3>
                        <p class="text-xs md:text-sm text-slate-500 dark:text-slate-400 max-w-sm">Kamu belum menyimpan tempat apa pun. Yuk jelajahi dan simpan favoritmu!</p>
                    </div>
                    @endif
                </div>

                <!-- Panel Itinerary -->
                <div id="journeyPaneItin" class="hidden p-4 md:p-6">
                    <div class="flex flex-col items-center justify-center text-center py-14 px-4">
                        <div class="w-20 h-20 bg-emerald-100 dark:bg-emerald-500/15 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-calendar-alt text-3xl text-emerald-500"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-800 dark:text-white mb-1" data-i18n="itin_empty">Belum ada itinerary</h3>
                        <p class="text-xs md:text-sm text-slate-500 dark:text-slate-400 max-w-sm mb-5" data-i18n="itin_empty_desc">Susun jadwal perjalananmu ke destinasi favorit di Sumatera.</p>
                        <button type="button" onclick="closeJourneyModal(); setTimeout(openItineraryModal, 320)" class="bg-emerald-500 hover:bg-emerald-600 text-white font-bold py-2.5 px-6 text-sm rounded-xl transition shadow-lg shadow-emerald-500/30 flex items-center gap-2">
                            <i class="fas fa-plus-circle"></i> <span data-i18n="itin_create">Buat Itinerary</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- 🌟 MODAL SEMUA REVIEW 🌟 -->
    <!-- ========================================== -->
    @php $modalReviews = $allReviews ?? $recentReviews ?? collect(); @endphp
    <div id="reviewsModal" class="fixed inset-0 z-[9999] hidden bg-slate-900/60 backdrop-blur-md flex items-center justify-center opacity-0 transition-opacity duration-300 p-4">
        <div id="reviewsModalContent" class="bg-white dark:bg-[#0f172a] rounded-3xl w-full max-w-3xl shadow-2xl border border-slate-200 dark:border-white/10 transform scale-95 transition-transform duration-300 overflow-hidden flex flex-col h-[600px] max-h-[90vh]">

            <!-- Header Modal -->
            <div class="flex justify-between items-center p-4 md:p-6 border-b border-slate-200 dark:border-slate-800 bg-white dark:bg-[#0f172a] shrink-0">
                <div>
                    <h3 class="text-xl md:text-2xl font-bold text-slate-900 dark:text-white flex items-center gap-2 md:gap-3">
                        <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-amber-100 dark:bg-amber-500/15 flex items-center justify-center text-amber-500">
                            <i class="fas fa-comments text-sm md:text-base"></i>
                        </div>
                        <span data-i18n="all_reviews_title">Semua Review Saya</span>
                    </h3>
                    <p class="text-xs md:text-sm text-slate-500 dark:text-slate-400 mt-1" data-i18n="all_reviews_desc">Riwayat ulasan yang pernah kamu tulis.</p>
                </div>
                <button onclick="closeReviewsModal()" class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-500 hover:bg-red-100 hover:text-red-600 transition shrink-0 ml-3">
                    <i class="fas fa-times text-base md:text-lg"></i>
                </button>
            </div>

            <!-- Body Modal -->
            <div class="flex-1 p-4 md:p-6 overflow-y-auto custom-modal-scroll bg-slate-50 dark:bg-[#0b1120]">
                @if($modalReviews->count() > 0)
                <div class="space-y-3 md:space-y-4">
                    @foreach($modalReviews as $rv)
                    @php
                    $rvLink = '#';
                    $rvNama = 'Destinasi';
                    $rvTipe = 'Destinasi';
                    $rvBadge = 'bg-emerald-500/90 text-white';
                    $rvImg = 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?q=80&w=400&auto=format&fit=crop';

                    if ($rv->destinasi) {
                    $rvLink = route('destinasi.show', $rv->destinasi->slug);
                    $rvNama = $rv->destinasi->nama;
                    $rvTipe = 'Destinasi';
                    $rvBadge = 'bg-emerald-500/90 text-white';
                    if ($rv->destinasi->gambar) {
                    $rvImg = str_starts_with($rv->destinasi->gambar, 'http') ? $rv->destinasi->gambar : asset('storage/'.$rv->destinasi->gambar);
                    }
                    } elseif ($rv->budaya) {
                    $rvLink = route('budaya.show', $rv->budaya->slug);
                    $rvNama = $rv->budaya->nama;
                    $rvTipe = 'Budaya';
                    $rvBadge = 'bg-purple-500/90 text-white';
                    if ($rv->budaya->gambar) {
                    $rvImg = str_starts_with($rv->budaya->gambar, 'http') ? $rv->budaya->gambar : asset('storage/'.$rv->budaya->gambar);
                    }
                    } elseif ($rv->kuliner) {
                    $rvLink = route('kuliner.show', $rv->kuliner->slug);
                    $rvNama = $rv->kuliner->nama;
                    $rvTipe = 'Kuliner';
                    $rvBadge = 'bg-orange-500/90 text-white';
                    if ($rv->kuliner->gambar) {
                    $rvImg = str_starts_with($rv->kuliner->gambar, 'http') ? $rv->kuliner->gambar : asset('storage/'.$rv->kuliner->gambar);
                    }
                    }
                    @endphp

                    <a href="{{ $rvLink }}" class="flex gap-3 md:gap-4 bg-white dark:bg-gradient-to-br dark:from-[#16233f] dark:to-[#0e182c] rounded-2xl p-3 md:p-4 border border-slate-200 dark:border-white/10 hover:border-emerald-500 dark:hover:border-emerald-400/60 hover:shadow-lg hover:shadow-emerald-500/10 transition-all group">
                        <img src="{{ $rvImg }}" alt="{{ $rvNama }}" class="w-20 h-20 md:w-28 md:h-24 object-cover rounded-xl shrink-0 dark:ring-1 dark:ring-white/10">
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2 mb-1">
                                <span class="text-[9px] md:text-[10px] font-bold {{ $rvBadge }} uppercase tracking-wider px-2 py-0.5 rounded-full shrink-0">{{ $rvTipe }}</span>
                                <h4 class="font-bold text-sm md:text-base text-slate-900 dark:text-white group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition truncate">{{ $rvNama }}</h4>
                            </div>
                            <div class="flex items-center gap-2 text-amber-500 dark:text-amber-400 text-[11px] md:text-xs mb-1.5">
                                <div class="flex">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star {{ $i <= $rv->rating ? '' : 'text-slate-300 dark:text-slate-600' }}"></i>
                                        @endfor
                                </div>
                                <span class="text-slate-600 dark:text-slate-300 font-bold text-[10px] md:text-xs">{{ $rv->rating }}.0/5</span>
                            </div>
                            <p class="text-xs md:text-sm text-slate-600 dark:text-slate-300 italic line-clamp-2 mb-1.5">"{{ $rv->komentar }}"</p>
                            <p class="text-[10px] md:text-xs text-slate-400 dark:text-slate-500 flex items-center gap-1"><i class="fas fa-calendar"></i> {{ $rv->created_at->translatedFormat('d F Y') }}</p>
                        </div>
                    </a>
                    @endforeach
                </div>
                @else
                <div class="h-full flex flex-col items-center justify-center text-center py-10 px-4">
                    <div class="w-20 h-20 bg-slate-200 dark:bg-slate-800 rounded-full flex items-center justify-center mb-4 shadow-inner">
                        <i class="fas fa-comment-slash text-3xl text-slate-400"></i>
                    </div>
                    <h3 class="text-lg font-bold text-slate-800 dark:text-white mb-1" data-i18n="review_empty">Belum ada review</h3>
                    <p class="text-xs md:text-sm text-slate-500 dark:text-slate-400" data-i18n="review_empty_desc">Mulai beri review destinasi favoritmu!</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- FLOATING SETTINGS BUTTON -->
    <button onclick="openGlobalSettings()" class="fixed bottom-5 right-5 md:bottom-8 md:right-8 z-[900] w-12 h-12 md:w-14 md:h-14 rounded-full bg-emerald-600 hover:bg-emerald-500 text-white shadow-[0_0_20px_rgba(16,185,129,0.5)] flex items-center justify-center transition-all duration-300 transform hover:scale-110 group animate-float-btn" title="Pengaturan Tema & Bahasa">
        <i class="fas fa-cog text-xl md:text-2xl group-hover:rotate-90 transition-transform duration-500"></i>
    </button>

    <!-- GLOBAL SETTINGS MODAL (Tema & Bahasa) -->
    <div id="globalSettingsModal" class="fixed inset-0 z-[9999] hidden bg-slate-900/60 backdrop-blur-md flex items-center justify-center opacity-0 transition-opacity duration-300 p-4">
        <div id="globalSettingsContent" class="bg-white dark:bg-[#0f172a] rounded-2xl w-full max-w-lg max-h-[90vh] shadow-2xl border border-slate-200 dark:border-white/10 transform scale-95 transition-transform duration-300 overflow-hidden flex flex-col">
            <div class="flex justify-between items-center p-4 md:p-6 border-b border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-800/30 shrink-0">
                <h3 class="text-lg md:text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2">
                    <i class="fas fa-cog text-emerald-500"></i> <span data-i18n="settings">Pengaturan</span>
                </h3>
                <button onclick="closeGlobalSettings()" class="w-8 h-8 rounded-full bg-white dark:bg-slate-800 flex items-center justify-center text-slate-500 hover:bg-red-100 hover:text-red-600 transition"><i class="fas fa-times"></i></button>
            </div>
            <div class="p-4 md:p-8 overflow-y-auto custom-modal-scroll">
                <h4 class="text-base md:text-lg font-bold text-slate-900 dark:text-white mb-3 md:mb-4" data-i18n="tema_tampilan">Tema Tampilan</h4>
                <div class="grid grid-cols-3 gap-2 md:gap-4 mb-6 md:mb-8">
                    <button onclick="setGlobalTheme('light')" id="btn-g-theme-light" class="flex flex-col items-center justify-center py-3 md:py-4 rounded-xl border-2 border-transparent bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700 transition-all group focus:outline-none">
                        <i class="fas fa-sun text-slate-400 group-hover:text-amber-500 text-xl md:text-2xl mb-2 md:mb-3 transition-colors"></i>
                        <span class="text-xs md:text-sm font-semibold text-slate-500 dark:text-slate-400 group-hover:text-slate-900 dark:group-hover:text-white" data-i18n="light">Light</span>
                    </button>
                    <button onclick="setGlobalTheme('dark')" id="btn-g-theme-dark" class="flex flex-col items-center justify-center py-3 md:py-4 rounded-xl border-2 border-transparent bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700 transition-all group focus:outline-none">
                        <i class="fas fa-moon text-slate-400 group-hover:text-indigo-400 text-xl md:text-2xl mb-2 md:mb-3 transition-colors"></i>
                        <span class="text-xs md:text-sm font-semibold text-slate-500 dark:text-slate-400 group-hover:text-slate-900 dark:group-hover:text-white" data-i18n="dark">Dark</span>
                    </button>
                    <button onclick="setGlobalTheme('system')" id="btn-g-theme-system" class="flex flex-col items-center justify-center py-3 md:py-4 rounded-xl border-2 border-transparent bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700 transition-all group focus:outline-none">
                        <i class="fas fa-desktop text-slate-400 group-hover:text-emerald-500 text-xl md:text-2xl mb-2 md:mb-3 transition-colors"></i>
                        <span class="text-xs md:text-sm font-semibold text-slate-500 dark:text-slate-400 group-hover:text-slate-900 dark:group-hover:text-white" data-i18n="system">System</span>
                    </button>
                </div>
                <h4 class="text-base md:text-lg font-bold text-slate-900 dark:text-white mb-3 md:mb-4" data-i18n="bahasa">Bahasa</h4>
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-3 md:p-4 rounded-xl border border-slate-200 dark:border-slate-800">
                        <div>
                            <p class="font-bold text-xs md:text-sm text-slate-900 dark:text-white" data-i18n="pilih_bahasa">Pilih Bahasa</p>
                        </div>
                        <div class="flex bg-slate-200/50 dark:bg-slate-800 rounded-xl p-1 shadow-inner border border-slate-200 dark:border-slate-700 relative">
                            <div id="g-lang-slider" class="absolute top-1 bottom-1 w-[calc(50%-4px)] bg-white dark:bg-slate-600 rounded-lg shadow-sm transition-all duration-300 ease-out z-0"></div>
                            <button onclick="changeGlobalLanguage('id')" id="btn-g-lang-id" class="relative z-10 px-3 md:px-4 py-1.5 text-xs md:text-sm font-bold text-slate-500 dark:text-slate-400 transition-colors flex items-center gap-1 md:gap-1.5"><span class="text-sm md:text-base">🇮🇩</span> ID</button>
                            <button onclick="changeGlobalLanguage('en')" id="btn-g-lang-en" class="relative z-10 px-3 md:px-4 py-1.5 text-xs md:text-sm font-bold text-slate-500 dark:text-slate-400 transition-colors flex items-center gap-1 md:gap-1.5"><span class="text-sm md:text-base">🇬🇧</span> EN</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- 🌟 SCRIPT LENGKAP 🌟 -->
    <!-- ========================================== -->
    <script>
        // 1. Toggle Sidebar Mobile
        function toggleUserSidebar() {
            const sidebar = document.getElementById('userSidebar');
            const overlay = document.getElementById('userSidebarOverlay');

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

        // 2. Kamus Bahasa
        const globalTranslations = {
            id: {
                settings: "Pengaturan",
                tema_tampilan: "Tema Tampilan",
                light: "Terang",
                dark: "Gelap",
                system: "Sistem",
                bahasa: "Bahasa",
                pilih_bahasa: "Pilih bahasa antarmuka.",
                app_tagline: "Jelajahi Keindahan, Rasakan Ceritanya",
                menu_home: "Beranda",
                menu_destinasi: "Destinasi",
                menu_budaya: "Budaya",
                menu_kuliner: "Kuliner",
                menu_feedback: "Feedback",
                menu_peta: "Peta",
                search_placeholder: "Cari destinasi, budaya, kuliner...",
                role_user: "User",
                sidebar_slogan: "Sumatera<br>Lebih Dekat<br>Bersama Kami",
                notif_title: "Notifikasi",
                profile_menu: "Profil Saya",
                logout: "Keluar",
                welcome_back: "Selamat datang kembali,",
                welcome_desc: "Kelola perjalanan dan temukan destinasi favoritmu di Sumatera.",
                location: "Sumatera, Indonesia",
                stat_review: "Review Saya",
                stat_review_desc: "Total ulasan yang kamu buat",
                stat_fav: "Favorit Saya",
                stat_fav_desc: "Destinasi yang kamu simpan",
                journey_title: "Perjalanan Saya",
                see_all: "Lihat Semua",
                journey_nearby: "Wisata Terdekat",
                journey_nearby_desc: "Temukan destinasi menarik di sekitar lokasimu.",
                journey_route: "Rute Wisata",
                journey_route_desc: "Susun rute ke beberapa destinasi.",
                journey_itinerary: "Itinerary Saya",
                journey_itinerary_desc: "Atur jadwal perjalanan.",
                journey_fav: "Favorit Saya",
                journey_fav_desc: "Lihat wisata tersimpan.",
                review_title: "Review Terakhir",
                review_empty: "Belum ada review",
                review_empty_desc: "Mulai beri review destinasi favoritmu!",
                kirim_feedback: "Kirim Feedback",
                subjek: "Subjek",
                pesan: "Pesan",
                kirim_pesan: "Kirim Pesan",
                all_reviews_title: "Semua Review Saya",
                all_reviews_desc: "Riwayat ulasan yang pernah kamu tulis.",
                fb_subtitle: "Bantu kami jadi lebih baik dengan saran dan masukanmu.",
                fb_quick: "Pilih topik cepat",
                fb_chip_saran: "Saran",
                fb_chip_bug: "Laporan Masalah",
                fb_chip_tanya: "Pertanyaan",
                fb_chip_lain: "Lainnya",
                fb_subject_ph: "Tulis subjek singkat...",
                fb_message_ph: "Ceritakan masukanmu di sini...",
                fb_note: "Feedback kamu hanya dibaca oleh admin.",
                journey_modal_desc: "Itinerary dan tempat favorit yang kamu simpan.",
                tab_fav: "Favorit",
                tab_itin: "Itinerary",
                itin_empty: "Belum ada itinerary",
                itin_empty_desc: "Susun jadwal perjalananmu ke destinasi favorit di Sumatera.",
                itin_create: "Buat Itinerary"
            },
            en: {
                settings: "Settings",
                tema_tampilan: "Appearance Theme",
                light: "Light",
                dark: "Dark",
                system: "System",
                bahasa: "Language",
                pilih_bahasa: "Select interface language.",
                app_tagline: "Explore the Beauty, Feel the Story",
                menu_home: "Home",
                menu_destinasi: "Destinations",
                menu_budaya: "Culture",
                menu_kuliner: "Culinary",
                menu_feedback: "Feedback",
                menu_peta: "Map",
                search_placeholder: "Search destinations, culture, culinary...",
                role_user: "User",
                sidebar_slogan: "Sumatera<br>Closer<br>With Us",
                notif_title: "Notifications",
                profile_menu: "My Profile",
                logout: "Logout",
                welcome_back: "Welcome back,",
                welcome_desc: "Manage your trips and find your favorite destinations in Sumatera.",
                location: "Sumatera, Indonesia",
                stat_review: "My Reviews",
                stat_review_desc: "Total reviews you have made",
                stat_fav: "My Favorites",
                stat_fav_desc: "Destinations you saved",
                journey_title: "My Journey",
                see_all: "See All",
                journey_nearby: "Nearby Attractions",
                journey_nearby_desc: "Find interesting destinations around your location.",
                journey_route: "Travel Route",
                journey_route_desc: "Plan a route to multiple destinations.",
                journey_itinerary: "My Itinerary",
                journey_itinerary_desc: "Manage your travel schedule.",
                journey_fav: "My Favorites",
                journey_fav_desc: "View saved attractions.",
                review_title: "Latest Reviews",
                review_empty: "No reviews yet",
                review_empty_desc: "Start reviewing your favorite destinations!",
                kirim_feedback: "Send Feedback",
                subjek: "Subject",
                pesan: "Message",
                kirim_pesan: "Send Message",
                all_reviews_title: "All My Reviews",
                all_reviews_desc: "History of the reviews you have written.",
                fb_subtitle: "Help us improve with your suggestions and feedback.",
                fb_quick: "Pick a quick topic",
                fb_chip_saran: "Suggestion",
                fb_chip_bug: "Report a Problem",
                fb_chip_tanya: "Question",
                fb_chip_lain: "Other",
                fb_subject_ph: "Write a short subject...",
                fb_message_ph: "Tell us your thoughts here...",
                fb_note: "Your feedback is only read by the admin.",
                journey_modal_desc: "Your itinerary and saved favorite places.",
                tab_fav: "Favorites",
                tab_itin: "Itinerary",
                itin_empty: "No itinerary yet",
                itin_empty_desc: "Plan your trip to your favorite destinations in Sumatera.",
                itin_create: "Create Itinerary"
            }
        };

        // 3. Fungsi Modal Profil
        function openUserProfileModal() {
            const modal = document.getElementById('userProfileModal');
            const content = document.getElementById('userProfileModalContent');
            const dropdown = document.getElementById('userDropdown');
            const chevron = document.getElementById('userChevron');

            if (dropdown) dropdown.classList.add('hidden');
            if (chevron) chevron.style.transform = 'rotate(0deg)';

            if (modal && content) {
                modal.classList.remove('hidden');
                setTimeout(() => {
                    modal.classList.remove('opacity-0');
                    content.classList.remove('scale-95');
                    content.classList.add('scale-100');
                }, 10);
            }
        }

        function closeUserProfileModal() {
            const modal = document.getElementById('userProfileModal');
            const content = document.getElementById('userProfileModalContent');
            if (modal && content) {
                modal.classList.add('opacity-0');
                content.classList.remove('scale-100');
                content.classList.add('scale-95');
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 300);
            }
        }

        // 4. Fungsi Modal Itinerary
        function openItineraryModal() {
            const modal = document.getElementById('itineraryModal');
            const content = document.getElementById('itineraryModalContent');
            if (modal && content) {
                modal.classList.remove('hidden');
                setTimeout(() => {
                    modal.classList.remove('opacity-0');
                    content.classList.remove('scale-95');
                    content.classList.add('scale-100');
                }, 10);
            }
        }

        function closeItineraryModal() {
            const modal = document.getElementById('itineraryModal');
            const content = document.getElementById('itineraryModalContent');
            if (modal && content) {
                modal.classList.add('opacity-0');
                content.classList.remove('scale-100');
                content.classList.add('scale-95');
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 300);
            }
        }

        // 5. Fungsi Modal Favorit
        function openFavoritModal() {
            const modal = document.getElementById('favoritModal');
            const content = document.getElementById('favoritModalContent');
            if (modal && content) {
                modal.classList.remove('hidden');
                setTimeout(() => {
                    modal.classList.remove('opacity-0');
                    content.classList.remove('scale-95');
                    content.classList.add('scale-100');
                }, 10);
            }
        }

        function closeFavoritModal() {
            const modal = document.getElementById('favoritModal');
            const content = document.getElementById('favoritModalContent');
            if (modal && content) {
                modal.classList.add('opacity-0');
                content.classList.remove('scale-100');
                content.classList.add('scale-95');
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 300);
            }
        }

        // 6. Fungsi Modal Feedback
        function openFeedbackModal() {
            const modal = document.getElementById('feedbackModal');
            const content = document.getElementById('feedbackModalContent');
            if (modal && content) {
                modal.classList.remove('hidden');
                setTimeout(() => {
                    modal.classList.remove('opacity-0');
                    content.classList.remove('scale-95');
                    content.classList.add('scale-100');
                }, 10);
            }
        }

        function closeFeedbackModal() {
            const modal = document.getElementById('feedbackModal');
            const content = document.getElementById('feedbackModalContent');
            if (modal && content) {
                modal.classList.add('opacity-0');
                content.classList.remove('scale-100');
                content.classList.add('scale-95');
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 300);
            }
        }

        // 🌟 FUNGSI SUBMIT FEEDBACK YANG SUDAH DIPERBAIKI 🌟
        function submitFeedback(event) {
            event.preventDefault();
            const subject = document.getElementById('feedbackSubject').value;
            const message = document.getElementById('feedbackMessage').value;
            const submitBtn = event.target.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;

            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengirim...';
            submitBtn.disabled = true;

            fetch("{{ route('feedback.store') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json', // 🌟 KUNCI UTAMA AGAR TIDAK ERROR
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        subject: subject,
                        message: message
                    })
                })
                .then(async res => {
                    const data = await res.json();
                    if (!res.ok) {
                        if (data.errors) {
                            throw new Error(Object.values(data.errors)[0][0]);
                        }
                        throw new Error(data.message || 'Gagal mengirim feedback');
                    }
                    return data;
                })
                .then(data => {
                    if (data.success) {
                        alert('Terima kasih! Feedback Anda telah terkirim ke Admin.');
                        closeFeedbackModal();
                        document.getElementById('feedbackSubject').value = '';
                        document.getElementById('feedbackMessage').value = '';
                        document.querySelectorAll('.fb-chip').forEach(c => c.classList.remove('active'));
                    }
                })
                .catch(err => {
                    console.error(err);
                    alert(err.message); // Menampilkan pesan error asli
                })
                .finally(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                });
        }

        // 6a. Chip subjek feedback
        function setFeedbackSubject(btn) {
            const label = btn.querySelector('span').innerText.trim();
            document.getElementById('feedbackSubject').value = label;
            document.querySelectorAll('.fb-chip').forEach(c => c.classList.remove('active'));
            btn.classList.add('active');
            document.getElementById('feedbackMessage').focus();
        }

        // 6a2. Modal Perjalanan Saya (Lihat Semua)
        function switchJourneyTab(tab) {
            const isFav = tab === 'fav';
            document.getElementById('journeyPaneFav').classList.toggle('hidden', !isFav);
            document.getElementById('journeyPaneItin').classList.toggle('hidden', isFav);
            document.getElementById('journeyTabFav').classList.toggle('active', isFav);
            document.getElementById('journeyTabItin').classList.toggle('active', !isFav);
        }

        function openJourneyModal() {
            const modal = document.getElementById('journeyModal');
            const content = document.getElementById('journeyModalContent');
            if (modal && content) {
                switchJourneyTab('fav');
                modal.classList.remove('hidden');
                setTimeout(() => {
                    modal.classList.remove('opacity-0');
                    content.classList.remove('scale-95');
                    content.classList.add('scale-100');
                }, 10);
            }
        }

        function closeJourneyModal() {
            const modal = document.getElementById('journeyModal');
            const content = document.getElementById('journeyModalContent');
            if (modal && content) {
                modal.classList.add('opacity-0');
                content.classList.remove('scale-100');
                content.classList.add('scale-95');
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 300);
            }
        }

        // 6b. Fungsi Modal Semua Review
        function openReviewsModal() {
            const modal = document.getElementById('reviewsModal');
            const content = document.getElementById('reviewsModalContent');
            if (modal && content) {
                modal.classList.remove('hidden');
                setTimeout(() => {
                    modal.classList.remove('opacity-0');
                    content.classList.remove('scale-95');
                    content.classList.add('scale-100');
                }, 10);
            }
        }

        function closeReviewsModal() {
            const modal = document.getElementById('reviewsModal');
            const content = document.getElementById('reviewsModalContent');
            if (modal && content) {
                modal.classList.add('opacity-0');
                content.classList.remove('scale-100');
                content.classList.add('scale-95');
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 300);
            }
        }

        // 7. Fungsi Global Settings
        function openGlobalSettings() {
            const modal = document.getElementById('globalSettingsModal');
            const content = document.getElementById('globalSettingsContent');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                content.classList.remove('scale-95');
                content.classList.add('scale-100');
            }, 10);
            const savedTheme = localStorage.getItem('theme') || 'system';
            updateGlobalThemeUI(savedTheme);
        }

        function closeGlobalSettings() {
            const modal = document.getElementById('globalSettingsModal');
            const content = document.getElementById('globalSettingsContent');
            modal.classList.add('opacity-0');
            content.classList.remove('scale-100');
            content.classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        function updateGlobalThemeUI(theme) {
            const btnLight = document.getElementById('btn-g-theme-light');
            const btnDark = document.getElementById('btn-g-theme-dark');
            const btnSystem = document.getElementById('btn-g-theme-system');
            if (!btnLight) return;

            [btnLight, btnDark, btnSystem].forEach(btn => {
                btn.className = "flex flex-col items-center justify-center py-3 md:py-4 rounded-xl border-2 border-transparent bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700 transition-all group focus:outline-none";
                const icon = btn.querySelector('i');
                const text = btn.querySelector('span');
                icon.className = icon.className.replace('text-emerald-500', 'text-slate-400');
                text.className = "text-xs md:text-sm font-semibold text-slate-500 dark:text-slate-400";
            });

            const activeBtn = document.getElementById(`btn-g-theme-${theme}`);
            if (activeBtn) {
                activeBtn.className = "flex flex-col items-center justify-center py-3 md:py-4 rounded-xl border-2 border-emerald-500 bg-emerald-50 dark:bg-emerald-900/20 transition-all group focus:outline-none shadow-sm";
                const icon = activeBtn.querySelector('i');
                const text = activeBtn.querySelector('span');
                icon.className = icon.className.replace('text-slate-400', 'text-emerald-500');
                text.className = "text-xs md:text-sm font-semibold text-emerald-700 dark:text-emerald-400";
            }
        }

        function setGlobalTheme(theme) {
            const html = document.documentElement;
            const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');
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
            updateGlobalThemeUI(theme);
        }

        function changeGlobalLanguage(lang) {
            localStorage.setItem('language', lang);
            document.querySelectorAll('[data-i18n]').forEach(el => {
                const key = el.getAttribute('data-i18n');
                if (globalTranslations[lang] && globalTranslations[lang][key]) {
                    if (key === 'sidebar_slogan') {
                        el.innerHTML = globalTranslations[lang][key];
                    } else {
                        el.innerText = globalTranslations[lang][key];
                    }
                }
            });
            document.querySelectorAll('[data-i18n-placeholder]').forEach(el => {
                const key = el.getAttribute('data-i18n-placeholder');
                if (globalTranslations[lang] && globalTranslations[lang][key]) {
                    el.placeholder = globalTranslations[lang][key];
                }
            });
            const slider = document.getElementById('g-lang-slider');
            const btnId = document.getElementById('btn-g-lang-id');
            const btnEn = document.getElementById('btn-g-lang-en');
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
        }

        // 8. Inisialisasi saat halaman dimuat
        document.addEventListener('DOMContentLoaded', () => {
            const savedTheme = localStorage.getItem('theme') || 'system';
            setGlobalTheme(savedTheme);
            const savedLang = localStorage.getItem('language') || 'id';
            setTimeout(() => {
                changeGlobalLanguage(savedLang);
            }, 50);

            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
                if (localStorage.getItem('theme') === 'system') setGlobalTheme('system');
            });

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
                                let html = '';
                                data.data.forEach(n => {
                                    let isUnread = n.read_at === null;
                                    let bg = isUnread ? 'bg-emerald-50/50 dark:bg-emerald-900/10' : 'bg-transparent hover:bg-slate-50 dark:hover:bg-slate-800/50';
                                    let dot = isUnread ? '<span class="w-2 h-2 rounded-full bg-emerald-500 inline-block ml-2"></span>' : '';
                                    let url = n.data && n.data.url ? n.data.url : '#';
                                    html += `
                                        <a href="${url}" onclick="markRead('${n.id}')" class="block p-3 md:p-4 border-b border-slate-100 dark:border-slate-800 transition ${bg}">
                                            <p class="text-xs md:text-sm font-bold text-slate-800 dark:text-white leading-tight">${n.data.title} ${dot}</p>
                                            <p class="text-[10px] md:text-xs text-slate-600 dark:text-slate-400 mt-1">${n.data.message}</p>
                                            <p class="text-[9px] md:text-[10px] text-slate-400 mt-1"><i class="fas fa-clock mr-1"></i>${new Date(n.created_at).toLocaleString('id-ID')}</p>
                                        </a>
                                    `;
                                });
                                notifList.innerHTML = html;
                            } else {
                                notifList.innerHTML = '<div class="p-6 text-center text-xs md:text-sm text-slate-500"><i class="fas fa-bell-slash text-2xl mb-2 text-slate-300"></i><br>Belum ada notifikasi.</div>';
                            }
                        }
                    });
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
                    if (!userDropdown.classList.contains('hidden')) {
                        userChevron.style.transform = 'rotate(180deg)';
                    } else {
                        userChevron.style.transform = 'rotate(0deg)';
                    }
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
        });
    </script>
</body>

</html>