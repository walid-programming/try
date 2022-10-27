<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        return response()->json(['products' => $this->productRepository->getAllProducts()]);
    }

    public function getByCategory(Request $request)
    {
        return response()->json(['products' => $this->productRepository->getProductsByCategory($request->catId)]);
    }

    public function getByPrice(Request $request)
    {
        return response()->json(['products' => $this->productRepository->getProductByPrice($request->min,$request->max)]);
    }
}
