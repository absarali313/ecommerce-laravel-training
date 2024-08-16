<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CategoryPage extends Component
{
    #[Validate('required|min:3')]
    public String $searchText = "";
    public $categories;

    public function mount()
    {
        $this->categories = Category::all();
    }
    /**
     * Find related categories
     * @return void
     */
    public function getCategories(): void
    {
        if( strlen($this->searchText) > 0) {
            $this->categories = Category::whereAny([
                'name',
            ] , 'like', '%' . trim($this->searchText) . '%')->get();
        } else {
            $this->categories = Category::all();
        }

    }
    public function render()
    {
        return view('livewire.category-page', [
            'categories' => $this->categories, // Pass categories to the view
        ]);
    }
}
