<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Explore Sumatera')</title>
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
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        html {
            scroll-behavior: smooth;
            color-scheme: light;
        }

        html.dark {
            color-scheme: dark;
        }

        .font-serif {
            font-family: 'Instrument Serif', serif;
        }

        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(#22c55e, #15803d);
            border-radius: 10px;
        }

        .dark ::-webkit-scrollbar-track {
            background: #091413;
        }

        .dark ::-webkit-scrollbar-thumb {
            background: linear-gradient(#10b981, #047857);
            border-radius: 10px;
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
    </style>
</head>

<body class="bg-gray-50 dark:bg-[#091413] text-gray-900 dark:text-white min-h-screen flex flex-col overflow-x-hidden">
    @include('partials.navbar')
    <main class="flex-1">
        @yield('content')
    </main>
    @if(!request()->is('admin*'))
    @include('partials.footer')
    @endif

    @if(!request()->is('admin*'))
    <button onclick="openGlobalSettings()" class="fixed bottom-8 right-8 z-[900] w-14 h-14 rounded-full bg-emerald-600 hover:bg-emerald-500 text-white shadow-[0_0_20px_rgba(16,185,129,0.5)] flex items-center justify-center transition-all duration-300 transform hover:scale-110 group animate-float-btn" title="Pengaturan Tema & Bahasa">
        <i class="fas fa-cog text-2xl group-hover:rotate-90 transition-transform duration-500"></i>
    </button>
    @endif

    <div id="globalSettingsModal" class="fixed inset-0 z-[9999] hidden bg-slate-900/60 backdrop-blur-md flex items-center justify-center opacity-0 transition-opacity duration-300 p-4">
        <div id="globalSettingsContent" class="bg-white dark:bg-[#0f172a] rounded-3xl w-full max-w-lg shadow-2xl border border-slate-200 dark:border-slate-800 transform scale-95 transition-transform duration-300 overflow-hidden flex flex-col">
            <div class="flex justify-between items-center p-6 border-b border-slate-100 dark:border-slate-800 bg-white dark:bg-[#0f172a]">
                <h3 class="text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2"><span data-i18n="settings">Pengaturan</span></h3>
                <button onclick="closeGlobalSettings()" class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-500 hover:bg-red-100 hover:text-red-600 transition"><i class="fas fa-times"></i></button>
            </div>
            <div class="p-6 md:p-8 overflow-y-auto custom-scrollbar">
                <h4 class="text-lg font-bold text-slate-900 dark:text-white mb-4" data-i18n="tema_tampilan">Tema Tampilan</h4>
                <div class="grid grid-cols-3 gap-4 mb-8">
                    <button onclick="setGlobalTheme('light')" id="btn-g-theme-light" class="flex flex-col items-center justify-center py-4 rounded-xl border-2 border-transparent bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700 transition-all group focus:outline-none">
                        <i class="fas fa-sun text-slate-400 group-hover:text-amber-500 text-2xl mb-3 transition-colors"></i><span class="text-sm font-semibold text-slate-500 dark:text-slate-400 group-hover:text-slate-900 dark:group-hover:text-white" data-i18n="light">Terang</span>
                    </button>
                    <button onclick="setGlobalTheme('dark')" id="btn-g-theme-dark" class="flex flex-col items-center justify-center py-4 rounded-xl border-2 border-transparent bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700 transition-all group focus:outline-none">
                        <i class="fas fa-moon text-slate-400 group-hover:text-indigo-400 text-2xl mb-3 transition-colors"></i><span class="text-sm font-semibold text-slate-500 dark:text-slate-400 group-hover:text-slate-900 dark:group-hover:text-white" data-i18n="dark">Gelap</span>
                    </button>
                    <button onclick="setGlobalTheme('system')" id="btn-g-theme-system" class="flex flex-col items-center justify-center py-4 rounded-xl border-2 border-transparent bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700 transition-all group focus:outline-none">
                        <i class="fas fa-desktop text-slate-400 group-hover:text-emerald-500 text-2xl mb-3 transition-colors"></i><span class="text-sm font-semibold text-slate-500 dark:text-slate-400 group-hover:text-slate-900 dark:group-hover:text-white" data-i18n="system">Sistem</span>
                    </button>
                </div>
                <h4 class="text-lg font-bold text-slate-900 dark:text-white mb-4" data-i18n="pengaturan_lainnya">Pengaturan Lainnya</h4>
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-[#091413]">
                        <div>
                            <p class="font-bold text-sm text-slate-900 dark:text-white" data-i18n="bahasa">Bahasa</p>
                            <p class="text-xs text-slate-500 mt-1" data-i18n="pilih_bahasa">Pilih bahasa antarmuka.</p>
                        </div>
                        <div class="flex bg-slate-200/50 dark:bg-slate-800 rounded-xl p-1 shadow-inner border border-slate-200 dark:border-slate-700 relative">
                            <div id="g-lang-slider" class="absolute top-1 bottom-1 w-[calc(50%-4px)] bg-white dark:bg-slate-600 rounded-lg shadow-sm transition-all duration-300 ease-out z-0"></div>
                            <button onclick="changeGlobalLanguage('id')" id="btn-g-lang-id" class="relative z-10 px-4 py-1.5 text-sm font-bold text-slate-500 dark:text-slate-400 transition-colors flex items-center gap-1.5"><span class="text-base">🇮🇩</span> ID</button>
                            <button onclick="changeGlobalLanguage('en')" id="btn-g-lang-en" class="relative z-10 px-4 py-1.5 text-sm font-bold text-slate-500 dark:text-slate-400 transition-colors flex items-center gap-1.5"><span class="text-base">🇬🇧</span> EN</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const globalTranslations = {
            id: {
                settings: "Pengaturan",
                tema_tampilan: "Tema Tampilan",
                light: "Terang",
                dark: "Gelap",
                system: "Sistem",
                bahasa: "Bahasa",
                pilih_bahasa: "Pilih bahasa antarmuka.",
                pengaturan_lainnya: "Pengaturan Lainnya",
                nav_home: "Beranda",
                nav_destinasi: "Destinasi",
                nav_budaya: "Budaya",
                nav_kuliner: "Kuliner",
                nav_peta: "Peta",
                nav_login: "Masuk",
                nav_dashboard: "Dashboard",
                notif_title: "Notifikasi"
            },
            en: {
                settings: "Settings",
                tema_tampilan: "Appearance Theme",
                light: "Light",
                dark: "Dark",
                system: "System",
                bahasa: "Language",
                pilih_bahasa: "Select interface language.",
                pengaturan_lainnya: "Other Settings",
                nav_home: "Home",
                nav_destinasi: "Destinations",
                nav_budaya: "Culture",
                nav_kuliner: "Culinary",
                nav_peta: "Map",
                nav_login: "Login",
                nav_dashboard: "Dashboard",
                notif_title: "Notifications"
            }
        };

        function openGlobalSettings() {
            const modal = document.getElementById('globalSettingsModal');
            const content = document.getElementById('globalSettingsContent');
            if (modal && content) {
                modal.classList.remove('hidden');
                setTimeout(() => {
                    modal.classList.remove('opacity-0');
                    content.classList.remove('scale-95');
                    content.classList.add('scale-100');
                }, 10);
                const savedTheme = localStorage.getItem('theme') || 'system';
                updateGlobalThemeUI(savedTheme);
                const savedLang = localStorage.getItem('language') || 'id';
                const slider = document.getElementById('g-lang-slider');
                const btnId = document.getElementById('btn-g-lang-id');
                const btnEn = document.getElementById('btn-g-lang-en');
                if (slider) {
                    if (savedLang === 'id') {
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
            }
        }

        function closeGlobalSettings() {
            const modal = document.getElementById('globalSettingsModal');
            const content = document.getElementById('globalSettingsContent');
            if (modal && content) {
                modal.classList.add('opacity-0');
                content.classList.remove('scale-100');
                content.classList.add('scale-95');
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 300);
            }
        }

        function updateGlobalThemeUI(theme) {
            const btnLight = document.getElementById('btn-g-theme-light');
            const btnDark = document.getElementById('btn-g-theme-dark');
            const btnSystem = document.getElementById('btn-g-theme-system');
            if (!btnLight) return;
            [btnLight, btnDark, btnSystem].forEach(btn => {
                btn.className = "flex flex-col items-center justify-center py-4 rounded-xl border-2 border-transparent bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700 transition-all group focus:outline-none";
                const icon = btn.querySelector('i');
                const text = btn.querySelector('span');
                icon.className = icon.className.replace('text-emerald-500', 'text-slate-400');
                text.className = "text-sm font-semibold text-slate-500 dark:text-slate-400";
            });
            const activeBtn = document.getElementById(`btn-g-theme-${theme}`);
            if (activeBtn) {
                activeBtn.className = "flex flex-col items-center justify-center py-4 rounded-xl border-2 border-emerald-500 bg-emerald-50 dark:bg-emerald-900/20 transition-all group focus:outline-none shadow-sm";
                const icon = activeBtn.querySelector('i');
                const text = activeBtn.querySelector('span');
                icon.className = icon.className.replace('text-slate-400', 'text-emerald-500');
                text.className = "text-sm font-semibold text-emerald-700 dark:text-emerald-400";
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
                    el.innerText = globalTranslations[lang][key];
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
        });
    </script>
</body>

</html>