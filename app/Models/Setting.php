<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'brand_name',
        'logo',
        'footer_logo',
        'favicon',
        'contact_email',
        'contact_phone',
        'whatsapp_number',
        'contact_address',
        'contact_timings',
        'facebook_link',
        'twitter_link',
        'instagram_link',
        'linkedin_link',
        'meta_title',
        'meta_description',
        'meta_keywords'
    ];

    public function getLogoUrlAttribute()
    {
        return $this->logo ? asset($this->logo) : asset('static/logo/logo.png');
    }

    public function getFooterLogoUrlAttribute()
    {
        return $this->footer_logo ? asset($this->footer_logo) : asset('static/logo/logo_footer.png');
    }

    public function getFaviconUrlAttribute()
    {
        return $this->favicon ? asset($this->favicon) : asset('static/logo/favicon.png');
    }
}
