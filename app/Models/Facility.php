<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Facility extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'sort_description',
        'description',
        'thumbnail',
        'highlights',
        'is_publish',
    ];

    protected function casts(): array
    {
        return [
            'is_publish' => 'boolean',
            'highlights' => 'array',
        ];
    }

    public function getThumbnailUrlAttribute(): string
    {
        return $this->thumbnail
            ? asset($this->thumbnail)
            : asset('static/images/facilities_1.jpg');
    }

    public function getRouteAttribute(): string
    {
        return route('facilities.show', $this->slug);
    }

    protected static function booted(): void
    {
        static::creating(function (Facility $facility) {
            if (empty($facility->slug)) {
                $facility->slug = static::generateUniqueSlug($facility->name);
            }
        });

        static::updating(function (Facility $facility) {
            if ($facility->isDirty('name') && !$facility->isDirty('slug')) {
                $facility->slug = static::generateUniqueSlug($facility->name, $facility->id);
            }
        });
    }

    public static function generateUniqueSlug(string $name, ?int $excludeId = null): string
    {
        $slug = Str::slug($name);
        $original = $slug;
        $counter = 1;

        while (
            static::where('slug', $slug)
            ->when($excludeId, fn($q) => $q->where('id', '!=', $excludeId))
            ->exists()
        ) {
            $slug = $original . '-' . $counter++;
        }

        return $slug;
    }
}
