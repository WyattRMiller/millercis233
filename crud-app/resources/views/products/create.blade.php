@extends('layout')

@section('content')

<h1 class="text-center">Add a product</h1>

<form method="POST" action="{{route('products.store')}}" class="row g-3 justify-content-center text-center">
    <div class="col-2">
@csrf

  <div class="col-12">
    <label for="name" class="form-label">Product Name</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>

  <div class="col-12">
    <label for="price" class="form-label">Product Price</label>
    <input type="text" class="form-control" id="price" name="price">
  </div>

  <div class="col-12">
    <label for="description" class="form-label">Product Description</label>
    <input type="text" class="form-control" id="description" name="description">
  </div>

  <div class="col-12">
    <label for="item_number" class="form-label">Item Number</label>
    <input type="text" class="form-control" id="item_number" name="item_number">
  </div>

  <div class="col-12">
    <label for="image" class="form-label">Product Image</label>
    <input type="text" class="form-control" id="image" name="image">
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{route('products.index')}}" class="btn btn-danger">Cancel</a> 
  </div>

    </div>
</form>
@endsection