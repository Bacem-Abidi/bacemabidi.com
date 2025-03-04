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
                    @include('partials.social-links.github', ['size' => 'size-9'])
                    @include('partials.social-links.linkedin', ['size' => 'size-7'])
                    @include('partials.social-links.instagram', ['size' => 'size-8'])
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
                    <svg class="size-10 md:max-lg:size-8 text-text transition-all duration-300 ease-in-out group-hover:scale-75"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                        <g stroke="currentColor" stroke-linecap="round" stroke-width="2">
                            <path stroke-linejoin="round" d="M7 8l-4 4 4 4"></path>
                            <path d="M10.5 18l3-12"></path>
                            <path stroke-linejoin="round" d="M17 8l4 4-4 4"></path>
                        </g>
                    </svg>
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
                        class="md:text-sm sm:text-xl text-xl border border-cyan text-cyan md:px-4 sm:px-6 px-6 py-2 rounded-full hover:bg-cyan hover:text-black transition-colors duration-500">Contact
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
                    <svg class="size-10 md:max-lg:size-8 text-text transition-all duration-300 ease-in-out group-hover:scale-75"
                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9 17H15M9 13H15M9 9H10M13 3H8.2C7.0799 3 6.51984 3 6.09202 3.21799C5.71569 3.40973 5.40973 3.71569 5.21799 4.09202C5 4.51984 5 5.0799 5 6.2V17.8C5 18.9201 5 19.4802 5.21799 19.908C5.40973 20.2843 5.71569 20.5903 6.09202 20.782C6.51984 21 7.0799 21 8.2 21H15.8C16.9201 21 17.4802 21 17.908 20.782C18.2843 20.5903 18.5903 20.2843 18.782 19.908C19 19.4802 19 18.9201 19 17.8V9M13 3L19 9M13 3V7.4C13 7.96005 13 8.24008 13.109 8.45399C13.2049 8.64215 13.3578 8.79513 13.546 8.89101C13.7599 9 14.0399 9 14.6 9H19"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                    </svg>
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
                    <svg class="size-10 md:max-lg:size-8 text-text transition-all duration-300 ease-in-out group-hover:scale-75"
                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M21 13V17C21 18.1046 20.1046 19 19 19H9M5 19C3.89543 19 3 18.1046 3 17V9C3 7.89543 3.89543 7 5 7H7.5C8.05228 7 8.5 6.55228 8.5 6C8.5 5.44772 8.94772 5 9.5 5H14.5C15.0523 5 15.5 5.44772 15.5 6C15.5 6.55228 15.9477 7 16.5 7H19C20.1046 7 21 7.89543 21 9M9 13C9 14.6569 10.3431 16 12 16C13.6569 16 15 14.6569 15 13C15 11.3431 13.6569 10 12 10"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    </svg>
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
                    <svg viewBox="0 0 24 24" fill="none"
                        class=" size-10 md:max-lg:size-8 text-text transition-all duration-300 ease-in-out group-hover:scale-75"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8 10.5C8 11.3284 7.32843 12 6.5 12C5.67157 12 5 11.3284 5 10.5C5 9.67157 5.67157 9 6.5 9C7.32843 9 8 9.67157 8 10.5Z"
                            fill="currentColor"></path>
                        <path
                            d="M10.5 8C11.3284 8 12 7.32843 12 6.5C12 5.67157 11.3284 5 10.5 5C9.67157 5 9 5.67157 9 6.5C9 7.32843 9.67157 8 10.5 8Z"
                            fill="currentColor"></path>
                        <path
                            d="M17 6.5C17 7.32843 16.3284 8 15.5 8C14.6716 8 14 7.32843 14 6.5C14 5.67157 14.6716 5 15.5 5C16.3284 5 17 5.67157 17 6.5Z"
                            fill="currentColor"></path>
                        <path
                            d="M7.5 17C8.32843 17 9 16.3284 9 15.5C9 14.6716 8.32843 14 7.5 14C6.67157 14 6 14.6716 6 15.5C6 16.3284 6.67157 17 7.5 17Z"
                            fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M1 12C1 5.92487 5.92487 1 12 1C17.9712 1 23 5.34921 23 11V11.0146C23 11.543 23.0001 12.4458 22.6825 13.4987C21.8502 16.2575 18.8203 16.9964 16.4948 16.4024C16.011 16.2788 15.5243 16.145 15.0568 16.0107C14.2512 15.7791 13.5177 16.4897 13.6661 17.2315L13.9837 18.8197L14.0983 19.5068C14.3953 21.289 13.0019 23.1015 11.0165 22.8498C7.65019 22.423 5.11981 21.1007 3.43595 19.1329C1.75722 17.171 1 14.6613 1 12ZM12 3C7.02944 3 3 7.02944 3 12C3 14.2854 3.64673 16.303 4.95555 17.8326C6.25924 19.3561 8.3 20.4894 11.2681 20.8657C11.7347 20.9249 12.2348 20.4915 12.1255 19.8356L12.0163 19.1803L11.7049 17.6237C11.2467 15.3325 13.4423 13.4657 15.6093 14.0885C16.0619 14.2186 16.529 14.3469 16.9897 14.4646C18.7757 14.9208 20.3744 14.2249 20.7677 12.921C20.997 12.161 21 11.5059 21 11C21 6.65079 17.0745 3 12 3Z"
                            fill="currentColor"></path>
                    </svg>
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
                                    @include('partials.svg-icons')
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
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" stroke="#000000"
                        stroke-width="1" class=" size-10 md:max-lg:size-8 text-text">
                        <path
                            d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                    </svg>
                    <h3 class="text-lg font-semibold text-text">Location</h3>
                    <p class="max-w-lg text-grayBright text-sm">Currently Based In Tunisia</p>
                </div>
            </div>
        </div>

    </section>

@endsection
