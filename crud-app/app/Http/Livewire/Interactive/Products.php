<?php

namespace App\Http\Livewire\Interactive;

use Livewire\Component;
use App\Models\Product;

class Products extends Component
{
    public function render()
    {
        $products = Product::get();
        return view('livewire.interactive.products', ['products' => $products]);
    }
}
