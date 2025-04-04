<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'bio',
        'selfie_path',
        'social_links'
    ];

    protected $casts = [
        'social_links' => 'array'
    ];
}
