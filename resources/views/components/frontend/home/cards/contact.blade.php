<div
    {{ $attributes->merge(['class' => 'group relative flex flex-col justify-center overflow-hidden rounded-2xl bg-background [border:1px_solid_rgba(255,255,255,.1)] [box-shadow:0_-20px_80px_-20px_#293040_inset]']) }}>
    <div class="space-y-2 flex-col gap-1 p-6 text-center">
        <h2 class="md:text-xl font-bold text-text sm:text-2xl text-2xl">Let's Work Together</h2>
        <p class="text-grayBright md:text-sm sm:text-lg">Have a project in mind? Let's turn your ideas into
            reality</p>

    </div>
    <div class="space-y-2 flex-col gap-1 p-6 text-center">
        <a href="{{ route('contact') }}"
            class="md:text-sm sm:text-xl text-xl bg-cyan/10 text-cyan transition-all hover:bg-cyan/20 md:px-4 sm:px-6 px-6 py-2 rounded-full duration-500">Contact
            Me</a>
    </div>
</div>
