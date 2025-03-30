<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Project;

class ProjectCaseStudyController extends Controller
{
    public function index(Project $project)
    {
        $filePath = "projects/{$project->id}/case-study.md";

        $initialContent = Storage::disk('public')->exists($filePath)
            ? Storage::disk('public')->get($filePath)
            : '# Start writing your case study...';  // Default content

        $previousProject = Project::where('id', '<', $project->id)
            ->orderBy('id', 'desc')
            ->first();

        $nextProject = Project::where('id', '>', $project->id)
            ->orderBy('id', 'asc')
            ->first();

        return view('pages.admin.projects.case-study', [
            'project' => $project,
            'initialContent' => $initialContent,
            'previousProject' => $previousProject,
            'nextProject' => $nextProject,
        ]);
    }

    public function save(Project $project)
    {
        request()->validate(['content' => 'required|string']);

        $content = request('content');

        // 1. Get all current images from markdown
        preg_match_all('/!\[.*?\]\((.*?)\)/', $content, $matches);
        $usedImages = collect($matches[1])->map(function ($url) use ($project) {
            return basename(parse_url($url, PHP_URL_PATH));
        });

        // 2. Get all stored images
        $imagePath = "projects/{$project->id}/images";
        $storedImages = Storage::disk('public')->files($imagePath);

        // 3. Delete unused images
        collect($storedImages)->each(function ($file) use ($usedImages) {
            $filename = basename($file);
            if (!$usedImages->contains($filename)) {
                Storage::disk('public')->delete($file);
            }
        });

        Storage::disk('public')->put(
            "projects/{$project->id}/case-study.md",
            $content
        );

        return response()->json(['status' => 'success']);
    }

    public function uploadImage(Project $project)
    {
        request()->validate([
            'image' => 'required|image|max:2048' // 2MB max
        ]);

        $file = request()->file('image');

        $filename = \Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
        . '-' . uniqid()
        . '.' . $file->getClientOriginalExtension();

        $path = $file->storeAs(
            "projects/{$project->id}/images",
            $filename,
            'public'
        );

        return response()->json([
            'url' => Storage::disk('public')->url($path)
        ]);
    }
}
