@extends('layouts.app')

@section('title', 'Portfolio Page')

@section('content')
    <section class="container mx-auto py-16">
        <h2 class="text-4xl font-bold text-center mb-12">3D Portfolio</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @for ($i = 0; $i < 6; $i++)
                <div class="group relative bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <img src="https://via.placeholder.com/400x300" alt="3D Model" class="rounded-lg">
                    <div class="mt-4">
                        <h3 class="text-xl font-semibold">Project {{ $i + 1 }}</h3>
                        <p class="text-gray-600">A stunning 3D render created in Blender.</p>
                    </div>
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <a href="#" class="text-white text-lg bg-orange-400 px-6 py-3 rounded-lg hover:bg-orange-500">View Details</a>
                    </div>
                </div>
            @endfor
        </div>
    </section>
@endsection
