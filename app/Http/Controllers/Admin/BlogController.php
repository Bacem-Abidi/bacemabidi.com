<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('pages.admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('pages.admin.blog.create');
    }

    public function store(Request $request)
    {
       // Add validation
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'blog_date' => 'required|date',
            'is_published' => 'required|boolean',
            'featured' => 'required|boolean',
            'description' => 'nullable|string',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id'
        ]);

        $slug = \Str::slug($validated['title']);
        $originalSlug = $slug;
        $count = 1;

        while (Blog::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-" . $count++;
        }

        $validated['slug'] = $slug;


        // Handle image upload
        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('blog', 'public');
            $validated['cover_image'] = $path;
        }

        $tags = $validated['tags'] ?? [];
        unset($validated['tags']);
        $blog = Blog::create($validated);

        if (!empty($tags)) {
            $blog->tags()->attach($tags);
        }

        return redirect()->route('admin.blog.show', $blog)->with('success', 'Blog Created successfully!!');
    }

    public function show(Blog $blog)
    {
        $previousBlog = Blog::where('id', '<', $blog->id)
        ->orderBy('id', 'desc')
        ->first();

        $nextBlog = Blog::where('id', '>', $blog->id)
            ->orderBy('id', 'asc')
            ->first();

        return view('pages.admin.blog.card', [
            'blog' => $blog,
            'previousBlog' => $previousBlog,
            'nextBlog' => $nextBlog,
        ]);
    }

    public function edit(Blog $blog)
    {
        $previousBlog = Blog::where('id', '<', $blog->id)
            ->orderBy('id', 'desc')
            ->first();

        $nextBlog = Blog::where('id', '>', $blog->id)
            ->orderBy('id', 'asc')
            ->first();

        return view('pages.admin.blog.edit', [
            'blog' => $blog,
            'previousBlog' => $previousBlog,
            'nextBlog' => $nextBlog,
        ]);
    }

    // Handle the update request
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'blog_date' => 'required|date',
            'is_published' => 'required|boolean',
            'featured' => 'required|boolean',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'nullable|string',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id'
        ]);

        $slug = \Str::slug($validated['title']);
        $originalSlug = $slug;
        $count = 1;

        while (Blog::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-" . $count++;
        }

        $validated['slug'] = $slug;


        // Handle image update
        if ($request->hasFile('cover_image')) {
            // Delete old image if it exists
            if ($blog->cover_image) {
                Storage::disk('public')->delete($blog->cover_image);
            }
            $path = $request->file('cover_image')->store('blog', 'public');
            $validated['cover_image'] = $path;
        }

         // Sync tags
        if (isset($validated['tags'])) {
            $blog->tags()->sync($validated['tags']);
        } else {
            $blog->tags()->detach();
        }

        $blog->update($validated);
        return redirect()->route('admin.blog.show', $blog)->with('success', 'Blog updated successfully!!');
    }

    public function destroy(Blog $blog)
    {
        // Delete associated image
        if ($blog->cover_image) {
            Storage::disk('public')->delete($blog->cover_image);
        }

        $blog->delete();
        return redirect()->route('admin.blog.index')->with('success', 'Blog deleted successfully!');
    }

}
