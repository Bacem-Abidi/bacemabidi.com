<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tags extends Model
{
    protected $fillable = ['title', 'slug', 'color'];

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class);
    }

    public function blog(): BelongsToMany
    {
        return $this->belongsToMany(Project::class);
    }
}
