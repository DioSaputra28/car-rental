@extends('web.layouts.app')

@section('title', 'Gallery - Premium Car Rental')

@section('content')
<!-- Gallery Section -->
<section id="gallery" class="py-24 bg-black mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h5 class="text-brand-yellow font-bold uppercase tracking-widest mb-2">Moments</h5>
            <h2 class="text-4xl md:text-5xl font-bold uppercase">OUR <span class="text-brand-yellow">GALLERY</span></h2>
        </div>

        <!-- Livewire Infinite Scroll Component -->
        @livewire('gallery-infinite-scroll')
    </div>
</section>
@endsection