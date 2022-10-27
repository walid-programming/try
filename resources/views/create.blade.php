@extends('layouts.app')
@section('content')
 <div class="card p-3 mt-2">
  <h1>Create Page</h1>
  <a href="{{route('all')}}"> go to home page</a>
 </div>
  <div class="card p-3 mt-2">
    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="inputName" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="inputName">
      </div>
      <div class="mb-3">
        <label for="inputDescription" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="inputDescription" rows="5"></textarea>
      </div>
      <div class="mb-3">
        <label for="inputPrice" class="form-label">Price</label>
        <input type="number" name="price" class="form-control" id="inputPrice">
      </div>
      <div class="mb-3">
        <label for="inputImage" class="form-label">Image</label>
        <input type="file" name="image" class="form-control" id="inputImage">
      </div>
      <div>
        <select name="category" id="">
            @foreach ($categories as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
@endsection
