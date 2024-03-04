<?php

namespace App\Http\Controllers;

use App\Services\Product\ProductService;
use App\Services\Product\ProductServiceInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(protected ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }
    public function index()
    {
        return $this->productService->getAllProducts();
    }
}
