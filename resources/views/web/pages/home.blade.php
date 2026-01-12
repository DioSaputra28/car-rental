@extends('web.layouts.app')

@section('meta_title', 'Sewa Mobil Premium Jakarta | ' . get_site_name() . ' - Rental Mobil Terpercaya')
@section('meta_description', 'Sewa mobil premium di Jakarta dengan harga terbaik. Armada terbaru Alphard, Fortuner, Innova dengan driver profesional. Layanan 24/7, booking mudah via WhatsApp.')
@section('meta_keywords', 'sewa mobil jakarta, rental mobil jakarta, sewa alphard jakarta, rental fortuner jakarta, sewa mobil dengan driver, rental mobil premium, sewa mobil murah jakarta')

@section('og_title', 'Sewa Mobil Premium Jakarta - ' . get_site_name())
@section('og_description', 'Rental mobil premium terpercaya di Jakarta. Armada terbaru, driver berpengalaman, harga kompetitif. Booking sekarang!')
@section('og_image', asset('assets/img/hero_banner_1.png'))

@section('content')
<!-- Hero Section -->
<section id="home" class="relative h-screen bg-black pt-20">
    <div class="swiper hero-swiper h-full w-full">
        <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide relative">
                <img src="{{ asset('assets/img/hero_banner_1.png') }}" alt="Premium Car Rental Service" class="w-full h-full object-cover">
                <a href="#mobil" class="absolute inset-0 z-10 block" aria-label="Rent Now"></a>
            </div>
            <!-- Slide 2 -->
            <div class="swiper-slide relative">
                <img src="{{ asset('assets/img/hero_banner_2.png') }}" alt="Drive Your Dream" class="w-full h-full object-cover">
                <a href="#mobil" class="absolute inset-0 z-10 block" aria-label="View Fleet"></a>
            </div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>

<!-- Search/Filter Section -->
<div class="relative z-20 -mt-24 pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-[#1a1a1a] rounded-xl border border-white/10 p-6 md:p-8 shadow-2xl">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- Layanan -->
                <div class="space-y-2">
                    <label class="text-brand-yellow font-bold text-sm uppercase tracking-wider">Layanan</label>
                    <div class="flex items-center gap-3 bg-black/50 border border-white/10 rounded-lg px-4 py-3 text-gray-300 hover:border-brand-yellow/50 transition-colors cursor-pointer group">
                        <i class="fas fa-gem text-brand-yellow group-hover:scale-110 transition-transform"></i>
                        <span class="text-sm font-medium">Rental Mobil Premium</span>
                    </div>
                </div>

                <!-- Wilayah -->
                <div class="space-y-2">
                    <label class="text-brand-yellow font-bold text-sm uppercase tracking-wider">Wilayah</label>
                    <div class="flex items-center gap-3 bg-black/50 border border-white/10 rounded-lg px-4 py-3 text-gray-300 hover:border-brand-yellow/50 transition-colors cursor-pointer group">
                        <i class="fas fa-map text-brand-yellow group-hover:scale-110 transition-transform"></i>
                        <span class="text-sm font-medium">Jabodetabek & Sekitarnya</span>
                    </div>
                </div>

                <!-- Tujuan -->
                <div class="space-y-2">
                    <label class="text-brand-yellow font-bold text-sm uppercase tracking-wider">Tujuan</label>
                    <div class="flex items-center gap-3 bg-black/50 border border-white/10 rounded-lg px-4 py-3 text-gray-300 hover:border-brand-yellow/50 transition-colors cursor-pointer group">
                        <i class="fas fa-route text-brand-yellow group-hover:scale-110 transition-transform"></i>
                        <span class="text-sm font-medium">Dalam & Luar Kota</span>
                    </div>
                </div>

                <!-- Button -->
                <div class="space-y-2">
                    <label class="text-brand-yellow font-bold text-sm uppercase tracking-wider">Ready 24 Jam</label>
                    <a href="{{ route('contact') }}" class="flex items-center justify-center bg-brand-yellow text-black rounded-lg px-4 py-3 font-bold uppercase hover:bg-white transition-all transform hover:-translate-y-1 shadow-lg shadow-brand-yellow/20">
                        Booking Mobil
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- About Section -->
<section id="about" class="py-24 bg-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-16 items-center">
            <div class="wow animate__animated animate__fadeInLeft">
                <h5 class="text-brand-yellow font-bold uppercase tracking-widest mb-2">Since 2010</h5>
                <h2 class="text-4xl md:text-5xl font-bold uppercase mb-8 leading-tight">UNCOMPROMISED<br><span class="text-brand-yellow">QUALITY & SERVICE</span></h2>
                <p class="text-gray-400 text-lg mb-8 leading-relaxed">
                    Kami adalah penyedia jasa rental mobil premium yang berdedikasi untuk memberikan pengalaman berkendara terbaik bagi Anda. Dengan armada terbaru dan perawatan maksimal, kami menjamin kenyamanan dan keamanan perjalanan Anda.
                </p>
                <ul class="space-y-4 mb-10">
                    <li class="flex items-center gap-3">
                        <i class="fas fa-check-circle text-brand-yellow"></i>
                        <span>Armada Mobil Terbaru & Terawat</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-check-circle text-brand-yellow"></i>
                        <span>Supir Profesional & Berpengalaman</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-check-circle text-brand-yellow"></i>
                        <span>Layanan 24/7 Siap Membantu</span>
                    </li>
                </ul>
                <a href="{{ route('contact') }}" class="inline-block bg-brand-yellow text-black px-10 py-4 rounded-xl font-bold uppercase hover:bg-white transition-all">Hubungi Kami</a>
            </div>
            <div class="wow animate__animated animate__fadeInRight relative">
                <div class="absolute -top-6 -left-6 w-32 h-32 bg-brand-yellow -z-10"></div>
                <img src="{{ asset('assets/img/about.png') }}" alt="About Us" class="w-full h-auto grayscale hover:grayscale-0 transition-all duration-700 rounded-2xl">
                <div class="absolute -bottom-6 -right-6 w-full h-full border-4 border-brand-yellow -z-10"></div>
            </div>
        </div>
    </div>
