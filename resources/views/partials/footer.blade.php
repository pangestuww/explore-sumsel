<footer class="bg-green-900 text-white mt-20 border-t border-transparent transition-colors">
    <div class="container mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-4 gap-8">

        <div>
            <h3 class="font-bold text-lg mb-4">Explore Sumatera</h3>
            <p class="text-sm text-green-100">
                Jelajahi keindahan alam, budaya, dan kuliner Pulau Sumatera.
            </p>
        </div>

        <div>
            <h4 class="font-semibold mb-4">Menu</h4>
            <ul class="space-y-2 text-sm text-green-100">
                <li><a href="{{ route('home') }}" class="hover:text-white">Beranda</a></li>
                <li><a href="{{ route('destinasi.index') }}" class="hover:text-white">Destinasi</a></li>
                <li><a href="{{ route('budaya.index') }}" class="hover:text-white">Budaya</a></li>
                <li><a href="{{ route('kuliner.index') }}" class="hover:text-white">Kuliner</a></li>
                <li><a href="{{ route('peta.index') }}" class="hover:text-white">Peta</a></li>
            </ul>
        </div>

        <div>
            <h4 class="font-semibold mb-4">Kontak</h4>
            <ul class="space-y-2 text-sm text-green-100">
                <li><i class="fas fa-envelope mr-2"></i> info@exploresumatera.id</li>
                <li><i class="fas fa-phone mr-2"></i> (0711) 123-4567</li>
                <li><i class="fas fa-map-marker-alt mr-2"></i> Palembang, Sumatera</li>
            </ul>
        </div>

        <div>
            <h4 class="font-semibold mb-4">Ikuti Kami</h4>
            <div class="flex gap-3">
                <a href="#" class="w-9 h-9 rounded-full bg-green-800 flex items-center justify-center hover:bg-green-700 transition"><i class="fab fa-instagram"></i></a>
                <a href="#" class="w-9 h-9 rounded-full bg-green-800 flex items-center justify-center hover:bg-green-700 transition"><i class="fab fa-facebook"></i></a>
                <a href="#" class="w-9 h-9 rounded-full bg-green-800 flex items-center justify-center hover:bg-green-700 transition"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>

    <div class="border-t border-green-800 py-4 text-center text-sm text-green-100">
        © {{ date('Y') }} Explore Sumatera. All rights reserved.
    </div>
</footer>