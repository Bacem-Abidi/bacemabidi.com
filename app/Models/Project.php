<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'cover_image',
        'is_published',
        'featured',
        'project_date'
    ];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tags::class);
    }
}
