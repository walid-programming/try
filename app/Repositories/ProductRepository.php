<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\IProductRepository;

class ProductRepository implements IProductRepository
{
    public function getAllProducts(){
        return Product::all();
    }
    public function createProduct(array $data){
        return Product::create($data);
    }
    public function getProductsByCategory(Category $category){
        return $category->products()->get();
    }
}
