@props(['name', 'label', 'required' => false, 'value' => ''])

<div class="space-y-2 relative">
    <div class="relative">
        <input type="date" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $value) }}"
            {{ $required ? 'required' : '' }} @class([
                'block w-full rounded-lg border border-gray-300 dark:border-gray-600',
                // 'focus:ring-2 focus:ring-primary-500 focus:border-primary-500',
                // 'dark:focus:ring-primary-600 dark:focus:border-primary-600',
                'focus:ring-2 focus:border-teal dark:focus:border-teal focus:ring-teal dark:focus:ring-teal ',
                'bg-white dark:bg-gray-700/50',
                'text-gray-900 dark:text-gray-100',
                'shadow-sm' => !$errors->has($name),
                'border-red-500 dark:border-red-400' => $errors->has($name),
            ]) {{ $attributes }}>
    </div>

    @error($name)
        <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
    @enderror
</div>
