<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class CarImage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'car_id',
        'path',
        'is_galery',
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
            'is_galery' => 'boolean',
            'is_featured' => 'boolean',
        ];
    }

    /**
     * Get the car that owns the image.
     */
    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

    /**
     * Get the full URL of the image.
     */
    public function getUrlAttribute(): string
    {
        if (empty($this->path)) {
            return asset('images/placeholder-car.jpg');
        }

        return asset('storage/' . $this->path);
    }

    /**
     * Scope a query to only include featured images.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope a query to only include gallery images.
     */
    public function scopeGallery($query)
    {
        return $query->where('is_galery', true);
    }

    /**
     * Boot the model and register event listeners.
     */
    protected static function booted(): void
    {
        static::deleted(function (self $model) {
            if ($model->path) {
                if (Storage::disk('public')->exists($model->path)) {
                    Storage::disk('public')->delete($model->path);
                }
            }
        });
    }
}
