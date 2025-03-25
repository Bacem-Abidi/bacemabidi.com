@props(['route', 'class' => ''])

<a href="{{ $route }}"
    class="inline-flex items-center px-4 py-2 bg-red-400 dark:bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest hover:bg-red-500 dark:hover:bg-red-400 focus:bg-red-600 dark:focus:bg-red-400 active:bg-red-700 dark:active:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150 {{ $class }}">
    Cancel
</a>
