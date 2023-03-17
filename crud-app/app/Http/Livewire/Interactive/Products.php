<?php

namespace App\Http\Livewire\Interactive;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public $sortBy = 'name';
    public $direction = 'asc';
    public $search = '';
    protected $queryString = [
        'search' => ['except' => ''],
        'sortBy' => ['except' => ''],
        'direction' => ['except' => ''],
        'productsPerPage' => ['except' => ''],
        'ratingSelect' => ['except' => '']
    ];

    public $productsPerPage = 10;

    public $ratingSelect = 1;

    public function doSort($field, $direction)
    {
        $this->sortBy = $field;
        $this->direction = $direction;
    }

    public function render()
    {
        $products = Product::where(function ($query) {
            $query->where('name', 'like', "%$this->search%")
            ->orWhere('item_number', 'like', "%$this->search%")
            ; })
            ->where('rating', '=', $this->ratingSelect)
            ->orderBy($this->sortBy, $this->direction)
            ->paginate($this->productsPerPage);
        return view('livewire.interactive.products', ['products' => $products]);
    }
}