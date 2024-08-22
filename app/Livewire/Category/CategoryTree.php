<?php

namespace App\Livewire\Category;

use App\Actions\Admin\Category\SaveCategoryProducts;
use App\Actions\Admin\Product\SaveProductCategories;
use App\Models\Category;
use Illuminate\View\View;
use Livewire\Component;

class CategoryTree extends Component
{
    public $categories;

    public $selectedCategory = [];

    public $product;

    public function mount(): void
    {
        $this->selectedCategory = $this->product->categories()->pluck('category_id')->toArray();
        $this->categories = Category::whereNull('parent_id')->get();
    }

    /**
     * Display the view for this component
     * @return View
     */
    public function render(): view
    {
        return view('livewire.category-tree');
    }

    /**
     * Stores the category list in an array
     * @param int $categoryId the category id that needs to be stored
     */
    public function toggleSelectedCategory(int $categoryId): void
    {
        if (in_array($categoryId, $this->selectedCategory)) {
            // If the category ID is already selected, remove it from the array
            $this->selectedCategory = array_filter($this->selectedCategory, function($id) use ($categoryId) {
                return $id !== $categoryId;
            });
        } else {
            // If the category ID is not selected, add it to the array
            $this->selectedCategory[] = $categoryId;
        }
        $this->associateCategories(new SaveProductCategories());
    }

    /**
     * Saves the association of product and categories
     * @param SaveProductCategories $saveProductCategories
     * @return void
     */
    public function associateCategories(SaveProductCategories $saveProductCategories): void
    {
        $saveProductCategories->handle($this->selectedCategory, $this->product);
    }
}
