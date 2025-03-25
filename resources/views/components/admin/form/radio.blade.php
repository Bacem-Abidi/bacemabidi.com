@props(['name', 'value', 'label', 'checked' => false])

<label class="flex items-center space-x-3 cursor-pointer group">
    <input type="radio" name="{{ $name }}" value="{{ $value }}" {{ $checked ? 'checked' : '' }}
        class="form-radio h-5 w-5 text-primary-500 dark:text-primary-600
               border-2 border-gray-300 dark:border-gray-600
               focus:ring-primary-500 dark:focus:ring-primary-600
               transition-colors duration-200">
    <span
        class="text-gray-700 dark:text-gray-300 group-hover:text-gray-900 dark:group-hover:text-gray-100 transition-colors">
        {{ $label }}
    </span>
</label>
