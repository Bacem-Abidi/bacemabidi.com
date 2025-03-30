<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Projects-Create') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-6">Edit Project</h1>
        <!-- Add error summary -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="bg-white rounded-lg shadow p-6 dark:bg-[#1E2234]">
                <!-- Title -->
                <div class="mb-4">
                    <x-admin.form.label for="title" value="{{ __('Title') }}" />
                    <x-admin.input name="title" id="title" class="block mt-1 w-full" type="text"
                        value="{{ old('title', $project->title) }}" required />
                    {{-- @error('title')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror --}}
                </div>

                <!-- Slug -->
                <div class="mb-4">
                    <x-admin.form.label for="slug" value="{{ __('Slug') }}" />
                    <x-admin.input name="slug" id="slug" class="block mt-1 w-full" type="text"
                        value="{{ old('slug', $project->slug) }}" required />
                    {{-- @error('slug')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror --}}
                </div>

                <!-- Featured Image -->
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-text text-sm font-bold mb-2">Featured Image</label>
                    @if ($project->cover_image)
                        <img src="{{ asset('storage/' . $project->cover_image) }}" class="w-32 h-32 object-cover mb-2">
                    @endif
                    <input type="file" name="featured_image" class="w-full">
                    {{-- @error('featured_image')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror --}}
                </div>

                <!-- Project Date -->
                <div class="mb-4">
                    <x-admin.form.label for="project_date" value="{{ __('Project Date') }}" />
                    <x-admin.input name="project_date" id="project_date" class="block mt-1 w-full" type="date"
                        value="{{ old('project_date', $project->project_date) }}" required />
                    {{-- @error('project_date')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror --}}
                </div>

                <!-- Is Published -->
                <div class="mb-4">
                    <x-admin.form.label for="is_published" value="{{ __('Publish Status') }}" />
                    <select name="is_published" id="is_published"
                        class="border-gray-300 dark:border-gray-700 dark:bg-[#2D334E] dark:text-gray-300 focus:border-teal dark:focus:border-teal focus:ring-teal dark:focus:ring-teal rounded-md shadow-sm font-robotoMono w-full block mt-1">
                        <option value="1"
                            {{ old('is_published', $project->is_published) == 1 ? 'selected' : '' }}>Published
                        </option>
                        <option value="0"
                            {{ old('is_published', $project->is_published) == 0 ? 'selected' : '' }}>Unpublished
                        </option>
                    </select>
                    {{-- @error('is_published')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror --}}
                </div>

                {{-- Featured --}}
                <div class="mb-4">
                    <label for="featured" class="flex items-center cursor-pointer">
                        <input type="hidden" name="featured" value="0">
                        <x-admin.checkbox id="featured" name="featured" value="1" :checked="old('featured', $project->featured ?? false)" />
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Featured') }}</span>
                    </label>
                </div>

                {{-- <div class="mb-4">
                    <label class="block mb-2">Tags</label>
                    <select multiple name="tags[]" id=""
                        class="border-gray-300 dark:border-gray-700 dark:bg-[#2D334E] dark:text-gray-300 focus:border-teal dark:focus:border-teal focus:ring-teal dark:focus:ring-teal rounded-md shadow-sm font-robotoMono w-full block mt-1">
                        @foreach (\App\Models\Tags::all() as $tag)
                            <option value="{{ $tag->id }}">
                                {{ $tag->title }}
                            </option>
                        @endforeach
                    </select>
                </div> --}}

                <div class="mb-4  bg-transparent outline-none border-none ">
                    <label class="block mb-2 dark:text-gray-300">Tags</label>
                    <div class="multi-select-wrapper" data-name="tags[]"
                        data-options="{{ \App\Models\Tags::all()->toJson() }}"
                        data-selected="{{ isset($project) ? $project->tags->pluck('id')->toJson() : '[]' }}">
                    </div>
                </div>


                <!-- Description -->
                <div class="mb-4">
                    <x-admin.form.label for="is_published" value="{{ __('Description') }}" />
                    <textarea name="description" id="editor"
                        class="border-gray-300 dark:border-gray-700 dark:bg-[#2D334E] dark:text-gray-300 focus:border-teal dark:focus:border-teal focus:ring-teal dark:focus:ring-teal rounded-md shadow-sm font-robotoMono w-full block mt-1"
                        rows="10">{{ old('description', $project->description) }}</textarea>
                    @error('description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <x-admin.form.btn-submit>{{ __('Save Project') }}</x-admin.form.btn-submit>
                <a href="{{ route('admin.projects.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-red-400 dark:bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest hover:bg-red-500 dark:hover:bg-red-400 focus:bg-red-600 dark:focus:bg-red-400 active:bg-red-700 dark:active:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150">
                    Cancel
                </a>
            </div>
        </form>
    </div>


</x-admin-layout>
