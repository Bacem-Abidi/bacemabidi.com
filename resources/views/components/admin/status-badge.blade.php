@props(['status'])

@php
    $statusColors = [
        'draft' => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200',
        'published' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-100',
        'archived' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-100',
    ];
@endphp

<span @class([
    'inline-flex items-center px-3 py-1 rounded-full text-sm font-medium',
    $statusColors[$status] ?? 'bg-gray-100 text-gray-800',
])>
    {{ ucfirst($status) }}
</span>
