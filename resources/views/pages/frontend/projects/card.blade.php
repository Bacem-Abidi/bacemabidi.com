<x-app-layout :title="$project['title']">
    <section class="container mx-auto max-w-screen-xl px-4 py-20">
        <div
            class="group relative flex flex-col justify-between rounded-2xl bg-background [border:1px_solid_rgba(255,255,255,.1)] [box-shadow:0_-20px_80px_-20px_#293040_inset]">
            <div class="m-6">
                <h2>{{ $project['project_date'] }}</h2>
                <h1
                    class="font-heading mt-4 text-[clamp(1.8rem,5vw,2.5rem)] font-bold leading-[1.25] sm:mt-6 md:leading-[1.1]">
                    {{ $project['title'] }}</h1>
                <h3 class="mt-4 text-zinc-400 max-sm:text-sm">{{ $project['description'] }}</h3>
                @if ($project['tags'])
                    <div class="mt-4 flex gap-4 max-sm:flex-col-reverse sm:mt-6 sm:items-center sm:justify-between">
                        <ul class="flex flex-wrap gap-2 sm:gap-4">
                            @foreach ($project['tags'] as $tag)
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
                    srcset="{{ $project['featured_image'] != null ? asset('storage/' . $project['featured_image']) : asset('images/Renders/abandonedHouse/Render-Final-Processed-01.jpg') }}"
                    src="{{ $project['featured_image'] != null ? asset('storage/' . $project['featured_image']) : asset('images/Renders/abandonedHouse/Render-Final-Processed-01.jpg') }}">
            </div>
            @if ($project && Storage::disk('public')->exists("projects/{$project['id']}/case-study.md"))
                <div class="mt-2 flex w-full gap-16 sm:mt-4 p-6">
                    <article
                        class="prose prose-invert max-w-none max-sm:prose-sm prose-headings:font-display prose-headings:scroll-m-16 sm:prose-headings:scroll-m-24 prose-a:article-link prose-a:text-teal">
                        @php
                            $content = Storage::disk('public')->get("projects/{$project['id']}/case-study.md");
                            $html = Str::markdown($content);

                            // Add IDs to headings
                            $html = preg_replace_callback(
                                '/<h([1-6])>(.*?)<\/h[1-6]>/',
                                function ($matches) {
                                    $slug = Str::slug(strip_tags($matches[2]));
                                    return "<h{$matches[1]} id=\"{$slug}\">{$matches[2]}</h{$matches[1]}>";
                                },
                                $html,
                            );
                        @endphp

                        {!! $html !!}
                    </article>
                    <aside class="w-60 shrink-0 space-y-8 max-lg:hidden">
                        <div class="font-secondary sticky top-32">
                            <p class="font-display text-lg font-semibold text-zinc-200">On this page</p>
                            <ul
                                class="mt-2 space-y-1.5 text-[0.9rem] text-zinc-600 scrollbar-color max-h-[480px] overflow-y-scroll">
                                @php
                                    $content = Storage::disk('public')->get("projects/{$project['id']}/case-study.md");
                                    preg_match_all('/^(#{1,6})\s+(.*)/m', $content, $matches);
                                @endphp

                                @foreach ($matches[2] as $index => $heading)
                                    @php
                                        $level = strlen($matches[1][$index]);
                                        $slug = Str::slug($heading);
                                    @endphp
                                    <li class="text-sm transition-colors hover:text-white"
                                        style="margin-left: {{ max(0, $level - 2) * 0.75 }}rem">
                                        <a href="#{{ $slug }}" class="block py-1 truncate"
                                            data-level="{{ $level }}">
                                            {{ $heading }}
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
                        Case Study Coming Soon...
                    </h1>
                    <p class="text-gray-300">
                        I'm currently working on documenting this project's details.
                    </p>
                </div>
            @endif

        </div>
    </section>


</x-app-layout>
