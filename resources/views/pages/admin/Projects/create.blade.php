<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Projects-Create') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-6">Create Project</h1>
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="bg-white rounded-lg shadow p-6 dark:bg-[#1E2234]">
                <!-- Title -->
                <div class="mb-4">
                    {{-- <label class="block text-gray-700 dark:text-text text-sm font-bold mb-2">Title</label>
                    <input type="text" name="title"
                        class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                        required> --}}

                    <x-admin.label for="title" value="{{ __('Title') }}" />
                    <x-admin.input name="title" id="title" class="block mt-1 w-full" type="text"
                        value="{{ old('title') }}" required />
                </div>

                <!-- Slug -->
                <div class="mb-4">
                    {{-- <label class="block text-gray-700 dark:text-text text-sm font-bold mb-2">Slug</label>
                    <input type="text" name="slug"
                        class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                        required> --}}

                    <x-admin.label for="slug" value="{{ __('Slug') }}" />
                    <x-admin.input name="slug" id="slug" class="block mt-1 w-full" type="text"
                        value="{{ old('slug') }}" required />
                </div>

                <!-- Featured Image Upload -->
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-text text-sm font-bold mb-2">Featured Image</label>
                    <input type="file" name="featured_image" class="">
                </div>

                <!-- Project Date -->
                <div class="mb-4">
                    {{-- <label class="block text-gray-700 dark:text-text text-sm font-bold mb-2">Project Date</label>
                    <input type="date" name="project_date"
                        class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                        required> --}}

                    <x-admin.label for="project_date" value="{{ __('Project Date') }}" />
                    <x-admin.input name="project_date" id="project_date" class="block mt-1 w-full" type="date"
                        value="{{ old('project_date') }}" required />
                </div>

                <!-- Is Published -->
                <div class="mb-4">
                    {{-- <label class="block text-gray-700 dark:text-text text-sm font-bold mb-2">Publish Status</label> --}}
                    <x-admin.label for="is_published" value="{{ __('Publish Status') }}" />
                    <select name="is_published" id="is_published"
                        class="border-gray-300 dark:border-gray-700 dark:bg-[#2D334E] dark:text-gray-300 focus:border-teal dark:focus:border-teal focus:ring-teal dark:focus:ring-teal rounded-md shadow-sm font-robotoMono w-full block mt-1">
                        <option value="1" {{ old('is_published') == 1 ? 'selected' : '' }}>Published</option>
                        <option value="0" {{ old('is_published') == 0 ? 'selected' : '' }}>Unpublished
                        </option>
                    </select>
                </div>

                {{-- Featured --}}
                <div class="mb-4">
                    <label for="featured" class="flex items-center">
                        <input type="hidden" name="featured" value="0">
                        <x-admin.checkbox id="featured" name="featured" value="1" :checked="old('featured')" />
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Featured') }}</span>
                    </label>
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <x-admin.label for="is_published" value="{{ __('Description') }}" />
                    <textarea name="description" id="editor"
                        class="border-gray-300 dark:border-gray-700 dark:bg-[#2D334E] dark:text-gray-300 focus:border-teal dark:focus:border-teal focus:ring-teal dark:focus:ring-teal rounded-md shadow-sm font-robotoMono w-full block mt-1"
                        rows="10">{{ old('description') }}</textarea>
                </div>
                <x-admin.button>{{ __('Save Project') }}</x-admin.button>
            </div>
        </form>
    </div>

</x-admin-layout>
