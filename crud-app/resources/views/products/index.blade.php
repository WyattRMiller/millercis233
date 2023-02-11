@extends('layout')

@section('content')


<table class="table">

  <tr>
    <th>Image</th>
    <th>Name</th>
    <th>Price</th>
    <th>Item Number</th>
  </tr>
  @foreach ($products as $product)
  <tr>
    <td><img src="{{$product->image}}" alt="product image" class="img-responsive" width="50" height="50"></td>
    <td><a href="{{route('products.show', $product->id)}}">{{$product->name}}</a></td>
    <td>${{$product->price}}</td>
    <td>{{$product->item_number}}</td>
  </tr>
  @endforeach
</table>
{!! $products->links('pagination::bootstrap-4') !!}
@endsection