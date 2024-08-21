<?php

namespace App\Livewire\Category;

use App\Actions\Admin\Category\SaveCategoryProducts;
use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;
use Livewire\Component;

class AddProductToCategory extends Component
{
    public string $searchText = '';

    public $products;

    public array $selectedProducts = [];

    public Category $category;

    public function mount(): void
    {
        $this->products = Product::all();
        // Convert related products to array of IDs
        $this->selectedProducts = $this->category->products->pluck('id')->toArray();
    }

    /**
     * Load products based on the search text.
     * @return void
     */
    public function loadProducts(): void
    {
        if (strlen($this->searchText) > 0) {
            $this->products = Product::where('title', 'like', '%' . trim($this->searchText) . '%')->get();
        } else {
            $this->products = Product::all();
        }
    }

    /**
     * Stores the selected products in array
     * @param int $productId the product id that is being stored in the array
     */
    public function toggle(int $productId): void
    {
        if (in_array($productId, $this->selectedProducts)) {
            // Remove the product ID from the array
            $this->selectedProducts = array_filter($this->selectedProducts, function ($id) use ($productId) {
                return $id !== $productId;
            });
        } else {
            // Add the product ID to the array
            $this->selectedProducts[] = $productId;
        }
    }

    /**
     * Saves the association of product and categories
     * @param SaveCategoryProducts $saveCategoryProducts
     * @return void
     */
    public function save(SaveCategoryProducts $saveCategoryProducts): void
    {
        $saveCategoryProducts->handle($this->selectedProducts, $this->category);
    }

    /**
     * Display the view
     * @return View
     */
    public function render(): view
    {
        return view('livewire.add-product-to-category');
    }
}
