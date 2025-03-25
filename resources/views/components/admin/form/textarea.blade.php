@props(['name', 'label', 'required' => false, 'placeholder' => '', 'rows' => 4])

<div class="space-y-2">
    <textarea id="{{ $name }}" name="{{ $name }}" rows="{{ $rows }}" placeholder="{{ $placeholder }}"
        @class([
            'block w-full rounded-lg border border-gray-300 dark:border-gray-600',
            // 'focus:ring-2 focus:ring-primary-500 focus:border-primary-500',
            // 'dark:focus:ring-primary-600 dark:focus:border-primary-600',
            'focus:ring-2 focus:border-teal dark:focus:border-teal focus:ring-teal dark:focus:ring-teal ',
            'bg-white dark:bg-gray-700/50',
            'text-gray-900 dark:text-gray-100',
            'transition-shadow duration-200',
            'placeholder-gray-400 dark:placeholder-gray-500',
            'shadow-sm' => !$errors->has($name),
            'border-red-500 dark:border-red-400' => $errors->has($name),
        ]) {{ $attributes }}>{{ old($name, $slot) }}</textarea>

    @error($name)
        <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
    @enderror
</div>
