<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = [
        'full_name',
        'age',
        'gender',
        'phone',
        'email',
        'address',
        'marathon_category',
        'registration_date',
        'emergency_contact',
        'tshirt_size',
    ];

    // This automatically converts 'registration_date' into a date object instead of a plain text
    protected $casts = [
        'registration_date' => 'date',
    ];
}
