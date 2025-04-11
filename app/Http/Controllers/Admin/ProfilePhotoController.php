<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilePhotoController extends Controller
{
    public function destroy(Request $request)
    {
        $user = $request->user();
        $user->deleteProfilePhoto();

        return response()->json(['message' => 'Profile photo removed successfully.']);
    }
}
