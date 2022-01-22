<div>
    <x-data-table :data="$data" :model="$categories">
        <x-slot name="head">
            <tr>
                <th>
                    <a wire:click.prevent="sortBy('id')" role="button" href="#">ID
                        @include('components.sort-icon',
                        ['field' => 'id'])
                    </a>
                </th>
                <th>
                    <a wire:click.prevent="sortBy('name')" role="button" href="#">
                        Nama Kategori
                        @include('components.sort-icon', ['field' => 'name'])
                    </a>
                </th>

                <th class="text-center">
                    <a wire:click.prevent="sortBy('products_count')" role="button" href="#">
                        Jumlah produk
                        @include('components.sort-icon', ['field' => 'products_count'])
                    </a>
                    {{-- Jumlah produk --}}
                </th>
                <th class="text-center">
                    Foto
                </th>

                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($categories as $category)
                <tr x-data="window.__controller.dataTableController({{ $category->id }})">
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>

                    <td class="text-center"> {{ $category->products->count() }}</td>
                    <td>
                        @if (isset($category->image))
                            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}"
                                width="100" class="table-image shadow" loading="lazy">

                        @else
                            <img src="{{ asset('storage/' . 'images/no_image_available.jpg') }}"
                                alt="{{ $category->name }}" width="100" class="table-image shadow" loading="lazy">
                        @endif
                    </td>

                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="/admin/category/edit/{{ $category->id }}" class="mr-3"><i
                                class="fa fa-16px fa-pen"></i>
                        </a>

                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i
                                class="fa fa-16px fa-trash text-red-500"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
