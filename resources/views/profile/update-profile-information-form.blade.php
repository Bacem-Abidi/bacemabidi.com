<x-form-section submit="{{ route('user-profile-information.update') }}">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" id="photo" class="hidden" name="photo" x-ref="photo"
                    x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-admin.form.label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}"
                        class="rounded-full size-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full size-20 bg-cover bg-no-repeat bg-center"
                        x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-admin.secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-admin.secondary-button>

                @if (auth()->user()->profile_photo_path)
                    <x-admin.secondary-button type="button" class="mt-2" id="remove-photo-btn">
                        {{ __('Remove Photo') }}
                    </x-admin.secondary-button>
                @endif

                <x-admin.form.input-error for="photo" class="mt-2" bag="updateProfileInformation" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-admin.form.label for="name" value="{{ __('Name') }}" />
            <x-admin.form.input id="name" type="text" class="mt-1 block w-full" name="name" required
                autocomplete="name" value="{{ auth()->user()->name }}" />
            <x-admin.form.input-error for="name" class="mt-2" bag="updateProfileInformation" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-admin.form.label for="email" value="{{ __('Email') }}" />
            <x-admin.form.input id="email" type="email" class="mt-1 block w-full" name="email" required
                autocomplete="username" value="{{ auth()->user()->email }}" />
            <x-admin.form.input-error for="email" class="mt-2" bag="updateProfileInformation" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) &&
                    !$this->user->hasVerifiedEmail())
                <p class="text-sm mt-2 dark:text-white">
                    {{ __('Your email address is unverified.') }}

                    <button type="button"
                        class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-admin.action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-admin.action-message>

        <x-admin.form.btn-submit wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-admin.form.btn-submit>
    </x-slot>
</x-form-section>
<script>
    document.getElementById('remove-photo-btn')?.addEventListener('click', function() {
        fetch("{{ route('user-profile-photo.destroy') }}", {
                method: "DELETE",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                },
            })
            .then(res => {
                if (!res.ok) throw new Error('Failed to delete.');
                return res.json();
            })
            .then(data => {
                location.reload(); // or dynamically update the photo preview
            })
            .catch(err => {
                console.error(err);
                alert('Something went wrong.');
            });
    });
</script>
