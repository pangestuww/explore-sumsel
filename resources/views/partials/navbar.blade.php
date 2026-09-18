<nav class="bg-white shadow-sm sticky top-0 z-50">
    <div class="container mx-auto px-6 py-4 flex items-center justify-between">

        {{-- Logo --}}
        <a href="{{ route('home') }}" class="flex items-center gap-2">
            <div class="w-9 h-9 bg-green-700 rounded-full flex items-center justify-center">
                <i class="fas fa-leaf text-white"></i>
            </div>
            <span class="font-bold text-xl text-green-800">Explore Sumsel</span>
        </a>

        {{-- Menu --}}
        <div class="hidden md:flex items-center gap-8 text-gray-700 font-medium">
            <a href="{{ route('home') }}"
                class="{{ request()->routeIs('home') ? 'text-green-700 font-bold' : 'hover:text-green-700' }}">
                Beranda
            </a>
            <a href="{{ route('destinasi.index') }}"
                class="{{ request()->routeIs('destinasi.*') ? 'text-green-700 font-bold' : 'hover:text-green-700' }}">
                Destinasi
            </a>
            <a href="{{ route('budaya.index') }}"
                class="{{ request()->routeIs('budaya.*') ? 'text-green-700 font-bold' : 'hover:text-green-700' }}">
                Budaya
            </a>
            <a href="{{ route('kuliner.index') }}"
                class="{{ request()->routeIs('kuliner.*') ? 'text-green-700 font-bold' : 'hover:text-green-700' }}">
                Kuliner
            </a>
            <a href="{{ route('peta.index') }}"
                class="{{ request()->routeIs('peta.*') ? 'text-green-700 font-bold' : 'hover:text-green-700' }}">
                Peta
            </a>
        </div>

        {{-- Search + Auth --}}
        <div class="flex items-center gap-3">
            <button class="w-9 h-9 rounded-full bg-gray-100 flex items-center justify-center hover:bg-gray-200">
                <i class="fas fa-search text-gray-600"></i>
            </button>
            <a href="#" class="bg-green-700 text-white px-5 py-2 rounded-lg hover:bg-green-800 transition">
                Masuk
            </a>
        </div>
    </div>
</nav>