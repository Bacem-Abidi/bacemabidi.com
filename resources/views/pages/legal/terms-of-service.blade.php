<x-app-layout :title="'Terms Of Service'">
    <x-frontend.progress-bar />
    @php
        // Get the file path
        $filePath = resource_path('markdown/terms.md');
        $content = File::get($filePath);
        $lastModified = filemtime($filePath);
    @endphp
    <section class="container mx-auto max-w-screen-xl px-4 py-20">
        <div
            class="group relative flex flex-col justify-between rounded-2xl bg-background [border:1px_solid_rgba(255,255,255,.1)] [box-shadow:0_-20px_80px_-20px_#293040_inset]">
            <div class="border-b py-10 border-dashed border-gray-700">
                <div class="test-gray-35 mx-auto w-full justify-center text-center">
                    <h1 class="mx-6 py-4 font-heading text-2xl text-foreground sm:text-5xl font-bold"><span
                            style="display: inline-block; vertical-align: top; text-decoration: inherit; text-wrap: balance; max-width: 607px;">
                            Terms Of Service</span>
                    </h1>
                    <p class="text-sm leading-7 text-gray-400">Last Updated
                        {{ \Carbon\Carbon::parse($lastModified)->format('j. F Y') }}</p>
                </div>
            </div>
            <div class="mt-2 flex w-full gap-16 sm:mt-4 p-6 text-justify">
                <article id="article-content"
                    class="prose prose-invert max-w-none max-sm:prose-sm prose-headings:font-display prose-headings:scroll-m-16 sm:prose-headings:scroll-m-24 prose-a:article-link prose-a:text-teal">

                    {!! format_markdown_content($content) !!}
                </article>
                <aside class="w-60 shrink-0 space-y-8 max-lg:hidden">
                    <div class="font-secondary sticky top-32">
                        <p class="font-display text-lg font-semibold text-zinc-200">On this page</p>
                        <ul
                            class="mt-2 space-y-1.5 text-[0.9rem] text-zinc-600 scrollbar-color max-h-[480px] overflow-y-scroll">
                            @php
                                $content = File::get($filePath);
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
                                <li class="text-sm transition-colors text-zinc-400"
                                    style="margin-left: {{ max(0, $heading['level'] - 2) * 0.75 }}rem;">
                                    <a href="#{{ $slug }}" class="block py-1 truncate"
                                        data-level="{{ $heading['level'] }}">
                                        {{ $heading['text'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </section>
</x-app-layout>
