<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Galery extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'galeries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'path',
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
     * Get the full URL of the gallery image.
     */
    public function getUrlAttribute(): string
    {
        if (empty($this->path)) {
            return asset('images/placeholder-gallery.jpg');
        }

        return asset('storage/' . $this->path);
    }

    /**
     * Scope a query to only include featured gallery images.
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
            if ($model->isDirty('path')) {
                $oldPath = $model->getOriginal('path');
                if ($oldPath && $model->path !== $oldPath) {
                    if (Storage::disk('public')->exists($oldPath)) {
                        Storage::disk('public')->delete($oldPath);
                    }
                }
            }
        });

        static::deleted(function (self $model) {
            if ($model->path) {
                if (Storage::disk('public')->exists($model->path)) {
                    Storage::disk('public')->delete($model->path);
                }
            }
        });
    }
}
