<x-app-layout :title="$blog['title']">
    <div class="fixed top-0 left-0 h-0.5 z-50 w-full">
        <span id="progress"
            class="pointer-events-none fixed end-0 start-0 top-0 z-30 w-0 overflow-clip rounded-full transition-[width] duration-300 ease-out"
            style="height: 2px; width: 0%;"><span class="absolute block h-full w-screen bg-teal"
                style="transform: translateX(-100%);"></span></span>
    </div>
    <section class="container mx-auto max-w-screen-xl px-4 py-20">
        <div
            class="group relative flex flex-col justify-between rounded-2xl bg-background [border:1px_solid_rgba(255,255,255,.1)] [box-shadow:0_-20px_80px_-20px_#293040_inset]">
            <div class="m-6">

                <h2><i
                        class="fa-solid fa-calendar-days mr-3"></i>{{ \Carbon\Carbon::parse($blog['blog_date'])->format('j. F Y') }}
                    @if ($blog['reading_time'] != null)
                        <span>•</span>
                        <span>{{ format_reading_time($blog['reading_time']) }}</span>
                    @endif
                </h2>
                <h1
                    class="font-heading mt-4 text-[clamp(1.8rem,5vw,2.5rem)] font-bold leading-[1.25] sm:mt-6 md:leading-[1.1]">
                    {{ $blog['title'] }}</h1>
                <h3 class="mt-4 text-zinc-400 max-sm:text-sm">{{ $blog['description'] }}</h3>
                @if ($blog['tags'])
                    <div class="mt-4 flex gap-4 max-sm:flex-col-reverse sm:mt-6 sm:items-center sm:justify-between">
                        <ul class="flex flex-wrap gap-2 sm:gap-4">
                            @foreach ($blog['tags'] as $tag)
                                <li class="px-3 py-1 text-sm rounded-full backdrop-blur-sm"
                                    style="background-color: {{ $tag['color'] }}1A; color: {{ $tag['color'] }};">
                                    {{ $tag['title'] }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="h-fit w-fit bg-cover bg-top rounded-lg p-6">
                <img loading="lazy" width="3840" height="2880" decoding="async" data-nimg="1"
                    class="object-cover object-top h-[inherit] max-h-[inherit] rounded-[inherit] aspect-[2] w-full xs:aspect-[2]"
                    style="color: transparent;"
                    srcset="{{ $blog['cover_image'] != null ? asset('storage/' . $blog['cover_image']) : asset('images/Renders/abandonedHouse/Render-Final-Processed-01.jpg') }}"
                    src="{{ $blog['cover_image'] != null ? asset('storage/' . $blog['cover_image']) : asset('images/Renders/abandonedHouse/Render-Final-Processed-01.jpg') }}">
            </div>
            @if ($blog && Storage::disk('public')->exists("blog/{$blog['id']}/content.md"))
                <div class="mt-2 flex w-full gap-16 sm:mt-4 p-6">
                    <article
                        class="prose prose-invert max-w-none max-sm:prose-sm prose-headings:font-display prose-headings:scroll-m-16 sm:prose-headings:scroll-m-24 prose-a:article-link prose-a:text-teal">
                        @php
                            $content = Storage::disk('public')->get("blog/{$blog['id']}/content.md");
                        @endphp

                        {!! format_markdown_content($content) !!}
                    </article>
                    <aside class="w-60 shrink-0 space-y-8 max-lg:hidden">
                        <div class="font-secondary sticky top-32">
                            <p class="font-display text-lg font-semibold text-zinc-200">On this page</p>
                            <ul
                                class="mt-2 space-y-1.5 text-[0.9rem] text-zinc-600 scrollbar-color max-h-[480px] overflow-y-scroll">
                                @php
                                    $content = Storage::disk('public')->get("blog/{$blog['id']}/content.md");

                                    // Improved heading extraction that ignores code blocks
                                    preg_match_all('/^#{1,6}\s+(.+)$/m', $content, $matches, PREG_SET_ORDER);

                                    $headings = [];
                                    $inCodeBlock = false;

                                    foreach (explode("\n", $content) as $line) {
                                        // Track code blocks
                                        if (preg_match('/^```/', $line)) {
                                            $inCodeBlock = !$inCodeBlock;
                                            continue;
                                        }

                                        if (!$inCodeBlock && preg_match('/^(#{1,6})\s+(.*)/', $line, $matches)) {
                                            $headings[] = [
                                                'level' => strlen($matches[1]),
                                                'text' => $matches[2],
                                            ];
                                        }
                                    }
                                @endphp

                                @foreach ($headings as $heading)
                                    @php
                                        $slug = Str::slug($heading['text']);
                                    @endphp
                                    <li class="..."
                                        style="margin-left: {{ max(0, $heading['level'] - 2) * 0.75 }}rem;">
                                        <a href="#{{ $slug }}" class="...">
                                            {{ $heading['text'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
            @else
                <div class="text-center py-20">
                    <h1 class="text-3xl font-bold text-white mb-4">
                        Blog Coming Soon...
                    </h1>
                    <p class="text-gray-300">
                        I'm currently working on writing this Blog.
                    </p>
                </div>
            @endif

        </div>
    </section>
    <script>
        // Section Highlight Logic
        function updateActiveLinks() {
            const headings = document.querySelectorAll(
                'article h1, article h2, article h3, article h4, article h5, article h6');
            const links = document.querySelectorAll('aside a');

            let closest = null;
            let closestDistance = Infinity;

            headings.forEach(heading => {
                const rect = heading.getBoundingClientRect();
                if (rect.top < window.innerHeight * 0.2 && rect.bottom > 0) {
                    const distance = Math.abs(rect.top);
                    if (distance < closestDistance) {
                        closest = heading.id;
                        closestDistance = distance;
                    }
                }
            });

            links.forEach(link => {
                const href = link.getAttribute('href').substring(1);
                link.classList.toggle('text-teal-400', href === closest);
                link.classList.toggle('text-zinc-600', href !== closest);
            });
        }

        // Progress Bar Logic
        const progressBar = document.getElementById('progress');
        const articleElement = document.querySelector('article.prose');
        let articleTop = 0;
        let articleHeight = 0;
        let scrollableHeight = 0;

        function calculateArticleMetrics() {
            if (articleElement) {
                const rect = articleElement.getBoundingClientRect();
                articleTop = rect.top + window.scrollY;
                articleHeight = articleElement.offsetHeight;
                scrollableHeight = articleHeight - window.innerHeight;
            }
        }

        function easeInOutCubic(t) {
            return t < 0.5 ? 4 * t * t * t : 1 - Math.pow(-2 * t + 2, 3) / 2;
        }

        function updateProgress() {
            if (!articleElement) return;

            const scrollY = window.scrollY;
            let progress = 0;

            if (scrollY >= articleTop) {
                const scrolled = Math.min(scrollY - articleTop, scrollableHeight);
                const rawProgress = Math.min(scrolled / scrollableHeight, 1);
                progress = easeInOutCubic(rawProgress) * 100;
            }

            progressBar.style.width = `${progress}%`;
            progressBar.querySelector('span').style.transform = `translateX(-${100 - progress}%)`;
        }

        // Initialize and recalculate on resize
        calculateArticleMetrics();
        window.addEventListener('resize', calculateArticleMetrics);

        // Smooth scroll handler
        document.querySelectorAll('aside a').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                const targetPosition = target.getBoundingClientRect().top + window.scrollY - 75;
                const startPosition = window.scrollY;
                const distance = targetPosition - startPosition;
                const duration = 800;
                let startTime = null;

                function animation(currentTime) {
                    if (!startTime) startTime = currentTime;
                    const timeElapsed = currentTime - startTime;
                    const progress = Math.min(timeElapsed / duration, 1);
                    const easeProgress = easeInOutCubic(progress);

                    window.scrollTo(0, startPosition + (distance * easeProgress));

                    if (timeElapsed < duration) {
                        requestAnimationFrame(animation);
                    }
                }

                requestAnimationFrame(animation);
            });
        });

        // Scroll listener with throttling
        let isScrolling = false;
        window.addEventListener('scroll', () => {
            if (!isScrolling) {
                window.requestAnimationFrame(() => {
                    updateProgress();
                    updateActiveLinks();
                    isScrolling = false;
                });
                isScrolling = true;
            }
        });
    </script>
</x-app-layout>
