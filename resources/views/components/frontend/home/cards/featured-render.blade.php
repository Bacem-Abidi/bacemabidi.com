<div
    {{ $attributes->merge(['class' => 'group relative flex flex-col justify-between overflow-hidden rounded-2xl bg-background [border:1px_solid_rgba(255,255,255,.1)] [box-shadow:0_-20px_80px_-20px_#293040_inset] md:col-span-2']) }}>
    <!-- Image Content -->
    <div>
        <div
            class="absolute right-0 bottom-[-5] origin-bottom translate-x-0 transition-all duration-300 ease-out [mask-image:linear-gradient(to_top,transparent_10%,#000_100%)] group-hover:scale-105">
            <div class="relative w-full overflow-hidden rounded-[11px]"><img loading="lazy" width="1600" height="412"
                    decoding="async" data-nimg="1"
                    class="grayscale group-hover:grayscale-0 relative z-10 rounded-[11px] transition-opacity duration-500 ease-in-out"
                    style="color: transparent;" srcset="{{ $imageUrl }}" src="{{ $imageUrl }}">
            </div>
        </div>
    </div>
    <div
        class="pointer-events-none z-10 flex transform-gpu flex-col gap-1 p-6 transition-all duration-300 group-hover:-translate-y-10">
        @include('partials.frontend.icons.icon-set', ['icon' => 'palette'])
        <h3 class="text-lg font-semibold text-text">{{ $title }}</h3>
        <p class="max-w-sm text-grayBright text-sm">{{ $description }}</p>
    </div>
    <div
        class="pointer-events-none absolute bottom-0 flex w-full translate-y-10 transform-gpu flex-row items-center p-4 opacity-0 transition-all duration-300 group-hover:translate-y-0 group-hover:opacity-100 group">
        <button
            class="inline-flex items-center justify-center text-sm font-medium transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed ring-offset-background select-none active:scale-[0.98] hover:bg-accent hover:text-accent-foreground h-9 px-3 rounded-md pointer-events-auto"><a
                class="flex items-center" href="{{ $link }}">Discover More <i
                    class="fa-solid fa-arrow-right ml-2 h-4 w-4 mt-1"></i></a></button>
    </div>
</div>
