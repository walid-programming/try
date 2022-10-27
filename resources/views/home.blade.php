@extends('layouts.app')
@section('content')
<div class="container">
  <div class="header">
    <h1>home page</h1>
    <a href="{{route('product.create')}}">new product</a>
  </div>
  <div id="app" class="main">
    <div class="sidebar">
      <ul v-if="categories.length > 0">
        <li v-for="category in categories">
          <span @click="filterByCategory">@{{category.title}}</span>
        </li>
      </ul>
    </div>
    <div class="products">
      <div class="filter" v-if="products.length > 0">
        <div class="filter-wrapper">
          <input type="number" name="" id="">
          <input type="number" name="" id="">
          <button @click="filterByPrice">filter</button>
        </div>
      </div>
      <div class="products-wrapper">
        <div class="card" v-for="product in products">
          <img class="card-img" :src="product['image']" :alt="product.name">
          <div class="card-body">
            <h5 class="card-title">@{{product.name}}</h5>
            <p class="card-desc">@{{product.description}}</p>
            <small>@{{product.price}}</small>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
<script src="https://unpkg.com/vue@3/dist/vue.global.js" defer></script>
<script src="{{asset('/js/home.js')}}" defer></script>
@endpush