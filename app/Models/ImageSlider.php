<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageSlider extends Model
{
    protected $fillable = [
        'alt_text',
        'slider_image'
    ];

    public function getSliderImageUrlAttribute()
    {
        return $this->slider_image
            ? asset($this->slider_image)
            : asset('static/sliders/slider1.png');
    }
}
