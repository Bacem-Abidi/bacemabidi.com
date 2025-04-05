<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Settings') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow container mx-auto px-4 ">
            <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data"
                class="px-6 py-8">
                @csrf
                @method('PUT')

                <div class="space-y-8 divide-y divide-gray-200 dark:divide-gray-700">


                    <div class="space-y-6">
                        <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">Basic Information
                        </h3>

                        <x-admin.form.group label="Name" required>
                            <x-admin.form.input name="name" value="{{ old('name', $profile->name) }}"
                                placeholder="Your Name" required />
                        </x-admin.form.group>

                        <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
                            <!-- Profile Photo File Input -->
                            <input type="file" id="photo" class="hidden" name="selfie" x-ref="photo"
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
                                <img src="{{ asset('storage/' . $profile->selfie_path) }}"
                                    class="rounded-full size-20 object-cover">
                            </div>

                            <!-- New Profile Photo Preview -->
                            <div class="mt-2" x-show="photoPreview" style="display: none;">
                                <span class="block rounded-full size-20 bg-cover bg-no-repeat bg-center"
                                    x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                </span>
                            </div>

                            <x-admin.secondary-button class="mt-2 me-2" type="button"
                                x-on:click.prevent="$refs.photo.click()">
                                {{ __('Select A New Photo') }}
                            </x-admin.secondary-button>

                            {{-- @if ($profile->selfie_path)
                                <x-admin.secondary-button type="button" class="mt-2" click="">
                                    {{ __('Remove Photo') }}
                                </x-admin.secondary-button>
                            @endif --}}

                            <x-admin.form.input-error for="selfie" class="mt-2" />
                        </div>

                        <!-- Bio -->
                        <div class="space-y-6">
                            <label for="bio"
                                class="text-sm font-medium text-gray-700 dark:text-gray-300 whitespace-nowrap">Bio <span
                                    class="text-red-500">*</span></label>
                            <x-admin.form.textarea name="bio" required
                                rows="6">{{ old('bio', $profile->bio) }}</x-admin.form.textarea>
                        </div>
                    </div>

                    <!-- Social -->
                    <div class="space-y-6 pt-8">
                        <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">Social
                        </h3>
                        <x-admin.form.input type="url" name="social_links[github]"
                            value="{{ old('social_links.github', $profile->social_links['github'] ?? '') }}"
                            placeholder="https://github.com/Bacem-Abidi" icon="fa-brands fa-github" />

                        <x-admin.form.input type="url" name="social_links[instagram]"
                            value="{{ old('social_links.instagram', $profile->social_links['instagram'] ?? '') }}"
                            placeholder="https://www.instagram.com/_abidi_bacem/" icon="fa-brands fa-instagram" />

                        <x-admin.form.input type="url" name="social_links[linkedin]"
                            value="{{ old('social_links.linkedin', $profile->social_links['linkedin'] ?? '') }}"
                            placeholder="https://www.linkedin.com/in/abidi-bacem-2b6718337/"
                            icon="fa-brands fa-linkedin" />

                        <x-admin.form.input type="email" name="social_links[email]"
                            value="{{ old('social_links.email', $profile->social_links['email'] ?? '') }}"
                            placeholder="abidi.bacem.ab.25@gmail.com" icon="fa-solid fa-envelope" />
                    </div>
                </div>


                <div class="flex justify-end gap-4 pt-8">
                    <x-admin.form.btn-submit>{{ __('Save Changes') }}</x-admin.form.btn-submit>
                </div>
            </form>
        </div>

    </div>
</x-admin-layout>
