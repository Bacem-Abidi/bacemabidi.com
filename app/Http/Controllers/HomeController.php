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

    public function index()
    {
        $apiBaseUrl = config('api.base_url');
        // Make API request
        $response = Http::get($apiBaseUrl.'/homepage');

        $data = $response->successful()
            ? $response->json()['data']
            : [
                'featured_projects' => [],
                'featured_blogs' => []
            ];
        return view('pages.frontend.home', compact('data'));
    }
}
