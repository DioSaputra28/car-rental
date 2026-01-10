<!-- Floating Contact Buttons -->
<div class="fixed bottom-8 right-8 z-[100] flex flex-col gap-4">
    @if(get_site_phone())
    <!-- Phone Button -->
    <a href="tel:{{ get_site_phone() }}" class="w-14 h-14 bg-white text-black rounded-full flex items-center justify-center shadow-2xl hover:bg-brand-yellow transition-all duration-300 group transform hover:scale-110">
        <i class="fas fa-phone text-xl animate-pulse group-hover:animate-none"></i>
        <span class="absolute right-16 bg-white text-black px-4 py-2 rounded-lg text-sm font-bold opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none shadow-lg border border-gray-100">Call Us</span>
    </a>
    @endif

    @if(get_site_whatsapp())
    <!-- WhatsApp Button -->
    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', get_site_whatsapp()) }}" target="_blank" class="w-14 h-14 bg-[#25D366] text-white rounded-full flex items-center justify-center shadow-2xl hover:bg-white hover:text-[#25D366] transition-all duration-300 group transform hover:scale-110 border-2 border-[#25D366]">
        <i class="fab fa-whatsapp text-3xl"></i>
        <span class="absolute right-16 bg-white text-[#25D366] px-4 py-2 rounded-lg text-sm font-bold opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none shadow-lg border border-gray-100">WhatsApp</span>
    </a>
    @endif
</div>