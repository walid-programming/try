<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index() {
        return view('home',['products' => $this->productRepository->getAllProducts()]);
    }
    public function create() {
        return view('create');
    }
    public function store(Request $request) {
        $data = $request->except('_token');
        if($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products');
        }else {
            $data['image'] = null;
        }
        $this->productRepository->createProduct($data);
        return redirect()->route('product.create');
    }
}
