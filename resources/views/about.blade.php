@extends('layouts.app')

@section('title', 'About Page')

@section('content')
    <section class="container mx-auto py-16">
        <h2 class="text-4xl font-bold text-center mb-12">About Me</h2>
        <div class="max-w-2xl mx-auto text-center">
            <p class="text-gray-700 mb-8">I'm a Full-Stack Developer and 3D Artist with a passion for creating beautiful and functional digital experiences. I specialize in Laravel, Tailwind CSS, and Blender.</p>
            <div class="space-y-4">
                <div>
                    <p class="text-gray-700">Laravel</p>
                    <div class="bg-gray-200 h-2 rounded-full">
                        <div class="bg-blue-600 h-2 rounded-full" style="width: 90%;"></div>
                    </div>
                </div>
                <div>
                    <p class="text-gray-700">Tailwind CSS</p>
                    <div class="bg-gray-200 h-2 rounded-full">
                        <div class="bg-purple-600 h-2 rounded-full" style="width: 85%;"></div>
                    </div>
                </div>
                <div>
                    <p class="text-gray-700">Blender</p>
                    <div class="bg-gray-200 h-2 rounded-full">
                        <div class="bg-orange-400 h-2 rounded-full" style="width: 80%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
