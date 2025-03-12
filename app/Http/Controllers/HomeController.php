<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projects = [
            (object) ['title' => 'Project 1', 'description' => 'Short description here.', 'image' => 'https://via.placeholder.com/300', 'link' => '#'],
            (object) ['title' => 'Project 2', 'description' => 'Short description here.', 'image' => 'https://via.placeholder.com/300', 'link' => '#'],
            (object) ['title' => 'Project 3', 'description' => 'Short description here.', 'image' => 'https://via.placeholder.com/300', 'link' => '#'],
        ];

        $skills = ['Laravel', 'Flutter', 'PHP', 'Java', 'Android Development'];

        return view('pages.frontend.home', compact('projects', 'skills'));
        // return view('home');
    }
}
