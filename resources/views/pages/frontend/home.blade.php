<x-app-layout :title="'Home'">

    <x-frontend.home.hero-section />

    <section class="min-h-screen container flex  justify-left mx-auto max-w-screen-xl px-4">
        <div class="grid md:grid-cols-4 gap-4 my-10 h-full w-full auto-rows-[18rem]">

            {{-- Featured project --}}
            <x-frontend.home.cards.featured-project imageUrl="{{ asset('images/home/screen-shot-3.png') }}"
                title="Featured Project"
                description="DroidTale is my project to natively recreate 'Undertale' for android devices"
                link="#" />

            {{-- Contact Me --}}
            <x-frontend.home.cards.contact />

            {{-- Blog --}}
            <x-frontend.home.cards.blog imageUrl="{{ asset('images/home/screen-shot.png') }}"
                mdImageUrl="{{ asset('images/home/screen-shot-2.png') }}" title="Blog"
                description="Stories from my journey as a developer and a 3D artist." link="{{ route('blog') }}" />

            {{-- Photography --}}
            <x-frontend.home.cards.photography imageUrl="{{ asset('images/home/sky-1.jpg') }}"
                mdImageUrl="{{ asset('images/home/sky-2.jpg') }}" title="Photography"
                description="A hobby that lets me see the world differently."
                link="{{ route('projects/photography') }}" />

            {{-- Featured Render --}}
            <x-frontend.home.cards.featured-render
                imageUrl="{{ asset('images/Renders/abandonedHouse/Render-Final-Processed-01.jpg') }}"
                title="More Than Just Code"
                description="A developer, a 3D artist, and a creator bringing ideas to life in every form"
                link="{{ route('projects/3d-projects') }}" />

            {{-- Tech Stack --}}
            <x-frontend.home.cards.tech-stack />


            {{-- The Globe Div --}}
            <x-frontend.home.cards.location />

        </div>

    </section>

    {{-- Projects --}}
    <x-frontend.home.projects-section :projects="$projects" />

    {{-- Blogs --}}
    @php
        // Test data
        $blogs = [
            [
                'title' => 'Project 1',
                'desc' => 'this is a test description for the featured projects',
                'tech_stack' => ['laravel', 'node.js', 'react'],
                'image' => 'images/Renders/abandonedHouse/Render-Final-Processed-01.jpg',
                'link' => 'images/Renders/abandonedHouse/Render-Final-Processed-01.jpg',
                'created_at' => 'December 23 2024',
                'read_duration' => '5min',
            ],
            [
                'title' => 'Project 2',
                'desc' => 'this is a test description for the featured projects',
                'tech_stack' => ['tailwind', 'flutter', 'java'],
                'image' => 'images/Renders/abandonedHouse/Render-Final-Processed-01.jpg',
                'link' => 'images/Renders/abandonedHouse/Render-Final-Processed-01.jpg',
                'created_at' => 'December 24 2024',
                'read_duration' => '4min',
            ],
            [
                'title' => 'Project 3',
                'desc' => 'this is a test description for the featured projects',
                'tech_stack' => ['docker', 'blender', 'vite'],
                'image' => 'images/Renders/abandonedHouse/Render-Final-Processed-01.jpg',
                'link' => 'images/Renders/abandonedHouse/Render-Final-Processed-01.jpg',
                'created_at' => 'December 25 2024',
                'read_duration' => '3min',
            ],
            // Add more projects
        ];
    @endphp
    <x-frontend.home.blog-section :blogs="$blogs" />

</x-app-layout>
