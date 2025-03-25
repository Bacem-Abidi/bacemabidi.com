@props(['name', 'label' => null, 'options' => [], 'selected' => null, 'required' => false, 'placeholder' => null])

<div class="space-y-2">
    <select name="{{ $name }}" id="{{ $name }}" {{ $required ? 'required' : '' }}
        @class([
            'bg-white dark:bg-gray-700',
            'rounded-lg border border-gray-300 dark:border-gray-600',
            'w-full block mt-1',
            'focus:ring-1 focus:border-teal dark:focus:border-teal focus:ring-teal dark:focus:ring-teal ',
            'text-gray-900 dark:text-gray-100',
            'transition-colors duration-200',
            'border-red-500 dark:border-red-400' => $errors->has($name),
        ]) {{ $attributes }}>
        @if ($placeholder)
            <option value="" disabled {{ !old($name, $selected) ? 'selected' : '' }}>
                {{ $placeholder }}
            </option>
        @endif

        @foreach ($options as $value => $label)
            <option value="{{ $value }}" {{ old($name, $selected) == $value ? 'selected' : '' }}>
                {{ $label }}
            </option>
        @endforeach
    </select>

    @error($name)
        <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
    @enderror
</div>
