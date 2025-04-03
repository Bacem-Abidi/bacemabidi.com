<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Image-Upload') }}
        </h2>
    </x-slot>
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow container mx-auto px-4">

        <form action="{{ route('admin.photography.update', $image) }}" method="POST" enctype="multipart/form-data"
            class="px-6 py-8">
            @csrf
            @method('PUT')

            <!-- Form Sections -->
            <div class="space-y-8 divide-y divide-gray-200 dark:divide-gray-700">
                <!-- Basic Information -->
                <div class="space-y-6">
                    <x-admin.form.group label="Image" required>
                        <x-admin.form.file-upload name="image" preview required :value="$image->filename" disabled />
                    </x-admin.form.group>

                    <x-admin.form.group label="Alt Text">
                        <x-admin.form.input name="alt_text" value="{{ old('alt_text', $image->alt_text) }}" placeholder="Alt Text" />
                    </x-admin.form.group>

                    <!-- caption -->
                    <div class="pt-8 space-y-6">
                        <label for="caption"
                            class="text-sm font-medium text-gray-700 dark:text-gray-300 whitespace-nowrap">Caption</label>
                        <x-admin.form.textarea name="caption"
                            rows="6">{{ old('caption', $image->caption) }}</x-admin.form.textarea>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end gap-4 pt-8">
                <x-admin.form.btn-cancel route="{{ route('admin.photography.index') }} " />
                <x-admin.form.btn-submit>{{ __('Save Imgae') }}</x-admin.form.btn-submit>
            </div>
        </form>
    </div>
</x-admin-layout>
