<div class="sticky inset-x-0 top-0 z-30 w-full transition-all">
    <div
        class="container relative z-10 h-14 items-center justify-between mx-auto max-w-screen-xl space-y-8 px-4">
        <div class="flex h-14 items-center justify-between">
            <a href="{{ route('home') }}" class="text-xl font-medium grow basis-0">BACEM ABIDI</a>
            <nav class="relative block" data-orientation="horizantal">
                <div class="relative">
                    <ul data-orientation="horizantal" class="relative flex flex-row gap-5 px-4 py-1 text-sm">
                        <div class="absolute inset-0 -z-[1]">
                            <div id="navBg"
                                class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 h-full w-full  rounded-full bg-secondaryBackground backdrop-blur-lg transition-all duration-300">
                            </div>
                        </div>
                        <li><a href="{{ route('home') }}"
                                class="hover:text-teal hover:text-opacity-100 transition-all duration-300 {{ Route::currentRouteName() == 'home' ? 'text-teal font-bold text-opacity-75' : 'text-text text-opacity-75' }}">Home</a>
                        </li>

                        <li class="relative group">
                            <!-- projects Dropdown Trigger -->
                            <a href="{{ route('projects') }}"
                                class="hover:text-teal hover:text-opacity-100 transition-all duration-300 {{ in_array(Route::currentRouteName(), ['projects', 'projects/3d-projects', 'projects/coding-projects', 'projects/photography']) ? 'text-teal font-bold text-opacity-75' : 'text-text text-opacity-75' }}">
                                Projects
                            </a>
                            <!-- Dropdown Menu -->
                            <ul
                                id="dropdown" class="absolute left-0 mt-2 space-y-2 bg-secondaryBackground backdrop-blur-lg rounded-lg shadow-lg p-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 min-w-[160px]">
                                <li>
                                    <a href="{{ route('projects/coding-projects') }}"
                                        class="block px-2 py-2 text-sm text-text hover:bg-teal/10 hover:text-teal rounded-lg transition-all duration-300">Coding
                                        Projects</a>
                                </li>
                                <li>
                                    <a href="{{ route('projects/3d-projects') }}"
                                        class="block px-4 py-2 text-sm text-text hover:bg-teal/10 hover:text-teal rounded-lg transition-all duration-300">3D
                                        Projects</a>
                                </li>
                                <li>
                                    <a href="{{ route('projects/photography') }}"
                                        class="block px-4 py-2 text-sm text-text hover:bg-teal/10 hover:text-teal rounded-lg transition-all duration-300">Photography</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('blog') }}"
                                class="hover:text-teal hover:text-opacity-100 transition-all duration-300 {{ Route::currentRouteName() == 'blog' ? 'text-teal font-bold text-opacity-75' : 'text-text text-opacity-75' }}">Blog</a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}"
                                class="hover:text-teal hover:text-opacity-100 transition-all duration-300 {{ Route::currentRouteName() == 'about' ? 'text-teal font-bold text-opacity-75' : 'text-text text-opacity-75' }}">About</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="grow basis-0 justify-end flex">
                <a href="{{ route('contact') }}"
                    class="text-sm border border-cyan text-cyan px-4 py-1 rounded-full hover:bg-cyan hover:text-black transition-colors duration-500">Contact</a>
            </div>
        </div>
    </div>
</div>
