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
        $this->showResults = true; // Show results even if empty
    }

    public function render()
    {
        // Perform the query and paginate the results
//        dd("%{$this->searchTerm}%");
        $products = Product::where('title', 'like', "%{$this->searchTerm}%")
            ->orderBy('sort_order')
            ->get();


        return view('livewire.product-search', [
            'products' => $products,
        ]);
    }
}
