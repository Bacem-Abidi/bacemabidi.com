<x-app-layout :title="'Projects'">

    <section class="container mx-auto max-w-screen-xl px-4 py-10 min-h-screen">
        <div class="flex items-center gap-4 mb-8 justify-between mt-12">
            <div class="flex items-center gap-4">
                <div class="h-px w-8 bg-cyan"></div>
                <h2 class="md:text-xl sm:text-lg font-bold text-cyan">Projects</h2>
            </div>
        </div>
        @if (count($projects) > 0)
            <section class="container">

                <div class="mt-12 grid gap-12 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($projects as $project)
                        @include('components.frontend.project-card', ['project' => $project])
                    @endforeach
                </div>

                <div class="mt-12 flex justify-center">

                </div>
            </section>
        @else
            <div class="text-center relative z-10">
                <h1 class="text-3xl">Coming Soon...</h1>
            </div>
        @endif
    </section>
</x-app-layout>
