<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolAuthority extends Model
{
    protected $fillable = [
        'name',
        'role',
        'photo',
        'message',
        'short_description',
        'is_published',
    ];

    protected $casts = [
        'is_published'  => 'boolean',
    ];

    public function getPhotoUrlAttribute(): string
    {
        return $this->photo
            ? asset($this->photo)
            : asset('static/images/director.jpg');
    }
}
