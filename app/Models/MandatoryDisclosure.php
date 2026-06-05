<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MandatoryDisclosure extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'document',
        'token',
        'is_public',
    ];

    protected static function booted(): void
    {
        static::creating(function (MandatoryDisclosure $disclosure) {
            if (empty($disclosure->token)) {
                $disclosure->token = (string) Str::uuid();
            }
        });
    }

    protected function casts(): array
    {
        return [
            'is_public' => 'boolean',
        ];
    }

    /**
     * Get the URL for the stored document.
     */
    public function getDocumentUrlAttribute(): ?string
    {
        if (empty($this->document)) {
            return null;
        }

        return asset('upload/' . $this->document);
    }

    /**
     * Check if the stored document is a PDF.
     */
    public function getIsPdfAttribute(): bool
    {
        if (empty($this->document)) {
            return false;
        }

        return strtolower(pathinfo($this->document, PATHINFO_EXTENSION)) === 'pdf';
    }
}
