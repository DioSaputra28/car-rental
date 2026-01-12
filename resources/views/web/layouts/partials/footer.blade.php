<!-- Footer -->
<footer class="pt-20 pb-10 bg-black border-t border-brand-yellow/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
            <!-- Company Info -->
            <div class="space-y-6">
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <div class="h-12 max-h-12 max-w-[180px] flex items-center justify-start">
                        <img src="{{ get_site_logo_url() ?? asset('assets/img/logo.png') }}"
                            alt="{{ get_site_name() }}"
                            class="max-h-full max-w-full w-auto h-auto object-contain">
                    </div>
                </a>
                <p class="text-gray-400 leading-relaxed">
                    Penyedia layanan sewa mobil premium terpercaya dengan armada terbaru dan pelayanan profesional untuk perjalanan Anda.
                </p>
                <div class="flex space-x-4">
                    @if(get_social_media()['facebook'])
                    <a href="{{ get_social_media()['facebook'] }}" target="_blank" class="w-10 h-10 rounded-full border border-brand-yellow/20 flex items-center justify-center text-white hover:bg-brand-yellow hover:text-black transition-all"><i class="fab fa-facebook-f text-sm"></i></a>
                    @endif
                    @if(get_social_media()['instagram'])
                    <a href="{{ get_social_media()['instagram'] }}" target="_blank" class="w-10 h-10 rounded-full border border-brand-yellow/20 flex items-center justify-center text-white hover:bg-brand-yellow hover:text-black transition-all"><i class="fab fa-instagram text-sm"></i></a>
                    @endif
                    @if(get_site_whatsapp())
                    <a href="https://wa.me/{{ get_site_whatsapp() }}" target="_blank" class="w-10 h-10 rounded-full border border-brand-yellow/20 flex items-center justify-center text-white hover:bg-brand-yellow hover:text-black transition-all"><i class="fab fa-whatsapp text-sm"></i></a>
                    @endif
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-white font-bold uppercase tracking-wider mb-8 flex items-center gap-2">
                    <span class="w-8 h-px bg-brand-yellow"></span> Quick Links
                </h4>
                <ul class="space-y-4">
                    <li><a href="{{ route('home') }}#home" class="text-gray-400 hover:text-brand-yellow transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-[10px]"></i> Home</a></li>
                    <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-brand-yellow transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-[10px]"></i> About Us</a></li>
                    <li><a href="{{ route('cars.index') }}" class="text-gray-400 hover:text-brand-yellow transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-[10px]"></i> Our Fleet</a></li>
                    <li><a href="{{ route('galery') }}" class="text-gray-400 hover:text-brand-yellow transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-[10px]"></i> Gallery</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h4 class="text-white font-bold uppercase tracking-wider mb-8 flex items-center gap-2">
                    <span class="w-8 h-px bg-brand-yellow"></span> Contact Us
                </h4>
                <ul class="space-y-4">
                    @if(get_site_phone())
                    <li class="flex items-start gap-4">
                        <i class="fas fa-phone text-brand-yellow mt-1"></i>
                        <span class="text-gray-400 text-sm">Support: {{ get_site_phone() }}</span>
                    </li>
                    @endif
                    @if(get_site_email())
                    <li class="flex items-start gap-4">
                        <i class="fas fa-envelope text-brand-yellow mt-1"></i>
                        <span class="text-gray-400 text-sm">Email: {{ get_site_email() }}</span>
                    </li>
                    @endif
                    @if(get_business_hours())
                    <li class="flex items-start gap-4">
                        <i class="fas fa-clock text-brand-yellow mt-1"></i>
                        <span class="text-gray-400 text-sm">{{ get_business_hours() }}</span>
                    </li>
                    @endif
                </ul>
            </div>

            <!-- Office Location -->
            <div>
                <h4 class="text-white font-bold uppercase tracking-wider mb-8 flex items-center gap-2">
                    <span class="w-8 h-px bg-brand-yellow"></span> Office
                </h4>
                @if(get_site_address())
                <div class="flex items-start gap-4">
                    <i class="fas fa-map-marker-alt text-brand-yellow mt-1"></i>
                    <address class="text-gray-400 text-sm not-italic leading-relaxed">
                        {!! nl2br(e(get_site_address())) !!}
                    </address>
                </div>
                @endif
            </div>
        </div>

        <div class="pt-8 border-t border-brand-yellow/10 flex flex-col md:flex-row justify-between items-center gap-4 text-center md:text-left">
            <p class="text-gray-500 text-xs">© {{ date('Y') }} {{ strtoupper(get_site_name()) }}. ALL RIGHTS RESERVED.</p>
        </div>
    </div>
</footer>