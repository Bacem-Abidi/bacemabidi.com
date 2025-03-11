<a class="space-y-6 group" href="{{ $project['link'] }}">
    <div class="blur-load h-fit w-fit bg-cover bg-center rounded-lg overflow-clip image-loaded">
        <img loading="lazy" width="1920" height="1440" decoding="async" data-nimg="1"
            class="relative z-10 rounded-[11px] transition-all duration-700 group-hover:scale-105 ease-in-out"
            style="color: transparent;" srcset="{{ asset($project['image']) }}" src="{{ asset($project['image']) }}">
    </div>

    <div class="flex flex-col gap-4">
        <div class="flex flex-wrap gap-2">
            @foreach ($project['tech_stack'] as $tech)
                @php $color = techColor($tech); @endphp
                <span
                    class="line-clamp-2 px-3 py-1 text-xs bg-{{ $color }}/10 text-{{ $color }} rounded-full ">
                    {{ $tech }}
                </span>
            @endforeach
        </div>
        <h4 class="line-clamp-2 text-xl font-semibold !leading-[1.25] max-sm:text-lg text-text">{{ $project['title'] }}
        </h4>
        <p class="line-clamp-2 text-sm text-grayBright"> {{ $project['desc'] }} </p>
        <span class="w-fit text-sm text-emerald-400 flex items-center gap-2">Read
            more
            <i
                class="fa-solid fa-arrow-right ml-1 pt-1 text-sm inline-block transition-all duration-300 group-hover:ml-2"></i>
        </span>
    </div>
</a>
