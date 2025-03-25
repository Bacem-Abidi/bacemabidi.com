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
                    <x-admin.tab-link href="#" onclick="return false;" class="opacity-50 cursor-not-allowed">
                        Case Studies (Coming Soon)
                    </x-admin.tab-link>
                </nav>

                <x-admin.status-badge :status="$project->is_published ? 'published' : 'draft'" />
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-admin-layout>
