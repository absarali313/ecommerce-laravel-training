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

    public function reorder($data){

        $itemId = $data[0]; // The ID of the item being moved
        $newPosition = $data[1]; // The new position of the item

        // Get the current position of the item
        $currentPosition = Category::where('id', $itemId)->value('position');

        // Move the item up
        if ($currentPosition > $newPosition) {
            // Shift items down in the new position range
            Category::whereBetween('position', [$newPosition, $currentPosition - 1])
                ->increment('position');
        }
        // Move the item down
        elseif ($currentPosition < $newPosition) {
            // Shift items up in the current position range
            Category::whereBetween('position', [$currentPosition + 1, $newPosition])
                ->decrement('position');
        }

        // Move the item to its new position
        Category::where('id', $itemId)
            ->update(['position' => $newPosition]);

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
