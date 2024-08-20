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
    public $reorderedIds = [];

    public function mount(bool $trashed = false): void
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

        $this->categories = $query->orderBy('position','asc')->get();
    }

    public function updateSortOrder($reorderedIds)
    {
        // Validate and update the sort order
        foreach ($reorderedIds as $position => $id) {
            Category::where('id', $id)->update(['position' => $position]);
        }
        // Optionally refresh categories to reflect new order
        $this->categories = Category::orderBy('position')->get();
    }

    public function updateSortOrderFromButton()
    {
        $this->updateSortOrder($this->reorderedIds);
    }



    public function render()
    {
        return view('livewire.category-page', [
            'categories' => $this->categories,
        ]);
    }
}
