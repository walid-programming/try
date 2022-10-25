@extends('layouts.app')
@section('content')
<div class="card p-3 mt-2">
  <h1>Home Page</h1>
  <a href="{{route('product.create')}}"> create new product</a>
</div>
<div class="card p-3 mt-2">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-9">
      <div class="row">
        @foreach ($products as $product)
        <div class="col-md-4">
          <div class="card">
            <img src="{{Storage::url($product->image)}}" class="card-img-top" alt="product-image">
            <div class="card-body">
              <h5 class="card-title">{{$product->name}}</h5>
              <p class="card-text">{{$product->description}}</p>
              <small>{{$product->price}}</small>
              <a href="#" class="card-link">Another link</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection