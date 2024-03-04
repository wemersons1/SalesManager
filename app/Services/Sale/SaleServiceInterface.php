<?php

namespace App\Services\Sale;

use App\Models\Sale;
use Illuminate\Support\Collection;

interface SaleServiceInterface {
    public function createSale($data);
    public function getAllSales();
    public function getSaleById($saleId);
    public function cancelSaleById($saleId);
    public function updateSale($saleId, $data);
}