<?php

namespace App\Livewire;

use App\Actions\Admin\Product\SaveProductCategories;
use App\Models\Category;
use Livewire\Component;

class CategoryTree extends Component
{
    public $categories;
    public $selectedCategory;
    public $product;

    public function mount()
    {
        $this->categories = Category::whereNull('parent_id')->get();
    }

    public function toggle($categoryId)
    {
        if(isset($this->selectedCategory[$categoryId])){
            unset($this->selectedCategory[$categoryId]);
        } else {
            $this->selectedCategory[$categoryId] = $categoryId;
        }
        if($this->product) {
            $this->save(new SaveProductCategories());
        }
    }

    public function save(SaveProductCategories $saveProductCategories)
    {
        $saveProductCategories->handle($this->selectedCategory, $this->product);
    }

    public function render()
    {
        return view('livewire.category-tree');
    }
}
