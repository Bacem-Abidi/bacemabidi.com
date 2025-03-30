<x-admin.blog-layout :blog="$blog" :previousBlog="$previousBlog" :nextBlog="$nextBlog">
    <div class="px-6 py-8 space-y-8">
        <!-- Blog Header -->
        <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $blog->title }}</h1>
            <p class="mt-2 text-gray-600 dark:text-gray-400">
                Last updated {{ $blog->updated_at->diffForHumans() }}
            </p>
        </div>

        <!-- Blog Details Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-admin.detail-card title="Basic Information">
                <dl class="space-y-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Slug</dt>
                        <dd class="mt-1 text-gray-900 dark:text-gray-200 font-mono">{{ $blog->slug }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Blog Date</dt>
                        <dd class="mt-1 text-gray-900 dark:text-gray-200">{{ $blog->blog_date }}
                        </dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Visibility</dt>
                        <dd class="mt-1">
                            <x-admin.status-badge :status="$blog->is_published ? 'published' : 'draft'" />
                        </dd>
                    </div>
                </dl>
            </x-admin.detail-card>

            <x-admin.detail-card title="Tags">
                <dl class="space-y-4">
                    <div class="flex flex-wrap gap-2">
                        @foreach ($blog->tags as $tag)
                            <span class="px-2 py-1 rounded-full text-sm"
                                style="background-color: {{ $tag->color }}1A; color: {{ $tag->color }};">
                                {{ $tag->title }}
                            </span>
                        @endforeach
                    </div>
                    <div>
                        <h3 class="mb-2 text-lg font-semibold text-gray-900 dark:text-gray-100">Featured</h3>
                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $blog->featured ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-100' : 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200' }}">
                            {{ $blog->featured ? 'Yes' : 'No' }}
                        </span>
                    </div>
                </dl>
                <div class="prose dark:prose-invert max-w-none">
                    <h3 class="mb-2 text-lg font-semibold text-gray-900 dark:text-gray-100">Description</h3>
                    @if ($blog->description != null)
                        <p>{{ $blog->description }}</p>
                    @else
                        <p>No description is available</p>
                    @endif
                </div>
            </x-admin.detail-card>
        </div>



        <x-admin.detail-card title="Cover Image" class="col-span-full">
            @if ($blog->description != null)
                <img loading="lazy" width="3840" height="2880" decoding="async" data-nimg="1"
                    class="object-cover object-top h-[inherit] max-h-[inherit] rounded-[inherit] aspect-[2] w-full xs:aspect-[2]"
                    style="color: transparent;"
                    srcset="{{ $blog->cover_image != null ? asset('storage/' . $blog->cover_image) : asset('images/Renders/abandonedHouse/Render-Final-Processed-01.jpg') }}"
                    src="{{ $blog->cover_image != null ? asset('storage/' . $blog->cover_image) : asset('images/Renders/abandonedHouse/Render-Final-Processed-01.jpg') }}">
            @else
                <h3 class="mb-2 text-lg font-semibold text-gray-900 dark:text-gray-100">No Cover Image is available</h3>
            @endif
        </x-admin.detail-card>
    </div>
</x-admin.blog-layout>
