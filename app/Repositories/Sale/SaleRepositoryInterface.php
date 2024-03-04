<?php

namespace App\Repositories\Sale;
interface SaleRepositoryInterface {
    public function createSale($data);
    public function getAllSales();
    public function getSaleById($saleId);
    public function cancelSaleById($saleId);
    public function updateSale($saleId, $data);
}