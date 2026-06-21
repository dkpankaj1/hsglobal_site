<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoreValue extends Model
{
    protected $fillable = [
        'icon',
        'title',
        'text',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];
}
