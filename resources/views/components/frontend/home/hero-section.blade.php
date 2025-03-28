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

    <x-frontend.home.3d-artwork />

</section>
