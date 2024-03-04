<?php

namespace App\Services\Product;

use App\Repositories\Product\ProductRepository;

class ProductService implements ProductServiceInterface {
    public function __construct(protected ProductRepository $productRepository)
    {

    }
    public function getAllProducts()
    {
        return $this->productRepository->getAllProducts();
    }
}