<x-guest-layout>
    <x-admin.auth.authentication-card>
        <x-slot name="logo">
            <x-admin.auth.authentication-card-logo />
        </x-slot>

        <x-admin.auth.validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}" class="font-robotoMono leading-tight">
            @csrf

            <div>
                <x-admin.form.label for="email" value="{{ __('Email') }}" class="mb-1" />
                <x-admin.form.input id="email" class="block mt-1 w-full" type="email" name="email"
                    :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-admin.form.label for="password" value="{{ __('Password') }}" class="mb-1" />
                <x-admin.form.input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-admin.checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal dark:focus:ring-offset-gray-800"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                {{-- <x-admin.form.btn-submit class="ms-4">
                    {{ __('Log in') }}
                </x-admin.form.btn-submit> --}}
                <x-admin.form.btn-submit class="ms-4">
                    {{ __('Log in') }}
                </x-admin.form.btn-submit>
            </div>
        </form>
    </x-admin.auth.authentication-card>
</x-guest-layout>
