<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tags;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tags::all();
        return view('pages.admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('pages.admin.tags.create');
    }

    public function edit(Tags $tag)
    {
        return view('pages.admin.tags.edit', compact('tag'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:tags',
            'color' => 'required|string|size:7|starts_with:#',
        ]);

        // $validated['slug'] = \Str::slug($validated['title']);

        $slug = \Str::slug($validated['title']);
        $originalSlug = $slug;
        $count = 1;

        while (Tags::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-" . $count++;
        }

        $validated['slug'] = $slug;

        Tags::create($validated);

        return redirect()->route('admin.tags.index')
            ->with('success', 'Tag created successfully');
    }

    public function update(Request $request, Tags $tag)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:tags,title,'.$tag->id,
            'color' => 'required|string|size:7|starts_with:#',
        ]);

        // $validated['slug'] = \Str::slug($validated['title']);

        $slug = \Str::slug($validated['title']);
        $originalSlug = $slug;
        $count = 1;

        while (Tags::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-" . $count++;
        }

        $validated['slug'] = $slug;

        $tag->update($validated);

        return redirect()->route('admin.tags.index')
            ->with('success', 'Tag updated successfully');
    }

    public function destroy(Tags $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index')
            ->with('success', 'Tag deleted successfully');
    }
}
