<!-- Add a 3D render/artwork placeholder on the right -->
<div class="relative hidden lg:block w-2/5 transform-gpu group">
    <!-- Holographic Background Effect -->
    <div class="absolute inset-0 rounded-2xl bg-gradient-to-tr from-cyan/20 to-orange/20 animate-pulse-glow">
    </div>

    <!-- Main Container -->
    <div
        class="relative z-20 h-[500px] border-2 border-cyan/30 rounded-2xl bg-background/95 backdrop-blur-xl shadow-2xl hover:shadow-cyan/10 transition-all duration-300 overflow-hidden">
        <div class="grid grid-cols-2 divide-x divide-cyan/10 h-full">
            <!-- 3D Art Side - Hover to Reveal -->
            <div class="relative p-6 bg-gradient-to-b from-cyan/5 to-transparent">
                <div class="absolute inset-0 holographic-pattern opacity-10"></div>
                <img src="{{ asset('images/Renders/abandonedHouse/wire.png') }}"
                    class="w-full h-full object-contain transition-all duration-500 grayscale hover:grayscale-0 scale-90 hover:scale-95"
                    alt="3D Wireframe">
                <div class="absolute bottom-4 left-4 flex items-center gap-2">
                    <span class="text-xs text-cyan font-mono">Blender 4.3.2</span>
                    <div class="h-px w-8 bg-cyan/30"></div>
                </div>
            </div>

            <!-- Code Side - Animated Terminal -->
            <div class="relative p-6 bg-gradient-to-b from-orange/5 to-transparent">
                <!-- Animated Cursor -->
                <div class="absolute top-6 right-6 w-2 h-4 bg-cyan animate-blink"></div>

                <!-- Code Content -->
                <div class="font-mono text-sm space-y-4 text-cyan/90">
                    <x-frontend.home.terminal-content />
                </div>
            </div>
        </div>
    </div>

    <!-- Floating Glow Effect -->
    <div class="absolute inset-0 rounded-2xl glow-overlay"></div>
</div>
