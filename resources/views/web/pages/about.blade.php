@extends('web.layouts.app')

@section('title', 'About Us - Premium Car Rental')

@section('content')
<!-- Hero Banner Section -->
<section class="relative h-[70vh] bg-black overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset('assets/img/about_hero.png') }}" alt="About {{ get_site_name() }}" class="w-full h-full object-cover opacity-60">
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/50 to-black"></div>
    </div>
    <div class="relative z-10 h-full flex items-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="max-w-3xl">
                <h5 class="text-brand-yellow font-bold uppercase tracking-[0.3em] mb-4 wow animate__animated animate__fadeInDown">Since 2026</h5>
                <h1 class="text-5xl md:text-7xl font-bold uppercase mb-6 leading-tight wow animate__animated animate__fadeInUp">
                    REDEFINING<br>
                    <span class="text-brand-yellow">LUXURY MOBILITY</span>
                </h1>
                <p class="text-xl text-gray-300 leading-relaxed wow animate__animated animate__fadeInUp animate__delay-1s">
                    Kami menghadirkan pengalaman berkendara premium dengan armada terbaik dan layanan profesional yang tak tertandingi.
                </p>
            </div>
        </div>
    </div>
</section>


<!-- Showroom Section -->
<section class="py-24 bg-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-5 gap-12 items-center">
            <!-- Left Image - Takes 3 columns -->
            <div class="lg:col-span-3 wow animate__animated animate__fadeInLeft">
                <div class="relative group">
                    <!-- Main Image -->
                    <div class="relative overflow-hidden rounded-3xl">
                        <img src="{{ asset('assets/img/showroom.png') }}" alt="{{ get_site_name() }} Showroom" class="w-full h-[600px] object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    </div>
                </div>
            </div>

            <!-- Right Content - Takes 2 columns -->
            <div class="lg:col-span-2 wow animate__animated animate__fadeInRight">
                <h2 class="text-4xl md:text-5xl font-bold uppercase mb-8 leading-tight">
                    SHOWROOM<br>
                    <span class="text-brand-yellow">PREMIUM</span>
                </h2>

                <div class="space-y-6 text-gray-400 text-lg leading-relaxed mb-10">
                    <p>
                        Sejak tahun 2026, <span class="text-white font-bold">{{ get_site_name() }}</span> telah menjadi pilihan utama untuk layanan rental mobil premium di Jakarta dan sekitarnya.
                    </p>
                    <p>
                        Dengan lebih dari <span class="text-brand-yellow font-bold">50+ armada premium</span> dan <span class="text-brand-yellow font-bold">500+ pelanggan puas</span>, kami bangga menjadi mitra terpercaya untuk perjalanan bisnis, acara spesial, hingga liburan keluarga Anda.
                    </p>
                    <p>
                        Setiap mobil dalam armada kami dipilih dengan cermat dan dirawat dengan standar tertinggi, memastikan kenyamanan, keamanan, dan performa optimal di setiap perjalanan.
                    </p>
                </div>

                <a href="{{ route('contact') }}" class="inline-block bg-brand-yellow text-black px-10 py-4 rounded-xl font-bold uppercase hover:bg-white transition-all">
                    Kunjungi Kami
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="py-24 bg-brand-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 wow animate__animated animate__fadeInUp">
            <h2 class="text-4xl md:text-5xl font-bold uppercase">
                MENGAPA MEMILIH <span class="text-brand-yellow">KAMI</span>
            </h2>
        </div>

        <div class="grid lg:grid-cols-3 gap-1 bg-brand-yellow/20 p-1 rounded-2xl">
            <!-- Value 1 -->
            <div class="bg-brand-dark p-10 rounded-xl hover:bg-black transition-all group wow animate__animated animate__fadeInUp">
                <div class="mb-6">
                    <span class="text-6xl font-bold text-brand-yellow/20 group-hover:text-brand-yellow/30 transition-colors">01</span>
                </div>
                <h3 class="text-2xl font-bold uppercase mb-4 group-hover:text-brand-yellow transition-colors">Keamanan Terjamin</h3>
                <p class="text-gray-400 leading-relaxed">
                    Semua kendaraan dilengkapi dengan asuransi komprehensif dan sistem keamanan terkini untuk melindungi perjalanan Anda.
                </p>
                <div class="mt-6 h-1 w-16 bg-brand-yellow/30 group-hover:w-24 group-hover:bg-brand-yellow transition-all"></div>
            </div>

            <!-- Value 2 -->
            <div class="bg-brand-dark p-10 rounded-xl hover:bg-black transition-all group wow animate__animated animate__fadeInUp animate__delay-1s">
                <div class="mb-6">
                    <span class="text-6xl font-bold text-brand-yellow/20 group-hover:text-brand-yellow/30 transition-colors">02</span>
                </div>
                <h3 class="text-2xl font-bold uppercase mb-4 group-hover:text-brand-yellow transition-colors">Kualitas Premium</h3>
                <p class="text-gray-400 leading-relaxed">
                    Armada terbaru dengan perawatan berkala memastikan performa optimal dan kenyamanan maksimal di setiap perjalanan.
                </p>
                <div class="mt-6 h-1 w-16 bg-brand-yellow/30 group-hover:w-24 group-hover:bg-brand-yellow transition-all"></div>
            </div>

            <!-- Value 3 -->
            <div class="bg-brand-dark p-10 rounded-xl hover:bg-black transition-all group wow animate__animated animate__fadeInUp animate__delay-2s">
                <div class="mb-6">
                    <span class="text-6xl font-bold text-brand-yellow/20 group-hover:text-brand-yellow/30 transition-colors">03</span>
                </div>
                <h3 class="text-2xl font-bold uppercase mb-4 group-hover:text-brand-yellow transition-colors">Layanan 24/7</h3>
                <p class="text-gray-400 leading-relaxed">
                    Tim customer service kami siap membantu Anda kapan saja, di mana saja untuk memastikan pengalaman rental yang sempurna.
                </p>
                <div class="mt-6 h-1 w-16 bg-brand-yellow/30 group-hover:w-24 group-hover:bg-brand-yellow transition-all"></div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 bg-black relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <img src="{{ asset('assets/img/hero2.png') }}" alt="Background" class="w-full h-full object-cover">
    </div>
    <div class="absolute inset-0 bg-gradient-to-r from-black via-black/95 to-black/80"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center wow animate__animated animate__zoomIn">
            <h2 class="text-4xl md:text-6xl font-bold uppercase mb-6">
                SIAP MEMULAI<br>
                <span class="text-brand-yellow">PERJALANAN ANDA?</span>
            </h2>
            <p class="text-xl text-gray-400 mb-10 max-w-2xl mx-auto">
                Hubungi kami sekarang dan rasakan pengalaman berkendara premium yang tak terlupakan
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact') }}" class="bg-brand-yellow text-black px-12 py-5 rounded-xl font-bold uppercase hover:bg-white transition-all inline-block">
                    Hubungi Kami
                </a>
                <a href="{{ route('home') }}#mobil" class="border-2 border-brand-yellow text-brand-yellow px-12 py-5 rounded-xl font-bold uppercase hover:bg-brand-yellow hover:text-black transition-all inline-block">
                    Lihat Armada
                </a>
            </div>
        </div>
    </div>
</section>
@endsection