@props(['name' => '', 'label', 'type' => 'text', 'required' => false, 'placeholder' => '', 'value' => ''])

<div class="relative">

    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" placeholder="{{ $placeholder }}"
        value="{{ old($name, $value) }}" {{ $required ? 'required' : '' }} @class([
            'block w-full rounded-lg border border-gray-600',
            'focus:ring-1 focus:border-teal focus:ring-teal',
            'bg-background',
            'text-gray-100 text-sm',
            'transition-shadow duration-200',
            'placeholder-gray-500',
            'shadow-sm' => !$errors->has($name),
            'border-red-500 border-red-400' => $errors->has($name),
            'cursor-not-allowed opacity-70 bg-gray-700 text-gray-400' => $attributes->has(
                'disabled'),
        ])
        {{ $attributes }}>

    @error($name)
        <p class="text-sm  text-red-400 mt-1">{{ $message }}</p>
    @enderror
</div>
