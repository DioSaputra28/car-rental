<div
    x-data="{
        hasMore: @entangle('hasMore'),
        isLoading: false,
        observer: null,
        
        init() {
            this.setupObserver();
        },
        
        setupObserver() {
            // Disconnect old observer if exists
            if (this.observer) {
                this.observer.disconnect();
            }
            
            // Create new observer
            this.observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting && this.hasMore && !this.isLoading) {
                        this.loadMore();
                    }
                });
            }, {
                rootMargin: '300px'
            });
            
            // Observe the trigger element
            if (this.$refs.loadMore) {
                this.observer.observe(this.$refs.loadMore);
            }
        },
        
        loadMore() {
            this.isLoading = true;
            @this.call('loadMore').then(() => {
                this.isLoading = false;
                // Re-setup observer after DOM update
                this.$nextTick(() => {
                    this.setupObserver();
                });
            });
        }
    }"
    x-init="$watch('hasMore', () => $nextTick(() => setupObserver()))"
    class="grid grid-cols-2 md:grid-cols-4 gap-4">

    @forelse($galleries as $index => $gallery)
    <div class="gallery-item hover:brightness-110 transition-all" wire:key="gallery-{{ $gallery['id'] ?? $index }}">
        <a href="{{ $gallery['url'] }}"
            data-fancybox="gallery"
            data-caption="Gallery {{ $index + 1 }}">
            <img src="{{ $gallery['url'] }}"
                alt="Gallery {{ $index + 1 }}"
                class="w-full h-64 object-cover grayscale hover:grayscale-0 transition-all duration-700 border-2 border-brand-yellow/10"
                loading="lazy">
        </a>
    </div>
    @empty
    <div class="col-span-4 text-center py-12">
        <p class="text-gray-400 text-lg">Belum ada foto gallery yang tersedia.</p>
    </div>
    @endforelse

    <!-- Loading Trigger -->
    <div x-ref="loadMore" class="col-span-4 text-center py-8">
        <div x-show="isLoading && hasMore" class="inline-flex items-center gap-3 bg-brand-yellow/10 px-8 py-4 rounded-xl border border-brand-yellow/20">
            <div class="animate-spin rounded-full h-6 w-6 border-b-2 border-brand-yellow"></div>
            <span class="text-brand-yellow font-bold uppercase">Loading more...</span>
        </div>
        <p x-show="!hasMore" class="text-gray-400 text-lg">You've reached the end of our gallery</p>
    </div>
</div>