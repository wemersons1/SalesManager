<?php

namespace App\Services\Sale;

use App\Repositories\Sale\SaleRepositoryInterface;

class SaleService{
    public function __construct(protected SaleRepositoryInterface $saleRepository)
    {

    }
    public function createSale($data)
    {
        return $this->saleRepository->createSale($data);
    }
    public function getAllSales()
    {
        return $this->saleRepository->getAllSales();
    }
    public function getSaleById($saleId)
    {
        return $this->saleRepository->getSaleById($saleId);
    }
    public function cancelSaleById($saleId)
    {
        return $this->saleRepository->cancelSaleById($saleId);
    }
    public function updateSale($saleId, $data)
    {
        return $this->saleRepository->updateSale($saleId, $data);
    }
}