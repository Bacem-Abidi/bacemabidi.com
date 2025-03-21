@props(['active', 'icon' => ''])

@php
    $classes =
        $active ?? false
            ? 'relative flex flex-row items-center h-11 focus:outline-none border-l-4 border-transparent border-teal pr-6'
            : 'relative flex flex-row items-center h-11 focus:outline-none border-l-4 border-transparent hover:border-teal pr-6';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <span class="inline-flex justify-center items-center ml-4">
        @include('partials.admin.icon-set', ['name' => $icon])
    </span>
    {{ $slot }}
</a>
