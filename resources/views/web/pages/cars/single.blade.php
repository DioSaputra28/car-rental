@extends('web.layouts.app')

@section('title', $car->name . ' - Premium Car Rental')

@section('content')
<!-- Hero Banner Section -->
<section class="relative h-[70vh] overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset('assets/img/car-detail-banner.png') }}" alt="Car Detail Banner" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/50 to-black"></div>
    </div>

    <div class="relative z-10 h-full flex items-end">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16 w-full">
            <div class="wow animate__animated animate__fadeInUp">
                <h1 class="text-5xl md:text-7xl font-bold uppercase text-white mb-4">{{ $car->name }}</h1>
                <p class="text-brand-yellow text-xl font-bold mb-6">Paket 12 Jam, Full Day & Drop Off</p>
            </div>
        </div>
    </div>
</section>

<!-- Car Details Section -->
<section class="py-24 bg-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-12">
                <!-- Main Car Image -->
                @if($car->image && file_exists(public_path('storage/' . $car->image)))
                <div class="wow animate__animated animate__fadeInUp">
                    <div class="relative aspect-video overflow-hidden rounded-2xl border-2 border-brand-yellow/30">
                        <img src="{{ $car->image_url }}"
                            alt="{{ $car->name }}"
                            class="w-full h-full object-cover">
                    </div>
                </div>
                @endif

                <!-- Description -->
                @if($car->description)
                <div class="wow animate__animated animate__fadeInUp">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-1 bg-brand-yellow"></div>
                        <h2 class="text-3xl font-bold uppercase text-white">Tentang Mobil</h2>
                    </div>
                    <div class="bg-[#1a1a1a] border border-white/5 rounded-2xl p-8">
                        <p class="text-gray-300 text-lg leading-relaxed whitespace-pre-line">{{ $car->description }}</p>
                    </div>
                </div>
                @endif

                <!-- Car Gallery -->
                @if($car->images->count() > 0)
                <div class="wow animate__animated animate__fadeInUp animate__delay-100ms">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-1 bg-brand-yellow"></div>
                        <h2 class="text-3xl font-bold uppercase text-white">Galeri Foto</h2>
                        <span class="bg-brand-yellow/10 text-brand-yellow px-4 py-1 rounded-full text-sm font-bold">{{ $car->images->count() }} Foto</span>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach($car->images as $index => $image)
                        <a href="{{ $image->url }}"
                            data-fancybox="car-gallery"
                            data-caption="{{ $car->name }} - Photo {{ $index + 1 }}"
                            class="group relative aspect-video overflow-hidden rounded-xl border-2 border-white/5 hover:border-brand-yellow/50 transition-all">
                            @if(file_exists(public_path('storage/' . $image->path)))
                            <img src="{{ $image->url }}"
                                alt="{{ $car->name }} - {{ $index + 1 }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                                loading="lazy">
                            @else
                            <div class="w-full h-full bg-gray-900 flex items-center justify-center">
                                <i class="fas fa-image text-3xl text-gray-700"></i>
                            </div>
                            @endif

                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-all flex items-center justify-center">
                                <i class="fas fa-search-plus text-white text-2xl opacity-0 group-hover:opacity-100 transition-opacity"></i>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="sticky top-24 space-y-6">
                    <!-- Package Info Card -->
                    <div class="wow animate__animated animate__fadeInRight bg-brand-yellow rounded-2xl p-8 text-black">
                        <h3 class="text-2xl font-bold uppercase mb-6">Paket Sewa</h3>
                        <div class="space-y-4">
                            <div class="flex items-start gap-3">
                                <div class="w-6 h-6 rounded-full bg-black/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <div class="w-2 h-2 rounded-full bg-black"></div>
                                </div>
                                <span class="font-bold">Paket 12 Jam</span>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="w-6 h-6 rounded-full bg-black/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <div class="w-2 h-2 rounded-full bg-black"></div>
                                </div>
                                <span class="font-bold">Full Day</span>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="w-6 h-6 rounded-full bg-black/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <div class="w-2 h-2 rounded-full bg-black"></div>
                                </div>
                                <span class="font-bold">Drop Off</span>
                            </div>
                        </div>
                    </div>

                    <!-- Pricing Card -->
                    <div class="wow animate__animated animate__fadeInRight animate__delay-100ms bg-[#1a1a1a] border border-brand-yellow/30 rounded-2xl p-8">
                        <h3 class="text-xl font-bold uppercase text-white mb-4">Informasi Tarif</h3>
                        <p class="text-gray-400 text-sm mb-6">Untuk informasi harga dan ketersediaan, silakan hubungi admin kami.</p>

                        @php
                        $whatsapp = get_site_whatsapp();
                        $phone = get_site_phone();
                        $email = get_site_email();
                        $hasContact = $whatsapp || $phone || $email;
                        @endphp

                        @if($hasContact)
                        @if($whatsapp)
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $whatsapp) }}?text={{ urlencode('Halo, saya ingin menanyakan tarif sewa untuk ' . $car->name) }}"
                            target="_blank"
                            class="block w-full bg-brand-yellow text-black text-center px-6 py-4 rounded-xl font-bold uppercase hover:bg-white transition-all mb-3">
                            <i class="fab fa-whatsapp mr-2"></i> Tanya Harga
                        </a>
                        @endif

                        @if($phone)
                        <a href="tel:{{ $phone }}"
                            class="block w-full bg-white/5 text-white text-center border border-white/10 px-6 py-4 rounded-xl font-bold uppercase hover:bg-white/10 transition-all mb-3">
                            Call: {{ $phone }}
                        </a>
                        @endif

                        @if($email)
                        <a href="mailto:{{ $email }}"
                            class="block w-full bg-white/5 text-white text-center border border-white/10 px-6 py-4 rounded-xl font-bold uppercase hover:bg-white/10 transition-all">
                            <i class="fas fa-envelope mr-2"></i> Email Us
                        </a>
                        @endif
                        @else
                        <a href="{{ route('contact') }}"
                            class="block w-full bg-brand-yellow text-black text-center px-6 py-4 rounded-xl font-bold uppercase hover:bg-white transition-all">
                            Contact Us
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Other Cars Section -->
<section class="py-24 bg-brand-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h5 class="text-brand-yellow font-bold uppercase tracking-widest mb-2">Explore More</h5>
            <h2 class="text-4xl md:text-5xl font-bold uppercase text-white">Mobil <span class="text-brand-yellow">Lainnya</span></h2>
        </div>

        @php
        $otherCars = \App\Models\Car::where('id', '!=', $car->id)->latest()->limit(3)->get();
        @endphp

        @if($otherCars->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($otherCars as $index => $otherCar)
            <a href="{{ route('cars.show', $otherCar->slug) }}" class="wow animate__animated animate__fadeInUp {{ $index > 0 ? 'animate__delay-100ms' : '' }} bg-brand-dark/50 border border-brand-yellow/30 group rounded-3xl overflow-hidden hover:border-brand-yellow/60 transition-all block">
                <div class="overflow-hidden relative h-64">
                    @if($otherCar->image && file_exists(public_path('storage/' . $otherCar->image)))
                    <img src="{{ $otherCar->image_url }}"
                        alt="{{ $otherCar->name }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    @else
                    <div class="w-full h-full flex items-center justify-center bg-gray-900">
                        <i class="fas fa-car text-5xl text-gray-700"></i>
                    </div>
                    @endif
                </div>

                <div class="p-6">
                    <h3 class="text-xl font-bold uppercase mb-2 text-white group-hover:text-brand-yellow transition-colors">{{ $otherCar->name }}</h3>
                    <p class="text-gray-400 text-sm">Klik untuk lihat detail</p>
                </div>
            </a>
            @endforeach
        </div>
        @endif

        <div class="text-center mt-12">
            <a href="{{ route('cars.index') }}" class="inline-block border-2 border-brand-yellow text-brand-yellow px-10 py-4 rounded-xl font-bold uppercase hover:bg-brand-yellow hover:text-black transition-all">
                Lihat Semua Armada
            </a>
        </div>
    </div>
</section>
@endsection