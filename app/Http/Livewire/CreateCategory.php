<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateCategory extends Component
{
    use WithFileUploads;

    public $image;

    public $category;
    public $categoryId;
    public $action;
    public $button;
    public $slug;

    protected function getRules()
    {

        return array_merge([
            'category.name' => 'required|min:3',
            'image' => 'image|file|max:5120|mimes:png,jpeg,jpg ',
        ]);
    }

    public function createCategory()
    {

        $this->resetErrorBag();
        $this->validate();

        $filePath = $this->image->store('/images/category');

        $this->category['slug'] = $this->slug;

        $this->category['image'] = $filePath;

        dd($this->category);

        Category::create($this->category);


        $this->emit('saved');
        $this->reset('category');
        $this->reset('image');
    }

    /* public function updateCategory()
    {
        $this->resetErrorBag();
        $this->validate();

        $this->category['slug'] = $this->slug;


        Category::query()
            ->where('id', $this->categoryId)
            ->update([
                "name" => $this->category->name,
                "slug" => $this->category->slug,
            ]);

        $this->emit('saved');
    }
 */
    public function mount()
    {
        if (!$this->category && $this->categoryId) {
            $this->category = Category::find($this->categoryId);
        }

        $this->button = create_button($this->action, "Category");
    }

    public function generateSlug()
    {
        $this->slug = SlugService::createSlug(Category::class, 'slug', $this->category->name);
    }

    public function render()
    {
        return view('livewire.create-category');
    }
}
