<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdmissionSetting extends Model
{
    protected $fillable = [
        'is_open',
        'academic_year',
        'start_date',
        'end_date',
        'contact_person',
        'contact_phone',
        'contact_email',
        'instructions',
    ];

    protected $casts = [
        'is_open'    => 'boolean',
        'start_date' => 'date',
        'end_date'   => 'date',
    ];
}
