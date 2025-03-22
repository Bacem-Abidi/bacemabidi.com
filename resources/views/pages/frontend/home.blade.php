@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <section class="h-screen container flex items-center justify-between mx-auto max-w-screen-xl px-4">
        <div class="text-left relative z-10 max-w-2xl">
            <div class="mb-6 flex items-center gap-3 opacity-75">
                <div class="h-px w-8 bg-cyan"></div>
                <span class="text-sm uppercase tracking-widest text-cyan">Software Engineer && 3D Artist</span>
            </div>

            <h1 class="text-[clamp(2rem,7vw,3.5rem)] font-bold leading-tight">
                Crafting Digital Realities<br>
                Through <span class="text-orange">Code</span> &&
                <span class="text-cyan">Creativity</span>
            </h1>

            <p class="my-8 max-w-xl text-lg leading-relaxed text-text opacity-90">
                Developing scalable solutions through modern frameworks and Creating game-ready 3D assets
            </p>

            <div class="flex gap-4">
                <a href="{{ route('projects') }}"
                    class="group flex items-center rounded-full bg-cyan/10 px-6 py-3 text-cyan transition-all hover:bg-cyan/20">
                    Explore Work
                    <i class="fa-solid fa-arrow-right ml-2 text-sm opacity-70 transition group-hover:translate-x-1"></i>
                </a>

                <div class="h-px w-8 self-center bg-gray-600"></div>

                <div class="flex gap-4 items-center">
                    @include('partials.frontend.social-links.github', ['size' => 'size-9'])
                    @include('partials.frontend.social-links.linkedin', ['size' => 'size-7'])
                    @include('partials.frontend.social-links.email', ['size' => 'size-9'])
                    @include('partials.frontend.social-links.instagram', ['size' => 'size-8'])
                </div>
            </div>
        </div>

        <!-- Add a 3D render/artwork placeholder on the right -->
        <div class="relative hidden lg:block w-2/5 transform-gpu group">
            <!-- Holographic Background Effect -->
            <div class="absolute inset-0 rounded-2xl bg-gradient-to-tr from-cyan/20 to-orange/20 animate-pulse-glow"></div>

            <!-- Main Container -->
            <div
                class="relative z-20 h-[500px] border-2 border-cyan/30 rounded-2xl bg-background/95 backdrop-blur-xl shadow-2xl hover:shadow-cyan/10 transition-all duration-300 overflow-hidden">
                <div class="grid grid-cols-2 divide-x divide-cyan/10 h-full">
                    <!-- 3D Art Side - Hover to Reveal -->
                    <div class="relative p-6 bg-gradient-to-b from-cyan/5 to-transparent">
                        <div class="absolute inset-0 holographic-pattern opacity-10"></div>
                        <img src="{{ asset('images/Renders/abandonedHouse/wire.png') }}"
                            class="w-full h-full object-contain transition-all duration-500 grayscale hover:grayscale-0 scale-90 hover:scale-95"
                            alt="3D Wireframe">
                        <div class="absolute bottom-4 left-4 flex items-center gap-2">
                            <span class="text-xs text-cyan font-mono">Blender 4.3.2</span>
                            <div class="h-px w-8 bg-cyan/30"></div>
                        </div>
                    </div>

                    <!-- Code Side - Animated Terminal -->
                    <div class="relative p-6 bg-gradient-to-b from-orange/5 to-transparent">
                        <!-- Animated Cursor -->
                        <div class="absolute top-6 right-6 w-2 h-4 bg-cyan animate-blink"></div>

                        <!-- Code Content -->
                        <div class="font-mono text-sm space-y-4 text-cyan/90">
                            <div class="flex gap-2">
                                <span class="text-pink">$</span>
                                <span>npm create vite@latest</span>
                            </div>
                            <div class="flex gap-2 opacity-75">
                                <span class="text-pink">></span>
                                <span class="text-cyan">Initializing project...</span>
                            </div>
                            <div class="flex gap-2 opacity-75">
                                <span class="text-pink">></span>
                                <span>✔︎ Laravel configured</span>
                            </div>
                            <div class="flex gap-2 opacity-75">
                                <span class="text-pink">></span>
                                <span>✔︎ React configured</span>
                            </div>
                            <div class="flex gap-2 opacity-75">
                                <span class="text-pink">></span>
                                <span>✔︎ Tailwind configured</span>
                            </div>
                            <div class="flex gap-2 opacity-75">
                                <span class="text-pink">></span>
                                <span>✔︎ Three.js installed</span>
                            </div>
                            <div class="flex gap-2 opacity-75">
                                <span class="text-pink">></span>
                                <span>Project is ready...</span>
                            </div>
                            <div class="mt-8 opacity-90">
                                <span class="text-orange block mb-2">// Current Project</span>
                                <div id="terminal"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Floating Glow Effect -->
            <div class="absolute inset-0 rounded-2xl glow-overlay"></div>
        </div>

    </section>

    <section class="min-h-screen container flex  justify-left mx-auto max-w-screen-xl px-4">
        <div class="grid md:grid-cols-4 gap-4 my-10 h-full w-full auto-rows-[18rem]">

            {{-- Featured project --}}
            <div
                class="group relative flex flex-col justify-between overflow-hidden rounded-2xl bg-background [border:1px_solid_rgba(255,255,255,.1)] [box-shadow:0_-20px_80px_-20px_#293040_inset] md:col-span-2">
                <div>
                    <div
                        class="absolute right-0 bottom-[-5] origin-bottom translate-x-0 transition-all duration-300 ease-out [mask-image:linear-gradient(to_top,transparent_10%,#000_100%)] group-hover:scale-105">
                        <div class="relative w-full overflow-hidden rounded-[11px]"><img loading="lazy" width="1600"
                                height="412" decoding="async" data-nimg="1"
                                class="grayscale group-hover:grayscale-0 relative z-10 rounded-[11px] transition-opacity duration-500 ease-in-out"
                                style="color: transparent;" srcset="{{ asset('images/home/screen-shot-3.png') }}"
                                src="{{ asset('images/home/screen-shot-3.png') }}">
                        </div>
                    </div>
                </div>
                <div
                    class="pointer-events-none z-10 flex transform-gpu flex-col gap-1 p-6 transition-all duration-300 group-hover:-translate-y-10">
                    @include('partials.frontend.icons.icon-set', ['icon' => 'code'])
                    <h3 class="text-lg font-semibold text-text">Featured Project</h3>
                    <p class="max-w-sm text-grayBright text-sm">DroidTale is my project to natively recreate
                        'Undertale' for android devices
                    </p>
                </div>
                <div
                    class="pointer-events-none absolute bottom-0 flex w-full translate-y-10 transform-gpu flex-row items-center p-4 opacity-0 transition-all duration-300 group-hover:translate-y-0 group-hover:opacity-100 group">
                    <button
                        class="inline-flex items-center justify-center text-sm font-medium transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed ring-offset-background select-none active:scale-[0.98] hover:bg-accent hover:text-accent-foreground h-9 px-3 rounded-md pointer-events-auto"><a
                            class="flex items-center" href="#">See More <i
                                class="fa-solid fa-arrow-right ml-2 h-4 w-4 mt-1"></i></a></button>
                </div>
            </div>

            {{-- Contact Me --}}
            <div
                class="group relative flex flex-col justify-center overflow-hidden rounded-2xl bg-background [border:1px_solid_rgba(255,255,255,.1)] [box-shadow:0_-20px_80px_-20px_#293040_inset]">
                <div class="space-y-2 flex-col gap-1 p-6 text-center">
                    <h2 class="md:text-xl font-bold text-text sm:text-2xl text-2xl">Let's Work Together</h2>
                    <p class="text-grayBright md:text-sm sm:text-lg">Have a project in mind? Let's turn your ideas into
                        reality</p>

                </div>
                <div class="space-y-2 flex-col gap-1 p-6 text-center">
                    <a href="{{ route('contact') }}"
                        class="md:text-sm sm:text-xl text-xl bg-cyan/10 text-cyan transition-all hover:bg-cyan/20 md:px-4 sm:px-6 px-6 py-2 rounded-full duration-500">Contact
                        Me</a>
                </div>
            </div>

            {{-- Blog --}}
            <div
                class="group relative flex flex-col justify-between overflow-hidden rounded-2xl bg-background [border:1px_solid_rgba(255,255,255,.1)] [box-shadow:0_-20px_80px_-20px_#293040_inset] md:row-span-2">

                <div>
                    <div
                        class="absolute right-0 top-0 origin-top translate-x-0 transition-all duration-300 ease-out [mask-image:linear-gradient(to_top,transparent_10%,#000_100%)] group-hover:scale-105">
                        <div class="relative w-full overflow-hidden rounded-[11px]">
                            <picture>
                                <source media="(max-width: 767px)" srcset="{{ asset('images/home/screen-shot-2.png') }}">
                                <img loading="lazy" width="1600" height="412" decoding="async" data-nimg="1"
                                    class="grayscale group-hover:grayscale-0 relative z-10 rounded-[11px] transition-opacity duration-500 ease-in-out"
                                    style="color: transparent;" srcset="{{ asset('images/home/screen-shot.png') }}"
                                    src="{{ asset('images/home/screen-shot.png') }}">
                            </picture>
                        </div>
                    </div>
                </div>

                <div
                    class="pointer-events-none z-10 flex transform-gpu flex-col gap-1 p-6 transition-all duration-300 group-hover:-translate-y-10">
                    @include('partials.frontend.icons.icon-set', ['icon' => 'blog'])
                    <h3 class="text-lg font-semibold text-text">Blog</h3>
                    <p class="max-w-sm text-grayBright text-sm">Stories from my journey as a developer and a 3D artist.
                    </p>
                </div>
                <div
                    class="pointer-events-none absolute bottom-0 flex w-full translate-y-10 transform-gpu flex-row items-center p-4 opacity-0 transition-all duration-300 group-hover:translate-y-0 group-hover:opacity-100 group">
                    <button
                        class="inline-flex items-center justify-center text-sm font-medium transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed ring-offset-background select-none active:scale-[0.98] hover:bg-accent hover:text-accent-foreground h-9 px-3 rounded-md pointer-events-auto"><a
                            class="flex items-center" href="{{ route('blog') }}">Read More <i
                                class="fa-solid fa-arrow-right ml-2 h-4 w-4 mt-1"></i></a></button>
                </div>
            </div>

            {{-- Photography --}}
            <div
                class="group relative flex flex-col justify-between overflow-hidden rounded-2xl bg-background [border:1px_solid_rgba(255,255,255,.1)] [box-shadow:0_-20px_80px_-20px_#293040_inset]">

                <div>
                    <div
                        class="absolute right-0 bottom-[-30px] origin-bottom translate-x-0 transition-all duration-300 ease-out [mask-image:linear-gradient(to_top,transparent_10%,#000_100%)] group-hover:scale-105">
                        <div class="relative w-full overflow-hidden rounded-[11px]">
                            <picture>
                                <source media="(max-width: 767px)" srcset="{{ asset('images/home/sky-2.jpg') }}">
                                <img loading="lazy" width="1600" height="412" decoding="async" data-nimg="1"
                                    class="grayscale group-hover:grayscale-0 relative z-10 rounded-[11px] transition-opacity duration-500 ease-in-out"
                                    style="color: transparent;" srcset="{{ asset('images/home/sky-1.jpg') }}"
                                    src="{{ asset('images/home/sky-1.jpg') }}">
                            </picture>
                        </div>
                    </div>
                </div>
                <div
                    class="pointer-events-none z-10 flex transform-gpu flex-col gap-1 p-6 transition-all duration-300 group-hover:-translate-y-10">
                    @include('partials.frontend.icons.icon-set', ['icon' => 'camera'])
                    <h3 class="text-lg font-semibold text-text">Photography</h3>
                    <p class="max-w-sm text-grayBright text-sm">A hobby that lets me see the world differently.
                    </p>
                </div>
                <div
                    class="pointer-events-none absolute bottom-0 flex w-full translate-y-10 transform-gpu flex-row items-center p-4 opacity-0 transition-all duration-300 group-hover:translate-y-0 group-hover:opacity-100 group">
                    <button
                        class="inline-flex items-center justify-center text-sm font-medium transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed ring-offset-background select-none active:scale-[0.98] hover:bg-accent hover:text-accent-foreground h-9 px-3 rounded-md pointer-events-auto"><a
                            class="flex items-center" href="{{ route('projects/photography') }}">View More <i
                                class="fa-solid fa-arrow-right ml-2 h-4 w-4 mt-1"></i></a></button>
                </div>
            </div>


            {{-- Featured Render --}}
            <div
                class="group relative flex flex-col justify-between overflow-hidden rounded-2xl bg-background [border:1px_solid_rgba(255,255,255,.1)] [box-shadow:0_-20px_80px_-20px_#293040_inset] md:col-span-2">

                <div>
                    <div
                        class="absolute right-0 bottom-[-5] origin-bottom translate-x-0 transition-all duration-300 ease-out [mask-image:linear-gradient(to_top,transparent_10%,#000_100%)] group-hover:scale-105">
                        <div class="relative w-full overflow-hidden rounded-[11px]"><img loading="lazy" width="1600"
                                height="412" decoding="async" data-nimg="1"
                                class="grayscale group-hover:grayscale-0 relative z-10 rounded-[11px] transition-opacity duration-500 ease-in-out"
                                style="color: transparent;"
                                srcset="{{ asset('images/Renders/abandonedHouse/Render-Final-Processed-01.jpg') }}"
                                src="{{ asset('images/Renders/abandonedHouse/Render-Final-Processed-01.jpg') }}">
                        </div>
                    </div>
                </div>
                <div
                    class="pointer-events-none z-10 flex transform-gpu flex-col gap-1 p-6 transition-all duration-300 group-hover:-translate-y-10">
                    @include('partials.frontend.icons.icon-set', ['icon' => 'palette'])
                    <h3 class="text-lg font-semibold text-text">More Than Just Code</h3>
                    <p class="max-w-sm text-grayBright text-sm">A developer, a 3D artist, and a creator bringing ideas to
                        life in
                        every form</p>
                </div>
                <div
                    class="pointer-events-none absolute bottom-0 flex w-full translate-y-10 transform-gpu flex-row items-center p-4 opacity-0 transition-all duration-300 group-hover:translate-y-0 group-hover:opacity-100 group">
                    <button
                        class="inline-flex items-center justify-center text-sm font-medium transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed ring-offset-background select-none active:scale-[0.98] hover:bg-accent hover:text-accent-foreground h-9 px-3 rounded-md pointer-events-auto"><a
                            class="flex items-center" href="{{ route('projects/3d-projects') }}">Discover More <i
                                class="fa-solid fa-arrow-right ml-2 h-4 w-4 mt-1"></i></a></button>
                </div>
            </div>

            {{-- Tech Stack --}}
            <div
                class="group relative flex flex-col justify-between overflow-hidden rounded-2xl bg-background [border:1px_solid_rgba(255,255,255,.1)] [box-shadow:0_-20px_80px_-20px_#293040_inset] md:col-span-2">
                <div class="flex-grow place-content-center pt-14">
                    <div
                        class="relative flex w-full flex-col items-center justify-center overflow-hidden marquee-container">
                        <div
                            class="group flex overflow-hidden p-2 [--gap:2rem] [gap:var(--gap)] flex-row [--duration:10s] md:shadow-xl">
                            @for ($i = 0; $i < 4; $i++)
                                <div
                                    class="flex shrink-0 justify-around [gap:var(--gap)] motion-reduce:animate-none animate-marquee flex-row">
                                    @include('partials.frontend.icons.tech-stack-icons')
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>

                <div class="pointer-events-none z-10 flex transform-gpu flex-col gap-1 p-6 transition-all duration-300">
                    <h3 class="text-lg font-semibold text-text">Tech Stack I'm familiar with</h3>
                    <p class="max-w-sm text-grayBright text-sm">Focusing on creating a seamless experience across all
                        platforms</p>
                </div>
            </div>

            {{-- The Globe Div --}}
            <div
                class="md:col-span-2 group relative flex flex-col justify-between overflow-hidden rounded-2xl bg-background [border:1px_solid_rgba(255,255,255,.1)] [box-shadow:0_-20px_80px_-20px_#293040_inset]">
                <div class="">
                    <div id="globe"
                        class="absolute inset-0 mx-auto aspect-[1/1] max-w-[600px] top-0 h-[600px] w-[600px] transition-all duration-300 ease-out [mask-image:linear-gradient(to_top,transparent_30%,#000_100%)] lg:left-50 md:left-20 sm:left-40">
                    </div>
                </div>
                <div class="pointer-events-none z-10 flex transform-gpu flex-col gap-1 p-6 transition-all duration-300">
                    @include('partials.frontend.icons.icon-set', ['icon' => 'location'])
                    <h3 class="text-lg font-semibold text-text">Location</h3>
                    <p class="max-w-lg text-grayBright text-sm">Currently Based In Tunisia</p>
                </div>
            </div>
        </div>

    </section>

    {{-- Projects --}}
    @if (count($projects) > 0)
        <section class="container mx-auto max-w-screen-xl px-4 py-20">
            <div class="flex items-center gap-4 mb-12 justify-between">
                <div class="flex items-center gap-4">
                    <div class="h-px w-8 bg-cyan"></div>
                    <h2 class="md:text-xl sm:text-lg font-bold text-cyan">Projects</h2>
                </div>

                <div class="flex items-center ">
                    <a href="{{ route('projects') }}"
                        class="group md:text-sm sm:text-xs text-xs flex items-center rounded-full bg-cyan/10 px-6 py-3 text-cyan transition-all hover:bg-cyan/20">
                        View All Projects
                        <i
                            class="fa-solid fa-arrow-right ml-2 text-sm opacity-70 transition group-hover:translate-x-1"></i>
                    </a>
                </div>
            </div>

            <div class="mt-12 grid gap-12 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($projects as $project)
                    @include('components.frontend.mini-project-card', ['project' => $project])
                @endforeach
            </div>

            <div class="mt-12 flex justify-center">

            </div>
        </section>
    @endif


    {{-- Blogs --}}
    <section class="container mx-auto max-w-screen-xl px-4 py-20">
        <div class="flex items-center gap-4 mb-12 justify-between">
            <div class="flex items-center gap-4">
                <div class="h-px w-8 bg-cyan"></div>
                <h2 class="md:text-xl sm:text-lg font-bold text-cyan">Blog</h2>
            </div>

            <div class="flex items-center ">
                <a href="{{ route('projects') }}"
                    class="group md:text-sm sm:text-xs text-xs flex items-center rounded-full bg-cyan/10 px-6 py-3 text-cyan transition-all hover:bg-cyan/20">
                    Read All Articles
                    <i class="fa-solid fa-arrow-right ml-2 text-sm opacity-70 transition group-hover:translate-x-1"></i>
                </a>
            </div>
        </div>

        <div class="mt-12">
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
            @foreach ($blogs as $blog)
                @include('components.frontend.mini-blog-card', ['blog' => $blog])
            @endforeach


        </div>

        <div class="mt-12 flex justify-center">

        </div>
    </section>

@endsection
