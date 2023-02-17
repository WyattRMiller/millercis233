@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <span>{{$error}}</span><hr>
        @endforeach
    </div>
@endif

<div class="col-12">
    <label for="name" class="form-label">Product Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{old('name', $product->name)}}">
  </div>

  <div class="col-12">
    <label for="price" class="form-label">Product Price</label>
    <input type="text" class="form-control" id="price" name="price" value="{{old('price', $product->price)}}">
  </div>

  <div class="col-12">
    <label for="description" class="form-label">Product Description</label>
    <input type="text" class="form-control" id="description" name="description" value="{{old('description', $product->description)}}">
  </div>

  <div class="col-12">
    <label for="item_number" class="form-label">Item Number</label>
    <input type="text" class="form-control" id="item_number" name="item_number" value="{{old('item_number', $product->item_number)}}">
  </div>

  <div class="col-12">
    <label for="image" class="form-label">Product Image</label>
    <input type="text" class="form-control" id="image" name="image" value="{{old('image', $product->image)}}">
  </div>