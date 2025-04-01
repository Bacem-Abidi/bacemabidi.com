@props(['type' => 'success'])

@php
    $colors = [
        'success' => 'bg-emerald-500/20 border-emerald-600 text-emerald-300',
        'error' => 'bg-red-500/20 border-red-600 text-red-300',
    ];
@endphp

<div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform translate-y-2"
    x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 transform translate-y-0"
    x-transition:leave-end="opacity-0 transform translate-y-2" @click.outside="show = false"
    class="fixed bottom-6 right-6 {{ $colors[$type] }} border px-6 py-3 rounded-lg flex items-center space-x-3 max-w-sm z-50 cursor-pointer"
    x-init="setTimeout(() => show = false, 5000)">
    <div class="flex-1">
        {{ $slot }}
    </div>
    <button @click="show = false" class="hover:opacity-75">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>
