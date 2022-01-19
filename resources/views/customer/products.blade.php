<x-store-layout>
    <x-slot name="title"> List Produk </x-slot>

    <div class="container-product mt-2">
        <section class="row" id="product-page">
            <div class="col filter-product me-3">

                <div class="sidebar-wrap">
                    <section class="filter">
                        @include('customer.components.products.sort-filter')

                        {{-- TODO Add Sort ascending and descending --}}
                        @include('customer.components.products.category-filter')

                    </section>
                </div>
            </div>

            <div class="col-lg-9 product">
                @include('customer.components.products.search-filter')

                <div class="product-wrapper">
                    @foreach ($products as $product)
                        @include('customer.components.products.product-card')
                    @endforeach
                </div>
            </div>
        </section>
    </div>

    @if (session()->has('loginAdminError'))
        <script>
            Swal.fire({
                title: 'Akses Ditolak',
                icon: 'error',
                text: 'Akses admin tidak terdeteksi, silahkan login dengan akun admin',
            })
        </script>
    @endif
</x-store-layout>
