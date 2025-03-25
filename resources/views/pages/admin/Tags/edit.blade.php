<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tags-Edit') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-6">Tag: {{ $tag->title }}</h1>

        <form action="{{ route('admin.tags.update', $tag) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 space-y-8">

                <x-admin.form.group label="Title" required>
                    <x-admin.form.input type="text" name="title" value="{{ old('title', $tag->title) }}" required />
                </x-admin.form.group>

                <x-admin.form.group label="Color" required>
                    <x-admin.form.color-picker name="color" label="Select Color" :value="$tag->color ? $tag->color : '#1fc5c5'" required />
                </x-admin.form.group>

                <div class="flex justify-end gap-4 pt-8">
                    <x-admin.form.btn-cancel route="{{ route('admin.tags.index') }} " />
                    <x-admin.form.btn-submit>{{ __('Save Changes') }}</x-admin.form.btn-submit>
                </div>

            </div>
        </form>
    </div>
</x-admin-layout>
