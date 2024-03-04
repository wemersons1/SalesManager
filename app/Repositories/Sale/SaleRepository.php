<?php

namespace App\Repositories\Sale;

use App\Enums\SaleStatusEnum;
use App\Models\Sale;
use App\Repositories\SaleProduct\SaleProductRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class SaleRepository implements SaleRepositoryInterface {    
    use SaleTrait;
    public function __construct(protected SaleProductRepositoryInterface $saleProductRepository)
    {

    }
    public function createSale($data): Sale
    {
        DB::beginTransaction();
        try {
            $sale = Sale::create([
                'status_id' => SaleStatusEnum::PENDING->value,
                'amount' => 0,
            ]);
            foreach ($data['products'] as $product) {
                $product['sale_id'] = $sale->sale_id;
                $product['price'] = $this->getPriceProduct($product['product_id']);
                $this->saleProductRepository->createSaleProduct($product);
            } 
            $saleWithAmountCalculated = $this->getSaleWithAmountCalculated($sale);
        } catch(\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();

        return $saleWithAmountCalculated->load(['products']);
    }
    public function getAllSales(): Collection
    {  
        return Sale::with(['products'])
                ->get();
    }
    public function getSaleById($saleId): Sale
    {
        return Sale::with(['products'])
                ->findOrFail($saleId);
    }
    public function cancelSaleById($saleId): Sale
    {
        $sale = Sale::findOrFail($saleId);
        $sale->status_id = SaleStatusEnum::CANCELED->value;
        $sale->save();

        return $sale->load('status')
                        ->refresh();
    }
    public function updateSale($saleId, $data): Sale
    {
        DB::beginTransaction();
        try {
            foreach ($data['products'] as $product) {
                $product['sale_id'] = $saleId;
                $product['price'] = $this->getPriceProduct($product['product_id']);
                $this->saleProductRepository->createSaleProduct($product);
            } 
            $sale = Sale::findOrFail($saleId);
            $saleWithAmountCalculated = $this->getSaleWithAmountCalculated($sale);
        } catch(\Exception $e) {
            DB::rollBack();
            return response()->json([
                "message" => $e->getMessage()
            ], 500);
        }
        DB::commit();
        
        return $saleWithAmountCalculated->load(['products'])
                                    ->refresh();
    }
}