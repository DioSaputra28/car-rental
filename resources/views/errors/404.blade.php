@extends('web.layouts.app')

@section('meta_title', '404 - Halaman Tidak Ditemukan | ' . get_site_name())
@section('meta_description', 'Halaman yang Anda cari tidak ditemukan. Kembali ke halaman utama atau lihat armada mobil premium kami.')
@section('meta_robots', 'noindex, nofollow')

@section('og_title', '404 - Halaman Tidak Ditemukan')
@section('og_description', 'Halaman tidak ditemukan. Kembali ke halaman utama.')

@section('content')
<!-- 404 Error Section -->
<section class="relative min-h-screen bg-black pt-32 pb-20 flex items-center justify-center">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <!-- 404 Number -->
            <div class="wow animate__animated animate__zoomIn mb-8">
                <h1 class="text-[180px] md:text-[280px] font-bold leading-none text-transparent bg-clip-text bg-gradient-to-r from-brand-yellow via-white to-brand-yellow opacity-20">
                    404
                </h1>
            </div>

            <!-- Error Message -->
            <div class="wow animate__animated animate__fadeInUp animate__delay-1s -mt-32 md:-mt-48 relative z-10">
                <div class="inline-block mb-6">
                    <div class="flex items-center justify-center gap-4 mb-4">
                        <span class="w-16 h-px bg-brand-yellow"></span>
                        <i class="fas fa-exclamation-triangle text-brand-yellow text-4xl"></i>
                        <span class="w-16 h-px bg-brand-yellow"></span>
                    </div>
                </div>

                <h2 class="text-4xl md:text-6xl font-bold uppercase mb-6 text-white">
                    HALAMAN TIDAK <span class="text-brand-yellow">DITEMUKAN</span>
                </h2>

                <p class="text-gray-400 text-lg md:text-xl mb-4 max-w-2xl mx-auto leading-relaxed">
                    Maaf, halaman yang Anda cari tidak dapat ditemukan atau telah dipindahkan.
                </p>

                <p class="text-gray-500 text-base mb-12 max-w-xl mx-auto">
                    Sepertinya Anda tersesat di jalan yang salah. Mari kita arahkan Anda kembali ke jalur yang benar!
                </p>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="{{ route('home') }}" class="bg-brand-yellow text-black px-10 py-4 rounded-xl font-bold uppercase hover:bg-white transition-all transform hover:-translate-y-1 shadow-lg shadow-brand-yellow/20 flex items-center gap-3">
                        <i class="fas fa-home"></i>
                        Kembali ke Home
                    </a>
                    <a href="{{ route('cars.index') }}" class="border-2 border-brand-yellow text-brand-yellow px-10 py-4 rounded-xl font-bold uppercase hover:bg-brand-yellow hover:text-black transition-all transform hover:-translate-y-1 flex items-center gap-3">
                        <i class="fas fa-car"></i>
                        Lihat Mobil
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quick Links Section -->
<section class="py-16 bg-brand-dark border-t border-brand-yellow/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h3 class="text-2xl md:text-3xl font-bold uppercase text-white mb-2">
                Mungkin Anda <span class="text-brand-yellow">Mencari Ini?</span>
            </h3>
            <p class="text-gray-400">Berikut adalah beberapa halaman populer yang mungkin Anda butuhkan</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Quick Link 1 -->
            <a href="{{ route('home') }}" class="group bg-black/50 border border-brand-yellow/20 rounded-xl p-6 hover:border-brand-yellow/50 transition-all transform hover:-translate-y-2">
                <div class="text-center">
                    <div class="w-16 h-16 bg-brand-yellow/10 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-brand-yellow/20 transition-colors">
                        <i class="fas fa-home text-brand-yellow text-2xl"></i>
                    </div>
                    <h4 class="font-bold uppercase text-white mb-2">Home</h4>
                    <p class="text-gray-400 text-sm">Kembali ke halaman utama</p>
                </div>
            </a>

            <!-- Quick Link 2 -->
            <a href="{{ route('cars.index') }}" class="group bg-black/50 border border-brand-yellow/20 rounded-xl p-6 hover:border-brand-yellow/50 transition-all transform hover:-translate-y-2">
                <div class="text-center">
                    <div class="w-16 h-16 bg-brand-yellow/10 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-brand-yellow/20 transition-colors">
                        <i class="fas fa-car text-brand-yellow text-2xl"></i>
                    </div>
                    <h4 class="font-bold uppercase text-white mb-2">Mobil</h4>
                    <p class="text-gray-400 text-sm">Lihat armada mobil kami</p>
                </div>
            </a>

            <!-- Quick Link 3 -->
            <a href="{{ route('galery') }}" class="group bg-black/50 border border-brand-yellow/20 rounded-xl p-6 hover:border-brand-yellow/50 transition-all transform hover:-translate-y-2">
                <div class="text-center">
                    <div class="w-16 h-16 bg-brand-yellow/10 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-brand-yellow/20 transition-colors">
                        <i class="fas fa-images text-brand-yellow text-2xl"></i>
                    </div>
                    <h4 class="font-bold uppercase text-white mb-2">Galeri</h4>
                    <p class="text-gray-400 text-sm">Lihat galeri foto kami</p>
                </div>
            </a>

            <!-- Quick Link 4 -->
            <a href="{{ route('contact') }}" class="group bg-black/50 border border-brand-yellow/20 rounded-xl p-6 hover:border-brand-yellow/50 transition-all transform hover:-translate-y-2">
                <div class="text-center">
                    <div class="w-16 h-16 bg-brand-yellow/10 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-brand-yellow/20 transition-colors">
                        <i class="fas fa-phone text-brand-yellow text-2xl"></i>
                    </div>
                    <h4 class="font-bold uppercase text-white mb-2">Kontak</h4>
                    <p class="text-gray-400 text-sm">Hubungi kami sekarang</p>
                </div>
            </a>
        </div>
    </div>
</section>
@endsection