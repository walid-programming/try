<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    private CategoryRepository $categoryRepository;
    private ProductRepository $productRepository;

    public function __construct(CategoryRepository $categoryRepository,ProductRepository $productRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }
    public function filter($categoryId) {
        return view('home',['products' => $this->productRepository->getAllProducts($this->categoryRepository->getCategoryById($categoryId))]);
    }
}
