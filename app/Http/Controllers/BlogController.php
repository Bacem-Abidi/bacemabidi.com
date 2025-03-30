<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BlogController extends Controller
{
    public function index()
    {
        $apiBaseUrl = config('api.base_url');
        // Make API request
        $response = Http::get($apiBaseUrl.'/api/v1/blog');

        $blog = $response->successful() ? $response->json()['data'] : [];


        return view('pages.frontend.blog', compact('blog'));
    }

    public function show($blog)
    {
        $apiBaseUrl = config('api.base_url');
        // Make API request
        $response = Http::get($apiBaseUrl.'/api/v1/blog/'.$blog);

        $blog = $response->successful() ? $response->json() : [];

        return view('pages.frontend.blog.card', compact('blog'));
    }
}
