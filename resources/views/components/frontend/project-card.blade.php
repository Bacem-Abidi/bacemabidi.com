<article
    class="group relative flex flex-col h-full bg-gray-800 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden">
    <a href="{{ $project['link'] }}" class="flex flex-col h-full">
        <!-- Image Container -->
        <div class="relative aspect-[4/3] overflow-hidden">
            <img loading="lazy" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                src="{{ $project['featured_image'] ? asset('storage/' . $project['featured_image']) : asset('images/placeholder.jpg') }}"
                alt="{{ $project['title'] }}">
            <div
                class="absolute inset-0 bg-gradient-to-t from-gray-900/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            </div>
        </div>

        <!-- Content Container -->
        <div class="p-6 flex flex-col flex-grow">
            <!-- Tags -->
            @if ($project['tags'] != null)
                <div class="mb-3 flex flex-wrap gap-2">
                    @foreach ($project['tags'] as $tag)
                        <span class="px-3 py-1 text-xs font-medium rounded-full backdrop-blur-sm"
                            style="background-color: {{ $tag['color'] }}1A; color: {{ $tag['color'] }};">
                            {{ $tag['title'] }}
                        </span>
                    @endforeach
                </div>
            @endif

            <!-- Title & Description -->
            <h3 class="mb-2 text-xl font-bold text-white line-clamp-2">
                {{ $project['title'] }}
            </h3>
            <p class="mb-4 text-gray-300 line-clamp-3 flex-grow">
                {{ $project['description'] ?? 'No description available' }}
            </p>

            <!-- CTA -->
            <div class="mt-auto flex items-center text-emerald-500 dark:text-emerald-400 font-medium">
                <span class="mr-2">View Project</span>
                <i class="fa-solid fa-arrow-right text-sm transition-transform group-hover:translate-x-1"></i>
            </div>
        </div>
    </a>
</article>
