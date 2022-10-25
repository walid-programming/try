<?php

namespace App\Repositories;

use App\Models\Category;

interface  IProductRepository
{
    public function getAllProducts();
    public function createProduct(array $product);
    public function getProductsByCategory(Category $catagory);
}
