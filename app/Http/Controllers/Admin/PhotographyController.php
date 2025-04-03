<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\PhotographyImage;

class PhotographyController extends Controller
{
    public function index()
    {
        $images = PhotographyImage::latest()->paginate(10);
        return view('pages.admin.photography.index', ['images' => $images]);
    }

    public function upload()
    {
        return view('pages.admin.photography.upload');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'caption' => 'nullable|string|max:255',
            'alt_text' => 'nullable|string|max:255'
        ]);

        $file = $request->file('image');
        $filename = \Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
        . '-' . uniqid()
        . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('photography', $filename, 'public');

        $image = PhotographyImage::create([
            'filename' => $path,
            'caption' => $validated['caption'] ?? null,
            'alt_text' => $validated['alt_text'] ?? null
        ]);

        return redirect()->route('admin.photography.index')->with('success', 'Image Uploaded successfully!!');

    }

    public function edit(PhotographyImage $image)
    {
        return view('pages.admin.photography.edit', compact('image'));

    }

    // Handle the update request
    public function update(Request $request, PhotographyImage $image)
    {
        $validated = $request->validate([
            'caption' => 'nullable|string|max:255',
            'alt_text' => 'nullable|string|max:255'
        ]);

        $image->update($validated);

        return redirect()->route('admin.photography.index')->with('success', 'Image Updated successfully!!');

    }

    public function destroy(PhotographyImage $image)
    {
        // Delete associated image
        if ($image->filename) {
            Storage::disk('public')->delete($image->filename);
        }

        $image->delete();
        return redirect()->route('admin.photography.index')->with('success', 'Blog deleted successfully!');
    }
}
