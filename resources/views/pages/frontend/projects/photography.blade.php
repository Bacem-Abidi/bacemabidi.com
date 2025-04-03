<x-app-layout :title="'Photography'">
    @php
        $apiUrl = config('api.base_url') . '/photography';
    @endphp
    <section class="container mx-auto px-4 py-12" x-data="{
        images: [],
        nextPageUrl: '{{ $apiUrl }}?page=1',
        loading: false,
        hasMore: true,
        init() {
            this.loadImages();

            // Throttled scroll handler
            window.onscroll = () => {
                if (this.shouldLoadMore()) {
                    this.loadImages();
                }
            };
        },
        shouldLoadMore() {
            return (
                window.innerHeight + window.scrollY >=
                document.body.offsetHeight - 500 &&
                !this.loading &&
                this.hasMore
            );
        },
        async loadImages() {
            if (!this.nextPageUrl || this.loading) return;

            this.loading = true;
            try {
                const response = await fetch(this.nextPageUrl);
                const { data, next_page_url, current_page, last_page } = await response.json();

                this.images = [...this.images, ...data];
                this.nextPageUrl = next_page_url;
                this.hasMore = current_page < last_page;
            } catch (error) {
                console.error('Error loading images:', error);
            }
            this.loading = false;
        }
    }">
        <!-- Masonry Grid -->
        <div class="columns-2 md:columns-3 lg:columns-4 gap-4 space-y-4">
            <template x-for="image in images" :key="image.id">
                <div class="break-inside-avoid group relative">
                    <img :src="`{{ asset('storage/') }}/${image.url}`"
                        class="w-full rounded-lg shadow-lg transition-transform duration-300"
                        :alt="image.alt_text || 'Photography image'" loading="lazy" @load="$el.style.opacity = 1"
                        style="opacity: 0; transition: opacity 0.3s">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100" x-show="image.caption">
                        <p x-text="image.caption" class="text-white text-center p-4" x-show="image.caption"></p>
                    </div>
                </div>
            </template>
        </div>

        <!-- Loading Indicator -->
        <div class="text-center py-8" x-show="loading">
            <div class="inline-block animate-spin rounded-full h-8 w-8 border-4 border-gray-400 border-t-transparent">
            </div>
        </div>

        <!-- End of Results -->
        <div class="text-center py-8 text-gray-500" x-show="!hasMore && !loading">
            All images loaded
        </div>
    </section>
</x-app-layout>
