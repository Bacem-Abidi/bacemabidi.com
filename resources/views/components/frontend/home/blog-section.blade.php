@if (count($blogs) > 0)
    <section class="container mx-auto max-w-screen-xl px-4 py-20">
        <div class="flex items-center gap-4 mb-12 justify-between">
            <div class="flex items-center gap-4">
                <div class="h-px w-8 bg-cyan"></div>
                <h2 class="md:text-xl sm:text-lg font-bold text-cyan">Blog</h2>
            </div>

            <div class="flex items-center ">
                <a href="{{ route('blog') }}"
                    class="group md:text-sm sm:text-xs text-xs flex items-center rounded-full bg-cyan/10 px-6 py-3 text-cyan transition-all hover:bg-cyan/20">
                    Read All Articles
                    <i class="fa-solid fa-arrow-right ml-2 text-sm opacity-70 transition group-hover:translate-x-1"></i>
                </a>
            </div>
        </div>

        <div class="mt-12">
            @foreach ($blogs as $blog)
                @include('components.frontend.mini-blog-card', ['blog' => $blog])
            @endforeach
        </div>
        <div class="mt-12 flex justify-center">
        </div>
    </section>
@endif
