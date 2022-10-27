<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository,CategoryRepository $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index() {
        return view('home',['products' => $this->productRepository->getAllProducts()]);
    }
    public function create() {
        return view('create',['categories' => $this->categoryRepository->getAllCategories()]);
    }
    public function store(Request $request) {
        $data = $request->except('_token');
        if($request->hasFile('image')) {
            $data['image'] = Storage::url($request->file('image')->store('products'));
        }else {
            $data['image'] = null;
        }
        $this->productRepository->createProduct($data);
        return redirect()->route('product.create');
    }
}
