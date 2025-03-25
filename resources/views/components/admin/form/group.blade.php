@props(['label', 'helpText' => null, 'class' => '', 'required' => false])

<div class="{{ $class }} grid grid-cols-[minmax(120px,auto)_1fr] items-center gap-4">
    @if ($label)
        <div class="flex flex-col space-y-1 pr-2">
            <label class="text-sm font-medium text-gray-700 dark:text-gray-300 whitespace-nowrap">
                {{ $label }}
                @if ($required)
                    <span class="text-red-500">*</span>
                @endif
            </label>

            @if ($helpText)
                <p class="text-xs text-gray-500 dark:text-gray-400 leading-tight">
                    {{ $helpText }}
                </p>
            @endif
        </div>
    @endif

    <div class="space-y-2 w-full">
        {{ $slot }}

        @error($name ?? '')
            <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>
