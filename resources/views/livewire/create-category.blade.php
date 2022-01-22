<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('Kategori') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Lengkapi data berikut dan submit untuk membuat atau mengubah kategori produk') }}
        </x-slot>

        <x-slot name="form">
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="name" value="{{ __('Nama Kategori') }}" />
                <x-jet-input id="name" type="text" class="mt-1 block w-full form-control shadow-none"
                    wire:model.defer="category.name" />
                <x-jet-input-error for="category.name" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5" x-data="{ isUploading: false, progress: 0 }"
                x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false"
                x-on:livewire-upload-error="isUploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress">

                <x-jet-label for="image" value="{{ __('Gambar Kategori') }}" />
                <small>Gunakan gambar dengan extensi jpg, jpeg atau png maksimal 5MB </small>
                <!-- File Input -->
                <x-jet-input name="image" type="file" accept="image/*" id="image"
                    class="mt-1 block w-full form-control shadow-none" wire:model="image" />
                @if ($action == 'updateCategory')
                    <small class="text-danger">*)Kosongkan jika tidak ingin diubah</small>
                @endif


                <!-- Progress Bar -->
                <div x-show="isUploading">
                    <progress max="100" x-bind:value="progress"></progress>
                </div>
                @error('image') <p class="error">{{ $message }}</p> @enderror

                <!-- Show  Upload Image -->
                <div class="mt-3">

                    @if ($image)
                        <img src="{{ $image->temporaryUrl() }}" alt="Category Uploading Image "
                            class="show-upload-image shadow" />

                    @elseif($action == 'updateCategory')
                        <img src="{{ asset('storage/' . $category->image) }}" alt="Category Uploading Image "
                            class="show-upload-image shadow" />
                    @endif

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


{{-- @push('js')
    <script>
        window.livewire.on('file-dropped', () => {
            let inputField = document.getElementById('logo')
            let file = inputField.files[0]
            let reader = new FileReader();
            reader.onloadend = () => {
                window.livewire.emit('fileUpload', reader.result)
            }
            reader.readAsDataURL(file);
        })
    </script>
@endpush --}}
