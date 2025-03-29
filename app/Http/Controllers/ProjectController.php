<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProjectController extends Controller
{
    public function index()
    {
        $apiBaseUrl = config('api.base_url');
        // Make API request
        $response = Http::get($apiBaseUrl.'/api/v1/projects');

        $projects = $response->successful() ? $response->json()['data'] : [];


        return view('pages.frontend.projects', compact('projects'));
    }

    public function show($project)
    {
        $apiBaseUrl = config('api.base_url');
        // Make API request
        $response = Http::get($apiBaseUrl.'/api/v1/projects/'.$project);

        $project = $response->successful() ? $response->json() : [];

        return view('pages.frontend.projects.card', compact('project'));
    }
}
