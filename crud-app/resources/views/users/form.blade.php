@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <span>{{$error}}</span><hr>
        @endforeach
    </div>
@endif

<div class="col-12">
    <label for="name" class="form-label">User Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{old('name', $user->name)}}">
  </div>

  <div class="col-12">
    <label for="price" class="form-label">User Email</label>
    <input type="text" class="form-control" id="email" name="email" value="{{old('email', $user->email)}}">
  </div>

  <input type="hidden" id="password" name="password" value="password">