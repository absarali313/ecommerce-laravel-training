<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CategoryIndex extends Component
{
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
        // Checks if the categories should be loaded from trashed only
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
