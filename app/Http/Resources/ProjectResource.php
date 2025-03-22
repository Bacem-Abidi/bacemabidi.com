<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'featured_image' => $this->featured_image_url, // Add accessor in model
            'description' => $this->description,
            'tags' => $this->tags,
            'is_published' => $this->is_published,
            'featured' => $this->featured,
            'project_date' => $this->project_date->format('Y-m-d'),
            'links' => [
                'self' => route('api.projects.show', $this->slug),
            ],
        ];
    }
}
