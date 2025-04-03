<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhotographyImage extends Model
{
    protected $fillable = ['filename', 'caption', 'alt_text'];
}
