<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectCaseStudyController extends Controller
{
    public function index(Project $project)
    {
        return view('pages.admin.projects.casestudy', compact('project'));
    }
}
