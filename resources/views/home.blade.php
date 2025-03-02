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
                    class="pointer-events-none absolute bottom-0 flex w-full translate-y-10 transform-gpu flex-row items-center p-4 opacity-0 transition-all duration-300 group-hover:translate-y-0 group-hover:opacity-100">
                    <button
                        class="inline-flex items-center justify-center text-sm font-medium transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed ring-offset-background select-none active:scale-[0.98] hover:bg-accent hover:text-accent-foreground h-9 px-3 rounded-md pointer-events-auto"><a
                            class="flex items-center" href="#">Discover More <i class="fa-solid fa-arrow-right ml-2 h-4 w-4 mt-1"></i></a></button>
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
                                    @include('components.svg-icons')
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
