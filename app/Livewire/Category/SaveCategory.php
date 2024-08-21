<?php

namespace App\Livewire\Category;

use App\Actions\Admin\Category\SaveCategoryProducts;
use App\Livewire\Forms\CategoryForm;
use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class SaveCategory extends Component
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
        if(isset($this->category)){
            $this->setCategoryForm();
        } else {
            $this->category = new Category();
        }
        $this->products = Product::all();
        $this->categories = Category::all();
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
    public function saveProducts(SaveCategoryProducts $saveCategoryProducts): void
    {
        if($this->category) {
            $saveCategoryProducts->handle($this->selectedProducts, $this->category);
        }
    }

    /**
     * Updates an existing record of category
     * @return void
     */
    public function update(): void
    {
       $this->categoryForm->save($this->category);
    }

    /**
     * Stores a new category
     * @return void
     */
    public function store()
    {
       $this->categoryForm->save( new Category());

    }

    /**
     * Create a new records if category does not exists already in the database.
     * Otherwise, update the existing record/
     * @return void
     */
    public function save()
    {
        if($this->category->exists) {
            $this->update();
        } else {
            $this->store();
        }

        $this->saveProducts( new SaveCategoryProducts());
    }

    public function render(): view
    {
        return view('livewire.save-category');
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
}
