<div class="col-lg-3 mb-4">
    <div class="card radius-big ">
        <a href="product/{{ $product->slug }}">
            <img src="{{ isset($product->gallery->image) ? asset('storage/' . $product->gallery->first()->image) : asset('storage/' . 'images/no_image_available.jpg') }}"
                alt="{{ $product->name }} image" loading="lazy" class="card-img-top">
        </a>

        <div class="card-body pb-2">
            <div class="price-rating w-100">
                <div class="price-wrap row justify-content-between align-items-end ">

                    <div class="old-price text-decoration-line-through text-danger ">Rp.
                        {{ number_format($product->price, 0, ',', '.') }}
                    </div>
                    <div class="new-price pt-1 pe-0">Rp. 150.000</div>

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
</div>
