@props(['name' => 'color', 'label' => 'Color', 'required' => false, 'value' => '#3B82F6'])

<div class="flex items-center gap-4" x-data="{ color: '{{ old($name, $value) }}' }">
    <!-- Color Preview & Picker -->
    <div class="relative">
        <input type="color" name="{{ $name }}" x-model="color"
            class="w-9 h-9 rounded-md cursor-pointer border border-gray-300 dark:border-gray-600"
            required="{{ $required }}">
    </div>

    <!-- Hex Input -->
    <div class="flex-1">
        <input type="text" x-model="color" placeholder="#FFFFFF" pattern="^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$"
            @input.debounce.500ms="
                if (/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/.test($event.target.value)) {
                    color = $event.target.value.toLowerCase()
                }
            "
            @class([
                'w-full rounded-lg border border-gray-300 dark:border-gray-600',
                'focus:ring-2 focus:border-teal dark:focus:border-teal focus:ring-teal dark:focus:ring-teal',
                'bg-white dark:bg-gray-700/50',
                'text-gray-900 dark:text-gray-100',
                'transition-shadow duration-200',
                'placeholder-gray-400 dark:placeholder-gray-500',
                'shadow-sm' => !$errors->has($name),
                'border-red-500 dark:border-red-400' => $errors->has($name),
            ])>
    </div>
</div>
