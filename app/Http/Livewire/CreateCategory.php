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
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:5120',
        ]);
    }

    public function createCategory()
    {

        $this->resetErrorBag();
        $this->validate();

        /* Create Slug */
        $this->category['slug'] = $this->slug;


        /* Get image path and store to public storage   */
        if (isset($this->image)) {
            $filePath = $this->image->store('/images/category');
            $this->category['image'] = $filePath;
        }

        Category::create($this->category);


        $this->emit('saved');
        $this->reset('category');
        $this->reset('image');
    }

    public function updateCategory()
    {
        $this->resetErrorBag();
        $this->validate();

        /* Generate slug. But first compare if they have same name between field in database and category name form, slug will not be generate  */

        if ($this->category->name != $this->category->getOriginal('name')) {
            $this->category['slug'] = $this->generateSlug();
        }

        /* Get image path and store to public storage   */
        $this->category['image'] = $this->category->getOriginal('image');
        if (isset($this->image)) {
            $filePath = $this->image->store('/images/category');
            $this->category['image'] = $filePath;
        }

        Category::query()
            ->where('id', $this->categoryId)
            ->update([
                "name" => $this->category->name,
                "slug" => $this->category->slug,
                "image" => $this->category['image']
            ]);

        $this->emit('saved');
        redirect()->to(route('category'));
    }

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

        return $this->slug;
    }

    public function render()
    {
        return view('livewire.create-category');
    }
}
