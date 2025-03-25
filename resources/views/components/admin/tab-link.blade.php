@props(['href', 'active' => false])

<a href="{{ $href }}" @class([
    'px-3 py-2 font-medium text-sm rounded-md',
    'bg-teal-100 text-teal-700 dark:bg-teal-900 dark:text-teal-100' => $active,
    'text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700' => !$active,
])>
    {{ $slot }}
</a>
