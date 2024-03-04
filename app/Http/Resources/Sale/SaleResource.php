<?php

namespace App\Http\Resources\Sale;

use App\Http\Resources\Product\ProductResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SaleResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "sales_id" => $this->id,
            "amount" => $this->amount,
            "products" => ProductResource::collection($this->products)
        ];
    }
}
