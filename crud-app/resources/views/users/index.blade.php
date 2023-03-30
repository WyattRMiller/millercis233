@extends('dashboard')

@section('content')

<a type="button" class="btn btn-primary" href="{{route('users.create')}}">Add User</a>

<table class="table table-striped table-hover table-bordered text-center">

<thead>
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
</thead>
<tbody>
  @foreach ($users as $user)
  <tr>

    <td><a href="{{route('users.show', $user->id)}}">{{$user->name}}</a></td>

    <td>{{$user->email}}</td>

    <td><a type="button" class="btn btn-primary" href="{{route('users.edit', $user->id)}}">Edit</a></td>

    <td>
      <form action="{{route('users.destroy', $user->id)}}" method="POST" onSubmit="return confirm('Are you sure you want to delete the user named {{$user->name}}?')">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger">Delete</button>
      </form>
    </td>

  </tr>
  @endforeach
</tbody>
</table>
{!! $users->links('pagination::bootstrap-4') !!}
@endsection