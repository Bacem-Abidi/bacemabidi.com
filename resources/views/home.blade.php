@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <section class="h-screen container flex items-center justify-left mx-auto max-w-screen-xl px-4">
        <div class="text-left relative z-10">
            <h1 class="text-[clamp(2rem,7vw,3rem)] font-bold leading-tight">
                Hi, I'm Bacem.<br>
                A <span class="text-orange">3D Blender Artist</span><br>
                && A <span class="text-cyan">Software Engineer</span>
            </h1>
            <p class="mb-8 mt-8 max-w-xl leading-relaxed text-text opacity-75 max-sm:text-sm">
                I create high-quality, game-ready 3D models and build scalable web and mobile applications using
                modern frameworks.
            </p>
        </div>


    </section>

    <section class="min-h-screen container flex  justify-left mx-auto max-w-screen-xl px-4">
        <div class="grid md:grid-cols-4 gap-4 my-10 h-full w-full auto-rows-[18rem]">

            <div
                class="group relative flex flex-col justify-between overflow-hidden rounded-2xl bg-background [border:1px_solid_rgba(255,255,255,.1)] [box-shadow:0_-20px_80px_-20px_#293040_inset] md:col-span-2">


            </div>

            <div
                class="group relative flex flex-col justify-between overflow-hidden rounded-2xl bg-background [border:1px_solid_rgba(255,255,255,.1)] [box-shadow:0_-20px_80px_-20px_#293040_inset]">


            </div>

            <div
                class="group relative flex flex-col justify-between overflow-hidden rounded-2xl bg-background [border:1px_solid_rgba(255,255,255,.1)] [box-shadow:0_-20px_80px_-20px_#293040_inset] md:row-span-2">


            </div>

            <div
                class="group relative flex flex-col justify-between overflow-hidden rounded-2xl bg-background [border:1px_solid_rgba(255,255,255,.1)] [box-shadow:0_-20px_80px_-20px_#293040_inset]">


            </div>

            <div
                class="group relative flex flex-col justify-between overflow-hidden rounded-2xl bg-background [border:1px_solid_rgba(255,255,255,.1)] [box-shadow:0_-20px_80px_-20px_#293040_inset] md:col-span-2">

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
                                    @include('components.svg-icons')
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>

                <div class="pointer-events-none z-10 flex transform-gpu flex-col gap-1 p-6 transition-all duration-300">
                    <h3 class="text-xl font-semibold text-text">Tech Stack I'm familiar with</h3>
                    <p class="max-w-lg text-gray text-opacity-90">Focusing on creating a seamless experience across all
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
                        stroke-width="1" width="48" height="48" class="text-text">
                        <path
                            d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                    </svg>
                    <h3 class="text-xl font-semibold text-text">Location</h3>
                    <p class="max-w-lg text-grayBright">Currently Based In Tunisia</p>
                </div>
            </div>
        </div>

    </section>

@endsection
