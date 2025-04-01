@props(['name', 'label', 'required' => false, 'placeholder' => '', 'rows' => 4])

<div class="space-y-2">
    <textarea id="{{ $name }}" name="{{ $name }}" rows="{{ $rows }}" placeholder="{{ $placeholder }}"
        @class([
            'block w-full rounded-lg border border-gray-600',
            'focus:ring-1 focus:border-teal focus:ring-teal ',
            'bg-background',
            'text-gray-100 text-sm',
            'transition-shadow duration-200',
            'placeholder-gray-500',
            'shadow-sm' => !$errors->has($name),
            'border-red-400' => $errors->has($name),
        ]) {{ $attributes }}>{{ old($name, $slot) }}</textarea>

    @error($name)
        <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
    @enderror
</div>
