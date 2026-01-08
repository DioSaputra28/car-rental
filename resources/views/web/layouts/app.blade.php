<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Premium Car Rental | Luxury & Performance')</title>

    <!-- Tailwind CSS & JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- WOW.js Animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

    <!-- Swiper Slider -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- Fancybox 6 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.1/dist/fancybox/fancybox.css">
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.1/dist/fancybox/fancybox.umd.js"></script>

    @stack('styles')
</head>

<body class="overflow-x-hidden">

    @include('web.layouts.partials.header')

    @yield('content')

    @include('web.layouts.partials.footer')

    @include('web.layouts.partials.floating-buttons')

    <!-- Custom Scripts -->
    <script>
        // Initialize WOW.js
        new WOW().init();

        // Initialize Fancybox
        Fancybox.bind('[data-fancybox]', {
            // Options
            Carousel: {
                infinite: true,
            },
            Toolbar: {
                display: {
                    left: ["infobar"],
                    middle: ["zoomIn", "zoomOut", "toggle1to1", "rotateCCW", "rotateCW", "flipX", "flipY"],
                    right: ["slideshow", "thumbs", "close"],
                },
            },
        });

        // Mobile Menu Toggle
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');

        if (btn && menu) {
            btn.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });
        }

        // Sticky Navbar and Top Bar Effect
        const topBar = document.getElementById('top-bar');
        const nav = document.getElementById('main-nav');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 20) {
                if (topBar) topBar.classList.add('-translate-y-full', 'opacity-0');
                if (nav) {
                    nav.classList.add('py-2', 'bg-black', 'md:top-0');
                    nav.classList.remove('py-4', 'md:top-8');
                }
            } else {
                if (topBar) topBar.classList.remove('-translate-y-full', 'opacity-0');
                if (nav) {
                    nav.classList.remove('py-2', 'bg-black', 'md:top-0');
                    nav.classList.add('py-4', 'md:top-8');
                }
            }
        });
    </script>

    @stack('scripts')
</body>

</html>