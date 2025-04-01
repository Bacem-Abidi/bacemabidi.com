<footer class="bg-background">
    <div class="h-[1px] w-full bg-gradient-to-r from-background via-zinc-700 to-background"></div>
    <div class="mx-auto max-w-screen-xl space-y-8 px-4 py-16 lg:space-y-16">
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
            <div>
                <p class=" text-lg leading-none text-white"> Bacem Abidi
                </p>

                <p class="text-zinc-400  text-sm mt-3 max-w-xs">
                    Developer | 3D Artist<br>
                    A dedicated problem solver that builds scalable web and mobile apps, and create amazing 3D
                    environments
                </p>

                <ul class="mt-8 flex gap-6">
                    <li class="mt-0.5">
                        @include('partials.frontend.social-links.linkedin', ['size' => 'size-5'])
                    </li>


                    <li>
                        @include('partials.frontend.social-links.github', ['size' => 'size-6'])
                    </li>

                    <li>
                        @include('partials.frontend.social-links.instagram', ['size' => 'size-6'])
                    </li>
                    <li class="">
                        @include('partials.frontend.social-links.email', ['size' => 'size-6'])
                    </li>
                </ul>
            </div>

            <div class="grid grid-cols-2 gap-8 sm:grid-cols-2 lg:col-span-2 lg:grid-cols-4">
                <!-- Services -->
                <div>
                    <p class="text-white">My Work</p>
                    <ul class="mt-6 space-y-4 text-xs text-zinc-300">
                        <li>
                            <a href="{{ route('projects/coding-projects') }}" class="transition hover:text-cyan">
                                Coding Projects
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('projects/3d-projects') }}" class="transition hover:text-cyan">
                                3D Projects
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('projects/photography') }}" class="transition hover:text-cyan">
                                Photography
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- About -->
                <div>
                    <p class="text-white">About</p>
                    <ul class="mt-6 space-y-4 text-xs text-zinc-300">
                        <li>
                            <a href="{{ route('about') }}" class="transition hover:text-cyan">
                                About Me
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}" class="transition hover:text-cyan">
                                Contact
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Helpful Links -->
                <div>
                    <p class="text-white">Quick Links</p>
                    <ul class="mt-6 space-y-4 text-xs text-zinc-300">
                        <li>
                            <a href="{{ route('blog') }}" class="transition hover:text-cyan">
                                Blog
                            </a>
                        </li>


                        <li>
                            <a href="https://github.com/Bacem-Abidi/bacemabidi.com" class="transition hover:text-cyan"
                                target="_blank">
                                Source Code
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Legal -->
                <div>
                    <p class="text-white">Legal</p>
                    <ul class="mt-6 space-y-4 text-xs text-zinc-300">
                        <li>
                            <a href="{{ route('legal.privacy-policy') }}" class="transition hover:text-cyan">
                                Privacy Policy
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('legal.terms-of-service') }}" class="transition hover:text-cyan">
                                Terms of Service
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <p class="text-xs text-zinc-400">
                &copy; {{ date('Y') }}. Made with ❤️ By Me. All rights reserved.
            </p>
        </div>
    </div>
</footer>
