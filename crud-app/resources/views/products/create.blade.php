@extends('layout')

@section('content')

<h1 class="text-center">Add a product</h1>

<form method="POST" action="{{route('products.store')}}" class="row g-3 justify-content-center text-center">
    <div class="col-2">

@csrf
@include('products.form')

  <div class="col-12">
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{route('products.index')}}" class="btn btn-danger">Cancel</a> 
  </div>

    </div>
</form>
@endsection