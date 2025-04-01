<x-app-layout :title="'Contact'">
    @if (session('success'))
        <x-frontend.notification type="success">
            {{ session('success') }}
        </x-frontend.notification>
    @endif

    @if (session('error'))
        <x-frontend.notification type="error">
            {{ session('error') }}
        </x-frontend.notification>
    @endif

    <section class="min-h-screen py-16">
        <div
            class="container mx-auto max-w-4xl relative flex flex-col justify-between rounded-2xl bg-background [border:1px_solid_rgba(255,255,255,.1)] [box-shadow:0_-20px_80px_-20px_#293040_inset]">
            <div class="border-b border-dashed border-gray-700">
                <div class="px-6 py-2 lg:px-10 lg:py-10 text-center">
                    <h1 class="text-4xl font-bold text-white mb-4">Get in Touch</h1>
                    <p class="text-gray-400 text-lg">Have a project in mind or just want to say hi? Let's talk.</p>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-12 p-8">
                <!-- Contact Form -->
                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6" x-data="{ submitted: false }"
                    @submit.prevent="submitted = true; $el.submit()">
                    @csrf
                    <div class="!mt-0">
                        <label for="name" class="block text-gray-300 mb-2">Name</label>
                        <x-frontend.form.input name="name" value="{{ old('name') }}" placeholder="Your Full Name"
                            required />
                    </div>
                    <div>
                        <label for="email" class="block text-gray-300 mb-2">Company Email</label>
                        <x-frontend.form.input type="email" name="email" value="{{ old('email') }}"
                            placeholder="Email Address" required />
                    </div>
                    <div>
                        <label for="message" class="block text-gray-300 mb-2">How Can I Help?</label>
                        <x-frontend.form.textarea name="message"
                            rows="6">{{ old('message') }}</x-frontend.form.textarea>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400">
                            By submitting this, you confirm that you have read and understood the <a
                                href="{{ route('legal.privacy-policy') }}" class="text-teal">Privacy
                                Policy</a>.
                        </p>
                    </div>
                    {{-- <x-frontend.form.btn-submit>Send Message</x-frontend.form.btn-submit> --}}
                    <x-frontend.form.btn-submit x-bind:disabled="submitted">
                        <span x-show="!submitted">Send Message</span>
                        <span x-show="submitted" class="flex items-center gap-2">
                            <svg class="animate-spin h-5 w-5 text-current" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            Sending...
                        </span>
                    </x-frontend.form.btn-submit>
                </form>
                <!-- Contact Info -->
                <div class="space-y-10">
                    <div class="flex items-start space-x-4 mt-7">
                        <div class="bg-teal/20 text-teal p-3 rounded-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-white font-semibold">Email Me</h3>
                            <a href="mailto:abidi.bacem.ab.25@gmail.com"
                                class="text-gray-400 hover:text-teal transition-colors duration-200 ease-in">abidi.bacem.ab.25@gmail.com</a>
                        </div>
                    </div>

                    <!-- Social Links -->
                    <div class="pt-8 border-t border-gray-700">
                        <h3 class="text-white font-semibold mb-4">Follow Me</h3>
                        <div class="flex gap-4 items-center">
                            @include('partials.frontend.social-links.github', ['size' => 'size-9'])
                            @include('partials.frontend.social-links.linkedin', ['size' => 'size-7'])
                            @include('partials.frontend.social-links.instagram', ['size' => 'size-8'])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
