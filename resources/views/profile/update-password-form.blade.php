<x-form-section submit="{{ route('password.update') }}">
    <x-slot name="title">
        {{ __('Update Password') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-admin.form.label for="current_password" value="{{ __('Current Password') }}" />
            <x-admin.form.input id="current_password" type="password" class="mt-1 block w-full" name="current_password"
                autocomplete="current-password" value="{{ old('current_password', '') }}" />
            <x-admin.form.input-error for="current_password" bag="updatePassword" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-admin.form.label for="password" value="{{ __('New Password') }}" />
            <x-admin.form.input id="password" type="password" class="mt-1 block w-full" name="password"
                autocomplete="new-password" value="{{ old('password', '') }}" />
            <x-admin.form.input-error for="password" bag="updatePassword" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-admin.form.label for="password_confirmation" value="{{ __('Confirm Password') }}" />
            <x-admin.form.input id="password_confirmation" type="password" class="mt-1 block w-full"
                name="password_confirmation" autocomplete="new-password"
                value="{{ old('password_confirmation', '') }}" />
            <x-admin.form.input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-admin.action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-admin.action-message>

        <x-admin.form.btn-submit>
            {{ __('Save') }}
        </x-admin.form.btn-submit>
    </x-slot>
</x-form-section>
