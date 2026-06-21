<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoGallery extends Model
{
    protected $fillable = [
        'name',
        'description',
        'yt_url',
        'is_published'
    ];
}
