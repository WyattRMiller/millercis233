@extends('layout')

@section('content')             

<div class="row justify-content-center">
<div class="card" style="width: 50rem;">
    <img src="{{$product->image}}" class="card-img-top" alt="product image">
    <div class="card-body">
            <p class="card-text">ID: {{$product->id}}</p>
            <p class="card-text">Name: {{$product->name}}</p>
            <p class="card-text">Price: ${{$product->price}}</p>
            <p class="card-text">Description: {{$product->description}}</p>
            <p class="card-text">Item Number: {{$product->item_number}}</p>
    </div>
</div>
</div>

@endsection