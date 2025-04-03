@props([
    'name',
    'label',
    'accept' => 'image/*',
    'required' => false,
    'preview' => false,
    'value' => null,
    'disabled' => false,
])

<div class="space-y-2" x-data="{
    isUploading: false,
    fileName: '{{ $value ? 'Current image' : '' }}',
    filePreview: '{{ $value ? asset('storage/' . $value) : null }}',
    originalPreview: '{{ $value ? asset('storage/' . $value) : null }}',
    updatePreview() {
        const file = this.$refs.fileInput.files[0];
        this.fileName = file ? file.name : '';
        if (file) {
            this.filePreview = URL.createObjectURL(file);
        } else {
            this.filePreview = '{{ $value ? asset($value) : null }}';
        }
    }
}">

    <div class="relative group">
        <input type="file" id="{{ $name }}" name="{{ $name }}" accept="{{ $accept }}"
            x-ref="fileInput" x-on:change="updatePreview" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
            {{ $required ? 'required' : '' }} {{ $disabled ? 'disabled' : '' }}>

        <div
            class="flex items-center justify-between px-4 py-3 rounded-lg border-2 border-dashed
                   border-gray-300 dark:border-gray-600 group-hover:border-gray-400
                   dark:group-hover:border-gray-500 transition-colors duration-200 {{ $disabled ? 'bg-gray-100 text-gray-500 cursor-not-allowed opacity-70 dark:bg-gray-700 dark:text-gray-400' : '' }}">
            <span class="text-gray-500 dark:text-gray-400" x-text="fileName || 'Choose file...'"></span>
            <div class="flex items-center space-x-2">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                </svg>
                <span class="text-primary-600 dark:text-primary-500 text-sm">Upload</span>
            </div>
        </div>
    </div>

    @if ($preview)
        <div class="mt-2" x-show="fileName">
            <img :src="filePreview" class="max-w-[200px] rounded-lg border border-gray-200 dark:border-gray-700">
            @if ($value)
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400" x-show="filePreview === originalPreview">
                    Current stored image
                </p>
            @endif
        </div>
    @endif

    @error($name)
        <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
    @enderror
</div>
