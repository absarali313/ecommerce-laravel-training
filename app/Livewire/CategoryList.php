<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryList extends Component
{
    public $categories;

    public function mount(){
        $this->categories = Category::orderBy('position')->get();
    }
    public function render()
    {
        return view('livewire.category-list', ['categories' => $this->categories]);
    }
}
