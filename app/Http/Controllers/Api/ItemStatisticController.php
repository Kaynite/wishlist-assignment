<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemStatisticController extends Controller
{
    public function __invoke(): AnonymousResourceCollection
    {
        $stats = [
            [
                'label' => 'Total price this month',
                'value' => $this->calculateTotalPriceThisMonth(),
            ],
            [
                'label' => 'Average price',
                'value' => $this->calculateAveragePrice(),
            ],
        ];

        return JsonResource::collection($stats);
    }

    /**
     * The following logic can be moved into a separate service class
     * to improve the organization and maintainability of the code,
     * and to enable independent unit testing of each service method.
     */
    protected function calculateTotalPriceThisMonth(): int|float
    {
        return Item::whereMonth('created_at', now()->month)->sum('price');
    }

    protected function calculateAveragePrice(): int|float
    {
        return Item::avg('price');
    }
}
