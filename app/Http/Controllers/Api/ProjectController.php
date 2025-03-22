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
        $projects = Project::query()
        ->where('is_published', 1) // Only fetch published projects
        // ->with(['tags', 'desc'])
        ->orderBy('project_date', 'desc')
        ->paginate(10);

        return response()->json($projects);
    }

    /**
     * Display a listing of featured projects
     */
    public function featured()
    {
        $projects = Project::query()
        ->where('is_published', 1) // Only fetch published projects
        ->where('featured', 1)
        ->orderBy('project_date', 'desc')
        ->paginate(10);

        return response()->json($projects);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project->load('caseStudies', 'media'); // Load relationships
        return response()->json($project);
    }
}
