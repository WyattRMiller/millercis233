@extends('dashboard')

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

<h1 class="text-center mt-5">Add a review</h1>

<form method="POST" action="{{route('reviews.store')}}" class="row g-3 justify-content-center text-center">
    <div class="col-4">

    @if ($errors->any())
    <div class="alert alert-danger text-center col-12">
        @foreach ($errors->all() as $error)
            <span>{{$error}}</span>
        @endforeach
    </div>
    @endif

@csrf

    <div class="col-12">
        <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">

        <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">

        <textarea type="text" class="form-control" id="comment" name="comment" placeholder="Write your comment here!" rows="3"></textarea>

        <select class="form-control" id="rating" name="rating" >
            <option value="1">1/5 Stars</option>
            <option value="2">2/5 Stars</option>
            <option value="3">3/5 Stars</option>
            <option value="4">4/5 Stars</option>
            <option value="5">5/5 Stars</option>
        </select>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Create</button>
        <input type="reset" class="btn btn-danger" value="Clear">
    </div>

    </div>
</form>

@if (count($product->reviews) < 1)
    <h1 class="text-center mt-5">This product has no reviews.</h1>
@else

<div class="row g-3 justify-content-center text-center mt-5">
<div class="col-8">
<table class="table table-striped table-hover table-bordered text-center col-12">

<thead>
  <tr>
    <th>Comment</th>
    <th>Rating</th>
    <th>Added by</th>
    @can('viewAny', App\Models\User::class)
        <th>Delete</th>
    @endcan
  </tr>
</thead>
<tbody>
@foreach ($product->reviews as $review)
    <tr>
        <td>{{$review->comment}}</td>
        <td>
            @for($i = 0; $i < $review->rating; $i++)
            ★
            @endfor
            
        </td>
        <td>
            {{ $review->user->name}}
        </td>
        @can('viewAny', App\Models\User::class)
            <td>
                <form action="{{route('reviews.destroy', $review->id)}}" method="POST" onSubmit="return confirm('Are you sure you want to delete this review?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        @endcan
    </tr>
@endforeach
</tbody>
</table>
</div>
</div>

@endif

@endsection