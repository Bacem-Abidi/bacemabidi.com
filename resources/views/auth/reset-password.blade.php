<x-guest-layout>
    <x-admin.auth.authentication-card>
        <x-slot name="logo">
            <x-admin.auth.authentication-card-logo />
        </x-slot>

        <x-admin.auth.validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-admin.form.label for="email" value="{{ __('Email') }}" />
                <x-admin.form.input id="email" class="block mt-1 w-full" type="email" name="email"
                    :value="old('email', $request->email)" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-admin.form.label for="password" value="{{ __('Password') }}" />
                <x-admin.form.input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-admin.form.label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-admin.form.input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-admin.form.btn-submit>
                    {{ __('Reset Password') }}
                </x-admin.form.btn-submit>
            </div>
        </form>
    </x-admin.auth.authentication-card>
</x-guest-layout>
