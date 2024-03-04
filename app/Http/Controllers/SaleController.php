<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sale\StoreSaleRequest;
use App\Http\Requests\Sale\UpdateSaleRequest;
use App\Models\Sale;
use App\Services\Sale\SaleService;

class SaleController extends Controller
{
    public function __construct(protected SaleService $saleService)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->saleService->getAllSales();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSaleRequest $request)
    {
        $data = $request->validated();
        return $this->saleService->createSale($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return $this->saleService->getSaleById($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        $data = $request->validated();
        return $this->saleService->updateSale($sale->sale_id, $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        return $this->saleService->cancelSaleById($sale->sale_id);
    }
}
