<x-slot name="head">

    <style>
        .ck-editor__editable_inline {
            min-height: 400px;
        }

    </style>
</x-slot>

<div id="form-create">

    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('Produk') }}
        </x-slot>


        <x-slot name="description">
            {{ __('Lengkapi data berikut dan submit untuk menambahkan atau mengubah produk') }}
        </x-slot>



        <x-slot name="form">
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="name" value="{{ __('Nama Produk') }}" />
                <x-jet-input id="name" type="text" class="mt-1 block w-full form-control shadow-none"
                    wire:model.defer="product.name" />
                <x-jet-input-error for="product.name" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="roleUser" value="{{ __('Kategori') }}" />

                <select class="form-control mt-1 block w-full form-control shadow-none" id="category_id"
                    wire:model="product.category_id">

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="product.category_id" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="price" value="{{ __('Harga Produk') }}" />
                <x-jet-input id="price" type="text" class="mt-1 block w-full form-control shadow-none"
                    wire:model.defer="product.price" />
                <x-jet-input-error for="product.price" class="mt-2" />
            </div>

            <div class="form-group col-span-3">
                <x-jet-label for="weight" value="{{ __('Berat Produk (Gram)') }}" />
                <x-jet-input id="weight" type="text" class="mt-1 block w-full form-control shadow-none"
                    wire:model.defer="product.weight" />
                <x-jet-input-error for="product.weight" class="mt-2" />
            </div>

            <div class="form-group col-span-3 sm:col-span-2">
                <x-jet-label for="quantity" value="{{ __('Stok Produk') }}" />
                <x-jet-input id="quantity" type="text" class="mt-1 block w-full form-control shadow-none"
                    wire:model.defer="product.quantity" />
                <x-jet-input-error for="product.quantity" class="mt-2" />
            </div>

            <div class="form-group col-span-6 ">
                <x-jet-label for="price" value="{{ __('Deskripsi Produk') }}" />

                <textarea id="editor" name="description" wire:model.defer="product.description" col="30"></textarea>

                <x-jet-input-error for="product.description" class="mt-2" />
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
    <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: {
                    items: [
                        'heading', '|',
                        'bold', 'italic', 'blockQuote', 'link', '|',
                        'outdent', 'indent', '|',
                        'bulletedList', 'numberedList', '|',
                        'undo', 'redo'
                    ],

                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>

@endpush
