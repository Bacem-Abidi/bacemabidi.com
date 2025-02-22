@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <section
        class="h-screen container flex items-center justify-left mx-auto max-w-screen-xl space-y-8 px-4 py-16 sm:px-6 lg:space-y-16 lg:px-8">
        <div class="text-left">
            <h1 class="text-5xl font-custom font-bold tracking-tight leading-[1.1]">
                Hi, I'm Bacem.<br>
                A <span class="text-[#e37200]">3D Blender Artist</span><br>
                && A <span class="text-cyan">Full-Stack Developer</span>
            </h1>
            <p class="font-custom mt-6 text-base text-text text-opacity-75 max-w-4xl tracking-tight">
                I create high-quality, game-optimized 3D models and develop scalable web and mobile
                applications using modern frameworks.
            </p>
            <div class="mt-8 flex space-x-4">
                <a href="https://github.com/your-github-profile" target="_blank" class="text-white">
                    <img src="{{ asset('images/icons/github.svg') }}" alt="" width="48px" class="fill-teal">
                </a>
            </div>
        </div>
    </section>

@endsection
