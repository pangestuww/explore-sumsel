<x-guest-layout>
    <style>
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
            from {
                transform: scale(1);
            }

            to {
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

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-8px);
            }

            75% {
                transform: translateX(8px);
            }
        }

        @keyframes popIn {
            0% {
                transform: scale(0);
                opacity: 0;
            }

            70% {
                transform: scale(1.2);
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
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

        .anim-right-7 {
            animation: fadeSlideRight 0.8s cubic-bezier(0.16, 1, 0.3, 1) 1.1s both;
        }

        .anim-zoom {
            animation: zoomSlow 20s ease-in-out infinite alternate;
        }

        .anim-float {
            animation: floatY 3.5s ease-in-out infinite;
        }

        .anim-pulse {
            animation: pulseGlow 2.5s ease-in-out infinite;
        }

        .anim-shake {
            animation: shake 0.4s ease-in-out;
        }

        .anim-pop {
            animation: popIn 0.4s cubic-bezier(0.34, 1.56, 0.64, 1) both;
        }

        .input-group {
            position: relative;
        }

        .input-group input {
            width: 100%;
            padding: 22px 44px 10px 44px;
            background: white;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-weight: 500;
            color: #0f172a;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            outline: none;
        }

        .dark .input-group input {
            background: #0f172a;
            border-color: #1e293b;
            color: #f8fafc;
        }

        .input-group input:focus {
            border-color: #10b981;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.15);
            transform: translateY(-2px);
        }

        .input-group label {
            position: absolute;
            left: 44px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-weight: 500;
            font-size: 15px;
            pointer-events: none;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            background: transparent;
            padding: 0 4px;
        }

        .input-group input:focus+label,
        .input-group.has-value label {
            top: 14px;
            transform: translateY(0);
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #10b981;
            background: white;
        }

        .dark .input-group input:focus+label,
        .dark .input-group.has-value label {
            background: #0f172a;
        }

        .input-group .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 14px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            pointer-events: none;
        }

        .input-group input:focus~.input-icon {
            color: #10b981;
            transform: translateY(-50%) scale(1.15) rotate(-5deg);
        }

        .input-group .toggle-eye {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: none;
            border: none;
            padding: 4px;
        }

        .input-group .toggle-eye:hover {
            color: #10b981;
            transform: translateY(-50%) scale(1.15);
        }

        .strength-bar {
            display: flex;
            gap: 4px;
            margin-top: 8px;
        }

        .strength-segment {
            flex: 1;
            height: 4px;
            background: #e5e7eb;
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        .dark .strength-segment {
            background: #1e293b;
        }

        .strength-segment.weak {
            background: #ef4444;
        }

        .strength-segment.medium {
            background: #f59e0b;
        }

        .strength-segment.strong {
            background: #10b981;
        }

        .strength-text {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-top: 4px;
            transition: all 0.3s ease;
        }

        .strength-text.weak {
            color: #ef4444;
        }

        .strength-text.medium {
            color: #f59e0b;
        }

        .strength-text.strong {
            color: #10b981;
        }

        .btn-shine {
            position: relative;
            overflow: hidden;
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

        .btn-shine .ripple-el {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            transform: scale(0);
            animation: ripple 0.8s ease-out;
            pointer-events: none;
        }

        .custom-check {
            appearance: none;
            -webkit-appearance: none;
            width: 20px;
            height: 20px;
            border: 2px solid #cbd5e1;
            border-radius: 6px;
            cursor: pointer;
            position: relative;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            flex-shrink: 0;
        }

        .dark .custom-check {
            border-color: #475569;
        }

        .custom-check:hover {
            border-color: #10b981;
            transform: scale(1.1);
        }

        .custom-check:checked {
            background: #10b981;
            border-color: #10b981;
            animation: popIn 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .custom-check:checked::after {
            content: '';
            position: absolute;
            top: 2px;
            left: 6px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
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

        .particle:nth-child(5) {
            animation-delay: 3s;
            left: 45% !important;
        }
    </style>

    <div class="min-h-screen grid lg:grid-cols-2">

        {{-- KIRI: IMAGE + BRANDING --}}
        <div class="hidden lg:flex relative overflow-hidden bg-slate-900">
            <img src="https://images.unsplash.com/photo-1518509562904-e7ef99cdcc86?w=1200&q=80"
                alt="Sumatera"
                class="absolute inset-0 w-full h-full object-cover anim-zoom">

            <div class="absolute inset-0 bg-gradient-to-br from-emerald-900/95 via-emerald-800/80 to-slate-900/95"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>

            <div class="absolute inset-0 pointer-events-none overflow-hidden">
                <div class="particle" style="top: 20%; left: 15%;"></div>
                <div class="particle" style="top: 40%; left: 30%;"></div>
                <div class="particle" style="top: 60%; left: 60%;"></div>
                <div class="particle" style="top: 80%; left: 80%;"></div>
                <div class="particle" style="top: 50%; left: 45%;"></div>
            </div>

            <div class="relative z-10 flex flex-col justify-between p-12 w-full">
                <div class="anim-left-1">
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-2.5 group">
                        <div class="w-11 h-11 bg-white/15 backdrop-blur-md border border-white/20 rounded-xl flex items-center justify-center group-hover:scale-110 group-hover:rotate-6 transition-all">
                            <i class="fas fa-leaf text-white text-lg"></i>
                        </div>
                        <span class="font-extrabold text-xl text-white tracking-tight">
                            Explore<span class="text-emerald-300">Sumatera</span>
                        </span>
                    </a>
                </div>

                <div class="text-white max-w-md">
                    <div class="anim-left-2 inline-flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/20 px-3 py-1.5 rounded-full mb-6">
                        <span class="w-1.5 h-1.5 bg-emerald-400 rounded-full animate-pulse"></span>
                        <span class="text-xs font-semibold tracking-wide uppercase">Mulai Petualanganmu</span>
                    </div>

                    <h2 class="anim-left-3 text-4xl md:text-5xl font-black leading-tight mb-4 tracking-tight">
                        Bergabung &<br>
                        <span class="bg-gradient-to-r from-emerald-300 to-amber-200 bg-clip-text text-transparent italic font-serif">
                            Jelajahi Sumatera
                        </span>
                    </h2>

                    <p class="anim-left-4 text-gray-300 text-lg font-light leading-relaxed">
                        Daftar sekarang untuk memberikan review, menyimpan destinasi favorit, dan berbagi pengalaman wisatamu.
                    </p>
                </div>

                <div class="anim-left-4 grid grid-cols-3 gap-3 text-white/80">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-check-circle text-emerald-400"></i>
                        <span class="text-xs font-semibold">Review</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-check-circle text-emerald-400"></i>
                        <span class="text-xs font-semibold">Favorit</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-check-circle text-emerald-400"></i>
                        <span class="text-xs font-semibold">Gratis</span>
                    </div>
                </div>

                <div class="anim-left-4 text-white/60 text-xs">
                    <p>© {{ date('Y') }} Explore Sumatera. All rights reserved.</p>
                </div>
            </div>
        </div>

        {{-- KANAN: FORM REGISTER --}}
        <div class="flex items-center justify-center p-6 sm:p-12 bg-gray-50 dark:bg-slate-950 relative overflow-hidden">
            <div class="absolute -top-32 -right-32 w-96 h-96 bg-emerald-500/5 rounded-full blur-3xl anim-float"></div>
            <div class="absolute -bottom-32 -left-32 w-96 h-96 bg-emerald-500/5 rounded-full blur-3xl anim-float" style="animation-delay: 2s;"></div>

            <div class="w-full max-w-md relative z-10">

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

                <div class="mb-8 anim-right-1">
                    <h1 class="text-3xl font-black text-gray-900 dark:text-white mb-2 tracking-tight">
                        Buat Akun Baru
                    </h1>
                    <p class="text-gray-500 dark:text-slate-400">
                        Daftar gratis dan mulai jelajahi Sumatera.
                    </p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-5" id="registerForm">
                    @csrf

                    {{-- Name --}}
                    <div class="anim-right-2 input-group">
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus placeholder=" ">
                        <i class="fas fa-user input-icon"></i>
                        <label for="name">Nama Lengkap</label>
                        @error('name')
                        <p class="mt-2 text-sm text-red-600 font-medium anim-shake">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="anim-right-3 input-group">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required placeholder=" ">
                        <i class="fas fa-envelope input-icon"></i>
                        <label for="email">Email Address</label>
                        @error('email')
                        <p class="mt-2 text-sm text-red-600 font-medium anim-shake">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="anim-right-4">
                        <div class="input-group">
                            <input id="password" type="password" name="password" required placeholder=" "
                                oninput="checkPasswordStrength(this.value)">
                            <i class="fas fa-lock input-icon"></i>
                            <label for="password">Password</label>
                            <button type="button" class="toggle-eye" onclick="togglePassword('password', 'eyeIcon')">
                                <i id="eyeIcon" class="fas fa-eye"></i>
                            </button>
                        </div>

                        <div class="strength-bar">
                            <div class="strength-segment" id="seg1"></div>
                            <div class="strength-segment" id="seg2"></div>
                            <div class="strength-segment" id="seg3"></div>
                            <div class="strength-segment" id="seg4"></div>
                        </div>
                        <p class="strength-text" id="strengthText">Minimal 8 karakter</p>

                        @error('password')
                        <p class="mt-2 text-sm text-red-600 font-medium anim-shake">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Confirm Password --}}
                    <div class="anim-right-5 input-group">
                        <input id="password_confirmation" type="password" name="password_confirmation" required placeholder=" ">
                        <i class="fas fa-lock input-icon"></i>
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <button type="button" class="toggle-eye" onclick="togglePassword('password_confirmation', 'eyeIconConfirm')">
                            <i id="eyeIconConfirm" class="fas fa-eye"></i>
                        </button>
                        @error('password_confirmation')
                        <p class="mt-2 text-sm text-red-600 font-medium anim-shake">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Terms --}}
                    <div class="anim-right-6 flex items-start gap-3 pt-1">
                        <input id="terms" type="checkbox" required class="custom-check mt-0.5">
                        <label for="terms" class="text-sm text-gray-600 dark:text-slate-400 leading-relaxed cursor-pointer select-none">
                            Saya setuju dengan
                            <a href="#" class="text-emerald-700 dark:text-emerald-400 font-semibold hover:underline transition">Syarat & Ketentuan</a>
                            dan
                            <a href="#" class="text-emerald-700 dark:text-emerald-400 font-semibold hover:underline transition">Kebijakan Privasi</a>
                        </label>
                    </div>

                    {{-- Submit --}}
                    <div class="anim-right-6 pt-2">
                        <button type="submit" id="submitBtn"
                            class="btn-shine w-full text-white py-4 rounded-xl font-black text-sm tracking-widest uppercase shadow-lg shadow-emerald-600/30">
                            <i class="fas fa-user-plus mr-2"></i> Daftar Sekarang
                        </button>
                    </div>
                </form>

                <div class="anim-right-7 my-6 flex items-center gap-4">
                    <div class="flex-1 h-px bg-gray-200 dark:bg-slate-800"></div>
                    <span class="text-xs text-gray-400 font-bold uppercase tracking-widest">Atau</span>
                    <div class="flex-1 h-px bg-gray-200 dark:bg-slate-800"></div>
                </div>

                <p class="anim-right-7 text-center text-sm text-gray-600 dark:text-slate-400">
                    Sudah punya akun?
                    <a href="{{ route('login') }}"
                        class="font-bold text-emerald-700 dark:text-emerald-400 hover:text-emerald-800 transition">
                        Masuk Sekarang →
                    </a>
                </p>

                <div class="anim-right-7 mt-8 text-center">
                    <a href="{{ route('home') }}"
                        class="inline-flex items-center gap-2 text-sm text-gray-500 dark:text-slate-500 hover:text-emerald-700 dark:hover:text-emerald-400 transition font-medium group">
                        <i class="fas fa-arrow-left text-xs group-hover:-translate-x-1 transition-transform"></i>
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // ==============================
        // TOGGLE PASSWORD
        // ==============================
        function togglePassword(inputId, iconId) {
            var input = document.getElementById(inputId);
            var icon = document.getElementById(iconId);

            icon.style.transform = 'translateY(-50%) rotate(180deg)';
            setTimeout(function() {
                icon.style.transform = 'translateY(-50%) rotate(0deg)';
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

        // ==============================
        // PASSWORD STRENGTH — SIMPLE
        // Logic:
        //   < 8 karakter              → MERAH  "Minimal 8 Karakter"
        //   >= 8, cuma 1 jenis        → KUNING "Password Sedang"
        //   >= 8, ada 2 jenis atau lebih → HIJAU "Password Kuat"
        // ==============================
        function checkPasswordStrength(password) {
            var segments = [
                document.getElementById('seg1'),
                document.getElementById('seg2'),
                document.getElementById('seg3'),
                document.getElementById('seg4')
            ];
            var text = document.getElementById('strengthText');

            // Reset
            segments.forEach(function(seg) {
                seg.classList.remove('weak', 'medium', 'strong');
            });
            text.classList.remove('weak', 'medium', 'strong');

            // Kosong
            if (password.length === 0) {
                text.textContent = 'Minimal 8 karakter';
                return;
            }

            // < 8 karakter → MERAH
            if (password.length < 8) {
                text.textContent = 'Minimal 8 Karakter (' + password.length + '/8)';
                text.classList.add('weak');
                segments[0].classList.add('weak');
                return;
            }

            // >= 8 karakter → cek jenis karakter
            var hasLetter = /[a-zA-Z]/.test(password);
            var hasNumber = /\d/.test(password);
            var hasSymbol = /[^a-zA-Z\d]/.test(password);

            var jenisCount = 0;
            if (hasLetter) jenisCount++;
            if (hasNumber) jenisCount++;
            if (hasSymbol) jenisCount++;

            if (jenisCount >= 2) {
                // HIJAU — ada campuran (huruf + angka, atau + simbol)
                text.textContent = 'Password Kuat ✓';
                text.classList.add('strong');
                segments.forEach(function(seg) {
                    seg.classList.add('strong');
                });
            } else {
                // KUNING — cuma 1 jenis (huruf doang atau angka doang)
                text.textContent = 'Password Sedang';
                text.classList.add('medium');
                segments[0].classList.add('medium');
                segments[1].classList.add('medium');
                segments[2].classList.add('medium');
            }
        }

        // ==============================
        // FLOATING LABEL
        // ==============================
        document.querySelectorAll('.input-group input').forEach(function(input) {
            function updateLabel() {
                var parent = input.closest('.input-group');
                if (input.value && input.value.length > 0) {
                    parent.classList.add('has-value');
                } else {
                    parent.classList.remove('has-value');
                }
            }
            input.addEventListener('input', updateLabel);
            input.addEventListener('change', updateLabel);
            input.addEventListener('blur', updateLabel);
            updateLabel();
            setTimeout(updateLabel, 100);
        });

        // ==============================
        // RIPPLE BUTTON
        // ==============================
        document.addEventListener('DOMContentLoaded', function() {
            var btn = document.getElementById('submitBtn');
            if (btn) {
                btn.addEventListener('click', function(e) {
                    var rect = this.getBoundingClientRect();
                    var ripple = document.createElement('span');
                    ripple.className = 'ripple-el';
                    var size = Math.max(rect.width, rect.height);
                    ripple.style.width = ripple.style.height = size + 'px';
                    ripple.style.left = (e.clientX - rect.left - size / 2) + 'px';
                    ripple.style.top = (e.clientY - rect.top - size / 2) + 'px';
                    this.appendChild(ripple);
                    setTimeout(function() {
                        ripple.remove();
                    }, 800);
                });
            }
        });
    </script>
</x-guest-layout>