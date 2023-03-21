<?php

namespace App\Http\Livewire\Interactive;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

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
        $products = DB::table('products')
            ->leftJoin('reviews', 'products.id', '=', 'reviews.product_id')
            ->select('product_id','name', 'price', 'item_number', DB::raw('round(avg(rating)) as averageRating'))
            ->groupBy('product_id', 'name', 'price', 'item_number')
            ->having(DB::raw('round(avg(rating))'), '=', $this->ratingSelect)
            ->where(function ($query) {
                $query->where('name', 'like', "%$this->search%")
                    ->orWhere('item_number', 'like', "%$this->search%")
                ;
            })
            ->orderBy($this->sortBy, $this->direction)
            ->paginate($this->productsPerPage);

        return view('livewire.interactive.products', ['products' => $products]);
    }
}