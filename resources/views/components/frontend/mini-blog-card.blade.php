<div class="h-[1px] w-full bg-gradient-to-r from-background via-zinc-700 to-background"></div>
<a href="{{ $blog['link'] }}" class="group flex gap-8 py-10 max-md:flex-col">
    <div class="h-fit w-fit bg-cover bg-center rounded-lg overflow-clip md:max-w-[260px] image-loaded">
        <img loading="lazy" width="1920" height="1440" decoding="async" data-nimg="1"
            class="relative z-10 rounded-[11px] transition-all duration-700 group-hover:scale-105 ease-in-out"
            srcset="{{ asset('storage/' . $blog['cover_image']) }}"
            src="{{ asset('storage/' . $blog['cover_image']) }}">
    </div>

    <div class="flex w-full flex-col justify-between lg:py-2">
        <div>
            <div class="space-x-1 text-sm text-grayBright">
                <span>{{ \Carbon\Carbon::parse($blog['blog_date'])->format('j. F Y') }}</span>
                @if ($blog['reading_time'] != null)
                    <span>•</span>
                    <span>{{ format_reading_time($blog['reading_time']) }}</span>
                @endif
            </div>
            <p class="mt-3 line-clamp-2 text-lg font-semibold leading-[1.4]">
                {{ $blog['title'] }} </p>
            <p class="mt-2 line-clamp-2 text-grayBright max-md:text-sm"> {{ $blog['description'] }}</p>
        </div>

        <div class="mt-4 flex justify-between gap-6 max-xs:flex-col-reverse xs:mt-6 xs:items-center"> <span
                class="items-center gap-2 w-fit text-sm text-emerald-400">Read more
                <i
                    class="fa-solid fa-arrow-right ml-1 pt-1 text-sm inline-block transition-all duration-300 group-hover:ml-2"></i>
            </span>
        </div>
    </div>
</a>
