<?php

namespace App\Livewire;

use App\Models\CarImage;
use App\Models\Galery;
use Livewire\Component;

class GalleryInfiniteScroll extends Component
{
    public $galleries = [];
    public $perPage = 12;
    public $page = 1;
    public $hasMore = true;

    public function mount()
    {
        $this->loadGalleries();
    }

    public function loadMore()
    {
        $this->page++;
        $this->loadGalleries();

        $this->dispatch('loadMoreComplete');
    }

    private function loadGalleries()
    {
        $galleriesData = Galery::where('is_featured', true)->latest()->get();


        $carGalleryImages = CarImage::where('is_galery', true)
            ->latest()
            ->get();

        $allGalleries = $galleriesData->merge($carGalleryImages)
            ->sortByDesc('created_at')
            ->values();

        $offset = ($this->page - 1) * $this->perPage;
        $paginatedGalleries = $allGalleries->slice($offset, $this->perPage)->values();

        $paginatedArray = $paginatedGalleries->map(function ($gallery) {
            return [
                'url' => $gallery->url,
                'id' => $gallery->id,
            ];
        })->toArray();

        $this->galleries = array_merge($this->galleries, $paginatedArray);

        $this->hasMore = $allGalleries->count() > ($offset + $this->perPage);
    }

    public function render()
    {
        return view('livewire.gallery-infinite-scroll');
    }
}
