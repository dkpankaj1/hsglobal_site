<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Override;

class Page extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'content',
        'image',
        'file',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'is_published',
    ];

    #[Override]
    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
        ];
    }

    // ── Accessors ──────────────────────────────────────────────────

    /**
     * Full URL for the page image, with fallback.
     */
    public function getImageUrlAttribute(): string
    {
        return $this->image ? asset($this->image) : asset('static/background/main.jpeg');
    }

    /**
     * Full URL for the attached file, if any.
     */
    public function getFileUrlAttribute(): ?string
    {
        return $this->file ? asset($this->file) : null;
    }

    /**
     * Just the filename portion of the attached file.
     */
    public function getFileNameAttribute(): ?string
    {
        return $this->file ? basename($this->file) : null;
    }

    /**
     * Check if the attached file is a PDF.
     */
    public function getIsPdfAttribute(): bool
    {
        if (empty($this->file)) {
            return false;
        }

        return strtolower(pathinfo($this->file, PATHINFO_EXTENSION)) === 'pdf';
    }

    // ── Scopes ─────────────────────────────────────────────────────

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    // ── Route binding ──────────────────────────────────────────────

    /**
     * Use slug for route model binding.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
