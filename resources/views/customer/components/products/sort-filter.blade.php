@php
$filter = [
    [
        'id' => 'all',
        'title' => 'Semua Produk',
    ],
    [
        'id' => 'best-seller',
        'title' => 'Penjualan Terbaik',
    ],
    [
        'id' => 'top-rated',
        'title' => 'Rating Terbaik',
    ],
    [
        'id' => 'new-Product',
        'title' => 'Produk Terbaru',
    ],
];
$productsFilter = array_to_object($filter);
@endphp


<div class="card radius" id="filter-product">
    <div class="card-body">
        <a class="btn card-title w-100 d-flex justify-content-between align-items-center" data-toggle="collapse"
            href="#filter" role="button" aria-expanded="true" aria-controls="filter">
            <span class="h5 font-weight-bold m-0">Filter</span>

            <i class="fas fa-chevron-down"></i>
        </a>

        <div class="collapse show" id="filter">
            <form action="#">
                @foreach ($productsFilter as $filter)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="filter-product" id="{{ $filter->id }}"
                            value="{{ $filter->id }}">
                        <label class="form-check-label" for="{{ $filter->id }}">
                            {{ $filter->title }}
                        </label>
                    </div>
                @endforeach
            </form>
        </div>


    </div>
</div>
