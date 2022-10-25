<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('home',['products' => $products]);
    }
    public function create() {
        return view('create');
    }
    public function store(Request $request) {
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        if($request->hasFile('image')) {
            $path = $request->file('image')->store('products');
            $product->image = $path;
        }
        $product->save();
        return redirect()->route('product.store');
    }
}
