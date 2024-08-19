<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class ProductReorder extends Component
{
    use WithPagination;
    public $products = [];
    public function mount($products)
    {
        // Initialize products
        $this->products = $products;
    }

    public function loadProducts()
    {
        $this->products = Product::orderBy('sort_order')->get();
    }
    public function loadArchiveProducts()
    {
        $this->products = Product::onlyTrashed()->orderBy('sort_order')->get();
    }
    public function reorder($ids)
    {
        foreach ($ids as $index => $id) {
            Product::where('id', $id)->update(['sort_order' => $index]);
        }

        // Reload products after reordering
        $this->loadProducts();
    }

    private function reindexProducts()
    {
        $products = Product::orderBy('sort_order')->get();

        foreach ($products as $index => $product) {
            $product->sort_order = $index;
            $product->save();
        }

        // Reload products after reindexing
        $this->loadProducts();
    }

    public function deleteProduct($productId)
    {
        $product = Product::findOrFail($productId);

        // Set sort_order to 0 before deleting
        $product->sort_order = 0;
        $product->save();

        // Soft delete the product
        $product->delete();

        // Reindex remaining products
        $this->reindexProducts();
    }

    public function restoreProduct($productId)
    {
        $product = Product::withTrashed()->find($productId);

        if ($product && $product->trashed()) {
            // Restore the product
            $product->restore();

            // Add the restored product at the end
            $product->sort_order = Product::max('sort_order') + 1;
            $product->save();

            // Reload products after restoration
            $this->loadArchiveProducts();
        } else {
            // Handle case where product is not found or not trashed
            session()->flash('error', 'Product not found or not deleted.');
        }

    }

    public function render()
    {
        return view('livewire.product-reorder');
    }
}
