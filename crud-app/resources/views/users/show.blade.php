@extends('dashboard')

@section('content')             

<div class="row justify-content-center text-center">
<div class="card" style="width: 50rem;">
    <div class="card-body">
            <h5 class="card-text">Name</h5>
            <p class="card-text">{{$user->name}}</p>
            <hr>
            <h5 class="card-text">Email</h5>
            <p class="card-text">{{$user->email}}</p>
    </div>
</div>
</div>

@endsection