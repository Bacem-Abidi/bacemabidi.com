@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'border-gray-300 dark:border-gray-700 dark:bg-[#2D334E] dark:text-gray-300 focus:border-teal dark:focus:border-teal focus:ring-teal dark:focus:ring-teal rounded-md shadow-sm font-robotoMono',
]) !!}>
