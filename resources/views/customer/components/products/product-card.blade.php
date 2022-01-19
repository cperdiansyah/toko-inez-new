{{-- <div class="col-lg-3 mb-4">
    <div class="card radius-big ">
        <a href="product/{{ $product->slug }}">
            <img src="{{ isset($product->gallery->image) ? asset('storage/' . $product->gallery->first()->image) : asset('storage/' . 'images/no_image_available.jpg') }}"
                alt="{{ $product->name }} image" loading="lazy" class="card-img-top">
        </a>

        <div class="card-body pb-2">
            <div class="price-rating w-100">
                <div class="price-wrap row justify-content-between align-items-end ">
                    <div class="price col-lg-8 row mt-1">
                        <div class="new-price pt-1 pe-0">Rp.
                            {{ number_format($product->price, 0, ',', '.') }}
                        </div>
                    </div>

                    <div class="rating col-lg-4 ps-0">
                        <i class="fas fa-star"></i></i> 0.0
                    </div>
                </div>
            </div>

            <h5 class="card-title mt-2"><a href="product/{{ $product->slug }}">{{ $product->name }}</a></h5>

            <div class="product-bottom-info w-100">
                <div class="row justify-content-between align-items-center">

                    <div class="col-lg-6 product-sold">
                        Terjual 1000
                    </div>

                    <div class="col-lg-6 ">
                        <div class="whistlist-cart d-flex justify-content-end">

                            <button class="btn-whistlist" id="whistlist-{{ $product->id }}">
                                <i class="far fa-heart"></i>
                            </button>

                            <button class="btn-cart" id="cart-{{ $product->id }}">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div> 
</div> --}}

<div class="product-item radius-big">
    <a href="product/{{ $product->slug }}">
        <div class="card">
            <div class="image-section">
                <img src="{{ isset($product->gallery->image) ? asset('storage/' . $product->gallery->first()->image) : asset('storage/' . 'images/no_image_available.jpg') }}"
                    alt="{{ $product->name }} image" loading="lazy" class="card-img-top">

                <div class="rating col p-0 ">
                    <span class="d-flex ml-auto p-2"><i class="fas fa-star "></i> 4.6</span>
                </div>
            </div>

            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>

                <div class="price-wrapper d-flex p-0 justify-content-between align-items-end mt-2">
                    <div class="price mt-1 p-0">
                        <div class="new-price pt-1 pr-0"><span>Rp.
                                {{ number_format($product->price, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>
