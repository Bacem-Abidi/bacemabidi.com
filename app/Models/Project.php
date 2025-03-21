<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'featured_image',
        'tags',
        'is_published',
        'project_date'
    ];
}
