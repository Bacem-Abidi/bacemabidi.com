<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;


class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return view('pages.admin.projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        $previousProject = Project::where('id', '<', $project->id)
        ->orderBy('id', 'desc')
        ->first();

        $nextProject = Project::where('id', '>', $project->id)
            ->orderBy('id', 'asc')
            ->first();

        return view('pages.admin.projects.project', [
            'project' => $project,
            'previousProject' => $previousProject,
            'nextProject' => $nextProject,
        ]);
        // return view('pages.admin.projects.project', compact('previousProject'));
    }

    public function create()
    {
        return view('pages.admin.projects.create');
    }

    // Show the edit form
    public function edit(Project $project)
    {
        return view('pages.admin.projects.edit', compact('project'));
    }

    /**
     * Create a new Project
     */
    public function store(Request $request)
    {
       // Add validation
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'project_date' => 'required|date',
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

        while (Project::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-" . $count++;
        }

        $validated['slug'] = $slug;


        // Handle image upload
        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('projects', 'public');
            $validated['cover_image'] = $path;
        }

        $tags = $validated['tags'] ?? [];
        unset($validated['tags']);
        $project = Project::create($validated);

        if (!empty($tags)) {
            $project->tags()->attach($tags);
        }
        // return view('pages.admin.projects.project', compact('project'));

        return redirect()->route('admin.projects.show', $project)->with('success', 'Project Created successfully!!');


        // return redirect()->route('admin.projects.index')->with('success', 'Project created successfully!');
    }


    // Handle the update request
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'project_date' => 'required|date',
            'is_published' => 'required|boolean',
            'featured' => 'required|boolean',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'nullable|string',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id'
        ]);

        // $validated['slug'] = \Str::slug($validated['title']);

        $slug = \Str::slug($validated['title']);
        $originalSlug = $slug;
        $count = 1;

        while (Project::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-" . $count++;
        }

        $validated['slug'] = $slug;


        // Handle image update
        if ($request->hasFile('cover_image')) {
            // Delete old image if it exists
            if ($project->cover_image) {
                Storage::disk('public')->delete($project->cover_image);
            }
            $path = $request->file('cover_image')->store('projects', 'public');
            $validated['cover_image'] = $path;
        }

         // Sync tags
        if (isset($validated['tags'])) {
            $project->tags()->sync($validated['tags']);
        } else {
            $project->tags()->detach();
        }

        $project->update($validated);
        // return view('pages.admin.projects.project', compact('project'));

        return redirect()->route('admin.projects.show', $project)->with('success', 'Project updated successfully!!');
    }

    /**
     * Delete a Project
     */
    public function destroy(Project $project)
    {
        // Delete associated image
        if ($project->cover_image) {
            Storage::disk('public')->delete($project->cover_image);
        }

        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully!');
    }
}
