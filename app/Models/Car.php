<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Car extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'is_featured',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
        ];
    }

    /**
     * Get all images for the car.
     */
    public function images(): HasMany
    {
        return $this->hasMany(CarImage::class);
    }

    /**
     * Get featured images for the car.
     */
    public function featuredImages(): HasMany
    {
        return $this->hasMany(CarImage::class)->where('is_featured', true);
    }

    /**
     * Get gallery images for the car.
     */
    public function galleryImages(): HasMany
    {
        return $this->hasMany(CarImage::class)->where('is_galery', true);
    }

    /**
     * Get the full URL of the main image.
     */
    public function getImageUrlAttribute(): string
    {
        if (empty($this->image)) {
            return asset('images/placeholder-car.jpg');
        }

        return asset('storage/' . $this->image);
    }

    /**
     * Scope a query to only include featured cars.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Boot the model and register event listeners.
     */
    protected static function booted(): void
    {
        static::updated(function (self $model) {
            if ($model->isDirty('image')) {
                $oldImage = $model->getOriginal('image');
                if ($oldImage && $model->image !== $oldImage) {
                    if (Storage::disk('public')->exists($oldImage)) {
                        Storage::disk('public')->delete($oldImage);
                    }
                }
            }
        });

        static::deleted(function (self $model) {
            if ($model->image) {
                if (Storage::disk('public')->exists($model->image)) {
                    Storage::disk('public')->delete($model->image);
                }
            }

            foreach ($model->images as $image) {
                if ($image->path) {
                    if (Storage::disk('public')->exists($image->path)) {
                        Storage::disk('public')->delete($image->path);
                    }
                }
            }
        });
    }
}
