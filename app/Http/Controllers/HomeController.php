<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $projects = [
            (object) ['title' => 'Project 1', 'description' => 'Short description here.', 'image' => 'https://via.placeholder.com/300', 'link' => '#'],
            (object) ['title' => 'Project 2', 'description' => 'Short description here.', 'image' => 'https://via.placeholder.com/300', 'link' => '#'],
            (object) ['title' => 'Project 3', 'description' => 'Short description here.', 'image' => 'https://via.placeholder.com/300', 'link' => '#'],
        ];

        $skills = ['Laravel', 'Flutter', 'PHP', 'Java', 'Android Development'];

        return view('home', compact('projects', 'skills'));
    }
}
