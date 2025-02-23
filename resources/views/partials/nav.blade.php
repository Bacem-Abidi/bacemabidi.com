<nav class="fixed top-0 left-0 w-full bg-background bg-opacity-90 backdrop-blur-md z-50">
    <div class="container flex items-center justify-between mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8">
        <a href="{{ route('home') }}" class="text-xl font-medium">BACEM ABIDI</a>
        <ul class="flex space-x-6 bg-secondaryBackground bg-opacity-60 rounded-full px-4 py-1 text-sm">
            <li><a href="{{ route('home') }}"
                    class="hover:text-teal hover:text-opacity-100 transition-all duration-300 {{ Route::currentRouteName() == 'home' ? 'text-teal font-bold text-opacity-75' : 'text-text text-opacity-75' }}">Home</a>
            </li>
            <li><a href="{{ route('portfolio') }}"
                    class="hover:text-teal hover:text-opacity-100 transition-all duration-300 {{ Route::currentRouteName() == 'portfolio' ? 'text-teal font-bold text-opacity-75' : 'text-text text-opacity-75' }}">Portfolio</a>
            </li>
            <li><a href="{{ route('projects') }}"
                    class="hover:text-teal hover:text-opacity-100 transition-all duration-300 {{ Route::currentRouteName() == 'projects' ? 'text-teal font-bold text-opacity-75' : 'text-text text-opacity-75' }}">Projects</a>
            </li>
            <li><a href="{{ route('about') }}"
                    class="hover:text-teal hover:text-opacity-100 transition-all duration-300 {{ Route::currentRouteName() == 'about' ? 'text-teal font-bold text-opacity-75' : 'text-text text-opacity-75' }}">About</a>
            </li>
        </ul>
        {{-- <a href="{{ route('contact') }}"
            class="border-solid bg-thirdBackground rounded-full px-4 py-1 hover:bg-cyan hover:text-black transition-colors duration-500">Contact
            Me</a> --}}

        <a href="{{ route('contact') }}"
            class="border border-cyan text-cyan px-4 py-1 rounded-full hover:bg-cyan hover:text-black transition-colors duration-500">Contact</a>
    </div>
</nav>
