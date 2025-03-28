{{-- <x-app-layout :title="'Privacy Policy'">
    <section class="h-screen container flex justify-center mx-auto max-w-screen-xl px-4 py-10">
        <div class="w-full sm:max-w-2xl mt-6 p-6 bg-gray-800 shadow-md overflow-hidden sm:rounded-lg prose prose-invert">
            @php
                // Parse markdown content
                $filename = 'policy';

                // Get the file path
                $filePath = resource_path("markdown/{$filename}.md");
                $content = File::get($filePath);
                $policy = Str::markdown($content);
            @endphp
            {!! $policy !!}
        </div>
    </section>
</x-app-layout> --}}
<x-app-layout :title="'Privacy Policy'">
    <section class="h-screen container flex items-center justify-center mx-auto max-w-screen-xl px-4">
        <div class="text-center relative z-10">
            <h1 class="text-3xl">Coming Soon...</h1>
        </div>
    </section>
</x-app-layout>
