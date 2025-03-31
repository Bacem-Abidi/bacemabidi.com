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
        'cover_image',
        'is_published',
        'blog_date',
        'featured',
        'estimated_reading_time',
    ];

    protected $appends = ['reading_time'];

    public function getReadingTimeAttribute()
    {
        return $this->estimated_reading_time;
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tags::class);
    }
}
