<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <table class="table table-striped table-hover table-bordered text-center">

                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Item Number</th>
                                <th>Rating</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>

                                    <td>${{ $product->price }}</td>

                                    <td>{{ $product->item_number }}</td>

                                    <td>
                                        @for ($i = 0; $i < $product->rating; $i++)
                                            ★
                                        @endfor
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
