@extends('layout')

@section('content')

<a type="button" class="btn btn-primary" href="{{route('products.create')}}">Add Product</a>

<table class="table table-striped table-hover table-bordered text-center">

<thead>
  <tr>
    <th>Image</th>
    <th>Name</th>
    <th>Price</th>
    <th>Item Number</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
</thead>
<tbody>
  @foreach ($products as $product)
  <tr>
    <td><img src="{{$product->image}}" alt="product image" class="img-responsive" width="50" height="50"></td>
    <td><a href="{{route('products.show', $product->id)}}">{{$product->name}}</a></td>
    <td>${{$product->price}}</td>
    <td>{{$product->item_number}}</td>
    <td><button type="button" class="btn btn-primary">Edit</button></td>
    <td>
      <form action="{{route('products.destroy', $product->id)}}" method="POST" onSubmit="return confirm('Are you sure you want to delete the product named {{$product->name}}?')">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger">Delete</button>
      </form>
    </td>
  </tr>
  @endforeach
</tbody>
</table>
{!! $products->links('pagination::bootstrap-4') !!}
@endsection