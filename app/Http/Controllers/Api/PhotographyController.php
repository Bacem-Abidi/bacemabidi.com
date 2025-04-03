<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PhotographyImage;
use Illuminate\Support\Facades\Storage;

class PhotographyController extends Controller
{
    public function index()
    {
        $images = PhotographyImage::latest()
            ->paginate(10);

        $images->getCollection()->transform(function ($image) {
            return [
                'id' => $image->id,
                'url' => $image->filename,
                'caption' => $image->caption,
                'alt_text' => $image->alt_text
            ];
        });
        return response()->json($images);
    }
}
