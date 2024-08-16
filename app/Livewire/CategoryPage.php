<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CategoryPage extends Component
{
    #[Validate('required|min:3')]
    public string $searchText = '';
    public $categories;
    public bool $trashed = false;

    public function mount(bool $trashed = false)
    {
        $this->trashed = $trashed;
        $this->loadCategories();
    }

    /**
     * Load categories based on the search text and trashed status.
     * @return void
     */
    public function loadCategories(): void
    {
        $query = $this->trashed ? Category::onlyTrashed() : Category::query();

        if (strlen($this->searchText) > 0) {
            $query->where('name', 'like', '%' . trim($this->searchText) . '%');
        }

        $this->categories = $query->get();
    }

    public function render()
    {
        return view('livewire.category-page', [
            'categories' => $this->categories,
        ]);
    }
}
