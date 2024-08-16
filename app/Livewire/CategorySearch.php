<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Validate;
use Livewire\Component;
use function Laravel\Prompts\alert;

class CategorySearch extends Component
{
    #[Validate('required|min:3')]
    public String $searchText = "";
    public $categories = [];

    public function render()
    {
        return view('livewire.category-search');
    }

    public function getProducts(): void
    {
        if( strlen($this->searchText) > 2) {
            $this->categories = Category::whereAny([
                'name',
                ] , 'like', trim($this->searchText) . '%')->get();
        } else {
            $this->reset('categories');
        }
    }
}
