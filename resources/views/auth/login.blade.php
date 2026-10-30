<x-guest-layout>
    <style>
        /* ============ ANIMASI ============ */
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

        @keyframes slideUpFade {
            from {
                opacity: 0;
                transform: translateY(20px);
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

        .anim-mobile-1 {
            animation: slideUpFade 0.6s ease-out 0.1s both;
        }

        .anim-mobile-2 {
            animation: slideUpFade 0.6s ease-out 0.2s both;
        }

        .anim-mobile-3 {
            animation: slideUpFade 0.6s ease-out 0.3s both;
        }

        .anim-mobile-4 {
            animation: slideUpFade 0.6s ease-out 0.4s both;
        }

        .anim-mobile-5 {
            animation: slideUpFade 0.6s ease-out 0.5s both;
        }

        .anim-mobile-6 {
            animation: slideUpFade 0.6s ease-out 0.6s both;
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

        .input-glow {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .input-glow:focus {
            border-color: #10b981 !important;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.15);
        }

        .btn-shine {
            background: linear-gradient(110deg, #059669 0%, #10b981 45%, #34d399 50%, #10b981 55%, #059669 100%);
            background-size: 200% auto;
            transition: all 0.4s ease;
        }

        .btn-shine:hover {
            background-position: right center;
            box-shadow: 0 10px 20px -5px rgba(16, 185, 129, 0.4);
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
            <img src="https://images.unsplash.com/photo-1518509562904-e7ef99cdcc86?w=1200&q=80" alt="Sumatera" class="absolute inset-0 w-full h-full object-cover anim-zoom">
            <div class="absolute inset-0 bg-gradient-to-br from-emerald-900/95 via-emerald-800/80 to-slate-900/95"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>

            <div class="absolute inset-0 pointer-events-none overflow-hidden">
                <div class="particle" style="top: 20%; left: 15%;"></div>
                <div class="particle" style="top: 40%; left: 30%;"></div>
                <div class="particle" style="top: 60%; left: 60%;"></div>
                <div class="particle" style="top: 80%; left: 80%;"></div>
            </div>

            <div class="relative z-10 flex flex-col justify-between p-12 w-full">
                <div class="anim-left-1">
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-2.5 group">
                        <div class="w-11 h-11 bg-white/15 backdrop-blur-md border border-white/20 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fas fa-leaf text-white text-lg"></i>
                        </div>
                        <span class="font-extrabold text-xl text-white tracking-tight">Explore<span class="text-emerald-300">Sumatera</span></span>
                    </a>
                </div>

                <div class="text-white max-w-md">
                    <div class="anim-left-2 inline-flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/20 px-3 py-1.5 rounded-full mb-6">
                        <span class="w-1.5 h-1.5 bg-emerald-400 rounded-full animate-pulse"></span>
                        <span class="text-xs font-semibold tracking-wide uppercase">Jelajahi Pesona Sumatera</span>
                    </div>
                    <h2 class="anim-left-3 text-4xl md:text-5xl font-black leading-tight mb-4 tracking-tight">
                        Dari Sabang<br>
                        <span class="bg-gradient-to-r from-emerald-300 to-amber-200 bg-clip-text text-transparent italic font-serif">Sampai Lampung</span>
                    </h2>
                    <p class="anim-left-4 text-gray-300 text-lg font-light leading-relaxed">Temukan destinasi wisata, kekayaan budaya, dan cita rasa kuliner khas Pulau Sumatera.</p>
                </div>

                <div class="anim-left-4 text-white/60 text-xs">
                    <p>© {{ date('Y') }} Explore Sumatera. All rights reserved.</p>
                </div>
            </div>
        </div>

        {{-- KANAN: FORM LOGIN (Mobile & Desktop) --}}
        <div class="flex items-center justify-center p-4 sm:p-12 bg-gray-50 dark:bg-slate-950 relative overflow-hidden">
            <div class="absolute -top-32 -right-32 w-96 h-96 bg-emerald-500/5 rounded-full blur-3xl anim-float"></div>
            <div class="absolute -bottom-32 -left-32 w-96 h-96 bg-emerald-500/5 rounded-full blur-3xl anim-float" style="animation-delay: 2s;"></div>

            {{-- Container Form dengan Efek Kartu Kaca Khusus Mobile --}}
            <div class="w-full max-w-md relative z-10 bg-white/90 dark:bg-slate-900/80 backdrop-blur-xl lg:bg-transparent lg:dark:bg-transparent lg:backdrop-blur-none border border-slate-200/50 dark:border-slate-700/50 lg:border-none rounded-[2rem] p-6 sm:p-8 lg:p-0 shadow-xl lg:shadow-none">

                {{-- Mobile Logo --}}
                <div class="lg:hidden mb-6 text-center anim-mobile-1">
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-2">
                        <div class="w-10 h-10 bg-emerald-600 rounded-xl flex items-center justify-center anim-pulse shadow-lg shadow-emerald-500/30">
                            <i class="fas fa-leaf text-white"></i>
                        </div>
                        <span class="font-extrabold text-lg text-gray-900 dark:text-white">Explore<span class="text-emerald-600 dark:text-emerald-400">Sumatera</span></span>
                    </a>
                </div>

                {{-- Header --}}
                <div class="mb-8 text-center lg:text-left anim-mobile-2">
                    <h1 class="text-[26px] sm:text-3xl font-black text-gray-900 dark:text-white mb-2 tracking-tight">Selamat Datang</h1>
                    <p class="text-sm sm:text-base text-gray-500 dark:text-slate-400">Masuk ke akun kamu untuk melanjutkan.</p>
                </div>

                @if (session('status'))
                <div class="mb-5 bg-emerald-50 dark:bg-emerald-950/50 border border-emerald-200 dark:border-emerald-800 text-emerald-700 dark:text-emerald-400 px-4 py-3 rounded-xl text-sm font-medium anim-mobile-2">
                    {{ session('status') }}
                </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-4 sm:space-y-5">
                    @csrf

                    {{-- Email --}}
                    <div class="anim-mobile-3">
                        <label for="email" class="block text-[11px] sm:text-xs font-bold text-gray-700 dark:text-slate-300 uppercase tracking-widest mb-2">Email Address</label>
                        <div class="relative">
                            <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="nama@email.com"
                                class="input-glow w-full pl-11 pr-4 py-3.5 bg-white dark:bg-slate-950/50 border-2 border-gray-200 dark:border-slate-700 rounded-xl focus:outline-none font-medium text-gray-900 dark:text-white placeholder-gray-400 text-sm sm:text-base">
                        </div>
                        @error('email')<p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>@enderror
                    </div>

                    {{-- Password --}}
                    <div class="anim-mobile-4">
                        <label for="password" class="block text-[11px] sm:text-xs font-bold text-gray-700 dark:text-slate-300 uppercase tracking-widest mb-2">Password</label>
                        <div class="relative">
                            <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                            <input id="password" type="password" name="password" required placeholder="Masukkan password"
                                class="input-glow w-full pl-11 pr-12 py-3.5 bg-white dark:bg-slate-950/50 border-2 border-gray-200 dark:border-slate-700 rounded-xl focus:outline-none font-medium text-gray-900 dark:text-white placeholder-gray-400 text-sm sm:text-base">
                            <button type="button" onclick="togglePassword()" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-emerald-600 transition">
                                <i id="eyeIcon" class="fas fa-eye text-sm"></i>
                            </button>
                        </div>
                        @error('password')<p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>@enderror
                    </div>

                    {{-- Remember & Forgot --}}
                    <div class="anim-mobile-5 flex items-center justify-between pt-1">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer">
                            <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 dark:border-slate-600 text-emerald-600 shadow-sm focus:ring-emerald-500 dark:bg-slate-950">
                            <span class="ml-2 text-xs sm:text-sm text-gray-600 dark:text-slate-400">Ingat saya</span>
                        </label>

                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-xs sm:text-sm text-emerald-600 dark:text-emerald-400 hover:text-emerald-800 font-semibold transition">Lupa password?</a>
                        @endif
                    </div>

                    {{-- Button --}}
                    <div class="anim-mobile-6 pt-3">
                        <button type="submit" class="btn-shine w-full text-white py-3.5 sm:py-4 rounded-xl font-black text-xs sm:text-sm tracking-widest uppercase shadow-lg shadow-emerald-600/30">
                            <i class="fas fa-sign-in-alt mr-2"></i> Masuk Sekarang
                        </button>
                    </div>
                </form>

                {{-- Divider --}}
                <div class="anim-mobile-6 my-6 flex items-center gap-4">
                    <div class="flex-1 h-px bg-gray-200 dark:bg-slate-700/50"></div>
                    <span class="text-[10px] sm:text-xs text-gray-400 font-bold uppercase tracking-widest">Atau</span>
                    <div class="flex-1 h-px bg-gray-200 dark:bg-slate-700/50"></div>
                </div>

                {{-- Register & Back --}}
                <p class="anim-mobile-6 text-center text-xs sm:text-sm text-gray-600 dark:text-slate-400">
                    Belum punya akun? <a href="{{ route('register') }}" class="font-bold text-emerald-600 dark:text-emerald-400 hover:text-emerald-800 transition">Daftar Sekarang →</a>
                </p>

                <div class="anim-mobile-6 mt-6 text-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-xs sm:text-sm text-gray-500 dark:text-slate-500 hover:text-emerald-600 dark:hover:text-emerald-400 transition font-medium">
                        <i class="fas fa-arrow-left text-xs"></i> Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            var input = document.getElementById('password');
            var icon = document.getElementById('eyeIcon');
            icon.classList.add('rotating');
            setTimeout(() => icon.classList.remove('rotating'), 300);

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
    </script>
</x-guest-layout>