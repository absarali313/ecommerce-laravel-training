<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CategoryIndex extends Component
{
    public $categories;

    public bool $trashed = false;

    public $reorderedIds = [];

    public function mount(): void
    {
        $this->loadCategories();
    }

    /**
     * Display the view for this component
     * @return View
     */
    public function render(): view
    {
        return view('livewire.category-page');
    }

    /**
     * Load categories based on the search text and trashed status.
     * @return void
     */
    public function loadCategories(): void
    {
        // Checks if the categories should be loaded from trashed only
        $this->trashed = request()->route()->getName() == 'admin_categories_archive';
        $query = $this->trashed ? Category::onlyTrashed() : Category::query();

        $this->categories = $query->orderBy('position','asc')->get();
    }

    /**
     * Reorder the position of categories
     * @param int $id the id of the category
     * @param int $position new position of the category
     */
    public function reorder(int $id, int $position): void
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
        $this->loadCategories();
    }

    /**
     * Deletes a category
     * Set the category's position to null
     * Reorder the categories position that comes after the deleting category
     * @param Category $category the category that needs to be deleted
     */
    public function delete(Category $category): void
    {
        $currentPosition = Category::where('id', $category->id)->value('position');
        $category->position = null;
        $category->save();

        Category::where('position', '>', $currentPosition)->decrement('position');

        $category->delete();

        $this->loadCategories();
    }

    /**
     * Restores a deleted category
     * Sets the new position of the category
     * The new position of the category is N + 1. Where N is the current maximum position of categories.
     * @param int $id
     * @return void
     */
    public function restore(int $id): void
    {
        $category = Category::withTrashed()->find($id);
        $category->restore();
        $category->position = Category::getNewPosition();
        $category->save();

        $this->loadCategories();
    }
}
