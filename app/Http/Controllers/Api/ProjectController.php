<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;


class ProjectController extends Controller
{
    /**
     * Display a listing of projects
     */
    public function index()
    {
        $projects = Project::with('tags')
        ->where('is_published', 1) // Only fetch published projects
        ->orderBy('project_date', 'desc')
        ->paginate(10);

        $projects->getCollection()->transform(function ($project) {
            return [
                'id' => $project->id,
                'title' => $project->title,
                'slug' => $project->slug,
                'description' => $project->description,
                'featured_image' => $project->featured_image,
                'tags' => $project->tags->map(function ($tag) {
                    return [
                        'title' => $tag->title,
                        'color' => $tag->color
                    ];
                }),
                'is_published' => $project->is_published,
                'project_date' => $project->project_date,
                'created_at' => $project->created_at,
                'updated_at' => $project->updated_at,
                'featured' => $project->featured,
                'link' => route('projects.show', $project->id)
            ];
        });
        return response()->json($projects);
    }

    /**
     * Display a listing of featured projects
     */
    public function featured()
    {
        $projects = Project::with('tags')
        ->where('is_published', 1) // Only fetch published projects
        ->where('featured', 1)
        ->orderBy('project_date', 'desc')
        ->paginate(10);
        // $projects->getCollection()->transform(function ($project) {
        //     $project->link = route('projects.show', $project->id); // Add link field
        //     return $project;
        // });

        $projects->getCollection()->transform(function ($project) {
            return [
                'id' => $project->id,
                'title' => $project->title,
                'slug' => $project->slug,
                'description' => $project->description,
                'featured_image' => $project->featured_image,
                'tags' => $project->tags->map(function ($tag) {
                    return [
                        'title' => $tag->title,
                        'color' => $tag->color
                    ];
                }),
                'is_published' => $project->is_published,
                'project_date' => $project->project_date,
                'created_at' => $project->created_at,
                'updated_at' => $project->updated_at,
                'featured' => $project->featured,
                'link' => route('projects.show', $project->id)
            ];
        });

        return response()->json($projects);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json($project);
    }
}
