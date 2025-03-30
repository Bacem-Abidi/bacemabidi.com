<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of Blogs
     */
    public function index()
    {
        $blog = Blog::with('tags')
            ->where('is_published', 1)
            ->orderBy('blog_date', 'desc')
            ->paginate(10);

        $blog->getCollection()->transform(function ($blog) {
            return [
                'id' => $blog->id,
                'title' => $blog->title,
                'slug' => $blog->slug,
                'description' => $blog->description,
                'cover_image' => $blog->cover_image,
                'tags' => $blog->tags->map(function ($tag) {
                    return [
                        'title' => $tag->title,
                        'color' => $tag->color
                    ];
                }),
                'is_published' => $blog->is_published,
                'blog_date' => $blog->blog_date,
                'created_at' => $blog->created_at,
                'updated_at' => $blog->updated_at,
                'featured' => $blog->featured,
                'link' => route('blog.show', $blog->slug)
            ];
        });
        return response()->json($blog);
    }

    /**
     * Display a listing of featured Blogs
     */
    public function featured()
    {
        $blog = Blog::with('tags')
            ->where('is_published', 1)
            ->where('featured', 1)
            ->orderBy('blog_date', 'desc')
            ->paginate(10);


        $blog->getCollection()->transform(function ($blog) {
            return [
                'id' => $blog->id,
                'title' => $blog->title,
                'slug' => $blog->slug,
                'description' => $blog->description,
                'cover_image' => $blog->cover_image,
                'tags' => $blog->tags->map(function ($tag) {
                    return [
                        'title' => $tag->title,
                        'color' => $tag->color
                    ];
                }),
                'is_published' => $blog->is_published,
                'blog_date' => $blog->blog_date,
                'created_at' => $blog->created_at,
                'updated_at' => $blog->updated_at,
                'featured' => $blog->featured,
                'link' => route('blog.show', $blog->slug)
            ];
        });

        return response()->json($blog);
    }

    /**
     * Returns 
     */
    public function show(string $slug)
    {
        $blog = Blog::with('tags')
        ->where('slug', $slug)
        ->first();

        $filePath = "blog/{$blog->id}/case-study.md";

        $path = Storage::disk('public')->exists($filePath)
            ? $filePath
            : '';  // Default content

        $blog["case"] = $path;

        return response()->json($blog);
    }
}
