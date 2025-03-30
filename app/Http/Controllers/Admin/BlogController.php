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
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'blog_date' => 'required|date',
            'is_published' => 'required|boolean',
            'featured' => 'required|boolean',
            'description' => 'nullable|string',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id'
        ]);

        // $validated['slug'] = \Str::slug($validated['title']);

        $slug = \Str::slug($validated['title']);
        $originalSlug = $slug;
        $count = 1;

        while (Blog::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-" . $count++;
        }

        $validated['slug'] = $slug;


        // Handle image upload
        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('blog', 'public');
            $validated['featured_image'] = $path;
        }

        $tags = $validated['tags'] ?? [];
        unset($validated['tags']);
        $blog = Blog::create($validated);

        if (!empty($tags)) {
            $blog->tags()->attach($tags);
        }
        // return view('pages.admin.projects.project', compact('project'));

        return redirect()->route('admin.blog.show', $blog)->with('success', 'Blog Created successfully!!');


        // return redirect()->route('admin.projects.index')->with('success', 'Project created successfully!');
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
        // return view('pages.admin.projects.project', compact('previousProject'));
    }

    public function edit(Blog $blog)
    {
        return view('pages.admin.blog.edit', compact('blog'));
    }

    // Handle the update request
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'blog_date' => 'required|date',
            'is_published' => 'required|boolean',
            'featured' => 'required|boolean',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'nullable|string',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id'
        ]);

        // $validated['slug'] = \Str::slug($validated['title']);

        $slug = \Str::slug($validated['title']);
        $originalSlug = $slug;
        $count = 1;

        while (Blog::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-" . $count++;
        }

        $validated['slug'] = $slug;


        // Handle image update
        if ($request->hasFile('featured_image')) {
            // Delete old image if it exists
            if ($blog->featured_image) {
                Storage::disk('public')->delete($blog->featured_image);
            }
            $path = $request->file('featured_image')->store('blog', 'public');
            $validated['featured_image'] = $path;
        }

         // Sync tags
        if (isset($validated['tags'])) {
            $blog->tags()->sync($validated['tags']);
        } else {
            $blog->tags()->detach();
        }

        $blog->update($validated);
        // return view('pages.admin.projects.project', compact('project'));

        return redirect()->route('admin.blog.show', $blog)->with('success', 'Blog updated successfully!!');
    }

    public function destroy(Blog $blog)
    {
        // Delete associated image
        if ($blog->featured_image) {
            Storage::disk('public')->delete($blog->featured_image);
        }

        $blog->delete();
        return redirect()->route('admin.blog.index')->with('success', 'Blog deleted successfully!');
    }

}
