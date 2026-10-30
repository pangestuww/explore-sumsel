<footer class="bg-white dark:bg-[#0f1a18] border-t border-slate-200 dark:border-[#1a2e29] pt-16 pb-8 transition-colors duration-300 mt-auto">
    <div class="container mx-auto px-6 max-w-7xl">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">

            {{-- Brand --}}
            <div class="lg:col-span-1">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 mb-4 group">
                    <div class="w-10 h-10 bg-emerald-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-emerald-600/30 group-hover:scale-105 transition-transform">
                        <i class="fas fa-leaf text-lg"></i>
                    </div>
                    <span class="text-xl font-black text-slate-900 dark:text-white tracking-tight">
                        Explore<span class="text-emerald-600 dark:text-emerald-400">Sumatera</span>
                    </span>
                </a>
                <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed mb-6">
                    Jelajahi keindahan alam, budaya, dan kuliner Pulau Sumatera. Temukan pengalaman tak terlupakan di setiap sudutnya.
                </p>
                <div class="flex items-center gap-3">
                    <a href="#" class="w-8 h-8 rounded-full bg-slate-100 dark:bg-[#11211d] flex items-center justify-center text-slate-500 dark:text-slate-400 hover:bg-emerald-100 hover:text-emerald-600 dark:hover:bg-emerald-900/50 dark:hover:text-emerald-400 transition-colors">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full bg-slate-100 dark:bg-[#11211d] flex items-center justify-center text-slate-500 dark:text-slate-400 hover:bg-emerald-100 hover:text-emerald-600 dark:hover:bg-emerald-900/50 dark:hover:text-emerald-400 transition-colors">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full bg-slate-100 dark:bg-[#11211d] flex items-center justify-center text-slate-500 dark:text-slate-400 hover:bg-emerald-100 hover:text-emerald-600 dark:hover:bg-emerald-900/50 dark:hover:text-emerald-400 transition-colors">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>

            {{-- Menu --}}
            <div>
                <h4 class="text-slate-900 dark:text-white font-bold mb-4 uppercase tracking-wider text-sm">Menu</h4>
                <ul class="space-y-3">
                    <li><a href="{{ route('home') }}" class="text-slate-500 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 text-sm transition-colors">Beranda</a></li>
                    <li><a href="{{ route('destinasi.index') }}" class="text-slate-500 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 text-sm transition-colors">Destinasi</a></li>
                    <li><a href="{{ route('budaya.index') }}" class="text-slate-500 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 text-sm transition-colors">Budaya</a></li>
                    <li><a href="{{ route('kuliner.index') }}" class="text-slate-500 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 text-sm transition-colors">Kuliner</a></li>
                </ul>
            </div>

            {{-- Kontak --}}
            <div>
                <h4 class="text-slate-900 dark:text-white font-bold mb-4 uppercase tracking-wider text-sm">Kontak</h4>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3">
                        <i class="fas fa-envelope text-emerald-600 dark:text-emerald-400 mt-1 text-sm"></i>
                        <span class="text-slate-500 dark:text-slate-400 text-sm">info@exploresumatera.id</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-phone-alt text-emerald-600 dark:text-emerald-400 mt-1 text-sm"></i>
                        <span class="text-slate-500 dark:text-slate-400 text-sm">(0711) 123-4567</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-map-marker-alt text-emerald-600 dark:text-emerald-400 mt-1 text-sm"></i>
                        <span class="text-slate-500 dark:text-slate-400 text-sm">Palembang, Sumatera Selatan</span>
                    </li>
                </ul>
            </div>

            {{-- Info --}}
            <div>
                <h4 class="text-slate-900 dark:text-white font-bold mb-4 uppercase tracking-wider text-sm">Tentang Kami</h4>
                <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">
                    Platform pariwisata yang didedikasikan untuk mempromosikan kekayaan budaya dan keindahan alam Sumatera kepada dunia.
                </p>
            </div>
        </div>

        {{-- Copyright --}}
        <div class="pt-8 border-t border-slate-200 dark:border-[#1a2e29] flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-slate-500 dark:text-slate-400 text-sm text-center md:text-left">
                &copy; {{ date('Y') }} Explore Sumatera. All rights reserved.
            </p>
            <div class="flex items-center gap-4 text-sm text-slate-500 dark:text-slate-400">
                <a href="#" class="hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>