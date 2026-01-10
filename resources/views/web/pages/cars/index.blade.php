    @extends('web.layouts.app')

@section('title', 'Our Fleet - Premium Car Rental')

@section('content')
<!-- Hero Section -->
<section class="relative h-[60vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset('assets/img/banner.png') }}" alt="Our Fleet" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/50 to-black"></div>
    </div>

    <div class="relative z-10 text-center px-4 max-w-4xl mx-auto">
        <h5 class="wow animate__animated animate__fadeInDown text-brand-yellow font-bold uppercase tracking-[0.3em] mb-4">Choose Your Ride</h5>
        <h1 class="wow animate__animated animate__fadeInUp text-5xl md:text-7xl font-bold uppercase text-white mb-6">Explore Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-yellow to-yellow-600">Premium Fleet</span></h1>
        <p class="wow animate__animated animate__fadeInUp animate__delay-1s text-gray-300 text-lg md:text-xl max-w-2xl mx-auto">
            Temukan kendaraan sempurna untuk perjalanan Anda. Dari MPV mewah hingga SUV tangguh, kami menyediakan armada terbaik dengan standar perawatan tertinggi.
        </p>
    </div>
</section>

<!-- Search & Filter Section -->
<section class="relative -mt-16 z-20 pb-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-[#151515] border border-white/5 rounded-2xl p-6 md:p-10 shadow-2xl backdrop-blur-sm wow animate__animated animate__fadeInUp">
            <form action="" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-6 items-end">
                <div class="col-span-1 md:col-span-3">
                    <label for="search" class="block text-brand-yellow font-bold text-sm uppercase tracking-wider mb-2">Cari Mobil</label>
                    <div class="relative">
                        <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                        <input type="text" id="search" name="search" value="{{ $searchTerm ?? '' }}" placeholder="Contoh: Alphard, Fortuner..."
                            class="w-full bg-black/50 border border-white/10 rounded-xl py-4 pl-12 pr-4 text-white focus:outline-none focus:border-brand-yellow focus:ring-1 focus:ring-brand-yellow transition-all placeholder-gray-600">
                    </div>
                </div>
                <div>
                    <button type="submit" class="w-full bg-brand-yellow text-black font-bold uppercase tracking-wider py-4 rounded-xl hover:bg-white transition-all transform hover:-translate-y-1 shadow-lg shadow-brand-yellow/20 flex items-center justify-center gap-2">
                        <i class="fas fa-filter"></i> Filter
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Cars Grid Section -->
<section class="pb-24 bg-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="flex justify-between items-center mb-10 border-b border-white/10 pb-4">
            <h3 class="text-2xl font-bold text-white uppercase">
                <span class="text-brand-yellow">{{ count($cars) }}</span> Mobil Tersedia
                @if($searchTerm)
                <span class="text-gray-400 text-base normal-case font-normal ml-2">untuk "{{ $searchTerm }}"</span>
                @endif
            </h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($cars as $index => $car)
            <div class="wow animate__animated animate__fadeInUp {{ $index > 2 ? 'animate__delay-100ms' : '' }} bg-brand-dark/50 border border-brand-yellow/30 group rounded-3xl overflow-hidden hover:border-brand-yellow/60 transition-all">
                <!-- Image Area -->
                <div class="overflow-hidden relative h-64">
                    @if($car->image && file_exists(public_path('storage/' . $car->image)))
                    <img src="{{ $car->image_url }}"
                        alt="{{ $car->name }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    @else
                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-900 to-black">
                        <div class="text-center">
                            <i class="fas fa-car text-5xl text-gray-700 mb-3"></i>
                            <p class="text-gray-600 text-sm font-bold">{{ $car->name }}</p>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Content Area -->
                <div class="p-8">
                    <h3 class="text-2xl font-bold uppercase mb-2 text-white group-hover:text-brand-yellow transition-colors">{{ $car->name }}</h3>
                    <p class="text-brand-yellow font-bold text-sm mb-4">Paket 12 Jam, Full Day & Drop Off</p>

                    <div class="border-b border-brand-yellow/10 pb-4 mb-4">
                        <span class="text-gray-400 text-xs uppercase tracking-wider block mb-1">Mobil - Jasa Driver - BBM</span>
                        <span class="text-lg font-bold text-white block">Tarif sewa chat Admin</span>
                    </div>

                    <div class="flex flex-col gap-3">
                        <a href="{{ route('cars.show', $car->slug) }}" class="bg-white text-black px-8 py-3 rounded-xl font-bold uppercase hover:bg-brand-yellow transition-all w-full text-center">
                            Lihat Detail
                        </a>
                        @php
                        $whatsapp = get_site_whatsapp();
                        $orderUrl = $whatsapp
                        ? 'https://wa.me/' . preg_replace('/[^0-9]/', '', $whatsapp) . '?text=' . urlencode('Halo, saya tertarik untuk menyewa mobil ' . $car->name)
                        : route('contact');
                        @endphp
                        <a href="{{ $orderUrl }}" target="{{ $whatsapp ? '_blank' : '_self' }}" class="bg-brand-yellow text-black px-8 py-3 rounded-xl font-bold uppercase hover:bg-white transition-all w-full text-center flex items-center justify-center gap-2">
                            <i class="fab fa-whatsapp"></i> Order Now
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-20">
                <div class="inline-block p-6 rounded-full bg-white/5 mb-4">
                    <i class="fas fa-search text-4xl text-gray-500"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Mobil Tidak Ditemukan</h3>
                @if($searchTerm)
                <p class="text-gray-400 mb-4">Maaf, kami tidak dapat menemukan mobil dengan kata kunci "<span class="text-brand-yellow font-semibold">{{ $searchTerm }}</span>".</p>
                <a href="{{ route('cars.index') }}" class="inline-block bg-brand-yellow text-black px-6 py-3 rounded-xl font-bold uppercase hover:bg-white transition-all">
                    <i class="fas fa-redo mr-2"></i>Lihat Semua Mobil
                </a>
                @else
                <p class="text-gray-400">Maaf, saat ini belum ada mobil yang tersedia.</p>
                @endif
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-20 bg-brand-yellow relative overflow-hidden">
    <!-- Pattern Background -->
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#000 1px, transparent 1px); background-size: 20px 20px;"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <h2 class="text-3xl md:text-5xl font-bold text-black uppercase mb-6">Butuh Rekomendasi Khusus?</h2>
        <p class="text-black/80 text-xl max-w-2xl mx-auto mb-10 font-medium">Tim kami siap membantu Anda memilih kendaraan terbaik sesuai kebutuhan perjalanan dan budget Anda.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            @php
            $whatsapp = get_site_whatsapp();
            @endphp
            @if($whatsapp)
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $whatsapp) }}" target="_blank" class="bg-black text-white px-8 py-4 rounded-xl font-bold uppercase hover:bg-gray-900 transition-all flex items-center justify-center gap-3">
                <i class="fab fa-whatsapp text-xl"></i> Chat WhatsApp
            </a>
            @endif
            <a href="{{ route('contact') }}" class="bg-white text-black px-8 py-4 rounded-xl font-bold uppercase hover:bg-gray-100 transition-all">
                Hubungi Kami
            </a>
        </div>
    </div>
</section>
@endsection