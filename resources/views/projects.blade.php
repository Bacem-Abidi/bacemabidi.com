@extends('layouts.app')

@section('title', 'Projects Page')

@section('content')
    <section class="container mx-auto py-16">
        <h2 class="text-4xl font-bold text-center mb-12">Coding Projects</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @for ($i = 0; $i < 6; $i++)
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <img src="https://via.placeholder.com/400x300" alt="Project" class="rounded-lg">
                    <h3 class="text-xl font-semibold mt-4">Project {{ $i + 1 }}</h3>
                    <p class="text-gray-600 mt-2">A full-stack web application built with Laravel and Tailwind CSS.</p>
                    <div class="mt-4 flex flex-wrap gap-2">
                        <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm">Laravel</span>
                        <span class="bg-purple-100 text-purple-600 px-3 py-1 rounded-full text-sm">Tailwind CSS</span>
                        <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm">Blender</span>
                    </div>
                    <div class="mt-6">
                        <a href="#" class="text-blue-600 hover:underline">View Project</a>
                        <a href="#" class="ml-4 bg-orange-400 text-white px-6 py-2 rounded-lg hover:bg-orange-500">View Demo</a>
                    </div>
                </div>
            @endfor
        </div>
    </section>
@endsection
