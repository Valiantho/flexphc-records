<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'card_number',
        'surname',
        'first_name',
        'other_name',
        'gender',
        'date_of_birth',
        'age',
        'phone',
        'address',
        'occupation',
        'next_of_kin',
        'next_of_kin_phone',
        'status',
        'created_by',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'status' => 'boolean',
    ];
}