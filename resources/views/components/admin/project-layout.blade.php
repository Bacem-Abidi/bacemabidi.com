<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="">
        <div class="container mx-auto px-4">
            <div class="flex justify-between mb-6">
                <nav class="flex space-x-4" aria-label="Tabs">

                    <x-admin.tab-link href="{{ route('admin.projects.show', $project) }}" :active="request()->routeIs('admin.projects.show')">
                        Overview
                    </x-admin.tab-link>
                    <x-admin.tab-link href="{{ route('admin.projects.edit', $project) }}" :active="request()->routeIs('admin.projects.edit')">
                        Settings
                    </x-admin.tab-link>
                    <x-admin.tab-link href="{{ route('admin.projects.case-study', $project) }}" :active="request()->routeIs('admin.projects.case-study')">
                        Case Studies
                    </x-admin.tab-link>
                </nav>
                <div class="flex items-center">
                    {{-- <x-admin.status-badge :status="$project->is_published ? 'published' : 'draft'" /> --}}

                    <a href="{{ $previousProject ? route(request()->route()->getName(), $previousProject) : '#' }}"
                        class="text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-100  transition-colors {{ !$previousProject ? ' cursor-not-allowed' : '' }}"
                        aria-disabled="{{ !$previousProject }}">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        <span class="sr-only">Previous Project</span>
                    </a>

                    <a href="{{ $nextProject ? route(request()->route()->getName(), $nextProject) : '#' }}"
                        class="text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-100 transition-colors {{ !$nextProject ? ' cursor-not-allowed' : '' }}"
                        aria-disabled="{{ !$nextProject }}">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        <span class="sr-only">Next Project</span>
                    </a>
                </div>

            </div>


            <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-admin-layout>
