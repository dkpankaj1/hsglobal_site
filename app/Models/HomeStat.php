<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeStat extends Model
{
    protected $fillable = [
        'value',
        'suffix',
        'label',
        'sort_order',
    ];

    protected $casts = [
        'value'      => 'integer',
        'sort_order' => 'integer',
    ];

    public function getDisplayNumberAttribute(): string
    {
        return number_format($this->value) . ($this->suffix ?? '');
    }
}
