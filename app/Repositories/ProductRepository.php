<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\IProductRepository;

class ProductRepository implements IProductRepository
{
    public function getAllProducts(){
        return Product::get(['id','name','description','image','price']);
    }
    public function createProduct(array $data){
        $product = Product::create($data);
        $product->categories()->attach($data['category']);
        return $product;
    }
    public function getProductsByCategory($catId){
        $category = Category::find($catId);
        return $category->products()->get(['id','name','description','image','price']);
    }
    public function getProductByPrice($min,$max) {
        return Product::whereBetween('price',[$min,$max])->get(['id','name','description','image','price']);
    }
}
