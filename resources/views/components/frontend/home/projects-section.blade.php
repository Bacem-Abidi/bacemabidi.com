@if (count($projects) > 0)
    <section class="container mx-auto max-w-screen-xl px-4 py-20">
        <div class="flex items-center gap-4 mb-12 justify-between">
            <div class="flex items-center gap-4">
                <div class="h-px w-8 bg-cyan"></div>
                <h2 class="md:text-xl sm:text-lg font-bold text-cyan">Projects</h2>
            </div>
            <a href="{{ route('projects') }}"
                class="group md:text-sm sm:text-xs text-xs flex items-center rounded-full bg-cyan/10 px-6 py-3 text-cyan transition-all hover:bg-cyan/20">
                View All Projects
                <i class="fa-solid fa-arrow-right ml-2 text-sm opacity-70 transition group-hover:translate-x-1"></i>
            </a>
        </div>

        <div class="mt-12 grid gap-12 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($projects as $project)
                @include('components.frontend.mini-project-card', ['project' => $project])
            @endforeach
        </div>
    </section>
@endif
