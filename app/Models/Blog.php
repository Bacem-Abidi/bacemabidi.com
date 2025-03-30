<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'featured_image',
        'is_published',
        'blog_date',
        'estimated_reading_time', // Add this
    ];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tags::class);
    }
}
