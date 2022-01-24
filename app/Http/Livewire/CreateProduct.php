<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\Component;

class CreateProduct extends Component
{
    public $product;
    public $productId;
    public $action;
    public $button;
    public $slug;

    protected function getRules()
    {
        $rules = [];
        /*  return array_merge([
            'category.name' => 'required|min:3',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:5120',
        ]); */
        return $rules;
    }

    public function createProduct()
    {

        $this->resetErrorBag();
        $this->validate();

        /* Create Slug */
        $this->product['slug'] = $this->slug;

        Product::create($this->product);


        $this->emit('saved');
        $this->reset('product');
    }


    public function mount()
    {

        if (!$this->product && $this->productId) {

            $this->product = Product::find($this->productId);
        }
        $this->button = create_button($this->action, "Product");
    }

    public function generateSlug()
    {
        $this->slug = SlugService::createSlug(Product::class, 'slug', $this->product->name);

        return $this->slug;
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.create-product', compact('categories'));
        /* dd($categories);
        return view('livewire.create-product', [
            'categories' => $categories,
        ]); */
    }
}
