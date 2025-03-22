<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $apiBaseUrl = config('api.base_url');
        // Make API request
        $response = Http::get($apiBaseUrl.'/api/v1/projects/featured');

        // Check if the request was successful
        if ($response->successful()) {
            $projects = $response->json()['data']; // Extract the projects array
        } else {
            $projects = []; // Fallback if API fails
        }

        return view('pages.frontend.home', compact('projects'));
        // return view('home');
    }
}
