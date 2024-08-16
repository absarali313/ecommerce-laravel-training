<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductReorder extends Component
{
    public $products;

    public function mount()
    {
        $this->products = Product::orderBy('sort_order')->get();
    }

    public function reorder($ids)
    {
        foreach ($ids as $index => $id) {
            Product::where('id', $id)->update(['sort_order' => $index]);
        }

        $this->products = Product::orderBy('sort_order')->get();
    }

    public function render()
    {
        return view('livewire.product-reorder');
    }
}
