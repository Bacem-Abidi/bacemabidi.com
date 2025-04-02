<x-app-layout :title="'About'">
    <section class="min-h-screen container mx-auto max-w-screen-xl px-4 py-10">
        <!-- Hero Section -->
        <div
            class="relative flex flex-col justify-between rounded-2xl bg-background [border:1px_solid_rgba(255,255,255,.1)] [box-shadow:0_-20px_80px_-20px_#293040_inset]">
            <div class="grid md:grid-cols-3 gap-10 items-center mb-12 mt-16 mx-16 group">
                <div class="md:col-span-1 flex justify-center">
                    <div
                        class="relative  w-64 h-64 rounded-2xl overflow-hidden border-2 border-gray-900 group-hover:border-teal transition-all duration-500">
                        <img loading="lazy" decoding="async" data-nimg="1"
                            class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500"
                            style="color: transparent;" srcset="{{ asset('images/selfie.jpg') }}"
                            src="{{ asset('images/selfie.jpg') }}">
                        <div
                            class="absolute inset-0 bg-teal-400/10 mix-blend-overlay group-hover:opacity-0 transition-opacity duration-300">
                        </div>
                    </div>
                </div>

                <div class="md:col-span-2">
                    <h1 class="text-4xl font-bold text-white mb-4">Software Engineer & 3D Artist</h1>
                    <p class="text-gray-400 text-base mb-6">
                        Hi I'm Bacem Abidi, a Software engineer based in Tunisia. I love working
                    </p>
                    <div class="flex space-x-4 items-center">
                        @include('partials.frontend.social-links.github', ['size' => 'size-9'])
                        @include('partials.frontend.social-links.linkedin', ['size' => 'size-7'])
                        @include('partials.frontend.social-links.email', ['size' => 'size-9'])
                        @include('partials.frontend.social-links.instagram', ['size' => 'size-8'])
                    </div>
                </div>
            </div>

            <!-- Skills Grid -->
            <div class="mb-12 mt-10 mx-16">
                <h2 class="text-3xl font-bold text-white mb-8">Technical Arsenal</h2>
                <div class="grid md:grid-cols-3 gap-6">
                    <!-- Full-Stack Development -->
                    <div
                        class="bg-gray-800 p-6 rounded-xl border border-gray-700 hover:border-teal transition-colors">
                        <div class="text-teal-400 mb-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="text-white text-xl mb-2">Full-Stack Development</h3>
                        <ul class="text-gray-400 space-y-1">
                            <li>Laravel · React</li>
                            <li>Node.js · REST APIs</li>
                            <li>MySQL · Firebase</li>
                        </ul>
                    </div>

                    <!-- 3D & Game Dev -->
                    <div
                        class="bg-gray-800 p-6 rounded-xl border border-gray-700 hover:border-teal transition-colors">
                        <div class="text-teal-400 mb-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
                            </svg>
                        </div>
                        <h3 class="text-white text-xl mb-2">3D & Game Development</h3>
                        <ul class="text-gray-400 space-y-1">
                            <li>Blender · Substance Painter</li>
                            <li>Unreal Engine</li>
                            <li>C# · C++</li>
                        </ul>
                    </div>

                    <!-- Mobile Solutions -->
                    <div
                        class="bg-gray-800 p-6 rounded-xl border border-gray-700 hover:border-teal transition-colors">
                        <div class="text-teal-400 mb-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                            </svg>
                        </div>
                        <h3 class="text-white text-xl mb-2">Mobile Solutions</h3>
                        <ul class="text-gray-400 space-y-1">
                            <li>Flutter</li>
                            <li>Java · Kotlin</li>
                            <li>Cross-Platform APIs</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Experience Timeline -->
            <div class="mb-12 mt-10 mx-16">
                <h2 class="text-3xl font-bold text-white mb-12">Experience</h2>
                <div class="relative">
                    <!-- Timeline Item -->
                    <div class="border-l-2 border-gray-700 pl-8 pb-8 relative">
                        <div class="absolute w-4 h-4 bg-teal-400 rounded-full -left-[9px] top-0 ring-4 ring-teal">
                        </div>
                        <h3 class="text-white text-xl font-semibold">Senior Developer</h3>
                        <p class="text-gray-400 mb-2">Tech Corp · 2022-Present</p>
                        <p class="text-gray-400">Led team in developing enterprise applications...</p>
                    </div>

                    <!-- Add more timeline items -->
                </div>
            </div>

            <!-- Education -->
            <div class="mb-12 mt-10 mx-16">
                <h2 class="text-3xl font-bold text-white mb-8">Education</h2>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="bg-gray-800 p-6 rounded-xl border border-gray-700">
                        <h3 class="text-white text-xl mb-2">Computer Science Degree</h3>
                        <p class="text-gray-400 mb-2">University Name · 2018-2022</p>
                        <p class="text-gray-400">Focus on software architecture and web development...</p>
                    </div>
                </div>
            </div>

            <!-- Project Highlights -->
            {{-- <div class="mb-12 mt-10 mx-16">
                <h2 class="text-3xl font-bold text-white mb-12">Notable Projects</h2>
                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Project 1 -->
                    <div
                        class="bg-gray-800 p-6 rounded-xl border border-gray-700 hover:border-teal-400/30 transition-colors">
                        <h3 class="text-white text-xl mb-2">Integrated Health Platform</h3>
                        <p class="text-gray-400 mb-2">Mobile App + Web Dashboard</p>
                        <p class="text-gray-400 text-sm">
                            Developed a full-stack health monitoring system with real-time analytics,
                            featuring cross-platform mobile app and clinician web portal.
                        </p>
                    </div>

                    <!-- Project 2 -->
                    <div
                        class="bg-gray-800 p-6 rounded-xl border border-gray-700 hover:border-teal-400/30 transition-colors">
                        <h3 class="text-white text-xl mb-2">3D Architectural Visualizer</h3>
                        <p class="text-gray-400 mb-2">Blender + Web Integration</p>
                        <p class="text-gray-400 text-sm">
                            Created interactive 3D property tours with real-time rendering
                            and VR compatibility for real estate presentations.
                        </p>
                    </div>
                </div>
            </div> --}}

            <!-- Call to Action -->
            <div class="mb-16 mt-10 mx-16 text-center">
                <h3 class="text-2xl text-white mb-4">Let's Work Together!</h3>
                <p class="text-gray-400 mb-6">Have a project in mind? Let's bring your ideas to life</p>
                <a href="{{ route('contact') }}"
                    class="inline-flex items-center px-8 py-3 text-sm bg-cyan/10 text-cyan transition-all hover:bg-cyan/20 rounded-full duration-500">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    Contact Me
                </a>
            </div>
        </div>
    </section>
</x-app-layout>
