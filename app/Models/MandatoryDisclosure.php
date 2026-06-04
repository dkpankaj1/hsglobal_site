<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
