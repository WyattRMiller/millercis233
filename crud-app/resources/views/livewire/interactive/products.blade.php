<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <input wire:model="search" type="text" placeholder="Search Products" size="50" />
                    <select wire:model="productsPerPage">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="{{ PHP_INT_MAX }}">All</option>
                    </select>
                    <select wire:model="ratingSelect">
                        <option value="1">★</option>
                        <option value="2">★★</option>
                        <option value="3">★★★</option>
                        <option value="4">★★★★</option>
                        <option value="5">★★★★★</option>
                    </select>
                    {{ $products->links() }}
                    <table class="table table-striped table-hover table-bordered text-center mb-2 mt-2">

                        <thead>
                            <tr>
                                <th>
                                    <button href="#" wire:click="doSort('name', 'asc')">&uarr;</button>
                                    Name
                                    <button href="#" wire:click="doSort('name', 'desc')">&darr;</button>
                                </th>
                                <th>
                                    <button href="#" wire:click="doSort('price', 'asc')">&uarr;</button>
                                    Price
                                    <button href="#" wire:click="doSort('price', 'desc')">&darr;</button>
                                </th>
                                <th>Item Number</th>
                                <th>
                                    Rating
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>

                                    <td>${{ $product->price }}</td>

                                    <td>{{ $product->item_number }}</td>

                                    <td>
                                        <p>
                                        @for ($count = 0; $count < $product->averageRating; $count++) 
                                        ★
                                        @endfor
                                        </p>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
