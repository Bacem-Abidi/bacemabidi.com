<div
    {{ $attributes->merge(['class' => 'group relative flex flex-col justify-between overflow-hidden rounded-2xl bg-background [border:1px_solid_rgba(255,255,255,.1)] [box-shadow:0_-20px_80px_-20px_#293040_inset] md:col-span-2']) }}>
    <div class="flex-grow place-content-center pt-14">
        <div class="relative flex w-full flex-col items-center justify-center overflow-hidden marquee-container">
            <div
                class="group flex overflow-hidden p-2 [--gap:2rem] [gap:var(--gap)] flex-row [--duration:10s] md:shadow-xl">
                @for ($i = 0; $i < 4; $i++)
                    <div
                        class="flex shrink-0 justify-around [gap:var(--gap)] motion-reduce:animate-none animate-marquee flex-row">
                        @include('partials.frontend.icons.tech-stack-icons')
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <div class="pointer-events-none z-10 flex transform-gpu flex-col gap-1 p-6 transition-all duration-300">
        <h3 class="text-lg font-semibold text-text">Tech Stack I'm familiar with</h3>
        <p class="max-w-sm text-grayBright text-sm">Focusing on creating a seamless experience across all
            platforms</p>
    </div>
</div>
