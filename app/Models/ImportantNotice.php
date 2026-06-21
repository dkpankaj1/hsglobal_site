<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Override;

class ImportantNotice extends Model
{
    protected $fillable = [
        'heading',
        'title',
        'description',
        'action',
        'banner',
        'enabled',
    ];

    #[Override]
    protected function casts()
    {
        return [
            'enabled' => 'boolean',
        ];
    }

    public function getBannerUrlAttribute()
    {
        return $this->banner ? asset($this->banner) : asset('static/background/main.jpeg');
    }
}
