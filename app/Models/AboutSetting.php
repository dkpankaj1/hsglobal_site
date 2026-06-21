<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSetting extends Model
{
    protected $fillable = [
        'school_name',
        'established_year',
        'affiliation',
        'affiliation_no',
        'school_no',
        'description',
        'long_description',
        'about_image',
        'highlights',
        'achievements',
    ];

    protected $casts = [
        'highlights'   => 'array',
        'achievements' => 'array',
    ];

    public function getAboutImageUrlAttribute(): string
    {
        return $this->about_image
            ? asset($this->about_image)
            : asset('static/images/img_7.jpeg');
    }
}
