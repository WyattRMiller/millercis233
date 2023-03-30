@extends('dashboard')

@section('content')

<h1 class="text-center">Add a User</h1>

<form method="POST" action="{{route('users.store')}}" class="row g-3 justify-content-center text-center">
    <div class="col-2">

@csrf
@include('users.form')

  <div class="col-12">
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{route('users.index')}}" class="btn btn-danger">Cancel</a> 
  </div>

    </div>
</form>
@endsection