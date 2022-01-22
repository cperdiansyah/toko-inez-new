<div>
    <x-data-table :data="$data" :model="$products">
        <x-slot name="head">
            <tr>
                <th>
                    <a wire:click.prevent="sortBy('id')" role="button" href="#">ID
                        @include('components.sort-icon',
                        ['field' => 'id'])
                    </a>
                </th>
                <th>
                    <a wire:click.prevent="sortBy('name')" role="button" href="#">Nama Produk
                        @include('components.sort-icon', ['field' => 'name'])
                    </a>
                </th>
                <th>
                    <a wire:click.prevent="sortBy('price')" role="button" href="#">Harga
                        @include('components.sort-icon', ['field' => 'price'])
                    </a>
                </th>

                <th>
                    <a wire:click.prevent="sortBy('quantity')" role="button" href="#">Stok
                        @include('components.sort-icon', ['field' => 'quantity'])
                    </a>
                </th>
                <th>
                    <a wire:click.prevent="sortBy('is_discount')" role="button" href="#">Diskon
                        @include('components.sort-icon', ['field' => 'is_discount'])
                    </a>
                </th>

                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($products as $product)
                <tr x-data="window.__controller.dataTableController({{ $product->id }})">
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>@convertMoney($product->price)</td>
                    <td>{{ $product->quantity }}</td>

                    @if ($product->is_discount)

                        <td class="font-weight-bold text-danger">{{ $product->is_discount }}</td>

                    @else
                        <td class="">Tidak</td>

                    @endif

                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="/admin/product/edit/{{ $product->id }}" class="mr-3"><i
                                class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="softDelete" href="#"><i
                                class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
