<x-admin.project-layout :project="$project" :previousProject="$previousProject" :nextProject="$nextProject">
    <div class="px-6 py-8 space-y-8">
        <!-- Project Header -->
        <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $project->title }}</h1>
            <p class="mt-2 text-gray-600 dark:text-gray-400">
                Last updated {{ $project->updated_at->diffForHumans() }}
            </p>
        </div>

        <!-- Project Details Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-admin.project-detail-card title="Basic Information">
                <dl class="space-y-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Slug</dt>
                        <dd class="mt-1 text-gray-900 dark:text-gray-200 font-mono">{{ $project->slug }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Project Date</dt>
                        <dd class="mt-1 text-gray-900 dark:text-gray-200">{{ $project->project_date }}
                        </dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Visibility</dt>
                        <dd class="mt-1">
                            <x-admin.status-badge :status="$project->is_published ? 'published' : 'draft'" />
                        </dd>
                    </div>
                </dl>
            </x-admin.project-detail-card>

            <x-admin.project-detail-card title="Tags">
                <dl class="space-y-4">
                    <div class="flex flex-wrap gap-2">
                        @foreach ($project->tags as $tag)
                            <span class="px-2 py-1 rounded-full text-sm"
                                style="background-color: {{ $tag->color }}1A; color: {{ $tag->color }};">
                                {{ $tag->title }}
                            </span>
                        @endforeach
                    </div>
                    <div>
                        <h3 class="mb-2 text-lg font-semibold text-gray-900 dark:text-gray-100">Featured</h3>
                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $project->featured ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-100' : 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200' }}">
                            {{ $project->featured ? 'Yes' : 'No' }}
                        </span>
                    </div>
                </dl>

            </x-admin.project-detail-card>
        </div>

        <!-- Description Card -->
        <x-admin.project-detail-card title="Description" class="col-span-full">
            <div class="prose dark:prose-invert max-w-none">
                @if ($project->description != null)
                    {!! Str::markdown($project->description) !!}
                @endif
            </div>
        </x-admin.project-detail-card>
    </div>
</x-admin.project-layout>
