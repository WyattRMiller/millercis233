<?php

namespace App\Http\Livewire\Interactive;

use Livewire\Component;
use App\Models\Product;

class Products extends Component
{
    public $sortBy = 'name';
    public $direction = 'asc';
    public $search = '';
    protected $queryString = ['search' => ['except' => '']];

    public function doSort($field, $direction)
    {
        $this->sortBy = $field;
        $this->direction = $direction;
    }

    public function render()
    {
        $products = Product::where('name', 'like', "%$this->search%")->orWhere('item_number', 'like', "%$this->search%")->orderBy($this->sortBy, $this->direction)->paginate(10);
        return view('livewire.interactive.products', ['products' => $products]);
    }
}