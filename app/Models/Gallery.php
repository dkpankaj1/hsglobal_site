<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_published'
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function images()
    {
        return $this->hasMany(GalleryImage::class);
    }
}
