<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('User') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Lengkapi data berikut dan submit untuk membuat atau mengubah data pengguna') }}
        </x-slot>

        <x-slot name="form">
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="name" value="{{ __('Nama') }}" />
                <small>Nama Lengkap Akun</small>
                <x-jet-input id="name" type="text" class="mt-1 block w-full form-control shadow-none"
                    wire:model.defer="user.name" />
                <x-jet-input-error for="user.name" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" type="text" class="mt-1 block w-full form-control shadow-none"
                    wire:model.defer="user.email" />
                <x-jet-input-error for="user.email" class="mt-2" />
            </div>

            @if ($action == 'createUser')
                <div class="form-group col-span-6 sm:col-span-5">
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <small>Minimal 8 karakter</small>
                    <x-jet-input id="password" type="password" class="mt-1 block w-full form-control shadow-none"
                        wire:model.defer="user.password" />
                    <x-jet-input-error for="user.password" class="mt-2" />
                </div>

                <div class="form-group col-span-6 sm:col-span-5">
                    <x-jet-label for="password_confirmation" value="{{ __('Konfirmasi Password') }}" />
                    <small>Minimal 8 karakter</small>
                    <x-jet-input id="password_confirmation" type="password"
                        class="mt-1 block w-full form-control shadow-none" wire:model.defer="user.password_confirmation"
                        aria-describedby="validationPasswordFeedback" />
                    <x-jet-input-error for="user.password_confirmation" class="mt-2 " />
                    {{-- <x-jet-label value="Password tidak sama"></x-jet-label> --}}
                    <div id="validationPasswordFeedback" class="invalid-feedback">
                        Password tidak sama
                    </div>
                </div>
            @endif

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="roleUser" value="{{ __('Role') }}" />
                <select class="form-control mt-1 block w-full form-control shadow-none" id="roleUser"
                    wire:model.defer="user.is_admin">
                    <option value="0">Pelanggan</option>
                    <option value="1">Admin</option>
                </select>
            </div>
        </x-slot>



        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __($button['submit_response']) }}
            </x-jet-action-message>

            <x-jet-button>
                {{ __($button['submit_text']) }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>

    <x-notify-message on="saved" type="success" :message="__($button['submit_response_notyf'])" />
</div>

@push('js')

    <script>
        const pswd = document.querySelector("#password");

        const pwsd_confirm = document.querySelector("#password_confirmation");
        pwsd_confirm.classList.remove("is-invalid");

        pwsd_confirm.addEventListener("keyup", function(event) {
            if (pswd.value !== pwsd_confirm.value) {
                pwsd_confirm.classList.add("is-invalid");
            } else {
                pwsd_confirm.classList.remove("is-invalid");
            }
        });
    </script>

@endpush
