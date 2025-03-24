<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tags-Edit') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-6">Create New Tag</h1>

        <form action="{{ route('admin.tags.update', $tag) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="bg-white rounded-lg shadow p-6 dark:bg-[#1E2234]">
                <div class="mb-4">
                    <x-admin.label for="title" value="{{ __('Title') }}" />
                    <x-admin.input class="mt-1" type="text" name="title" value="{{ old('title', $tag->title) }}" required />
                </div>

                <div class="mb-4">
                    <x-admin.label for="color" value="{{ __('Color') }}" />
                    <x-admin.input class="mt-1" type="color" name="color" value="{{ old('color', $tag->color) }}" required />
                    {{-- <x-admin.color-picker name="color" value="{{ old('color', $tag->color ?? '#3B82F6') }}" required /> --}}
                </div>
                <x-admin.button>{{ __('update Tag') }}</x-admin.button>

                <a href="{{ route('admin.tags.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-red-400 dark:bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest hover:bg-red-500 dark:hover:bg-red-400 focus:bg-red-600 dark:focus:bg-red-400 active:bg-red-700 dark:active:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-admin-layout>
