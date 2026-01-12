{{-- SEO Meta Tags --}}
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

{{-- Title --}}
<title>@yield('meta_title', config('app.name') . ' - Sewa Mobil Premium Jakarta')</title>

{{-- Meta Description --}}
<meta name="description" content="@yield('meta_description', 'Sewa mobil premium di Jakarta dengan harga terbaik. Armada terbaru, driver profesional, layanan 24/7. Alphard, Fortuner, Innova tersedia.')">

{{-- Keywords --}}
<meta name="keywords" content="@yield('meta_keywords', 'sewa mobil jakarta, rental mobil jakarta, sewa alphard, rental fortuner, sewa mobil premium, rental mobil murah jakarta, sewa mobil dengan driver')">

{{-- Canonical URL --}}
<link rel="canonical" href="{{ url()->current() }}">

{{-- Robots --}}
<meta name="robots" content="@yield('meta_robots', 'index, follow')">

{{-- Author & Copyright --}}
<meta name="author" content="{{ get_site_name() }}">
<meta name="copyright" content="{{ get_site_name() }}">

{{-- Geographic Tags --}}
<meta name="geo.region" content="ID-JK">
<meta name="geo.placename" content="Jakarta">
@if(get_site_address())
<meta name="geo.position" content="-6.2088;106.8456">
<meta name="ICBM" content="-6.2088, 106.8456">
@endif

{{-- Open Graph / Facebook --}}
<meta property="og:type" content="@yield('og_type', 'website')">
<meta property="og:site_name" content="{{ get_site_name() }}">
<meta property="og:title" content="@yield('og_title', config('app.name') . ' - Sewa Mobil Premium Jakarta')">
<meta property="og:description" content="@yield('og_description', 'Sewa mobil premium di Jakarta dengan harga terbaik. Armada terbaru, driver profesional, layanan 24/7.')">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="@yield('og_image', asset('assets/img/og-default.jpg'))">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:locale" content="id_ID">

{{-- Twitter Card --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="@yield('twitter_title', config('app.name') . ' - Sewa Mobil Premium Jakarta')">
<meta name="twitter:description" content="@yield('twitter_description', 'Sewa mobil premium di Jakarta dengan harga terbaik. Armada terbaru, driver profesional, layanan 24/7.')">
<meta name="twitter:image" content="@yield('twitter_image', asset('assets/img/og-default.jpg'))">
@if(get_social_media()['twitter'])
<meta name="twitter:site" content="{{ get_social_media()['twitter'] }}">
@endif

{{-- Additional Meta Tags --}}
<meta name="theme-color" content="#D4AF37">
<meta name="msapplication-TileColor" content="#000000">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">