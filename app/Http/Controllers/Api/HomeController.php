<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Project;
use App\Models\Blog;

class HomeController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => [
                'featured_projects' => $this->getFeaturedProjects(),
                'featured_blogs' => $this->getFeaturedBlogs(),
                // Add other sections here
            ],
            'meta' => [
                'version' => config('app.version'),
                // 'generated_at' => now()->toDateTimeString()
            ]
        ]);
    }

    protected function getFeaturedProjects()
    {
        return Project::where('featured', true)
            ->where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->take(3) // Adjust number as needed
            ->get()
            ->map(function ($project) {
                return [
                    'id' => $project->id,
                    'title' => $project->title,
                    'description' => Str::limit($project->description, 150),
                    'tags' => $project->tags->map(fn($tag) => [
                        'title' => $tag->title,
                        'color' => $tag->color
                    ]),
                    'image' => $project->cover_image,
                    'link' => route('projects.show', $project->slug)
                ];
            });
    }

    protected function getFeaturedBlogs()
    {
        return Blog::with('tags')
            ->where('is_published', true)
            ->where('featured', true)
            ->orderBy('blog_date', 'desc')
            ->take(5) // Adjust number as needed
            ->get()
            ->map(function ($blog) {
                return [
                    'id' => $blog->id,
                    'title' => $blog->title,
                    'description' => Str::limit(strip_tags($blog->description), 200),
                    'cover_image' => $blog->cover_image,
                    'reading_time' => $blog->estimated_reading_time,
                    'tags' => $blog->tags->map(fn($tag) => [
                        'title' => $tag->title,
                        'color' => $tag->color
                    ]),
                    'date' => $blog->blog_date,
                    'link' => route('blog.show', $blog->slug)
                ];
            });
    }

}
