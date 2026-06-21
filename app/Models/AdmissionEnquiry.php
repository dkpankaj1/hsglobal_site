<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdmissionEnquiry extends Model
{
    protected $fillable = [
        'student_name',
        'admission_class',
        'parent_name',
        'phone',
        'email',
        'message',
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];
}
