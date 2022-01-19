<div class="card radius" id="category-filter">
    <div class="card-body">

        <a class="btn card-title w-100 d-flex justify-content-between align-items-center" data-toggle="collapse"
            href="#category" role="button" aria-expanded="true" aria-controls="category">
            <span class="h5 font-weight-bold m-0">Kategori</span>

            <i class="fas fa-chevron-down"></i>
        </a>
        <div class="collapse show" id="category">
            <form action="#">
                @foreach ($categories as $category)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{ $category->slug }}"
                            id="category-{{ $category->id }}" name="{{ $category->slug }}">
                        <label class="form-check-label" for="category-{{ $category->id }}">
                            {{ $category->name }}
                        </label>
                    </div>
                @endforeach
            </form>
        </div>
    </div>
</div>
