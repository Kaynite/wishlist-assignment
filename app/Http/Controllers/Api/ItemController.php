<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreItemRequest;
use App\Models\Item;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemController extends Controller
{
    /**
     * Display a listing of the items.
     */
    public function index(): AnonymousResourceCollection
    {
        $items = Item::latest('id')->paginate();

        return JsonResource::collection($items);
    }

    /**
     * Store a newly created item in storage.
     */
    public function store(StoreItemRequest $request): JsonResource
    {
        $item = Item::create($request->validated());

        return JsonResource::make($item);
    }

    /**
     * Display the specified item.
     */
    public function show(Item $item): JsonResource
    {
        return JsonResource::make($item);
    }
}
