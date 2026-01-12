@extends('web.layouts.app')

@section('meta_title', 'Hubungi Kami - ' . get_site_name() . ' | Kontak Rental Mobil Jakarta')
@section('meta_description', 'Hubungi ' . get_site_name() . ' untuk informasi sewa mobil premium di Jakarta. Layanan customer service 24/7 siap membantu Anda. Chat WhatsApp, telepon, atau kunjungi showroom kami.')
@section('meta_keywords', 'kontak, hubungi kami, customer service, booking mobil, whatsapp rental mobil')

@section('og_title', 'Hubungi ' . get_site_name() . ' - Rental Mobil Premium Jakarta')
@section('og_description', 'Customer service 24/7 siap melayani. Booking mudah via WhatsApp atau telepon.')
@section('og_image', asset('assets/img/about_hero.png'))

@section('content')
<!-- Contact Section -->
<section id="kontak" class="py-24 bg-brand-dark mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-16">
            <!-- Contact Info & Form -->
            <div class="wow animate__animated animate__fadeInLeft">
                <h5 class="text-brand-yellow font-bold uppercase tracking-widest mb-2">Get In Touch</h5>
                <h2 class="text-4xl md:text-5xl font-bold uppercase mb-12">CONNECT WITH <span class="text-brand-yellow">US</span></h2>

                <!-- WhatsApp Form -->
                <form id="contactForm" class="space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <input type="text" id="name" name="name" placeholder="Full Name" required class="w-full bg-black border border-brand-yellow/20 p-4 rounded-xl focus:border-brand-yellow outline-none transition-all text-white">
                        <input type="email" id="email" name="email" placeholder="Email Address" class="w-full bg-black border border-brand-yellow/20 p-4 rounded-xl focus:border-brand-yellow outline-none transition-all text-white">
                    </div>
                    <input type="tel" id="phone" name="phone" placeholder="Phone Number" class="w-full bg-black border border-brand-yellow/20 p-4 rounded-xl focus:border-brand-yellow outline-none transition-all text-white">
                    <textarea rows="5" id="message" name="message" placeholder="Your Message" required class="w-full bg-black border border-brand-yellow/20 p-4 rounded-xl focus:border-brand-yellow outline-none transition-all text-white"></textarea>
                    <button type="submit" class="bg-brand-yellow text-black px-12 py-4 rounded-xl font-bold uppercase hover:bg-white transition-all w-full md:w-auto flex items-center justify-center gap-2">
                        <i class="fab fa-whatsapp"></i> Send via WhatsApp
                    </button>
                </form>

                <!-- Contact Info Grid -->
                <div class="mt-12 space-y-6">
                    @if(get_site_address())
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-full bg-brand-yellow/10 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-brand-yellow"></i>
                        </div>
                        <div>
                            <h4 class="text-brand-yellow font-bold uppercase mb-2">Address</h4>
                            <p class="text-gray-400">{{ get_site_address() }}</p>
                        </div>
                    </div>
                    @endif

                    @if(get_site_phone())
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-full bg-brand-yellow/10 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-phone text-brand-yellow"></i>
                        </div>
                        <div>
                            <h4 class="text-brand-yellow font-bold uppercase mb-2">Phone</h4>
                            <a href="tel:{{ get_site_phone() }}" class="text-gray-400 hover:text-brand-yellow transition-colors">{{ get_site_phone() }}</a>
                        </div>
                    </div>
                    @endif

                    @if(get_site_email())
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-full bg-brand-yellow/10 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-envelope text-brand-yellow"></i>
                        </div>
                        <div>
                            <h4 class="text-brand-yellow font-bold uppercase mb-2">Email</h4>
                            <a href="mailto:{{ get_site_email() }}" class="text-gray-400 hover:text-brand-yellow transition-colors">{{ get_site_email() }}</a>
                        </div>
                    </div>
                    @endif

                    @if(settings()->business_hours)
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-full bg-brand-yellow/10 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-clock text-brand-yellow"></i>
                        </div>
                        <div>
                            <h4 class="text-brand-yellow font-bold uppercase mb-2">Business Hours</h4>
                            <p class="text-gray-400">{{ settings()->business_hours }}</p>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Social Media -->
                @php
                $socials = [
                'facebook' => ['url' => settings()->site_facebook_url, 'icon' => 'fab fa-facebook-f'],
                'instagram' => ['url' => settings()->site_instagram_url, 'icon' => 'fab fa-instagram'],
                'twitter' => ['url' => settings()->site_twitter_url, 'icon' => 'fab fa-twitter'],
                'tiktok' => ['url' => settings()->site_tiktok_url, 'icon' => 'fab fa-tiktok'],
                'youtube' => ['url' => settings()->site_youtube_url, 'icon' => 'fab fa-youtube'],
                ];
                $hasSocials = collect($socials)->filter(fn($s) => !empty($s['url']))->isNotEmpty();
                @endphp

                @if($hasSocials)
                <div class="mt-8 pt-8 border-t border-white/10">
                    <h4 class="text-white font-bold uppercase mb-4">Follow Us</h4>
                    <div class="flex gap-3">
                        @foreach($socials as $name => $social)
                        @if($social['url'])
                        <a href="{{ $social['url'] }}" target="_blank" class="w-10 h-10 rounded-full border border-brand-yellow/20 flex items-center justify-center text-white hover:bg-brand-yellow hover:text-black transition-all">
                            <i class="{{ $social['icon'] }} text-sm"></i>
                        </a>
                        @endif
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <!-- Google Maps -->
            @if(settings()->site_google_maps_embed)
            <div class="wow animate__animated animate__fadeInRight h-[500px] md:h-auto border-4 border-brand-yellow/10 rounded-2xl overflow-hidden">
                <iframe
                    src="{{ settings()->site_google_maps_embed }}"
                    class="w-full h-full border-0"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const phone = document.getElementById('phone').value;
        const message = document.getElementById('message').value;

        // Build WhatsApp message
        let waMessage = `*Pesan dari Website*\n\n`;
        waMessage += `*Nama:* ${name}\n`;
        if (email) waMessage += `*Email:* ${email}\n`;
        if (phone) waMessage += `*Telepon:* ${phone}\n`;
        waMessage += `\n*Pesan:*\n${message}`;

        // Get WhatsApp number from settings
        const whatsappNumber = '{{ get_site_whatsapp() }}';

        if (!whatsappNumber) {
            alert('WhatsApp number not configured. Please contact us via phone or email.');
            return;
        }

        // Clean WhatsApp number (remove non-digits)
        const cleanNumber = whatsappNumber.replace(/[^0-9]/g, '');

        // Open WhatsApp
        const waUrl = `https://wa.me/${cleanNumber}?text=${encodeURIComponent(waMessage)}`;
        window.open(waUrl, '_blank');

        // Reset form
        this.reset();
    });
</script>
@endpush