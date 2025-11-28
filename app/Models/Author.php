<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'birth_date',
        'speciality',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];
}