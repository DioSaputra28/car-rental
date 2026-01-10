<!-- Top Bar -->
<div id="top-bar" class="bg-brand-yellow text-black py-2 hidden md:block transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center text-xs font-bold uppercase tracking-wider">
            <div class="flex gap-6">
                <span><i class="fas fa-building mr-2"></i> {{ get_site_name() }}</span>
                <span><i class="fas fa-envelope mr-2"></i> {{ get_site_email() }}</span>
            </div>
            <div class="flex gap-4">
                @if(get_social_media()['facebook'])
                <a href="{{ get_social_media()['facebook'] }}" target="_blank" class="hover:opacity-70 transition-opacity"><i class="fab fa-facebook-f"></i></a>
                @endif
                @if(get_social_media()['instagram'])
                <a href="{{ get_social_media()['instagram'] }}" target="_blank" class="hover:opacity-70 transition-opacity"><i class="fab fa-instagram"></i></a>
                @endif
                @if(get_social_media()['twitter'])
                <a href="{{ get_social_media()['twitter'] }}" target="_blank" class="hover:opacity-70 transition-opacity"><i class="fab fa-twitter"></i></a>
                @endif
                @if(get_site_whatsapp())
                <a href="https://wa.me/{{ get_site_whatsapp() }}" target="_blank" class="hover:opacity-70 transition-opacity"><i class="fab fa-whatsapp"></i></a>
                @endif
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
                    <div class="h-16 max-h-16 max-w-[200px] flex items-center justify-center">
                        <img src="{{ get_site_logo_url() ?? asset('assets/img/logo.png') }}"
                            alt="{{ get_site_name() }}"
                            class="max-h-full max-w-full w-auto h-auto object-contain">
                    </div>
                </a>
            </div>
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-8">
                    <a href="{{ route('home') }}#home" class="{{ request()->routeIs('home') ? 'text-brand-yellow border-b-2 border-brand-yellow' : 'text-white hover:text-brand-yellow' }} px-3 py-2 text-sm font-bold uppercase transition-colors">Home</a>
                    <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'text-brand-yellow border-b-2 border-brand-yellow' : 'text-white hover:text-brand-yellow' }} px-3 py-2 text-sm font-bold uppercase transition-colors">About</a>
                    <a href="{{ route('cars.index') }}" class="{{ request()->routeIs('cars.*') ? 'text-brand-yellow border-b-2 border-brand-yellow' : 'text-white hover:text-brand-yellow' }} px-3 py-2 text-sm font-bold uppercase transition-colors">Mobil</a>
                    <a href="{{ route('galery') }}" class="{{ request()->routeIs('galery') ? 'text-brand-yellow border-b-2 border-brand-yellow' : 'text-white hover:text-brand-yellow' }} px-3 py-2 text-sm font-bold uppercase transition-colors">Galery</a>
                    <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'bg-white' : 'bg-brand-yellow hover:bg-white' }} text-black px-6 py-2.5 rounded-xl text-sm font-bold uppercase transition-all transform hover:-translate-y-1">Kontak</a>
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
            <a href="{{ route('home') }}#home" class="{{ request()->routeIs('home') ? 'text-brand-yellow bg-brand-yellow/10' : 'text-white' }} block px-3 py-2 text-base font-bold uppercase hover:text-brand-yellow hover:bg-brand-yellow/10 transition-colors rounded-lg">Home</a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'text-brand-yellow bg-brand-yellow/10' : 'text-white' }} block px-3 py-2 text-base font-bold uppercase hover:text-brand-yellow hover:bg-brand-yellow/10 transition-colors rounded-lg">About</a>
            <a href="{{ route('cars.index') }}" class="{{ request()->routeIs('cars.*') ? 'text-brand-yellow bg-brand-yellow/10' : 'text-white' }} block px-3 py-2 text-base font-bold uppercase hover:text-brand-yellow hover:bg-brand-yellow/10 transition-colors rounded-lg">Mobil</a>
            <a href="{{ route('galery') }}" class="{{ request()->routeIs('galery') ? 'text-brand-yellow bg-brand-yellow/10' : 'text-white' }} block px-3 py-2 text-base font-bold uppercase hover:text-brand-yellow hover:bg-brand-yellow/10 transition-colors rounded-lg">Galery</a>
            <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'bg-white text-black' : 'text-brand-yellow' }} block px-3 py-2 text-base font-bold uppercase hover:bg-white hover:text-black transition-colors rounded-lg">Kontak</a>
        </div>
    </div>
</nav>