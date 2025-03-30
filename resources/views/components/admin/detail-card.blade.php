@props(['title', 'class' => ''])

<div {{ $attributes->merge(['class' => "bg-white dark:bg-gray-700 rounded-lg shadow p-6 $class"]) }}>
    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">{{ $title }}</h3>
    <div class="space-y-4">
        {{ $slot }}
    </div>
</div>
