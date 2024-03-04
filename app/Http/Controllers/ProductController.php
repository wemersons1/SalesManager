<?php

namespace App\Http\Controllers;

use App\Services\Product\ProductService;

class ProductController extends Controller
{
    public function __construct(protected ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function index()
    {
        return $this->productService->getAllProducts();
    }
}
