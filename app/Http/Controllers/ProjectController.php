<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return view('pages.admin.projects.index', compact('projects'));
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
     * Display the specified resource.
     */
    public function store(Request $request)
    {
       // Add validation
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:projects,slug',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'project_date' => 'required|date',
            'is_published' => 'required|boolean',
            'featured' => 'required|boolean',
            'description' => 'nullable|string',
            // Add other fields
        ]);

        // Handle image upload
        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('projects', 'public');
            $validated['featured_image'] = $path;
        }

        Project::create($validated);
        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully!');
    }


    // Handle the update request
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:projects,slug,' . $project->id,
            'project_date' => 'required|date',
            'is_published' => 'required|boolean',
            'featured' => 'required|boolean',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'nullable|string',
        ]);

        // Handle image update
        if ($request->hasFile('featured_image')) {
            // Delete old image if it exists
            if ($project->featured_image) {
                Storage::disk('public')->delete($project->featured_image);
            }
            $path = $request->file('featured_image')->store('projects', 'public');
            $validated['featured_image'] = $path;
        }

        $project->update($validated);
        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // Delete associated image
        if ($project->featured_image) {
            Storage::disk('public')->delete($project->featured_image);
        }

        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully!');
    }
}
