<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;

class SettingsController extends Controller
{
    public function render()
    {
        $profile = Profile::firstOrNew();
        return view('pages.admin.settings.index', compact('profile'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'required|string',
            'selfie' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'social_links' => 'nullable|array',
            'social_links.email' => 'nullable|email:rfc,dns',
            'social_links.github' => 'nullable|url',
            'social_links.instagram' => 'nullable|url',
            'social_links.linkedin' => 'nullable|url',
        ]);

        $profile = Profile::firstOrNew();

        if ($request->hasFile('selfie')) {
            $path = $request->file('selfie')->store('selfies', 'public');
            $validated['selfie_path'] = $path;
        }

        $profile->fill($validated);
        $profile->save();

        return redirect()->route('admin.settings')->with('success', 'Profile updated');
    }
}
