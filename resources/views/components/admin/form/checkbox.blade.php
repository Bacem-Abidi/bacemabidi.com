@props(['name', 'checked' => false, 'value' => 1, 'class' => ''])

<input type="checkbox" name="{{ $name }}" value="{{ $value }}" {{ $checked ? 'checked' : '' }}
    class="form-checkbox h-5 w-5 rounded border-2 border-gray-300 dark:border-gray-600
               text-primary-500 dark:text-primary-600
               dark:bg-gray-900 text-teal shadow-sm focus:ring-teal dark:focus:ring-teal dark:focus:ring-offset-gray-800
               transition-colors duration-200 cursor-pointer {{ $class }}">
