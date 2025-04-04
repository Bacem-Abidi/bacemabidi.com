@props([
    'name' => '',
    'label',
    'type' => 'text',
    'required' => false,
    'placeholder' => '',
    'value' => '',
    'icon' => '',
])

<div class="relative">
    @if ($icon)
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <i class="{{ $icon }}"></i>
        </div>
    @endif
    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" placeholder="{{ $placeholder }}"
        value="{{ old($name, $value) }}" {{ $required ? 'required' : '' }} @class([
            'block w-full rounded-lg border border-gray-300 dark:border-gray-600',
            // 'focus:ring-2 focus:ring-primary-500 focus:border-primary-500',
            'focus:ring-2 focus:border-teal dark:focus:border-teal focus:ring-teal dark:focus:ring-teal ',
            // 'dark:focus:ring-primary-600 dark:focus:border-primary-600',
            'bg-white dark:bg-gray-700/50',
            'text-gray-900 dark:text-gray-100',
            'transition-shadow duration-200',
            'placeholder-gray-400 dark:placeholder-gray-500',
            'shadow-sm' => !$errors->has($name),
            'border-red-500 dark:border-red-400' => $errors->has($name),
            'pl-10' => $icon != '',
            'bg-gray-100 text-gray-500 cursor-not-allowed opacity-70 dark:bg-gray-700 dark:text-gray-400' => $attributes->has(
                'disabled'),
        ])
        {{ $attributes }}>

    @error($name)
        <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
    @enderror
</div>
