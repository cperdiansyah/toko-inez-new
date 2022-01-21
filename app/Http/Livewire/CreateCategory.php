<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\Component;

class CreateCategory extends Component
{
    public $category;
    public $categoryId;

    public $action;
    public $button;

    public $slug;

    protected function getRules()
    {

        return array_merge([
            'category.name' => 'required|min:3',
        ]);
    }

    public function createCategory()
    {
        $this->resetErrorBag();
        $this->validate();

        $this->category['slug'] = $this->slug;
        
        Category::create($this->category);


        $this->emit('saved');
        $this->reset('category');
    }

    /* public function updateUser()
    {
        $this->resetErrorBag();
        $this->validate();

        Category::query()
            ->where('id', $this->userId)
            ->update([
                "name" => $this->categories->name,
                "email" => $this->categories->email,
                "is_admin" => $this->categories->is_admin,
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
        $this->slug = SlugService::createSlug(Category::class, 'slug', $this->category->slug);
    }

    public function render()
    {
        return view('livewire.create-category');
    }
}
