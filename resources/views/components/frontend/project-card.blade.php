<div
    class="group relative flex flex-col justify-between rounded-2xl bg-background [border:1px_solid_rgba(255,255,255,.1)] [box-shadow:0_-20px_80px_-20px_#293040_inset]">
    <a class="space-y-3 group flex flex-col h-full" href="{{ $project['link'] }}">
        <div class="h-fit w-fit bg-cover bg-center rounded-lg overflow-clip p-2">
            <img loading="lazy" width="1920" height="1440" decoding="async" data-nimg="1"
                class="relative z-10 rounded-[11px]" style="color: transparent;"
                srcset="{{ $project['cover_image'] != null ? asset('storage/' . $project['cover_image']) : asset('images/Renders/abandonedHouse/Render-Final-Processed-01.jpg') }}"
                src="{{ $project['cover_image'] != null ? asset('storage/' . $project['cover_image']) : asset('images/Renders/abandonedHouse/Render-Final-Processed-01.jpg') }}">
        </div>
        <div class="flex flex-col gap-4 flex-grow p-2">
            @if ($project['tags'] != null)
                <div class="flex flex-wrap gap-2">
                    @foreach ($project['tags'] as $tag)
                        <span style="background-color: {{ $tag['color'] }}1A; color: {{ $tag['color'] }}"
                            class="line-clamp-2 px-3 py-1 text-xs rounded-full ">
                            {{ $tag['title'] }}
                        </span>
                    @endforeach
                </div>
            @endif
            <h4 class="line-clamp-2 text-xl font-semibold !leading-[1.25] max-sm:text-lg text-text">
                {{ $project['title'] }}
            </h4>
            <p class="line-clamp-2 text-sm text-grayBright flex-grow">
                {{ $project['description'] != null ? $project['description'] : 'no desc available' }} </p>
            <span class="w-fit text-sm text-emerald-400 flex items-center gap-2">View Project
                <i
                    class="fa-solid fa-arrow-right ml-1 pt-1 text-sm inline-block transition-all duration-300 group-hover:ml-2"></i>
            </span>
        </div>
    </a>
</div>
