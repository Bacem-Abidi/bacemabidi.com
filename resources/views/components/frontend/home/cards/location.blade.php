<div
    {{ $attributes->merge(['class' => 'md:col-span-2 group relative flex flex-col justify-between overflow-hidden rounded-2xl bg-background [border:1px_solid_rgba(255,255,255,.1)] [box-shadow:0_-20px_80px_-20px_#293040_inset]']) }}>
    <div class="">
        <div id="globe"
            class="absolute inset-0 mx-auto aspect-[1/1] max-w-[600px] top-0 h-[600px] w-[600px] transition-all duration-300 ease-out [mask-image:linear-gradient(to_top,transparent_30%,#000_100%)] lg:left-50 md:left-20 sm:left-40">
        </div>
    </div>
    <div class="pointer-events-none z-10 flex transform-gpu flex-col gap-1 p-6 transition-all duration-300">
        @include('partials.frontend.icons.icon-set', ['icon' => 'location'])
        <h3 class="text-lg font-semibold text-text">Location</h3>
        <p class="max-w-lg text-grayBright text-sm">Currently Based In Tunisia</p>
    </div>
</div>
