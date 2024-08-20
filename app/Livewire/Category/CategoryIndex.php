<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CategoryIndex extends Component
{
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
        $this->categories = $query->orderBy('position','asc')->get();
    }

    /**
     * Reorder the position of categories
     * @param int $id the id of the category
     * @param int $position new position of the category
     */
    public function reorder($id, $position): void
    {
        // Get the current position of the item
        $currentPosition = Category::where('id', $id)->value('position');

        // Move the item up
        if ($currentPosition > $position) {
            // Shift items down in the new position range
            Category::whereBetween('position', [$position, $currentPosition - 1])
                ->increment('position');
        }
        // Move the item down
        elseif ($currentPosition < $position) {
            // Shift items up in the current position range
            Category::whereBetween('position', [$currentPosition + 1, $position])
                ->decrement('position');
        }

        // Move the item to its new position
        Category::where('id', $id)
            ->update(['position' => $position]);

        // Refresh the categories
        $this->categories = Category::orderBy('position')->get();
    }

    public function render()
    {
        return view('livewire.category-page', [
            'categories' => $this->categories,
        ]);
    }
}
