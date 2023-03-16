<?php

namespace App\Http\Livewire\Interactive;

use Livewire\Component;
use App\Models\Product;

class Products extends Component
{
    public $search = '';
    protected $queryString = ['search' => ['except' => '']];

    public function render()
    {
        $products = Product::where('name', 'like', "%$this->search%")->orWhere('item_number', 'like', "%$this->search%")->paginate(10);
        return view('livewire.interactive.products', ['products' => $products]);
    }
}