</section>

<!-- List Mobil Section -->
<section id="mobil" class="py-24 bg-brand-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h5 class="text-brand-yellow font-bold uppercase tracking-widest mb-2">Our Fleet</h5>
            <h2 class="text-4xl md:text-5xl font-bold uppercase">CHOOSE YOUR <span class="text-brand-yellow">RIDE</span></h2>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @forelse($featured_cars as $index => $car)
            <div class="wow animate__animated animate__fadeInUp {{ $index > 0 ? 'animate__delay-' . $index . 's' : '' }} bg-brand-dark/50 border border-brand-yellow/30 group rounded-3xl overflow-hidden">
                <div class="overflow-hidden relative h-64">
                    <img src="{{ $car->image_url }}" alt="{{ $car->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                </div>
                <div class="p-8">
                    <h3 class="text-2xl font-bold uppercase mb-2">{{ $car->name }}</h3>
                    <p class="text-brand-yellow font-bold text-sm mb-4">Paket 12 Jam, Full Day & Drop Off</p>
                    <div class="border-b border-brand-yellow/10 pb-4 mb-4">
                        <span class="text-gray-400 text-xs uppercase tracking-wider block mb-1">Mobil - Jasa Driver - BBM</span>
                        <span class="text-lg font-bold text-white block">Tarif sewa chat Admin</span>
                    </div>
                    <div class="flex items-center justify-between">
                        @php
                        $whatsapp = get_site_whatsapp();
                        $orderUrl = $whatsapp
                        ? 'https://wa.me/' . preg_replace('/[^0-9]/', '', $whatsapp) . '?text=' . urlencode('Halo, saya tertarik untuk menyewa mobil ' . $car->name)
                        : route('contact');
                        @endphp
                        <a href="{{ $orderUrl }}" target="{{ $whatsapp ? '_blank' : '_self' }}" class="bg-brand-yellow text-black px-8 py-3 rounded-xl font-bold uppercase hover:bg-white transition-all w-full text-center">Order Now</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-12">
                <p class="text-gray-400 text-lg">Belum ada mobil yang tersedia saat ini.</p>
            </div>
            @endforelse
        </div>

        <div class="text-center mt-12">
            <a href="" class="border-2 border-brand-yellow text-brand-yellow px-10 py-4 rounded-xl font-bold uppercase hover:bg-brand-yellow hover:text-black transition-all">Lihat Semua Armada</a>
        </div>
    </div>
</section>

<!-- Full Width Banner -->
<section class="h-[60vh] relative overflow-hidden">
    <img src="{{ asset('assets/img/banner.png') }}" alt="Wide Banner" class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-black/40 flex items-center justify-center text-center">
        <div class="px-4">
            <h2 class="wow animate__animated animate__zoomIn text-white text-4xl md:text-6xl font-bold uppercase mb-6">READY TO DRIVE?</h2>
            <p class="wow animate__animated animate__fadeInUp animate__delay-1s text-brand-yellow text-xl md:text-2xl font-bold uppercase tracking-[0.5em] mb-10">THE ROAD IS YOURS</p>
            <a href="{{ route('contact') }}" class="wow animate__animated animate__fadeInUp animate__delay-2s bg-brand-yellow text-black px-12 py-5 rounded-xl font-bold uppercase hover:bg-white transition-all">Booking Now</a>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section id="gallery" class="py-24 bg-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h5 class="text-brand-yellow font-bold uppercase tracking-widest mb-2">Moments</h5>
            <h2 class="text-4xl md:text-5xl font-bold uppercase">OUR <span class="text-brand-yellow">GALLERY</span></h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @forelse($galleries as $index => $gallery)
            @php
            $delays = ['', 'animate__delay-100ms', 'animate__delay-200ms', 'animate__delay-300ms'];
            $delay = $delays[$index % 4] ?? '';
            @endphp
            <div class="wow animate__animated animate__fadeIn {{ $delay }} hover:brightness-110 transition-all">
                <a href="{{ $gallery->url }}" data-fancybox="home-gallery" data-caption="Gallery {{ $index + 1 }}">
                    <img src="{{ $gallery->url }}" alt="Gallery {{ $index + 1 }}" class="w-full h-64 object-cover grayscale hover:grayscale-0 transition-all duration-700 border-2 border-brand-yellow/10 {{ $index === 7 ? 'rounded-2xl' : '' }}">
                </a>
            </div>
            @empty
            <div class="col-span-4 text-center py-12">
                <p class="text-gray-400 text-lg">Belum ada foto gallery yang tersedia.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Parallax Section -->
<section class="relative h-[50vh] flex items-center justify-center parallax-bg" style="background-image: url('{{ asset('assets/img/hero2.png') }}');">
    <div class="absolute inset-0 bg-black/70"></div>
    <div class="relative z-10 text-center px-4">
        <h2 class="wow animate__animated animate__fadeInDown text-brand-yellow text-5xl md:text-7xl font-bold uppercase mb-4">500+</h2>
        <p class="wow animate__animated animate__fadeInUp text-white text-xl md:text-2xl font-bold uppercase tracking-widest">Happy Customers Served</p>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Initialize Swiper for Hero
    const swiper = new Swiper('.hero-swiper', {
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>
@endpush