<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogContentController extends Controller
{
    public function index(Blog $blog)
    {
        $filePath = "blog/{$blog->id}/content.md";

        $initialContent = Storage::disk('public')->exists($filePath)
            ? Storage::disk('public')->get($filePath)
            : '# Start writing your Blog...';  // Default content

        $previousBlog = Blog::where('id', '<', $blog->id)
            ->orderBy('id', 'desc')
            ->first();

        $nextBlog = Blog::where('id', '>', $blog->id)
            ->orderBy('id', 'asc')
            ->first();

        return view('pages.admin.blog.content', [
            'blog' => $blog,
            'initialContent' => $initialContent,
            'previousBlog' => $previousBlog,
            'nextBlog' => $nextBlog,
        ]);

    }

    public function save(Blog $blog)
    {
        request()->validate(['content' => 'required|string']);

        $content = request('content');

        // Calculate reading time
        $cleanContent = strip_tags(preg_replace('/<!--.*?-->/', '', $content)); // Remove HTML comments
        $cleanContent = preg_replace('/!\[.*?\]\(.*?\)/', '', $cleanContent);   // Remove images
        $cleanContent = preg_replace('/#+\s?/', '', $cleanContent);             // Remove headers
        $wordCount = str_word_count($cleanContent);
        $readingTime = ceil($wordCount / 200); // 200 words per minute average
        $blog->estimated_reading_time = $readingTime ?: 1;

        // 1. Get all current images from markdown
        preg_match_all('/!\[.*?\]\((.*?)\)/', $content, $matches);
        $usedImages = collect($matches[1])->map(function ($url) use ($blog) {
            return basename(parse_url($url, PHP_URL_PATH));
        });

        // 2. Get all stored images
        $imagePath = "blog/{$blog->id}/images";
        $storedImages = Storage::disk('public')->files($imagePath);

        // 3. Delete unused images
        collect($storedImages)->each(function ($file) use ($usedImages) {
            $filename = basename($file);
            if (!$usedImages->contains($filename)) {
                Storage::disk('public')->delete($file);
            }
        });

        Storage::disk('public')->put(
            "blog/{$blog->id}/content.md",
            $content
        );

        $blog->save();

        return response()->json(['status' => 'success']);
    }

    public function uploadImage(Blog $blog)
    {
        request()->validate([
            'image' => 'required|image|max:2048' // 2MB max
        ]);

        $file = request()->file('image');

        $filename = \Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
        . '-' . uniqid()
        . '.' . $file->getClientOriginalExtension();

        $path = $file->storeAs(
            "blog/{$blog->id}/images",
            $filename,
            'public'
        );

        return response()->json([
            'url' => Storage::disk('public')->url($path)
        ]);
    }
}
