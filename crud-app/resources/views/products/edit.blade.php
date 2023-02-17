@extends('layout')

@section('content')

<h1 class="text-center">Edit a product</h1>



<form method="POST" action="{{route('products.update', $product->id)}}" class="row g-3 justify-content-center text-center">
    <div class="col-2">
    
   
    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <span>{{$error}}</span><hr>
        @endforeach
    </div>
    @endif

@csrf
@method('PUT')
@include('products.form')

  <div class="col-12">
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{route('products.index')}}" class="btn btn-danger">Cancel</a> 
  </div>

    </div>
</form>
@endsection