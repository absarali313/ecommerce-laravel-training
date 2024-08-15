<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class ProductSearch extends Component
{
    use WithPagination;

    public $searchTerm = '';
    public $products = '';
    public $showResults = false;


    public function mount()
    {
        // Initialize $products as an empty collection to avoid null issues
        $this->products = collect();
    }

    public function search()
    {
        \Log::info('Search Term: ' . $this->searchTerm);
        $searchTerm = '%' . $this->searchTerm . '%';
        $this->showResults = $this->products->isNotEmpty();

        // Perform the query and paginate the results
        $this->products = Product::where('title', 'like', $searchTerm)->paginate(10);
        $this->products = new Collection($this->products->items());

        return $this; // Trigger a re-render
    }
    public function render()
    {
        return view('livewire.product-search');
    }
}
