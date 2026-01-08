<!-- Top Bar -->
<div id="top-bar" class="bg-brand-yellow text-black py-2 hidden md:block transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center text-xs font-bold uppercase tracking-wider">
            <div class="flex gap-6">
                <span><i class="fas fa-building mr-2"></i> LuxeDrive Dealer Jakarta</span>
                <span><i class="fas fa-envelope mr-2"></i> info@luxedrive.id</span>
            </div>
            <div class="flex gap-4">
                <a href="#" class="hover:opacity-70 transition-opacity"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="hover:opacity-70 transition-opacity"><i class="fab fa-instagram"></i></a>
                <a href="#" class="hover:opacity-70 transition-opacity"><i class="fab fa-twitter"></i></a>
                <a href="#" class="hover:opacity-70 transition-opacity"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </div>
</div>

<!-- Navbar -->
<nav id="main-nav" class="fixed top-0 md:top-8 w-full z-50 bg-black/95 border-b border-brand-yellow/20 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="LUXE DRIVE" class="h-20 md:h-20 rounded-full w-auto object-contain">
                </a>
            </div>
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-8">
                    <a href="{{ route('home') }}#home" class="text-white hover:text-brand-yellow px-3 py-2 text-sm font-bold uppercase transition-colors">Home</a>
                    <a href="{{ route('about') }}" class="text-white hover:text-brand-yellow px-3 py-2 text-sm font-bold uppercase transition-colors">About</a>
                    <a href="{{ route('cars.index') }}" class="text-white hover:text-brand-yellow px-3 py-2 text-sm font-bold uppercase transition-colors">Mobil</a>
                    <a href="{{ route('galery') }}" class="text-white hover:text-brand-yellow px-3 py-2 text-sm font-bold uppercase transition-colors">Galery</a>
                    <a href="{{ route('contact') }}" class="bg-brand-yellow text-black px-6 py-2.5 rounded-xl text-sm font-bold uppercase hover:bg-white transition-all transform hover:-translate-y-1">Kontak</a>
                </div>
            </div>
            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-btn" class="text-white hover:text-brand-yellow">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- Mobile menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-brand-dark border-t border-brand-yellow/20">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="{{ route('home') }}#home" class="text-white block px-3 py-2 text-base font-bold uppercase">Home</a>
            <a href="{{ route('about') }}" class="text-white block px-3 py-2 text-base font-bold uppercase">About</a>
            <a href="{{ route('cars.index') }}" class="text-white block px-3 py-2 text-base font-bold uppercase">Mobil</a>
            <a href="{{ route('galery') }}" class="text-white block px-3 py-2 text-base font-bold uppercase">Galery</a>
            <a href="{{ route('contact') }}" class="text-brand-yellow block px-3 py-2 text-base font-bold uppercase">Kontak</a>
        </div>
    </div>
</nav>