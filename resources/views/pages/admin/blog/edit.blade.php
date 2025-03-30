<x-admin.blog-layout :blog="$blog" :previousBlog="''" :nextBlog="''">
    <form action="{{ route('admin.blog.update', $blog) }}" method="POST" enctype="multipart/form-data" class="px-6 py-8">
        @csrf
        @method('PUT')

        <!-- Form Sections -->
        <div class="space-y-8 divide-y divide-gray-200 dark:divide-gray-700">
            <!-- Basic Information -->
            <div class="space-y-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">Basic Information</h3>

                <x-admin.form.group label="Title" required>
                    <x-admin.form.input name="title" value="{{ old('title', $blog->title) }}" placeholder="Blog Title"
                        required />
                </x-admin.form.group>

                <x-admin.form.group label="Slug" required>
                    <x-admin.form.input name="slug" value="{{ old('slug', $blog->slug) }}" placeholder="project-slug"
                        required disabled />
                </x-admin.form.group>

                <x-admin.form.group label="Blog Date" required>
                    <x-admin.form.date-picker name="blog_date" value="{{ old('blog_date', $blog->blog_date) }}"
                        required />
                </x-admin.form.group>

                <x-admin.form.group label="Featured Image">
                    <x-admin.form.file-upload name="featured_image" preview :value="$blog->featured_image" />
                </x-admin.form.group>
            </div>

            <!-- Tags & Status -->
            <div class="pt-8 space-y-6">
                <x-admin.form.group label="Tags">
                    <div class="multi-select-wrapper" data-name="tags[]"
                        data-options="{{ \App\Models\Tags::all()->toJson() }}"
                        data-selected="{{ isset($blog) ? $blog->tags->pluck('id')->toJson() : '[]' }}">
                    </div>
                </x-admin.form.group>

                <x-admin.form.group label="Status">
                    <x-admin.form.select name="is_published" label="Publication Status" :options="[1 => 'Published', 0 => 'Unpublished']"
                        :selected="$blog->is_published" required />
                </x-admin.form.group>

                <x-admin.form.group label="Featured">
                    <div class="">
                        <input type="hidden" name="featured" value="0">
                        <x-admin.form.checkbox id="featured" name="featured" value="1" :checked="old('featured', $blog->featured ?? false)" />
                    </div>
                </x-admin.form.group>
            </div>


            <!-- Description -->
            <div class="pt-8 space-y-6">
                <label for="description"
                    class="text-sm font-medium text-gray-700 dark:text-gray-300 whitespace-nowrap">Description</label>
                <x-admin.form.textarea name="description"
                    rows="6">{{ old('description', $blog->description) }}</x-admin.form.textarea>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="flex justify-end gap-4 pt-8">
            <x-admin.form.btn-cancel route="{{ route('admin.blog.show', $blog) }} " />
            <x-admin.form.btn-submit>{{ __('Save Changes') }}</x-admin.form.btn-submit>
        </div>
    </form>
</x-admin.blog-layout>
