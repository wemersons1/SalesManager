<?php

use App\Enums\SaleStatusEnum;
use App\Models\SaleStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $statuses = [
            [
                'id' => SaleStatusEnum::FINISHED->value,
                'name' => 'Finalizado'
            ],
            [
                'id' => SaleStatusEnum::PENDING->value,
                'name' => 'Pendente'
            ],
            [
                'id' => SaleStatusEnum::CANCELED->value,
                'name' => 'Cancelado'
            ],
        ];

        foreach ($statuses as $status) {
            SaleStatus::create($status);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        SaleStatus::truncate();
    }
};
