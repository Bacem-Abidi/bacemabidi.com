<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tags-Create') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-6">Create New Tag</h1>

        <form action="{{ route('admin.tags.store') }}" method="POST">
            @csrf

            <div class="bg-white rounded-lg shadow p-6 dark:bg-[#1E2234]">
                <div class="mb-4">
                    <x-admin.label for="title" value="{{ __('Title') }}" />
                    <x-admin.input class="mt-1"  type="text" name="title" required />
                </div>

                <div class="mb-4">
                    <x-admin.label for="color" value="{{ __('Color') }}" />
                    <x-admin.input class="mt-1"  type="color" name="color" required />
                </div>

                <x-admin.button>{{ __('Create Tag') }}</x-admin.button>

            </div>
        </form>
    </div>
</x-admin-layout>
