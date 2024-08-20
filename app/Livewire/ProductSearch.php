<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class ProductSearch extends Component
{
    use WithPagination;

    public $showResults = false;
    public $searchTerm = '';

    public function updatedSearchTerm()
    {
        // Show results only if searchTerm is not empty
        $this->showResults = !empty($this->searchTerm);
    }

    public function render()
    {
       $products = $this->showResults ?
                   Product::where('title', 'like', "%{$this->searchTerm}%")
                          ->orderBy('title')
                          ->paginate(10) :
                   Product::paginate(10);

        return view('livewire.product-search', [
            'products' => $products, // Paginated products for Blade
        ]);
    }
}
