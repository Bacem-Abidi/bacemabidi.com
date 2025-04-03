<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Photography') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4">
        <div class="flex items-center mb-6 justify-end">
            <a href="{{ route('admin.photography.upload') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-500 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-teal focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150">
                Upload an Image
            </a>
        </div>

        {{-- Masonry Grid --}}
        <div class="columns-2 md:columns-3 lg:columns-4 [column-gap:1rem] space-y-4">
            @foreach ($images as $image)
                <div class="break-inside-avoid group relative">
                    <img src="{{ asset('storage/' . $image->filename) }}" class="w-full rounded-lg shadow-lg"
                        alt="{{ $image->alt_text ?? 'Photography image' }}" loading="lazy">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100 rounded-lg">
                        <a href="{{ route('admin.photography.edit', $image) }}"
                            class="p-1.5 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-full" title="Edit">
                            <svg class="w-5 h-5 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                        </a>

                        <form action="{{ route('admin.photography.destroy', $image) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-1.5 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-full"
                                title="Delete" onclick="return confirm('Are you sure you want to delete this image?')">
                                <svg class="w-5 h-5 text-red-600 dark:text-red-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
                @if ($image->caption)
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">{{ $image->caption }}</p>
                @endif
            @endforeach
        </div>
        {{ $images->links() }} <!-- Pagination -->
    </div>
</x-admin-layout>
