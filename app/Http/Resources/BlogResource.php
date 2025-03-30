<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'cover_image' => $this->cover_image, // Add accessor in model
            'description' => $this->description,
            'tags' => $this->tags,
            'is_published' => $this->is_published,
            'featured' => $this->featured,
            'blog_date' => $this->blog_date->format('Y-m-d'),
            'links' => [
                'self' => route('api.blog.show', $this->slug),
            ],
        ];
    }
}
