<?php

namespace App\Livewire\Category;

use App\Actions\Admin\Category\SaveCategoryProducts;
use App\Livewire\Forms\CategoryForm;
use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class ManageCategory extends Component
{
    use WithFileUploads;

    public CategoryForm $categoryForm;

    public string $searchText = '';

    public $products;

    public array $selectedProducts = [];

    public Category $category;

    public $categories;

    public function mount(): void
    {
        $this->setCategory();
        $this->products = Product::all();
        $this->categories = Category::all();
        $this->selectedProducts = $this->category->products->pluck('id')->toArray();
    }

    public function render(): view
    {
        return view('livewire.manage-category');
    }

    /**
     * Load products based on the search text.
     * @return void
     */
    public function loadProducts(): void
    {
        $this->products = Product::where('title', 'like', '%' . trim($this->searchText) . '%')->get();
    }

    /**
     * Stores the selected products in array
     * @param int $productId the product id that is being stored in the array
     */
    public function toggleSelectedProduct(int $productId): void
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
    public function associateProducts(SaveCategoryProducts $saveCategoryProducts): void
    {
        if($this->category) {
            $saveCategoryProducts->handle($this->selectedProducts, $this->category);
        }
    }

    /**
     * Updates an existing record of category
     * @return void
     */
    public function updateCategory(): void
    {
       $this->categoryForm->save($this->category);
    }

    /**
     * Stores a new category
     * @return void
     */
    public function storeCategory()
    {
       $this->categoryForm->save( new Category());

    }

    /**
     * Create a new records if category does not exists already in the database.
     * Otherwise, update the existing record/
     * @return void
     */
    public function saveCategory()
    {
        if($this->category->exists) {
            $this->updateCategory();
        } else {
            $this->storeCategory();
        }

        $this->associateProducts( new SaveCategoryProducts());
    }

    /**
     * Sets the properties of the category form.
     * @return void
     */
    private function setCategoryForm(): void
    {
        $this->categoryForm->category = $this->category;
        $this->categoryForm->name = $this->category->name;
        $this->categoryForm->parent = $this->category->parent?->name;
        $this->categoryForm->imagePath = $this->category->image_path;
    }

    /**
     * Instantiate a new category object if it does not already exist
     * @return void
     */
    public function setCategory(): void
    {
        if (isset($this->category)) {
            $this->setCategoryForm();
        } else {
            $this->category = new Category();
        }
    }
}
