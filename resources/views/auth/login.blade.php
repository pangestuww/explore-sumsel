<x-guest-layout>
    <style>
        /* ============ ANIMASI LOGIN ============ */
        @keyframes fadeSlideLeft {
            from {
                opacity: 0;
                transform: translateX(-40px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeSlideRight {
            from {
                opacity: 0;
                transform: translateX(40px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeSlideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes floatY {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-12px);
            }
        }

        @keyframes zoomSlow {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.08);
            }
        }

        @keyframes pulseGlow {

            0%,
            100% {
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.5);
            }

            50% {
                box-shadow: 0 0 0 12px rgba(16, 185, 129, 0);
            }
        }

        @keyframes shimmerBtn {
            0% {
                background-position: -200% center;
            }

            100% {
                background-position: 200% center;
            }
        }

        .anim-left {
            animation: fadeSlideLeft 0.8s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        .anim-left-1 {
            animation: fadeSlideLeft 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.1s both;
        }

        .anim-left-2 {
            animation: fadeSlideLeft 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.25s both;
        }

        .anim-left-3 {
            animation: fadeSlideLeft 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.4s both;
        }

        .anim-left-4 {
            animation: fadeSlideLeft 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.55s both;
        }

        .anim-right-1 {
            animation: fadeSlideRight 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.2s both;
        }

        .anim-right-2 {
            animation: fadeSlideRight 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.35s both;
        }

        .anim-right-3 {
            animation: fadeSlideRight 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.5s both;
        }

        .anim-right-4 {
            animation: fadeSlideRight 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.65s both;
        }

        .anim-right-5 {
            animation: fadeSlideRight 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.8s both;
        }

        .anim-right-6 {
            animation: fadeSlideRight 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.95s both;
        }

        .anim-zoom {
            animation: zoomSlow 20s ease-in-out infinite;
        }

        .anim-float {
            animation: floatY 3.5s ease-in-out infinite;
        }

        .anim-pulse {
            animation: pulseGlow 2.5s ease-in-out infinite;
        }

        /* Input focus glow */
        .input-glow {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .input-glow:focus {
            border-color: #10b981 !important;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.15);
            transform: translateY(-2px);
        }

        /* Button hover */
        .btn-shine {
            background: linear-gradient(110deg, #059669 0%, #10b981 45%, #34d399 50%, #10b981 55%, #059669 100%);
            background-size: 200% auto;
            transition: all 0.4s ease;
        }

        .btn-shine:hover {
            background-position: right center;
            transform: translateY(-2px);
            box-shadow: 0 15px 30px -10px rgba(16, 185, 129, 0.5);
        }

        .btn-shine:active {
            transform: translateY(0);
        }

        /* Floating particles */
        @keyframes floatParticle {
            0% {
                transform: translateY(0) translateX(0);
                opacity: 0.6;
            }

            50% {
                transform: translateY(-30px) translateX(15px);
                opacity: 1;
            }

            100% {
                transform: translateY(-60px) translateX(-10px);
                opacity: 0;
            }
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(52, 211, 153, 0.7);
            border-radius: 50%;
            pointer-events: none;
            animation: floatParticle 6s ease-in-out infinite;
        }

        .particle:nth-child(2) {
            animation-delay: 2s;
            left: 30% !important;
        }

        .particle:nth-child(3) {
            animation-delay: 4s;
            left: 60% !important;
        }

        .particle:nth-child(4) {
            animation-delay: 1s;
            left: 80% !important;
        }

        /* Toggle password icon rotate */
        #eyeIcon {
            transition: transform 0.3s ease;
        }

        #eyeIcon.rotating {
            transform: rotate(180deg);
        }
    </style>

    <div class="min-h-screen grid lg:grid-cols-2">

        {{-- KIRI: IMAGE + BRANDING --}}
        <div class="hidden lg:flex relative overflow-hidden bg-slate-900">
            {{-- Gambar background dengan zoom slow --}}
            <img src="https://images.unsplash.com/photo-1518509562904-e7ef99cdcc86?w=1200&q=80"
                alt="Sumatera"
                class="absolute inset-0 w-full h-full object-cover anim-zoom">

            {{-- Overlay --}}
            <div class="absolute inset-0 bg-gradient-to-br from-emerald-900/95 via-emerald-800/80 to-slate-900/95"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>

            {{-- Floating particles --}}
            <div class="absolute inset-0 pointer-events-none overflow-hidden">
                <div class="particle" style="top: 20%; left: 15%;"></div>
                <div class="particle" style="top: 40%; left: 30%;"></div>
                <div class="particle" style="top: 60%; left: 60%;"></div>
                <div class="particle" style="top: 80%; left: 80%;"></div>
            </div>

            {{-- Content --}}
            <div class="relative z-10 flex flex-col justify-between p-12 w-full">

                {{-- Logo --}}
                <div class="anim-left-1">
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-2.5 group">
                        <div class="w-11 h-11 bg-white/15 backdrop-blur-md border border-white/20 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fas fa-leaf text-white text-lg"></i>
                        </div>
                        <span class="font-extrabold text-xl text-white tracking-tight">
                            Explore<span class="text-emerald-300">Sumatera</span>
                        </span>
                    </a>
                </div>

                {{-- Quote --}}
                <div class="text-white max-w-md">
                    <div class="anim-left-2 inline-flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/20 px-3 py-1.5 rounded-full mb-6">
                        <span class="w-1.5 h-1.5 bg-emerald-400 rounded-full animate-pulse"></span>
                        <span class="text-xs font-semibold tracking-wide uppercase">Jelajahi Pesona Sumatera</span>
                    </div>

                    <h2 class="anim-left-3 text-4xl md:text-5xl font-black leading-tight mb-4 tracking-tight">
                        Dari Sabang<br>
                        <span class="bg-gradient-to-r from-emerald-300 to-amber-200 bg-clip-text text-transparent italic font-serif">
                            Sampai Lampung
                        </span>
                    </h2>

                    <p class="anim-left-4 text-gray-300 text-lg font-light leading-relaxed">
                        Temukan destinasi wisata, kekayaan budaya, dan cita rasa kuliner khas Pulau Sumatera.
                    </p>
                </div>

                {{-- Footer --}}
                <div class="anim-left-4 text-white/60 text-xs">
                    <p>© {{ date('Y') }} Explore Sumatera. All rights reserved.</p>
                </div>
            </div>
        </div>

        {{-- KANAN: FORM LOGIN --}}
        <div class="flex items-center justify-center p-6 sm:p-12 bg-gray-50 dark:bg-slate-950 relative overflow-hidden">
            {{-- Background decorative --}}
            <div class="absolute -top-32 -right-32 w-96 h-96 bg-emerald-500/5 rounded-full blur-3xl anim-float"></div>
            <div class="absolute -bottom-32 -left-32 w-96 h-96 bg-emerald-500/5 rounded-full blur-3xl anim-float" style="animation-delay: 2s;"></div>

            <div class="w-full max-w-md relative z-10">

                {{-- Mobile Logo --}}
                <div class="lg:hidden mb-8 text-center anim-right-1">
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-2">
                        <div class="w-10 h-10 bg-emerald-700 rounded-xl flex items-center justify-center anim-pulse">
                            <i class="fas fa-leaf text-white"></i>
                        </div>
                        <span class="font-extrabold text-lg text-gray-900 dark:text-white">
                            Explore<span class="text-emerald-700 dark:text-emerald-400">Sumatera</span>
                        </span>
                    </a>
                </div>

                {{-- Header --}}
                <div class="mb-8 anim-right-1">
                    <h1 class="text-3xl font-black text-gray-900 dark:text-white mb-2 tracking-tight">
                        Selamat Datang
                    </h1>
                    <p class="text-gray-500 dark:text-slate-400">
                        Masuk ke akun kamu untuk melanjutkan.
                    </p>
                </div>

                @if (session('status'))
                <div class="mb-5 bg-emerald-50 dark:bg-emerald-950/50 border border-emerald-200 dark:border-emerald-800 text-emerald-700 dark:text-emerald-400 px-4 py-3 rounded-xl text-sm font-medium anim-right-1">
                    {{ session('status') }}
                </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    {{-- Email --}}
                    <div class="anim-right-2">
                        <label for="email" class="block text-xs font-bold text-gray-700 dark:text-slate-300 uppercase tracking-widest mb-2">
                            Email Address
                        </label>
                        <div class="relative">
                            <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                                placeholder="nama@email.com"
                                class="input-glow w-full pl-11 pr-4 py-3.5 bg-white dark:bg-slate-900 border-2 border-gray-200 dark:border-slate-800 rounded-xl focus:outline-none font-medium text-gray-900 dark:text-white placeholder-gray-400">
                        </div>
                        @error('email')
                        <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="anim-right-3">
                        <label for="password" class="block text-xs font-bold text-gray-700 dark:text-slate-300 uppercase tracking-widest mb-2">
                            Password
                        </label>
                        <div class="relative">
                            <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                            <input id="password" type="password" name="password" required
                                placeholder="Masukkan password"
                                class="input-glow w-full pl-11 pr-12 py-3.5 bg-white dark:bg-slate-900 border-2 border-gray-200 dark:border-slate-800 rounded-xl focus:outline-none font-medium text-gray-900 dark:text-white placeholder-gray-400">
                            <button type="button" onclick="togglePassword()"
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-emerald-600 transition">
                                <i id="eyeIcon" class="fas fa-eye text-sm"></i>
                            </button>
                        </div>
                        @error('password')
                        <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Remember + Forgot --}}
                    <div class="anim-right-4 flex items-center justify-between">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer">
                            <input id="remember_me" type="checkbox" name="remember"
                                class="rounded border-gray-300 dark:border-slate-700 text-emerald-600 shadow-sm focus:ring-emerald-500 dark:bg-slate-900">
                            <span class="ml-2 text-sm text-gray-600 dark:text-slate-400">Ingat saya</span>
                        </label>

                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                            class="text-sm text-emerald-700 dark:text-emerald-400 hover:text-emerald-800 font-semibold transition">
                            Lupa password?
                        </a>
                        @endif
                    </div>

                    {{-- Submit --}}
                    <div class="anim-right-5">
                        <button type="submit"
                            class="btn-shine w-full text-white py-4 rounded-xl font-black text-sm tracking-widest uppercase shadow-lg shadow-emerald-600/30">
                            <i class="fas fa-sign-in-alt mr-2"></i> Masuk Sekarang
                        </button>
                    </div>
                </form>

                {{-- Divider --}}
                <div class="anim-right-5 my-6 flex items-center gap-4">
                    <div class="flex-1 h-px bg-gray-200 dark:bg-slate-800"></div>
                    <span class="text-xs text-gray-400 font-bold uppercase tracking-widest">Atau</span>
                    <div class="flex-1 h-px bg-gray-200 dark:bg-slate-800"></div>
                </div>

                {{-- Register --}}
                <p class="anim-right-6 text-center text-sm text-gray-600 dark:text-slate-400">
                    Belum punya akun?
                    <a href="{{ route('register') }}"
                        class="font-bold text-emerald-700 dark:text-emerald-400 hover:text-emerald-800 transition">
                        Daftar Sekarang →
                    </a>
                </p>

                {{-- Back Home --}}
                <div class="anim-right-6 mt-8 text-center">
                    <a href="{{ route('home') }}"
                        class="inline-flex items-center gap-2 text-sm text-gray-500 dark:text-slate-500 hover:text-emerald-700 dark:hover:text-emerald-400 transition font-medium">
                        <i class="fas fa-arrow-left text-xs"></i>
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Script Toggle Password --}}
    <script>
        function togglePassword() {
            var input = document.getElementById('password');
            var icon = document.getElementById('eyeIcon');
            icon.classList.add('rotating');
            setTimeout(function() {
                icon.classList.remove('rotating');
            }, 300);

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.add('fa-eye');
                icon.classList.remove('fa-eye-slash');
            }
        }
    </script>
</x-guest-layout>